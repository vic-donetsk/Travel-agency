	@auth
		<a href="#"> <img class="user-foto"src="/img/user.png" alt=""> </a>
		<a href="#" class="user-name"> Василий Пупкин </a>
	@else
		<a href="#" class="user-name"> {{ $text }} </a>
	@endauth 
