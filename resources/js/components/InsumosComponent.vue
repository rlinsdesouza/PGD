<template>
    <div class="panel panel-default">
        <div style="display:flex;justify-content:space-between;align-items:center;"> 
            <span>
                Insumos
            </span>
            <a class="action-link">
                Novo insumo
            </a>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>

<style scoped>
    .action-link{
        cursor:pointer;
    }

    .m-b-none {
        margin-bottom:0;
    }
    
</style>