define([
	"jquery",
	"underscore",
	"backbone",
	'text!templates/step.html'
	], function($, _, Backbone, stepHTML){
		var stepOneView = Backbone.View.extend({
			content: $("#content"),
			render: function(){
				this.content
					.html(_.template(stepHTML, {}))
					.attr("class", "step");
			}
		});
		
		return new stepOneView;
	}
);