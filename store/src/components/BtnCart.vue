<template>
    <transition name="fade">
        <div class="btn-position"> 
          <a href="#" class="btn btn-sm animated-button thar-one">Корзина</a> 
        </div>
    </transition>
</template>

<script>

export default {
  name:'BtnCart'
}
</script>

<style scoped>
.btn-cart{
  position: absolute;
  bottom: 45px;
  right: 45px;
}
.btn-position{
  position: absolute;
  bottom: 45px;
  right: 45px;
}
a.animated-button.thar-one {
  color: #333;
  text-align: center;
  cursor: pointer;
  display: block;
  position: relative;
  border: 2px solid #F7CA18;
  transition: all 0.4s cubic-bezier(0.215, 0.61, 0.355, 1) 0s;
  text-decoration: none;
  padding: 30px;
}
a.animated-button.thar-one:hover {
  color: #000 !important;
  background-color: transparent;
  text-shadow: none;
}
a.animated-button.thar-one:hover:before {
  bottom: 0%;
  top: auto;
  height: 100%;
}
a.animated-button.thar-one:before {
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