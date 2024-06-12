<template>
    <Layout>
       <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-4">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <th class="px-6 py-3">#</th>
                    <th class="px-6 py-3">ปก</th>
                    <th class="px-6 py-3">รหัสวิชา</th>
                    <th class="px-6 py-3">ชื่อวิชา</th>
                    <th class="px-6 py-3">วันที่เผยแพร่</th>
                    <th class="px-6 py-3">อาจารย์</th>

                </tr>
                </thead>
                <tbody v-if="subjectData!=null">
                <tr v-for="(subject,index) in subjectData" :key="index"
                    class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <!-- <th>{{ index + 1 }}</th> -->
                    <th class="text-center">{{ subject.raw_id }}</th>
                    <td class="px-6 py-4">
                        <div v-if="subject.image.data.length > 0" class="w-20 h-32">
                            <img :src="subject.image.data[0].url" class="object-cover h-full w-20" >
                        </div>
                    </td>
                    <td>
                        {{ subject.code }}
                    </td>
                     <td>
                        <div>
                        <p>{{ subject.name_th }}</p>
                        <p>{{ subject.name_en }}</p>
                        </div>
                    </td>

                    <td>
                        {{ subject.display_published_at }}
                    </td>
                    <td>
                        <div>
                            <p v-for="(professor) in subject.professors">
                                {{ professor.prefix }} {{ professor.first_name }} {{ professor.last_name }}
                            </p>
                        </div>
                    </td>

                    <td class="px-6 py-4">
                        <div class="flex justify-center gap-1">
                            <!-- <a v-for="(doc,index) in subject.documents.data" :key="index" :href="doc.url"
                               target="_blank">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor"
                                     stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m2.25 0H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"/>
                                </svg>
                            </a> -->
                        </div>

                    </td>
                    <td class="px-6 py-4 flex flex-col items-center gap-1">
                        <!-- <Link :href="route('dashboard.subject.edit',subject.id)"
                              class="btn btn-primary btn-sm w-16">
                            EDIT
                        </Link>
                        <button class="btn btn-error btn-sm w-16 text-gray-100 uppercase" type="button"
                                @click="handleDelete(subject)">
                            DELETE
                        </button> -->
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
        <div v-if="pagination != null" id="pagination" class="mt-4 flex justify-between items-center">
            <div>แสดง {{ pagination.from }} ถึง {{ pagination.to }} จาก {{ pagination.total }} แถว</div>
            <div class="join">
                <button v-for="(pag,index) in pagination.links" :key="index"
                        :class="pag.active ?'btn-active':''"
                        class="join-item btn btn-md" @click="selectPage(pag)">
                    {{ pag.label }}
                </button>
            </div>
        </div>
    </Layout>
</template>

<script>
import Layout from "@/Pages/Dashboard/Layout/Layout.vue";
import {Inertia} from "@inertiajs/inertia";
//import {Link, router, useForm} from "@inertiajs/vue3";
export default {
    name:"SubjectIndex",
    components:{
        Layout
    },
    props:{
        subjects:{           //รับค่ามาจาก Dashboard/SubjectController
            type: Object,
            required: true
        }
    },
    data(){
        return {
            subjectData: null,
            pagination: null

        }
    },
    mounted() {
        this.subjectData = this.subjects.data;
        this.pagination = this.subjects.meta.pagination;
    },
    methods: {
        selectPage(pag) {
            Inertia.get(pag.url);
        },
    }

}
</script>

<style>

</style>
