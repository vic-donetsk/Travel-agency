<section class="offers-block">
	
		<div class="trip-block">
			<div class="trip-block_title">
				<p class="trip-block_title_header"> ColorLife рекомендует</p>
				<a class="trip-block_title_link" href="{{route('search_page', ['recommended' => '1'])}}">Показать все ({{$inRecommendedCount}}) &nbsp;<i class="fas fa-long-arrow-alt-right"></i></a>
			</div>
			<div class="trip-block_cards">
				@foreach ($recommendedTours as $oneTour)

	                 @include('components.trip-card.trip-card', ['oneTour' => $oneTour])

	            @endforeach
			</div>
		</div>

		<div class="trip-block">
			<div class="trip-block_title">
				<div class="trip-block_title_header"> Горящие туры </div>
				<div class="trip-block_title_link">
					<a href="{{route('search_page', ['hot' => '1'])}}">Показать все ({{$inHotCount}}) &nbsp;<i class="fas fa-long-arrow-alt-right"></i></a>
				</div>
			</div>
			<div class="trip-block_cards">

				@foreach ($hotTours as $oneTour)

	                 @include('components.trip-card.trip-card', ['oneTour' => $oneTour])

	            @endforeach

			</div>
		</div>
</section>