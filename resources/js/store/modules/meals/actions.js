import {
    GET_ALL_MEALS,
} from './mutation-types'
export default {
    async getMeals({commit}, payload){
        await axios.get('/getMeals',{params:payload})
        .then((response)=>{
            commit(GET_ALL_MEALS, response.data)
        })
    },

}