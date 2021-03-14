import {
    GET_ALL_BOXES,
} from './mutation-types';

export default {
    [GET_ALL_BOXES](state, payload){
        state.all_boxes = payload
    },
}