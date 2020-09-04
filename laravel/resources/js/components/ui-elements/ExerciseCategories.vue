<template>
    <section class="exercises">
        <div class="exercises__box">
            <div class="exercises__header">
                <p class="exercises__heading"><a class="exercises__link" href="/exercises/categories">УПРАЖНЕНИЯ</a> /
                    {{ category.name.toUpperCase() }}</p>
            </div>
            <div class="exercises__content">
                <div class="exercises-card" v-for="(exercise, index) in exercises" :key="index">
                    <a :href="prepareLink(exercise)" class="exercises-card__link">
                        <img src="https://images.unsplash.com/photo-1563427632003-20f6943d3a6d?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1350&q=80"
                             alt="exercise"
                             class="exercises-card__img">
                        <span class="exercises-card__name">{{ exercise.name }}</span>
                    </a>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
    export default {
        name: "ExerciseCategories",
        props: ['cat', 'urldata'],
        data: function () {
            return {
                category: {},
                exercises: {},
            }
        },
        methods: {
            getCategory() {
                let cat = {
                    id: this.cat.id,
                    name: this.cat.name
                };
                this.category = cat;
            },
            getExercises() {
                let exercises = this.urldata.data;
                this.exercises = exercises;
            },
            prepareLink(cat) {
                return "/exercises/exercises_card/" + cat.id;
            }
        },
        beforeMount() {
            this.getCategory();
            this.getExercises();
        }
    }
</script>

<style scoped>
    .exercises__header {
        margin: 0 0 48px 0;
    }

    .exercises__heading {
        font-style: italic;
        font-weight: 800;
        font-size: 48px;
        line-height: 62px;
        letter-spacing: 1px;
        color: #1C1C1C;
    }

    .exercises__link {
        color: #1C1C1C;
    }

    .exercises__link:hover {
        color: #7543F8;
    }

    .exercises__content {
        display: grid;
        grid-template-columns: repeat(3, 318px);
        grid-column-gap: 24px;
        grid-row-gap: 30px;
        text-align: left;
    }

    .exercises-card {
        height: 260px;
    }

    .exercises-card__link {
        display: block;
    }

    .exercises-card__img {
        height: 204px;
        width: 100%;
    }

    .exercises-card__name {
        font-style: normal;
        font-weight: normal;
        font-size: 20px;
        line-height: 26px;
        letter-spacing: 2px;
        color: #1C1C1C;
    }

    .exercises-card__link:hover .exercises-card__img {
        outline: 5px solid #BAF500;;
    }

    .exercises-card__link:hover .exercises-card__name {
        font-weight: 900;
    }

</style>