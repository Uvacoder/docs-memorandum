<template>
  <transition name="fade">
    <div
      v-if="displayBackToTop"
      class="
        fixed
        z-50
        bottom-0
        right-0
        p-2
        mb-5
        mr-5
        transition-colors
        duration-100
        bg-gray-600 bg-opacity-50
        rounded-md
        shadow-md
        cursor-pointer
        md:p-3
        hover:bg-gray-500
        group
      "
      @click="scrollToTop"
    >
      <span class="icon">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
          <path
            d="M240.971 130.524l194.343 194.343c9.373 9.373 9.373 24.569 0 33.941l-22.667 22.667c-9.357 9.357-24.522 9.375-33.901.04L224 227.495 69.255 381.516c-9.379 9.335-24.544 9.317-33.901-.04l-22.667-22.667c-9.373-9.373-9.373-24.569 0-33.941L207.03 130.525c9.372-9.373 24.568-9.373 33.941-.001z"
          />
        </svg>
      </span>
    </div>
  </transition>
</template>

<script>
export default {
  name: 'AppBackToTop',
  data() {
    return {
      displayBackToTop: false,
    }
  },
  beforeMount() {
    window.addEventListener('scroll', this.handleScroll)
  },
  beforeDestroy() {
    window.removeEventListener('scroll', this.handleScroll)
  },
  methods: {
    scrollToTop() {
      return window.scrollTo({ top: 0, behavior: 'smooth' })
    },
    handleScroll() {
      if (window.scrollY > 150) {
        this.displayBackToTop = true
      } else {
        this.displayBackToTop = false
      }
    },
  },
}
</script>

<style lang="postcss" scoped>
.icon::v-deep svg {
  @apply w-5 h-5 text-gray-400 transition-colors duration-100 fill-current group-hover:text-gray-600;
}
</style>
