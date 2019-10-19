<template>
  <div>
    <transition name="fade">
      <div class="bg-white rounded-lg shadow-lg flex flex-col items-center" v-if="chat == true">
        <div class="p-3">
          <img :src="'/img/default.png'" class="w-48" v-if="acc == ''" />
          <img :src="acc" class="w-48 rounded-full" v-else />
        </div>
        <div class="p-3 text-center">
          <p class="text-xl text-gray-700 font-semibold">{{usersend}}</p>
          <p class="text-md text-gray-600 font-semibold mb-6 capitalize">Subject: {{thread.subject}}</p>
          <a
            :href="'/messages/'+ thread.id"
            class="bg-indigo-600 hover:bg-indigo-500 text-white text-lg font-bold py-2 px-4 rounded-lg shadow-lg mt-2"
          >New Reply</a>
        </div>
      </div>
    </transition>
  </div>
</template>
<script>
export default {
  props: ["thread", "usersend", "acc", "chat"]
};
</script>
<style>
.fade-enter-active {
  transition: opacity 0.5s;
}
.fade-enter, .fade-leave-to /* .fade-leave-active below version 2.1.8 */ {
  opacity: 0;
}
</style>
