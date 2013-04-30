define([
	'jquery',
	'underscore',
	'backbone',
	'views/home',
	'views/404',
	'views/step',
	'views/results',
	'models/user'
	], function($, _, Backbone, homeView, pageNotFoundView, stepView, resultsView, User){
		var AppRouter = Backbone.Router.extend({
			routes: {
				// Define some URL routes
				'facebook.ferguson.com': 'showHome',
				'facebook.ferguson.com/': 'showHome',
				'facebook.ferguson.com/questions/*number': 'showStep',
				'facebook.ferguson.com/see-your-results': 'showSeeYourResults',
				
				// Default
				"facebook.ferguson.com/*actions": 'defaultAction'
			},
			
			showHome: function(){
				homeView.render(User);
			},

			show404: function() {
				pageNotFoundView.render();
			},

			showSeeYourResults: function() {
				// Make sure the user has logged in.
				if(!User.get("isLoggedIn")) {
					appRouter.navigate("/facebook.ferguson.com/", {trigger:true, replace:true});
					return;
				}
				
				resultsView.render(User);
			},

			showStep: function(number) {
				// Make sure the user has logged in.
				if(!User.get("isLoggedIn")) {
					appRouter.navigate("/facebook.ferguson.com/", {trigger:true, replace:true});
					return;
				}

				number = parseInt(number);
				if(number < 1 || number > 5) {
					this.defaultAction();
					return;
				}

				stepView.render(number);
			},
			
			defaultAction: function(actions){
				this.show404();
			}
		});
		
		var initialize = function(){
			appRouter = new AppRouter();
			// Routing is postponed until User model finishes authentication. See User.initialize()
		};
		
		return {
			initialize: initialize
		};
	}
);