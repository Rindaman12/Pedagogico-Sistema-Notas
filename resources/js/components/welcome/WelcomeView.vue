<template>
    <div class="welcome-image">
        <div id="particles-js"></div>

        <div class="welcome">
            <img
                class="welcome-img"
                src="/images/Upel.png"
                alt="logo"
                width=""
                height=""
            />
            <h1 class="welcome-title text-thin">UPEL</h1>
        </div>
    </div>
</template>

<style lang="scss" scoped>


.welcome {
    height: 100%;
    max-width: 600px;
    width: 90%;
    margin: auto;
    align-self: center;
    justify-self: center;
    display: flex;
    flex-direction: column;
    align-items: center;
    padding-top: 40px;
    transform: translateY(-40px);

    &-img {
        max-width: 500px;
        width: 90%;
    }
    &-title {
        margin-top: 0;
        color: #0344f7;
        font-weight: 700;
        font-size: 5em;
        text-align: center;

        & .alt {
            color: #f8da2d;
        }
        @media screen and (max-width: 768px) {
            font-size: 4em;
        }
        @media screen and (max-width: 480px) {
            font-size: 3em;
        }
        @media screen and (max-width: 360px) {
            font-size: 2.3em;
        }
    }
}
</style>
