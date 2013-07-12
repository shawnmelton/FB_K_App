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
			space: "",
			cost: "",
			operation: "",
			loggedIn: false,
			questionVersions: [], // Tracks which question versions have been presented to the user.

			addQuestionVersion: function(v) {
				this.questionVersions.push(v);
			},

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

			determineStatus: function() {
				if(fbkDevMode) {  // Avoid FB auth in dev mode.
					this.loadTestData();

					Backbone.history.start({
						pushState: !!(window.history && window.history.pushState)
					});
					return;
				}

				var _this = this;
				FB.getLoginStatus(function(response) {
					if (response.status === 'connected') {
						_this.set({loggedIn: true});
						_this.populate();
					}

					Backbone.history.start({
						pushState: !!(window.history && window.history.pushState)
					});
				});
			},

			/**
			 * Get a comma separated list of question versions.
			 */
			getQuestionVersionsString: function() {
				var qString = "";
				for(var idx in this.questionVersions) {
					qString += this.questionVersions[idx] +",";
				}

				return (qString != "") ? qString.substring(0, qString.length-1) : "";
			},

			/**
			 * Has the user made a selection yet?
			 * @return boolean
			 */
			hasMadeASelection: function() {
				return (parseInt(this.get("modern")) > 0 || parseInt(this.get("transitional")) > 0 || parseInt(this.get("traditional")) > 0);
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
					space: "",
					cost: "",
					operation: "",
					loggedIn: true,
					questionVersions: []
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
						city: "",
						state: "",
						loggedIn: true,
						questionVersions: []
					});

					if(response.location && response.location.name) {
						_this.setHometown(response.location.name);
					}
    			});
			},

			/**
			 * Clear out any scores the user may have.
			 * Clear question versions
			 */
			resetScores: function() {
				this.set({
					modern: 0,
					traditional: 0,
					transitional: 0,
					space: "",
					cost: "",
					operation: ""
				});

				this.questionVersions = [];
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