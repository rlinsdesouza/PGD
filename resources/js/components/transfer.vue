<template>
  <div style="conteiner">
    <el-transfer
      style="text-align: left; display: inline-block"
      v-model="value"
      filterable
      :left-default-checked="[2, 3]"
      :right-default-checked="[1]"
      :titles="['Todos os itens', 'Itens que compõem']"
      :button-texts="['Remover', 'Adicionar']"
      :format="{
        noChecked: '${total}',
        hasChecked: '${checked}/${total}'
      }"
      @change="handleChange"
      :data="data">
    </el-transfer>
    <input type="hidden" name="transfer" v-model="value">
  </div>
</template>

<style>
  .transfer-footer {
    margin-left: 20px;
    padding: 6px 5px;
  }
</style>

<script>
  export default {
    props: ['url','selecionados'],
    data() {
      return {
        data: [],
        value: [],
      };
    },
    mounted() {
      this.generateData()
    },
    methods: {
      generateData () {
        let dataselecionado =[];
        for (let i = 0; i<this.selecionados.length; i++) {
          dataselecionado.push(this.selecionados[i].id);
        }
        this.value = dataselecionado

        const dadosapi = axios.get(this.url).then (response=>{
          const dataentry = [];
          for (let i = 0; i<response.data.length; i++) {
            dataentry.push({
              key: response.data[i].id,
              label: response.data[i].nome,
            });
          }          
        this.data = dataentry
        });
      },
      handleChange(value, direction, movedKeys) {
        console.log(value, direction, movedKeys);
      }
    }
  };
</script>