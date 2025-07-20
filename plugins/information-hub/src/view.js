/**
 * Use this file for JavaScript code that you want to run in the front-end 
 * on posts/pages that contain this block.
 *
 * When this file is defined as the value of the `viewScript` property
 * in `block.json` it will be enqueued on the front end of the site.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/block-api/block-metadata/#view-script
 */

document.addEventListener('DOMContentLoaded', function() {
	// Add smooth scrolling for anchor links within the information hub
	const infoHubLinks = document.querySelectorAll('.wp-block-create-block-information-hub .card-list.links a[href^="#"]');
	
	infoHubLinks.forEach(link => {
		link.addEventListener('click', function(e) {
			const href = this.getAttribute('href');
			
			// Only handle anchor links
			if (href && href.startsWith('#') && href.length > 1) {
				const target = document.querySelector(href);
				
				if (target) {
					e.preventDefault();
					target.scrollIntoView({
						behavior: 'smooth',
						block: 'start'
					});
				}
			}
		});
	});

	// Add hover effect for cards
	const cards = document.querySelectorAll('.wp-block-create-block-information-hub .information-card');
	
	cards.forEach(card => {
		card.addEventListener('mouseenter', function() {
			this.style.transform = 'translateY(-5px)';
		});
		
		card.addEventListener('mouseleave', function() {
			this.style.transform = 'translateY(0)';
		});
	});
});