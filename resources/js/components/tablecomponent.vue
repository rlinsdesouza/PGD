<template>
<div>
    <el-button @click="clearFilter">Remover todos os filtros</el-button>
    <el-table
     ref="filterTable"
    :data="tableData.filter(data => !search || data.name.toLowerCase().includes(search.toLowerCase()))"
    style="width: 100%">
    <el-table-column
      sortable  
      label="Date"
      prop="date"
      :filters="[{text: '2016-05-01', value: '2016-05-01'}, {text: '2016-05-02', value: '2016-05-02'}, {text: '2016-05-03', value: '2016-05-03'}, {text: '2016-05-04', value: '2016-05-04'}]"
      :filter-method="filterHandler">
    </el-table-column>
    <el-table-column
      label="Name"
      prop="name">
    </el-table-column>
    <el-table-column
      align="right">
      <template slot="header" slot-scope="scope">
        <el-input
          v-model="search"
          size="mini"
          placeholder="Pesquisar por nome"/>
      </template>
      <template slot-scope="scope">
        <el-button
          size="mini"
          @click="handleEdit(scope.$index, scope.row)">Editar</el-button>
        <el-button
          size="mini"
          type="danger"
          @click="handleDelete(scope.$index, scope.row)">Deletar</el-button>
      </template>
    </el-table-column>
  </el-table>
</div>
  
</template>

<script>
  export default {
    props: ['urlfetch'],
    // props: {
    //     url: String,
    // },
    data() {
      console.log(this.urlfetch)
      fetch(this.urlfetch)
        .then(res => res.json())
        .then(json => {
        console.log(json.toarray())
        // return json
      })
      return {
        tableData: [{
          date: '2016-05-03',
          name: 'Tom',
          address: 'No. 189, Grove St, Los Angeles'
        }, {
          date: '2016-05-02',
          name: 'John',
          address: 'No. 189, Grove St, Los Angeles'
        }, {
          date: '2016-05-04',
          name: 'Morgan',
          address: 'No. 189, Grove St, Los Angeles'
        }, {
          date: '2016-05-01',
          name: 'Jessy',
          address: 'No. 189, Grove St, Los Angeles'
        }],
        search: '',
      }
    },
    methods: {
      clearFilter() {
        this.$refs.filterTable.clearFilter();
      },  
      handleEdit(index, row) {
        console.log(index, row);
      },
      handleDelete(index, row) {
        console.log(index, row);
      },
      filterHandler(value, row, column) {
        const property = column['property'];
        return row[property] === value;
      },
    }
  }
</script>