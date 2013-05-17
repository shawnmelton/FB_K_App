define([
	'jquery',
	'underscore',
	'backbone',
	'views/home',
	'views/step',
	'views/results',
	'models/user'
	], function($, _, Backbone, homeView, stepView, resultsView, User){
		var AppRouter = Backbone.Router.extend({
			routes: {
				'(:domain/)': 'showHome',
				'(:domain/)questions/:number': 'showStep',
				'(:domain/)see-your-results': 'showSeeYourResults',
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
				
				resultsView.render(User);
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
		};
		
		return {
			initialize: initialize
		};
	}
);