<section class="swiper">
	<div class="swiper-container main-swiper">
	    <div class="swiper-wrapper">
	        <!-- Slides -->
	        @foreach ($inTop as $oneTour)
		        <div class="swiper-slide">
		        		<img class="swiper-slide_image" src="{{ $oneTour['img'] }}" alt="">
		        		<div class="swiper-slide_describe">
		        			<p class="swiper-slide_describe_title">{{ $oneTour['name'] }}</p>
		        			<p class="swiper-slide_describe_slogan">{{ $oneTour['description'] }}</p>
		        			<div class="single-btn mod_160 mod_transparent">Перейти к туру</div>
		        		</div>
		        </div>
	        @endforeach
	    </div>
	</div>
</section>