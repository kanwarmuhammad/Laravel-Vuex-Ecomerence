import {
    GET_ALL_HOMEKFC,
} from './mutation-types'
export default {
    async getHomoeKfc({commit}, payload){
        // await axios.get('/getHomoeKfc', {params: payload})
        await axios.get('/getHomoeKfc',{params:payload})
        .then((response)=>{
            commit(GET_ALL_HOMEKFC, response.data)
        })
    },

}