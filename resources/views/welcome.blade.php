<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Styles -->
        <style>
            body {
               background-color: #fff !important;
            }

            .show_block {
                margin: 50px auto;
                width: 90%;
                display: flex;
                justify-content: space-around;
                flex-wrap:wrap;
            }
        </style>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    </head>
    <body data-page="{{ Route::currentRouteName() }}" class="page_{{ Route::currentRouteName() }}">

        <div class="show_block">
            <div class="single-btn mod-blue mod-140">Подробнее</div>
            <div class="single-btn mod-white mod-140">Подробнее</div>
            <div class="single-btn mod-green mod-170">Заказать</div>
        </div>

        <div class="show_block">
            <div>
                <input type="radio" name="rb" id="rb1" checked> <label for="rb1">Диван 1</label>
            </div>
            <div>
                <input type="radio" name="rb" id="rb2"> <label for="rb2">Диван 2</label>
            </div>

            <div>
                <input type="radio" name="rb" id="rb3"> <label for="rb3">Диван 3</label>
            </div>
        </div>

        <div class="show_block">
            <a class="link-style" href="#">Ссылка 1</a>
            <a class="link-style" href="#">Ссылка 2</a>
        </div>

        <div class="show_block">
            <input type="text" class="input-text" placeholder="Введите чё-то">
            <input type="text" class="input-text" value="Иван Иванов">
            <input type="text" class="input-text input-error" value="Пиво вредно">
        </div>


        @include('components.table')


        @include('components.pagination')

        <br>

        @include('components.popup-window')



        <!-- <?php $classes_type = ['trip-card', 'trip-card client-hover', 'trip-card seller-hover']; ?>
        <div class="show_block">
            @each('components.trip-card', $classes_type, 'classes')
        </div> -->



        @include('components.main-menu',['user_name' => 'Василий Пупкин', 'user_foto' => 'img/user.png'])
        <br>
        @include('components.main-menu')

        <div class="show_block">
            @include('components.mob-main-menu')
            @include('components.mob-head-menu')
        </div>

        @include('components.footer',['user_name' => 'Василий Пупкин', 'user_foto' => 'img/user.png'])
        <br>
        @include('components.footer')
        <br>
        <div class="test-mobile" style="width:320px; margin: 0 auto">
           @include('components.footer')
        </div>



        <div class="show_block">
        <?php
            $trip_types = [
                ['name' => 'Индустриальный', 'img' => 'img/trip_types/industry.svg'],
                ['name' => 'Шоппинг', 'img' => 'imgtrip_types//shopping.svg'],
                ['name' => 'Экстрим', 'img' => 'img/trip_types/extrim.svg'],
                ['name' => 'Luxury', 'img' => 'img/trip_types/luxury.svg'],
                ['name' => 'Всё включено', 'img' => 'imgtrip_types//all-inclusive.svg'],
                ['name' => 'Программы развлечений', 'img' => 'img/trip_types/games.svg'],
                ['name' => 'Пляжный', 'img' => 'img/trip_types/beach.svg'],
                ['name' => 'Гастрономический', 'img' => 'img/trip_types/gurman.svg'],
                ['name' => 'SPA', 'img' => 'img/trip_types/spa.svg'],
                ['name' => 'Семейный', 'img' => 'img/trip_types/family.svg'],
                ['name' => 'Спокойный отдых', 'img' => 'img/trip_types/rest.svg']]
        ?>
             @each('components.trip-type', $trip_types, 'type')
        </div>






    </body>
</html>
