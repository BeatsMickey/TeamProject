<template>
    <div class="exercises-add">
        <p class="exercises-add__btn" v-on:click="showExercises"><span
                class="exercises-add__text">Добавить упражнения</span></p>
        <div class="exercises-add__box" :class="{exercisesadd__box_hidden: exercisesActive}">
            <div class="exercises-add__pop-up">
                <div class="exercises-table">
                    <ul class="exercises-table__labels-box exercises-table__labels-box_noborder">
                        <li class="exercises-table__text exercises-table__labels">Название упражнения</li>
                        <li class="exercises-table__text exercises-table__labels">Повторы</li>
                        <li class="exercises-table__text exercises-table__labels">Масса, кг</li>
                        <li class="exercises-table__text exercises-table__labels"></li>
                    </ul>
                </div>


                <!--<div class="bg-success btn category selected-category" id="all">
                    Все категории
                </div>

                <select>
                    <option v-for="(category, index) in categories.data" :id="category.id" :value="category.id">{{
                        category.name }}
                    </option>
                </select>
                <select id="choose-exercises" name="exercises_id">
                    <option v-for="(exercise, index) in exercises" :id="exercise.id" :value="exercise.id">{{
                        exercise.name }}
                    </option>
                </select>
                <input type="text" name="weight" placeholder="Масса снаряда" required><br>
                <input type="text" name="repetitions" placeholder="Количество подходов" required><br>
                <input type="submit" value="ДОБАВИТЬ">-->
            </div>

        </div>
        <!--  <div>{{categories}}</div>-->
        <div>{{exercises}}</div>
        <div>{{ex_cat_ids}}</div>
    </div>
</template>

<script>
    export default {
        name: "AddExercise",
        data: function () {
            return {
                exercisesActive: true,
            }
        },
        props: ['categories', 'exercises', 'ex_cat_ids', 'today_ex'],
        methods: {
            showExercises() {
                this.exercisesActive = !this.exercisesActive;
            },
            calcValue(id) {
                return String(id);
            }
        }
    }
</script>

<style scoped>
    .exercisesadd__box_hidden {
        display: none;
    }

    .exercises-add__box {

    }

    .exercises-add__pop-up {
        position: fixed;
        top: 50%;
        left: 25%;
        width: 1000px;
        background: #ffffff;
        border-radius: 12px;
        box-shadow: 0 3px 3px 3px rgba(0, 0, 0, 0.25);
        z-index: 9;
    }


</style>