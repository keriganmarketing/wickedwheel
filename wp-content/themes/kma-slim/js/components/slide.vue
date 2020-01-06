<template>
    <div :id="'slide-' + id"
         class="slide"
         :class="{ 'active' :isActive }" >
        <div class="container">
            <div class="slide-container columns is-gapless is-mobile">
                <div class="column is-12-mobile is-1-desktop">
                    <slot></slot>
                </div>
                <div 
                    class="slide-image column is-12"
                    :style="'background-image: url(' + image + ')'"
                    >
                    <img alt="" class="slide-image-shadow" src="/wp-content/themes/kma-slim/img/shadows.png" >
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {

        props: {
            image: {
                type: String,
                default: null,
                required: true
            },
            id: {
                type: Number,
                default: null
            }
        },

        data(){
            return {
                isActive: false
            };
        },

        computed: {
            zindex: function(){
                let index = this.id;
                return (20 - index);
            }
        }

    }
</script>
<style>
    .slide {
        width:100%;
        opacity: 0;
        transition: opacity linear 1.5s;
        position: absolute;
        z-index: -1;
    }

    .slide.active {
        opacity: 1;
        z-index: 0;
    }
    .slide-container {
        align-items: center;
    }
    .slide-image-shadow {
        width: 100%;
        height: 100%;
    }
    .slide-image {
        display: flex;
        flex-direction: column;
        align-items: flex-end;
        justify-content: flex-end;
        background-position: center;
        background-size: cover;
        height: 200px;
    }

    @media screen and (min-width: 576px) {
        .slide-image {
            height: 300px;
        }
    }

    @media screen and (min-width: 783px) {
        .slide-image {
            height: auto;
        }
    }
</style>