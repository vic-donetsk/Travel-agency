<section class="offers-block">
		<div class="trip-block">
			<div class="trip-block-title">
				<div class="trip-block-title-header"> ColorLife рекомендует</div>
				<div class="trip-block-title-link">
					<a href="#">Показать все (598) &nbsp;<i class="fas fa-long-arrow-alt-right"></i></a>
				</div>
			</div>
			<div class="trip-block-cards">
				<?php $show_class = ['firsts', 'firsts', 'nexts', 'nexts', 'others', 'others','others','others']; ?>
		        <div class="trip-block-cards-show">
		            @each('components.trip-card', $show_class, 'show')
		        </div>
			</div>
		</div>

		<div class="trip-block">
			<div class="trip-block-title">
				<div class="trip-block-title-header"> Горящие туры </div>
				<div class="trip-block-title-link">
					<a href="#">Показать все (598) &nbsp;<i class="fas fa-long-arrow-alt-right"></i></a>
				</div>
			</div>
			<div class="trip-block-cards">
				<?php $show_class = ['firsts', 'firsts', 'nexts', 'nexts', 'others', 'others','others','others']; ?>
		        <div class="trip-block-cards-show">
		            @each('components.trip-card', $show_class, 'show')
		        </div>
			</div>
		</div>



	</section>