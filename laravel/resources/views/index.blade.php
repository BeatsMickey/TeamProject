@extends('layouts.app')
@section('title', 'Таблица тренировок')

@section('header')
    @parent
@endsection

@section('content')
    <section class="section_marginBottom2">
        <div class="section__container">
            <div class="section__container__text section__container__text_modification">
                <h6>Приложение поможет вам:</h6>

                <div>
                    <p>Контролировать занятия</p>
                    <p>Повысить эффективность тренировок</p>
                    <p>Добиваться поставленных целей</p>
                </div>

                <a href="{{ $url }}">НАЧАТЬ</a>
            </div>

            <div class="hr"></div>
        </div>
    </section>
@endsection


