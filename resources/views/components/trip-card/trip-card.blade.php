 <div class="trip-card {{ $oneTour['showClass'] }}" data-id={{$oneTour['id']}}> 
<!-- hover продавца - докинуть класс seller-hover
     hover клиента - докинуть класс client-hover -->
    <div class="trip-card_picture">
      <img class="foto" src="{{$oneTour['img']}}" alt="Beauty">
              <div class="trip-card_seller-modal">
                <div class="seller-choice">
                  <img class="seller-choice_image" src="/img/pencil-edit-button.svg" alt="П">
                </div>
                <div class="seller-choice">
                  <img class="seller-choice_image" src="/img/rubbish-bin.svg" alt="П">
                </div>
              </div>
    
      <div class="trip-condition_wrapper">
        <div class="trip-condition">
          <img  class="trip-condition_type" src="{{$oneTour['typeImage']}}" alt="П">
          <div class="trip-condition_duration"> {{$oneTour['duration']}}</div>
          <div class="trip-condition_hotel"> {{$oneTour['hotel']}}</div>
        </div>
        <div class="trip-condition">
            <div class="trip-condition_cost">{{$oneTour['price']}}</div>
            <div class="trip-condition_currency"><i class="fab fa-btc"></i> </div>
        </div>
      </div>
      
    </div>
    <div class="trip-card_proposition">
      <div class="trip-description">
          <div class="trip-description_where">
              <p class="trip-description_kurort">{{$oneTour['name']}}</p>
              <p class="trip-description_route">{{$oneTour['startLocation']}}</p>
          </div>
          <a href="{{route('to_basket', ['id' => $oneTour['id']])}}" class="single-btn mod_green mod_140">Заказать</a>
      </div>
    </div>
  </div>  
