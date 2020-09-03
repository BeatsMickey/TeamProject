<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;

class Calendar extends Model
{
    protected $fillable = [
        'session_id'
    ];
    protected $table = 'calendar';

    public static function getCalendarIdBySessionAndDay(string $session_id, int $day) {

        $calendar = Calendar::query()
            ->select('id')
            ->whereDay('created_at', '=', $day)
            ->where('session_id', '=', $session_id)
            ->get();

        // достаем calendar_id при наличии записи в этот день или создаем запись и достаем
        if (isset($calendar['0'])) {
            $calendar_id = $calendar['0']->id;
        } else {
            $calendar = new Calendar();
            $calendar->fill(['session_id' => $session_id]);
            $calendar->save();
            $calendar_id = (Calendar::query()
                ->select('id')
                ->whereDay('created_at', '=', $day)
                ->where('session_id', '=', $session_id)
                ->get())['0']->id;
        }

        return $calendar_id;
    }

    public static function getCalendarBySessionIdAndMonth(string $session_id, int $month) {
        $calendarDb = Calendar::query()
            ->select('created_at', 'id')
            ->where('session_id','=', $session_id)
            ->whereMonth('created_at', '=', $month)
            ->get();

        $calendar = Calendar::prepareCalendar($calendarDb, $month);

        return $calendar;
    }

    private static function prepareCalendar(Collection $calendarDb, int $month) {
        // Закреплённая за пользователем программа упражнений
        if (Auth::user()) {
            $program = Programs::find(Auth::user()->programs_id);
        } else {
            $program = null;
        }
      

        // Составляем список дней недели, которые входят в программу
        if($program) {
            $sets = $program->sets()->orderBy('day_of_program')->get();
            $sets = Arr::dot($sets);
            $days_of_program = [];
            foreach ($sets as $set) {
                $day_number = $set->pivot['day_of_program'];

                $days_of_program[$day_number] = $day_number;


//                foreach ($sets as $set) {
//                    $day_number = $set->pivot['day_of_program'];
//                    $days_of_program[$day_number] = $day_number;
//
//                    $today_exercises = [];
//                    foreach ($set->exercises()->get() as $exercise) {
//                        array_push($today_exercises, $exercise->name);
//                    }
//                }

            }
        }

        // к-во дней в требующемся месяце
        $days = cal_days_in_month(CAL_GREGORIAN, $month, date('Y', time()));

        // год требующегося месяца
        if (isset($calendarDb[0]->created_at)) {
            $year = date_format($calendarDb[0]->created_at, 'Y');
        } else {
            $year = date('Y', time());
        }

        // определение дня по полю datetime, для дольнейщего удобства
        foreach ($calendarDb as $value) {
            $value->day = date_format($value->created_at, 'j');
        }

        // вычисление предыдущего последнего дня месяца, что бы рендерить требующийся с правильной позиции.
        if($month == 1) {
            $prevMonth = 12;
            $prevYear = $year - 1;
        } else {
            $prevMonth = $month - 1;
            $prevYear = $year;
        };
        $prevMonthDays = cal_days_in_month(CAL_GREGORIAN, $prevMonth, $prevYear);
        $prevMonthLastDay = date('w', mktime(0, 0, 0, $prevMonth, $prevMonthDays, $prevYear));

        $calendar = [];
        for($i = 1, $day = 1; $i <= $days + $prevMonthLastDay; $i++) {

            $weekday = date('N', mktime(0, 0, 0, $month, $day, $year));

            // первые ячейки будут пропущены, что бы рендерить календарь с нужного места
            if ($i <= $prevMonthLastDay) {
                $calendar["$i+"]['is_active'] = 'none';
                continue;
            }

            $calendar[$day]['weekday'] = $weekday;

            // отметка дней, на которые приходятся занятия по текущей программе
            if($program) {
                foreach ($sets as $set) {
                    if($set->pivot['day_of_program'] == $weekday) {
                        $today_exercises = [];
                        foreach ($set->exercises()->get() as $exercise) {
                            array_push($today_exercises, $exercise->name);
                        }
                        $calendar[$day]['exercises'] = $today_exercises;
                    }
                }

                if(Arr::exists($days_of_program, $weekday)) {
                    $calendar[$day]['program_day'] = true;
                }
            }

            // отметка дней с тренировками
            foreach ($calendarDb as $value){
                if($value->day == $day) {
                    $calendar[$day]['is_active'] = 'active';
                    $calendar[$day]['calendar_id'] = $value->id;
                    $day++;
                    continue 2;
                }
            }
            $calendar[$day]['is_active'] = 'not_active';
            $day++;
        }


        // отметка сегодняшнего дня, если он имеется
        $today = date('d', time());

        $monthnow = date('n', time());

        if($month == $monthnow) {
            $calendar[intval($today)]['is_active'] = 'today';
        }

        foreach ($calendar as $key => $value) {
            if($month < $monthnow || ($key < $today && $month == $monthnow)) {
                $calendar[$key]['day_passed'] = true;
            } else {
                $calendar[$key]['day_passed'] = false;
            }
        }

        return $calendar;
    }

}
