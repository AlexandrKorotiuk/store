<template>
  <div id="app" class="position-pages">
    <nav class="navbar navbar-expand navbar-dark bg-dark header">
       <div class="container">
          <div class="header-inner">
            <div class="header-logo">
              <a href class="navbar-brand" @click.prevent>Store</a>
            </div>
            <div class="header-nav">
              <div class="nav-item">
                  <div v-if="!currentUser" class="navbar-nav ml-auto">
                    <router-link to="/register" class="nav-link">
                      Sign Up
                    </router-link>
                  </div>
              </div>
                <div class="nav-item">
                  <div v-if="!currentUser" class="navbar-nav ml-auto">
                    <router-link to="/login" class="nav-link">
                      Login
                    </router-link>
                  </div>
                </div>
                <div class="nav-item">
                  <router-link to="/home" class="nav-link">
                    Home
                  </router-link>
                </div>
                <div class="nav-item">
                  <div v-if="currentUser" class="navbar-nav ml-auto">
                    <a class="nav-link" href @click.prevent="logOut">
                      LogOut
                    </a>
                  </div>
                </div>
            </div>
          </div>
       </div>
    </nav>
    <div class="container-content">
      <router-view />
    </div>
  </div>
</template>

<script>
export default {
  computed: {
    currentUser() {
      return this.$store.state.auth.user;
    },
    showAdminBoard() {
      if (this.currentUser && this.currentUser.roles) {
        return this.currentUser.roles.includes('ROLE_ADMIN');
      }
      return false;
    },
    showModeratorBoard() {
      if (this.currentUser && this.currentUser.roles) {
        return this.currentUser.roles.includes('ROLE_MODERATOR');
      }
      return false;
    }
  },
  methods: {
    logOut() {
      this.$store.dispatch('auth/logout');
      this.$router.push('/login');
    }
  }
};
</script>

<style scoped>
.header {
  padding-top: 10px;
  padding-bottom: 10px;
  position: absolute;
  top: 0;
  right: 0;
  left: 0;
  z-index: 100000;
  width: 100%;
  background: black;
}
.container-content{
  width: 100%;
  max-width: 1400px;
  margin: 0 auto;
  padding-top: 80px;
}
.container{
  width: 100%;
  max-width: 1200px;
  margin: 0 auto;
}
.header-inner {
  display: flex;
  justify-content: space-between;
  align-items: center;
}
.header-logo{
  font-size: 30px;
  font-weight: 700;
  color: #fff;
}
.nav-item{
  display: inline-block;
  vertical-align: top;
  margin: 0 20px;
  color: #fff;
  text-decoration: none;
  transition: color 0.2s linear;
  position: relative;
}
.nav-link{
  color: #fff;
  text-decoration: none;
}
.navbar-brand{
  color: #fff;
  text-decoration: none;
  font-weight: 900;
  font-size: 25px;
}
</style>