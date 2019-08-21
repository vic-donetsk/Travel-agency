<div class="tovar-info">
	<div class="tovar-info_finance_wrapper">
		<div class="tovar-info_finance">
			<div class="price"> {{$mainTour->price}} &nbsp; <i class="fab fa-btc"></i></div>
			<div class="to-cart">
				<a href="{{route('to_basket', ['id' => $mainTour->id])}}" class="single-btn mod_160 mod_blue">В корзину</a>
			</div>
		</div>
	</div>
	<div class="tovar-info_conditions">
		<div class="tovar-info_seller-info">
			<img class="seller-foto"src= 
				@if ($mainTour->seller->avatar) "{{$mainTour->seller->avatar}}"
					@else  "/img/users.jpg"
				@endif " alt="">
			<div class="tovar-info_conditions_item">
				<div class="conditions_item_title"> Продавец </div>
				<div class="conditions_item_content"> 
					{{$mainTour->seller->first_name . ' ' . $mainTour->seller->last_name}} 
				</div>
			</div>
		</div>
		<div class="tovar-info_conditions_item">
			<div class="conditions_item_title"> Страна </div>
			<div class="conditions_item_content"> {{$mainTour->country->name}} </div>
		</div>					
		<div class="tovar-info_conditions_item">
			<div class="conditions_item_title"> Питание </div>
			<div class="conditions_item_content"> {{$mainTour->diet->name}} </div>
		</div>					
		<div class="tovar-info_conditions_item">
			<div class="conditions_item_title"> Доступно детям </div>
			<div class="conditions_item_content"> 
				@if ($mainTour->for_children) 
						Да
					@else 
						Нет
				@endif
			</div>
		</div>					
		<div class="tovar-info_conditions_item">
			<div class="conditions_item_title"> Класс отеля </div>
			<div class="conditions_item_content"> {{$mainTour->hotel->name}} </div>
		</div>
	</div>
</div>
