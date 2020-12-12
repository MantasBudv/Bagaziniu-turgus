<template>
  <div class="questions">
  

      <table class="table table-striped table-hover align-middle">
    <thead>
        <tr>
        <th scope="col">Vartotojas</th>
        <th scope="col">Klausimas</th>
        <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
        <tr v-for="(question,index) in questions" :key="index">
            <td>{{question.username}}</td>
            <td>{{question.message}}</td>
            <td><b-button @click="onAnswer(question.id)" variant="dark">Atsakyti</b-button></td>
        </tr>
    </tbody>
      </table></div>
</template>

<script>
export default {
  name: 'Questions',
  data() {
      return{
          questions:[]
      }
  },
  methods: {
      onAnswer(id) {
          axios.post("/support/request/answer", {'id':id}).then((res)=>{
            const index = this.questions.findIndex(item => item.id === id)
            this.questions.splice(index, 1)
          })
      },
  },
  mounted() {
      axios.get("/support/request").then((res)=>{
          this.questions=res.data
      })
  }
}
</script>

<style lang='scss' scoped>
.questions {
    display: flex;
    flex-direction: column;
    padding: 1.5em;
    max-width: 900px;
    background-color: #fff;
    border-radius: 10px;
    margin: 5em auto 0 auto;
}
.row {
    display: flex;
    flex-direction: row;
    p {
        width: 40%;
    }
}
.names {
    font-size: 1.2em;
}
</style>