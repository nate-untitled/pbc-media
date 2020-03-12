<template>
  <div class="resource-grid">
    <h3>Files</h3>
    <div class="branding-assets-raster" v-for="file in files" :key="file.id">
      <asset-item :file="file.name" :url="file.upload" :img="file.image"></asset-item>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    files: Array
  }
};
</script>
