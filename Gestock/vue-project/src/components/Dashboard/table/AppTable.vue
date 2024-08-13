<script setup>
import HeaderTable from './HeaderTable.vue';
import ProductTable from './BodyTable/ProductTable.vue';
import CategoryTable from './BodyTable/CategoryTable.vue';
import OrderTable from './BodyTable/OrderTable.vue';
import { useStore } from 'vuex';
import { computed } from 'vue';
const store = useStore();
const body = computed(()=>store.getters.getbody)
</script>
<template>
    <div class="flex-grow bg-white dark:bg-gray-900 overflow-y-auto">
       <HeaderTable/>
       <div v-if="body=='Product'">
           <ProductTable/>
       </div>
       <div v-if="body=='Category'">
           <CategoryTable/>
        </div>
        <div v-if="body=='Order'">
           <OrderTable/>
        </div>
            
        
          
    </div>
</template>