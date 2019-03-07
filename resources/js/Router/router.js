import Vue from 'vue';
import VueRouter from 'vue-router'

Vue.use(VueRouter)



import Parallex from '../components/Parallex';
import Login from '../components/Auth/Login';
import Signup from '../components/Auth/Signup';

const routes = [
  {path : '/' ,component :Parallex, name:"home"},
  {path : '/login' ,component :Login ,name:"login"},
  {path : '/signup' ,component :Signup ,name:"signup"},
  
]


const router = new VueRouter({
  routes ,
  hashbang :false,
  mode : 'history',
  cache: false
});




export default router