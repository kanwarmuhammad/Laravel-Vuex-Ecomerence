<template>
  <div>
      <Navbar/>
        <v-container class="grey lighten-5" fluid>
            <v-row no-gutters>
            <v-col
                cols="12"
                sm="6"
                md="1"
            >
                <v-card
                outlined
                tile
                elevation="9"
                width="111"
                >
                    <v-navigation-drawer
                        floating
                        permanent
                    >
                        <v-list
                        dense
                        rounded
                        >
                        <v-list-item>
                            <v-list-item-content>
                                <router-link to="/categoery">
                            <v-list-item-title>Categoery</v-list-item-title>
                                </router-link>
                            <v-spacer></v-spacer>
                            <v-spacer></v-spacer>
                              <router-link to="/products">
                            <v-list-item-title>Products</v-list-item-title>
                                </router-link>
                            <v-spacer></v-spacer>
                            <v-spacer></v-spacer>
                                 <router-link to="/orders">
                            <v-list-item-title>Orders</v-list-item-title>
                                </router-link>
                            </v-list-item-content>
                        </v-list-item>
                        </v-list>
                    </v-navigation-drawer>
                </v-card>
            </v-col>

            <v-col
                cols="6"
                md="11"
            >
                <v-card
                class="pa-2"
                outlined
                tile
                >
                 <v-card-title>Categoeries</v-card-title>
                <template>
                    <v-data-table
                        :headers="headers"
                        :items="namesArray"
                        sort-by="ID"
                        class="elevation-1"
                    >
                        <template v-slot:top>
                        <v-toolbar
                            flat
                        >
                            <v-spacer></v-spacer>
                            <v-dialog
                            v-model="dialog"
                            max-width="500px"
                            >
                            <template v-slot:activator="{ on, attrs }">
                                <v-btn
                                color="primary"
                                dark
                                class="mb-2"
                                v-bind="attrs"
                                v-on="on"
                                >
                                Enter New Categoery
                                </v-btn>
                            </template>
                            <v-card>
                                <v-card-title>
                                <span class="headline">{{ formTitle }}</span>
                                </v-card-title>

                                <v-card-text>
                                <v-container>
                                    <v-row>
                                    <v-col
                                        cols="12"
                                        sm="6"
                                        md="4"
                                    >
                                        <v-text-field
                                        v-model="editedItem.name"
                                        label="Enter the Categoery"
                                        ></v-text-field>
                                    </v-col>
                                    </v-row>
                                </v-container>
                                </v-card-text>

                                <v-card-actions>
                                <v-spacer></v-spacer>
                                <v-btn
                                    color="blue darken-1"
                                    text
                                    @click="closeDialog"
                                >
                                    Cancel
                                </v-btn>
                                <v-btn
                                    color="blue darken-1"
                                    text
                                    @click="saveDialog"
                                >
                                    Save
                                </v-btn>
                                </v-card-actions>
                            </v-card>
                            </v-dialog>
                            <v-dialog v-model="dialogDelete" max-width="500px">
                            <v-card>
                                <v-card-title class="headline">Are you sure you want to delete this Categoery?</v-card-title>
                                <v-card-actions>
                                <v-spacer></v-spacer>
                                <v-btn color="blue darken-1" text @click="dialogDelete=false">Cancel</v-btn>
                                <v-btn color="blue darken-1" text @click="deleteItemConfirmDialog">OK</v-btn>
                                <v-spacer></v-spacer>
                                </v-card-actions>
                            </v-card>
                            </v-dialog>
                        </v-toolbar>
                        </template>
                        <template v-slot:item.actions="{ item }">
                            <v-icon
                                small
                                class="mr-2"
                                @click="editItem(item)"
                            >
                                edit
                            </v-icon>
                            <v-icon
                                small
                                @click="deleteItem(item)"
                            >
                               delete
                            </v-icon>
                        </template>
                    </v-data-table>
                </template>
                </v-card>
            </v-col>
            </v-row>
        </v-container>
  </div>
</template>

<script>
import Navbar from './Navbar'
export default {
    components:{
        Navbar,
    },
    data:()=>({
         drawer: true,
       items: [
          { title: 'Categoery', icon: 'mdi-view-dashboard' },
          { title: 'Products', icon: 'mdi-forum' },
        ],
        dialog:false,
        dialogDelete:false,
        name:'',
        editedIndex: -1,
        editedItem:{
            name:''
        },
        deleteditem:{},
        headers: [
        {
          text: 'ID',
          align: 'start',
          sortable: false,
          value: 'id',
        },
        { text: 'Name', value: 'name' },
         { text: 'Actions', value: 'actions', sortable: false },
      ],
    }),
    methods:{
      closeDialog(){
          this.dialog=false
      },
      saveDialog(){
          if (this.editedIndex === -1) {
            this.$store.dispatch('Categories/posttCategories',{
            name:this.editedItem.name
            })
          } else {
            this.$store.dispatch('Categories/updateCategories',{
            id:this.editedItem.id,
            name:this.editedItem.name
            })  
          }
          this.dialog=false
      },
      editItem(item){
        this.editedIndex = this.namesArray.indexOf(item)
        this.editedItem = Object.assign({}, item)
          this.dialog=true
      },

      deleteItem(item){
          this.editedIndex = this.namesArray.indexOf(item)
          this.deleteditem = Object.assign({}, item)
          this.dialogDelete=true
      },
      deleteItemConfirmDialog(){
        this.$store.dispatch('Categories/deleteCategories',{
            id:this.deleteditem.id
        })
          this.dialogDelete=false
      },
      getData(){
          this.$store.dispatch('Categories/getCategories')
      }
    },
    computed: {
      formTitle () {
        return this.editedIndex === -1 ? 'New Item' : 'Edit Item'
      },
      namesArray(){
          return this.$store.getters['Categories/allCategories']
      }
    },
    mounted(){
        this.getData()
    }
}
</script>

<style>

</style>