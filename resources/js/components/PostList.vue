<template>
    <div class="mt-[27px] bg-[white] rounded-[14.44px]  shadow-[6.19px_6.19px_55px_0px_#0000000D] py-[30px] ">
         <DataTable
             class="[&>*]:ps-6 min-w-full divide-y divide-gray-200 dark:divide-gray-700"
             :data="data"
             ref="tableRefs"
         >
             <thead class="!border-t-[0px]">
                 <tr>
                     <th scope="col" class="ps-[47px] py-3 text-start">
                         <div class="flex items-center gap-x-2">
                             <span class="font-[600] text-[12.34px] leading-[22.06px] text-[#171A22] uppercase">
                                 No
                             </span>
                         </div>
                     </th>
                     <th scope="col" class=" py-3 text-start">
                         <div class="flex items-center gap-x-2">
                             <span class="font-[600] text-[12.34px] leading-[22.06px] text-[#171A22] uppercase">
                                 Name
                             </span>
                         </div>
                     </th>
                 </tr>
             </thead>
         </DataTable>
     </div>
</template>
<script setup>
import { ref, defineProps, onMounted, render } from 'vue';
const data = [
  [1, 2],
  [3, 4],
];
const tableRefs = ref(null);
onMounted(() => {
     tableRefs.value = tableRefs;
 });
</script>
