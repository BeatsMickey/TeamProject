<template>
    <div class="reg">
        <input-vue v-for="input of inputs" v-bind:input="input"></input-vue>
        <input class="button" @click="login" type="submit" value="Войти">
    </div>
</template>

<script>
    export default {
        name: "Login",
        data: () => {
            return {
                inputs: {
                    email: {type: 'email', label: "Email", value: ""},
                    password: {type: 'password', label: "Пароль", value: ""},
                }
            }
        },
        props: ['url', 'csrf', 'redirect'],
        methods: {
            login: function () {
                axios.post(this.url, {
                    _token: this.csrf,
                    email: this.inputs.email.value,
                    password: this.inputs.password.value,
                })
                .then((response) => {
                    if (this.redirect) {
                        location = this.redirect;
                    }
                })
                .catch((error) => {
                    if(+error.response.status === 422) {
                        for(let key in error.response.data.errors) {
                            this.$set(this.inputs[key], 'errors',  error.response.data.errors[key])
                        }
                    }
                });
            }
        }
    }
</script>

<style scoped>

</style>
