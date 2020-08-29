@if(session('message'))
    <h3>{{ session('message') }}</h3>
@endif
<h2>Старница программы занятий</h2>
{{--@dump($sets)--}}
{{--@dump($programs[0])--}}

@if($current_program)
    <div>
        <h3>Активная программа</h3>
        <a href="{{ route('program.show', $current_program['id']) }}">{{ $current_program['name'] }}</a><br>
        <a href="{{ route('program.reset', $current_program->id) }}">Сбросить программу</a>
        <hr>
    </div>
@endif

<div>
    <h3>Перечень программ</h3>
    @foreach($programs as $program)
        <p>
            <a href="{{ route('program.show', $program['id']) }}">{{ $program['id'] }} {{ $program['name'] }}</a>
        </p>
    @endforeach
</div>

