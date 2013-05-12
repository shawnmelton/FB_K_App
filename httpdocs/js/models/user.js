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
			color: "",
			cost: "",
			operation: "",
			loggedIn: false,
			version: 1,

			/**
			 * Based on the style score, get the style that applies to this user.
			 * If all scores are equal, the user is transitional.
			 */
			getStyle: function() {
				if(this.get("modern") > this.get("traditional") && this.get("modern") > this.get("transitional")) {
					return "modern";
				}

				if(this.get("traditional") > this.get("transitional") && this.get("traditional") > this.get("modern")) {
					return "traditional";
				}

				return "transitional";
			},

			initialize: function() {
				if(fbkDevMode) {  // Avoid FB auth in dev mode.
					this.loadTestData();
					return;
				}

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
			 * Load test information for when we are in development mode.
			 */
			loadTestData: function() {
				this.set({
					firstName: "John",
					lastName: "Doe",
					userName: "shawn.a.melton",
					modern: 0,
					traditional: 0,
					transitional: 0,
					color: "",
					cost: "",
					operation: "",
					loggedIn: true,
					version: 1
				});

				this.setHometown("Los Angeles, CA");
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
						userName: response.username,
						modern: 0,
						traditional: 0,
						transitional: 0,
						version: 1
					});

					if(response.hometown && response.hometown.name) {
						_this.setHometown(response.hometown.name);
					}
    			});
			},

			/**
			 * Clear out any scores the user may have.
			 * Update version 
			 */
			resetScores: function() {
				this.set({
					modern: 0,
					traditional: 0,
					transitional: 0,
					color: "",
					cost: "",
					operation: ""
				});

				if(parseInt(this.get("version")) == 1) {
					this.set({version: 2});
				} else {
					this.set({version: 1});
				}
			},

			/**
			 * Score the user's style preference.
			 */
			scoreStyle: function(style) {
				style = style.toLowerCase();
				if(this.validStyle(style)) {
					if(style === "modern") {
						this.set({
							modern: (parseInt(this.get(style)) + 1)
						});
					} else if(style === "traditional") {
						this.set({
							traditional: (parseInt(this.get(style)) + 1)
						});
					} else {
						this.set({
							transitional: (parseInt(this.get(style)) + 1)
						});
					}
				}
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
			},

			/**
			 * Make sure the provided style is a valid selection.
			 * @param String
			 * @return boolean
			 */
			validStyle: function(style) {
				return (style === "modern" || style === "traditional" || style === "transitional");
			}
		});
		
		return new User();
	}
);