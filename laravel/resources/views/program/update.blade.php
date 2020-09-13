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

        <my-programs-update :program="{{ json_encode($program) }}" :sets="{{ json_encode($sets) }}" :program_sets="{{ json_encode($program_sets) }}"></my-programs-update>
    </div>
@endsection



