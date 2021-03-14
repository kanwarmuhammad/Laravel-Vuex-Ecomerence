import {
    GET_ALL_PROMOTIONS,
} from './mutation-types'
export default {
    async getPromotions({commit}, payload){
        await axios.get('/getPromotions',{params:payload})
        .then((response)=>{
            commit(GET_ALL_PROMOTIONS, response.data)
        })
    },

}