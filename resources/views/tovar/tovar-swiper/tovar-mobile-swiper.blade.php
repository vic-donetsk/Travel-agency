<div class="swiper-container tovar-mobile-swiper">
    <div class="swiper-wrapper">

      <div class="swiper-slide" style="background-image:url({{$mainTour->main_img->path}})"></div>
      @foreach ($mainTour->media as $img)
      	<div class="swiper-slide" style="background-image:url({{$img->path}})"></div>
      @endforeach
      
    </div>
</div>