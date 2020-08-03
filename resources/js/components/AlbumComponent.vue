<template>
  <div>
    <form @submit.prevent="createAlbum" enctype="multipart/form-data" v-if="!success">
      <div class="form-group">
        <label>Name</label>
        <input type="text" name="name" v-model="name" class="form-control" maxlength="15" />
        <span v-if="allerrors.name" :class="['danger']">{{allerrors.name[0]}}</span>
      </div>
      <div class="form-group">
        <label>Description</label>
        <textarea class="form-control" maxlength="200" name="description" v-model="description"></textarea>
        <span v-if="allerrors.description" :class="['danger']">{{allerrors.description[0]}}</span>
      </div>
      <div class="form-group">
        <label>Category</label>

        <select class="form-control" name="category" v-model="category">
          <option
            v-for="(category,index) in categories"
            :key="index"
            :value="category.id"
          >{{category.name}}</option>
          <span v-if="allerrors.category" :class="['danger']">{{allerrors.category[0]}}</span>
        </select>
      </div>
      <div class="form-group">
        <label>Image</label>
        <input type="file" name="image" v-on:change="onImageChange" class="form-control" />
        <span v-if="allerrors.image" :class="['danger']">{{allerrors.image[0]}}</span>
      </div>
      <div class="form-group">
        <button class="btn btn-secondary" type="submit">Create Album</button>
      </div>
    </form>
    <div v-if="success">
      <a
        :href="'/upload/images/'+albumId"
      >Your beautiful album is created. Click the link to upload the images</a>
    </div>
  </div>
</template>
<script>
export default {
  data() {
    return {
      name: "",
      description: "",
      category: "",
      image: "",
      categories: [],
      albumId: "",
      success: false,
      allerrors: [],
    };
  },
  created() {
    this.getCategories();
  },
  methods: {
    getCategories() {
      axios
        .get("/api/categories")
        .then((response) => {
          this.categories = response.data;
        })
        .catch((error) => {
          alert("opsala can not get the categories");
        });
    },
    onImageChange(e) {
      console.log(e);
      this.image = e.target.files[0];
    },
    createAlbum() {
      const config = {
        headers: {
          "content-type": "multipart/form-data",
        },
      };
      let formData = new FormData();
      formData.append("image", this.image);
      formData.append("name", this.name);
      formData.append("description", this.description);
      formData.append("category_id", this.category);
      axios
        .post("/albums/store", formData, config)
        .then((response) => {
          (this.image = ""),
            (this.name = ""),
            (this.description = ""),
            (this.category = "");
          this.albumId = response.data.id;
          console.log(response.data.id);
          this.success = true;
        })
        .catch((error) => {
          console.log(error);
          this.allerrors = error.response.data.errors;
        });
    },
  },
};
</script>
<style type="text/css">
.danger {
  color: red;
}
</style>