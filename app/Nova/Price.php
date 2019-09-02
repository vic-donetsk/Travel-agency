<?php

namespace App\Nova;

use Laravel\Nova\Fields\DateTime;
use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;

class Price extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = 'App\Models\Price';
    public static $group = 'Справочники';

    public static function label()
    {
        return 'Ценовые диапазоны';
    }

    public static function singularLabel()
    {
        return 'Ценовой диапазон';
    }

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public function title()
    {
        if ($this->from_price === 0)
            return 'До ' . $this->to_price;
        elseif ($this->to_price === 1000000)
            return 'Более ' . $this->from_price;
        else
            return 'От ' . $this->from_price . ' до ' . $this->to_price;
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
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function fields(Request $request)
    {
        return [
            ID::make('№ п/п', 'id')->sortable(),
            Text::make('Ценовой диапазон', function() {
                return $this->title();
            })->onlyOnIndex(),
            Number::make('От стоимости', 'from_price')->hideFromIndex(),
            Number::make('До стоимости', 'to_price')->hideFromIndex(),
            DateTime::make('Изменено', 'updated_at')->format('DD.MM.YYYY HH-mm')->hideFromIndex()
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
