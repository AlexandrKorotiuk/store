<template>
  <div class="col-md-12">
    <div class="card card-container">
      <form class="form-register" name="form" @submit.prevent="handleRegister">
        <div v-if="!successful">
          <div class="form-group"> 
            <label for="name">Username</label>
            <input v-model="user.name" type="text" class="form-control" name="name"/>
          </div>
          <div class="form-group">
            <label for="email">Email</label>
            <input v-model="user.email" type="email" class="form-control" name="email"/>
          </div>
          <div class="form-group">
            <label for="password">Password</label>
            <input v-model="user.password" type="password" class="form-control" name="password"/>
          </div>
          <div class="form-group">
            <label for="password">Password Confirm</label>
            <input v-model="user.password_confirmation" type="password" class="form-control" name="password"/>
          </div>
          <div class="form-group">
            <button class="btn btn-primary btn-block">Sign Up</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</template>

<script>
import User from '../models/user';

export default {
  name: 'Register',
  data() {
    return {
      user: new User('', '', '', ''),
      submitted: false,
      successful: false,
      message: ''
    };
  },
  computed: {
    loggedIn() {
      return this.$store.state.auth.status.loggedIn;
    }
  },
  methods: {
    handleRegister() {
      this.message = '';
      this.submitted = true;
      this.$store.dispatch('auth/register', this.user).then(
        data => {  
          this.message = data.message;
          this.successful = true;
          if( this.successful == true) {
            this.$router.push('/login');
          }
        },
        error => {
          this.message =
            (error.response && error.response.data) ||
            error.message ||
            error.toString();
          this.successful = false;
        }
      );
    }
  }
};
</script>

<style scoped>
label {
  display: block;
  margin-top: 10px;
}
.card-container.card {
  max-width: 350px !important;
  padding: 40px 40px;
}
.card {
  background-color: #f7f7f7;
  padding: 20px 25px 30px;
  margin: 0 auto 25px;
  margin-top: 50px;
  -moz-border-radius: 2px;
  -webkit-border-radius: 2px;
  border-radius: 2px;
  -moz-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
  -webkit-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
  box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
}
.profile-img-card {
  width: 96px;
  height: 96px;
  margin: 0 auto 10px;
  display: block;
  -moz-border-radius: 50%;
  -webkit-border-radius: 50%;
  border-radius: 50%;
}
.form-control{
  width: 247px;
  height: 25px;
  border: 1px solid #E9967A;
}
.form-register{
  display: block;
  margin: 0 auto;
  width: 260px;
}
.btn-primary{
  width: 200px;
  height: 30px;
  margin-top: 10px;
  margin-left: 10%;
  background: #DC143C;
  border: 1px solid #FFA07A;
  border-radius: 20px;
}
</style>