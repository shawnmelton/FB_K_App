define([
	"jquery",
	"underscore",
	"backbone"
	], function($, _, Backbone){
		var User = Backbone.Model.extend({
			name: "",
			hometown: "",
			loggedIn: false,

			initialize: function() {
				var _this = this;
				FB.getLoginStatus(function(response) {
					if (response.status === 'connected') {
						_this.set({loggedIn: true});
						_this.populate();
					}

					Backbone.history.start({
						pushState: true
					});
				});
			},

			isLoggedIn: function() {
				return this.get("loggedIn");
			},

			/**
			 * Populate the user information that we need.
			 */
			populate: function() {
				var _this = this;
				FB.api('/me', function(response) {
					_this.set({
						name: response.name,
						hometown: response.hometown.name
					});
    			});


			}
		});
		
		return new User();
	}
);