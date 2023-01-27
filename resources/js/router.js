import {createRouter, createWebHistory} from "vue-router";

const router = createRouter({
    history:createWebHistory,
    routes:[
        {
            path:'/',
            namme:'home',
            component: Home
        },
    ]
});

export {router};
