<script>

import ContactForm from '../ContactForm.vue'
export default {
    name:'Contacts',
    components:{
        ContactForm
    }
}
</script>

<template>
    <main>
        <div class="container text-center fw-bold text-white py-4">
            <h1 class="text-uppercase fw-bold">Contattami</h1>

            <ContactForm />
        </div>

    </main>
</template>


<style scoped>
h1{
    text-shadow: 0 0  5px rgba(0, 0, 0, 0.782);
}
</style>
