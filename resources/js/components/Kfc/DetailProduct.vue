<template>
  <div>
      <v-container fluid style=" width:1350px; ">
          <v-row no gutters>
              <v-col md="5" class=" pl-10 " ><img :src="queryData.image"></v-col>
              <v-col md="5">
                  <h4>HOME / VALUE BUCKET</h4>
                  <!-- <br> -->
                  <h1>{{queryData.title}}</h1>
                  <p>{{queryData.description}}</p>

                  <template>
                    <v-container  fluid>
                      <v-select
                        v-model="value"
                        :items="addOns"
                        label="Add Ons"
                        item-text="title"
                        item-value="price"
                        multiple
                        outlined
                      >
                        <template v-slot:selection="{ item, index }">
                          <v-chip v-if="index === 0">
                            <span>{{ item.title }}</span>
                          </v-chip>
                          <span
                            v-if="index === 1"
                            class="grey--text caption"
                          >
                            (+{{ value.length - 1 }} others)
                          </span>
                        </template>
                      </v-select>
                    </v-container>
                  </template>

                  <template>
                    <v-container mt-n12 fluid>
                      <v-select
                        v-model="value2"
                        :items="drinks"
                        item-text="title"
                        item-value="price"
                        label="Add Drinks"
                        multiple
                        outlined
                      >
                        <template v-slot:selection="{ item, index }">
                          <v-chip v-if="index === 0">
                            <span>{{ item.title }}</span>
                          </v-chip>
                          <span
                            v-if="index === 1"
                            class="grey--text caption"
                          >
                            (+{{ value2.length - 1 }} others)
                          </span>
                        </template>
                      </v-select>
                    </v-container>
                  </template>
                  <h2>PKR {{price}}</h2>
                  <v-btn 
                  outlined
                  color="red" @click="subOrederQuantity">-</v-btn>
                  <v-btn outlined
                  color="red">{{orderQuantity}}</v-btn>
                  <v-btn
                  outlined
                  color="red" @click="addOrderQuantity">+</v-btn>  
                  <v-btn 
                  ml-6
                  color="error" @click.stop="drawer = !drawer">ADD TO BUCKET</v-btn>

                  <br>
                  <p>*Prices may vary at motorway outlets</p>

                  <template>
                    <v-sheet
                      height="400"
                      class="overflow-hidden"
                    >
                      <v-navigation-drawer
                        v-model="drawer"
                        width="380px"
                        absolute
                        temporary
                        right
                      >

                      <v-card>
                        <v-toolbar
                        color="black"
                        dark>
                        <v-toolbar-title style="color:white; font-weight: bold" class="pr-14">YOUR BUCKET</v-toolbar-title>
                        <v-spacer></v-spacer>
                          <v-icon 
                            x-large
                            color="red">
                            mdi-bucket
                          </v-icon>
                          <v-spacer></v-spacer>
                          <v-list-item-title style="color:red; font-weight: bold" class="pl-8">PKR {{price}}</v-list-item-title>
                        </v-toolbar>

                        <!-- <v-container fluid> -->
                          <v-row dense>
                            <h4 style="color:black; font-weight: bold" class="justify-center ml-14 mt-2">SELECT YOUR DELIVERY AREA</h4>
                            <br>
                            <v-select
                              v-model="selectedCity"
                              :items="city"
                              item-text="nmae"
                              label="City"
                            ></v-select>
                            <v-text-field
                              v-model="selectedArea"
                              counter="25"
                              label="Search Area"
                            ></v-text-field>
                            <br>
                            <v-btn 
                            style="height:50px; width:300px; font-weight: bold" 
                            color="error"
                            class="ml-10">NEXT</v-btn>
                          </v-row>
                        <!-- </v-container> -->
                      </v-card>
                      </v-navigation-drawer>
                    </v-sheet>
                  </template>
              </v-col>
              <!-- AIzaSyADgvi908i5Y5l7ed2hIE7Yh1vMob5CNZs -->
          </v-row>
      </v-container>
  </div>
</template>

<script>
export default {
    data:()=>({
        drawer: null,
        items: [
          { title: 'Home', icon: 'mdi-view-dashboard' },
          { title: 'About', icon: 'mdi-forum' },
        ],
        city:['Islamabad','Rawalpindi','Lahore','Karachi'],
        selectedCity:'',
        
        selectedArea:'',





      queryData:{},
       addOns: [
         {title:'1 Pc Chicken',price:'200'},
         {title:'Coleslaw',price:'50'},
         {title:'Corn On The Cob',price:'150'},
         {title:'Hot Wings (10 Pcs)',price:'440'},
         {title:'Cheese Slice',price:'40'},
         {title:'French Fries Bucket (Mayo)',price:'290'}
         ],
       drinks:[
         {title:'Pepsi',price:'100'},
         {title:'7up',price:'80'}, 
         {title:'Dew',price:'90'}, 
         {title:'Coke',price:'110'}, 
         {title:'Fanta',price:'95'},
         ],
       value:[],
       value2:[],
       orderQuantity:'1',
       prodPrice:'',
       addOnss:0,
       drinkss:0,
       totalPrice:0
    }),
    methods: {
      getDataFromQuery(){
        this.queryData = this.$route.query
        this.prodPrice= parseInt(this.queryData.price)
      },
      calAddOns(){
        debugger
        if (this.value.length !== 0) {
          let num = 0;
          this.value.forEach(obj => {
          num += parseInt(obj)
          this.addOnss = num;
        });
        }
        else{
          debugger
          this.addOnss=0;
        }
      },
      calDrinks(){
        debugger
        if (this.value2.length !== 0) {
          let num = 0;
          this.value2.forEach(obj => {
          num += parseInt(obj)
          this.drinkss = num;
        });
        }
        else{
          debugger
          this.drinkss = 0;
        }
      },
      addOrderQuantity(){
        debugger
        this.orderQuantity ++
        // this.price= this.addOnss+(this.queryData.price *this.orderQuantity)
        this.totalPrice = (this.prodPrice *this.orderQuantity)
      },
      subOrederQuantity(){
        debugger
        if (this.orderQuantity>1) {
        this.orderQuantity --
          this.totalPrice = this.prodPrice - this.queryData.price
        }
      }
    },
    computed:{
      selectedArea(){
        debugger
        const URL = `https://maps.googleapis.com/maps/api/place/findplacefromtext/output?parameters`
        axios.get(URL)
      },
      price(){
        let total =0;
        if (this.totalPrice !== 0) {
          debugger
          total = this.totalPrice + this.addOnss + this.drinkss;
        return total
        }
        else{
          debugger
          total = this.prodPrice + this.addOnss + this.drinkss;
          return total
        }
      }
    },
    // mounted(){
    //   this.getDataFromQuery()
    // },
    created(){
      this.getDataFromQuery()
    },
    watch:{
      value(){
        this.calAddOns()
      },
      value2(){
        this.calDrinks()
      }
    }
}
</script>

<style>

</style>