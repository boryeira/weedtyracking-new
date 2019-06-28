<template>
  <div>
aca imagenes
  </div>

</template>

<script>

export default {
  mounted() {
      console.log('componente dropzone');
  },
  name: 'app',
  props:{
    url: String,
  },
  data: function () {
    return {
      count:1,

    }
  },
  methods: {

  }

}
</script>
