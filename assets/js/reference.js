/* Pan the "site internet" / "version mobile" preview screenshots inside
   .rd-split-img so the full page height is revealed while the visitor
   hovers the frame, instead of a static crop of the top of the page. Only
   runs on images taller than their frame, and only while hovered. */
(function () {
	if (window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches) return;

	var frames = document.querySelectorAll('.rd-split-img-inner');
	if (!frames.length) return;

	frames.forEach(function (inner) {
		var img = inner.querySelector('img');
		var frame = inner.closest('.rd-split-img');
		if (!img || !frame) return;

		function start() {
			var overflow = img.offsetHeight - frame.clientHeight;
			if (overflow <= 4) return; // image already fits the frame, nothing to reveal

			inner.style.transition = 'none';
			img.style.willChange = 'transform';

			// Pace the pan at a roughly constant ~110px/s, capped at 30s
			// even for the tallest screenshots.
			var duration = Math.min(Math.max(overflow * 9, 4000), 30000);
			var anim = img.animate(
				[{ transform: 'translateY(0)' }, { transform: 'translateY(-' + overflow + 'px)' }],
				{ duration: duration, easing: 'ease-in-out', direction: 'alternate', iterations: Infinity, fill: 'forwards' }
			);
			anim.pause();

			frame.addEventListener('mouseenter', function () { anim.play(); });
			frame.addEventListener('mouseleave', function () { anim.pause(); });
		}

		if (img.complete && img.naturalWidth) start();
		else img.addEventListener('load', start, { once: true });
	});
})();
