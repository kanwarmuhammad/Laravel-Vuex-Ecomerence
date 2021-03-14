import {
    GET_ALL_EVERYDAY,
} from './mutation-types';

export default {
    [GET_ALL_EVERYDAY](state, payload){
        state.all_everyday = payload
    },
}