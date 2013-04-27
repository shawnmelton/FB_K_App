define([
	"jquery",
	"underscore",
	"backbone",
	"models/states"
	], function($, _, Backbone, States){
		var User = Backbone.Model.extend({
			userName: "",
			firstName: "",
			lastName: "",
			city: "",
			state: "",
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
						firstName: response.first_name,
						lastName: response.last_name,
						userName: response.username
					});

					if(response.hometown && response.hometown.name) {
						_this.setHometown(response.hometown.name);
					}
    			});
			},

			/**
			 * Set the location information based on a hometown
			 * string (provided as "city, state")
			 * @param hometown
			 */
			setHometown: function(hometown) {
				if(hometown.indexOf(",") !== -1) {
					this.set({
						city: hometown.substring(0, hometown.indexOf(",")),
						state: States.convertToAbbreviation(hometown.substring(hometown.indexOf(",") + 2))
					});
				}
			}
		});
		
		return new User();
	}
);