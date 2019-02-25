<template>
  <!-- bind event 'done' to receive file uploaded info -->
  <div>
    <div class="form-group text-center">
      <span>Día del seguimiento</span>
      <datepicker v-model="today" name="date" input-class="form-control" format="dd/MM/yyyy" ></datepicker>
    </div>
    <div class="form-group">
      <a @click="addImage()" class="btn btn-outline-primary btn-fix btn-block">
          <span class="btn-icon"><i class="ti-cloud-up"></i>Agregar imagen</span>
      </a>
    </div>

    <div class="form-group">
      <div style="display: none">
        <input type="file" ref="image1" @change="previewImage" accept="image/*" name="images[]">
        <input type="file" ref="image2" @change="previewImage" accept="image/*" name="images[]">
        <input type="file" ref="image3" @change="previewImage" accept="image/*" name="images[]">
        <input type="file" ref="image4" @change="previewImage" accept="image/*" name="images[]">
        <input type="file" ref="image5" @change="previewImage" accept="image/*" name="images[]">
        <input type="file" ref="image6" @change="previewImage" accept="image/*" name="images[]">
      </div>
      <b-row v-if ="imageData.length > 0 ">
        <b-col cols="4" class="p-3" v-for ="img in imageData ">
          <img :src="img.image" alt="image" >
        </b-col>
      </b-row>

    </div>
    <div class="form-group">
      <b-form-textarea id="textarea1"
                   v-model="text"
                   placeholder="Escribe una nota"
                   :rows="3"
                   :max-rows="5" name="text">
      </b-form-textarea>
    </div>

    <!-- <button class="btn btn-success" v-on:click="sendme()">Guardar</button> -->
  </div>
</template>

<script>
import Datepicker from 'vuejs-datepicker'
import {en, es} from 'vuejs-datepicker/dist/locale'


export default {
  mounted() {
      console.log('componente dropzone');
  },
  name: 'app',
  components: {
    Datepicker
  },
  props:{
    url: String,
  },
  data: function () {
    return {
      count:1,
      today:Date.now(),
      text:'',
      imageData:[]

    }
  },
  methods: {

    addImage() {
      console.log('entre add image');

      console.log('count'+this.count);
      if(this.count == 1){this.$refs.image1.click();}
      if(this.count == 2){this.$refs.image2.click();}
      if(this.count == 3){this.$refs.image3.click();}
      if(this.count == 4){this.$refs.image4.click();}
      if(this.count == 5){this.$refs.image5.click();}
      if(this.count == 6){this.$refs.image6.click();}

      this.count++;

    },
    previewImage: function(event) {
      // Reference to the DOM input element
      var input = event.target;
      // Ensure that you have a file before attempting to read it
      if (input.files && input.files[0]) {
        console.log('tengo archivo');
        // create a new FileReader to read this image and convert to base64 format
        var reader = new FileReader();
        // Define a callback function to run, when FileReader finishes its job
        reader.onload = (e) => {
            // Note: arrow function used here, so that "this.imageData" refers to the imageData of Vue component
            // Read image as base64 and set to imageData
            this.imageData.push({image: e.target.result});
        }
        // Start the reader job - read file as a data url (base64 format)
        reader.readAsDataURL(input.files[0]);
      }
    }

  }

}
</script>
