<!-- NavLink.vue -->
<template>
    <Link
        :href="href"
        :class="[
            'text-white hover:text-blue-300 transition duration-150 ease-in-out',
            , { 'font-bold': active },
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
            default: true,
        },
    },
};
</script>


