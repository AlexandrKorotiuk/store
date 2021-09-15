<template>
  <Cart :cartData="cart"  />
</template>
<script>
import Cart from "../components/Cart"
import {mapGetters} from 'vuex'
export default {
  name: "CartShop",
  components: {
    Cart
  },
    computed:{
    ...mapGetters([
      'cart',
    ])
  },
  methods:{
  }
};
</script>