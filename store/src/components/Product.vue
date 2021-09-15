<template>
<div id="appProduct">
  <h2 class="catalog-title">Каталог Iphone</h2>
  <div  class="catalog">
    <ProductItem  v-for="products in products" :key="products.id" :product_data="products" @addToCart='addToCart' />
  </div>
</div>
</template>

<script>
import { mapActions } from 'vuex'
import ProductItem from '../components/ProductItem';
import ProductsService from '../services/product.service';

export default {
name: "Product",
el: '#appProduct',
  components: {

    ProductItem,
  },
  data(){
    return{
      products: []
    };
  },
  computed:{
  },
  methods:{
    ...mapActions(['addToCartAction']),
    addToCart(data){
      this.addToCartAction(data);
    }
  },
  mounted(){
    ProductsService.getProductContent().then(
    response =>   (this.products = response.data)
  )},
};
</script>

<style scoped>
.catalog-title{
  text-align: center;
}
.catalog{
  display: flex;
  flex-wrap: wrap;
}
</style>

