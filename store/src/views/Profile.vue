<template>
  <div class="container">
      <h1>Вы Авторизованы!!!</h1>
      <router-link to="/cart" class="nav-link">
        <a   class="btn btn1" >к покупке</a>
      </router-link>
  </div>
</template>

<script>
export default {
  name: 'Profile',
  computed: {
    currentUser() {
      return this.$store.state.auth.user;
    },
  },
  mounted() {
    if (!this.currentUser) {
      this.$router.push('/login');
    }
  }
};

</script>
<style scoped>
.btn{
  position: relative;
  display: block;
  color: #333;
  font-size: 16px;
  font-family: "montserrat";
  font-weight: 900;
  text-decoration: none;
  margin: 30px 0;
  border: 2px solid #ff7675;
  padding: 14px 60px;
  text-transform: uppercase;
  overflow: hidden;
  transition: 1s all ease;
  margin: 0 auto;
  width: 100px;
}
.btn::before{
  background: #ff7675;
  content: "";
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%,-50%);
  z-index: -1;
  transition: all 0.6s ease;
}
.btn1::before{
  width: 0%;
  height: 100%;
}
.btn1:hover::before{
  width: 100%;
}
.nav-link{
  text-decoration: none;
}
</style>