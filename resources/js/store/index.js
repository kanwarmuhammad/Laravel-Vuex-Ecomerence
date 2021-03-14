import Vue from 'vue'
import Vuex from 'vuex'
import Categories from './modules/categoeries/index'
import Products from './modules/products/index'
import Meals from './modules/meals/index'
import EveryDayValue from './modules/everyDayValue/index'
import Signbox from './modules/signbox/index'
import Sharing from './modules/sharing/index'
import Promotions from './modules/promotions/index'
import Snacks from './modules/snacks/index'
import Midnight from './modules/midnight/index'
import Homekfc from './modules/homekfc/index'
Vue.use(Vuex)

export default new Vuex.Store({
    modules: {
        Categories,
        Products,
        Meals,
        EveryDayValue,
        Signbox,
        Sharing,
        Promotions,
        Snacks,
        Midnight,
        Homekfc
    }
})