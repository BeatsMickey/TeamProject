@extends('layouts.app')
@section('title', 'Календарь занятий')

@section('header')
    @parent
@endsection

@section('content')
    <section class="section_marginBottom3">
        <div class="section__container">
            <div class="section__container__text section__container__text_marginLeft">
                <form method="get" action="{{ route('trainingLog.calendar') }}">
                    <select class="content_form" name="month">
                        @foreach($months as $key=>$value)
                            <option value="{{ $key }}"
                                    @if($key == $month)
                                    selected
                                @endif
                            >
                                {{ $value }}</option>
                        @endforeach
                    </select>
                    <button>выбрать</button>
                </form>

            </div>

            <div class="hr"></div>

            <div class="section__container__calendar">
                <div class="section__container__calendar__daysOfWeek">
                    <div>
                        <h6>Понедельник</h6>
                    </div>

                    <div>
                        <h6>Вторник</h6>
                    </div>

                    <div>
                        <h6>Среда</h6>
                    </div>

                    <div>
                        <h6>Четверг</h6>
                    </div>

                    <div>
                        <h6>Пятница</h6>
                    </div>

                    <div>
                        <h6>Суббота</h6>
                    </div>

                    <div>
                        <h6>Воскресенье</h6>
                    </div>
                </div>

                <div class="section__container__calendar__numbers">
                    @forelse($calendar as $key => $value)
                        {{--                        @dd($calendar, $value)--}}
                        <a

                            href=
                            @if($value['is_active'] === 'not_active' || $value['is_active'] === 'none')
                                "#"
                        @elseif($value['is_active'] === 'today')
                            "{{ route('trainingLog.view_day', ['month' => $month, 'day' => $key, 'today' => 1,
                            'weekday' => $value['weekday']]) }}"
                        @else
                            "{{ route('trainingLog.view_day', ['month' => $month, 'day' => $key, 'today' => 0,
                            'weekday' => $value['weekday']]) }}"
                        @endif

                        class= "
                        @if($value['weekend'] === true)
                            weekend
                        @endif
                        @if($value['is_active'] === 'not_active')
                            notActive
                        @elseif($value['is_active'] === 'today')
                            today
                        @endif

                        @if(array_key_exists('program_day', $value)
                            && $value['program_day'] && !$value['day_passed'])
                            program_day
                        @endif
                        "
                        @if($value['is_active'] === 'none')
                            style="opacity:0"
                        @endif


                        ><h6>{{ $key }}</h6></a>
                    @empty
                        <p>Что-то пошло не по плану</p>
                    @endforelse

                </div>
            </div>
        </div>
    </section>
@endsection

