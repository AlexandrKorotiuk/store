<template>
  <div>
    <main><Product /></main>
    <BtnCart @click="CartNav" />
  </div>
</template>

<script>
import Product from "../components/Product"
import BtnCart from '../components/BtnCart'
import {mapGetters} from 'vuex'

export default {
  name: "home",
  components: {
    BtnCart,
    Product
  },
  computed:{
    ...mapGetters([
      'cart',
    ])
  },
  methods:{
    CartNav(){
      this.$router.push('/cart')
    }
  }
};
</script>