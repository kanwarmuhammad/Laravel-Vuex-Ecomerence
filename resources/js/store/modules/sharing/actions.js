import {
    GET_ALL_SHARING,
} from './mutation-types'
export default {
    async getSharing({commit}, payload){
        await axios.get('/getSharing',{params:payload})
        .then((response)=>{
            commit(GET_ALL_SHARING, response.data)
        })
    },

}