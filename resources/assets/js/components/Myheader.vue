<template>
  <nav class="navbar is-primary is-center is-spaced" role="navigation" aria-label="main navigation">
    <div class="navbar-brand">
      <strong>PHONEBOOK APP</strong>
      <div class="navbar-menu is-active">
        <router-link to="/home" class="navbar-item" exact><strong>Home</strong></router-link>
        <router-link to="/about" class="navbar-item"><strong>About</strong></router-link>
      </div>
    </div>
  </nav>
</template>

<script>
export default {
  name: "Myheader"
}
</script>

<style scoped>
.navbar-menu {
  margin-left: 50px;
}
</style>