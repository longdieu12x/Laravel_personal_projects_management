<template>
    <div class="mcontainer" id="body">
        <leftbody-component></leftbody-component>
        <rightbody-component></rightbody-component>
    </div>
</template>

<script>
import LeftBody from './LeftBody';
import RightBody from './RightBody';
export default {
  data () {
    return {
    }
  },
  components: {
      LeftBody,
      RightBody,
  }

}
</script>

<style>

</style>
