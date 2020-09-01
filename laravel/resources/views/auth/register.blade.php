@extends('layouts.app')

@section('content')
<div class="section__container">
    <div class="reg__header">Регистрация</div>
    <registration csrf="{{ csrf_token() }}" url="{{ route('register') }}" redirect="{{ route('home') }}"></registration>
</div>
@endsection
