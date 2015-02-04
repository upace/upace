(function (window, document, $, Parse, api) {

    var currentUser = api.getCurrentUser(),
        equipmentByDate, // All equipment for provided date (Array of Parse objects).
        reservedEquipmentSlots, // All equipment reservations for provided date (Array of Parse objects).
        myReservedEquipmentSlots, // My reserved slots ({slotId:reservationId}).
		equipmentData, // Equipment converted into template-digestible objects (Array).

        initializeEquipment = function() {
            var date = getUrlParameter('dt');
            if (!date) {
                date = formatDateForParse(new Date());
            }

            Parse.Promise.when(
                    api.getEquipmentByUniversity(currentUser.get('universityId')),
                    api.getEquipmentReservationsByUniversityAndDate(currentUser.get('universityId'), date)
                )
                .then(function(a, b) {
                    var closeDates = [],
                        openOnDt = true;
                    try {
                        closeDates = a[0].get('gymId').get('closeDate').split(',');
                        openOnDt = ($.inArray(date, closeDates) === -1);
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
                    myReservedEquipmentSlots = {};
                    for (var i = 0; i < b.length; i++) {
                        reservedEquipmentSlots.push(b[i].id);
                        if (b[i].get('userId').id === currentUser.id) {
                            myReservedEquipmentSlots[b[i].get('slotId')] = b[i].id;
                        }
                    }
                    renderEquipment();
                });
        },

        renderEquipment = function () {
            console.log('All Equipment', equipmentByDate);
			equipmentData = [];
            for (var i = 0; i < equipmentByDate.length; i++) {
				var eq = equipmentByDate[i];
                var slotData = {
                    slotId : eq.id,
                    equipmentName : eq.get('equipId').get('name'),
                    roomName : eq.get('roomId').get('name'),
                    gymName : eq.get('gymId').get('name'),
                    startTime : eq.get('start_time'),
                    endTime : eq.get('end_time'),
                    myReservation : myReservedEquipmentSlots[eq.id] || false,
                    available : ($.inArray(eq.id, reservedEquipmentSlots) === -1)
                };
				equipmentData.push(slotData);
            }
        },

        loadEquipmentDetails = function (slotId) {
            api.getEquipmentDetails(slotId).then(function(a) {
                renderEquipmentDetails(a);
            });
        },

        renderEquipmentDetails = function (equipmentDetails) {
            var slotData;
			for (var i = 0; i < equipmentData.length; i++) {
				if (equipmentData[i].slotId === equipmentDetails.id) {
					slotData = equipmentData[i];
					break;
				}
			}
            // console.log(equipmentDetails);
			// console.log(slotData);
			// TODO: loop through equipmentData to get additional times.
        };

    initializeEquipment();
    // loadEquipmentDetails('eWuGn4lZix');

})(this, document, jQuery, Parse, api);
