<?php

namespace App\Http\Controllers\TrainingLog;

use App\Http\Controllers\Controller;
use App\Model\Calendar;
use App\Model\CalendarExercises;
use App\Model\Categories;
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

        if (Auth::user()) {
            $user_id = Auth::user()->id;
            $calendar = Calendar::getCalendarByUserIdAndMonth($user_id, $month);
        } else {
            $calendar = Calendar::getCalendarBySessionIdAndMonth($session_id, $month);
        }

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

            if (Auth::user()) {
                $program = Programs::find(Auth::user()->programs_id);
            } else {
                $program = false;
            }

            if ($program){
                $sets = $program->sets()->where('day_of_program', '=', $weekday)->get();
            }

            if (isset($sets[0])) {
                $today_set = $sets[0];
                $today_exercises = $today_set->exercises()->get();
            } else {
                $today_exercises = [];
            }
        } else {
            $routename = 'alreadyDoneExercises';
        }

        $categories = Categories::getAll();
        $categories_exercises = [];
        foreach ($categories as $category) {
            $categories_exercises[$category->id] = $category->exercises->keyBy('id');
        }

        $allExercises = Exercises::getAllExercises();
        $categories_exercises_ids = DB::table('categories_exercises')->get();

        $session_id = $request->session()->getId();

        if(Auth::user()) {
            $calendar_id = Calendar::getCalendarIdByUserAndDay(Auth::user()->id, $day);
        } else {
            $calendar_id = Calendar::getCalendarIdBySessionAndDay($session_id, $day);
        }


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
                'weekday' => $weekday,
                'categories_exercises' => $categories_exercises,
                'categories_exercises_ids' => $categories_exercises_ids,
            ]
        );
    }


    public function addExercises(Request $request, $day, $month, $today)
    {
        $weekday = $_GET['weekday'];
//        $session_id = $request->session()->getId();
        $session_id = session()->getId();

        if (Auth::user()) {
            $user_id = Auth::user()->id;
            $calendar_id = Calendar::getCalendarIdByUserAndDay($user_id, $day);
        } else {
            $calendar_id = Calendar::getCalendarIdBySessionAndDay($session_id, $day);
        }

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
