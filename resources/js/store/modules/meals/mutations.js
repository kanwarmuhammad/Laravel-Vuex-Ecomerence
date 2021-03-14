import {
    GET_ALL_MEALS,
} from './mutation-types';

export default {
    [GET_ALL_MEALS](state, payload){
        state.all_meals = payload
    },
}