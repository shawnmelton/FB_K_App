define([
	"jquery",
	"underscore",
	"backbone",
	'text!templates/404.html'
	], function($, _, Backbone, pageNotFoundHTML){
		var pageNotFoundView = Backbone.View.extend({
			content: $("#content"),
			render: function(){
				this.content
					.html(_.template(pageNotFoundHTML, {}))
					.attr("class", "pageNotFound");
			}
		});
		
		return new pageNotFoundView;
	}
);