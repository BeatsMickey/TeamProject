@extends('layouts.app')
@section('title', 'Календарь занятий')

@section('header')
    @parent
@endsection

@section('content')
    <section class="section_marginBottom3">
        <div class="section__container">
            <div class="section__container__text section__container__text_marginLeft">
                <h6>Август
                    <div class="arrow">
                        <svg width="12" height="6" viewBox="0 0 12 6" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M1 0.5L6 5.5L11 0.5" stroke="black" stroke-linecap="round"
                                  stroke-linejoin="round"/>
                        </svg>
                    </div>
                </h6>
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
                    <a href="alreadyDoneExercises" class="notActive">
                        <h6>1</h6>
                    </a>

                    <a href="#">
                        <h6>2</h6>
                    </a>

                    <a href="exercise">
                        <h6>3</h6>
                    </a>

                    <a href="#">
                        <h6>4</h6>
                    </a>

                    <a href="#">
                        <h6>5</h6>
                    </a>

                    <a href="#" class="weekend">
                        <h6>6</h6>
                    </a>

                    <a href="#" class="weekend">
                        <h6>7</h6>
                    </a>

                    <a href="#">
                        <h6>8</h6>
                    </a>

                    <a href="#">
                        <h6>9</h6>
                    </a>

                    <a href="#">
                        <h6>10</h6>
                    </a>

                    <a href="#">
                        <h6>11</h6>
                    </a>

                    <a href="#">
                        <h6>12</h6>
                    </a>

                    <a href="#" class="weekend">
                        <h6>13</h6>
                    </a>

                    <a href="#" class="weekend">
                        <h6>14</h6>
                    </a>

                    <a href="#">
                        <h6>15</h6>
                    </a>

                    <a href="#">
                        <h6>16</h6>
                    </a>

                    <a href="#">
                        <h6>17</h6>
                    </a>

                    <a href="#">
                        <h6>18</h6>
                    </a>

                    <a href="#">
                        <h6>19</h6>
                    </a>

                    <a href="#" class="weekend today">
                        <h6>20</h6>
                    </a>

                    <a href="#" class="weekend">
                        <h6>21</h6>
                    </a>

                    <a href="#">
                        <h6>22</h6>
                    </a>

                    <a href="#">
                        <h6>23</h6>
                    </a>

                    <a href="#">
                        <h6>24</h6>
                    </a>

                    <a href="#">
                        <h6>25</h6>
                    </a>

                    <a href="#">
                        <h6>26</h6>
                    </a>

                    <a href="#" class="weekend">
                        <h6>27</h6>
                    </a>

                    <a href="#" class="weekend">
                        <h6>28</h6>
                    </a>

                    <a href="#">
                        <h6>29</h6>
                    </a>

                    <a href="#">
                        <h6>30</h6>
                    </a>

                    <a href="#">
                        <h6>31</h6>
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection

