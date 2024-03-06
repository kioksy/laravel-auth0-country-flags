<template>
    <div class="max-w-sm rounded overflow-hidden shadow-lg">
        <img :src="flag.flags.svg" :alt="flag.name.common" class="w-full" />
        <div class="px-6 py-4">
            <div class="font-bold text-xl mb-2">{{ flag.name.common }}</div>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        flag: Object, // Ensure this matches the structure of the flag data you're fetching
    },
};
</script>
