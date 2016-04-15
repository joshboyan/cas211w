<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */
?>

		</div><!-- #main -->

<div class="color-border">
</div>
<div class="footer">
	<div class="container">
		<div class="infooter">
			<?php echo comicpress_copyright(); ?>
		</div>
		<ul class="socialmedia">
			<li><a href="https://www.facebook.com/NiftyTours" target="_blank"><i class="icon-facebook"></i></a></li>
			<li><a href=""><i class="icon-twitter"></i></a></li>
			<li><a href=""><i class="icon-dribbble"></i></a></li>
			<li><a href=""><i class="icon-linkedin"></i></a></li>
			<li><a href=""><i class="icon-instagram"></i></a></li>
		</ul>
	</div>
</div>
<script type="text/javascript" src="js/jquery.nicescroll.min.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
		$('#simple-menu').sidr({
			side: 'right'
		});
	});
	$('.responsive-menu-button').sidr({
		name: 'sidr-main',
		source: '#navigation',
		side: 'right'

	});
	$(document).ready(
		function() {
			$("html").niceScroll({cursorborder:"0px solid #fff",cursorwidth:"5px",scrollspeed:"70"});
		}
	);
</script>
	</div><!-- #page -->

	<?php wp_footer(); ?>
</body>
</html>