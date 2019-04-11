<nav class="main-menu">
	<div class="menu-block">
		<div class="trip-transport">
			<div class="trip-transport-item"> <a href=""> Автобусные туры </a> </div>
			<div class="trip-transport-item"> <a href=""> Авиационные туры </a></div>
			<div class="trip-transport-item"> <a href=""> Круизы </a> </div>
		</div>
		@include('components.logo')
		<div class="right-menu">
			<div class="user trip-user-item">
				
					@include('components.user-or-guest', ['text' => 'Вход/Регистрация'])
				
			</div>
			<div>	
				<a href="#">				
					<i class="fas fa-shopping-cart"></i> &nbsp; Корзина (3555 <i class="fab fa-btc"> )</i>
				</a>
			</div>
		</div>
	</div>

	<div class="operation-block">
		<div class="search-field">
			<input class="search-tour mod_text-2" type="text" placeholder="Поиск предложения">
			<a class="search" href="#"><i class="fas fa-search"></i></a>
		</div>
		<div class="single-btn mod-white mod-180">
			<i class="fas fa-plus"></i>&nbsp; Добавить тур
		</div>
	</div>
</nav>