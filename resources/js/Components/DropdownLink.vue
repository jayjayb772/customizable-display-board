<template>
  <div>
    <button
      v-if="as == 'button'"
      :id="option"
      type="submit"
      class="dropdown-option"
    >
      <slot></slot>
    </button>

    <inertia-link v-else :id="option" :href="href" class="dropdown-option">
      <slot></slot>
    </inertia-link>
  </div>
</template>
<script>
export default {
  props: ["href", "as", "option"],
}
</script>

<style scoped>
.dropdown-option {
  border: none;
  background-color: rgba(76, 76, 76, 0.9);
  opacity: 0.9;
  font-family: Poppins;
  font-size: 16px;
  font-weight: normal;
  font-stretch: normal;
  font-style: normal;
  letter-spacing: normal;
  text-align: left;
  color: rgba(255, 255, 255, 0.9);
  text-overflow: ellipsis;
  white-space: nowrap;
  width: max-content;
  display: flex;
}

.dropdown-option:hover {
  background-color: rgba(187, 185, 185, 0.9);
  width: 100%;
  text-decoration: none;
  text-underline: none;
  color: white;
}
</style>
