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
        <tr>
            <td>petsar13</td>
            <td>Kodėl Jūsų puslapis toks fainas?</td>
            <td><b-button @click="onAnswer" variant="dark">Atsakyti</b-button></td>
        </tr>
        <tr>
            <td>petsar13</td>
            <td>Kodėl Jūsų puslapis toks fainas?</td>
            <td><b-button @click="onAnswer" variant="dark">Atsakyti</b-button></td>
        </tr>
        <tr>
            <td>petsar13</td>
            <td>Kodėl Jūsų puslapis toks fainas?</td>
            <td><b-button @click="onAnswer" variant="dark">Atsakyti</b-button></td>
        </tr>
    </tbody>
      </table></div>
</template>

<script>
export default {
  name: 'Questions',
  methods: {
      onAnswer () {
          
      },
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