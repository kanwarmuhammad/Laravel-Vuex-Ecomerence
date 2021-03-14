<template>
  <div>
      <v-container fluid style=" width:1550px; height:40px" class="mt-0" >
      <v-card
      outlined
      tile>
      <p class="font-weight-bold text-center">SNAKS</p>
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
        <v-col v-for="prod in allSnacks" :key="prod.id">
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
      getSnacks(){
        this.$store.dispatch('Snacks/getSnacks',{
          selected:this.selected
        })
      }
    },
    computed:{
      allSnacks(){
      return this.$store.getters['Snacks/allSnacks']
      }
    },
    mounted(){
        this.getSnacks()
    },
    watch:{
      selected(vv){
        console.log(vv)
        debugger
        this.getSnacks()
      }
    }
}
</script>

<style>

</style>