<?php

namespace App\Http\Controllers\Program;

use App\Http\Controllers\Controller;
use App\Model\Programs;
use App\Model\Sets;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProgramController extends Controller
{
    public function index() {
        $sets = Sets::getAll();
        $programs = Programs::getAll();

        $current_program = Programs::query()->where('id', Auth::user()->programs_id)->first();

        return view('program.index', [
            'sets' => $sets,
            'programs' => $programs,
            'current_program' => $current_program,
        ]);
    }

    public function show($id) {
        $program = Programs::query()->where('id', $id)->first();
        $sets = $program->sets()->orderBy('day_of_program')->get();

        foreach ($sets as $set) {
            $set->exercises = $set->exercises()->get();
        }

        return view('program.one', [
            'program' => $program,
            'sets' => $sets,
        ]);
    }

    public function chooseProgram($id) {
        $user = Auth::user();
        $user->programs_id = $id;
        $user->save();

        return redirect()->route('program.index')->with('message', "Программа успешно выбрана");
    }

    public function resetProgram() {
        $user = Auth::user();
        $user->programs_id = null;
        $user->save();
        return redirect()->route('program.index')->with('message', "Параметры программы сброшены");
    }

    public function createForm(Request $request) {
        $sets = Sets::getAll();


        if ($request->method() === "POST") {

//            if($request->input('day_1'))
//                dump(1111);
//                dump($request->input('day_1'));
//
//            if($request->input('day_2'))
//                dump(2222);
//                dump($request->input('day_2'));
//
//            if($request->input('day_3'))
//                dump(3333);
//                dump($request->input('day_4'));
//
//            if($request->input('day_4'))
//                dump(4444);
//                dump($request->input('day_4'));
//
//            if($request->input('day_5'))
//                dump(5555);
//                dump($request->input('day_5'));

            $program = new Programs();
            $set_id = 3;
            $day_of_program = '3';
            $request->validate(Programs::rules());

            $program->fill(['name' => $request->input('name')]);
            $program->save();

            for($day_of_program = 1; $day_of_program <=5; $day_of_program++) {
                if($request->input('day_' . $day_of_program)) {
                    $set_id = $request->input('day_' . $day_of_program);
                    $program->sets()->attach($set_id, ['day_of_program' => $day_of_program]);
                }
            }
//            $program->sets()->attach($set_id, ['day_of_program' => $day_of_program]);
//            $program->sets()->attach($set_id, ['day_of_program' => $day_of_program]);

            return redirect()->route('program.index')->with('message', 'Программа успешно добавлена.');
        }

        return view('program.create', [
            'sets' => $sets
        ]);

    }


//    public function update(Request $request, Category $category) {
//        $this->validateAndSaveChanges($request, $category);
//        return redirect()->route('admin.category.index')->with('success', 'Категория успешно отредактирована');
//    }
//
//    public function destroy(Category $category) {
//        $category->news()->delete();
//        $category->delete();
//        return redirect()->route('admin.category.index')->with('success', 'Категория успешно удалена.');
//    }
}
