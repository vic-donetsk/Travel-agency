<div class="main-view_trip-cards">

	<div class="trip-cards_wrapper">
	
		@foreach ($selectedTours['data'] as $oneTour)

	         @include('components.trip-card.trip-card', ['oneTour' => $oneTour])

	    @endforeach
    </div>
	
	<div class="main-view_trip-cards_pagination">
		@include('components.pagination.pagination')
	</div>	
	

</div>