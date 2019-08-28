<?php

namespace App\Nova;

use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\DateTime;
use Laravel\Nova\Fields\Heading;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Fields\BelongsTo;
use Illuminate\Http\Request;
use Laravel\Nova\Http\Requests\NovaRequest;

class Tour extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = 'App\Models\Tour';

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'id';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id',
    ];

    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function fields(Request $request)
    {
        return [
            ID::make('№ п/п', 'id')->sortable(),
            Text::make('Название тура', 'name')->withMeta(['textAlign' => 'center']),
            Textarea::make('Описание тура', 'description')->hideFromIndex()->alwaysShow(),
            Number::make('Стоимость тура', 'price'),
            BelongsTo::make('Продавец', 'seller', 'App\Nova\User')->rules('required')->hideFromIndex(),

            Heading::make('Подробности тура:'),

            BelongsTo::make('Откуда отправляется', 'start_location', 'App\Nova\Location')->rules('required')->hideFromIndex(),
            DateTime::make('Отправление','started_at')->format('DD.MM.YYYY  hh:mm')->hideFromIndex()->nullable(),
            DateTime::make('Возвращение', 'finished_at')->format('DD.MM.YYYY hh:mm')->hideFromIndex()->nullable(),
            Boolean::make('Подходит для детей', 'for_children')->hideFromIndex(),
            BelongsTo::make('Категория', 'category', 'App\Nova\Category')->rules('required')->hideFromIndex(),
            BelongsTo::make('Тип тура', 'type', 'App\Nova\Type')->rules('required')->hideFromIndex(),
            BelongsTo::make('Класс отеля', 'hotel', 'App\Nova\Hotel')->rules('required')->hideFromIndex(),
            BelongsTo::make('Питание', 'diet', 'App\Nova\Diet')->rules('required')->hideFromIndex(),
            BelongsTo::make('Страна пребывания', 'country', 'App\Nova\Country')->rules('required')->hideFromIndex(),

            Heading::make('Включение в приоритетные:'),

            Boolean::make('Включен в главный слайдер', 'isTop')->hideFromIndex(),
            Boolean::make('Включен в Рекомендуемые', 'isRecommended')->hideFromIndex(),
            Boolean::make('Включен в Горячие туры', 'isHot')->hideFromIndex(),
        ];
    }

    /**
     * Get the cards available for the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function cards(Request $request)
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function filters(Request $request)
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function lenses(Request $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function actions(Request $request)
    {
        return [];
    }
}
