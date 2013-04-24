define([
	"jquery",
	"underscore",
	"backbone"
	], function($, _, Backbone){
		var User = Backbone.Model.extend({
			name: "",
			hometown: "",
			loggedIn: false,

			initialize: function() {

			}
		});
		
		return new User();
	}
);