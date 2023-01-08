<template>
  <Tutorial />
</template>

<script lang="ts">
import Vue from 'vue'

export default Vue.extend({
  name: 'IndexPage'
})
</script>
<template>
  <div>
    <h1 class="text-5xl font-bold underline">
      {{ data }}
    </h1>
  </div>
</template>

<script lang="ts">
export default {
  async asyncData(app) {
    const data = await app.$axios.$get('http://localhost:80/api')
    return {
      data
    }
  }
}
</script>

<style ${2|scoped,|} lang="scss">
</style>
