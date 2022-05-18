<template>
  <div class="relative">
    <div @click="open = !open">
      <slot name="trigger"></slot>
    </div>

    <!-- Full Screen Dropdown Overlay -->
    <div v-show="open" style="display: none" @click="open = false">
      <div class="dropdown-content">
        <slot name="content"></slot>
      </div>
    </div>
  </div>
</template>

<script>
import { onMounted, onUnmounted, ref } from "vue"

export default {
  props: {
    align: {
      default: "right",
    },
    width: {
      default: "48",
    },
    contentClasses: {
      default: () => ["py-1", "bg-white"],
    },
  },

  setup() {
    let open = ref(false)

    const closeOnEscape = (e) => {
      if (open.value && e.keyCode === 27) {
        open.value = false
      }
    }

    onMounted(() => document.addEventListener("keydown", closeOnEscape))
    onUnmounted(() => document.removeEventListener("keydown", closeOnEscape))

    return {
      open,
    }
  },
}
</script>

<style scoped>
.dropdown-content {
  overflow: auto;
  height: auto;
  max-height: 300px;
  margin-top: -4px;
  border: solid 1px #474e5b;
  font-family: Poppins;
  font-size: 16px;
  text-align: left;
  color: rgba(255, 255, 255, 0.9);
  width: 80%;
  background-color: rgba(76, 76, 76, 0.9);
}
</style>
