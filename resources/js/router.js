import {createRouter, createWebHistory} from "vue-router";

import Home from './pages/Home.vue'
import About from './pages/About.vue'
import ProjectsPage from './pages/ProjectsPage.vue'
import Contacts from './pages/Contacts.vue'
import Detail from './pages/Detail.vue'
import Error404 from './pages/Error404.vue'

const router = createRouter({
    history:createWebHistory(),
    linkExactActiveClass:'active',
    routes:[
        {
            path:'/',
            name:'home',
            component: Home
        },
        {
            path:'/chi-siamo',
            name:'about',
            component: About
        },
        {
            path:'/progetti',
            name:'projectspage',
            component: ProjectsPage
        },
        {
            path:'/progetti/dettaglio/:slug',
            name:'detail',
            component: Detail
        },
        {
            path:'/contatti',
            name:'contacts',
            component: Contacts
        },
        {
            path:'/pathMatch(.*)*',
            component: Error404
        },
    ]
});

export {router};
