<template>
  <transition name="slide">
    <aside v-if="isOpen">
      <div class="flex flex-col h-full items-center">
        <header
          class="h-24 flex items-center border-b border-indigo-700 py-5 w-full justify-center"
        >
          <a
            class="text-2xl font-bold text-white font-mono tracking-wider"
            href="/"
          >&lt;DOTAHUNT/&gt;</a>
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
.slide-enter-active,
.slide-leave-active {
  transition: transform 0.2s ease;
}

.slide-enter,
.slide-leave-to {
  transform: translateX(-100%);
  transition: all 150ms ease-in 0s;
}
</style>
