<template>
<div id="app">
  <div class="container">
    <header class="jumbotron">
      <div class="product">
        <div class="product-item" >
          <h3  class="product-mod">{{product_data.title}}</h3>
        </div>
        <div class="product-item" >
          <img   class="product-img"  v-bind:src=" 'http://192.168.0.197:8081/uploads/' +product_data.image" alt="#">
        </div>
        <div class="product-item mt" >
          <p  class="product-mod" >{{product_data.description}}</p>
        </div>
        <div class="product-item mt" >
          <a   class="btn btn1" @click="addToCart">{{product_data.price}} $</a>
        </div>
      </div>
    </header>
  </div>
</div>
</template>

<script>

import ProductsService from '../services/product.service';
 
export default {
name:'ProductItem',
  props:{
    product_data:{
      type: Object,
      default() {
        return {}
      }
    }
  },
  mounted(){
    ProductsService.getProductContent().then(
    response =>(this.products = response.data)
  )},
  methods:{
    addToCart() {
      this.$emit('addToCart',this.product_data);
    }
  }
}
</script>


<style scoped>
.product-img{
  width: 400px;
  display: block;
}
.product-item{
  display: flex;
}
.product{
  display: grid;
  box-shadow: 0 0 8px 0 #e0e0e0;
  padding: 20px;
  margin-right: 20px;
  margin-top: 20px;
}
.courses{
  display: flex;
  justify-content: flex-end;
}
p{
  margin: 0px;
}
.product-mod{
  width: 400px;
  display: block;
  text-align: center;
}
.mt{
  margin-top: 20px;
}
.middle{
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%,-50%);
}
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
</style>