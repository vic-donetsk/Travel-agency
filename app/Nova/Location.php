<?php

namespace App\Nova;

use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\DateTime;
use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;

class Location extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = 'App\Models\Location';
    public static $group = 'Справочники';

    public static function label()
    {
        return 'Места отправления';
    }

    public static function singularLabel()
    {
        return 'Место отправления';
    }

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public function title()
    {
        if ($this->variant and $this->name and $this->city->name)
        return $this->variant . ' ' . $this->name . ' г. ' . $this->city->name;
        else return '';
    }

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
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function fields(Request $request)
    {
        return [
            ID::make()->sortable(),
            Text::make('Отправление в тур', function () {
                return $this->title();
            })->onlyOnIndex(),
            Select::make('Способ отправления', 'variant')->options([
                'Выезд' => 'Выезд',
                'Вылет' => 'Вылет',
                'Отплытие' => 'Отплытие',
                'Отправление' => 'Отправление'
            ])->hideFromIndex(),
            Select::make('С какой площадки', 'name')->options([
                'с вокзала' => 'с вокзала',
                'из аэропорта' => 'из аэропорта',
                'с причала' => 'с причала',
                'из' => 'из'
            ])->hideFromIndex(),
            BelongsTo::make('Город отправления', 'city', City::class)->hideFromIndex(),
            DateTime::make('Изменено', 'updated_at')->format('DD.MM.YYYY HH-mm')->hideFromIndex()
        ];
    }

    /**
     * Get the cards available for the request.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function cards(Request $request)
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function filters(Request $request)
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function lenses(Request $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function actions(Request $request)
    {
        return [];
    }
}
