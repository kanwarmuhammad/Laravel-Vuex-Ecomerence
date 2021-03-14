<template>
  <div>
    <v-container fluid style=" width:1550px;" class="mt-0">
      <template>
          <v-carousel :show-arrows="false"
          cycle>
          <!-- <router-link to="/kfc/everyday-value"> -->
          <v-carousel-item
          v-for="(item,i) in items"
          :key="i"
          :src="item.src"
          ></v-carousel-item>
          <!-- </router-link> -->
          </v-carousel>
      </template>
    </v-container>
    <v-container fluid style=" width:1550px; height:40px" class="mt-0" >
      <v-card
      outlined
      tile>
      <p class="font-weight-bold text-center">SHARING MEALS</p>
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
            md="1"
          >
          <v-text-field
            v-model="searchh"
            label="Search"
          ></v-text-field>
        </v-col>
      </v-row>

      <v-row
      no-gutters>
        <v-col v-for="prod in gethomeKfc" :key="prod.id">
          <v-card
          class="pa-2"
          outlined
          tile>
            <img :src="prod.image">
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
    searchh:'',
    items: [
      {
        src: 'https://cdn-images-fishry.azureedge.net/themes/6995x356-0aca24a-kfc.jpg',
        
      },
      {
        src: 'https://cdn-images-fishry.azureedge.net/themes/MTZ-995x356-fa84a98-kfc.jpg',
      },
      {
        src: 'https://cdn-images-fishry.azureedge.net/themes/Festivity-Calls-995x356-043300a-kfc.png',
      },
      {
        src: 'https://cdn-images-fishry.azureedge.net/themes/995x356-3ee2bca-kfc.jpg',
      },
      {
        src: 'https://cdn-images-fishry.azureedge.net/themes/995x356-c2c3ad1-kfc.jpg',
      },
    ],
  }),
    methods:{
      getHomeKfc(){
        // this.$store.dispatch('Homekfc/getHomoeKfc', {type: JSON.stringify(['Sharing', 'Signature Boxes'])})
        this.$store.dispatch('Homekfc/getHomoeKfc',{
          search:this.searchh
        })
      }
    },
    computed:{
      gethomeKfc(){
      return this.$store.getters['Homekfc/allHomeKfc']
      }
    },
    mounted(){
      this.getHomeKfc()
    },
    watch:{
      searchh(vv){
        console.log(vv)
        debugger
        this.getHomeKfc()
      }
    }

}
</script>

<style>

</style>