<template>
  <modal name="hello-world" height="auto">
    <div class="rounded-lg py-4">
      <p class="text-left font-bold text-2xl px-4 mb-3">Sending New Message to Farhan</p>
      <form @submit.prevent="submit" class="border-t-2">
        <div class="p-4">
          <p class="font-medium text-lg">Subject:</p>
          <input
            type="text"
            class="bg-white focus:outline-none focus:shadow-outline border border-gray-300 rounded-lg py-2 px-4 block w-full appearance-none leading-normal"
            name="subject"
            placeholder="Subject"
            v-model="form.subject"
          />
          <p class="font-medium text-lg mt-4">Message:</p>
          <textarea
            name="message"
            class="bg-white focus:outline-none focus:shadow-outline border border-gray-300 rounded-lg py-2 px-4 block w-full appearance-none leading-normal resize-none"
            placeholder="Enter your message.."
            v-model="form.message"
          ></textarea>

          <input type="text" name="recipients" value="7" hidden v-model="form.recipients" />

          <!-- Submit Form Input -->
          <div class="flex justify-center mt-4">
            <button
              type="submit"
              class="bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-4 rounded mr-2"
              @click.prevent="$modal.hide('hello-world')"
            >Cancel</button>
            <button
              type="submit"
              class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded"
            >Submit</button>
          </div>
        </div>
      </form>
    </div>
  </modal>
</template>
<script>
export default {
  data() {
    return {
      form: {
        subject: "",
        message: "",
        recipients: ""
      }
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
        this.$notify({
          group: "app",
          title: "<h1><b>Alert!</b></h1>",
          text: "<h2>New Tournament has been added</h2>",
          type: "success",
          speed: 1500,
          closeOnClick: true
        });
      }
    );
  },
  methods: {}
};
</script>

