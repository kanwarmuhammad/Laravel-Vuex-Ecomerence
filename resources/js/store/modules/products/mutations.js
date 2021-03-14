import {
    GET_ALL_PRODUCTS,
    POST_ALL_PRODUCTS,
    UPDATE_ALL_PRODUCTS,
    DELETE_ALL_PRODUCTS,

} from './mutation-types';

export default {
    [GET_ALL_PRODUCTS](state, payload){
        state.all_products = payload
    },
    [POST_ALL_PRODUCTS](state, payload){
        state.all_products = payload
    },
    [UPDATE_ALL_PRODUCTS](state, payload){
        state.all_products = payload
    },
    [DELETE_ALL_PRODUCTS](state, payload){
        state.all_products = payload
    },

}