(function (window, document, $, Parse, api, listings) {

    var
        currentUser = api.getCurrentUser(),
        equipmentByDate, // All equipment for provided date (Array of Parse objects).
        reservedEquipmentSlots, // All equipment reservations for provided date (Array of Parse objects).
        myReservedEquipmentSlots, // My reserved slots ({slotId:reservationId}).

        selectors = {
            'equipmentListings' : '#equipment-listings'
        },

        // cache selectors where we can
        $equipmentListings = $(selectors.equipmentListings),

        initEquipment = function() {
			var parseDate = formatDateForParse(new Date());
            $(document).on('listings.datechange', handleDateChange);
            $(document).on('listings.render', renderEquipmentListings);
            $(document).on('listings.reserved.equipment', handleEquipmentReservation);
            getEquipmentListings(parseDate);
        },

        getEquipmentListings = listings.getEquipmentListings = function(parseDate) {
            $equipmentListings.html(listings.loadingSpinner);
            Parse.Promise.when(
					api.getEquipmentByUniversity(currentUser.get('universityId'), getDayIndex(parseDate)),
                    api.getEquipmentReservationsByUniversityAndDate(currentUser.get('universityId'), parseDate)
                )
                .then(function(a, b) {
                    if(a.length) {
                        var closeDates = [],
                            openOnDt = true;
                        try {
                            closeDates = a[0].get('gymId').get('closeDate').split(',');
                            openOnDt = ($.inArray(parseDate, closeDates) === -1);
                        }
                        catch (ex) {}
                        if (openOnDt) {
                            equipmentByDate = a;
                            equipmentByDate.sort(sortParseResultsByStartTime);
                        }
                        else {
                            equipmentByDate = [];
                        }
                        reservedEquipmentSlots = [];
                        myReservedEquipmentSlots = [];
                        for (var i = 0; i < b.length; i++) {
                            reservedEquipmentSlots.push(b[i].id);
                            if (b[i].get('userId').id === currentUser.id) {
                                myReservedEquipmentSlots[b[i].get('slot')] = b[i].id;
                            }
                        }
                        renderEquipmentListings();
                    } else {
                        noEquipmentListingsFound();
                    }
                });
        },

        // TODO: Refactor this into listings.js
        renderEquipmentListings = function() {
            var renderDates = equipmentByDate,
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
                renderDates = filterParseResultsByStartTime(equipmentByDate, renderTime);
            }
            var html = '';
            if(renderDates.length) {
                for (var i = 0; i < renderDates.length; i++) {
                    var eq = renderDates[i],
                        s = eq.get('start_time'),
                        slotData = {
                            slotId : eq.id,
                            equipId : eq.get('equipId').id,
                            listingName : eq.get('equipId').get('name'),
                            roomName : eq.get('roomId').get('name'),
                            gymName : eq.get('gymId').get('name'),
                            startTime : s,
                            endTime : eq.get('end_time'),
                            timeRange : (s.charAt(0) === '0') ? s.substr(1) : s,
                            myReservation : myReservedEquipmentSlots[eq.id] || false,
                            occupied : !!eq.get('is_occupied'),
                            description: eq.get('equipId').get('notes'),
							date : listings.selectedDate
                        },
                    dateTime = new Date(slotData.date);
					slotData.date = dateAbbr[dateTime.getDay()] + ' ' + (dateTime.getMonth() + 1) + '/' + dateTime.getDate();
                    slotData.daysFromToday = dateDiffInDays(new Date(), dateTime);
                    html += listings.templates.listingItem.render(slotData);
                    listings.listingData[eq.id] = slotData;
                }
                $equipmentListings.hide().html(html).fadeIn(1000);
            } else {
                noEquipmentListingsFound();
            }
        },

        handleDateChange = function(e, parseDate) {
            getEquipmentListings(parseDate);
        },

        handleEquipmentReservation = function(e, o) {
            window.setTimeout(function() {
                o.fadeTo(500, 0).slideUp(500, function(){
                    o.remove();
                });
            }, 800);
        },

        noEquipmentListingsFound = function() {
            var html = '<div class="no-listings-found">No equipment found.</div>';
            $equipmentListings.html(html);
        };

    initEquipment();

})(this, document, jQuery, Parse, api, listings);
