// TODO: store these somewhere instead of using globals

Date.prototype.addDays = function(days) {
    var dat = new Date(this.valueOf());
    dat.setDate(dat.getDate() + days);
    return dat;
};

var
    months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October',
              'November', 'December'],
    dateAbbr = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'],
    msPerDay = 1000 * 60 * 60 * 24,

    flattenFormArray = function(arr) {
		var flattened = {};
		for (var i = 0; i < arr.length; i++) {
			flattened[arr[i].name] = arr[i].value;
		}
		return flattened;
	},

    statusMessage = function(target, message, type) {
        // target {jquery object} - container to append bootstrap message to
        // type - warning, danger, success, info
        var $html = $('<div style="margin-top: 1em;" class="alert alert-' + type + '" role="alert"><strong>' + message + '</strong></div>');
        target.after($html);
        window.setTimeout(function() {
            $html.fadeTo(500, 0).slideUp(500, function(){
                $(this).remove();
            });
        }, 3000);
    },

    getUrlParameter = function (name) {
	    name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
	    var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
	        results = regex.exec(location.search);
	    return results === null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
	},

	formatDateForParse = function(date) {
		var day = ('0' + date.getDate()).slice(-2);
		var month = ('0' + (date.getMonth() + 1)).slice(-2);
		return month + '/' + day + '/' + date.getFullYear();
    },
	
	normalizeDateFromParse = function(date) {
		// TODO: get all dates in the DB in the same format so we don't need this.
		if (date && date.indexOf('.') !== -1) {
			var s = date.split('.');
			return s[1] + '/' + s[0] + '/' + s[2];
		}
		return date;
	},

    dateDiffInDays = function(a, b) {
        // a and b are date objects
        var utc1 = Date.UTC(a.getFullYear(), a.getMonth(), a.getDate());
        var utc2 = Date.UTC(b.getFullYear(), b.getMonth(), b.getDate());
        return Math.floor((utc2 - utc1) / msPerDay);
    },

    getDates = function(startDate, stopDate) {
        var dateArray = [];
        var currentDate = startDate;
        while (currentDate <= stopDate) {
            dateArray.push(currentDate)
            currentDate = currentDate.addDays(1);
        }
        return dateArray;
    },
	
	getDayIndex = function(date) {
		date = new Date(normalizeDateFromParse(date));
		return date.getDay();
	},
	
	sortParseResultsByStartTime = function(a, b) {
		var aDate = a.get('date') || a.get('reservationDate') || '01/01/2000',
			bDate = b.get('date') || b.get('reservationDate') || '01/01/2000',
			aStart = a.get('start_time') || a.get('slotId').get('start_time') || '',
			bStart = b.get('start_time') || b.get('slotId').get('start_time') || '',
			comparison = Date.parse(normalizeDateFromParse(aDate) + ' ' + aStart) - Date.parse(normalizeDateFromParse(bDate) + ' ' + bStart);
			/*
			if (comparison === 0 && a.get('name') && b.get('name')) {
				var aName = a.get('name').toLowerCase(),
					bName = b.get('name').toLowerCase();
				if (aName < bName) return -1;
				if (aName > bName) return 1;
			}
			*/
			return comparison;
	},
	
	filterParseResultsByStartTime = function(results, earliestTime) {
		var filtered = [],
			earliestDate = Date.parse('01/01/2000 ' + earliestTime);
		for (var i = 0; i < results.length; i++) {
            var start_time = (results[i].get('equipment') ? results[i].get('slotId').get('start_time') : results[i].get('start_time'));
			if (Date.parse('01/01/2000 ' + start_time) >= earliestDate) {
				filtered.push(results[i]);
			}
		}
		return filtered;
	},

	filterParseResultsByDateAndStartTime = function(results, earliestDateAndTime) {
		var filtered = [],
			earliestDate;
		if (!earliestDateAndTime) {
			earliestDateAndTime = new Date();
		}
		earliestDate = Date.parse(earliestDateAndTime);
		for (var i = 0; i < results.length; i++) {
			var date = results[i].get('date') || results[i].get('reservationDate'),
				start_time = results[i].get('start_time') || results[i].get('slotId').get('start_time') || '';
			if (Date.parse(normalizeDateFromParse(date) + ' ' + start_time) >= earliestDate) {
				filtered.push(results[i]);
			}
		}
		return filtered;
	},
	
    isToday = function(date) {
        var today = new Date();
        return (date.toDateString() === today.toDateString());
    };
