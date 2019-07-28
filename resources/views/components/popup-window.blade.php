@auth
	<section class="popup-window_wrapper">
		<div class="popup-window">
			
			<div class="popup-window_item mod_text-2"> <a href="{{route('seller_page', ['sellerId' => $activeUser['id']])}}"> <i class="fas fa-tag"></i> &nbsp; Мои предложения </a></div>
			<div class="popup-window_item mod_text-2"> <a href="{{ route('purchases_page') }}"> <i class="fas fa-shield-alt"></i> &nbsp; Мои покупки </a></div>
			<div class="popup-window_item mod_text-2"> <a href="{{ route('orders_page') }}"> <i class="far fa-bell"></i> &nbsp; Мои заказы </a></div>
			<div class="popup-window_item mod_text-2"> <a href="{{route('user_edit', ['id' => $activeUser['id']])}}"> <i class="far fa-user"></i> &nbsp; Личные данные </a></div>

			<div class="popup-window_exit mod_text-2"> 
				<a href="{{ route('logout') }}" onclick="event.preventDefault();
                	document.getElementById('logout-form').submit();""> 
                	Выйти &nbsp; <i class="fas fa-sign-out-alt"></i> 
                </a>
            </div>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>

		</div>
	</section>
@endauth










