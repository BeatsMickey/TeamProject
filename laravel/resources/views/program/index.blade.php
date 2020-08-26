<h2>Старница программы занятий</h2>
@dump($sets)
@dump($programs[0])
@foreach($programs as $program)
    <p>
        <a href="{{ route('program.show', $program['id']) }}">{{ $program['id'] }} {{ $program['name'] }}</a>
    </p>

@endforeach
