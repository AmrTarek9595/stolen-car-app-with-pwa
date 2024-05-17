

require('./bootstrap');

import Vue from 'vue';
import Home from './components/en/home.vue';
import Apply from './components/en/apply.vue';
import Layout from './components/en/layout.vue';
import Inquiry from './components/en/inquiry.vue';
import Inform from './components/en/inform.vue';
import Homear from './components/ar/home.vue';
import Applyar from './components/ar/apply.vue';
import Layoutar from './components/ar/layout.vue';
import Inquiryar from './components/ar/inquiry.vue';
import Informar from './components/ar/inform.vue';
import VueRouter from 'vue-router';

Vue.use(VueRouter);


const router=new VueRouter({
 mode:'history',
    routes:[
        {   
            name:'Home',
            path:'/en',
            component: () => new Promise(resolve => setTimeout(() => resolve(Home), 1000)),
         
        },
        {   
            name:'Apply',
            path:'/en/apply',
            component:Apply
        },
        {
            name:'Inquiry',
            path:'/en/inquiry',
            component:() => new Promise(resolve => setTimeout(() => resolve(Inquiry), 1000))
        },
        {
            name:'Inform',
            path:'/en/inform',
            component:() => new Promise(resolve => setTimeout(() => resolve(Inform), 1000))
        },
        {   
            name:'Homear',
            path:'/ar',
            component: () => new Promise(resolve => setTimeout(() => resolve(Homear), 1000)),
         
        },
        {   
            name:'Applyar',
            path:'/ar/apply',
            component:Applyar
        },
        {
            name:'Inquiryar',
            path:'/ar/inquiry',
            component:() => new Promise(resolve => setTimeout(() => resolve(Inquiryar), 1000))
        },
        {
            name:'Informar',
            path:'/ar/inform',
            component:() => new Promise(resolve => setTimeout(() => resolve(Informar), 1000))
        }
    ]
});


router.beforeResolve((to, from, next) => {
    // If this isn't an initial page load.
    if (to.name) {
        // Start the route progress bar.
        NProgress.start()
    }
    next()
  })
  
  router.afterEach((to, from) => {
    // Complete the animation of the route progress bar.
    NProgress.done()
  })
  export default router

const app = new Vue({
    el: '.page',
    components:{Layout,Layoutar},
    router
});
