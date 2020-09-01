<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\CategoriesExercises;
use App\Model\Exercises;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class AdminExercisesController extends Controller
{
    public function index() {
        $categories = CategoriesExercises::getAll(5);
        return view('admin.categories', ['categories' => $categories]);
    }

    public function changeActiveCategories(int $id) {
        $category = CategoriesExercises::find($id);
        $category->is_active = !($category->is_active);
        $category->save();
        return redirect()->route('admin.exercises.index');
    }

    public function addCategories(Request $request) {
        $category = new CategoriesExercises(['name'=> $request->get('name'), 'is_active' => $request->get('is_active') ]);
        $category->save();
        return redirect()->route('admin.exercises.index');
    }

    public function exercises(int $id) {
        $exercises = Exercises::getExercisesByCategoriesIdAll($id, 5);
        $category = CategoriesExercises::find($id);
        return view('admin.exercises_by_category', ['exercises' => $exercises, 'category' => $category]);
    }

    public function delExercises(int $id, int $category_id) {
        $exercise = Exercises::find($id);
        $exercise->is_active = !($exercise->is_active);
        $exercise->save();
        return redirect()->route('admin.exercises.exercises', $category_id);
    }

    public function exerciseCard() {
        $categories = CategoriesExercises::all();
        return view('admin.exercises_card_edit', ['exercise' => (new Exercises()), 'categories' => $categories]);
    }

    public function updateCard(int $id) {
        $categoriesForExercise = CategoriesExercises::getAllActiveCategoriesForExercises($id);
        $exercise = Exercises::find($id);
        $categories = CategoriesExercises::all();
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
        if($id) {

        } else {
            $exercise = new Exercises(['name' => 'Новое упражнение', 'gif_path' => 'Новое упражнение']);
            $exercise->save();
        }

        dd($request->get('category_id'));
    }

}
