<template>
  <app-layout title="All Boards">
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        All Boards
      </h2>
    </template>

    <div>
      <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
        {{ boards }}
      </div>
    </div>
  </app-layout>
</template>

<script>
import { defineComponent } from "vue"
import AppLayout from "@/Layouts/AppLayout.vue"
import DeleteTeamForm from "@/Pages/Teams/Partials/DeleteTeamForm.vue"
import JetSectionBorder from "@/Jetstream/SectionBorder.vue"
import TeamMemberManager from "@/Pages/Teams/Partials/TeamMemberManager.vue"
import UpdateTeamNameForm from "@/Pages/Teams/Partials/UpdateTeamNameForm.vue"

export default defineComponent({
  props: {
    boards: {
      type: Object,
      required: true,
    },
  },
  components: {
    AppLayout,
  },
})
</script>
