<template>
    <div class="panel-body">
        <p class="m-b-nome" v-if="insumos.length===0">
        Você não tem nenhum insumo cadastrado.
        </p>
        <table class="table table-borderless m-b-none" v-if="insumos.length >0">
            <thead>
                <tr>
                    <th style="vertical-align: midle;">Id</th>
                    <th style="vertical-align: midle;">Nome</th>
                    <th style="vertical-align: midle;">Glúten</th>
                    <th style="vertical-align: midle;">Lactose</th>

                </tr>
            </thead>
            <tbody>
                <tr v-for="insumo in insumos">
                    <th style="vertical-align: midle;">{{insumo.id}}</th>
                    <th style="vertical-align: midle;">{{insumo.nome}}</th>
                    <th style="vertical-align: midle;">{{insumo.gluten}}</th>
                    <th style="vertical-align: midle;">{{insumo.lactose}}</th>
                </tr>
            </tbody>
        </table>

    </div>
</template>

<script>
    export default {
        data () {
            return {
                insumos: []
            }
        },
        mounted() {
            console.log('Component mounted.');
            this.getInsumos();
        },
        methods: {
            getInsumos () {
                axios.get('insumos/listar')
                .then(response=> {
                    this.insumos = response.data;
                })
            }
        },
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