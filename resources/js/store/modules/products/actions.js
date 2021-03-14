import {
    GET_ALL_PRODUCTS,
    POST_ALL_PRODUCTS,
    UPDATE_ALL_PRODUCTS,
    DELETE_ALL_PRODUCTS,

    GET_ALL_MEALS,
} from './mutation-types'
export default {
    async getProducts({commit}, payload){
        await axios.get('/getProducts')
        .then((response)=>{
            commit(GET_ALL_PRODUCTS, response.data)
        })
    },
    async postProducts({commit},payload){
        await axios.post('/storeProducts',payload)
        .then((res)=>{
            commit(POST_ALL_PRODUCTS, res.data)
        })
    },
    async updateProducts({commit},payload){
        await axios.patch('/updateProducts/'+payload.id, payload)
        .then((res)=>{
            commit(UPDATE_ALL_PRODUCTS, res.data)
        })
    },
    async deleteProducts({commit},payload){
        await axios.delete('/deleteProducts/'+payload.id,)
        .then((res)=>{
            commit(DELETE_ALL_PRODUCTS, res.data)
        })
    },

}