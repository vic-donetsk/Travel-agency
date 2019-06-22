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
            <div class="single-btn mod_blue mod_140">Подробнее</div>
            <div class="single-btn mod_white mod_140">Подробнее</div>
            <div class="single-btn mod_green mod_170">Заказать</div>
        </div>

        <div class="show_block">
            <div class="radio-switch">
                 <label>
                    <input class="radio" type="radio" name="rb" id="rb1" checked> 
                    <span class="radio-custom"></span>
                    <span class="radio-label">Путешествие 1</span>
                 </label>
            </div>            
            <div class="radio-switch">
                 <label>
                    <input class="radio" type="radio" name="rb" id="rb2"> 
                    <span class="radio-custom"></span>
                    <span class="radio-label">Путешествие 2</span>
                 </label>
            </div>            
            <div class="radio-switch">
                 <label>
                    <input class="radio" type="radio" name="rb" id="rb3"> 
                    <span class="radio-custom"></span>
                    <span class="radio-label">Путешествие 3</span>
                 </label>
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



        <div class="show_block">
            <?php $classes_type = ['', 'client-hover', 'seller-hover']; ?>
            @each('components.trip-card.trip-card', $classes_type, 'show')
        </div>



        @include('components.main-menu.main-menu',['user_name' => 'Василий Пупкин', 'user_foto' => 'img/user.png'])
        <br>
        @include('components.main-menu.main-menu')

        <div class="show_block">
            @include('components.main-menu.mob-main-menu')
            @include('components.main-menu.mob-head-menu')
        </div>

        @include('components.footer.footer',['user_name' => 'Василий Пупкин', 'user_foto' => 'img/user.png'])
        <br>
        @include('components.footer.footer')
        <br>
        <div class="test-mobile" style="width:320px; margin: 0 auto">
           @include('components.footer.footer')
        </div>



        <div class="show_block">
             @include('components.trip-types.trip-types')
        </div>
        






    </body>
</html>
