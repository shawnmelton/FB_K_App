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
				'facebook.ferguson.com/*actions': 'show404'
			},

			initialize: function() {				
				this.route(/^(facebook.ferguson.com){0,1}(\/){0,1}$/, "showHome");
				this.route(/^(facebook.ferguson.com){0,1}(\/){0,1}questions\/([0-9]+)$/, "showStep");
				this.route(/^(facebook.ferguson.com){0,1}(\/){0,1}see-your-results$/, "showSeeYourResults");
			},
			
			showHome: function(domain, slash){
				homeView.render(User);
			},

			show404: function(actions) {
				appRouter.navigate(fbkUrlroot, {trigger:true, replace:true});
			},

			showSeeYourResults: function(domain, slash) {
				// Make sure the user has logged in.
				if(!User.get("isLoggedIn")) {
					appRouter.navigate(fbkUrlroot, {trigger:true, replace:true});
					return;
				}
				
				resultsView.render(User);
			},

			showStep: function(domain, slash, number) {
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

				if(number == 1) { // reset the background
					$("#wrapper").fadeIn();
				}

				stepView.render(number, User);
			}
		});
		
		var initialize = function(){
			appRouter = new AppRouter();
			// Routing is postponed until User model finishes authentication. See User.initialize()

			if(fbkDevMode) { // Start routing immediately if in dev mode.
				Backbone.history.start({
					pushState: true
				});
			}
		};
		
		return {
			initialize: initialize
		};
	}
);