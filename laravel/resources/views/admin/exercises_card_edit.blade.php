@extends('layouts.app')
@section('title', 'Редактирование упражнения')

@section('header')
    @parent
@endsection

@section('content')
        <div class="section__container">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <p>Выбранные категории:</p><br>
            @if($exercise->id)
                @foreach($categoriesForExercise as $category)
                    <p>{{ $category->name }}</p><br>
                @endforeach
            @else
                <p>Категорий нет</p>
            @endif

                {{ route('admin.exercises.save.category.exercise', ['id' => $exercise->id]) }}

            <form id="add" action="
                @if($exercise->id)
                    {{ route('admin.exercises.save.category.exercise', ['id' => $exercise->id]) }}
                @else
                    {{ route('admin.exercises.save.category.exercise', ['id' => 0]) }}
                @endif
            " method="POST">
                @csrf
                <select name="category_id" onchange="document.getElementById('add').submit();">
                    <option selected>Не выбрано</option>
                    @foreach($categories as $category)
                        <option class="exercise" value="{{ $category->id }}">
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </form>

                <br>
            <br>
            <form method="post" action="
                @if($exercise->id)
                    {{ route('admin.exercises.save.card' , ['id' => $exercise->id])}}
                @else
                    {{ route('admin.exercises.save.card', ['id' => 0])}}
                @endif
                    ">
                @csrf



                <input type="text" name="email" placeholder="Название" value="{{ $exercise->name ?? old('name') }}"><br>
                <input type="text" name="description" placeholder="Описание" value="{{ $exercise->description ?? old('description') }}"><br>
                <input type="text" name="gif_path" placeholder="Путь до картинки" value="{{ $exercise->gif_path ?? old('gif_path') }}"><br>
                <input type="checkbox" name="is_active" value="1"
                    @if ($exercise->is_active ?? old('is_active'))
                       checked
                    @endif
                ><br>
                <input type="submit" value="Изменить">
            </form>
        </div>
@endsection
