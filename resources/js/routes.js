import vue from 'vue';
import Router from 'vue-router';
vue.use(Router)

import Login from './components/Login.vue'
import Example from './components/ExampleComponent.vue'
import Home from './components/Home.vue'
import Categoery from './components/Categoery.vue'
import Products from './components/Products.vue'
import Orders from './components/Orders.vue'
import NavbarKfc from './components/Kfc/NavbarKfc.vue'
import KfcHome from './components/Kfc/HomeKfc.vue'
import EveryDayValue from './components/Kfc/EveryDayValue.vue'
import MakeItMeal from './components/Kfc/MakeItMeal.vue'
import SignatureBoxes from './components/Kfc/SignatureBoxes.vue'
import Sharing from './components/Kfc/Sharing.vue'
import Promotions from './components/Kfc/Promotions.vue'
import Snacks from './components/Kfc/Snacks.vue'
import MidNightDeals from './components/Kfc/MidNightDeals.vue'
import DetailProduct from './components/Kfc/DetailProduct.vue'

var router=  new Router({
    mode: 'history',
    routes:[
        {
            path:'/',
            component: Login,
            name: Login
        },
        {
            path:'/home',
            component: Home,
            name: Home
        },
        {
            path:'/categoery',
            component: Categoery,
            name: Categoery
        },
        {
            path:'/products',
            component: Products,
            name: Products
        },
        {
            path:'/orders',
            component: Orders,
            name: Orders
        },
        {
            path:'/example',
            component: Example,
            name: Example
        },
        {
            path:'/',
            component: NavbarKfc,
            name: NavbarKfc,

            children:[
                {
                    path:'kfc',
                    component:KfcHome,
                    name: KfcHome
                },
                {
                    path:'everyday-value',
                    component:EveryDayValue,
                    name: EveryDayValue
                },
                {
                    path:'make-it-meal',
                    component:MakeItMeal,
                    name: MakeItMeal
                },
                {
                    path:'signature-boxes',
                    component:SignatureBoxes,
                    name: SignatureBoxes
                },
                {
                    path:'sharing',
                    component:Sharing,
                    name: Sharing
                },
                {
                    path:'promotions',
                    component:Promotions,
                    name: Promotions
                },
                {
                    path:'snacks',
                    component:Snacks,
                    name: Snacks
                },
                {
                    path:'mid-night-deals',
                    component:MidNightDeals,
                    name: MidNightDeals
                },
                {
                    path:'detail-product',
                    component:DetailProduct,
                    name: DetailProduct
                },
            ]
        },
       
    ]    

})
export default router;