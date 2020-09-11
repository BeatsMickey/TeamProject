@extends('layouts.app')
@section('title', 'Календарь занятий')

@section('header')
    @parent
@endsection

@section('content')
    <div class="section_marginBottom4">
        <div class="section__container">
            <calendar-day :month="{{ json_encode($month) }}" :day="{{ json_encode($day) }}"></calendar-day>

            <div class="section_marginBottom4">
                <div class="section__container">
                    <div class="exercises">
                        <div class="exercises__header">
                            <p class="exercises__heading">Мои УПРАЖНЕНИЯ</p>
                        </div>
                        <section class="exercises-table">
                            <div class="exercises-table__header">
                                <p class="exercises-table__heading">Выполненные упражнения</p>
                            </div>
                            <ul class="exercises-table__labels-box exercises-table__labels-box_noborder">
                                <li class="exercises-table__text exercises-table__labels">Название упражнения</li>
                                <li class="exercises-table__text exercises-table__labels">Повторы</li>
                                <li class="exercises-table__text exercises-table__labels">Масса, кг</li>
                                <li class="exercises-table__text exercises-table__labels"></li>
                            </ul>
                            @forelse($calendar_exercises as $value)
                                <div>
                                    <ul class="exercises-table__labels-box">
                                        <li class="exercises-table__text">{{$value->name}}</li>
                                        <li class="exercises-table__text">{{$value->repetitions}}</li>
                                        <li class="exercises-table__text">{{$value->weight }}</li>
                                        <li><a class="exercises-table__del-btn"
                                               href="{{ route('trainingLog.del_exercises', ['day' => $day, 'month' => $month, 'id' => $value->id, 'today' => 1, 'weekday' => $weekday]) }}"></a>
                                        </li>
                                    </ul>
                                </div>
                            @empty
                                <div>
                                    <h6 class="exercises-table__text">Упражнений пока что нет!</h6>
                                </div>
                            @endforelse
                        </section>

                        @if($program)
                            <section class="exercises-table">
                                <div class="exercises-table__header">
                                    <p class="exercises-table__heading">Упражнения программы</p>
                                </div>
                                <ul class="exercises-table__labels-box exercises-table__labels-box_noborder">
                                    <li class="exercises-table__text exercises-table__labels">Название упражнения</li>
                                    <li class="exercises-table__text exercises-table__labels">Повторы</li>
                                    <li class="exercises-table__text exercises-table__labels">Масса, кг</li>
                                    <li class="exercises-table__text exercises-table__labels"></li>
                                </ul>
                                @forelse($today_exercises as $exercise)
                                    <form action="{{ route('trainingLog.add_exercises',
                                      ['day' => $day, 'month' => $month, 'today' => 1, 'weekday' => $weekday]) }}"
                                          method="post">
                                        @csrf
                                        <ul class="exercises-table__labels-box">
                                            <li class="exercises-table__text">{{$exercise->name}}</li>
                                            <li class="exercises-table__inputs-box">
                                                <input class="exercises-table__inputs" type="text" name="repetitions"
                                                       required>
                                            </li>
                                            <li class="exercises-table__inputs-box">
                                                <input type="text" name="exercises_id" value="{{ $exercise->id }}"
                                                       hidden>
                                                <input class="exercises-table__inputs" type="text" name="weight"
                                                       required>
                                            </li>
                                            <li>
                                                <input class="exercises-table__add-btn" type="submit" value="+">
                                            </li>
                                        </ul>
                                    </form>
                                @empty
                                    <h6 class="exercises-table__text">День отдыха</h6>
                                @endforelse
                            </section>
                        @endif

                        <section class="exercises-table">
                            <div class="exercises-table__header">
                                <p class="exercises-table__heading">Упражнения вне программы</p>
                            </div>
                            <form action="{{ route('trainingLog.add_exercises', ['day' => $day, 'month' => $month, 'today' => 1, 'weekday' => $weekday]) }}"
                                  method="post">
                                @csrf
                               {{-- <select class="content_form mt-2" id="choose-exercises" name="exercises_id">
                                    @foreach($allExercises as $value)
                                        <option class="exercise" value="{{ $value->id }}"
                                                data-category="{{ $value->category_id }}">
                                            {{ $value->name }}
                                        </option>
                                    @endforeach
                                </select>--}}
                            </form>
                        </section>

                    </div>
                </div>
            </div>


            <div class="section__container__form">
                <form
                        action="{{ route('trainingLog.add_exercises', ['day' => $day, 'month' => $month, 'today' => 1, 'weekday' => $weekday]) }}"
                        method="post">
                    @csrf

                    <div>
                        <div class="bg-success btn category selected-category" id="all">
                            Все категории
                        </div>
                        @foreach($categories as $category)
                            <div class="bg-success btn category" id="{{ $category->id }}">{{ $category->name }}</div>
                        @endforeach
                    </div>
                    @foreach($categories_exercises_ids as $cat_id)

                    @endforeach
                    <select class="content_form mt-2" id="choose-exercises" name="exercises_id">
                        @foreach($allExercises as $value)
                            <option class="exercise" value="{{ $value->id }}" data-category="{{ $value->category_id }}">
                                {{ $value->name }}
                            </option>
                        @endforeach
                    </select><br>

                    <input type="text" name="weight" placeholder="Масса снаряда" required><br>
                    <input type="text" name="repetitions" placeholder="Количество подходов" required><br>
                    <input type="submit" value="ДОБАВИТЬ">
                </form>
            </div>
        </div>
    </div>

@endsection

