<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Categories;
use App\Model\Exercises;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class AdminExercisesController extends Controller
{
    public function index() {
        $categories = Categories::getAll(5);
        return view('admin.categories', ['categories' => $categories]);
    }

    public function changeActiveCategories(int $id) {
        $category = Categories::find($id);
        $category->is_active = !($category->is_active);
        $category->save();
        return redirect()->route('admin.exercises.index');
    }

    public function addCategories(Request $request) {
//        $category = new Categories(['name'=> $request->get('name'), 'is_active' => $request->get('is_active') ]);
        $category = new Categories();
        $category['name'] = $request->get('name');
        if ($request->input('is_active')) {
            $category['is_active'] = $request->input('is_active');
        } else {
            $category['is_active'] = 0;
        }

        $category->save();
        return redirect()->route('admin.exercises.index');
    }

    public function exercises(int $id) {
        $exercises = Exercises::getExercisesByCategoriesIdAll($id, 5);
        $category = Categories::find($id);
        return view('admin.exercises_by_category', ['exercises' => $exercises, 'category' => $category]);
    }

    public function delExercises(int $id, int $category_id) {
        $exercise = Exercises::find($id);
        $exercise->is_active = !($exercise->is_active);
        $exercise->save();
        return redirect()->route('admin.exercises.exercises', $category_id);
    }

    public function exerciseCard() {
        $categories = Categories::all();
        return view('admin.exercises_card_edit', ['exercise' => (new Exercises()), 'categories' => $categories]);
    }

    public function updateCard(int $id) {
        $categoriesForExercise = Categories::getAllActiveCategoriesForExercises($id);
        $exercise = Exercises::find($id);
        $categories = Categories::all();
        return view('admin.exercises_card_edit', ['exercise' => $exercise, 'categories' => $categories, 'categoriesForExercise' => $categoriesForExercise]);
    }

    public function saveCardExercises(Request $request, int $id) {
        if($id) {
            $exercise = Exercises::find($id);
        } else {
            $exercise = new Exercises();
        }
        $exercise = $this->save($request, $exercise);
        return view('admin.exercises_card_edit', ['exercise' => $exercise]);
    }

    private function save(Request $request, Model $model) {
        $model->fill($request->all());
        $model->save();
        return $model;
    }


    public function saveCategoryForExercise(Request $request, int $id) {
        dd($id);

        if($id) {

        } else {
            $exercise = new Exercises(['name' => 'Новое упражнение', 'gif_path' => 'Новое упражнение']);
            $exercise->save();
        }

        dd($request->get('category_id'));
    }

}
