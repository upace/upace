if (!window.listings) {
    window.listings = {};
}

(function (window, document, $, Parse, api, listings) {

    var
        currentUser = api.getCurrentUser(),
        listingData = listings.listingData = {},
        startTime = listings.startTime = null,
        selectedDate = listings.selectedDate = null,

        selectors = {
            'equipmentListings' : '#equipment-listings',
            'listingItem' : '.listing-item',
            'listingItemTemplate' : '#listing-item-template',
            'listingDetailTemplate' : '#listing-item-details-template',
            'reserveModal' : '#reserve-modal',
            'reserveTool' : '#collapse-reserve',
            'reserveModalItemDetails' : '#reserve-modal-item-details',
            'reserveModalListingInfo' : '.reserve-modal-details',
            'reserveModalBtnReserve' : '.reserve-modal-reserve-btn',
            'reserveModalBtnCancel' : '.reserve-modal-cancel-btn',
            'multiSelectButtons' : '.multi-select-btn',
            'multiCancelButtons' : '.multi-select-cancel-all-btn',
            'multiReserveButtons' : '.multi-select-reserve-all-btn',
            'startTimeFilterWrap' : '#collapse-add-time',
            'startTimeFilterForm' : '.listing-enter-time-form',
            'startTimeFilterInput' : '.listing-enter-time-form-input'
        },

        cssClasses = {
            'listingSelected' : 'listing-item-selected',
            'listingReserved' : 'listing-item-reserved'
        },

        templates = listings.templates = {
            'listingItem' : twig({
                data: $(selectors.listingItemTemplate).html()
            }),
            'listingDetailTemplate' : twig({
                data: $(selectors.listingDetailTemplate).html()
            })
        },

        loadingSpinner = listings.loadingSpinner = '<div class="spinner"></div>',
        startTimeFilterRegex = new RegExp(/^((1[0-2])|^(0?[0-9])):[0-5][0-9](\s?)(pm|am)$/ig),

        // cache selectors where we can
        $reserveModal = $(selectors.reserveModal),
        $reserveTool = $(selectors.reserveTool),
        $startTimeFilterWrap = $(selectors.startTimeFilterWrap),
        $startTimeFilterForm = $(selectors.startTimeFilterForm),

        initListings = function() {
            $(document).on('click', selectors.listingItem, onListingItemClick);
            $(document).on('click', selectors.multiCancelButtons, onMultiCancel);
            $(document).on('click', selectors.multiReserveButtons, onMultiReserve);
            $(document).on('click', selectors.reserveModalBtnReserve, onModalBtnClick);
            $(document).on('click', selectors.reserveModalBtnCancel, onModalBtnClick);
            $reserveTool.on('hide.bs.collapse', clearListingSelections);
            $(document).on('date_carousel.date_selected', dateSelected);
            $startTimeFilterWrap.on('show.bs.collapse', onOpenStartTimeFilter);
            $startTimeFilterWrap.on('hide.bs.collapse', onCloseStartTimeFilter);
            $startTimeFilterForm.on('submit', onStartTimeFormSubmit);
            $(document).on('input', selectors.startTimeFilterInput, onStartTimeInput);
        },

        // o = listing item
        saveReservation = function(o) {
            var $this = $(o),
                classId = $this.data('class-id'),
                slotId = $this.data('slot-id'),
                equipId = $this.data('equipment-id');
            if(classId){
                api.saveClassReservation(currentUser, classId, slotId).then(
					function(r) {
						$this.addClass(cssClasses.listingReserved).attr('data-reservation-id', r.id);
						listings.listingData[slotId].myReservation = r.id;
                        $(document).trigger('listings.reserved.class', [$this]);
					},
					function(err) {
						console.error('already reserved -- handle in UI');
					}
				);
            } else if(equipId) {
				api.saveEquipmentReservation(currentUser, equipId, slotId, listings.selectedDate).then(
					function(r) {
						$this.addClass(cssClasses.listingReserved).attr('data-reservation-id', r.id);
						listings.listingData[slotId].myReservation = r.id;
                        $(document).trigger('listings.reserved.equipment', [$this]);
					},
					function(err) {
						console.error('already reserved -- handle in UI');
					}
				);
            }
        },

        cancelReservation = function(o) {
            var $this = $(o),
                classId = $this.data('class-id'),
                equipId = $this.data('equipment-id'),
                slotId = $this.data('slot-id'),
                resId = $this.data('reservation-id');
            if(resId) {
                if(classId) {
                    api.deleteClassReservations(resId).then(function(a) {
                        $this.removeClass(cssClasses.listingReserved).removeAttr('data-reservation-id');
                        listingData[slotId].myReservation = false;
                        $(document).trigger('listings.cancelled.class', [$this]);
                    });
                } else if (equipId) {
                    api.deleteEquipmentReservations(resId).then(function(a) {
                        $this.removeClass(cssClasses.listingReserved).removeAttr('data-reservation-id');
                        listingData[slotId].myReservation = false;
                        $(document).trigger('listings.cancelled.equipment', [$this]);
                    });
                }
            }
        },

        onMultiReserve = function() {
            $('.' + cssClasses.listingSelected)
                .not('.' + cssClasses.listingReserved)
                .each(function(i,o){
                    saveReservation(o);
                });
            clearListingSelections();
        },

        onMultiCancel = function() {
            $('.' + cssClasses.listingSelected + '.' + cssClasses.listingReserved)
                .each(function(i,o){
                    cancelReservation(o);
                });
            clearListingSelections();
        },

        clearListingSelections = function() {
            $('.' + cssClasses.listingSelected).removeClass(cssClasses.listingSelected);
        },

        onListingItemClick = function(e) {
            var $l = $(e.currentTarget);
            if($reserveTool.is(':visible')) {
                $l.toggleClass(cssClasses.listingSelected);
            } else {
                if($l.data('class-id')){
                    Parse.Promise.when(
                            api.getClassDetails($l.data('slot-id'))
                        )
                        .then(function(a) {
                            renderListingDetails(a.id);
                        });
                } else if($l.data('equipment-id')) {
                    Parse.Promise.when(
                            api.getEquipmentDetails($l.data('slot-id'))
                        )
                        .then(function(a) {
                            renderListingDetails(a.id);
                        });
                }
            }
        },

        renderListingDetails = function (slotId) {
            $(selectors.reserveModalItemDetails).html(templates.listingDetailTemplate.render(listings.listingData[slotId]));
            $reserveModal.modal('show');
            // TODO: loop through classesData to get additional times.
        },

        onModalBtnClick = function() {
            var $info = $(this).closest(selectors.reserveModalListingInfo),
                $listing = $('#' + $info.data('slot-id'));
            if($info.data('reservation-id')) {
                cancelReservation($listing);
            } else {
                saveReservation($listing);
            }
            $reserveModal.modal('hide');
        },

        dateSelected = function(evt, el) {
            var parseDate = $(el).data('parse-date');
            listings.selectedDate = new Date($(el).data('full-date'));
            $(document).trigger('listings.datechange', [parseDate]);
        },

        onOpenStartTimeFilter = function() {
            $('html, body').animate({ scrollTop: 0 }, 200);
        },

        onCloseStartTimeFilter = function() {
            var $input = $(selectors.startTimeFilterInput);
            listings.startTime = null;
            if($input.val() != '') {
                $input.val('');
                $(document).trigger('listings.render');
            }
        },

        onStartTimeFormSubmit = function(e) {
            e.preventDefault();
        },

        onStartTimeInput = function(e) {
            var val = $(e.currentTarget).val();
            if(val.match(startTimeFilterRegex)) {
                if(val.indexOf(' ') == -1) {
                    // add a space before AM/PM since Parse is picky
                    val = val.slice(0, -2) + ' ' + val.slice(-2);
                }
                listings.startTime = val;
                $(document).trigger('listings.render');
            } else {
                listings.startTime = null;
                if(val == '') {
                    $(document).trigger('listings.render');
                }
            }
        },

        formatTimeRange = listings.formatTimeRange = function(start, end) {
            if(!start && !end){
                return '';
            }
            var s = start.replace(/\s+|pm|am/gi, ''),
                // e = end.replace(/\s+/g, '');
				e = end;
            if (s.charAt(0) === '0') s = s.substr(1);
            if (e.charAt(0) === '0') e = e.substr(1);
            return s + '-' + e;
        },

        getTodayStartTime = listings.getTodayStartTime = function() {
            var d = new Date(),
                h = d.getHours(),
                ampm = (h >= 12)? 'PM' : 'AM',
                hh = ((h + 11) % 12 + 1);
            return hh + ':' + d.getMinutes() + ' ' + ampm;
        };

    initListings();

})(this, document, jQuery, Parse, api, listings);
