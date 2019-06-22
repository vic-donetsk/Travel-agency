<section class="gallery seller-more-tovars">
	@php $show_class = ['main-card', 'main-card', 'main-card']; @endphp

	@each('components.trip-card.trip_card', $show_class, 'show')

		<div class="gallery_show-more">
			<div class="gallery_show-more_link">
				<img class="plus" src="img/plus.svg" alt="">
			</div>
			<div class="gallery_show-more_text">
				{{ $test }}
			</div>
		</div>

</section>