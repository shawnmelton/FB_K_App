define([
	"jquery",
	"underscore",
	"backbone",
	'text!templates/step.html',
	'text!templates/error.html'
	], function($, _, Backbone, stepHTML, errorHTML){
		var stepView = Backbone.View.extend({
			el: "#content",
			step: 0,

			events: {
				"click #next": "loadNextClickCallback",
				"click #see-your-results": "seeYourResultsClickCallback",
				"click .bucket": "bucketClickCallback",
				"click #error": "hideErrorMsg"
			},

			/**
			 * Handle what happens when a bucket is clicked.
			 */
			bucketClickCallback: function(event) {
				$(event.currentTarget).find("input").prop("checked", true);
			},

			/**
			 * Get the value of the radio that is checked.
			 * @return String - returns false if 
			 */
			getCheckedValue: function() {
				var value = false;
				$("#buckets input").each(function() {
					if($(this).prop("checked")) {
						value = $(this).val();
					}
				});

				return value;
			},

			/**
			 * Get the appropriate title for this view.
			 * @return String
			 */
			getTitle: function() {
				switch(this.step) {
					case 1: return "First";
					case 2: return "Second";
					case 3: return "Third";
					case 4: return "Fourth";
					case 5: return "Fifth";
				}
			},

			hideErrorMsg: function() {
				$("#error").remove();
			},

			/**
			 * Handle what happens when the Next button is clicked.
			 */
			loadNextClickCallback: function() {
				this.hideErrorMsg();
				if(this.step < 5 && this.getCheckedValue() !== false) { // one of the buckets has been selected.
					appRouter.navigate("/facebook.ferguson.com/questions/"+ (this.step + 1), {
						trigger:true,
						replace:true
					});
				} else {
					this.showErrorMsg();
				}
			},

			/**
			 * Fetch all of the bucket information and dynamically populate information
			 * into the view based on api feedback.
			 */
			render: function(number) {
				this.step = number;
				var _this = this;
				$.getJSON("/facebook.ferguson.com/api/steps/load?number="+ this.step, function(data) {
					_this.$el
						.html(_.template(stepHTML, {
							"title": _this.getTitle(),
							"buckets": data.response,
							"step": _this.step
						}))
						.attr("class", "step");

					if(_this.step == 5) {
						$("#next").hide(function() {
							$("#see-your-results").css("display", "block");
						});
					}

					$(".bucket").last().addClass("last");
				});
			},

			/**
			 * Callback for when user clicks on "See Your Results" button
			 */
			seeYourResultsClickCallback: function() {
				this.hideErrorMsg();
				if(this.getCheckedValue() !== false) { // one of the buckets has been selected.
					appRouter.navigate("/facebook.ferguson.com/see-your-results", {
						trigger:true,
						replace:true
					});
				} else {
					this.showErrorMsg();
				}
			},

			showErrorMsg: function() {
				this.$el.append(_.template(errorHTML, {
					"message": "Please select the option that best fits you."
				}));
			}
		});
		
		return new stepView;
	}
);