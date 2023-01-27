<script>

import ProjectCard from '../ProjectsCard.vue'

    export default {
        name:'Home',
        components:{
            ProjectCard
        },
    }
</script>

<template>

    <main>

        <div class="container d-flex justify-content-center">
            <div class="row box-custom ">
                <h2 class="fs-1 mb-5 text-end">
                &lt; HELLO WORD! /&gt; <br>
            </h2>
            <h1 > I'm <strong>Riccardo Lo Presti</strong>  <br>
                a Jr.Full Stack Developer!</h1>
            </div>

        </div>

    </main>

</template>


<style lang="scss" scoped>
main {
	background: linear-gradient(-45deg, #ee7752, #e73c7e, #23a6d5, #23d5ab);
	background-size: 400% 400%;
	animation: gradient 15s ease infinite;
	height:calc(100vh - 75px - 50px) ;
    margin-top: 75px;
}

@keyframes gradient {
	0% {
		background-position: 0% 50%;
	}
	50% {
		background-position: 100% 50%;
	}
	100% {
		background-position: 0% 50%;
	}
}

.box-custom{
    box-shadow: inset 0 0px 10px 10px #0000002e;
    background-color: whitesmoke ;
    border-radius: 15px;
    margin-top: 100px;
    padding: 150px 50px;
}
</style>
