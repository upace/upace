(function (window, document, $, Parse, api) {

    var currentUser = api.getCurrentUser(),
        currentNotifications,

        selectors = {
            'universityItemTemplate': '#university-item-template',
            'gymItemTemplate': '#gym-item-template',
            'universityItems': '#university-items',
            'statusProfile': '#profilechange-form',
            'statusPassword': '#passwordchange-form',
            'statusNotifications': '#notificationchange-form'
        },

        templates = {
            'universityItem': twig({
                data: $(selectors.universityItemTemplate).html()
            }),
            'gymItem': twig({
                data: $(selectors.gymItemTemplate).html()
            })
        },

        $statusProfile = $(selectors.statusProfile),
        $statusPassword = $(selectors.statusPassword),
        $statusNotifications = $(selectors.statusNotifications),

        initSettings = function() {
            var html = '',
                university;
            Parse.Promise.when(
                api.getUniversities(),
                api.getGyms(),
                api.getProfileNotificationsByUser(currentUser)
            ).then(function(a, b, c) {
                for(var i = 0; i < a.length; i++) {
                    university = {
                        'name': a[i].get('name'),
                        'id': a[i].id,
                        'counter': i,
                        'gyms' : ''
                    };
                    for(var ii = 0; ii < b.length; ii++) {
                        if(a[i].id == b[ii].get('universityId')) {
                            university['gyms'] += templates.gymItem.render({
                                'id': b[ii].id,
                                'name': b[ii].get('name')
                            });
                        }
                    }
                    html += templates.universityItem.render(university);
                }
                $(selectors.universityItems).html(html);

                currentNotifications = c;
                renderProfile();
                if (currentNotifications) renderNotifications();
            });
        },

        renderProfile = function() {
            var $profileForm = $('#profilechange-form'),
                profile = currentUser.attributes;

            for (var k in profile) {
                if (profile.hasOwnProperty(k)) {
                    var $input = $profileForm.find('input[name="' + k + '"]');
                    if ($input.is(':radio')) {
                        $input.filter('[value="' + profile[k] + '"]').prop('checked', profile[k]).trigger('change');
                    } else {
                        $input.val(profile[k]);
                    }
                }
            }
            $("[class='settings-notifications']").bootstrapSwitch();
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
                statusMessage($statusProfile, 'settings saved!', 'success');
            },
            function() {
                statusMessage($statusProfile, 'unable to save settings.', 'danger');
            }
        );
    });

    $('#passwordchange-form').on('submit', function(evt) {
        evt.preventDefault();

        var f = flattenFormArray($(this).serializeArray());

        if (f.password !== f.retypepassword) {
            statusMessage($statusPassword, 'passwords do not match.', 'danger');
            return;
        }

        // The only way to verify an old password with
        // Parse is to log in again in the background.
        api.login(api.getCurrentUser().getUsername(), f.oldpassword).then(
            function(user) {
                return api.saveUserPassword(user, f.password).then(
                    function(user) {
                        statusMessage($statusPassword, 'password saved.', 'success');
                    }
                );
            },
            function() {
                statusMessage($statusPassword, 'change password failed.', 'danger');
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
                statusMessage($statusNotifications, 'notifications saved.', 'success');
            },
            function() {
                statusMessage($statusNotifications, 'unable to save notifications.', 'danger');
            }
        );
    }),
	
	$('#logout-button').on('click', function(evt) {
		evt.preventDefault();
		api.logout();
		window.location = '/login';
	});

    initSettings();

})(this, document, jQuery, Parse, api);
