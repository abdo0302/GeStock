<script setup>
import AppHeader from '@/components/Dashboard/AppHeader.vue';
import AppUsers from '@/components/Dashboard/Sidebar/AppUsers.vue';
import AppTable from '@/components/Dashboard/table/AppTable.vue';
import AppCustomer from '@/components/Dashboard/Sidebar/AppCustomer.vue';
import AppSuppliers from '@/components/Dashboard/Sidebar/AppSuppliers.vue';
import { computed } from 'vue';
import { useStore } from 'vuex';
const store = useStore();
const getSidebar = computed(()=>store.getters.getSidebar)
</script>
<template>
    <div class="bg-gray-100 text-gray-600 h-screen flex overflow-hidden text-sm px-3">
        <div class="flex-grow overflow-hidden h-full flex flex-col">
            <AppHeader/>
          <div class="flex-grow flex overflow-x-hidden">
            <div v-if="getSidebar=='Users'">
               <AppUsers/>
            </div>
            <div v-if="getSidebar=='Suppliers'">
               <AppSuppliers/>
            </div>
            <div v-if="getSidebar=='Customer'">
               <AppCustomer/>
            </div>
            
            <AppTable/>
          </div>
        </div>
      </div>
</template>