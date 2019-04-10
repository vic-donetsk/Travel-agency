<!-- возможно, типы надо будет забить в БД, тогда вместо готового массива сюда
должен приходить массив-параметр с нужными данными -->
<?php
    $trip_types = [
        ['name' => 'Индустриальный', 'img' => 'img/trip_types/industry.svg'],
        ['name' => 'Шоппинг', 'img' => 'img/trip_types/shopping.svg'],
        ['name' => 'Экстрим', 'img' => 'img/trip_types/extrim.svg'],
        ['name' => 'Luxury', 'img' => 'img/trip_types/luxury.svg'],
        ['name' => 'Всё включено', 'img' => 'img/trip_types/all-inclusive.svg'],
        ['name' => 'Программы развлечений', 'img' => 'img/trip_types/games.svg'],
        ['name' => 'Пляжный', 'img' => 'img/trip_types/beach.svg'],
        ['name' => 'Гастрономический', 'img' => 'img/trip_types/gurman.svg'],
        ['name' => 'SPA', 'img' => 'img/trip_types/spa.svg'],
        ['name' => 'Семейный', 'img' => 'img/trip_types/family.svg'],
        ['name' => 'Спокойный отдых', 'img' => 'img/trip_types/rest.svg']]
?>


<section class="trip-types-container">
    <div class="trip-types">
        <div class="trip-types-header">
            <a href="#">Виды отдыха &nbsp;<i class="fas fa-long-arrow-alt-right"></i></a>
        </div>
        <div class="trip-types-icons">
            @foreach($trip_types as $type)
                <div class="trip-category-icon" data-toggle="tooltip" title="{{ $type['name'] }}">
                    <a  href=""> <img src="{{ $type['img'] }}" alt=""> </a>
                </div>
            @endforeach
        </div>
    </div>
</section>





