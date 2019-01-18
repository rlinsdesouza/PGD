<template>
  <div style="conteiner">
    <el-transfer
      style="text-align: left; display: inline-block"
      v-model="value"
      filterable
      :left-default-checked="[2, 3]"
      :right-default-checked="[1]"
      :titles="['Todos os pratos', 'Pratos produzidos']"
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
    props: ['url'],
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
        const dadosapi = axios.get(this.url).then (response=>{
          console.log(response);
          const dataentry = [];
        
          for (let i = 0; i<response.data.length; i++) {
            dataentry.push({
              key: i,
              label: response.data[i].nome,
            });
          }
          
        this.data = dataentry
        console.log(dataentry);
        });
      },
      handleChange(value, direction, movedKeys) {
        console.log(value, direction, movedKeys);
      }
    }
  };
</script>