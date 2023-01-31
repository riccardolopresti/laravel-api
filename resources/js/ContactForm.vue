<script>

import {store} from './store.js'

export default {
    name:'ContactForm',
    data(){
        return{
            store,
            name:'',
            email:'',
            message:''
        }
    },
    methods:{
        sendForm(){
            const data = {
                name : this.name,
                email : this.email,
                message : this.message,
            }
            console.log(data);

        }
    }
}
</script>

<template>
<div class="container mt-5">
    <div class="wrapper rounded-4 py-3">
        <form class="w-50 text-start text-black">

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nome</label>
                <input v-model.trim="name" type="text" class="form-control" placeholder="nome">
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email</label>
                <input v-model.trim="email" type="email" class="form-control" placeholder="email">
            </div>

            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Messaggio</label>
                <textarea v-model.trim="message" class="form-control" rows="3"></textarea>
            </div>

            <button @click.prevent="sendForm()" type="submit" class="btn btn-primary">Invia</button>
    </form>
    </div>

</div>

</template>

<style lang="scss" scoped>

form{
    margin: 30px auto;
}

.wrapper{
    background-color: white;
}
</style>
