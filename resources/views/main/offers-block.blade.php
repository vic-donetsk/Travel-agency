<section class="offers-block">
	<?php $show_class = ['main-propositions', 'main-propositions', 'next-propositions', 'next-propositions', 'hidden-on-mobile-propositions', 'hidden-on-mobile-propositions','hidden-on-mobile-propositions','hidden-on-mobile-propositions']; ?>
		
		<div class="trip-block">
			<div class="trip-block_title">
				<p class="trip-block_title_header"> ColorLife рекомендует</p>
				<a class="trip-block_title_link"href="#">Показать все (598) &nbsp;<i class="fas fa-long-arrow-alt-right"></i></a>
			</div>
			<div class="trip-block_cards">
		       
	            @each('components.trip-card', $show_class, 'show')
		       
			</div>
		</div>

		<div class="trip-block">
			<div class="trip-block_title">
				<div class="trip-block_title_header"> Горящие туры </div>
				<div class="trip-block_title_link">
					<a href="#">Показать все (598) &nbsp;<i class="fas fa-long-arrow-alt-right"></i></a>
				</div>
			</div>
			<div class="trip-block_cards">

	            @each('components.trip-card', $show_class, 'show')

			</div>
		</div>
</section>