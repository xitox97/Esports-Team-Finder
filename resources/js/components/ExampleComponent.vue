<template>
  <div>
    <p v-for="noti in notifications" v-text="noti"></p>
  </div>
</template>
<script>
export default {
  data() {
    return {
      notifications: []
    };
  },

  created() {
    // axios
    //   .get("/tournamentss")
    //   .then(response => (this.tournaments = response.data));
    //this.tournament = "la";

    // window.Echo.channel("tournaments").listen(
    //   "TournamentAdded",
    //   ({ tournament }) => {
    //     this.tournaments.push(tournament);
    //   }
    // );

    var userId = $('meta[name="userId"]').attr("content");
    Echo.private("App.User." + userId).notification(notification => {
      this.notifications.push(notification);
      console.log(notification);
    });
  }
};
</script>
