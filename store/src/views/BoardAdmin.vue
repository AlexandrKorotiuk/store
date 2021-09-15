<template>
  <div class="container">
    <header class="jumbotron">
        <h1>Adminka</h1>
    </header>
    <div class="new-product">
      <form class="product-form"  @submit.prevent="addNewProduct" >
        <label>title:</label>
        <input v-model="products.title" class="form-item" name="title">
        <label>price:</label>
        <input v-model="products.price" class="form-item" name="price">
        <label>discription:</label>
        <input  v-model="products.description" class="form-item" name="discription">
        <label>image:</label>
        <input type="file" id="file" ref="file" v-on:change="handleFileUpload()"/>
        <button class="btn btn-sm animated-button thar-one">Создать</button>
      </form>
    </div>
  </div>
</template>

<script>
import Products from '../models/products';
import axios from 'axios';
export default {
  name: 'Admin',
  data() {
    return {
      products: new Products ('', '', '',),
      submitted: false,
      file: ''
    };
  },
  computed:{
    currentAdmin() {
      return this.$store.state.auth.user;
    },
  },
  mounted() {
    if(!this.currentAdmin){
      this.$router.push('/login');
    }
  },
  methods:{
    addNewProduct() {
      let title =  this.products.title,
          price = this.products.price,
          description=this.products.description,
          image = this.file.name,
          products = {
            title,
            price,
            description,
            image 
          }
      this.$store.dispatch('addNewProduct',products)
      let formData = new FormData();
      formData.append('file', this.file);
      axios.post('single-file',formData)
    },
    handleFileUpload(){
      this.file = this.$refs.file.files[0];
    }
  }
};
</script>
<style scoped>
.product-form{
  display: grid;
}
.new-product{
  display: block;
  width: 400px;
}
.form-item{
  height: 30px;
  margin-bottom: 5px;
}
.animated-button.thar-one {
  color: #333;
  font-size: 23px;
  font-weight: 900;
  text-align: center;
  cursor: pointer;
  display: block;
  position: relative;
  border: 2px solid #F7CA18;
  transition: all 0.4s cubic-bezier(0.215, 0.61, 0.355, 1) 0s;
  text-decoration: none;
  padding: 10px;
}
.animated-button.thar-one:hover {
  color: #000 !important;
  background-color: transparent;
  text-shadow: none;
}
.animated-button.thar-one:hover:before {
  bottom: 0%;
  top: auto;
  height: 100%;
}
.animated-button.thar-one:before {
  display: block;
  position: absolute;
  left: 0px;
  top: 0px;
  height: 0px;
  width: 100%;
  z-index: -1;
  content: '';
  color: #000 !important;
  background: #F7CA18;
  transition: all 0.4s cubic-bezier(0.215, 0.61, 0.355, 1) 0s;
}
</style>
