<template>
  <div class="asset-item">
    <div class="asset-info">
      <div class="asset-thumb">
        <img :src="`https://pitbarrelcookerco-uploads.s3.amazonaws.com/${img}`" alt />
      </div>

      <a
        :href="`https://pitbarrelcookerco-uploads.s3.amazonaws.com/${url}`"
        type="application/octet-stream"
        download
        target="_blank"
      >{{file}}</a>
    </div>

    <a
      class="dl-button"
      :href="`https://pitbarrelcookerco-uploads.s3.amazonaws.com/${url}`"
      type="application/octet-stream"
      download
      target="_blank"
    ><i class="fas fa-download"></i></a>
  </div>
</template>

<script>
export default {
  props: {
    file: "",
    url: "",
    img: ""
  }
};
</script>

<style lang="css">
.asset-item img {
  max-width: 200px;
}
</style>
