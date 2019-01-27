<template>
    <div>
        <el-rate
        v-model="value"
        :texts="['Péssimo', 'Ruim', 'Bom', 'Muito bom', 'Perfeito']"
        show-text>
        </el-rate>  
        <input type="hidden" :name="name" v-model="value">
    </div>
</template>


<script>
  export default {
    props: ['name'],
    data() {
      return {
        name: this.name,  
        value: null
      }
    }
  }
</script>