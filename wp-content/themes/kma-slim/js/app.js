require("babel-polyfill");

window.Vue = require('vue');

import message from './components/message.vue';
import modal from './components/modal.vue';
import VideoModal from './components/VideoModal.vue';
import tabs from './components/tabs.vue';
import tab from './components/tab.vue';
import slider from './components/slider.vue';
import slide from './components/slide.vue';
import GoogleMap from './components/GoogleMap.vue';
import GoogleMapPin from './components/GoogleMapPin.vue';
import InstaGallery from './components/InstaGallery.vue';
import VueParallaxJs from 'vue-parallax-js';
import {VueMasonryPlugin} from 'vue-masonry';
import DonationForm from './components/DonationForm';

window.Vue.use(VueParallaxJs, {
    minWidth: 1000,
});

Vue.use(VueMasonryPlugin)

let app = new Vue({

    el: '#app',

    components: {
        'message': message,
        'modal': modal,
        'video-modal' : VideoModal,
        'tabs': tabs,
        'tab': tab,
        'slider': slider,
        'slide': slide,
        'google-map': GoogleMap,
        'pin': GoogleMapPin,
        'insta-gallery': InstaGallery,
        'donations-form': DonationForm
    },

    data: {
        isOpen: false,
        isScrolling: false,
        modalOpen: false,
        modalContent: '',
        scrollPosition: 0,
        footerStuck: false,
        clientHeight: 0,
        windowHeight: 0,
        windowWidth: 0,
        menuItems: []
    },

    methods: {

        toggleMenu(){
            this.isOpen = !this.isOpen;
        },

        handleScroll(){
            this.scrollPosition = window.scrollY;
            this.isScrolling = this.scrollPosition > 40;
        },

        handleMobileSubMenu(){
            this.menuItems.forEach(menuItem => {
                let menuLink = menuItem.querySelector('.mobile-expand');
                if(menuLink != null) {
                    menuLink.addEventListener('click', function (e) {
                        e.preventDefault();
                        let menu = menuItem.querySelector('.navbar-dropdown');
                        if (menu.classList.contains('is-open')) {
                            menu.classList.remove('is-open');
                        } else {
                            menu.classList.add('is-open');
                        }
                    });
                }
            });
        }

    },

    mounted: function() {
        this.footerStuck = window.innerHeight > this.$root.$el.clientHeight;
        this.clientHeight = this.$root.$el.clientHeight;
        this.windowHeight = window.innerHeight;
        this.windowWidth = window.innerWidth;
        this.handleScroll();
        this.menuItems = this.$el.querySelectorAll('#MobileNavMenu .navbar-item');
        this.handleMobileSubMenu();
    },

    created: function () {
        window.addEventListener('scroll', this.handleScroll);
    },

    destroyed: function () {
        window.removeEventListener('scroll', this.handleScroll);
    }

});

