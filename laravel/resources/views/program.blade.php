<h2>Старница программы занятий</h2>
@dump($sets)
@dump($programs[0])
@foreach($programs as $item)
    <p>{{ $item['id'] }} {{ $item['name'] }}</p>
@endforeach
