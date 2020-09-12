@extends('layouts.app')
@section('title', 'Программы упражнений')

@section('header')
    @parent
@endsection

@section('content')
    <div class="section__container">

        @if(session('message'))
            <h3 class="my-program_message">{{ session('message') }}</h3>
        @endif

        <my-programs-index :programs="{{json_encode($programs)}}" :current_program="{{json_encode($current_program)}}"></my-programs-index>

@endsection
<script>
    import MyProgramsIndex from "../../js/components/ui-elements/MyProgramsIndex";
    export default {
        components: {MyProgramsIndex}
    }
</script>
