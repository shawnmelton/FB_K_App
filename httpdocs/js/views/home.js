define([
	"jquery",
	"underscore",
	"backbone",
	'text!templates/home.html'
	], function($, _, Backbone, homeHTML){
		var homeView = Backbone.View.extend({
			content: $("body"),
			render: function(){
				this.content.html(_.template(homeHTML, {
					name: "Home"
				}));

				// Update url without calling router
				// appRouter.navigate("/test", {trigger:false, replace:true});
			}
		});
		
		return new homeView;
	}
);