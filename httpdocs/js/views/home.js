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
				"click #getStarted": "getStartedClickCallback",
				"click #login": "loginClickCallback"
			},

			getStartedClickCallback: function() {
				this.user.set({isLoggedIn: true});
				appRouter.navigate("/facebook.ferguson.com/questions/1", {
					trigger:true,
					replace:true
				});
			},

			/**
			 * Handle the login prompt when the user clicks to 
			 * login with FB.
			 */
			loginClickCallback: function() {
				var _this = this;
				FB.login(function(response) {
					console.log(response);
			        if (response.authResponse) {
			    		_this.user.populate();
			    		_this.getStartedClickCallback();
			        }
			    });
			},

			/**
			 * Show the get started button.
			 */
			onLoggedInUser: function() {
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
				if(this.user.isLoggedIn()) {
					this.onLoggedInUser();
				}
			}
		});
		
		return new homeView;
	}
);