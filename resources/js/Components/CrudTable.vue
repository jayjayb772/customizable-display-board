<template>
  <label class="label">{{ label }}</label>
  <table>
    <tr>
      <th v-for="columnName in columnHeaders" :key="columnName" class="">
        {{ columnName }}
      </th>
      <th v-if="showControls">Manage</th>
    </tr>
    <tr v-for="row in rowValues" :key="row">
      <td v-for="attributeName in attributes" :key="row[attributeName]">
        {{ row[attributeName] }}
      </td>
      <td v-if="showControls">
        <CrudItemControl
          :base-route="manageBasePath"
          :resource="manageResource"
          :resource-id="row['id']"
          :show-delete="showDelete"
          :show-edit="showEdit"
          :path-params="pathParams"
        />
      </td>
    </tr>
  </table>
</template>

<script>
import CrudItemControl from "./CrudItemControl"
export default {
  name: "CrudTable",
  components: { CrudItemControl },
  props: {
    columnHeaders: {
      type: Array,
      default() {
        return []
      },
    },
    attributes: {
      type: Array,
      default() {
        return []
      },
    },
    rowValues: {
      type: Array,
      default() {
        return []
      },
    },
    label: {
      type: String,
      default: "",
    },
    showControls: {
      type: Boolean,
      default: false,
    },
    showDelete: {
      type: Boolean,
      default: false,
    },
    showEdit: {
      type: Boolean,
      default: false,
    },
    manageResource: {
      type: String,
      default: "",
    },
    manageBasePath: {
      type: String,
      default: "",
    },
    pathParams: {
      type: Object,
    },
  },
}
</script>

<style scoped lang="scss">
@import "resources/scss/variables.scss";
table {
  width: 100%;
  border-collapse: separate;
  border: solid $gray-700 1px;
  border-radius: 6px;
  table-layout: fixed;
  background-color: $gray-200;
}

td,
th {
  border-left: solid $gray-700 1px;
  border-top: solid $gray-700 1px;
  text-align: center;
}

th {
  background-color: $gray-200;
  border-top: none;
}
td {
  background-color: $gray-200;
}

td:first-child,
th:first-child {
  border-left: none;
}

.label {
  display: block;
  margin: 8px 0 4px 2px;
}
</style>
