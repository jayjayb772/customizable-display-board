<template>
  <div
    class="custom-radio-container"
    @click="updateOption"
    :class="{ 'selected-container': isChecked }"
  >
    <div
      class="corner-container float-right"
      :class="{ 'selected-corner-container': isChecked }"
    ></div>
    <img v-show="isChecked" class="selected-icon" src="/img/check-solid.svg" />
    <div class="image-container">
      <img class="option-image icon" :src="imageSource" />
    </div>

    <label class="path-label" :class="{ 'selected-label': isChecked }">
      {{ label }}
    </label>
  </div>
</template>

<script>
export default {
  props: {
    label: {
      type: String,
      default: "",
    },
    radioValue: {
      type: String,
    },
    imageSource: {
      type: String,
    },
    modelValue: {
      type: [String],
      default: "",
    },
  },
  computed: {
    isChecked() {
      return this.modelValue === this.radioValue
    },
  },
  methods: {
    updateOption() {
      this.$emit("update:modelValue", this.radioValue)
    },
  },
}
</script>

<style scoped lang="scss">
@import "resources/scss/variables.scss";
.custom-radio-container {
  margin: 10px;
  outline: $gray-600 solid 1px;
  border-radius: 2px;

  text-align: center;
  height: fit-content;
}
.selected-container {
  background-color: $primary;
  border-radius: 2px;
  color: white !important;
  outline: $primary solid 3px !important;
  position: relative;
  overflow: hidden;
}
.path-label {
  color: $gray-600 !important;
}
.selected-label {
  color: white !important;
}
.image-container {
  width: auto;
  height: 90%;
  background-color: white;
  display: block;
  align-content: center;
  align-self: center;
  margin: auto;
  padding-bottom: 40px;
  padding-top: 40px;
}
.option-img {
  margin: 16px;
  width: 64px;
  height: 64px;
}
.icon {
  width: 64px;
  height: 64px;
}
.selected-icon {
  right: 5px;
  float: right;
  top: 5px;
  height: 16px;
  position: relative;
}
.corner-container:after {
  content: "";
  position: absolute;
  margin: -30px;
  width: 60px;
  height: 60px;
  transform: rotate(45deg);
}
.selected-corner-container:after {
  content: "";
  position: absolute;
  margin: -30px;
  width: 60px;
  height: 60px;
  transform: rotate(45deg);
  background-color: $primary;
  //box-shadow: 0 0 0 250px rgba(0,0,0,0);
}
</style>
