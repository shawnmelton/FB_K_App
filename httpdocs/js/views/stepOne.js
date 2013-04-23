define([
	"jquery",
	"underscore",
	"backbone",
	'text!templates/step.html'
	], function($, _, Backbone, stepHTML){
		var stepOneView = Backbone.View.extend({
			content: $("#content"),

			/**
			 * Load the step choices into their proper content
			 * buckets.
			 */
			loadStepCallback: function(data) {
				$("#content")
					.html(_.template(stepHTML, {"buckets": data.response}))
					.attr("class", "step");

				$(".bucket").last().addClass("last");
			},

			/**
			 * Handle the callback from when the "Next"
			 * button is clicked.
			 */
			nextClickCallback: function() {
				if(true) { // one of the buckets has been selected.
					appRouter.navigate("/step/2", {
						trigger:true,
						replace:true
					});
				}
			},

			render: function() {
				$.getJSON("/api/steps/load/?number=1", this.loadStepCallback);
				$("a.buttons").click(this.nextClickCallback);
			}
		});
		
		return new stepOneView;
	}
);