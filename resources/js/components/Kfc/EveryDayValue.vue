<template>
  <div>
    <v-container fluid style=" width:1550px; height:40px" class="mt-0" >
      <v-card
      outlinedls
      tile>
      <p class="font-weight-bold text-center">EVERYDAY VALUE</p>
      </v-card>
    </v-container>

    <v-container fluid style=" width:1550px; height:40px" class="mt-0" >
      <v-row
      no-gutters
      >
      <v-spacer></v-spacer>
        <v-col
            cols="12"
            sm="6"
            md="2"
          >
          <v-select
          :items="selectedItems"
          v-model="selected"
          item-text="name"
          label="Search"
          outlined
        ></v-select>
        </v-col>
        
      </v-row>

      <v-row
      no-gutters>
        <v-col v-for="prod in allProducts" :key="prod.id">
          <v-card
          class="pa-2"
          outlined
          tile>
          <router-link to @click.native="redirectToDeatil(prod)">
            <img :src="prod.image">
          </router-link>
            <v-card-title>{{prod.title}}</v-card-title>
            <v-card-subtitle>{{prod.description}}</v-card-subtitle>
            <br>
            <v-btn 
            outlined
            color="red">
            PKR {{prod.price}}</v-btn>
            <v-btn 
            class="ml-n2"
            color="error"
            dark
            >ADD TO CART</v-btn>
          </v-card>
        </v-col>
      </v-row>
    </v-container>
  </div>
</template>

<script>
export default {
    data:()=>({
        selected:'',
        selectedItems:[
          'Oldest',
          'NEwest',
          'Price(Low to High)',
          'Price(High to Low)',
          'A-Z',
          'Z-A'
        ]
    }),
    methods:{
      getProducts(){
        this.$store.dispatch('EveryDayValue/getEveryDay',{
          // type:JSON.stringify({
            selected:this.selected
          // })
        })
      },
      redirectToDeatil(prod){
        this.$router.replace({
          path:'/detail-product',
          query:prod
        })
        // window.open(route.href, "_blank");
      }

    },
    computed:{
      allProducts(){
      return this.$store.getters['EveryDayValue/allEveryDay']
      
      },
    //   filteredProducts() {
    //   return this.allProducts.filter(post => {
    //     return post.title.toLowerCase().includes(this.searchh.toLowerCase())
    //   })
    // }
    },
    mounted(){
        this.getProducts()
    },
    watch:{
      selected(vv){
        console.log(vv)
        this.getProducts()
      }
    }

}
</script>

<style>

</style>