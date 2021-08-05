<template>
    <div>
        <p> {{ persona.primer_nombre  }} </p>

    </div>
</template>

<script>
export default {
    props:['persona'],
    data() {
        return {

        };
    },

    mounted() {
        console.log("Component mounted.");
    },

    methods: {

    }
};
</script>
