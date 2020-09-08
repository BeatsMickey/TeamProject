<template>
    <div class="login">
        <div class="login__box" v-on:click="showLogin">
            <p class="login__text">Войти</p>
            <p class="login__icon login-icon"><i class="icon fa fa-user" aria-hidden="true"></i></p>
        </div>
        <div class="login_full_hidden" :class="{ hidden: loginActive }">
            <div class="login_full_hidden__form">
                <div class="login_full_hidden__inputs">
                    <input-vue v-for="input of inputs" v-bind:input="input"></input-vue>
                </div>
                <div class="login_full_hidden__textbox">
                    <p class="login_full_hidden__text">Неверный пароль: <a class="login_full_hidden__link" href="#">Напомнить?</a>
                    </p>
                </div>
                <div class="login_full_hidden__btns">
                    <input class="login_full_hidden__btn" @click="login" type="submit" value="Вход">
                    <a class="login_full_hidden__btn" href="#">Регистрация</a>
                </div>
            </div>
        </div>
    </div>

</template>

<script>
    export default {
        name: "Login",
        data: function () {
            return {
                inputs: {
                    email: {type: 'email', label: "Email", value: ""},
                    password: {type: 'password', label: "Пароль", value: ""},
                },
                loginActive: true,
            }
        },
        props: ['url', 'csrf', 'redirect'],
        methods: {
            showLogin() {
                this.loginActive = !this.loginActive;
            },
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
            }

        }
    }
</script>

<style scoped>
    .login {
        position: relative;
    }

    .login__box {
        width: 180px;
        cursor: pointer;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .login__icon {
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .login-icon {
        height: 60px;
        width: 60px;
        border: 1px solid #7543F8;
        border-radius: 50%;
        background: #7543F8;
    }

    .icon {
        font-size: 28px;
        color: #ffffff;
    }

    .login__text {
        font-style: italic;
        font-weight: normal;
        font-size: 32px;
        line-height: 41px;
        letter-spacing: 1px;
        color: #000000;
    }

    .hidden {
        display: none;
    }

    .login_full_hidden {
        position: absolute;
        z-index: 10;
        top: 70px;
        right: 0;
        height: 312px;
        width: 432px;
        background: #FFFFFF;
        box-shadow: 0 3px 3px 3px rgba(0, 0, 0, 0.25);
    }

    .login_full_hidden__form {
        margin: 26px;
    }

    .login_full_hidden__inputs {
        height: 132px;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }

    .login_full_hidden__textbox {
        margin-top: 12px;
    }

    .login_full_hidden__text {
        font-style: normal;
        font-weight: normal;
        font-size: 20px;
        line-height: 26px;
        letter-spacing: 2px;
        color: #1C1C1C;
    }

    .login_full_hidden__link {
        font-style: normal;
        font-weight: normal;
        font-size: 20px;
        line-height: 26px;
        letter-spacing: 2px;
        color: #7543F8;
    }

    .login_full_hidden__btns {
        margin-top: 24px;
        display: flex;
        justify-content: space-around;
    }

    .login_full_hidden__btn {
        background: #BAF500;
        border: 0;
        padding: 17px;
        font-style: italic;
        font-weight: bold;
        font-size: 20px;
        line-height: 26px;
        letter-spacing: 2px;
        color: #1C1C1C;
    }

    .login_full_hidden__btn:active, .login_full_hidden__btn:focus, .login_full_hidden__btn:visited {
        background: #7543F8;
        color: #ffffff;
        border: 0;
        outline: 0;
    }

</style>