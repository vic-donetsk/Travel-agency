<div class="main-view_trip-cards">
	@php $show_class = ['main-trip', 'main-trip', 'main-trip', 'main-trip', 'main-trip', 'hidden-on-mobile-trip','hidden-on-mobile-trip', 'hidden-on-mobile-trip','hidden-on-tablet-trip']; 
	@endphp

	  @each('components.trip-card.trip-card', $show_class, 'show')
	
	<div class="main-view_trip-cards_pagination">
		@include('components.pagination')
	</div>	

</div>