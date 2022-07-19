<template>
  <div class="vertical board-container" v-if="rotation == 90">Vertical</div>
  <div class="horizontal board-container" v-if="rotation == 0">
    <div class="horizontal">Horizontal</div>
  </div>
</template>

<script>
export default {
  name: "BoardPreview",
  props: {
    width: {
      type: Number,
      required: true,
    },
    height: {
      type: Number,
      required: true,
    },
    rotation: {
      type: Number,
      required: true,
    },
    board_tiles: {
      type: Object,
      required: true,
    },
  },
}
</script>

<style scoped>
.board-container {
  border: 1px solid black;
}
.horizontal {
  height: 100%;
  width: 56%;
}
.vertical {
  height: 56%;
  width: 100%;
}
</style>
