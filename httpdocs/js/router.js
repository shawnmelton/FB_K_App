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
			initialize: function() {
				this.route(/^(facebook.ferguson.com\/){0,1}$/, 'showHome');
				this.route(/^(facebook.ferguson.com\/){0,1}questions\/([0-9]{1})$/, 'showStep');
				this.route(/^(facebook.ferguson.com\/){0,1}see-your-results$/, 'showSeeYourResults');
				this.route(/^(facebook.ferguson.com\/){0,1}session-expired$/, 'showSessionExpired');
			},
			
			showHome: function(domain){
				homeView.render(User);
			},

			showSeeYourResults: function(domain) {
				// Make sure the user has logged in.
				if(!User.isLoggedIn() || !User.hasMadeASelection()) {
					appRouter.navigate(fbkUrlroot, {trigger:true, replace:true});
					return;
				}
				
				if(!fbkDevMode) {
					FB.Canvas.setAutoGrow(200);
				}	
				resultsView.render(User);
			},

			showSessionExpired: function(domain) {
				sessionExpiredView.render();
			},

			showStep: function(domain, number) {
				// Make sure the user has logged in.
				if(!User.isLoggedIn() || (!User.hasMadeASelection()) && parseInt(number) > 1) {
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

			if(!fbkDevMode) {
				FB.Canvas.setSize({width: 850, height: 721});
			}	
		};
		
		return {
			initialize: initialize
		};
	}
);