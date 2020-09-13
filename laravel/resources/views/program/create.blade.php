@extends('layouts.app')
@section('title', 'Новая программа')

@section('header')
    @parent
@endsection

@section('content')
    <div class="section__container">
        <a href="{{ route('program.index') }}">Вернуться на страницу программ</a>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li class="my-program_message">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <my-programs-create :sets="{{ json_encode($sets) }}"></my-programs-create>
    </div>
@endsection

