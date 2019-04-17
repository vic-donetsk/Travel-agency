<section class="main-menu-wrapper">
	<nav class="main-menu">
		<div class="main-menu_menu-block">
			<div class="main-menu_menu-block_trip-transport">
				<div class="trip-transport_item"> <a href=""> Автобусные туры </a> </div>
				<div class="trip-transport_item"> <a href=""> Авиационные туры </a></div>
				<div class="trip-transport_item"> <a href=""> Круизы </a> </div>
			</div>
			@include('components.logo')
			<div class="main-menu_menu-block_right-menu">
				<div class="user mod_trip-user-item">
					
						@include('components.user-or-guest', ['text' => 'Вход/Регистрация'])
					
				</div>
				<div>	
					<a href="#">				
						<i class="fas fa-shopping-cart"></i> &nbsp; Корзина (3555 <i class="fab fa-btc"> )</i>
					</a>
				</div>
			</div>
		</div>

		<div class="main-menu_operation-block">
			<div class="main-menu_operation-block_search-field">
				<input class="search-tour mod_text-2" type="text" placeholder="Поиск предложения">
				<button type="submit" class="search-sign"><i class="fas fa-search"></i></a>
			</div>
			<div class="single-btn mod_white mod_180">
				<i class="fas fa-plus"></i>&nbsp; Добавить тур
			</div>
		</div>
	</nav>
</section>