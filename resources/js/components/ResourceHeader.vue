<template>
  <div>
    <h2>{{name}}</h2>
    <p class="folder-item">
      <span>
        <i class="fas fa-folder-open"></i>
      </span>
      <span>
        <i class="fas fa-folder"></i>
      </span>
    </p>
  </div>
</template>

<script>
export default {
  props: {
    name: {
      type: String,
      default: "Files"
    }
  }
};
</script>
