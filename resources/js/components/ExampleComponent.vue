<template>
  <!-- <v-app> -->
    <div>
        <Navbar/>
        <template>
            <v-data-table
                :headers="headers"
                :items="namesArray"
                sort-by="id"
                class="elevation-1"
            >
                <template v-slot:top>
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
                            New Item
                            </v-btn>
                        </template>
                        <v-card>
                            <v-card-text>
                            <v-container>
                                <v-row>
                                <v-col
                                    cols="12"
                                    sm="6"
                                    md="4"
                                >
                                    <v-text-field
                                    v-model="name"
                                    label="Enter somthing"
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
                                @click="saveDialod"
                            >
                                Save
                            </v-btn>
                            </v-card-actions>
                        </v-card>
                    </v-dialog>
                    <v-dialog v-model="dialogDelete" max-width="500px">
                        <v-card>
                            <v-card-title class="headline">Are you sure you want to delete this item?</v-card-title>
                            <v-card-actions>
                            <v-spacer></v-spacer>
                            <v-btn color="blue darken-1" text @click="closeDeleteDialog">Cancel</v-btn>
                            <v-btn color="blue darken-1" text @click="deleteItemConfirmDialog">OK</v-btn>
                            <v-spacer></v-spacer>
                            </v-card-actions>
                        </v-card>
                    </v-dialog>
                </template>
                <template v-slot:item.actions="{ item }">
                    <v-icon
                        small
                        class="mr-2"
                        @click="editItem(item)"
                    >
                        pencil
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
  <!-- </v-app> -->
    </div>
</template>

<script>
import axios from 'axios';
export default {
  data: () => ({
      name:'',
        dialog: false,
        dialogDelete:false,
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
      namesArray: [],
      editedItem:{},
      deleteditem:{}
  }),
  methods:{
      postData(){
          axios.post('/storeName',{
              name:this.name
          })
      },
      getData(){
          axios.get('/getName')
          .then((res)=>{
              this.namesArray=res.data
          })
      },
      editItem(item){
          this.editedItem = Object.assign({}, item)
          this.dialog = true
          debugger
        //   axios.put('/updateName/'+ item.id ,{
        //       name:this.name
        //   })
          console.log(item)
      },
      closeDialog(){
          this.dialog=false
      },
      saveDialod(){
          debugger
          axios.patch('/updateName/'+ this.editedItem.id ,{
                name:this.name
          })
          this.dialog=false
      },
      deleteItem(item){ 
          debugger
          this.deleteditem = Object.assign({}, item)
          this.dialogDelete=true
      },
      closeDeleteDialog(){
          this.dialogDelete=false
      },
      deleteItemConfirmDialog(){
          debugger
          axios.delete('/deleteName/'+ this.deleteditem.id)
          this.dialogDelete=false
      }
    },
    mounted(){
        this.getData()
    }
};
</script>
