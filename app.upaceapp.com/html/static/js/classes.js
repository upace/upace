(function (window, document, $, Parse, api, listings) {

    var
        currentUser = api.getCurrentUser(),
        classesByDate, // All classes for provided date (Array of Parse objects).
        myReservedClassSlots, // My reserved slots ({slotId:reservationId}).

        selectors = {
            'classListings' : '#class-listings',
            'equipmentListings' : '#equipment-listings'
        },

        // cache selectors where we can
        $classListings = $(selectors.classListings),

        initClasses = function() {
			var parseDate = formatDateForParse(new Date());
            $(document).on('listings.datechange', handleDateChange);
            $(document).on('listings.render', renderClassListings);
            getClassListings(parseDate);
        },

        getClassListings = listings.getClassListings = function(parseDate) {
            $classListings.html(listings.loadingSpinner);
            Parse.Promise.when(
                    api.getClassesByUniversityAndDate(currentUser.get('universityId'), parseDate),
                    api.getClassReservations(parseDate)
                )
                .then(function(a, b) {
                    if(a.length) {
                        classesByDate = a;
                        classesByDate.sort(sortParseResultsByStartTime);
                        myReservedClassSlots = {};
                        for (var i = 0; i < b.length; i++) {
                            myReservedClassSlots[b[i].get('slotId')] = b[i].id;
                        }
                        renderClassListings();
                    } else {
                        noClassListingsFound();
                    }
                });
        },

        // TODO: Refactor this into listings.js
        renderClassListings = function() {
            var renderDates = classesByDate,
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
                renderDates = filterParseResultsByStartTime(classesByDate, renderTime);
            }
            var html = '';
            if(renderDates.length) {
                for (var i = 0; i < renderDates.length; i++) {
                    var c = renderDates[i],
                        slotData = {
                            classId : c.get('classId'),
                            slotId : c.id,
                            listingName : c.get('class').get('name'),
                            roomName : c.get('class').get('room').get('name'),
                            gymName : c.get('gym').get('name'),
                            startTime : c.get('start_time'),
                            endTime : c.get('end_time'),
                            timeRange : listings.formatTimeRange(c.get('start_time'), c.get('end_time')),
                            myReservation : myReservedClassSlots[c.id] || false,
                            totalSpots : c.get('class').get('spots'),
                            description : c.get('class').get('description'),
                            date : normalizeDateFromParse(c.get('class').get('date'))
                        },
                    dateTime = new Date(slotData.date);
                    slotData.date = dateAbbr[dateTime.getDay()] + ' ' + (dateTime.getMonth() + 1) + '/' + dateTime.getDate();
                    slotData.spotsRemaining = slotData.totalSpots;
                    slotData.daysFromToday = dateDiffInDays(new Date(), dateTime);
					if (c.get('reserved_spots')) {
						slotData.spotsRemaining -= c.get('reserved_spots');
					}
                    html += listings.templates.listingItem.render(slotData);
                    listings.listingData[c.id] = slotData;
                }
                $classListings.hide().html(html).fadeIn(1000);
            } else {
                noClassListingsFound();
            }
        },

        handleDateChange = function(e, parseDate) {
            getClassListings(parseDate);
        },

        noClassListingsFound = function() {
            var html = '<div class="no-listings-found">No classes found.</div>';
            $classListings.html(html);
        };

    initClasses();

})(this, document, jQuery, Parse, api, listings);
