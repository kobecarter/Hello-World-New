/* Auto-pan the "site internet" / "version mobile" preview screenshots inside
   .rd-split-img so the full page height is revealed over time instead of a
   static crop of the top of the page. Only runs on images taller than their
   frame, and only while the block is on screen. */
(function () {
	if (window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches) return;

	var frames = document.querySelectorAll('.rd-split-img-inner');
	if (!frames.length || !('IntersectionObserver' in window)) return;

	var visible = new Set();

	var io = new IntersectionObserver(function (entries) {
		entries.forEach(function (entry) {
			var inner = entry.target;
			if (entry.isIntersecting) visible.add(inner);
			else visible.delete(inner);

			var anim = inner._autoScrollAnim;
			if (anim) {
				if (entry.isIntersecting) anim.play();
				else anim.pause();
			}
		});
	}, { threshold: 0.15 });

	frames.forEach(function (inner) {
		io.observe(inner);

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
			inner._autoScrollAnim = anim;
			if (visible.has(inner)) anim.play();
		}

		if (img.complete && img.naturalWidth) start();
		else img.addEventListener('load', start, { once: true });
	});
})();
