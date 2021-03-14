import {
    GET_ALL_SHARING,
} from './mutation-types';

export default {
    [GET_ALL_SHARING](state, payload){
        state.all_sharing = payload
    },
}