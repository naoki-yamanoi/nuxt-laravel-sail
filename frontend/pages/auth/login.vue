<template>
  <div>
    <div class="field">
      <label class="label">Username</label>
      <div class="control has-icons-left has-icons-right">
        <input class="input is-success" type="text" placeholder="Text input" :value="test">
        <span class="icon is-small is-left">
          <i class="fas fa-user"></i>
        </span>
        <span class="icon is-small is-right">
          <i class="fas fa-check"></i>
        </span>
      </div>
      <p class="help is-success">This username is available</p>
    </div>
  </div>
</template>

<script>
import Axios from 'axios';

  export default {
    data() {
      return {
        test: "sssssssddd",

      }
    },
    computed: {

    },
    mounted() {
      this.asyncData();
    },
    methods: {
      async asyncData() {
        const response = await Axios.get('http://localhost:80/api/owner');
        this.test = response.data;
      }
    }
  }
</script>

<style ${2|scoped,|} lang="scss">
</style>
