<template>
    <div class="xl:w-72 w-48 flex-shrink-0 border-r border-gray-200 h-full overflow-y-auto p-5">
              <div class="text-base text-gray-400 tracking-wider">Users</div>
              <div class="space-y-4 mt-3">
                <button class="bg-white p-3 w-full flex flex-col rounded-md shadow-lg relative hover:ring-2 ring-blue">
                  <div class="flex flex-col items-center font-medium text-gray-900 pb-2 mb-2 xl:border-b border-gray-200 border-opacity-75 w-full">
                    <div class="bg-zinc-300 w-8 h-7 flex justify-center items-center rounded-full">
                      <span>AE</span>
                    </div>
                    Mert Cukuren
                  </div>
                  <div class="flex items-center w-full justify-evenly">
                    <div class="text-xs py-1 px-2 leading-none bg-green-100 text-green-600 rounded-md">Users</div>
                    <div class="text-xs py-1 px-2 leading-none bg-green-100 text-green-600 rounded-md">Suppliers</div>
                    <div class="text-xs py-1 px-2 leading-none bg-green-100 text-green-600 rounded-md">Customer</div>
                    
                  </div>
                  <i class="fa-solid fa-caret-down absolute top-3 right-4 bouton z-50"></i>
                  <div class="bg-slate-50 p-5 absolute right-1 top-6 shadow-md flex flex-col gap-2 men">
                    <span class="bg-green-100 hover:bg-green-200 p-2 rounded-md">add permission</span>
                    <span class="bg-green-100 hover:bg-green-200 p-2 rounded-md">Supprimer</span>
                  </div>
                </button>
              </div>
            </div>
</template>
<style setup>
  .men{
    display: none;
  }
  .bouton:hover +.men{
    display: flex;
  }
  .men:hover{
    display: flex;
  }
</style>