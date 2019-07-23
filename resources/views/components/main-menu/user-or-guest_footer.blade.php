	@auth
		<a href="#"> <img class="user-foto"src="{{ $user_foto }}" alt=""> </a>
		<a href="#" class="user-name"> {{ $user_name }} </a>
	@else
		<a href="#" class="user-name"> {{ $text }} </a>
	@endauth 
