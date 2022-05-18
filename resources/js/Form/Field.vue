<template>
  <fieldset :form="formId">
    <template v-if="field.type == 'radio' || field.type == 'checkbox'">
      <div class="custom-control">
        <input
          :id="field.name + '-' + field.value"
          v-model="formField"
          :name="field.name"
          :type="field.type"
          :value="field.value"
          @change="updateField"
        />
        <span v-if="field.type == 'radio'" class="radio-control"></span>
        <span v-if="field.type == 'checkbox'" class="toggle-control"
          ><span class="toggle"></span
        ></span>
        <label
          class="custom-control-label"
          :for="field.name + '-' + field.value"
        >
          {{ field.label }}
        </label>
      </div>
    </template>
    <template
      v-if="
        field.type == 'text' ||
        field.type == 'email' ||
        field.type == 'date' ||
        field.type == 'datetime-local'
      "
    >
      <div class="form-group">
        <label :for="field.name">
          <span>{{ field.label }}: </span>
          <input
            v-model="formField"
            class="form-control"
            :name="field.name"
            :type="field.type"
            :readonly="field.readonly"
            @change="updateField"
          />
        </label>
      </div>
    </template>
    <template v-if="field.type == 'textarea'">
      <div class="form-group">
        <label :for="field.name">
          <span>{{ field.label }}: </span>
          <textarea
            v-model="formField"
            class="form-control"
            :name="field.name"
            :readonly="field.readonly"
            @change="updateField"
          ></textarea>
        </label>
      </div>
    </template>
    <template v-if="field.type == 'fieldset'">
      <span
        class="fieldset-options-toggle"
        @click="showFieldList = !showFieldList"
      >
        <img
          v-if="showFieldList"
          class="cursor-pointer icon-small img-fluid"
          src="/img/minus-circle-solid.svg"
        />
        <img
          v-else
          class="cursor-pointer icon-small img-fluid"
          src="/img/plus-circle-solid.svg"
        />
        <legend class="fieldset-legend">{{ field.legend }}</legend>
      </span>
      <div
        v-for="option in field.fieldset"
        v-show="showFieldList"
        :key="option.name"
        class="custom-control"
      >
        <template v-if="option.name == 'all'">
          <input
            :id="field.name + '-all-options'"
            v-model="selectAll"
            type="checkbox"
          />
          <span class="toggle-control"><span class="toggle"></span></span>
          <label
            class="custom-control-label"
            :for="field.name + '-all-options'"
          >
            {{ option.label }}
          </label>
        </template>
        <template v-else>
          <div>
            <input
              :id="field.name + '-' + option.name"
              v-model="formField"
              :name="option.name"
              :type="option.type"
              :value="option.name"
              @change="updateField"
            />
            <span v-if="option.type == 'radio'" class="radio-control"></span>
            <span v-if="option.type == 'checkbox'" class="toggle-control"
              ><span class="toggle"></span
            ></span>
            <label
              class="custom-control-label"
              :for="field.name + '-' + option.name"
            >
              {{ option.label }}
            </label>
          </div>
        </template>
      </div>
    </template>
    <template v-if="form.errors[field.name]">
      <div class="invalid-feedback">{{ form.errors[field.name] }}</div>
    </template>
  </fieldset>
</template>

<script>
export default {
  props: {
    field: { type: Object, required: true },
    form: { type: Object, required: true },
    formId: { type: String, required: true },
  },
  emits: ["update:modelValue"],
  data() {
    return {
      formField: this.form[this.field.name],
      showFieldList: true,
    }
  },
  computed: {
    selectAll: {
      get: function () {
        return this.field.fieldset
          ? this.formField.length == this.field.fieldset.length - 1
          : false
      },
      set: function (value) {
        this.formField = []
        if (value) {
          this.formField = this.field.fieldset
            .map((field) => field.name)
            .filter((name) => name !== "all")
        }
        this.$emit("update:modelValue", this.formField)
      },
    },
  },
  methods: {
    updateField(event) {
      if (event.target.type == "checkbox") {
        this.formField[event.target.name] = event.target.value
      } else {
        this.formField = event.target.value
      }
      this.$emit("update:modelValue", this.formField)
    },
  },
}
</script>

<style scoped>
.fieldset-options-toggle {
  display: flex;
}
.fieldset-legend {
  margin-bottom: 0;
  margin-left: 8px;
}
.cursor-pointer {
  cursor: pointer;
}
.icon-small {
  height: 18px;
  position: relative;
  top: 10px;
  width: 18px;
}
</style>
