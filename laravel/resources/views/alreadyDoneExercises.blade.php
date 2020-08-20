@extends('layouts.app')
@section('title', 'Завершённые занятия')

@section('header')
    @parent
@endsection

@section('content')
    <section class="section_marginBottom4">
        <div class="section__container">
            <div class="section__container__text section__container__text_marginLeft">
                <h6>1 АВГУСТА, ПОНЕДЕЛЬНИК</h6>
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
                    <div>
                        <h6>Присяд</h6>
                        <h6 class="repetitions">100500</h6>
                        <h6 class="weight">-</h6>

                        <button>
                            <svg width="32" height="32" viewBox="0 0 32 32" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path d="M24 8L8 24" stroke="black" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M8 8L24 24" stroke="black" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </button>
                    </div>

                    <div class="color">
                        <h6>Жим лёжа</h6>
                        <h6 class="repetitions">100500</h6>
                        <h6 class="weight">80</h6>

                        <button>
                            <svg width="32" height="32" viewBox="0 0 32 32" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path d="M24 8L8 24" stroke="black" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M8 8L24 24" stroke="black" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </button>
                    </div>

                    <div>
                        <h6>Присяд</h6>
                        <h6 class="repetitions">100500</h6>
                        <h6 class="weight">-</h6>

                        <button>
                            <svg width="32" height="32" viewBox="0 0 32 32" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path d="M24 8L8 24" stroke="black" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M8 8L24 24" stroke="black" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

