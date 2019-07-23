	@auth
		<a href="#"> <img class="user-foto"src={{$activeUser['foto']}} alt=""> </a>
		<a href="#" class="user-name"> {{$activeUser['name']}} </a>
	@else
		<a href="{{ route('login') }}"><i class="far fa-user"></i></a>
		<a href="{{ route('login') }}" class="user-name"> {{ $text }} </a>
	@endauth
