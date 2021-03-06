<nav class="main-menu">
		<div class="main-menu_first-block">
			<div class="trip-transport">
				<div class="trip-transport_item"> <a href="{{route('search_page', ['category' => 1])}}"> Автобусные туры </a> </div>
				<div class="trip-transport_item"> <a href="{{route('search_page', ['category' => 2])}}"> Авиационные туры </a></div>
				<div class="trip-transport_item"> <a href="{{route('search_page', ['category' => 3])}}"> Круизы </a> </div>
			</div>
			@include('components.logo.logo')
			<div class="main-menu_right">
				<div class="user mod_main-menu">
					
						@include('components.main-menu.user-or-guest', ['text' => 'Вход / Регистрация'])
					
				</div>
				<div>	
					<a href="{{route('basket_page')}}">				
						<i class="fas fa-shopping-cart"></i> &nbsp; Корзина ({{$basketSum}} <i class="fab fa-btc"> )</i>
					</a>
				</div>
			</div>
		</div>

		<div class="main-menu_operation-block">
			<div class="main-menu_operation-block_search-field">
				<input class="search-tour mod_text-2" type="text" placeholder="Поиск предложения">
				<div class="search-sign"><i class="fas fa-search"></i></div>
			</div>
			<a href="{{route('trip_create')}}" class="single-btn mod_white mod_180">
				<i class="fas fa-plus"></i>&nbsp; Добавить тур
			</a>
		</div>
</nav>