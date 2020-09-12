<template>
    <div>

        <a href="/program/all">Вернуться на страницу программ</a>
        <h1>{{ program.name }}</h1>
        <div v-for="set in sets">
            <div class="my-program_list-item">{{ getDayName(set.pivot.day_of_program) }} - <a :href="'/set/update/' + set.id">{{ set.name }}</a>
            <details class="my-program_details">
                <summary>Подробнее</summary>
                <p v-for="exercise in set.exercises">{{ exercise.name}}</p>
            </details>

            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "MyProgramsOne",
        props: ['program', 'sets'],
        methods: {
            getDayName($day_number) {
                switch ($day_number) {
                    case 1:
                        return 'Пн';
                    case 2:
                        return 'Вт';
                    case 3:
                        return 'Ср';
                    case 4:
                        return 'Чт';
                    case 5:
                        return 'Пт';
                    case 6:
                        return 'Сб';
                    case 7:
                        return 'Вс';
                }
            }
        }

    }
</script>

<style scoped>
    .my-program_details {
        font-size: 16px;
    }
</style>
