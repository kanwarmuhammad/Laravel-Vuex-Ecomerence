import {
    GET_ALL_CATEGORIES,
    POST_ALL_CATEGORIES,
    UPDATE_ALL_CATEGORIES,
    DELETE_ALL_CATEGORIES
} from './mutation-types'
export default {
    async getCategories({commit}, payload){
        await axios.get('/getCategoery')
        .then((response)=>{
            commit(GET_ALL_CATEGORIES, response.data)
        })
    },
    async posttCategories({commit},payload){
        await axios.post('/postCategoery',payload)
        .then((res)=>{
            commit(POST_ALL_CATEGORIES, res.data)
        })
    },
    async updateCategories({commit},payload){
        await axios.patch('/updateCategoery/'+payload.id, payload)
        .then((res)=>{
            commit(UPDATE_ALL_CATEGORIES, res.data)
        })
    },
    async deleteCategories({commit},payload){
        await axios.delete('/deleteCategoery/'+payload.id,)
        .then((res)=>{
            commit(DELETE_ALL_CATEGORIES, res.data)
        })
    },

}