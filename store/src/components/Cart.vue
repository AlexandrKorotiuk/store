<template>
  <div class="Cart">
    <h1 class="cart-title">Корзина</h1>
    <CartItem 
      v-for="(item,index) in cartData"
      :key="item.id"
      :cartItemData="item"
      @deleteFromCart="deleteFromCart(index)"
      @decremrntItem ="decremrntItem(index)"
      @incremrntItem ="incremrntItem(index)"
    />
  <div v-if="cartTotalCoast">
    <div v-if="currentUser" class="btn-position"> 
      <form name="tocheckout" method="POST" action="https://pay.fondy.eu/api/checkout/redirect/">
        <input type="hidden" name="order_id" v-bind:value="createOrderId">
        <input type="hidden" name="order_desc" value="test order">
        <input type="hidden" name="currency" value="UAH">
        <input type="hidden" name="amount" v-bind:value="cartTotalCoast">
        <input type="hidden" name="signature" v-bind:value="createOrderHash">
        <input type="hidden" name="merchant_id" value="1486903">
        <input type="submit" @click="submitOreder" class="btn btn-sm animated-button thar-one" v-bind:value=" cartTotalCoast">
      </form> 
    </div>
    <div v-if="!currentUser" class="btn-position"> 
      <router-link to="/login" class="nav-link">
        <a class="btn btn-sm animated-button thar-one"> Авторизуйтесь! <br> $</a> 
      </router-link>
    </div>
  </div>
  <div v-if="!cartTotalCoast">
    <h1>У вас нет покупок</h1>
  </div>
  </div>
</template>

<script>
import CartItem from '../components/CartItem';
import{mapActions} from 'vuex';
export default {
  name: 'Cart',
  components:{
    CartItem
  },
  props:{
    cartData:{
    type: Array,
      dafault(){
        return[]
      },
    }
  },
  methods:{
    ...mapActions(['deleteFromCarts','decremrntItemCount', 'incremrntItemCount']),
    deleteFromCart(index){
      this.deleteFromCarts(index)
    },
    decremrntItem(index){   
      this.decremrntItemCount(index)
    },
    incremrntItem(index){
      this.incremrntItemCount(index)
    },
    submitOreder(){
      for(let item of this.cartData){
        let itemId = item.id,
        itemQuantity = item.quantity,
        userId =  this.$store.state.auth.user.user.id,
        order = {
          itemId,
          itemQuantity,
          userId   
        }
        this.$store.dispatch('OrderAction',order)
      }
    }
  },
  data(){
    return{}
  },
  computed:{
    cartTotalCoast(){
      let result  = []
      if(this.cartData.length) {
        for(let item of this.cartData) {
          result.push(item.price * item.quantity)
        }
        result = result.reduce(function(sum, el) {
          return sum + el;
        })
        return result;
      } else {
        return 0;
      }
    },
    currentUser() {
      return this.$store.state.auth.user;
    },
    createOrderHash() { 
      let amount = this.cartTotalCoast,
        result= [],
        sha1 = require('sha1'),
        hashFirst = 'pOdg5nnj8pLoP5MhBpLtZcZxj9Fk5BLe|',
        hashSecond  = '|UAH|1486903|test order|',
        hashThree =this.createOrderId;
        result = sha1(hashFirst+amount+hashSecond+hashThree)
        return result;
    },
    createOrderId() {
      return Math.random();
    }
  },
}
</script>
<style scoped>
.cart-title{
  text-align: center;
}
.btn-cart{
  position: absolute;
  bottom: 45px;
  right: 45px;
}
input.animated-button.thar-one {
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
  padding: 30px;
}
input.animated-button.thar-one:hover {
  color: #000 !important;
  background-color: transparent;
  text-shadow: none;
}
input.animated-button.thar-one:hover:before {
  bottom: 0%;
  top: auto;
  height: 100%;
}
input.animated-button.thar-one:before {
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
.nav-link{
  text-decoration: none;
}
</style>
