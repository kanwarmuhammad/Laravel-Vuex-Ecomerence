import {
    GET_ALL_SNACKS,
} from './mutation-types';

export default {
    [GET_ALL_SNACKS](state, payload){
        state.all_snacks = payload
    },
}