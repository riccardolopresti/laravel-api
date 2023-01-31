<script>
import axios from 'axios';
import {store} from './store.js';

export default {
    name:'ContactForm',
    data(){
        return{
            store,
            name:'',
            email:'',
            message:'',
            errors:{},
            isLoading:false,
            formShow:true
        }
    },
    methods:{
        sendForm(){
            this.isLoading=true;
            const data = {
                name : this.name,
                email : this.email,
                message : this.message,
            }
            //console.log(data);

            axios.post('http://127.0.0.1:8000/api/contacts', data)
            .then(result=>{
                this.isLoading=false;
                this.formShow=false;
                if(!result.data.success){
                    this.errors = result.data.errors;
                }else{
                    this.name='';
                    this.email='';
                    this.message='';
                    this.errors={};
                }
            });

        }
    }
}
</script>

<template>
<div class="container mt-5">
    <div class="wrapper rounded-4 py-3">
        <form v-if="formShow" class="w-50 text-start text-black" @submit.prevent="sendForm()">

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nome</label>
                <input v-model.trim="name" type="text" class="form-control" :class="{'is-invalid' : errors.name}" placeholder="nome">
                <p class="invalid-feedback" v-for="error in errors.name" :key="error">{{ error }}</p>
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email</label>
                <input v-model.trim="email" type="email" class="form-control" :class="{'is-invalid' : errors.email}"  placeholder="email">
                <p class="invalid-feedback" v-for="error in errors.email" :key="error">{{ error }}</p>
            </div>

            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Messaggio</label>
                <textarea v-model.trim="message" class="form-control" :class="{'is-invalid' : errors.message}"  rows="3"></textarea>
                <p class="invalid-feedback" v-for="error in errors.message" :key="error">{{ error }}</p>
            </div>

            <button  type="submit" class="btn btn-primary" :disabled="isLoading">{{ isLoading ? 'Invio in corso...' : 'Invia'}}</button>
        </form>

        <h3 class="text-black" v-else>Email mandata con successo!</h3>
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
