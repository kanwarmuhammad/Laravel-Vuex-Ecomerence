<template>
  <div>
    <v-container fluid  style=" height:1650; width:1550px;">
        <v-row>
          <v-col>
            <router-link to="/kfc">
            <img src="https://mmo.aiircdn.com/60/5ec3e81e72168.png" style="height:90px; width:90px" > 
            </router-link>
          </v-col>

          <v-col>
            <ul >
              <li class="pt-16">
                <a>STORE lOCATION</a>
                <a class="pl-4">SIGN IN/REGISTER</a>
              </li>
            </ul>
          </v-col>
        </v-row>
    </v-container>

    <v-container fluid style=" width:1550px;" >
      <v-card
        style="width:1550px;"
        flat
        tile
      >
        <v-toolbar dense 
        color="grey"
        >
          <router-link to="/everyday-value">
          <v-toolbar-title class="pl-n2">EVERYDAY VALUE</v-toolbar-title>
          </router-link>
          <router-link to="/make-it-meal">
          <v-toolbar-title class="pl-4">MAKE IT A MEAL</v-toolbar-title>
          </router-link>
          <router-link to="/signature-boxes">
          <v-toolbar-title class="pl-4">SIGNATURE BOXES</v-toolbar-title>
          </router-link>
          <router-link to="/sharing">
          <v-toolbar-title class="pl-4">SHARING</v-toolbar-title>
          </router-link>
          <router-link to="/promotions">
          <v-toolbar-title class="pl-4">PROMOTIONS</v-toolbar-title>
          </router-link>
          <router-link to="/snacks">
          <v-toolbar-title class="pl-4">SNAKS</v-toolbar-title>
          </router-link>
          <router-link to="/mid-night-deals">
          <v-toolbar-title class="pl-4">MIDNIGHT DEALS</v-toolbar-title>
          </router-link>
          
          <v-divider  class="pl-4" vertical></v-divider>
        </v-toolbar>
      </v-card>
    </v-container>
    <router-view></router-view>  
  </div>
</template>