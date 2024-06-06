<template>
     <div class="w-full border border-slate-200 p-4 font-bold text-gray-700 hover:text-blue-600 hover:shadow-lg transition-all ease-in-out duration-500 cursor-pointer relative max-w-sm mx-auto " >
        <img class="w-full h-100 object-cover" src="https://picsum.photos/400/800" >
        <div class="mt-2">
          <p class="text-lg text-center leading-5">รายวิชา {{ subject.code }} {{ subject.name_th }}</p>
            <div class="text-sm text-center mt-4 text-gray-700 font-normal flex flex-col">
                <div v-for="professor in subject.professors" :key="professor.id">
                    <p>อาจารย์ {{ professor.prefix }} {{ professor.first_name  }} {{ professor.last_name }}</p>
                    <p>สาขาวิชา {{ professor.major }}</p>
                    <p>{{ professor.department.name }}</p>
                </div>
                <p>เผยแพร่ {{ subject.published_at}}</p>
                <div class="mt-2 flex gap-2 items-center justify-end text-blue-600 text-xs">
                    <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" >
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                    </svg>
                    {{ subject.view }}
                </div>
            </div>

        </div>
    </div>
</template>


<script>
export default {
    name:"TeachingMaterialCard",
    props:{
        subject:{
            type: Object,
            required: true
        }
    },
    mounted(){
        console.log('........');
        console.log(this.subject);
        console.log('........');
    }
}
</script>


