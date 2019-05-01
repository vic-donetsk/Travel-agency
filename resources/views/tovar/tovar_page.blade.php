@extends('layouts.main')



@section('content')

	@include('components.main-menu',['text' => 'Вход/Регистрация'])

    @include('components.mob-head-menu')

	@include('components.mob-main-menu',['text' => 'Войти'])

	<div class="tovar_wrapper">
		<div class="breadcrumbs">
			<div class="breadcrumbs_item"> Главная</div>
			<div class="breadcrumbs_item"> Василий Пупкин</div>
			<div class="breadcrumbs_item"> Отель Мараколь Неаполь 4*</div>
		</div>

		<h1 class="tovar_title mod_header-3">Отель Мараколь Неаполь 4*</h1>

		<section class="tovar">

			<div class="tovar_slider">

				@include ('tovar.tovar-swiper')

			</div>

			<div class="tovar_describe">
				<div class="tovar_describe_type">Luxury</div>
				<div class="tovar_describe_type">Автобусный</div>
				<div class="tovar_describe_text">Отель The Makadi Palace 5*, располагающий обширной территорией бассейнами, великолепными садами и отличным песчаным пляжем. Рекомендуется для семейного отдыха с детьми, а также для всех кто ценит покой и тишину. Элегантный променад соединяет отель с соседним отелем The Grand Makadi 5*. Благодаря высокому уровню сервиса, развитой инфраструктуре, удачному расположению и великолепно обустроенной территории Вы получите незабываемый отдых в этом отеле.</div>
			</div>

			<div class="tovar-info">
				<div class="tovar-info_finance_wrapper">
					<div class="tovar-info_finance">
						<div class="price"> 20 000 &nbsp; <i class="fab fa-btc"></i></div>
						<div class="to-cart">
							<div class="single-btn mod_160 mod_blue">В корзину</div>
						</div>
					</div>
				</div>
				<div class="tovar-info_conditions">
					<div class="tovar-info_seller-info">
						<img class="seller-foto"src="img/user.png" alt=""> 
						<div class="tovar-info_conditions_item">
							<div class="conditions_item_title"> Продавец </div>
							<div class="conditions_item_content"> Василий Пупкин </div>
						</div>
					</div>
					<div class="tovar-info_conditions_item">
						<div class="conditions_item_title"> Страна </div>
						<div class="conditions_item_content"> Гренландия </div>
					</div>					
					<div class="tovar-info_conditions_item">
						<div class="conditions_item_title"> Питание </div>
						<div class="conditions_item_content"> Чем Бог пошлет </div>
					</div>					
					<div class="tovar-info_conditions_item">
						<div class="conditions_item_title"> Доступно детям </div>
						<div class="conditions_item_content"> Нет </div>
					</div>					
					<div class="tovar-info_conditions_item">
						<div class="conditions_item_title"> Класс отеля </div>
						<div class="conditions_item_content"> 5* </div>
					</div>
				</div>
			</div>
		</section>

		<h2 class="tovar-section_header">Отзывы</h2>
		
		<section class="tovar-reviews">
			
			<div class="review_wrapper">
				<img class="review_author-foto" src="img/review.jpg" alt="">
				<div class="review">
					<div class="review_data">
						<div class="review_data_title">
							<div class="review_data_author-name">Александра Серова</div>
							<div class="review_data_date">22 сентября 2018</div>
						</div>
						<div class="mod_link-style">Показать объявление</div>
					</div>
					<div class="review_content">Оценивайте трезво ситуацию, зачастую компания еще не готова к крауд-маркетингу. При наличии действительно качественной продукции можно использовать данный метод, однако, упоминание лишь плюсов сделает ваш комментарий неестественным. 
					</div>
				</div>
			</div>

			<div class="review_wrapper">
				<img class="review_author-foto" src="img/review.jpg" alt="">
				<div class="review">
					<div class="review_data">
						<div class="review_data_title">
							<div class="review_data_author-name">Александра Серова</div>
							<div class="review_data_date">22 сентября 2018</div>
						</div>
						<div class="mod_link-style">Показать объявление</div>
					</div>
					<div class="review_content">Не стоит обманывать потенциальных клиентов. Если вам известны все недоработки в сфере услуг или минусы своего товара, то не стоит писать на форумах, что это лучший продукт из всего, что вы когда-либо пробовали. Также не нужно выдумывать дополнительных преимуществ, которыми в действительности ваш продукт не обладает. Оценивайте трезво ситуацию, зачастую компания еще не готова к крауд-маркетингу. При наличии действительно качественной продукции можно использовать данный метод, однако, упоминание лишь плюсов сделает ваш комментарий неестественным. Несовершенства можно найти даже у самых авторитетных производителей, не стесняйтесь упоминать о них в отзывах!? 
					</div>
				</div>
			</div>

		</section>

		<h2 class="tovar-section_header">Написать отзыв</h2>

		<section class="send-review_wrapper">
			<form class="send-review" action="#">

				<div class="send-review_content">
					<textarea type="textarea" placeholder="Сообщение" name="review"></textarea>
				</div>

				<div class="send-review_info">
					<input class="send-review_info_input" type="text" pattern="[A-Z0-9-_]+" placeholder="Ваше имя" name="name"/>
					<input class="send-review_info_input" type="email" placeholder="Email" name="email"/>
					<input type="submit" class="single-btn mod_blue" value="Отправить" />
				</div>

			</form>
		</section>

		<h2 class="tovar-section_header">Еще объявления Василия</h2>

		<section class="gallery seller-more-tovars">
			<?php $show_class = ['main-card', 'main-card', 'main-card']; ?>

			@each('components.trip-card', $show_class, 'show')

				<div class="gallery_show-more">
					<div class="gallery_show-more_link">
						<img class="plus" src="img/plus.svg" alt="">
					</div>
					<div class="gallery_show-more_text">
						Перейти к объявлениям Василия
					</div>
				</div>

		</section>

		<h2 class="tovar-section_header">Еще в категории "Luxury"</h2>

		<section class="gallery category-more-tovars">
			<?php $show_class = ['main-card', 'main-card', 'main-card']; ?>

			@each('components.trip-card', $show_class, 'show')

			<div class="gallery_show-more">
				<div class="gallery_show-more_link">
					<img class="plus" src="img/plus.svg" alt="">
				</div>
				<div class="gallery_show-more_text">
					Перейти в категорию "Luxury"
				</div>
			</div>
			
		</section>

	</div>

		



	@include('components.footer',['text' => 'Вход/Регистрация'])

	@include('components.popup-window')
	
@endsection