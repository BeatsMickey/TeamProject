<template>
    <div class="modal" v-if="visible">
        <div class="modal__frame">
            <h1>{{ header }}</h1>
            <p>{{ message }}</p>
            <input class="button" @click="next" type="submit" value="Продолжить">
        </div>
    </div>
</template>

<script>
    export default {
        name: "Modal",
        props: [
            'header',
            'message',
            'visible',
            'redirect'
        ],
        methods: {
            next: function () {
                console.log(this.redirect);
                if(this.redirect) {
                    location = this.redirect;
                }
                this.visible = false;
            },
        }
    }
</script>

<style scoped="scss">
    .modal {
        position: fixed;
        top: 0px;
        left:0px;
        right: 0px;
        bottom: 0px;
        background: rgba(0,0,0,.5);
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .modal__frame {
        padding: 20px;
        width: 400px;
        height: 400px;
        max-width: 100%;
        background: #FFF;
        text-align: center;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        align-items: center;

    }
</style>
