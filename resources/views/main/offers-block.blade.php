<section class="offers-block">
	<?php $show_class = ['main-propositions', 'main-propositions', 'next-propositions', 'next-propositions', 'hidden-on-mobile-propositions', 'hidden-on-mobile-propositions','hidden-on-mobile-propositions','hidden-on-mobile-propositions']; ?>
		
		<div class="tripBlock">
			<div class="tripBlock_title">
				<div class="tripBlock_title_header"> ColorLife рекомендует</div>
				<div class="tripBlock_title_link">
					<a href="#">Показать все (598) &nbsp;<i class="fas fa-long-arrow-alt-right"></i></a>
				</div>
			</div>
			<div class="tripBlock_cards">
		       
	            @each('components.trip-card', $show_class, 'show')
		       
			</div>
		</div>

		<div class="tripBlock">
			<div class="tripBlock_title">
				<div class="tripBlock_title_header"> Горящие туры </div>
				<div class="tripBlock_title_link">
					<a href="#">Показать все (598) &nbsp;<i class="fas fa-long-arrow-alt-right"></i></a>
				</div>
			</div>
			<div class="tripBlock_cards">

	            @each('components.trip-card', $show_class, 'show')

			</div>
		</div>
</section>