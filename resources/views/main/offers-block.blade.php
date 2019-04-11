<section class="offers-block">
		<div class="tripBlock">
			<div class="tripBlock_title">
				<div class="tripBlock_title_header"> ColorLife рекомендует</div>
				<div class="tripBlock_title_link">
					<a href="#">Показать все (598) &nbsp;<i class="fas fa-long-arrow-alt-right"></i></a>
				</div>
			</div>
			<div class="tripBlock_cards">
				<?php $show_class = ['firsts', 'firsts', 'nexts', 'nexts', 'others', 'others','others','others']; ?>
		       
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
				<?php $show_class = ['firsts', 'firsts', 'nexts', 'nexts', 'others', 'others','others','others']; ?>

	            @each('components.trip-card', $show_class, 'show')

			</div>
		</div>



	</section>