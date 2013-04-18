define([
	'jquery',
	'underscore',
	'backbone',
	'views/home',
	'views/404'
	], function($, _, Backbone, homeView, pageNotFoundView){
		var AppRouter = Backbone.Router.extend({
			routes: {
				// Define some URL routes
				'': 'showHome',
				'/': 'showHome',
				
				// Default
				"*actions": 'defaultAction'
			},
			
			showHome: function(){
				homeView.render();
			},

			show404: function() {
				pageNotFoundView.render();
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