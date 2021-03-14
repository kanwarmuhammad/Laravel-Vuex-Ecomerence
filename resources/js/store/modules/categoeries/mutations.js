import {
    GET_ALL_CATEGORIES,
    POST_ALL_CATEGORIES,
    UPDATE_ALL_CATEGORIES,
    DELETE_ALL_CATEGORIES
} from './mutation-types';

export default {
    [GET_ALL_CATEGORIES](state, payload){
        state.all_categories = payload
    },
    [POST_ALL_CATEGORIES](state, payload){
        state.all_categories = payload
    },
    [UPDATE_ALL_CATEGORIES](state, payload){
        state.all_categories = payload
    },
    [DELETE_ALL_CATEGORIES](state, payload){
        state.all_categories = payload
    }
}