<template>
  <div class="questions">
    <div class="row names">
        <p>Vartotojas</p>
        <p>Klausimas</p>
        <p></p>
    </div>
    <div class="row">
        <p>petsar13</p>
        <p>Kodėl Jūsų puslapis toks fainas?</p> 
        <b-button @click="onAnswer" variant="dark">Atsakyti</b-button>
    </div>
  </div>
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
        padding: 0.5em;
    }
}
.names {
    font-size: 1.2em;
}
</style>