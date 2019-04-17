<!-- возможно, типы надо будет забить в БД, тогда вместо готового массива сюда
должен приходить массив-параметр с нужными данными -->

@include('components.svg-images')


<?php
    $trip_types = [
        ['name' => 'Индустриальный', 'img' => 'industrial'],
        ['name' => 'Шоппинг', 'img' => 'shopping'],
        ['name' => 'Экстрим', 'img' => 'extrim'],
        ['name' => 'Luxury', 'img' => 'luxury'],
        ['name' => 'Всё включено', 'img' => 'all-inclusive'],
        ['name' => 'Программы развлечений', 'img' => 'games'],
        ['name' => 'Пляжный', 'img' => 'beach'],
        ['name' => 'Гастрономический', 'img' => 'gurman'],
        ['name' => 'SPA', 'img' => 'spa'],
        ['name' => 'Семейный', 'img' => 'family'],
        ['name' => 'Спокойный отдых', 'img' => 'rest']]
?>


<section class="tripTypes_container">
    <div class="tripTypes">
        <div class="tripTypes_header">
            <a href="#">Виды отдыха &nbsp;<i class="fas fa-long-arrow-alt-right"></i></a>
        </div>
        <div class="tripTypes_icons">
            @foreach($trip_types as $type)
                <div class="tripCategoryIcon" data-toggle="tooltip" title="{{ $type['name'] }}">
                    <a  href=""> 
                        <svg class="svg-icon">
                            <use xlink:href="#{{$type['img']}}">
                        </svg>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</section>





