define([
	"jquery",
	"underscore",
	"backbone",
	'text!templates/sessionExpired.html'
	], function($, _, Backbone, sessionExpiredHTML){
		var sessionExpiredView = Backbone.View.extend({
			el: "#content",
			events: {
				"click a.buttons": "retakeQuizClickCallback"
			},

			render: function(){
				this.$el
					.html(_.template(sessionExpiredHTML, {}))
					.attr("class", "sessionExpired");
			},

			retakeQuizClickCallback: function() {
				appRouter.navigate(fbkUrlroot, {trigger:true, replace:true});
			}
		});
		
		return new sessionExpiredView;
	}
);