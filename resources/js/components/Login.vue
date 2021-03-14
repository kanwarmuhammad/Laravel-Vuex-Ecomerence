<template>
   <div>
         <v-container fluid fill-height>
            <v-layout align-center justify-center>
               <v-flex xs12 sm8 md4>
                  <v-card class="elevation-12">
                     <v-toolbar dark color="primary">
                        <v-toolbar-title>Login Form</v-toolbar-title>
                     </v-toolbar>
                     <v-card-text>
                        <v-form>
                           <v-text-field
                            v-model="email"
                              label="Email"
                           ></v-text-field>
                           <v-text-field
                            v-model="password"
                              label="Password"
                           ></v-text-field>
                        </v-form>
                     </v-card-text>
                     <v-card-actions>
                        <v-spacer></v-spacer>
                        <v-btn color="primary" @click="openRegisterDialod">Register</v-btn>
                        <v-btn color="primary" to="/home">Login</v-btn>
                     </v-card-actions>
                    <template>
                    <v-row justify="center">
                        <v-dialog
                        v-model="dialog"
                        persistent
                        max-width="600px"
                        >
                        <v-card>
                            <v-card-title>
                            <span class="headline">User Profile</span>
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
                                    v-model="registerName"
                                    label="Enter you full Name"
                                    required
                                    ></v-text-field>
                                </v-col>
                                <v-col cols="12">
                                    <v-text-field
                                    v-model="registerEmail"
                                    label="Email*"
                                    required
                                    ></v-text-field>
                                </v-col>
                                <v-col cols="12">
                                    <v-text-field
                                    v-model="registerPassword"
                                    label="Password*"
                                    required
                                    ></v-text-field>
                                </v-col>
                                </v-row>
                            </v-container>
                            <small>*indicates required field</small>
                            </v-card-text>
                            <v-card-actions>
                            <v-spacer></v-spacer>
                            <v-btn
                                color="blue darken-1"
                                text
                                @click="dialog = false"
                            >
                                Close
                            </v-btn>
                            <v-btn
                                color="blue darken-1"
                                text
                                @click="storingUser"
                                to="/"
                            >
                                Save
                            </v-btn>
                            </v-card-actions>
                        </v-card>
                        </v-dialog>
                    </v-row>
                    </template>
                  </v-card>
               </v-flex>
            </v-layout>
         </v-container>
   </div>
</template>

<script>
import axios from 'axios'
export default {
    data:()=>({
        email:'',
        password:'',
        dialog: false,
        registerName:'',
        registerEmail:'',
        registerPassword:'',

    }),
    methods:{
        openRegisterDialod(){
            this.dialog=true
        },
        storingUser(){
            axios.post('/register-user',{
                name:this.registerName,
                email:this.registerEmail,
                password:this.registerPassword
            })
            this.dialog=false
        }
    }
};
</script>

<style></style>

