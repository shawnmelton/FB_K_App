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
				"facebook.ferguson.com/*extra": 'show404'
			},

			initialize: function() {
				this.route(/^(facebook.ferguson.com){0,1}(\/){0,1}$/, "showHome");
				this.route(/^(facebook.ferguson.com){0,1}\/questions\/([0-9]+)$/, "showStep");
				this.route(/^(facebook.ferguson.com){0,1}\/see-your-results$/, "showSeeYourResults");
			},
			
			showHome: function(domain){
				homeView.render(User);
			},

			show404: function(extra) {
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
		};
		
		return {
			initialize: initialize
		};
	}
);