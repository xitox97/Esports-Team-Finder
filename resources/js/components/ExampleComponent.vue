<template>
  <div>
    <ul>
      <li v-for="tournament in tournaments" v-text="tournament"></li>
    </ul>
  </div>
</template>
<script>
export default {
  data() {
    return { tournaments: [] };
  },

  created() {
    axios
      .get("/tournamentss")
      .then(response => (this.tournaments = response.data));

    window.Echo.channel("tournaments").listen(
      "TournamentAdded",
      ({ tournament }) => {
        this.tournaments.push(tournament);
      }
    );
  }
};
</script>
