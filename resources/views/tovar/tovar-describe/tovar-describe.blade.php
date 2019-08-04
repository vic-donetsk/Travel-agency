<div class="tovar_describe">
	<a href="{{route('search_page', ['type' => $mainTour->type->id])}}" class="tovar_describe_type">{{$mainTour->type->name}}</a>
	<a href="{{route('search_page', ['category' => $mainTour->category->id])}}" class="tovar_describe_type">{{$mainTour->category->name}}</a>
	<div class="tovar_describe_text">{{$mainTour->description}}</div>
</div>
