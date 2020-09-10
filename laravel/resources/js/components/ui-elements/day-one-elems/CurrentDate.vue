<template>
    <div class="calendar-day">
        <h6 class="calendar-day__text">{{ month }}, {{ day }}</h6>
    </div>
</template>

<script>
    export default {
        name: "CurrentDate",
        props: ['month', 'day'],
    }
</script>

<style scoped>
    .calendar-day__text {
        font-style: italic;
        font-weight: normal;
        font-size: 32px;
        line-height: 41px;
        letter-spacing: 1px;
        color: #CCCCCC;
    }
</style>