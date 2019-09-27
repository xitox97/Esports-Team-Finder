<template>
  <aside class="w-2/12 flex flex-col bg-indigo-800">
    <header class="h-24 flex items-center border-b border-indigo-700 py-5">
      <img
        class="w-7/12 mx-auto mt-3"
        src="https://fontmeme.com/permalink/190926/504d6783995232cf36f03478b4e00769.png"
        alt="netflix-font"
        border="0"
      />
      <button @click="toggle" type="button">test</button>
    </header>
    <section v-show="isOpen" class="h-full flex flex-col">
      <a href="#" class="text-lg font-semibold mb-10 mt-12 ml-16 text-purple-400">
        <i class="material-icons align-middle">assessment</i>
        <span class="align-middle ml-2">Overview</span>
      </a>
      <a href="#" class="text-lg font-semibold mb-10 ml-16 text-white">
        <i class="material-icons align-middle">emoji_events</i>
        <span class="align-middle ml-2">Achievements</span>
      </a>
      <a href="#" class="text-lg font-semibold mb-10 ml-16 text-purple-400">
        <i class="material-icons align-middle">videogame_asset</i>
        <span class="align-middle ml-2">Tournaments</span>
      </a>
      <a href="#" class="text-lg font-semibold mb-10 ml-16 text-purple-400">
        <i class="material-icons align-middle">group</i>
        <span class="align-middle ml-2">Teams</span>
      </a>
      <a href="#" class="text-lg font-semibold mb-10 ml-16 text-purple-400">
        <i class="material-icons align-middle">sports_kabaddi</i>
        <span class="align-middle ml-2">Scrims</span>
      </a>
    </section>
    <div
      class="flex justify-center items-center py-6 pr-6 cursor-pointer bg-purple-800 border-t border-indigo-700"
    >
      <i class="material-icons mr-3 align-middle font-semibold text-white">power_settings_new</i>
      <span class="font-semibold text-white text-xl align-middle">log out</span>
    </div>
  </aside>
</template>

<script>
export default {
  props: [],
  data() {
    return {
      isOpen: false
    };
  },
  methods: {
    toggle() {
      this.isOpen = !this.isOpen;
    }
  }
};
</script>
