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
    <body>
  
        <div class="show_block">
            <div class="btn-blue">Подробнее</div>
            <div class="btn-off">Подробнее</div>
            <div class="btn-green">Заказать</div>
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

        @include('components.pagination')

        <?php $classes_type = ['trip-card', 'trip-card client-hover', 'trip-card seller-hover']; ?>
        <div class="show_block">
            @each('components.trip-card', $classes_type, 'classes')
        </div>


       
        @include('components.main-menu',['user_name' => 'Василий Пупкин', 'user_foto' => 'img/user.jpg'])
        <br>
        @include('components.main-menu')

        <div class="show_block">
            @include('components.mob-main-menu')
            @include('components.mob-head-menu')
        </div>  
<br><br><br><br><br><br><br><br>







    </body>
</html>
