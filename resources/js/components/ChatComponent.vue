<template>
  <div></div>
</template>
<script>
export default {
  data() {
    return { thread: [] };
  },

  props: {
    threadid: []
  },

  created() {
    axios
      .get("/tournamentss")
      .then(response => (this.tournaments = response.data));
    this.tournament = "la";
  }
};
</script>
