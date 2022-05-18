<template>
    <form class="container" @submit.prevent="createVendor">
        <h3 class="form-title">Add a vendor to your Vendor Risk Register</h3>
        <div class="row">
            <div class="form-line col-3">
                <CrudInput
                    id="boardName"
                    v-model="form.name"
                    type="text"
                    label="Board Name"
                />
                <CrudSelect
                    id="rotation"
                    v-model="form.rotation"
                    label="Financial Impact"
                    :options="['Horizontal', 'Vertical']"
                />
            </div>
            <div class="form-line col-3">
                <CrudInput
                    id="width"
                    v-model="form.width"
                    type="text"
                    label="width"
                />
                <CrudInput
                    id="description"
                    v-model="form.height"
                    type="text"
                    label="height"
                />
            </div>
        </div>
        <div class="row mt-2">
            <div class="col">
                <jet-input-error
                    v-for="error in form.errors"
                    :key="error"
                    :message="error"
                />
                <button
                    class="btn btn-primary"
                    :class="{ 'opacity-25': form.processing }"
                    :disabled="form.processing"
                >
                    {{ board == null ? "Create" : "Update" }} Vendor
                </button>
            </div>
        </div>
    </form>
</template>

<script>
import CrudInput from "../../Components/CrudInput"
import JetInputError from "@/Jetstream/InputError"
import CrudSelect from "../../Components/CrudSelect"
export default {
    name: "CreateBoardForm",
    components: { CrudInput, JetInputError, CrudSelect },
    props: {
        board: {
            type: Object
        },
    },
    data() {
        return {
            form: this.vendor
                ? this.$inertia.form({
                    name: this.board.name,
                    rotation: this.board.rotation,
                    width: this.board.width,
                    height: this.board.height
                })
                : this.$inertia.form({
                    name: "",
                    rotation: "",
                    width: "",
                    height: ""
                }),
        }
    },
    methods: {
        createVendor() {
            if (this.board !== null) {
                this.form.put(
                    route("boards.update"), {
                        errorBag: "createVendor",
                        preserveScroll: true,
                    }
                )
            } else {
                this.form.post(
                    route("boards.store"), {
                        errorBag: "createVendor",
                        preserveScroll: true,
                    }
                )
            }
        },
    },
}
</script>

<style scoped>
.form-line {
    float: left;
}
</style>
