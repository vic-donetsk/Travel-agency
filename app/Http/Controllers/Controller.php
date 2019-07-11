<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use App\Models\Tour;

use Carbon\Carbon;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    // убирает из пути public (для сгенерированных сидами)
    protected function imagePath($path) {
    	if (substr($path, 0, 6) == 'public') {
    		return substr($path, 7);
    	} else {
    		return $path;
    	}
    }

    // формируем строку места отправления тура
    protected function concatLocation($start) {
        return $start->variant . ' ' . $start->name . ' г. ' . $start->city->name;
    }

    // вычисляем длительность тура в формате Х дней/ Х-1 ночей
    // и формируем соответствующую строку вывода
    protected function tourDuration($startAt, $finishAt) {

        $firstDate = new Carbon($startAt);
        $secondDate = new Carbon($finishAt);
        $interval = $firstDate->diffInDays($secondDate);

        $daysAndNights = $interval . " дней" . '/' . ($interval - 1) . ' ночей';

        return $daysAndNights;
    }

    // формирует данные для вывода блока трип-карт
    protected function getData ($condition, $value, $showClasses, $quantity) {
        $selectedTours = [];
        $inConditionAll = Tour::with('type','main_img', 'hotel', 'start_location', 'start_location.city')->where($condition, $value)->latest()->get();
        $inConditionCount = $inConditionAll->count();
        $inCondition = $inConditionAll->take($quantity);
        $i = 0;

        foreach ($inCondition as $oneCondition) {

            $imgPath = '/' . $this->imagePath($oneCondition->main_img->path);

            $startLocation = $this->concatLocation($oneCondition->start_location);

            $duration = $this->tourDuration($oneCondition->started_at,$oneCondition->finished_at);

            $selectedTours[] = [
                'id' => $oneCondition->id,
                'name' => $oneCondition->name,
                'img' => $imgPath,
                'showClass' => $showClasses[$i++],
                'price' => $oneCondition->price,
                'hotel' => $oneCondition->hotel->name,
                'startLocation' => $startLocation,
                'duration' => $duration,
                'typeImage' => $oneCondition->type->icon
            ];
        }

        return [ 'data'  => $selectedTours,
                 'count' => $inConditionCount ];
    }

}
