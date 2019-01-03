<?php wp_footer(); ?>
<script>
	$(document).ready(function(){
		$('#owl-carousel1').owlCarousel({
			loop:true,
			margin:10,
			items:1,
			autoplay:true,
			URLhashListener:true,
			autoplayHoverPause:true,
			startPosition: 'URLHash',
		});
		$('#owl-carousel2').owlCarousel({
			loop:true,
			margin:10,
			items:5,
		});
		$('#owl-carouselhash').owlCarousel({
			loop:true,
			margin:10,
			items:4,
		});
	});
</script>

</body>
</html>