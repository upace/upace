(function (window, document, $, Parse, api, listings) {

    var currentUser = api.getCurrentUser(),
        reservedClasses,
        reservedEquipment,

        selectors = {
            'classListings' : '#class-listings',
            'equipmentListings' : '#equipment-listings'
        },

        // cache selectors where we can
        $classListings = $(selectors.classListings),
        $equipmentListings = $(selectors.equipmentListings),

        initReservations = function() {
			var parseDate = formatDateForParse(new Date());
            $(document).on('listings.datechange', handleDateChange);
            $(document).on('listings.render', renderReservations);
            $(document).on('listings.cancelled.class', handleClassCancellation);
            $(document).on('listings.cancelled.equipment', handleEquipmentCancellation);
            getReservations(parseDate);
        },

        getReservations = function(parseDate) {
            $classListings.html(listings.loadingSpinner);
            $equipmentListings.html(listings.loadingSpinner);
            Parse.Promise.when(
                    api.getClassReservationsByUser(currentUser, parseDate),
                    api.getEquipmentReservationsByUser(currentUser, parseDate)
                ).then(function(a, b) {
                    reservedClasses = a.sort(sortParseResultsByStartTime);
                    reservedEquipment = b.sort(sortParseResultsByStartTime);
                    renderReservations();
                });
        },

        renderReservations = function() {
            renderReservedClasses();
            renderReservedEquipment();
        },

        // TODO: Refactor this into listings.js
        renderReservedClasses = function() {
            var renderDates = reservedClasses,
                renderTime;
            if(listings.startTime) {
                renderTime = listings.startTime;
            } else {
                if(!listings.selectedDate) {
                    listings.selectedDate = new Date();
                    renderTime = listings.getTodayStartTime();
                } else if(listings.selectedDate) {
                    if(isToday(listings.selectedDate)) {
                        renderTime = listings.getTodayStartTime();
                    }
                }
            }
            if(renderTime) {
                renderDates = filterParseResultsByStartTime(reservedClasses, renderTime);
            }
            if(renderDates.length) {
                var html = '';
                for (var i = 0; i < renderDates.length; i++) {
                    var c = renderDates[i],
                        slotData = {
                            myReservation : c.id,
							classId : c.get('classId'),
							slotId : c.get('slotId'),
                            listingName : c.get('class').get('name'),
                            roomName : c.get('class').get('room').get('name'),
                            gymName : c.get('gym').get('name'),
                            startTime : c.get('start_time'),
                            endTime : c.get('end_time'),
                            timeRange : listings.formatTimeRange(c.get('start_time'), c.get('end_time')),
                            totalSpots : c.get('class').get('spots'),
                            description : c.get('class').get('description'),
                            date : normalizeDateFromParse(c.get('class').get('date'))
                        },
                        dateTime = new Date(slotData.date);
                    slotData.date = dateAbbr[dateTime.getDay()] + ' ' + (dateTime.getMonth() + 1) + '/' + dateTime.getDate();
					slotData.spotsRemaining = slotData.totalSpots;
					if (c.get('reserved_spots')) {
						slotData.spotsRemaining -= c.get('reserved_spots');
					}
                    html += listings.templates.listingItem.render(slotData);
                    listings.listingData[c.get('slotId')] = slotData;
                }
                $classListings.hide().html(html).fadeIn(1000);
            } else {
                noClassListingsFound();
            }
        },

        // TODO: Refactor this into listings.js
        renderReservedEquipment = function() {
            var renderDates = reservedEquipment,
                renderTime;
            if(listings.startTime) {
                renderTime = listings.startTime;
            } else {
                if(!listings.selectedDate) {
                    listings.selectedDate = new Date();
                    renderTime = listings.getTodayStartTime();
                } else if(listings.selectedDate) {
                    if(isToday(listings.selectedDate)) {
                        renderTime = listings.getTodayStartTime();
                    }
                }
            }
            if(renderTime) {
                renderDates = filterParseResultsByStartTime(reservedEquipment, renderTime);
            }
            var html = '';
            if(renderDates.length) {
                for (var i = 0; i < renderDates.length; i++) {
                    var eq = renderDates[i],
                        s = eq.get('slotId').get('start_time'),
                        slotData = {
                            slotId : eq.get('slot'),
							equipId : eq.get('equipment'),
							listingName : eq.get('equipmentId').get('name'),
							roomName : eq.get('slotId').get('roomId').get('name'),
                            gymName : eq.get('gymId').get('name'),
                            startTime : s,
                            endTime : eq.get('slotId').get('end_time'),
                            timeRange : (s.charAt(0) === '0') ? s.substr(1) : s,
							myReservation : eq.id,
							description: eq.get('equipmentId').get('notes'),
                            occupied : true,
							date : listings.selectedDate
                        },
						dateTime = new Date(slotData.date);
					slotData.date = dateAbbr[dateTime.getDay()] + ' ' + (dateTime.getMonth() + 1) + '/' + dateTime.getDate();
					if (slotData.myReservation || slotData.occupied) {
						slotData.status = 'Occupied';
					}
                    html += listings.templates.listingItem.render(slotData);
                    listings.listingData[eq.get('slot')] = slotData;
                }
                $equipmentListings.hide().html(html).fadeIn(1000);
            } else {
                noEquipmentListingsFound();
            }
        },

        handleClassCancellation = function(e, o) {
            o.remove();
            if(!$classListings.children().length) {
                noClassListingsFound();
            }
        },

        handleEquipmentCancellation = function(e, o) {
            o.remove();
            if(!$equipmentListings.children().length) {
                noEquipmentListingsFound();
            }
        },

        noClassListingsFound = function() {
            var html = '<div class="no-listings-found">No classes reserved.</div>';
            $classListings.html(html);
        },

        noEquipmentListingsFound = function() {
            var html = '<div class="no-listings-found">No equipment reserved.</div>';
            $equipmentListings.html(html);
        },

        handleDateChange = function(e, parseDate) {
            getReservations(parseDate);
        };

    initReservations();

})(this, document, jQuery, Parse, api, listings);
