(function (window, document, $, Parse, api) {

    var allUniversities,
        selectedUniversity,
        selectedUniversityGyms,

        initializeRegistration = function() {
            api.getUniversities().then(function(a) {
                allUniversities = a;
                renderRegistration();
            });
        },

        renderRegistration = function() {
            // console.log(allUniversities);
        },

        loadUniversityGyms = function() {
            api.getGymsByUniversity().then(function(a) {
                selectedUniversityGyms = a;
                renderUniversityGyms();
            });
        },

        renderUniversityGyms = function() {
            // console.log(selectedUniversityGyms);
        };
		
	// Initialize FB login
	api.initializeFacebookPlugin().then(
		function() {
			// TODO: add click event to Facebook button that fires off api.loginWithFacebook()
		},
		function() {
			console.error('failed to load Facebook plugin -- handle this in UI');
		}
	);
	
    $('#login-form').on('submit', function(evt) {
        evt.preventDefault();

        var f = flattenFormArray($(this).serializeArray());

        api.login(f.username, f.password).then(
            function(user) {
                console.log('user logged in');
                window.location = '/';
            },
            function() {
                console.error('login failed -- handle this in UI');
            }
        );
    });

    $('#registration-form').on('submit', function(evt) {
        evt.preventDefault();

        var f = flattenFormArray($(this).serializeArray());
        // console.log(f);

        api.registerNewUser(f).then(
            function(user) {
                console.log('user registered');
                window.location = '/'; // TODO: change this to root
            },
            function() {
                console.error('registration failed -- handle this in UI');
            }
        );
    });

    initializeRegistration();

})(this, document, jQuery, Parse, api);
