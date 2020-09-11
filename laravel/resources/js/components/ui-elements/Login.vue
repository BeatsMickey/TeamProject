<template>
    <div class="login">
        <div class="login__box" v-on:click="showLogin">
            <p v-if="isAdmin()" class="login__text">Admin</p>
            <p v-else-if="isUser()" class="login__text">{{ user_name }}</p>
            <p v-else class="login__text">Войти</p>
            <p class="login__icon login-icon"><i class="icon fa fa-user" aria-hidden="true"></i></p>
        </div>
        <div class="login_full" :class="{ hidden: loginActive, login_full_short: isUser() }">
            <div v-if="isUser()" class="login_full__form_little">
                <ul>
                    <li class="login_full__item"><a class="login_full__text login_full__text_menulink"
                                                    href="/personal/area">Мой кабинет</a></li>
                    <li class="login_full__item"><a class="login_full__text login_full__text_menulink"
                                                    href="/program/all">Мои программы</a></li>
                    <li class="login_full__item"><a class="login_full__text login_full__text_menulink"
                                                    href="/measurements/all">Мои измерения</a></li>
                    <li class="login_full__item" v-if="isAdmin()"><a class="login_full__text login_full__text_menulink"
                                                                     href="/admin">Редактирование данных</a></li>
                    <li class="login_full__item"><a class="login_full__text login_full__text_menulink" @click="logout"
                                                    :href="logouturl">Выйти</a></li>
                </ul>
            </div>
            <div v-else class="login_full__form">
                <div class="login_full__inputs">
                    <input-vue v-for="input of inputs" :class="{input_form__wrong: showError(input.type) }"
                               v-bind:input="input"></input-vue>
                </div>
                <div class="login_full__textbox">
                    <p class="login_full__text">Забыли пароль: <a class="login_full__text_remember"
                                                                  href="/password/reset">Напомнить?</a>
                    </p>
                </div>
                <div class="login_full__btns">
                    <input class="login_full__btn" @click="login" type="submit" value="Вход">
                    <a class="login_full__btn" href="/register">Регистрация</a>
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
                errors: []
            }
        },
        props: ['url', 'csrf', 'redirect', 'logouturl', 'admin', 'user', 'user_name'],
        methods: {
            showLogin() {
                this.loginActive = !this.loginActive;
            },
            showError(key) {
                if (this.errors.includes(key)) return true;
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
                    .catch((error) => {
                        if (+error.response.status === 422) {
                            for (let key in error.response.data.errors) {
                                if (this.errors.includes(key)) {
                                    return true;
                                } else {
                                    this.errors.push(key)
                                }
                            }
                        }
                    });
            },
            logout: function () {
                axios.post(this.logouturl, {
                    _token: this.csrf
                })
                    .then((response) => {
                        if (this.redirect) {
                            location = this.redirect;
                        }
                    })
            },
            isAdmin() {
                if (+this.admin) return true;
            },
            isUser() {
                let isUser = (this.user === "user") ? true : false;
                return isUser;
            }

        }
    }
</script>

<style scoped>
    .login {
        position: relative;
    }

    .login__box {
        width: 300px;
        cursor: pointer;
        display: flex;
        justify-content: flex-end;
        align-items: center;
    }

    .login__icon {
        display: flex;
        align-items: center;
        justify-content: center;
        margin-left: 12px;
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

    .login_full {
        position: absolute;
        z-index: 10;
        top: 70px;
        right: 0;
        width: 432px;
        background: #FFFFFF;
        border-radius: 12px;
        box-shadow: 0 3px 3px 3px rgba(0, 0, 0, 0.25);
    }

    .login_full_short {
        width: 318px;
    }

    .login_full__form {
        margin: 26px;
    }

    .login_full__form_little {
        margin: 0;
    }

    .login_full__inputs {
        height: 132px;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }

    .login_full__item {
        padding: 14px 14px 14px 14px;
        border-bottom: 1px solid #EEEEEE;
    }

    .login_full__textbox {
        margin-top: 12px;
        display: flex;
        justify-content: center;
    }

    .login_full__text {
        font-style: normal;
        font-weight: normal;
        font-size: 20px;
        line-height: 26px;
        letter-spacing: 1px;
        color: #1C1C1C;
    }

    .login_full__text_remember {
        color: #7543F8;
    }

    .login_full__text_menulink {
        display: block;
    }

    .login_full__text_menulink:hover {
        color: #7543F8;
    }


    .login_full__btns {
        margin-top: 24px;
        display: flex;
        justify-content: space-between;
    }

    .login_full__btn {
        cursor: pointer;
        background: #BAF500;
        border: 0;
        border-radius: 6px;
        padding: 17px;
        font-style: italic;
        font-weight: bold;
        font-size: 20px;
        line-height: 26px;
        letter-spacing: 2px;
        color: #1C1C1C;
        min-width: 120px;
    }

    .login_full__btn:hover {
        background-color: #7543F8;
        color: #ffffff;
    }

    .login_full__btn:active, .login_full__btn, .login_full__btn:focus, .login_full__btn:visited {
        border: 0;
        outline: 0;
    }

    .input_form__wrong {
        outline: 1px solid #CE1A4D;
    }

</style>
