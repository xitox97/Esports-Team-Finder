<template>
  <div>
    <ul>
      <p v-for="tournament in tournaments" v-text="tournament"></p>
    </ul>
  </div>
</template>
<script>
export default {
  data() {
    return { tournaments: [] };
  },

  created() {
    // axios
    //   .get("/tournamentss")
    //   .then(response => (this.tournament = response.data));
    //this.tournament = "la";

    window.Echo.channel("tournaments").listen(
      "TournamentAdded",
      ({ tournament }) => {
        this.tournaments.push(tournament.name);
      }
    );
  }
};
</script>
