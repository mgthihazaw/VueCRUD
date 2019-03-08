<template>
	
		 <v-toolbar color="#12267B" class="white--text">
		    
		    <v-toolbar-title class="hidden-sm-and-down">PhoneBook</v-toolbar-title>
		    <v-spacer></v-spacer>
		    
		      <router-link 
			     v-for="item in items"
			     :key="item.title"
			     :to="item.to"
			     v-if="item.show"
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
           
           {'title' : 'Home', to:'/',show:true},
           {'title' : 'Signup', to:'/signup',show:!this.loggedIn()},
           {'title' : 'Login', to:'/login',show:!this.loggedIn()},
           {'title' : 'PhoneContact', to:'/contact',show:this.loggedIn()},
           {'title' : 'Logout', to:'/logout',show:this.loggedIn()},

        ],
      }
    },
    methods:{
    	loggedIn(){
		return token ? true : false;
	   },
	   logout(){
		localStorage.removeItem('token');
		localStorage.removeItem('username');
		window.location='/';
	}
    },
    created(){
      EventBus.$on('logout',()=>{
        this.logout()
      })
    }
	}

</script>