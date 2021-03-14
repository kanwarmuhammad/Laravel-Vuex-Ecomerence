import {
    GET_ALL_MIDNIGHTDEALS,
} from './mutation-types'
export default {
    async getMidNightDeals({commit}, payload){
        await axios.get('/getMidNightDeals',{params:payload})
        .then((response)=>{
            commit(GET_ALL_MIDNIGHTDEALS, response.data)
        })
    },

}