
<!-- be sure to register this component before using it -->
<!-- you must display it using v-if to trigger the transitions -->

<template>
    <transition name="fade">
        <div class="modal" @click="hideModal">
            <transition name="scale">
                <div :style="{ width: contentWidth }" @click.stop v-show="viewContent" class="relative">
                    <span class="close__icon" @click="hideModal">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon__svg">
                            <use class="text-grey fill-current" href="/svg/icons.svg#close"></use>
                        </svg>
                    </span>
                    <slot></slot>
                </div>
            </transition>
        </div>
    </transition>
</template>

<script>
export default {
    props: {
        contentWidth: {
            required: false,
            type: String,
            default: '30rem'
        }
    },
    data() {
        return {
            viewContent: false
        }
    },
    mounted() {
        setTimeout(() => {
            this.viewContent = true;
        }, 150);
    },
    methods: {
        hideModal() {
            this.viewContent = false;
            this.$emit('hideModal');
        },
    },
}
</script>

<style scoped>
    .modal {
        position: fixed;
        display: flex;
        justify-content: center;
        align-items: center;
        z-index: 10;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgba(0, 0, 0, .8);
        transition: all .4s ease-in-out;
    }

    .modal__content {
        background-color: white;
        padding: 3rem;
        display: flex;
        flex-direction: column;
    }

    .close__icon {
        position: absolute;
        top: 1rem;
        right: 1.2rem;
        opacity: .8;
        cursor: pointer;
        z-index: 20;
        transition: all .2s;
    }

    .close__icon:hover,
    .close__icon:focus {
        opacity: 1;
    }

    .close__icon:hover {
        transform: scale(1.05);
    }

    .icon__svg {
        height: 1.3rem;
        width: 1.3rem;
    }

    .fade-enter-active, .fade-leave-active {
        transition: opacity .2s;
    }
    .fade-enter, .fade-leave-to {
        opacity: 0;
    }
    .scale-enter-active {
        animation: scaleIn .2s ease-in-out forwards;
    }
    .scale-leave-active {
        animation: scaleOut .2s ease-in-out forwards;
    }
    @keyframes scaleIn {
        0% {opacity: 0; transform: scale(.75);}
        100% {opacity: 1;transform: scale(1);}
    }
    @keyframes scaleOut {
        0% {opacity: 1;transform: scale(1);}
        100% {opacity: 0; transform: scale(.75);}
    }
</style>

