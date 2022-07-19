<template>
  <app-layout title="Create Board">
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Create Board
      </h2>
    </template>

    <div class="w-100 h-100">
        <CreateBoardForm :board="board">
        </CreateBoardForm>
    </div>
  </app-layout>
</template>

<script>
import { defineComponent } from "vue"
import AppLayout from "@/Layouts/AppLayout.vue"
import CreateTeamForm from "@/Pages/Teams/Partials/CreateTeamForm.vue"
import CreateBoardForm from "./CreateBoardForm";

export default defineComponent({
  components: {
      CreateBoardForm,
    AppLayout,
  },
    props:{
      board:{
          type: Object,
          required: true
      },
        boardTiles:{
          type: Object,
            required: true
        }
    }
})
</script>
