<template>
    <div>
        <h3>Создать новую программу</h3>
        <form action="/program/create" method="post">
            <input type="hidden" name="_token" :value="csrf">

            <div>
                <input class="my-program_input" type="text" name="name" placeholder="Название программы">
            </div>

            <ul>
                <li v-for="weekday in [1, 2, 3, 4, 5, 6, 7]" class="my-program_list-item">
                    <label :for="'day_' + weekday">{{ getDayName(weekday) }}</label>

                    <select class="my-program_input" :name="'day_' + weekday" :id="'day_' + weekday">
                        <option value=""></option>
                        <option v-for="set in sets" :value="set.id">{{ set.name }}</option>
                    </select>
                </li>
            </ul>

            <button class="my-program_btn">Создать программу</button>
        </form>
    </div>
</template>

<script>
    export default {
        name: "MyProgramsCreate",
        props: ['sets'],
        data: () => ({
            csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
        }),
        methods: {
            getDayName(day_number) {
                switch (day_number) {
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
            },
            isset(variable) {
                return typeof(variable) != "undefined" && variable !== null;
            }
        }

    }
</script>

<style scoped>

</style>
