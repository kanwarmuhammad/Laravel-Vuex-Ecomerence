import {
    GET_ALL_EVERYDAY,
} from './mutation-types'
export default {
    async getEveryDay({commit}, payload){
        await axios.get('/getEveryDay',{params:payload})
        .then((response)=>{
            commit(GET_ALL_EVERYDAY, response.data)
        })
    },

}