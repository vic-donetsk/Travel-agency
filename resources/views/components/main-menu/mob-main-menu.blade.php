<div class="mobile-menu_wrapper">
    <div class="mobile-menu">
        <div class="mobile-menu_items">
            <div class="mobile-trip-transport">
                <div class="mod_header-3"><a href="{{route('search_page', ['category' => 1])}}"> Автобусные туры </a></div>
                <div class="mod_header-3"><a href="{{route('search_page', ['category' => 2])}}"> Авиационные туры </a></div>
                <div class="mod_header-3"><a href="{{route('search_page', ['category' => 3])}}"> Круизы </a></div>
            </div>
            <div class="user mod_header-3">
                
                    @include('components.main-menu.user-or-guest', ['text' => 'Войти'])
                
            </div>

            <a href="{{route('trip_create')}}" class="single-btn mod_green mod_max-size"><i class="fas fa-plus"></i>&nbsp; Добавить тур</a>
        </div>
    </div>
</div>
