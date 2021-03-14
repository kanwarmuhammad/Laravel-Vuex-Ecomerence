import {
    GET_ALL_MIDNIGHTDEALS,
} from './mutation-types';

export default {
    [GET_ALL_MIDNIGHTDEALS](state, payload){
        state.all_midNightDeals = payload
    },
}