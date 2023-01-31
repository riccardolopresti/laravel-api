<script>

import {store} from './store.js'

export default {
    name:'ContactForm',
    data(){
        return{
            store
        }
    },
    methods:{
        sendForm(){

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
                <input type="text" class="form-control" placeholder="nome">
            </div>

            <div class="mb-3">

                <label for="exampleInputEmail1" class="form-label">Email</label>
                <input type="email" class="form-control" placeholder="email">
            </div>

            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Messaggio</label>
                <textarea class="form-control" rows="3"></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Invia</button>
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
