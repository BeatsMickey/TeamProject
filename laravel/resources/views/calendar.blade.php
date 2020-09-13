@extends('layouts.app')
@section('title', 'Календарь занятий')

@section('header')
    @parent
@endsection

@section('content')
    <section class="section_marginBottom3">
        <div class="section__container">
{{--            @dd($calendar)--}}
            <calendar :urldata="{{json_encode($calendar)}}" :date="{{json_encode($date ?? '')}}"></calendar>
        </div>
    </section>


@endsection

