// TODO: store these somewhere instead of using globals

$("[class='settings-notifications']").bootstrapSwitch();

Date.prototype.addDays = function(days) {
    var dat = new Date(this.valueOf());
    dat.setDate(dat.getDate() + days);
    return dat;
};

var
    months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October',
              'November', 'December'],
    dateAbbr = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'],

	flattenFormArray = function(arr) {
		var flattened = {};
		for (var i = 0; i < arr.length; i++) {
			flattened[arr[i].name] = arr[i].value;
		}
		return flattened;
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

    getDates = function(startDate, stopDate) {
        var dateArray = [];
        var currentDate = startDate;
        while (currentDate <= stopDate) {
            dateArray.push(currentDate)
            currentDate = currentDate.addDays(1);
        }
        return dateArray;
    },
	
	sortParseResultsByStartTime = function(a, b) {
		return Date.parse('01/01/2000 ' + a.get('start_time')) - Date.parse('01/01/2000 ' + b.get('start_time'));
	},
	
	filterParseResultsByStartTime = function(results, earliestTime) {
		var filtered = [],
			earliestDate = Date.parse('01/01/2000 ' + earliestTime);
		for (var i = 0; i < results.length; i++) {
			if (Date.parse('01/01/2000 ' + results[i].get('start_time')) >= earliestDate) {
				filtered.push(results[i]);
			}
		}
		return filtered;
	},

    isToday = function(date) {
        var today = new Date();
        return (date.toDateString() === today.toDateString());
    };

// Settings Page
// TODO: drop this in its own file
(function (window, document, $, Parse, api) {

    var currentUser = api.getCurrentUser(),
        currentNotifications,

        initializeSettings = function() {
            api.getProfileNotificationsByUser(currentUser).then(function(a) {
                currentNotifications = a;
                renderProfile();
                if (currentNotifications) renderNotifications();
            });
        },

        renderProfile = function() {
            var $profileForm = $('#profilechange-form'),
                profile = currentUser.attributes;

            for (var k in profile) {
                if (profile.hasOwnProperty(k)) {
                    var $input = $profileForm.find('input[name=' + k + ']');
                    if ($input.is(':radio')) {
                        $input.filter('[value=' + profile[k] + ']').prop('checked', profile[k]).trigger('change');
                    }
                    else {
                        $input.val(profile[k]);
                    }
                }
            }
        },

        renderNotifications = function() {
            var $notificationsForm = $('#notificationchange-form'),
                notifications = currentNotifications.attributes;

            for (var k in notifications) {
                if (notifications.hasOwnProperty(k)) {
                    var $input = $notificationsForm.find('input[name=' + k + ']');
                    $input.prop('checked', notifications[k]).trigger('change');
                }
            }
        };

    $('#profilechange-form').on('submit', function(evt) {
        evt.preventDefault();

        var f = flattenFormArray($(this).serializeArray());

        api.saveUserSettings(null, f).then(
            function(user) {
                console.log('settings saved');
            },
            function() {
                console.error('save settings failed -- handle this in UI');
            }
        );
    });

    $('#passwordchange-form').on('submit', function(evt) {
        evt.preventDefault();

        var f = flattenFormArray($(this).serializeArray());

        if (f.password !== f.retypepassword) {
            console.error('retyped password does not match -- handle this in UI');
            return;
        }

        // The only way to verify an old password with
        // Parse is to log in again in the background.
        api.login(api.getCurrentUser().getUsername(), f.oldpassword).then(
            function(user) {
                return api.saveUserPassword(user, f.password).then(
                    function(user) {
                        console.log('password saved');
                    }
                );
            },
            function() {
                console.error('change password failed -- handle this in UI');
            }
        );
    });

    $('#notificationchange-form').on('submit', function(evt) {
        evt.preventDefault();

        var f = flattenFormArray($(this).serializeArray()),
            notifications = {
                'class_noti' : false,
                'daily_exercise' : false,
                'general_noti' : false,
                'via_email' : false,
                'via_text' : false
            };

        for (var k in f) {
            if (f.hasOwnProperty(k) && f[k] === 'on') {
                notifications[k] = true;
            }
        }

        api.saveUserNotifications(null, notifications).then(
            function(user) {
                console.log('notifications saved');
            },
            function() {
                console.error('save notifications failed -- handle this in UI');
            }
        );
    });

    initializeSettings();

})(this, document, jQuery, Parse, api);
