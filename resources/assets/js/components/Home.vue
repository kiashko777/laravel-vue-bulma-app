<template>
  <div>
    <nav class="panel column is-offset-2 is-8">
      <p class="panel-heading">
        My Phonebook
        <button class="button is-link is-outlined has-background-primary" @click="openAdd">
          Add new contact
        </button>
        <span class="is-pulled-right" v-if="loading">
          <i class="fa fa-refresh fa-spin fa-2x fa-fw"></i>
        </span>
      </p>
      <div class="panel-block">
        <p class="control has-icons-left">
          <input class="input" type="text" placeholder="Search" v-model="searchQuery">
          <span class="icon is-left">
        <i class="fas fa-search" aria-hidden="true"></i>
      </span>
        </p>
      </div>

      <a class="panel-block" v-for="item,key in temp">
      <span class="column is-9">
        <strong>{{ item.name }} </strong>
        </span>
        <span class="panel-icon column is-1">
        <i class="fa fa-trash has-text-danger" aria-hidden="true" @click="del(key,item.id)"></i>
    </span>
        <span class="panel-icon column is-1">
        <i class="fa fa-edit has-text-info" aria-hidden="true" @click="openUpdate(key)"></i>
    </span>
        <span class="panel-icon column is-1">
        <i class="fa fa-eye has-text-primary" aria-hidden="true" @click="openShow(key)"></i>
    </span>
      </a>
    </nav>
    <Add :openmodal="addActive" @closeRequest="close"></Add>
    <Show :openmodal="showActive" @closeRequest="close"></Show>
    <Update :openmodal="updateActive" @closeRequest="close"></Update>
  </div>
</template>

<script>
let Add = require('./Add.vue');
let Show = require('./Show.vue');
let Update = require('./Update.vue');

export default {
  components: {Add, Show, Update},
  data() {
    return {
      addActive: '',
      lists: {},
      errors: {},
      showActive: '',
      updateActive: '',
      loading: false,
      searchQuery: '',
      temp: ''
    }
  },
  watch: {
    searchQuery() {
      if (this.searchQuery.length > 0) {
        this.temp = this.lists.filter((item) => {
              return Object.keys(item).some((key) => {
                let string = String(item[key])
                return string.toLowerCase().indexOf(this.searchQuery.toLowerCase()) > -1
              })
            }
        )
      } else {
        this.temp = this.lists
      }
    }
  },
  mounted() {
    axios.post('/getData').then((response) => this.lists = this.temp = response.data)
        .catch((error) => this.errors = error.response.data.errors);
  },
  methods: {
    openAdd() {
      this.addActive = 'is-active';
    },
    openShow(key) {
      this.$children[1].list = this.temp[key]
      this.showActive = 'is-active';
    },
    openUpdate(key) {
      this.$children[2].list = this.temp[key]
      this.updateActive = 'is-active';
    },
    close() {
      this.addActive = this.showActive = this.updateActive = '';
    },
    del(key, id) {
      if (confirm("Are you sure?")) {
        this.loading = !this.loading
        axios.delete(`/phonebook/${id}`).then((response) => {
          this.lists.splice(key, 1);
          this.loading = !this.loading
        })
            .catch((error) => this.errors = error.response.data.errors)
      }

    }
  }
}
</script>

<style scoped>

</style>