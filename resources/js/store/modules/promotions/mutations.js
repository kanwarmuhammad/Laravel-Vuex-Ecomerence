import {
    GET_ALL_PROMOTIONS,
} from './mutation-types';

export default {
    [GET_ALL_PROMOTIONS](state, payload){
        state.all_promotions = payload
    },
}