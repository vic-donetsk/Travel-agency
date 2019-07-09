<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

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
}
