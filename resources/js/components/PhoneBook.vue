<template>
	<div>
	<v-parallax
    dark
    src="https://cdn.vuetifyjs.com/images/backgrounds/vbanner.jpg"
    height="780"
  >
  <v-layout
      
      column
      
      
    >
  
  <div class="container ">
    <v-dialog v-model="dialog" max-width="500px">
      <v-btn color="primary" dark slot="activator" class="mb-2">New Item</v-btn>
      <v-card>
        <v-card-title>
          <span class="headline">{{ formTitle }}</span>
        </v-card-title>
        <v-card-text>
          <v-container grid-list-md>
            <v-layout wrap>
              <v-flex xs12 sm6 md4>
                <v-text-field label="Name" v-model="editedItem.name"></v-text-field>
              </v-flex>
              <v-flex xs12 sm6 md4>
                <v-text-field label="Mobile" v-model="editedItem.mobile"></v-text-field>
              </v-flex>
              
            </v-layout>
          </v-container>
        </v-card-text>
        <v-card-actions>
          
          <v-btn color="blue darken-1" flat block @click.native="close">Cancel</v-btn>
          <v-spacer></v-spacer>
          <v-btn color="blue darken-1" flat block @click.native="save">Save</v-btn>
        </v-card-actions>
      </v-card>
    </v-dialog>
    <v-data-table
      :headers="headers"
      :items="items"
      hide-actions
      class="container "
    >
      <template slot="items" slot-scope="props">
        
        <td class="text-xs-right">{{ props.item.name }}</td>
        <td class="text-xs-right">{{ props.item.mobile }}</td>
        
        <td class="justify-center layout px-0">
          <v-btn icon class="mx-0" @click="editItem(props.item)">
            <v-icon color="teal">edit</v-icon>
          </v-btn>
          <v-btn icon class="mx-0" @click="deleteItem(props.item)">
            <v-icon color="pink">delete</v-icon>
          </v-btn>
        </td>
      </template>
      <template slot="no-data">
        <v-btn color="primary" @click="initialize">Reset</v-btn>
      </template>
    </v-data-table>
  </div>
   </v-layout>
  </v-parallax>
</div>
</template>
<script>
  export default {
    data: () => ({
      dialog: false,
      headers: [
        
        { text: 'Name', value: 'name' },
        { text: 'Mobile', value: 'mobile' },
       
        { text: 'Actions', value: 'name', sortable: false }
      ],
      items: [],
      editedIndex: -1,
      editedItem: {
        name: '',
        calories: 0,
        fat: 0,
        carbs: 0,
        protein: 0
      },
      defaultItem: {
        name: '',
        calories: 0,
        fat: 0,
        carbs: 0,
        protein: 0
      }
    }),

    computed: {
      formTitle () {
        return this.editedIndex === -1 ? 'New Item' : 'Edit Item'
      }
    },

    watch: {
      dialog (val) {
        val || this.close()
      }
    },

    created () {
      this.initialize()
    },

    methods: {
      initialize() {
        axios.get('/api/contact')
        .then(res=>{
          this.items=res.data.data
        })
        .catch(err=>console.log(err.response))
      },

      editItem (item) {
        this.editedIndex = this.items.indexOf(item)
        this.editedItem = Object.assign({}, item)
        this.dialog = true
      },

      deleteItem (item) {
                   const index = this.items.indexOf(item)
        confirm('Are you sure you want to delete this item?') && this.items.splice(index, 1)

        axios.delete('api/contact/'+item.id)
          .then(res=>(console.log(res.data)))
          .catch(err=>console.log(err.response))

      },

      close () {
        this.dialog = false
        setTimeout(() => {
          this.editedItem = Object.assign({}, this.defaultItem)
          this.editedIndex = -1
        }, 300)
      },

      save () {
       
        if (this.editedIndex > -1) {
          axios.put('api/contact/'+this.editedItem.id,{name:this.editedItem.name,phone:this.editedItem.mobile})
          .then(res=>(console.log(res.data)))
          .catch(err=>console.log(err.response))

          Object.assign(this.items[this.editedIndex], this.editedItem)
        } else {

          axios.post('api/contact/',{name:this.editedItem.name,phone:this.editedItem.mobile})
          .then(res=>(console.log(res.data)))
          .catch(err=>console.log(err.response))

          this.items.push(this.editedItem)
        }
        this.close()
      }
    }
  }
</script>
