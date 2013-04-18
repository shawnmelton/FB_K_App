define([
	"jquery",
	"underscore",
	"backbone",
	'text!templates/404.html'
	], function($, _, Backbone, pageNotFoundHTML){
		var pageNotFoundView = Backbone.View.extend({
			content: $("body"),
			render: function(){
				this.content.html(_.template(pageNotFoundHTML, {}));
			}
		});
		
		return new pageNotFoundView;
	}
);