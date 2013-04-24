define([
	'jquery',
	'underscore',
	'backbone',
	'views/home',
	'views/404',
	'views/step',
	'models/user'
	], function($, _, Backbone, homeView, pageNotFoundView, stepView, User){
		var AppRouter = Backbone.Router.extend({
			routes: {
				// Define some URL routes
				'': 'showHome',
				'/': 'showHome',

				'step/*number': 'showStep',
				
				// Default
				"*actions": 'defaultAction'
			},
			
			showHome: function(){
				homeView.render(User);
			},

			show404: function() {
				pageNotFoundView.render();
			},

			showStep: function(number) {
				// Make sure the user has logged in.
				if(!User.get("isLoggedIn")) {
					this.showHome();
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