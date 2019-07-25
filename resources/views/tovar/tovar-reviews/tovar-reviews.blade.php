<section class="tovar-reviews">
	
	@foreach ($mainTour->comments as $oneComment)
		<div class="review_wrapper">
			<img class="review_author-foto" src=
				@if ($oneComment->avatar) "{{$oneComment->avatar}}"
					@else  "/img/user.jpg"
				@endif " alt="">
			<div class="review">
				<div class="review_data">
					<div class="review_data_title">
						<div class="review_data_author-name">
							@if ($oneComment->firstName)
								{{$oneComment->firstName . ' ' . $oneComment->lastName}}
							@else 
								{{$oneComment->author_name}}
							@endif
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
