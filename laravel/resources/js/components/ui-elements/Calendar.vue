<template>
    <section class="calendar">
        <div class="calendar__box">
            <div class="calendar__chooseMonth">
                <div class="calendar__Month-btn" @click="currentDate.month -= 1"><</div>
                <div class="calendar__currentMonth">{{ month[currentDate.month] }}</div>
                <div class="calendar__Month-btn" @click="currentDate.month += 1">></div>
            </div>
            <div class="calendar__weekdays">
                <div class="calendar__weekday" v-for="(weekday, index) in weekdays" :key="index">{{ weekday }}</div>
            </div>
            <div class="calendar__days">
                <div class="calendar__day calendar__day_inactive"
                     :class="{ calendar__day_weekend: checkPastMonthWeekend( (prevMonthDays + 1) - firstMonthDay + n) }"
                     v-for="(n, index) in (firstMonthDay - 1)"
                     :key="'prev' + index">{{ (prevMonthDays + 1) - firstMonthDay + n }}
                </div>
                <div class="calendar__day"
                     :class="{ calendar__day_active: n === currentDate.date, calendar__day_weekend: checkCurrentMonthWeekend(n) }"
                     v-for="(n, index) in currentMonthsDays"
                     :key="'day' + index">
                    <div v-if="n === currentDate.date">
                        <a class="calendar__link" :href="'view_day/' + (currentDate.month+1) + '/' + n + '/1'">{{ n }}</a>
                    </div>
                    <div v-else>
                        <a href="#">{{ n }}</a>
                    </div>
                </div>
                <div class="calendar__day calendar__day_inactive"
                     :class="{ calendar__day_weekend: checkFutureMonthWeekend(n) }"
                     v-for="(n, index) in (43 - (currentMonthsDays + firstMonthDay))"
                     :key="'next' + index">{{ n }}
                </div>
            </div>
        </div>
    </section>
</template>

<script>
    export default {
        name: "Calendar",
        data: function () {
            return {
                weekdays: ['Понедельник', 'Вторник', 'Среда', 'Четверг', 'Пятница', 'Суббота', 'Воскресенье'],
                month: ['Январь', 'Февраль', 'Март', 'Апрель', 'Май', 'Июнь', 'Июль', 'Август', 'Сентябрь', 'Октябрь', 'Ноябрь', 'Декабрь'],
                currentDate: {
                    date: 0,
                    month: 0,
                    year: 0
                }

            }
        },
        computed: {
            prevMonthDays() {
                let year = this.currentDate.month === 0 ? this.currentDate.year - 1 : this.currentDate.year;
                let month = this.currentDate.month === 0 ? 11 : this.currentDate.month;
                return new Date(year, month, 0).getDate();
            },
            firstMonthDay() {
                let firstDay = new Date(this.currentDate.year, this.currentDate.month, 1).getDay();
                if (firstDay === 0) firstDay = 7;
                return firstDay;
            },
            currentDay() {
                return new Date(this.currentDate.year, this.currentDate.month, this.currentDate.date - 1).getDay();
            },
            currentMonthsDays() {
                return new Date(this.currentDate.year, this.currentDate.month + 1, 0).getDate();
            },
            increaseMonth() {

                this.currentDate.month -= 1
            },
            decreaseMonth() {

            }
        },
        methods: {
            getCurrentDate() {
                let today = new Date();
                this.currentDate.date = today.getDate();
                this.currentDate.month = today.getMonth();
                this.currentDate.year = today.getFullYear();
            },
            checkCurrentMonthWeekend(day) {
                let checkedDay = new Date(this.currentDate.year, this.currentDate.month, day).getDay();
                if (checkedDay === 0 || checkedDay === 6) return true;
            },
            checkFutureMonthWeekend(day) {
                let checkedDay = new Date(this.currentDate.year, this.currentDate.month + 1, day).getDay();
                if (checkedDay === 0 || checkedDay === 6) return true;
            },
            checkPastMonthWeekend(day) {
                let checkedDay = new Date(this.currentDate.year, this.currentDate.month - 1, day).getDay();
                if (checkedDay === 0 || checkedDay === 6) return true;
            }
        },
        created() {
            this.getCurrentDate();
        }
    }
</script>

<style scoped>
    .calendar__box {
        width: 728px;
        display: flex;
        flex-direction: column;
    }

    .calendar__chooseMonth {
        display: flex;
        justify-content: center;
        align-items: center;
        margin-bottom: 10px;
    }

    .calendar__Month-btn {
        cursor: pointer;
    }

    .calendar__currentMonth {
        display: flex;
        justify-content: center;
        font-size: 24px;
        width: 100px;
        margin: 0 15px 0 15px;
    }

    .calendar__weekdays, .calendar__days {
        display: grid;
        grid-template-columns: repeat(7, 100px);
        grid-gap: 4px;
        text-align: center;
    }

    .calendar__weekdays {
        border-bottom: 1px solid red;
        padding: 0 0 10px 0;
        margin: 0 0 10px 0;
    }

    .calendar__day {
        height: 40px;
        background-color: #EFEFEF;
        color: black;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .calendar__day_weekend {
        background-color: pink;
    }

    .calendar__day_active {
        background-color: white;
        outline: 1px solid red;
    }

    .calendar__day_inactive {
        color: gray;
        opacity: 0.4;
    }

</style>