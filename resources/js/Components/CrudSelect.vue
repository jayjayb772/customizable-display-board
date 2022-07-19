<template>
  <label class="label">{{ label }}</label>

  <select
    v-if="options.length > 1"
    v-bind="$attrs"
    :value="modelValue"
    class="form-control"
    @input="$emit('update:modelValue', $event.target.value)"
  >
    <option v-for="option in options" :key="option" :value="option">
      {{ option }}
    </option>
  </select>
  <select
    v-else
    v-bind="$attrs"
    :value="modelValue"
    class="form-control"
    @input="$emit('update:modelValue', $event.target.value)"
  >
    <option
      v-for="option in optionsObject"
      :key="option.value"
      :value="option.value"
    >
      {{ option.name }}
    </option>
  </select>
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
    options: {
      type: Array,
      default() {
        return []
      },
    },
    optionsObject: {
      type: Object,
    },
  },
}
</script>

<style scoped>
.label {
  display: block;
  margin: 8px 0 4px 2px;
}
select {
  width: 100%;
}
</style>
