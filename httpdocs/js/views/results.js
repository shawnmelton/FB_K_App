define([
	"jquery",
	"underscore",
	"backbone",
	'text!templates/results.html'
	], function($, _, Backbone, resultsHTML){
		var resultsView = Backbone.View.extend({
			el: "#content",
			user: false,

			events: {
				"click #share-your-results": "shareYourResultsClickCallback"
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

			/**
			 * Fetch all of the bucket information and dynamically populate information
			 * into the view based on api feedback.
			 */
			render: function(usr) {
				this.user = usr;
				var _this = this;

				console.log(this.user);
				$.getJSON("/facebook.ferguson.com/api/results/get", {
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
							"photoSize": _this.getProfilePictureSize(data.response.style),
							"locationsUrl": _this.getDirectionsUrl(),
							"products": data.response.products
						}))
						.attr("class", "results");

						$("#wrapper, #portrait").addClass(data.response.style);
				});
			},

			/* The current user's facebook status update message. */
			shareYourResultsClickCallback: function() {
				FB.ui({
					method: 'feed',
					name: 'Ferguson',
					link: 'http://shop.ferguson.com/',
					picture: 'http://shawnmelton.me/img/logo.png',
					caption: 'Bath, Kitchen & Lighting Gallery',
					description: 'Description will go here.'
				}, function(response) {
					// console.log(response);
				});
			}
		});
		
		return new resultsView;
	}
);