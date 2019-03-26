@isset($user_name)
	<img class="user-foto"src="{{ $user_foto }}" alt=""> {{ $user_name }}
@endisset
@empty($user_name)
	<i class="far fa-user"></i>&nbsp;{{ $text }}
@endempty 