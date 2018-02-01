(function ($) {
	'use strict';

	/**
	 * All of the code for your admin-facing JavaScript source
	 * should reside in this file.
	 *
	 * Note: It has been assumed you will write jQuery code here, so the
	 * $ function reference has been prepared for usage within the scope
	 * of this function.
	 *
	 * This enables you to define handlers, for when the DOM is ready:
	 *
	 * $(function() {
	 *
	 * });
	 *
	 * When the window is loaded:
	 *
	 * $( window ).load(function() {
	 *
	 * });
	 *
	 * ...and/or other possibilities.
	 *
	 * Ideally, it is not considered best practise to attach more than a
	 * single DOM-ready or window-load handler for a particular page.
	 * Although scripts in the WordPress core, Plugins and Themes may be
	 * practising this, we should strive to set a better example in our own work.
	 */
	//create a mutation observer to look for added 'attachments' in the media uploader
	$(document).ready(function () {

		var timeBefore = new Date();

		var svgAttachmentIds_unprocessed = [];
		var svgAttachmentIds_proccessed = [];

		var observer = new MutationObserver(function (mutations) {

			// look through all mutations that just occured
			for (var i = 0; i < mutations.length; i++) {

				// look through all added nodes of this mutation
				for (var j = 0; j < mutations[i].addedNodes.length; j++) {

					//get the applicable element
					var element = $(mutations[i].addedNodes[j]);

					//execute only if we have a class
					if (element.attr('class')) {

						// The div has .attachment class
						if (element.attr('class').includes('attachment')) {

							//find attachment inner (which contains subtype info)
							var isSvg = element.find('.filename').text().includes('.svg');
							svgAttachmentIds_unprocessed.push(element.attr('data-id'));

							//only run for SVG elements
							if (isSvg) {

								//bind an inner function to element so we have access to it.
								var handler = function (element) {

									//do a WP AJAX call to get the URL

								}(element);

							}
						}
					}
				}
			}
			console.log('done');
			// console.log(svgAttachmentIds);
			console.log('Unprocessed:' + svgAttachmentIds_unprocessed.length);
			svgAttachmentIds_proccessed = svgAttachmentIds_proccessed.concat(svgAttachmentIds_unprocessed);
			svgAttachmentIds_unprocessed = [];
			console.log('Processed:' + svgAttachmentIds_proccessed.length);


			$.ajax({
				url: ajaxurl,
				data: {
					'action': 'svg_get_attachment_url',
					'attachmentID': element.attr('data-id')
				},
				success: function (data) {
					if (data) {
						//replace the default image with the SVG
						element.find('img').attr('src', data);
						element.find('img').css({ 'width': '100%', 'top': '12px' });
						element.find('.filename').text('SVG Image');
						var timeAfter = new Date().getMilliseconds();
						console.log(timeAfter - timeBefore);
					}
				}
			});

			// console.log(timeAfter - timeBefore);
		});

		observer.observe(document.body, {
			childList: true,
			subtree: true
		});


	});

})(jQuery);
