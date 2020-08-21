<?php

namespace App\Http\Controllers\TrainingLog;

use App\Http\Controllers\Controller;
use App\Model\Calendar;
use App\Model\CalendarExercises;
use App\Model\Exercises;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TrainingController extends Controller
{
    public function index(Request $request, $month) {
        $session_id = $request->session()->getId();
        if ($request->month) {
            $month = $request->month;
        }
        $answer = DB::select("SELECT DAYOFMONTH(created_at) as day, session_id, id, created_at,
            DAYOFMONTH(DATE_SUB(
            DATE_ADD(DATE_SUB(created_at,INTERVAL DAYOFMONTH(created_at)-1 DAY),INTERVAL 1 MONTH),
            INTERVAL 1 DAY))
            AS days
            FROM calendar
            where session_id = '{$session_id}' and month(created_at) = {$month};");
        $days = $answer['0']->days ?? cal_days_in_month(CAL_GREGORIAN, $month, date('Y', time()));
        $calendar = [];
        for($i = 1; $i <= $days; $i++) {
            $calendar[$i] = collect([]);
            $weekend = date('w', mktime(0, 0, 0, $month, $i, date('Y', time())));
            if( $weekend == 5 || $weekend == 4 ) {
                $calendar[$i]->weekend = true;
            } else {
                $calendar[$i]->weekend = false;
            };
            foreach ($answer as $value){
                if($value->day == $i) {
                    $calendar[$i]->is_active = 'active';
                    $calendar[$i]->calendar_id = $value->id;
                    continue 2;
                }
            }
            $calendar[$i]->is_active = 'not_active';
        }
        $today = date('d', time());
        $monthnow = date('n', time());
        if($month == $monthnow) {
            $calendar[$today]->is_active = 'today';
        }
        $months = collect(['1' => 'Январь', '2' => 'Февраль', '3' => 'Март' , '4' => 'Апрель' , '5' => 'Май' ,
            '6' => 'Июнь' , '7' => 'Июль', '8' => 'Август', '9' => 'Сентябрь', '10' => 'Октябрь', '11' => 'Ноябрь',
            '12' => 'Декабрь']);
        return view('calendar', ['calendar' => $calendar, 'months' => $months, 'month' => $month]);
    }

    public function today(Request $request, $month, $day) {
        $exercises = Exercises::getAllExercises();
        $session_id = $request->session()->getId();
        $calendar_id = (Calendar::query()->select('id')->whereDay('created_at', '=', $day)->where('session_id', '=', $session_id)->get())[0]->id;
        $calendar_exercises = CalendarExercises::query()->select('calendar_exercises.id', 'name', 'repetitions', 'weight')->where(['calendar_id' => $calendar_id])->join('exercises', 'exercises.id', '=', 'exercises_id')->get();
        $months = collect(['1' => 'Январь', '2' => 'Февраль', '3' => 'Март' , '4' => 'Апрель' , '5' => 'Май' ,
            '6' => 'Июнь' , '7' => 'Июль', '8' => 'Август', '9' => 'Сентябрь', '10' => 'Октябрь', '11' => 'Ноябрь',
            '12' => 'Декабрь']);
        return view('exercise', ['month' => $months->get($month), 'day' => $day, 'exercises' => $exercises, 'calendar_exercises' => $calendar_exercises]);
    }

    public function addExercises(Request $request, $day, $month) {
        $session_id = $request->session()->getId();
        $id = Calendar::query()->select('id')->whereDay('created_at', '=', $day)->where('session_id', '=', $session_id)->get();
        if($id->isEmpty()) {
            $model = new Calendar();
            $model->fill(['session_id' => $session_id]);
            $model->save();
            $id = Calendar::query()->select('id')->whereDay('created_at', '=', $day)->where('session_id', '=', $session_id)->get();
        };
        $calendar_exercises = new CalendarExercises();
        $calendar_exercises->fill($request->all());
        $calendar_exercises->fill(['calendar_id' => $id[0]->id]);
        $calendar_exercises->save();
        $months = ['1' => 'Январь', '2' => 'Февраль', '3' => 'Март' , '4' => 'Апрель' , '5' => 'Май' ,
            '6' => 'Июнь' , '7' => 'Июль', '8' => 'Август', '9' => 'Сентябрь', '10' => 'Октябрь', '11' => 'Ноябрь',
            '12' => 'Декабрь'];
        return redirect()->route('trainingLog.today', ['month' => array_search($month, $months), 'day' => $day]);
    }

    public function delExercises(Request $request, $day, $month, $id) {
        if(stripos(url()->previous(), 'view'))
        {
            $routename = 'trainingLog.view';
        } else {
            $routename = 'trainingLog.today';
        }
        $exercise = CalendarExercises::find($id);
        $exercise->delete();
        $months = ['1' => 'Январь', '2' => 'Февраль', '3' => 'Март' , '4' => 'Апрель' , '5' => 'Май' ,
            '6' => 'Июнь' , '7' => 'Июль', '8' => 'Август', '9' => 'Сентябрь', '10' => 'Октябрь', '11' => 'Ноябрь',
            '12' => 'Декабрь'];

        return redirect()->route($routename, ['month' => array_search($month, $months), 'day' => $day]);
    }

    public function view(Request $request, $month, $day) {
        $session_id = $request->session()->getId();
        $calendar_id = (Calendar::query()->select('id')->whereDay('created_at', '=', $day)->where('session_id', '=', $session_id)->get())[0]->id;
        $calendar_exercises = CalendarExercises::query()->select('calendar_exercises.id', 'name', 'repetitions', 'weight')->where(['calendar_id' => $calendar_id])->join('exercises', 'exercises.id', '=', 'exercises_id')->get();
        $months = collect(['1' => 'Январь', '2' => 'Февраль', '3' => 'Март' , '4' => 'Апрель' , '5' => 'Май' ,
            '6' => 'Июнь' , '7' => 'Июль', '8' => 'Август', '9' => 'Сентябрь', '10' => 'Октябрь', '11' => 'Ноябрь',
            '12' => 'Декабрь']);
        return view('alreadyDoneExercises', ['month' => $months->get($month), 'day' => $day, 'calendar_exercises' => $calendar_exercises]);
    }


}
