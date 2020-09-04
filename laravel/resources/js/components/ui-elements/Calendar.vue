<template>
    <section class="calendar">
        <div class="calendar__box">
            <div class="calendar__chooseMonth">
                <div class="calendar__Month-btn" @click="decreaseMonth()">
                    <div class="arrow left"></div>
                </div>
                <div class="calendar__currentMonth"><h2 class="calendar__heading">{{
                    month[currentDate.month].toUpperCase() }}</h2></div>
                <div class="calendar__Month-btn" @click="increaseMonth()">
                    <div class="arrow right"></div>
                </div>
            </div>
            <div class="calendar__weekdays">
                <div class="calendar__weekday" v-for="(weekday, index) in weekdays" :key="index">{{ weekday }}</div>
            </div>
            <div class="calendar__days">
                <div class="calendar__day calendar__day_inactive"
                     v-for="(n, index) in (firstMonthDay - 1)"
                     :key="'prev' + index"><a class="calendar__link calendar__link_inactive" href="#"><span>{{ (prevMonthDays
                    + 1) - firstMonthDay + n }}</span></a>
                </div>
                <div class="calendar__day"
                     v-for="(n, index) in currentMonthsDays"
                     :class="{ calendar__day_active: checkActualDate(n), calendar__day_weekend: checkCurrentMonthWeekend(n), calendar__day_programDay: checkProgramData(n) }"
                     :key="'day' + index">
                    <div v-if="checkActualDate(n)">
                        <a class="calendar__link" :class="{ calendar__link_weekend: checkCurrentMonthWeekend(n) }"
                           :href="prepareLink(n)"><span>{{ n }}</span></a>
                    </div>
                    <div v-else-if="checkPassedDate(n)">
                        <a class="calendar__link" :class="{ calendar__link_weekend: checkCurrentMonthWeekend(n) }"
                           :href="prepareLink(n)"><span>{{ n }}</span></a>
                    </div>
                    <div v-else>
                        <a class="calendar__link" :class="{ calendar__link_weekend: checkCurrentMonthWeekend(n) }"
                           href="#"><span>{{ n }}</span></a>
                    </div>
                </div>
                <div class="calendar__day calendar__day_inactive"
                     v-for="(n, index) in (43 - (currentMonthsDays + firstMonthDay))"
                     :key="'next' + index"><a class="calendar__link calendar__link_inactive"
                                              href="#"><span>{{ n }}</span></a>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
    export default {
        name: "Calendar",
        props: ['urldata'],
        data: function () {
            return {
                weekdays: ['пн', 'вт', 'ср', 'чт', 'пт', 'сб', 'вс'],
                month: ['Январь', 'Февраль', 'Март', 'Апрель', 'Май', 'Июнь', 'Июль', 'Август', 'Сентябрь', 'Октябрь', 'Ноябрь', 'Декабрь'],
                currentDate: {
                    date: 0,
                    month: 0,
                    year: 0
                },
                serverDate: {
                    date: 0,
                    month: 0,
                    year: 0,
                    weekday: 0
                },
                programDays: [],
                isActiveDays: []
            }
        },
        computed: {
            prevMonthDays() {
                let year = this.currentDate.month === 0 ? this.currentDate.year - 1 : this.currentDate.year;
                let month = this.currentDate.month === 0 ? 12 : this.currentDate.month;
                return new Date(year, month, 0).getDate();
            },
            firstMonthDay() {
                let firstDay = new Date(this.currentDate.year, this.currentDate.month, 1).getDay();
                if (firstDay === 0) firstDay = 7;
                return firstDay;
            },
            currentMonthsDays() {
                return new Date(this.currentDate.year, this.currentDate.month + 1, 0).getDate();
            }
        },
        methods: {
            getCurrentDate() {
                let today = new Date();
                this.currentDate.date = today.getDate();
                this.currentDate.month = today.getMonth();
                this.currentDate.year = today.getFullYear();
            },
            increaseMonth() {
                if (this.currentDate.month === 11) {
                    this.currentDate.year += 1;
                    this.currentDate.month = 0;
                } else this.currentDate.month += 1;
            },
            decreaseMonth() {
                if (this.currentDate.month === 0) {
                    this.currentDate.year -= 1;
                    this.currentDate.month = 11
                } else this.currentDate.month -= 1;
            },
            checkCurrentMonthWeekend(day) {
                let checkedDay = new Date(this.currentDate.year, this.currentDate.month, day).getDay();
                if (checkedDay === 0 || checkedDay === 6) return true;
            },
            checkProgramData(n) {
                let month = new Date().getMonth();
                if (this.programDays.includes(n) && this.serverDate.month === month && this.currentDate.month === this.serverDate.month) return true;
            },
            checkActualDate(n) {
                let month = new Date().getMonth();
                if (n === this.serverDate.date && this.serverDate.month === month && this.currentDate.month === this.serverDate.month) return true;
            },
            checkPassedDate(n) {
                let month = new Date().getMonth();
                if (this.isActiveDays.includes(n) && this.serverDate.month === month && this.currentDate.month === this.serverDate.month) return true;
            },
            prepareLink(n) {
                let link = 'view_day/' + (this.serverDate.month + 1) + '/' + n + '/1?weekday=' + this.serverDate.weekday;
                return link;
            },
            parseIncomingData() {
                let arrDays = Object.entries(this.urldata);
                for (let day of arrDays) {
                    if (day[1].is_active === 'today') {
                        this.serverDate.date = +day[0];
                        this.serverDate.month = new Date().getMonth();
                        this.serverDate.year = new Date().getFullYear();
                        this.serverDate.weekday = day[1].weekday;
                    }
                    if (day[1].program_day === true) {
                        this.programDays.push(+day[0])
                    }
                    if (day[1].is_active === 'active') {
                        this.isActiveDays.push(+day[0])
                    }
                }
            }
        },
        beforeMount() {
            this.parseIncomingData();
        },
        created() {
            this.getCurrentDate();
        }
    }
</script>

<style scoped>
    .calendar__box {
        width: 658px;
        display: flex;
        flex-direction: column;
    }

    .calendar__chooseMonth {
        display: flex;
        justify-content: right;
        align-items: center;
        margin-bottom: 48px;
    }

    .calendar__Month-btn {
        cursor: pointer;
        padding-bottom: 10px;
        padding-top: 10px;
    }

    .arrow {
        width: 28px;
        height: 28px;
        border: solid #1C1C1C;
        border-width: 0 8px 8px 0;
    }

    .calendar__Month-btn:hover .arrow, .calendar__Month-btn:hover .arrow {
        border: solid #7543F8;
        border-width: 0 8px 8px 0;
    }

    .right {
        transform: rotate(-45deg);
        -webkit-transform: rotate(-45deg);
    }

    .left {
        transform: rotate(135deg);
        -webkit-transform: rotate(135deg);
    }

    .calendar__currentMonth {
        display: flex;
        justify-content: center;
        width: 260px;
        margin: 0 15px 0 15px;
    }

    .calendar__heading {
        font-style: italic;
        font-weight: 800;
        font-size: 48px;
        line-height: 62px;
        letter-spacing: 1px;
        color: #1C1C1C;
    }

    .calendar__weekdays, .calendar__days {
        display: grid;
        grid-template-columns: repeat(7, 90px);
        grid-gap: 6px;
        text-align: center;
    }

    .calendar__weekdays {
        margin: 0 0 32px 0;
    }

    .calendar__weekday {
        font-style: italic;
        font-weight: normal;
        font-size: 32px;
        line-height: 41px;
        text-align: center;
        letter-spacing: 1px;
        color: #1C1C1C;
    }

    .calendar__day {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 72px;
        margin: 9px;
        background-color: #ffffff;
        border: 3px solid #EEEEEE;
        border-radius: 50%;
        box-sizing: border-box;
    }

    .calendar__link {
        display: block;
        width: 70px;
        height: 70px;
        border-radius: 50%;
        font-style: italic;
        font-weight: normal;
        font-size: 32px;
        line-height: 41px;
        letter-spacing: 1px;
        color: #1C1C1C;

    }

    .calendar__link span {
        height: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
        margin-right: 5px;
    }

    .calendar__day_weekend {
        background: #FC6485;
        border: 3px solid #FC6485;
    }

    .calendar__link_weekend {
        color: #ffffff;
    }

    .calendar__day_active {
        height: 90px;
        width: 90px;
        margin: 0;
        border: 3px solid #1C1C1C;
    }

    .calendar__day_programDay {
        background: #BAF500;
        border: 3px solid #BAF500;
    }

    .calendar__link_programDay {
        color: #1C1C1C;
    }

    .calendar__day_inactive {
        border: 3px solid #EEEEEE;
        background: #EEEEEE;
    }

    .calendar__link_inactive {
        color: #CCCCCC;
    }

    .calendar__day:hover {
        background: #7543F8;
        border: 3px solid #7543F8;
    }

    .calendar__day:hover .calendar__link {
        color: #ffffff;
    }
</style>