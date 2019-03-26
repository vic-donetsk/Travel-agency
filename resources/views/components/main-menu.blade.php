<div class="main-menu">
	<div class="menu-block">
		<div class="trip-transport"> <a href=""> Автобусные туры </a> </div>
		<div class="trip-transport"> <a href=""> Авиационные туры </a></div>
		<div class="trip-transport"> <a href=""> Круизы </a> </div>
		@include('components.logo')
		<div class="user">
			<a href="#">
				@include('components.user-or-guest', ['text' => 'Вход/Регистрация'])
			</a>
		</div>
		  	
		<div>	
			<a href="#">				
				<i class="fas fa-shopping-cart"></i> &nbsp; Корзина (3555 <i class="fab fa-btc"> )</i>
			</a>
		</div>
	</div>

	<div class="operation-block">
		<div class="search-field">
			<input class="search-tour text-2" type="text" placeholder="Поиск предложения">
			<a class="search" href="#"><i class="fas fa-search"></i></a>
		</div>
		<div class="btn-white">
			<i class="fas fa-plus"></i>&nbsp; Добавить тур
		</div>
	</div>
</div>