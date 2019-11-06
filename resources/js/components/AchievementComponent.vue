<template>
  <modal name="achievement" height="auto">
    <p>achievement</p>
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
      },
      name: String
    };
  },
  created() {},
  methods: {
    beforeOpen(event) {
      this.form.recipients = event.params.user[0].id;
      this.name = event.params.user[1].name;
      console.log(event.params.user[1].name);
    },
    submit() {
      axios.post("/messages", this.form).then(response => {
        alert("Succesfully send");
        //console.log(response.data);
        location = response.data.message;
      });
    }
  }
};
</script>

