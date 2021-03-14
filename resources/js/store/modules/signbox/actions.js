import {
    GET_ALL_BOXES,
} from './mutation-types'
export default {
    async getBoxes({commit}, payload){
        await axios.get('/getBoxes',{params:payload})
        .then((response)=>{
            commit(GET_ALL_BOXES, response.data)
        })
    },

}