<template>
  <div>
    <h3>Galleries</h3>
    <div class="gallery" style="padding: 0; margin-top: .75rem">
      <div class="gallery-panel" v-for="(photo, j) in getFirstGalleryItems()" :key="j">
        <a :href="`/gallery/${photo.galleryId}`">
          <img :src="photo.medium" class="gallery-thumb" />
        </a>

        <div class="gallery-thumb-overlay">
          <div class="gallery-thumb-overlay-btns">
            <h3 class="gallery-overlay-title">{{photo.galleryName}}</h3>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    gallery_media: Array
  },
  computed: {
    galleries() {
      const galleries = [];

      this.gallery_media.map((media, i) => {
        const galleriesIndex = galleries.findIndex(
          item => item.id === media.imageGalleryId
        );

        if (galleriesIndex < 0) {
          galleries.push({
            name: media.imageGalleryName,
            id: media.imageGalleryId,
            urls: [
              {
                url: media.url,
                thumbUrl: media.thumb_url,
                medium: media.med_url,
                id: i
              }
            ]
          });
        } else {
          galleries[galleriesIndex].urls.push({
            url: media.url,
            thumbUrl: media.thumb_url,
            medium: media.med_url,
            id: i
          });
        }
      });

      return galleries;
    }
  },
  methods: {
    getFirstGalleryItems() {
      const galleryData = this.galleries;
      let firstItems = [];

      const makeItem = (item, galleryId, galleryName) => {
        return {
          id: item.id,
          src: item.url,
          thumbnail: item.thumbUrl,
          medium: item.medium,
          galleryId,
          galleryName
        };
      };

      galleryData.map((gallery, i) => {
        const item = makeItem(
          galleryData[i].urls[0],
          galleryData[i].id,
          galleryData[i].name
        );
        firstItems = [...firstItems, item];
      });

      return firstItems;
    }
  }
};
</script>

