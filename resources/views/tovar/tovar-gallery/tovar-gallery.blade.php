<section class="gallery seller-more-tovars">

	@foreach ($showTours['data'] as $oneTour)

         @include('components.trip-card.trip-card', ['oneTour' => $oneTour])

    @endforeach

    @if ($showTours['count'] > 3)

		<div class="gallery_show-more">
			<div class="gallery_show-more_link">
				<a href={{route('seller_page', ['id' => $mainTour->seller_id])}}>
					<img class="plus" src="/img/plus.svg" alt="">
				</a>
			</div>
			<div class="gallery_show-more_text">
				{{ $text }} 
			</div>
		</div>

	@endif

</section>