import { createRouter, createWebHistory } from "vue-router";

const routes = [
    {
        path: "/",
        component: () => import("./Pages/HomeRoute.vue"),
    },
    {
        path: "/admin",
        component: () => import("./Pages/AdminRoute.vue"),
    },
];

export default createRouter({
    history: createWebHistory(),
    routes,
});