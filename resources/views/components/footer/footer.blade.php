</div> {{--body_wrapper--}}

<footer class="footer">
	<a href="{{route('trip_create')}}" class="single-btn mod_green mod_170"><i class="fas fa-plus"></i>&nbsp; Добавить тур</a>
	<div class="user mod_header-3 mod_footer">
		
			@include('components.main-menu.user-or-guest_footer', ['text' => 'Вход / Регистрация'])
		
	</div>
	<div class="footer_authors mod_text-2">
		<div class="author"> Design from Zirella </div>
		<div class="author"> © ColorLife, 2018 </div>
	</div>
</footer>
