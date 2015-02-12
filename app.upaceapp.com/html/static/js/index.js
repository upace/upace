(function (window, document, $, Parse, api) {

    var currentUser = api.getCurrentUser(),
        currentUniversityId = currentUser.get('universityId'),
        currentGymId = currentUser.get('universityGymId'),
        currentUniversity,
        currentAllGyms,
		currentAllRooms,
        currentGym,
        currentOccupancy,
        reservedClasses,
        reservedEquipment,
        upcomingReservations,

        selectors = {
            'roomOccupancyItemTemplate' : '#room-occupancy-item-template',
            'roomOccupancyItem' : '.land-room-occupied-spots-wrap',
            'onDeckItem' : '.land-ondeck-item',
            'onDeckNoneFound' : '.land-ondeck-none-found',
            'onDeckItemTemplate' : '#on-deck-item-template',
            'reserveModal' : '#reserve-modal',
            'otherGymItem' : '.land-other-gym-item',
            'otherGymItemTemplate' : '#other-gym-item-template'
        },

        templates = {
            'roomOccupancyItem' : twig({
                data: $(selectors.roomOccupancyItemTemplate).html()
            }),
            'otherGymItem' : twig({
                data: $(selectors.otherGymItemTemplate).html()
            }),
            'onDeckItem' : twig({
                data: $(selectors.onDeckItemTemplate).html()
            })
        },

        // cache selectors wherever possible
        $roomCarousel = $('.owl-current'),
        $gymsCarousel = $('.owl-other-gyms'),
        $onDeckCarousel = $('.owl-ondeck'),

        initializeDashboard = function() {

            $(document).on('click', selectors.onDeckItem, handleOnDeckClick);
            $(document).on('click', selectors.otherGymItem, handleOtherGymClick);

            api.getUniversityById(currentUniversityId)
                .then(function(a) {
                    currentUniversity = a;
                    updateCurrentGym();
                    initOnDeck();
                });
        },

        updateCurrentGym = function() {
            Parse.Promise.when(
                api.getGymsByUniversity(currentUniversityId),
                api.getRoomsByUniversity(currentUniversityId)
            ).then(function(a, b) {
                currentAllGyms = a;
                currentAllRooms = b;
                currentOccupancy = 0;
                for (var i = 0; i < currentAllGyms.length; i++) {
                    if (currentAllGyms[i].id === currentGymId) {
                        currentGym = currentAllGyms[i];
                        break;
                    }
                }
                for (var i = 0; i < currentAllRooms.length; i++) {
                    if (currentAllRooms[i].get('universityGymId') === currentGymId) {
                        currentOccupancy += parseInt(currentAllRooms[i].get('reservedOccupancy'));
                    }
                }
                renderCurrentGym();
                renderRooms();
                renderOtherGyms();
            });
        },

        renderCurrentGym = function() {
            var percentage = Math.floor(currentOccupancy / currentGym.get('capacity') * 100);
            $('#land-data-average').text(percentage);
            $('#land-current-member').text(currentOccupancy);
            $('#land-total-member').text(currentGym.get('capacity'));
            $('#land-current-gym').text(currentGym.get('name'));
            $('#land-data-color').removeClass('land-data-r land-data-y land-data-g').addClass('land-data-' + getOccupancyColor(percentage)).show();
        },

        renderRooms = function() {
            var roomHtml = '';
            for (var i = 0; i < currentAllRooms.length; i++) {
				if (currentAllRooms[i].get('universityGymId') === currentGymId) {
					var occupiedSpots = parseInt(currentAllRooms[i].get('reservedOccupancy')),
						percentage = Math.floor(occupiedSpots / parseInt(currentAllRooms[i].get('totalOccupancy')) * 100),
						data = {
							'roomName' : currentAllRooms[i].get('name'),
							'perc' : percentage,
							'percColor' : getOccupancyColor(percentage),
							'occupiedSpots' : occupiedSpots,
							'roomId' : currentAllRooms[i].id
						};
					roomHtml += templates.roomOccupancyItem.render(data);
				}
            }
            $roomCarousel.html(roomHtml);
            activateRoomCarousel();
        },

        initOnDeck = function() {
            Parse.Promise.when(
                    api.getClassReservationsByUser(currentUser),
                    api.getEquipmentReservationsByUser(currentUser)
                ).then(function(a, b) {
                    if(a.length || b.length) {
                        reservedClasses = a;
                        reservedEquipment = b;
                        upcomingReservations = reservedClasses.concat(reservedEquipment);
                        upcomingReservations = filterParseResultsByDateAndStartTime(upcomingReservations);
                        if(upcomingReservations.length) {
                            upcomingReservations.sort(sortParseResultsByStartTime);
                            renderOnDeck();
                        }
                    }
                });
        },

        renderOnDeck = function() {
            if(upcomingReservations.length) {
                var onDeckHtml = '';
                for(var i = 0; i < upcomingReservations.length; i++) {
                    var isEq = (upcomingReservations[i].get('equipment')),
                        date = (isEq) ? upcomingReservations[i].get('reservationDate') : upcomingReservations[i].get('date'),
                        startTime = (isEq) ? upcomingReservations[i].get('slotId').get('start_time') : upcomingReservations[i].get('start_time'),
                        dateTime = new Date(normalizeDateFromParse(date) + ' ' + startTime),
                        data = {
                            'roomName' : (isEq) ? '' : upcomingReservations[i].get('class').get('room').get('name'),
                            'startTime' : ((dateTime.getHours() + 11) % 12 + 1) + ':' + (dateTime.getMinutes() < 10 ? '0' : '') + dateTime.getMinutes(),
                            'name' : (isEq) ? upcomingReservations[i].get('equipmentId').get('name') : upcomingReservations[i].get('class').get('name'),
                            'date' : dateAbbr[dateTime.getDay()] + ' ' + (dateTime.getMonth() + 1) + '/' + dateTime.getDate()
                        }
                    onDeckHtml += templates.onDeckItem.render(data);
                }
                $onDeckCarousel.html(onDeckHtml);
                activateOnDeckCarousel();
            } else {
                $(selectors.onDeckNoneFound).show();
            }
        },

        renderOtherGyms = function() {
			var occupancyByGym = {},
				otherGymHtml = '';
			for (var i = 0; i < currentAllRooms.length; i++) {
				var gymId = currentAllRooms[i].get('universityGymId');
				// if (gymId !== currentGymId) {
					if (!occupancyByGym[gymId]) {
						occupancyByGym[gymId] = 0;
					}
					occupancyByGym[gymId] += parseInt(currentAllRooms[i].get('reservedOccupancy'));
				// }
			}
			for (var j = 0; j < currentAllGyms.length; j++) {
				// if (currentAllGyms[j].id !== currentGymId) {
					var occupiedSpots = occupancyByGym[currentAllGyms[j].id],
						percentage = Math.floor(occupiedSpots / parseInt(currentAllGyms[j].get('capacity')) * 100),
						data = {
							'gymName' : currentAllGyms[j].get('name'),
							'perc' : percentage,
							'percColor' : getOccupancyColor(percentage),
							'gymId' : currentAllGyms[j].id
						};
                    otherGymHtml += templates.otherGymItem.render(data);
				// }
			}
			$gymsCarousel.html(otherGymHtml);
            // activateGymsCarousel();
        },

        handleOnDeckClick = function() {
            $(selectors.reserveModal).modal('show');
        },

        handleOtherGymClick = function(e) {
            if(currentGymId !== $(e.currentTarget).data('gym-id')) {
                currentGymId = $(e.currentTarget).data('gym-id');
                updateCurrentGym();
            }
        },

        activateRoomCarousel = function() {
            if($roomCarousel.hasClass('owl-loaded')){
                $roomCarousel.trigger('destroy.owl.carousel');
            }
            $roomCarousel.owlCarousel({
                stagePadding: 50,
                loop: true,
                margin: 0,
                nav: false,
                responsive: {
                    0: {
                        items: 2
                    },
                    768: {
                        items: 3
                    },
                    915: {
                        items: 4
                    },
                    1600: {
                        items: 5
                    }
                }
            });
        },

        // disabled for beta
        activateGymsCarousel = function() {
            $gymsCarousel.owlCarousel({
                stagePadding: 20,
                loop: true,
                margin: 0,
                nav: false,
                responsive: {
                    0: {
                        items: 4
                    },
                    768: {
                        items: 4
                    },
                    915: {
                        items: 5
                    },
                    1200: {
                        items: 6
                    },
                    1600: {
                        items: 7
                    }
                }
            });
        },

        activateOnDeckCarousel = function() {
            $onDeckCarousel.owlCarousel({
                stagePadding: 15,
                loop: false,
                margin: 0,
                nav: false,
                center: false,
                responsive: {
                    0: {
                        items: 4
                    },
                    768: {
                        items: 4
                    },
                    915: {
                        items: 5
                    },
                    1200: {
                        items: 6
                    },
                    1600: {
                        items: 7
                    }
                }
            });
        },

        getOccupancyColor = function(percentage) {
            var color = 'g';
            if (percentage > 50) color = 'y';
            if (percentage > 90) color = 'r';
            return color;
        };

    initializeDashboard();

})(this, document, jQuery, Parse, api);
