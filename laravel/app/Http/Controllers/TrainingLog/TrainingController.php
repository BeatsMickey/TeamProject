<?php

namespace App\Http\Controllers\TrainingLog;

use App\Http\Controllers\Controller;
use App\Model\Calendar;
use App\Model\CalendarExercises;
use App\Model\CategoriesExercises;
use App\Model\Exercises;
use App\Model\Programs;
use App\MyApp;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TrainingController extends Controller
{
    public function index(Request $request)
    {

        $session_id = $request->session()->getId();

        // месяц берем либо из формы при выборе, либо сегодняшний
        if ($request->month) {
            $month = $request->month;
        } else {
            $month = date('n', time());
        }

        $calendar = Calendar::getCalendarBySessionIdAndMonth($session_id, $month);

        $months = MyApp::MONTHSNAME;

        return view('calendar', [
            'calendar' => $calendar,
            'months' => $months,
            'month' => $month,
//            'program' => $program,
//            'sets =>' => $sets
        ]);
    }

    public function viewDay(Request $request, $month, $day, $today)
    {
        if ($today) {
            $routename = 'exercise';
            $weekday = $_GET['weekday'];
            $program = Programs::find(Auth::user()->programs_id);
            $today_set = ($program->sets()->where('day_of_program', '=', 1)->get())[0];
            $today_exercises = $today_set->exercises()->get();
        } else {
            $routename = 'alreadyDoneExercises';
        }

        $categories = CategoriesExercises::getAll();

        $allExercises = Exercises::getAllExercises();

        $session_id = $request->session()->getId();

        $calendar_id = Calendar::getCalendarIdBySessionAndDay($session_id, $day);

        $calendar_exercises = CalendarExercises::getCalendarExercisesByCalendarId($calendar_id);

        $months = MyApp::MONTHSNAME;

        return view($routename, [
                'month' => $months[$month],
                'day' => $day,
                'calendar_exercises' => $calendar_exercises,
                'categories' => $categories,
                'allExercises' => $allExercises,
                'program' => $program,
                'today_exercises' => $today_exercises,
                'weekday' => $weekday
            ]
        );
    }


    public function addExercises(Request $request, $day, $month, $today)
    {
        $weekday = $_GET['weekday'];
//        $session_id = $request->session()->getId();
        $session_id = session()->getId();

        $calendar_id = Calendar::getCalendarIdBySessionAndDay($session_id, $day);

        $calendar_exercises = new CalendarExercises();
        $calendar_exercises->fill($request->all());
        $calendar_exercises->fill(['calendar_id' => $calendar_id]);
        $calendar_exercises->save();

        $months = MyApp::MONTHSNAME;

        return redirect()->route('trainingLog.view_day', [
            'month' => array_search($month, $months),
            'day' => $day,
            'today' => $today,
            'weekday' => $weekday
        ]);
    }

    public function delExercises(Request $request, $day, $month, $id, $today)
    {
        $weekday = $_GET['weekday'];
        $exercise = CalendarExercises::find($id);

        $exercise->delete();

        $months = MyApp::MONTHSNAME;

        return redirect()->route('trainingLog.view_day', [
            'month' => array_search($month, $months),
            'day' => $day,
            'today' => $today,
            'weekday' => $weekday
        ]);
    }


}
