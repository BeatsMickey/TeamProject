@extends('layouts.app')
@section('title', 'Редактирование пользователей')

@section('header')
    @parent
@endsection

@section('content')
    <div class="section__container">
        @forelse($users as $user)
            <div class="content_block">
                <h2>{{$user->name}}</h2>
                @if($user->is_admin)
                    <p>Администратор</p>
                @else
                    <p>Гость</p>
                @endif
                <a class="content_link btn" href="{{ route('admin.users.update', ['id' => $user->id]) }}">
                    Изменить
                </a>
            </div>
        @empty
            <p>Пользователей нет</p>
        @endforelse
    </div>
@endsection
