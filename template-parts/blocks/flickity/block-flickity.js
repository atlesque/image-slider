(function ($) {
	/**
	 * initializeBlock
	 *
	 * Adds custom JavaScript to the block HTML.
	 *
	 * @date    23/11/20
	 * @since   1.0.0
	 *
	 * @param   object $block The block jQuery element.
	 * @param   object attributes The block attributes (only available when editing).
	 * @return  void
	 */
	var initializeBlock = function ($block) {
		$images_container = $block.find('.flickity-container');
		const dataString = $images_container.attr("data-flickity");
		const flickitySettings = dataString != null ? JSON.parse(dataString) : {};
		$images_container.flickity(flickitySettings);
	};

	// Initialize each block on page load (front end).
	$(document).ready(function () {
		$('.flickity').each(function () {
			initializeBlock($(this));
		});
	});

	// Initialize dynamic block preview (editor).
	if (window.acf) {
		window.acf.addAction(
			'render_block_preview/type=flickity',
			initializeBlock
		);
	}
})(jQuery);
