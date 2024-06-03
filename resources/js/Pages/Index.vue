<template>
    <Layout>
        <div class="w-full">
            <div class="flex justify-center mt-5"> <!-- flex ให้อยู่บรรทัดเดียวกัน -->
                <h1 class="text-xl md:text-2xl lg:text-3xl xl:text-4xl font-bold text-gray-700">เอกสารประกอบการสอน</h1>
                <h1 class="text-xl md:text-2xl lg:text-3xl xl:text-4xl font-bold text-blue-600"> (PowerPoint)</h1>
            </div>
           <div class="grid grid-cols-4 gap-6 px-16 mt-10">
                <div class="w-full border border-slate-200 p-4 font-bold text-gray-700 hover:text-blue-600 hover:shadow-xl transition-all ease-in-out duration-500 cursor-pointer">
                    <img class="w-full h-80 object-cover " src="https://picsum.photos/400/800" >
                    <div class="mt-2">
                        <p class="text-lg  text-center leading-5">รายวิชา GE64303 การออมและการลงทุน</p>
                        <div class="text-sm text-center mt-4 text-gray-700 font-normal">
                            <p>อาจารย์ ดร.มรุต กลัดเจริญ</p>
                            <p>คณะวิทยาการจัดการ</p>
                            <p>เผยแพร่วันที่ 1 มีนาคม 2567</p>
                        </div>

                    </div>
                </div>

           </div>
        </div>
    </Layout>
</template>

<script>
import Layout from "@/Pages/Layout/Layout.vue";
//import TeachingMaterialCard from "@/Pages/Components/TeachingMaterialCard.vue";
//import axios from 'axios';
import {Link} from "@inertiajs/vue3";
import {router} from "@inertiajs/vue3";
export default {
   name: "Index",
    components: {Layout, Link},

}
</script>

