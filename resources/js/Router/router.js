import Vue from 'vue';
import VueRouter from 'vue-router'

Vue.use(VueRouter)



import Parallex from '../components/Parallex';
import Login from '../components/Auth/Login';
import Signup from '../components/Auth/Signup';
import Logout from '../components/Auth/Logout';
import PhoneBook from '../components/PhoneBook';

const routes = [
  {path : '/' ,component :Parallex, name:"home"},
  {path : '/contact' ,component :PhoneBook, name:"ontact"},
  {path : '/login' ,component :Login ,name:"login"},
  {path : '/signup' ,component :Signup ,name:"signup"},
  {path : '/logout' ,component :Logout ,name:"logout"},
  
]


const router = new VueRouter({
  routes ,
  hashbang :false,
  mode : 'history',
  cache: false
});




export default router