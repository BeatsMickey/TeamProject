{{--@dump($program)--}}
{{--@dump($sets)--}}
<h3>{{ $program->name }}</h3>
@foreach($sets as $set)
    <p>{{ $set->name }}</p>
@endforeach


