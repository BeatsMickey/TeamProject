<template>
    <div class="logo">
        <div class="logo__box">
            <a class="logo__link" href="/traininglog/calendar"><span class="logo__text_big">Workout&nbsp;table</span>
                <span class="logo__text">Онлайн дневник для тренировок</span></a>
        </div>
    </div>
</template>

<script>
    export default {
        name: "Logo"
    }
</script>

<style scoped>
    .logo__box {
        width: 570px;
    }

    .logo__link {
        height: 100%;
        display: block;
    }

    .logo__link:hover, .logo__link:active {
        color: #7543F8;
    }

    .logo__text {
        font-style: italic;
        font-weight: normal;
        font-size: 32px;
        line-height: 41px;
        letter-spacing: 1px;
        color: #1C1C1C;
        text-transform: none;
    }
    .logo__text_big {
        font-style: italic;
        font-weight: 800;
        font-size: 64px;
        line-height: 82px;
        letter-spacing: 2px;
        color: #7543F8;
        text-transform: uppercase;
    }
</style>
