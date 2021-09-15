import { createStore } from "vuex";
import orderService from "../services/order.service";
import NewProduct from "../services/new-product"
import { auth } from './auth.module';
export default createStore({
  state() {
    return {
      cart: [],
      user: false
    }
  },
  mutations: {
    setCart(state,product) {
      if(state.cart.length) {
        let isProductExist = false;
        state.cart.map(function(item) {
          if (item.id === product.id) {
            isProductExist = true;
            item.quantity++
          }
        })
        if(!isProductExist){
          state.cart.push(product)
        }
      } else {
        state.cart.push(product)
      }
    },
    RemoveFromCart(state, index) {
      state.cart.splice(index,1)
    },
    increment(state,index){
      state.cart[index].quantity++
    },
    decrement(state, index){
      if(state.cart[index].quantity > 1)
      state.cart[index].quantity--
    },
    orderMut(state){
      state.user = true
    },
    productMut(state){
      state.user = true
    }
  },
  actions: {
    addToCartAction({ commit }, product) {
      commit('setCart', product)
    },
    decremrntItemCount({commit}, index){
      commit('decrement',index)
    },
    incremrntItemCount({commit},index){
      commit('increment',index)
    },
    deleteFromCarts({commit}, index){
      commit('RemoveFromCart', index)
    },
    OrderAction({commit},order) {
      return orderService.orderBuy(order).then(
        response => {
          commit('orderMut');
          return Promise.resolve(response.data);
        }
      )
    },
    addNewProduct({commit},products){
      return NewProduct.orderBuy(products).then(
        response =>{
          commit('productMut');
          return Promise.resolve(response.data)
        }
      )
    }
  },
  getters: {
    cart(state) {
      return state.cart;
    },
  },
  modules: {
    auth
  },
});
