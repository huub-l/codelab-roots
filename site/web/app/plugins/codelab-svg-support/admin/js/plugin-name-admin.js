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

		var svgAttachmentIds_unprocessed = [];
		var fetchedSrc = null;

		var observer = new MutationObserver(function (mutations) {

			// Reset on each mutation
			svgAttachmentIds_unprocessed = [];

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
							svgAttachmentIds_unprocessed.push(element.attr('data-id'));
						}
					}
				}
			}

			if (svgAttachmentIds_unprocessed.length && svgAttachmentIds_unprocessed[0] !== undefined) {
				// console.log(svgAttachmentIds_unprocessed);
				// console.log(svgAttachmentIds_unprocessed[0]);
				// console.log(svgAttachmentIds_unprocessed);
				// console.log('Processing AJAX...');
				$.ajax({
					url: ajaxurl,
					data: {
						'action': 'svg_get_attachment_url',
						'attachmentIds': svgAttachmentIds_unprocessed
					},
					success: function (data) {
						console.log(data);
						console.log('data fetched');
						// Loop through data, and bind the image to the correct item
						if (data) {
							if (data.length === 1 && $('body.post-type-attachment').hasClass('modal-open')) {
								fetchedSrc = data[0].src;
								$('img.details-image').attr('src', fetchedSrc);
							}
							data.forEach(function (attachment) {
								var item = $('.attachment[data-id="' + attachment.id + '"]');
								var image = item.find('img');
								image.attr('src', attachment.src)
									.hide()
									.css({ 'width': '100%', 'top': '10px' })
									.delay(50)
									.show(0);
								// If we open detail modal

							});
						}
					}
				});
			}

		});

		observer.observe(document.body, {
			childList: true,
			subtree: true
		});

		// If media open
		if (wp.media) {
			wp.media.view.Modal.prototype.on('open', function () {
				console.log('media modal open');
			});
		}

	});

})(jQuery);


(function ($) {
	$(document).ready(function () {
		// wp.media.view.MediaDetails.on('open', function () {
		// 	// Clever JS here
		// 	alert('open');
		// });
	});
})(jQuery);
