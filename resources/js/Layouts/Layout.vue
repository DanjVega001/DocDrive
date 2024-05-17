<script setup>

import LayoutAutenticated from '@/Layouts/Authenticated.vue';
import LayoutGuest from '@/Layouts/Guest.vue';

const { isAuthenticated } = defineProps({ isAuthenticated: Boolean });

</script>

<template>
    <div v-if="isAuthenticated">
        <LayoutAutenticated/>
    </div>

    <div v-else>
        <LayoutGuest></LayoutGuest>
    </div>
</template>
