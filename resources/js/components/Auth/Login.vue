<template>
	<div>
	<v-parallax
    dark
    src="https://cdn.vuetifyjs.com/images/backgrounds/vbanner.jpg"
    height="780"
  >
    
  
    <v-content class="animated zoomInDown">
      <v-container fluid fill-height>
        <v-layout pt-5 justify-center>
          <v-flex xs12 sm8 md4>
            <v-card class="elevation-12">
              <v-toolbar dark color="primary">
                <v-toolbar-title>Login form</v-toolbar-title>
                <v-spacer></v-spacer>
                
              </v-toolbar>
              <v-card-text>
                <v-form>
                  <v-text-field
                    prepend-icon="email"
                    label="Email"
                    type="email"
                    v-model="form.email"
                    ></v-text-field>
                  <v-text-field
                    prepend-icon="lock"
                    label="Password"
                    type="password"
                    v-model="form.password"></v-text-field>
                </v-form>
              </v-card-text>
              <v-card-actions>
                
                <v-btn color="primary" block>Login</v-btn>
              </v-card-actions>
            </v-card>
          </v-flex>
        </v-layout>
      </v-container>
    </v-content>
  
  </v-parallax>
</div>
</template>
<script type="text/javascript">
	export default{
    data(){
      return {
        form :{
          email:null,
          password:null,
        }
      }
    }
  }
</script>

<style>
	
</style>