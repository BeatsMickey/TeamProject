<template>
    <section class="categories">
        <div class="categories_box">
            <div class="categories__header">
                <p class="categories__heading">Категории:</p>
            </div>
            <div class="categories__content">
                <div class="categories-card" v-for="(category, index) in exCategories" :key="index">
                    <a :href="prepareLink(category)" class="categories-card__link">
                        <img src="https://images.unsplash.com/photo-1531520563951-4c0e3d3fcacc?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=607&q=80" alt="category"
                             class="categories-card__img"><span
                            class="categories-card__name">{{ category[1].name }}</span>
                    </a>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
    export default {
        name: "Categories",
        props: ['urldata'],
        data: function () {
            return {
                exCategories: []
            }
        },
        methods: {
            parseIncomingData() {
                let data = Object.entries(this.urldata.data);
                for (let category of data) {
                    this.exCategories.push(category);
                }
            },
            prepareLink(cat) {
                return 'exercises/' + cat[1].id;
            }
        },
        beforeMount() {
            this.parseIncomingData();
        }
    }
</script>

<style scoped>
    .categories__header {
        margin: 0 0 48px 0;
    }

    .categories__heading {
        font-style: italic;
        font-weight: 800;
        font-size: 48px;
        line-height: 62px;
        letter-spacing: 1px;
        color: #1C1C1C;
    }

    .categories__content {
        display: grid;
        grid-template-columns: repeat(3, 318px);
        grid-column-gap: 24px;
        grid-row-gap: 48px;
        text-align: left;
    }

    .categories-card {
        height: 525px;
    }

    .categories-card__link {
        display: block;
    }

    .categories-card__link:hover .categories-card__img {
        outline: 5px solid #BAF500;;
    }

    .categories-card__link:hover .categories-card__name {
        font-weight: 900;
    }

    .categories-card__img {
        height: 480px;
        width: 100%;
    }

    .categories-card__name {
        font-style: italic;
        font-weight: normal;
        font-size: 32px;
        line-height: 41px;
        letter-spacing: 1px;
        color: #1C1C1C;
    }
</style>