<template>
    <div :id="'slide-' + id"
         class="slide"
         :class="{ 'active' :isActive }" >
        <div class="container">
            <div class="slide-container columns is-gapless is-mobile">
                <div class="column is-12-mobile is-1-desktop">
                    <slot></slot>
                </div>
                <div class="slide-image column is-12" >
                    <img class="slide-image-shadow" src="/wp-content/themes/kma-slim/img/shadows.png" >
                    <img :src="image" >
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
                default: this.image,
                required: true
            },
            id: {
                type: Number,
                default: this.id
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
        -webkit-transition: all linear 1.5s;
        transition: all linear 1.5s;
        position: absolute;
        z-index: -1;
        opacity: 0;
    }
    .slide.active {
        opacity: 1;
        z-index: 0;
    }
    .slide-container {
        align-items: center;
    }
    .slide-image-shadow {
        position: absolute;
    }
    .slide-image {
        display: flex;
        flex-direction: column;
        align-items: flex-end;
        justify-content: flex-end;
    }
</style>