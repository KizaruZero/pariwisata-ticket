<!-- NavLink.vue -->
<template>
    <Link
        :href="href"
        :class="[
            'text-white hover:text-blue-200 transition duration-150 ease-in-out',
            { 'text-[#f7c06d]': active }, { 'font-bold': active },
        ]"
        
    >
        <slot></slot>
    </Link>
</template>

<script>
import { Link } from "@inertiajs/vue3";

export default {
    components: {
        Link,
    },
    props: {
        href: {
            type: String,
            required: true,
        },
        active: {
            type: Boolean,
            default: false,
        },
    },
};
</script>
