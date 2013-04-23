define([
	'jquery',
	'underscore',
	'backbone',
	'views/home',
	'views/404',
	'views/stepOne'
	], function($, _, Backbone, homeView, pageNotFoundView, stepOneView){
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
				homeView.render();
			},

			show404: function() {
				pageNotFoundView.render();
			},

			showStep: function(number) {
				number = parseInt(number);
				if(number < 1 || number > 5) {
					this.defaultAction();
					return;
				}

				switch(number) {
					case 1: stepOneView.render(); break;
				}
			},
			
			defaultAction: function(actions){
				this.show404();
			}
		});
		
		var initialize = function(){
			appRouter = new AppRouter();
			Backbone.history.start({
				pushState: true
			});
		};
		
		return {
			initialize: initialize
		};
	}
);