<script>
    export default {
        name: 'AppFooter'
    }
</script>

<template>
  <footer class="d-flex justify-content-center pt-2">
    <p >
        Made with &hearts; by 
        <a href="https://github.com/RiccardoLoPresti" target="_blank">
            <i class="fa-brands fa-github"></i> Riccardo Lo Presti
        </a>
    </p>
  </footer>
</template>



<style lang="scss" scoped>

footer{
    height: 50px;
    background-color: black;
    color: white;
    a{
        color: white;
        text-decoration: none;

        &:hover{
            text-decoration: underline;

        }
    }
}
</style>