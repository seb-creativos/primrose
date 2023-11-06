				</main> <!-- #siteMain -->

				<!-- Footer -->
				<footer id="siteFooter" class="reveal__container bg-primary text-white py-60">
					<?php render_pattern('Footer') ?>
				</footer>

				<!-- WS Form Dynamic Enqueue Hack
				In order to use WS Form with Barba.js
				and not disable dynamic enqueue:
				Use the most complex form to enqueue
				its dependencies across the website.
				-->
				<div class="d-none">
					<?= do_shortcode('[ws_form id="1"]') ?>
				</div>

			</div> <!-- #smooth-content -->
		</div> <!-- #smooth-wrapper -->
	</div> <!-- #appWrapper -->
<?php wp_footer(); ?>
</body>
</html>