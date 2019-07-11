<section class="tovar-reviews">
	
	@foreach ($mainTour->comments as $oneComment)
		<div class="review_wrapper">
			<img class="review_author-foto" src=
				@if ($oneComment->user->avatar) "{{$oneComment->user->avatar}}"
					@else  "/img/review.jpg"
				@endif " alt="">
			<div class="review">
				<div class="review_data">
					<div class="review_data_title">
						<div class="review_data_author-name">
							{{$oneComment->user->first_name . ' ' .
							  $oneComment->user->last_name}}
						</div>
						<div class="review_data_date">{{ $oneComment->stringDateRu }}</div>
					</div>
					<div class="mod_link-style">Показать объявление</div>
				</div>
				<div class="review_content">{{$oneComment->content}}
				</div>
			</div>
		</div>
	@endforeach
</section>
