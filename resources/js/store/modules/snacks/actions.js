import {
    GET_ALL_SNACKS,
} from './mutation-types'
export default {
    async getSnacks({commit}, payload){
        await axios.get('/getSnacks',{params:payload})
        .then((response)=>{
            commit(GET_ALL_SNACKS, response.data)
        })
    },

}