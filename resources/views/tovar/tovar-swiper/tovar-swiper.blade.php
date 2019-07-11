				  <!-- Swiper -->

<div class="tovar_slider">
  <div class="swiper-container tovar-swiper-top">
    <div class="swiper-wrapper">
      <div class="swiper-slide" style="background-image:url({{$mainTour->main_img->path}})"></div>
      @foreach ($mainTour->media as $img)
        <div class="swiper-slide" style="background-image:url({{$img->path}})"></div>
      @endforeach
    </div>
  </div>
  <div class="swiper-container tovar-swiper-thumbs">
    <div class="swiper-wrapper">
      <div class="swiper-slide" style="background-image:url({{$mainTour->main_img->path}})"></div>
      @foreach ($mainTour->media as $img)
        <div class="swiper-slide" style="background-image:url({{$img->path}})"></div>
      @endforeach
    </div>
  </div>
</div>