	@isset($user_name)
		<a href="#"> <img class="user-foto"src="{{ $user_foto }}" alt=""> </a>
		<a href="#" class="user-name"> {{ $user_name }} </a>
	@endisset
	@empty($user_name)
		<a href="#"><i class="far fa-user"></i></a>
		<a href="#" class="user-name"> {{ $text }} </a>
	@endempty 
