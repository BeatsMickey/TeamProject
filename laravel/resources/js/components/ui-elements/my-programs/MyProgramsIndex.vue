<template>
    <div>
        <h3>Выберите программу занятий:</h3>
        <ul>
            <li class="my-program_list-item" v-for="program in programs">
                <div v-if="current_program && current_program.id === program.id">
                    <a class="my-program_link" href="#">{{ program.name }}</a>
                    <a class="my-program_link" :href="'/program/show/' + program.id">[Просмотреть]</a>
                    <a class="my-program_link" :href="'/program/update/' + program.id">[Редактировать]</a>
                    <a class="my-program_link" :href="'/program/reset/'">[Сбросить]</a>
                    <small class="my-program_selected-item" >(Активная программа)</small>
                </div>

                <div v-else>
                    <a class="my-program_link" :href="'/program/choose/' + program.id">{{ program.name }}</a>
                    <a class="my-program_link" :href="'/program/show/' + program.id">[Просмотреть]</a>
                    <a class="my-program_link" :href="'/program/update/' + program.id">[Редактировать]</a>
                    <a class="my-program_link" :href="'/program/destroy/' + program.id"> [X]</a>

                </div>
            </li>
        </ul>

        <a class="my-program_btn" href="/program/create">Создать новую программу</a>
        <div class="hr"></div>
        <div class="my-program_link"><a href="/set/all">Перейти на страницу наборов упражнений</a></div>
        <div class="my-program_link"><a href="/exercises/all">Перейти на страницу упражнений</a></div>
    </div>
</template>

<script>
    export default {
        name: "MyProgramsIndex",
        props: ['programs', 'current_program'],
    }
</script>

<style scoped>

</style>
