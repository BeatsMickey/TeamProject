@extends('layouts.app')
@section('title', 'Календарь занятий')

@section('header')
    @parent
@endsection

@section('content')
    <section class="section_marginBottom4">
        <div class="section__container">
            <div class="section__container__text section__container__text_marginLeft">
                <h6>3 Августа, пятница</h6>
            </div>

            <div class="hr"></div>

            <div class="section__container__form">
                <form action="#" method="post">
                    <div class="select">
                        <div class="select__header">
                            <span class="select__current">Выберите упражнение</span>
                            <div class="select__icon">
                                <svg width="15" height="8" viewBox="0 0 15 8" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path d="M1.26318 1L7.61055 7L13.9579 1" stroke="black" stroke-linecap="round"
                                          stroke-linejoin="round"/>
                                </svg>
                            </div>
                        </div>

                        <div class="select__body">
                            <div class="select__item">Value 1</div>
                            <div class="select__item">Value 2</div>
                            <div class="select__item">Value 3</div>
                            <div class="select__item">Value 4</div>
                            <div class="select__item">Value 5</div>
                        </div>
                    </div>

                    <input type="text" placeholder="Масса снаряда"><br>
                    <input type="text" placeholder="Количество подходов"><br>
                    <input type="submit" value="ДОБАВИТЬ">
                </form>
            </div>
        </div>
    </section>

    <section class="section_marginBottom4">
        <div class="section__container">
            <div class="section__container__text section__container__text_marginLeft">
                <h6>ВЫПОЛНЕННЫ УПРАЖНЕНИЯ</h6>
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
                            <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
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
                            <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
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
                            <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
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

