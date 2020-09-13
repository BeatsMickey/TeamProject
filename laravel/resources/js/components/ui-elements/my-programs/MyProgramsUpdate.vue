<template>
    <div>
        <h3>Редактировать программу</h3>

        <form :action="'/program/update/' + program.id" method="post">
            <input type="hidden" name="_token" :value="csrf">
            <ul>
                <li class="my-program_list-item">
                    <input class="my-program_input" type="text" name="name" :value="program.name">
                </li>

                <li v-for="weekday in [1, 2, 3, 4, 5, 6, 7]" class="my-program_list-item">
                    <label :for="'day_' + weekday">{{ getDayName(weekday) }}</label>
                    <select class="my-program_input" :name="'day_' + weekday" :id="'day_' + weekday">
                        <option value=""></option>
                        <option v-for="set in sets" :value="set.id"
                            :selected="isset(program_sets[weekday]) && set.id === program_sets[weekday].id"
                        >
                            {{ set.name }}
                        </option>
                    </select>
                </li>
            </ul>

            <button class="my-program_btn">Сохранить изменения</button>
        </form>
    </div>
</template>

<script>
    export default {
        name: "MyProgramsUpdate",
        props: ['program', 'sets', 'program_sets'],
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
