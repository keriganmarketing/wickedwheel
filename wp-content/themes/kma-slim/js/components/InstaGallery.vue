<template>
    <div class="columns is-multiline is-justified is-aligned is-mobile">
        <div v-for="(photo, index) in photos" class="column is-4">
            <img class="is-block" :src="photo.small" @click="toggleGallery(index)" >
        </div>
        <div class="modal is-active" v-if="showModal">
            <div class="modal-background" @click="toggleGallery"></div>
            <div class="modal-content large" >
                <div class="photo-holder" >
                    <img :src="photos[currentPhoto].large" >
                </div>
                <div class="columns">
                    <div class="column is-6"><a @click="previousPhoto">Previous</a></div>
                    <div class="column is-6"><a @click="nextPhoto">Next</a></div>
                </div>
            </div>
            <button class="modal-close is-large" @click="toggleGallery"></button>
        </div>
    </div>
</template>

<script>
    export default {
        props: {
            photos: {
                type: Array,
                default: () => []
            }
        },
        data() {
            return {
                viewer: {},
                currentPhoto: 0,
                showModal: false
            }
        },
        mounted() {

        },
        methods: {
            setPhoto(index){
                this.currentPhoto = index;
                this.viewer = this.$refs.viewerTemplate;
            },
            toggleGallery(index){
                this.setPhoto(index);
                this.showModal = !this.showModal;
            },
            nextPhoto(){
                let nextPhoto = (this.currentPhoto < this.photos.length -1 ? this.currentPhoto + 1 : 0);
                this.setPhoto(nextPhoto);
            },
            previousPhoto(){
                let nextPhoto = (this.currentPhoto > 1 ? this.currentPhoto - 1 : this.photos.length);
                this.setPhoto(nextPhoto);
            }
        }
    }
</script>

<style scoped>
    img {
        cursor: pointer;
    }

    .modal-content.large {
        width: 960px;
        max-width: 100%;
        overflow: hidden;
    }

    .photo-holder {
        text-align: center;
        overflow: hidden;
    }

    .photo-holder img {
        max-height: 90vh;
        max-width: 90vh;
    }
</style>