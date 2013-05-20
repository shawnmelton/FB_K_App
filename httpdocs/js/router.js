define([
	'jquery',
	'underscore',
	'backbone',
	'views/home',
	'views/step',
	'views/results',
	'views/sessionExpired',
	'models/user'
	], function($, _, Backbone, homeView, stepView, resultsView, sessionExpiredView, User){
		var AppRouter = Backbone.Router.extend({
			routes: {
				'(:domain/)': 'showHome',
				'(:domain/)questions/:number': 'showStep',
				'(:domain/)see-your-results': 'showSeeYourResults',
				'(:domain/)session-expired': 'showSessionExpired',
				'(:domain/)*actions': 'show404'
			},
			
			showHome: function(domain){
				homeView.render(User);
			},

			show404: function(actions) {
				appRouter.navigate(fbkUrlroot, {trigger:true, replace:true});
			},

			showSeeYourResults: function(domain) {
				// Make sure the user has logged in.
				if(!User.get("isLoggedIn")) {
					appRouter.navigate(fbkUrlroot, {trigger:true, replace:true});
					return;
				}
				
				FB.Canvas.setAutoGrow(200);
				resultsView.render(User);
			},

			showSessionExpired: function(domain) {
				sessionExpiredView.render();
			},

			showStep: function(domain, number) {
				// Make sure the user has logged in.
				if(!User.get("isLoggedIn")) {
					appRouter.navigate(fbkUrlroot, {trigger:true, replace:true});
					return;
				}

				number = parseInt(number);
				if(number < 1 || number > 6) {
					this.defaultAction();
					return;
				}

				stepView.render(number, User);
			}
		});
		
		var initialize = function(){
			appRouter = new AppRouter();
			// Routing is postponed until User model finishes authentication. See User.initialize()
			User.determineStatus();

			FB.Canvas.setSize({width: 850, height: 721});
		};
		
		return {
			initialize: initialize
		};
	}
);