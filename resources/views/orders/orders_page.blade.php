@extends('layouts.main')



@section('content')

	@include('components.main-menu.main-menu')

    @include('components.main-menu.mob-head-menu')

	@include('components.main-menu.mob-main-menu')

	<section class="orders">
		<div class="orders_header">
			<div class="breadcrumbs">
				<div class="breadcrumbs_item"> Главная</div>
				<div class="breadcrumbs_item"> Василий Пупкин</div>
				<div class="breadcrumbs_item"> {{ $title }}</div>
			</div>

			<h1 class="orders_title mod_header-3">{{ $title }}</h1>
		</div>
		
		<div class="orders_list">

			@foreach($orders as $oneOrder)

				<div class="oneorder">
					<div class="oneorder_header mod_header-4">
						<div class="oneorder_number">№ {{$oneOrder->id}}</div>
						<div class="oneorder_date">{{$oneOrder->created_at->format('d.m.Y')}}</div>
						<div class="oneorder_owner">
						  @if (Route::currentRouteName() == 'orders_page')
							{{$oneOrder->buyer->first_name . ' ' . $oneOrder->buyer->last_name}}
						  @else 
							{{$oneOrder->seller->first_name . ' ' . $oneOrder->seller->last_name}}
						  @endif
						</div>
						<div class="oneorder_details">Подробности</div>
						<div class="oneorder_details-sign"><i class="fas fa-angle-down"></i></div>
					</div>

					<div class="oneorder_content">

						@foreach ($oneOrder->tours as $oneTour)
							<div class="onetrip">
								<div class="onetrip_picture"><img src="{{$oneTour['img']}}" alt=""></div>
								<div class="onetrip_details">
									<div class="onetrip_details-name mod_text-2">{{$oneTour['conditions']}}</div>
									<div class="onetrip_details-cost mod_header-4">
										<div class="sum">{{$oneTour['price']}}&nbsp;</div>
										<div class="currency"><i class="fab fa-btc"></i></div>
									</div>
								</div>	
							</div>
						@endforeach

					</div>
				</div>
			@endforeach
			@include('components.pagination.pagination')
		</div>
		

	</section>

	@include('components.footer.footer')

	@include('components.popup-window')
	
@endsection