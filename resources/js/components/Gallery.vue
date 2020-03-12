<template>
  <div class="page-width">
    <div class="section-block">
      <h3>{{galleryName}}</h3>
      <paginate-links
        for="photos"
        :simple="{
            prev: 'Previous',
            next: 'Next'
        }"
      ></paginate-links>

      <paginate name="photos" :list="photos" :per="20">
        <div class="gallery">
          <div class="gallery-panel" v-for="(photo, i) in paginated('photos')" :key="i">
            <a :href="photo.src" download target="_blank" type="application/octet-stream">
              <img :src="photo.medium" class="gallery-thumb" />
            </a>

            <div class="gallery-thumb-overlay">
              <div class="gallery-thumb-overlay-btns"></div>
            </div>
          </div>
        </div>
      </paginate>

      <paginate-links
        for="photos"
        :simple="{
            prev: 'Previous',
            next: 'Next'
        }"
      ></paginate-links>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    galleryMedia: Array
  },
  data() {
    return {
      paginate: ["photos"],
      photos: this.formatGallery().urls,
      galleryName: this.galleryMedia[0].imageGalleryName
    };
  },
  methods: {
    formatGallery() {
      let urls = [];
      this.galleryMedia.map((media, i) => {
        urls.push({
          src: media.url,
          thumbnail: media.thumb_url,
          medium: media.med_url,
          id: i
        });
      });

      const gallery = {
        name: this.galleryMedia[0].imageGalleryName,
        id: this.galleryMedia[0].imageGalleryId,
        urls
      };

      console.log("gallery", gallery);

      return gallery;
    }
  }
};
</script>
