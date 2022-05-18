<template>
  <span>
    <a
      v-if="showEdit"
      :href="route(baseRoute + '.show', createRouteParameters())"
    >
      <img src="/img/edit-solid.svg" alt="View/Edit" />
    </a>
    <a v-if="showDelete" @click="openDeleteModal">
      <img src="/img/trash-solid.svg" alt="Delete" />
    </a>

    <modal :show="deletingResource" @close="closeDeleteModal">
      <template #title> Delete this {{ resource }} </template>
      <template #content>
        <div>
          Are you sure?
          <button class="btn btn-danger" @click="deleteResource">Delete</button>
        </div>
      </template>
      <template #footer>
        <span class="btn-secondary btn" @click="closeDeleteModal">
          Cancel
        </span>
      </template>
    </modal>
  </span>
</template>

<script>
import Modal from "@/Layouts/Modal"
export default {
  name: "CrudItemControl",
  components: { Modal },
  props: {
    resource: {
      type: String,
      default: "",
      required: true,
    },
    resourceId: {
      type: Number,
      default: 0,
      required: true,
    },
    baseRoute: {
      type: String,
      default: "",
      required: true,
    },
    pathParams: {
      type: Object,
      default() {
        return {}
      },
    },
    showEdit: {
      type: Boolean,
      default: false,
    },
    showDelete: {
      type: Boolean,
      default: false,
    },
  },
  data() {
    return {
      deletingResource: false,
    }
  },
  methods: {
    openDeleteModal() {
      this.deletingResource = true
    },
    closeDeleteModal() {
      this.deletingResource = false
    },
    deleteResource() {
      this.closeDeleteModal()
      let params = {}
      params[this.resource] = this.resourceId
      Object.assign(params, this.pathParams)
      this.$inertia.delete(route(this.baseRoute + ".destroy", params))
    },
    createRouteParameters() {
      let params = {}
      params[this.resource] = this.resourceId
      Object.assign(params, this.pathParams)
      return params
    },
  },
}
</script>

<style scoped>
img {
  width: 20px;
  margin-right: 4px;
}
</style>
