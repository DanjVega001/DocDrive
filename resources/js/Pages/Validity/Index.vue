<script setup>
import Layout from '@/Layouts/Layout.vue';

defineProps({
    validities:Object,
    isAuthenticated:Boolean,
    role:String,
    message:String,
})

</script>

<template>
    <Layout :isAuthenticated=this.isAuthenticated>
        <div v-for="v in validities">
            v.name
        </div>
    </Layout>
</template>


