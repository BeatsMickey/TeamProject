<template>
    <div class="input-vue">
        <input class="input-form"
               v-model="input.value"
               v-bind:type="this.input.type"
               v-bind:placeholder="this.input.label" >
        <ul v-if="this.input.errors">
            <li v-for="error of this.input.errors">{{ error }}</li>
        </ul>
    </div>
</template>

<script>
    export default {
        name: "InputVue",
        props: [
            'input'
        ],
        data: () =>{
            return {
                value: ""
            }
        }
    }
</script>

<style scoped="scss">
    ul {
        list-style: none;
    }
    .input-form + ul {
        margin-top: 8px;
    }
</style>
