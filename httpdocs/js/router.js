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
				stepOneView.render();
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