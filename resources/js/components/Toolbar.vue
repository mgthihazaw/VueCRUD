<template>
	
		 <v-toolbar color="#12267B" class="white--text">
		    
		    <v-toolbar-title class="hidden-sm-and-down">PhoneBook</v-toolbar-title>
		    <v-spacer></v-spacer>
		    
		      <router-link 
			     v-for="item in items"
			     :key="item.title"
			     :to="item.to"
			     
			    >
			    	<v-btn flat color="white">
			      {{item.title}}
			    </v-btn>
              </router-link>
		    
		  </v-toolbar>
	

</template>

<script>
	export default{
		data(){
      return {
        
        items: [
           
           {'title' : 'Home', to:'/'},
           {'title' : 'Signup', to:'/signup'},
           {'title' : 'Login', to:'/login'},
           {'title' : 'Logout', to:'/logout'},
        ],
      }
    },
	}

</script>