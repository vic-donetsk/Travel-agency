<section class="mainMenu-wrapper">
	<nav class="mainMenu">
		<div class="mainMenu_menuBlock">
			<div class="mainMenu_menuBlock_tripTransport">
				<div class="tripTransport_item"> <a href=""> Автобусные туры </a> </div>
				<div class="tripTransport_item"> <a href=""> Авиационные туры </a></div>
				<div class="tripTransport_item"> <a href=""> Круизы </a> </div>
			</div>
			@include('components.logo')
			<div class="mainMenu_menuBlock_rightMenu">
				<div class="user mod_tripUserItem">
					
						@include('components.user-or-guest', ['text' => 'Вход/Регистрация'])
					
				</div>
				<div>	
					<a href="#">				
						<i class="fas fa-shopping-cart"></i> &nbsp; Корзина (3555 <i class="fab fa-btc"> )</i>
					</a>
				</div>
			</div>
		</div>

		<div class="mainMenu_operationBlock">
			<div class="mainMenu_operationBlock_searchField">
				<input class="search-tour mod_text-2" type="text" placeholder="Поиск предложения">
				<button type="submit" class="search-sign"><i class="fas fa-search"></i></a>
			</div>
			<div class="single-btn mod_white mod_180">
				<i class="fas fa-plus"></i>&nbsp; Добавить тур
			</div>
		</div>
	</nav>
</section>