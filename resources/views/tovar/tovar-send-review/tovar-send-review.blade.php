<section class="send-review_wrapper">
	<form method="post" class="send-review" action="{{route('send_review', ['tour_id' => $mainTour->id])}}">
		@csrf
	
		<div class="send-review_content">
			<textarea type="textarea" placeholder="Сообщение" name="review" required></textarea>
		</div>

		<div class="send-review_info">
			<input class="send-review_info_input" type="text" pattern="[A-Za-zА-Яа-я0-9-_ ]+" placeholder="Ваше имя"
              name="author_name" value="{{$user['name']}}"required/>
			<input class="send-review_info_input" type="email" placeholder="Email" name="author_email" value="{{$user['email']}}" required/>
			<input type="submit" class="single-btn mod_blue" value="Отправить" />
		</div>

	</form>
</section>
