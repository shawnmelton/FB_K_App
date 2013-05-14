define([
	"jquery",
	"underscore",
	"backbone",
	'text!templates/results.html',
	'text!templates/resultsMessages/traditional.html',
	'text!templates/resultsMessages/transitional.html',
	'text!templates/resultsMessages/modern.html'
	], function($, _, Backbone, resultsHTML, traditionalHTML, transitionalHTML, modernHTML){
		var resultsView = Backbone.View.extend({
			el: "#content",
			user: false,

			events: {
				"click a#share-your-results": "shareYourResultsClickCallback",
				"click #retake-quiz > a": "retakeQuiz"
			},

			/**
			 * Get the url for directions to the nearest showroom.  If the user doens't have location
			 * information, then send them to the Locations Finder page on the site.
			 */
			getDirectionsUrl: function() {
				if(this.user.get("city") != "" && this.user.get("state") != "") {
					return "http://www.ferguson.com/locations-finder#search?address="+ this.user.get("city") +"%2C"+ this.user.get("state") +"&radius=25&opt_showroom=true";
				}

				return "http://www.ferguson.com/locations-finder";
			},

			getProfilePictureSize: function(style) {
				switch(style) {
					case "modern": return "width=98&height=105";
					case "transitional": return "width=91&height=84";
					case "traditional": return "width=130&height=128";
				}
			},

			locateNearestShowroom: function() {
				$.getJSON(fbkUrlroot +"api/showrooms/find", {
					city: this.user.get("city"),
					state: this.user.get("state")
				}, function(data) {
					if(data.response && data.response.street_address) {
						$("#my-showroom > h5").html(data.response.street_address +", "+ 
							data.response.city +", "+ data.response.state +" "+ data.response.zip_code).show();
						$("#get-directions").attr("href", "https://maps.google.com?q="+ data.response.street_address +"+"+ 
							data.response.city +"+"+ data.response.state +"+"+ data.response.zip_code);
					}
				});
			},

			/**
			 * Fetch all of the bucket information and dynamically populate information
			 * into the view based on api feedback.
			 */
			render: function(usr) {
				this.user = usr;
				var _this = this;
				$.getJSON(fbkUrlroot +"api/results/get", {
					style: this.user.getStyle(),
					color: this.user.get("color"),
					cost: this.user.get("cost"),
					operation: this.user.get("operation")
				}, function(data) {
					_this.$el
						.html(_.template(resultsHTML, {
							"firstName": _this.user.get("firstName"),
							"lastName": _this.user.get("lastName"),
							"style": _this.user.getStyle(),
							"userName": _this.user.get("userName"),
							"photoSize": _this.getProfilePictureSize(_this.user.getStyle()),
							"locationsUrl": _this.getDirectionsUrl(),
							"products": data.response,
							"domain": fbkUrlroot
						}))
						.attr("class", "results");

						$("#wrapper, #portrait").addClass(_this.user.getStyle());

						_this.setStyleMessage();
						_this.locateNearestShowroom();
				});
			},

			/**
			 * User wants to retake the quiz because we didn't get the results correct.
			 * Reset the user's selections, but present a new set of preference questions.
			 */
			retakeQuiz: function() {
				$("#wrapper, #portrait").removeClass(this.user.getStyle());
				this.user.resetScores();
				appRouter.navigate(fbkUrlroot +"questions/1", {
					trigger:true,
					replace:true
				});

				// TODO change questions.
			},

			setStyleMessage: function() {
				if(this.user.getStyle() == "modern") {
					$("#style-message").html(_.template(modernHTML));
				} else if(this.user.getStyle() == "traditional") {
					$("#style-message").html(_.template(traditionalHTML));
				} else {
					$("#style-message").html(_.template(transitionalHTML));
				}
			},

			/* The current user's facebook status update message. */
			shareYourResultsClickCallback: function() {
				FB.ui({
					method: 'feed',
					name: ("I'm "+ this.user.getStyle()).toUpperCase(),
					link: 'http://swaydevsite.com/facebook.ferguson.com/',
					picture: 'http://swaydevsite.com/facebook.ferguson.com/img/logo.png',
					caption: 'Ferguson Asks, "What\'s Your Style?"',
					description: 'Uncover your own style, and learn how Ferguson can help you bring your vision of your perfect bathroom to life.'
				}, function(response) {
					// console.log(response);
				});
			}
		});
		
		return new resultsView;
	}
);