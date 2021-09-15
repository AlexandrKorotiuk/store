<template>
    <div class="cart-item">
        <img  class="cart-img" v-bind:src=" 'http://192.168.0.197:8081/uploads/' +cartItemData.image" alt="#">
        <p>{{cartItemData.title}}</p>
        <p>{{cartItemData.price}} $</p>
        <div class="text-box">
            <a href="#" class="btn btn-white btn-animate"  @click="deleteFromCart">delete</a>
        </div>
        <button @click="decremrntItem">-</button>
        qty: <p>{{ cartItemData.quantity }}</p>
        <button @click="incremrntItem">+</button>
    </div>
</template>
<script>
export default {
    name: 'CartItem',
    props:{
        cartItemData:{
            type: Object,
            default(){
                return{}
            }
        },
        cartItemCounter:{
            type: Object,
            default(){
                return{}
            }
        }
    },
    data(){
        return{
            counter: 1
        }
    },
    methods:{
        deleteFromCart(){
            this.$emit('deleteFromCart')
        },
        decremrntItem(){
            this.$emit('decremrntItem')
        },
         incremrntItem(){
           this.$emit('incremrntItem')
        },
    },
}
</script>
<style scoped>
.cart-img{
    width: 200px;
}
.cart-item{
    display: flex;
    justify-content: space-between;
    flex-wrap: nowrap;
    align-items: center;
    box-shadow: 0 0 8px 0 #e0e0e0;
    padding: 20px;
    margin-bottom: 10px;
}
.text-box{
    position: relative;
}
.btn:link,
.btn:visited {
    text-transform: uppercase;
    text-decoration: none;
    padding: 15px 40px;
    display: inline-block;
    border-radius: 100px;
    transition: all .2s;
}
.btn:hover {
    transform: translateY(-3px);
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
}
.btn:active {
    transform: translateY(-1px);
    box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
}
.btn-white {
    background-color: #FFA07A;
    color: #777;
}
.btn::after {
    content: "";
    display: inline-block;
    height: 100%;
    width: 100%;
    border-radius: 100px;
    position: absolute;
    top: 0;
    left: 0;
    z-index: -1;
    transition: all .4s;
}
.btn-white::after {
    background-color: #fff;
}
.btn:hover::after {
    transform: scaleX(1.4) scaleY(1.6);
    opacity: 0;
}
.btn-animated {
    animation: moveInBottom 5s ease-out;
    animation-fill-mode: backwards;
}
@keyframes moveInBottom {
    0% {
        opacity: 0;
        transform: translateY(30px);
    }

    100% {
        opacity: 1;
        transform: translateY(0px);
    }
}
</style>
