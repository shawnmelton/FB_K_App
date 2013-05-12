define([
	"jquery",
	"underscore",
	"backbone",
	'text!templates/step.html'
	], function($, _, Backbone, stepHTML){
		var stepView = Backbone.View.extend({
			el: "#content",
			step: 0,
			user: false,
			purpose: false,

			events: {
				"click #next": "loadNextClickCallback",
				"click #see-your-results": "seeYourResultsClickCallback",
				"click #buckets > div": "bucketClickCallback"
			},

			/**
			 * "Next" button (or "See Your Results"), should be deactivated
			 * until the user has made a selection.
			 */
			activateNextButton: function() {
				$("#next, #see-your-results").removeClass("disabled");
			},

			/**
			 * Add a bounce effect to the bucket being hovered.
			 */
			addButtonBoundEffect: function() {
				$("#buckets > div").hover(function() {
					$(this).animate({
						marginTop: "-5px",
						paddingBottom: "5px"
					}, 150);
				}, function() {
					$(this).animate({
						marginTop: "0px",
						paddingBottom: "0px"
					}, 150);
				});
			},

			/**
			 * Handle what happens when a bucket is clicked.
			 */
			bucketClickCallback: function(event) {
				$(event.currentTarget).find("input").prop("checked", true);
				this.activateNextButton();
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
			 * Handle what happens when the Next button is clicked.
			 */
			loadNextClickCallback: function() {
				var chkdValue = this.getCheckedValue();
				if(this.step < 6 && chkdValue !== false) { // one of the buckets has been selected.
					switch(this.purpose) {
						case "style": this.user.scoreStyle(chkdValue); break;
						case "color": this.user.set({color: chkdValue}); break;
						case "cost": this.user.set({cost: chkdValue}); break;
					}

					appRouter.navigate(fbkUrlroot +"questions/"+ (this.step + 1), {
						trigger:true,
						replace:true
					});
				}
			},

			/**
			 * Fetch all of the bucket information and dynamically populate information
			 * into the view based on api feedback.
			 */
			render: function(number, usr) {
				this.step = number;
				this.user = usr;
				var _this = this;
				$.getJSON(fbkUrlroot +"api/steps/load", {
					placement: this.step,
					style: this.user.getStyle(),
					version: this.user.get("version")
				}, function(data) {
					if(data.response && data.response.heading) {
						_this.purpose = data.response.purpose; // What will the question help us determine?
						_this.$el
							.html(_.template(stepHTML, {
								"heading": data.response.heading,
								"subheading": data.response.subHeading,
								"buckets": data.response.options,
								"step": _this.step,
								"domain": fbkUrlroot
							}))
							.attr("class", "step");

						if(_this.step == 6) {
							$("#next").fadeOut(function() {
								$("#see-your-results").css("display", "block");
							});
						}

						$("#buckets > div").last().addClass("last");

						_this.addButtonBoundEffect();
						setTimeout(_this.showOptions, 500);						
					}
				});
			},

			/**
			 * Callback for when user clicks on "See Your Results" button
			 */
			seeYourResultsClickCallback: function() {
				var chkdValue = this.getCheckedValue();
				if(chkdValue !== false) { // one of the buckets has been selected.
					this.user.set({operation: chkdValue})
					appRouter.navigate(fbkUrlroot +"see-your-results", {
						trigger:true,
						replace:true
					});
				}
			},

			/**
			 * Hide loading and reveal the options for this step/question.
			 */
			showOptions: function() {
				$("#buckets").addClass("loaded");
			}
		});
		
		return new stepView;
	}
);