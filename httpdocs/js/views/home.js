define([
	"jquery",
	"underscore",
	"backbone",
	'text!templates/home.html'
	], function($, _, Backbone, homeHTML){
		var homeView = Backbone.View.extend({
			el: "#content",
			user: false,

			events: {
				"click #getStarted": "getStartedClickCallback"
			},

			getStartedClickCallback: function() {
				this.user.set({isLoggedIn: true});
				appRouter.navigate("/step/1", {
					trigger:true,
					replace:true
				});
			},

			/**
			 * We require users to log in.
			 */
			onGuestUser: function() {
				$.getJSON("/api/users/loginUrl", function(data) {
					if(data.response && data.response.url) {
						$("#login").attr("href", data.response.url);
					}
				});
			},

			/**
			 * Show the get started button.
			 */
			onLoggedInUser: function(data) {
				this.user.set({
		 			name: data.response.name
		 		});

				$("#login").hide();
				$("#getStarted").css("display", "block");
			},

			/**
			 * Render this view;
			 * Add content and present the proper button.
			 */
			render: function(usr) {
				this.user = usr;
				this.$el
					.html(_.template(homeHTML, {
						name: "Home"
					}))
					.attr("class", "home");

				// Either get logged in user or provide the login link.
				var _this = this;
				$.getJSON("/api/users/get", function(data) {
				 	if(data.response && data.response.name) {
				 		_this.onLoggedInUser(data);
					} else {
						_this.onGuestUser();
					}
				});
			}
		});
		
		return new homeView;
	}
);