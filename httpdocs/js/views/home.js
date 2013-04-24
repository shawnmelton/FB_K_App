define([
	"jquery",
	"underscore",
	"backbone",
	'text!templates/home.html'
	], function($, _, Backbone, homeHTML){
		var homeView = Backbone.View.extend({
			el: "#content",

			events: {
				"click #getStarted": "getStartedClickCallback"
			},

			getStartedClickCallback: function() {
				appRouter.navigate("/step/1", {
					trigger:true,
					replace:true
				});
			},

			/**
			 * Callback for when we fetch the current user's info.
			 * Is this user logged in or do we need to authenticate them?
			 */
			loadingUserCallback: function(data) {
				if(data.response && data.response.name) {
					$("#login").hide();
					$("#getStarted").css("display", "block");
				} else {
					$.getJSON("/api/users/loginUrl", function(data) {
						if(data.response && data.response.url) {
							$("#login").attr("href", data.response.url);
						}
					});
				}
			},

			/**
			 * Render this view;
			 * Add content and present the proper button.
			 */
			render: function() {
				this.$el
					.html(_.template(homeHTML, {
						name: "Home"
					}))
					.attr("class", "home");

				 $.getJSON("/api/users/get", this.loadingUserCallback);
			}
		});
		
		return new homeView;
	}
);