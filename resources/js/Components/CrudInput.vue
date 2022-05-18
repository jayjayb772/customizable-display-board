<template>
  <label class="label">{{ label }}</label>
  <input
    v-bind="$attrs"
    :placeholder="label"
    :value="modelValue"
    class="form-control"
    @input="$emit('update:modelValue', $event.target.value)"
  />
</template>

<script>
export default {
  props: {
    label: {
      type: String,
      default: "",
    },
    modelValue: {
      type: [String, Number],
      default: "",
    },
  },
}
</script>

<style scoped>
.label {
  display: block;
  margin: 8px 0 4px 2px;
}
</style>
