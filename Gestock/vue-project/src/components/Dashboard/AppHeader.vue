<script setup>
import { useStore } from 'vuex';
import { ref } from 'vue';
const store = useStore();
const activeTab = ref('Users');

const setSidbar=(value)=>{
  store.commit('setSidbar',value)
  activeTab.value=value
}
const logOut=()=>{
  store.dispatch('logOut')
}
</script>
<template>
 <div class="flex justify-between w-full border-b border-gray-200 px-10 ">
    <div class="flex items-center">
      <img class="w-20" src="../Logo/img/logo.png" alt="">
      <span class="text-2xl font-bold">Ge<span class="text-blue-600">Stock</span></span>
    </div>
    <div class="flex h-full">
       <a href="#" @click="setSidbar('Users')" :class="['cursor-pointer h-full hover:text-blue-500 inline-flex items-center mr-8',activeTab ==='Users' ? 'active' :'']">Users</a>
       <a href="#" @click="setSidbar('Suppliers')" :class="['cursor-pointer h-full inline-flex mr-8 items-center',activeTab ==='Suppliers' ? 'active' :'']">Suppliers</a>
       <a href="#" @click="setSidbar('Customer')" :class="['cursor-pointer h-full hover:text-blue-500 inline-flex items-center mr-8',activeTab ==='Customer' ? 'active' :'']">Customers</a>
    </div>
    <div class="flex items-center space-x-7">
       <button class="flex items-center relative info">
           <span class="relative flex-shrink-0">
              <div class="bg-slate-300 w-8 h-8 flex justify-center items-center rounded-full">
                <span>AB</span>
              </div>
              <span class="absolute right-0 -mb-0.5 bottom-0 w-2 h-2 rounded-full bg-green-500 border border-white dark:border-gray-900"></span>
            </span>
            <span class="ml-2">James Smith</span>
            <svg viewBox="0 0 24 24" class="w-4 ml-1 flex-shrink-0" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round">
              <polyline points="6 9 12 15 18 9"></polyline>
            </svg>
          <!-- menu -->
        <div class="bg-white shadow-md absolute w-full p-4 top-8 z-50 menu">
          <span @click="logOut" class="bg-slate-100 hover:bg-slate-200 rounded-md px-7 py-1">log out</span>
        </div>    
       </button>
       
    </div>  
 </div>    
</template>

<style setup>
  .menu{
    display: none;
  }
  .info:hover > .menu{
    display: block;
  }
  .active{
    border-bottom: 2px solid #1A73E8;
    color: #1A73E8;
  }
</style>