<template>
    <form class="container" @submit.prevent="createBoard">
        <h3 class="form-title">Create a board</h3>
        <div class="col-1">
            <div class="row-cols-3">
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
                        label="Rotation"
                        :optionsObject="[{name:'Horizontal', value:0}, {name:'Vertical', value:90}]"
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
                <div class="col-3">
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
                        {{ board == null ? "Create" : "Update" }} Board
                    </button>
                </div>
            </div>
        </div>

        <div class="col-2">
            <BoardPreview :width="form.width" :height="form.height" :rotation="form.rotation" :board_tiles="form.tiles"></BoardPreview>

        </div>


    </form>
</template>

<script>
import CrudInput from "../../Components/CrudInput"
import JetInputError from "@/Jetstream/InputError"
import CrudSelect from "../../Components/CrudSelect"
import BoardPreview from "../../Components/BoardComponents/BoardPreview";
export default {
    name: "CreateBoardForm",
    components: {BoardPreview, CrudInput, JetInputError, CrudSelect },
    props: {
        board: {
            type: Object
        },
    },
    data() {
        return {
            form: this.board
                ? this.$inertia.form({
                    name: this.board.name,
                    rotation: this.board.rotation,
                    width: this.board.width,
                    height: this.board.height,
                    tiles: this.board.boardTiles
                })
                : this.$inertia.form({
                    name: "",
                    rotation: "",
                    width: "",
                    height: "",
                    tiles: []
                }),
        }
    },
    methods: {
        createBoard() {
            if (this.board !== null) {
                this.form.put(
                    route("boards.update"), {
                        errorBag: "createBoard",
                        preserveScroll: true,
                    }
                )
            } else {
                this.form.post(
                    route("boards.store"), {
                        errorBag: "createBoard",
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
