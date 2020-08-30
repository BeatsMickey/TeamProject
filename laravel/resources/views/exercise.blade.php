@extends('layouts.app')
@section('title', 'Календарь занятий')

@section('header')
    @parent
@endsection

@section('content')
    <section class="section_marginBottom4">
        <div class="section__container">
            <div class="section__container__text section__container__text_marginLeft">
                <h6>{{ $day }},  {{ $month }}</h6>
            </div>

            <div class="hr"></div>

            <div class="section__container__form">
                <form action="{{ route('trainingLog.add_exercises', ['day' => $day, 'month' => $month, 'today' => 1]) }}" method="post">
                    @csrf
                    <div>
                        <div class="bg-success btn category selected-category" id="all">
                            Все категории
                        </div>
                        @foreach($categories as $category)
                            <div class="bg-success btn category" id="{{ $category->id }}">{{ $category->name }}</div>
                        @endforeach
                    </div>

                    <select class="content_form mt-2" id="choose-exercises" name="exercises_id">
                        @foreach($allExercises as $value)
                            <option class="exercise" value="{{ $value->id }}" data-category="{{ $value->category_id }}">
                                {{ $value->name }}
                            </option>
                        @endforeach
                    </select><br>

                    <input type="text" name="weight" placeholder="Масса снаряда"><br>
                    <input type="text" name="repetitions" placeholder="Количество подходов"><br>
                    <input type="submit" value="ДОБАВИТЬ">
                </form>
            </div>
        </div>
    </section>

    <section class="section_marginBottom4">
        <div class="section__container">
            <div class="section__container__text section__container__text_marginLeft">
                <h6>ВЫПОЛНЕННЫЕ УПРАЖНЕНИЯ</h6>
            </div>

            <div class="hr"></div>

            <div class="section__container__exercise">
                <div class="section__container__exercise__headline">
                    <h6>Упражнение</h6>
                    <h6>Повторения</h6>
                    <h6 class="marginRight">Масса</h6>
                    <h6>Удалить</h6>
                </div>

                <div class="section__container__exercise__content">
                    @forelse($calendar_exercises as $value)
                        <div>
                            <h6>{{ $value->name }}</h6>
                            <h6 class="repetitions">{{ $value->repetitions }}</h6>
                            <h6 class="weight">{{ $value->weight }}</h6>

                            <a href="{{ route('trainingLog.del_exercises', ['day' => $day, 'month' => $month, 'id' => $value->id, 'today' => 1]) }}">
                                <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M24 8L8 24" stroke="black" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M8 8L24 24" stroke="black" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </a>
                        </div>
                    @empty
                        <h6>Нет упражнений</h6>
                    @endforelse
                </div>
            </div>
        </div>
    </section>
@endsection

