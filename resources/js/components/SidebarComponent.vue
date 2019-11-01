<template>
  <transition name="fade">
    <aside v-if="isOpen">
      <div class="flex flex-col h-full items-center">
        <header class="h-24 flex items-center border-b border-indigo-700 py-5">
          <img
            v-on:click="home"
            class="w-7/12 mx-auto mt-3 cursor-pointer"
            src="https://fontmeme.com/permalink/190926/504d6783995232cf36f03478b4e00769.png"
            alt="netflix-font"
            border="0"
          />
        </header>
        <section class="h-full flex flex-col items-start">
          <slot></slot>
        </section>
        <div>
          <div
            class="flex justify-center items-center py-6 pr-6 cursor-pointer border-t border-indigo-700"
          >
            <i class="material-icons mr-3 align-middle font-semibold text-white">power_settings_new</i>
            <a
              class="font-semibold text-white text-xl align-middle"
              href="/logout"
              onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
            >log out</a>
            <form id="logout-form" action="/logout" method="POST" style="display: none;">
              <input type="hidden" name="_token" :value="csrf" />
            </form>
          </div>
        </div>
      </div>
    </aside>
  </transition>
</template>

<script>
export default {
  data() {
    return {
      csrf: document
        .querySelector('meta[name="csrf-token"]')
        .getAttribute("content")
    };
  },
  props: {
    isOpen: Boolean,
    user: Object
  },

  methods: {
    home() {
      window.location.href = "/";
    },
    submit() {
      this.$refs.form.submit();
    }
  }
};
</script>
<style>
.fade-enter-active,
.fade-leave-active {
  transition: transform 0.2s ease;
}
.fade-enter, .fade-leave-to /* .fade-leave-active below version 2.1.8 */ {
  transform: translateX(-100%);
  transition: all 150ms ease-in 0s;
}
</style>
