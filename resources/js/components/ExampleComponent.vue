<template>
  <div>
    <!-- <ul v-for="tournament in tournaments">
      <p class="text-indigo-500">{{tournament.name}}</p>
      <p class="text-indigo-500">{{tournament.venue}}</p>
      <p class="text-indigo-500">{{tournament.state}}</p>
    </ul>-->

    <div
      v-for="tournament in tournaments"
      class="max-w-xs rounded overflow-hidden shadow-lg mx-2 mb-2 mt-2 bg-white hover:bg-gray-100"
    >
      <div>
        <img class="w-full" :src="'/storage/tour/' + tournament.image" alt />
      </div>
      <div class="px-6 py-4 text-center">
        <div class="font-bold text-xl">{{ tournament.name }}</div>
        <p class="font-medium text-md mb-2">Prize Pool: RM {{ tournament.prizepool }}</p>
        <p class="text-gray-700 text-base">
          <span class="font-medium capitalize">Organizer:</span>
          {{ tournament.organizer }}
        </p>
        <p class="text-gray-700 text-base">
          <span class="font-medium capitalize">Date:</span>
          {{ tournament.start_date }} until {{ tournament.end_date }}
        </p>
        <p class="text-gray-700 text-base">
          <span class="font-medium capitalize">venue:</span>
          {{ tournament.venue }}
        </p>
        <p class="text-gray-700 text-base">
          <span class="font-medium capitalize">State:</span>
          {{ tournament.state }}
        </p>

        <p class="text-gray-700 text-base" v-if="tournament.status == 1">
          <span class="font-medium capitalize">Status:</span> Ended
        </p>
        <p class="text-gray-700 text-base" v-if="tournament.status != 1">
          <span class="font-medium capitalize">Status:</span> Upcoming
        </p>
      </div>
      <!-- <p v-for="user in tournament.users">{{user.name}}</p> -->

      <div class="text-center pb-3 -mt-3">
        <a
          :href="'/tournaments/interested/' + tournament.id"
          class="inline-block bg-green-500 rounded-full px-3 py-1 text-md font-semibold text-white mt-3 text-center hover:bg-green-600"
        >Interested</a>

        <!-- @php
                            $check = false;
                            foreach ($tour->users as $user) {
                                if($user->id == Auth::user()->id)
                                {
                                    $check = true;
                                    break;
                                }
                            }
                        @endphp
                        <div class="text-center pb-3 -mt-3">

                        @if($check)
                            <a href="/tournaments/notInterested/{{ $tour->id }}" class="inline-block bg-red-500 rounded-full
                                px-3 py-1 text-md font-semibold text-white mt-3 text-center hover:bg-red-600">Cancel</a>
                        @else
                        <a href="/tournaments/interested/{{ $tour->id }}" class="inline-block bg-green-500 rounded-full px-3 py-1
                            text-md font-semibold text-white mt-3 text-center hover:bg-green-600">Interested</a>
        @endif-->
      </div>
    </div>
  </div>
</template>
<script>
export default {
  data() {
    return {
      tournaments: [],
      check: false
    };
  },

  created() {
    // axios
    //   .get("/tournamentss")
    //   .then(response => (this.tournaments = response.data));
    //this.tournament = "la";

    window.Echo.channel("tournaments").listen(
      "TournamentAdded",
      ({ tournament }) => {
        this.tournaments.push(tournament);
      }
    );
  }
};
</script>
