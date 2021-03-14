import {
    GET_ALL_HOMEKFC,
} from './mutation-types';

export default {
    [GET_ALL_HOMEKFC](state, payload){
        state.all_homekfc = payload
    },
}