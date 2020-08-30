<template>
    <div class="reg">
        <input-vue v-for="input of inputs" v-bind:input="input"></input-vue>
        <input class="button" @click="registration" type="submit" value="Зарегистрироваться">
        <modal v-bind:visible="is_register"
               header="Вы зарегистрировались!"
               message="Нажмите продолжить что бы начать пользоваться сервисом."
               v-bind:redirect="redirect"
        ></modal>
    </div>
</template>

<script>
    export default {
        name: "registration",
        mounted() {
            console.log(this.redirect);
        },
        data: ()=> {
            return {
                inputs: {
                    name: {type: 'text', label: "Имя", value:""},
                    email: {type: 'email',  label: "Email" , value:""},
                    password: {type: 'password',  label: "Пароль" , value:""},
                    password_confirmation: {type: 'password',  label: "Подтверждение пароля", value:"" },
                },
                is_register: false
            }
        },
        props: ['url', 'csrf', 'redirect'],
        methods: {
            registration: function () {
                axios.post(this.url, {
                    _token: this.csrf,
                    name: this.inputs.name.value,
                    email: this.inputs.email.value,
                    password: this.inputs.password.value,
                    password_confirmation: this.inputs.password_confirmation.value,
                })
                .then( (response) => {
                    this.is_register = true;
                })
                .catch( (error) => {
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
