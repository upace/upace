(function (window, document, $, Parse, api) {

    var
        selectors = {
            'universityItemTemplate': '#university-item-template',
            'gymItemTemplate': '#gym-item-template',
            'universityItems': '#university-items',
            'statusLogin': '#login-form',
            'statusSignup': '#registration-form'
        },

        templates = {
            'universityItem': twig({
                data: $(selectors.universityItemTemplate).html()
            }),
            'gymItem': twig({
                data: $(selectors.gymItemTemplate).html()
            })
        },

        $statusLogin = $(selectors.statusLogin),
        $statusSignup = $(selectors.statusSignup),

        initRegistration = function() {
            var html = '',
                university;
            Parse.Promise.when(
                api.getUniversities(),
                api.getGyms()
            ).then(function(a, b) {
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
            });
        };

	// Initialize FB login
	api.initializeFacebookPlugin().then(
		function() {
			// TODO: add click event to Facebook button that fires off api.loginWithFacebook()
		},
		function() {
            statusMessage($statusLogin, 'could not load Facebook plugin.', 'danger');
		}
	);
	
    $('#login-form').on('submit', function(evt) {
        evt.preventDefault();

        var f = flattenFormArray($(this).serializeArray());
		
		// TODO: improve validation process.
		if (!f.username || !f.password) {
			statusMessage($statusLogin, 'enter a username and password.', 'danger');
			return;
		}

        api.login(f.username, f.password).then(
            function(user) {
                window.location = '/';
            },
            function() {
                statusMessage($statusLogin, 'login failed.', 'danger');
            }
        );
    });

    $('#registration-form').on('submit', function(evt) {
        evt.preventDefault();

		// TODO: improve validation process.
		var required = ['universityGymId', 'firstname', 'lastname', 'email', 'phone', 'sex', 'memberType', 'gymFrequency', 'username', 'password'],
			f = flattenFormArray($(this).serializeArray()),
			missingMsg = 'some of your information is missing:',
			valid = true;
		
		for (var i = 0; i < required.length; i++) {
			if (!f[required[i]]) {
				missingMsg += '<br>- ' + required[i];
				valid = false;
			}
		}
		
		if (!valid) {
			statusMessage($statusSignup, missingMsg, 'danger');
			return;
		}

        api.registerNewUser(f).then(
            function(user) {
                statusMessage($statusSignup, 'you\'ve been registered. welcome!', 'success');
                window.setTimeout(function() {
                    window.location = '/';
                }, 5000);
            },
            function() {
                statusMessage($statusSignup, 'registration incomplete.', 'danger');
            }
        );
    });

    initRegistration();

})(this, document, jQuery, Parse, api);
