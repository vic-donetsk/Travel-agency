@isset($user_name)
	<img class="user-foto"src="{{ $user_foto }}" alt=""> 
	<p class="user-name"> {{ $user_name }} </p>
@endisset
@empty($user_name)
	<i class="far fa-user"></i>&nbsp;{{ $text }}
@endempty 