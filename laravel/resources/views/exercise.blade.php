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
{{--                    <div class="select">--}}
{{--                        <div class="select__header">--}}
{{--                            <span class="select__current">Выберите упражнение</span>--}}
{{--                            <div class="select__icon">--}}
{{--                                <svg width="15" height="8" viewBox="0 0 15 8" fill="none"--}}
{{--                                     xmlns="http://www.w3.org/2000/svg">--}}
{{--                                    <path d="M1.26318 1L7.61055 7L13.9579 1" stroke="black" stroke-linecap="round"--}}
{{--                                          stroke-linejoin="round"/>--}}
{{--                                </svg>--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="select__body">--}}
{{--                            <div class="select__item">Value 1</div>--}}
{{--                            <div class="select__item">Value 2</div>--}}
{{--                            <div class="select__item">Value 3</div>--}}
{{--                            <div class="select__item">Value 4</div>--}}
{{--                            <div class="select__item">Value 5</div>--}}
{{--                        </div>--}}
{{--                    </div>--}}

                    <div>
                        <div class="d-inline bg-success btn category" id="all">Все категории</div>
                        @foreach($categories as $category)
                            <div class="d-inline bg-success btn category" id="$category->id">{{ $category->name }}</div>
                        @endforeach
                    </div>


                    <select class="content_form mt-2" name="exercises_id">
                        @foreach($allExercises as $value)
                            <option value="{{ $value->id }}" data-category="{{ $value->category_id }} ">
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
{{--                        <button>--}}
{{--                            <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">--}}
{{--                                <path d="M24 8L8 24" stroke="black" stroke-linecap="round" stroke-linejoin="round"/>--}}
{{--                                <path d="M8 8L24 24" stroke="black" stroke-linecap="round" stroke-linejoin="round"/>--}}
{{--                            </svg>--}}
{{--                        </button>--}}
                    @empty
                        <h6>Нет упражнений</h6>
                    @endforelse
                </div>
            </div>
        </div>
    </section>
@endsection

