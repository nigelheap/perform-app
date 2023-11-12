<script setup lang="ts">
defineProps({
  to: String,
  iconClasses: String
})
</script>
<template>
  <NuxtLink :to="to" class="min-h-50 flex flex-col justify-center border rounded items-stretch group transition ease-in-out delay-200">
    <div class="px-4 pb-4 pt-12 transition ease-in-out delay-200" :class="iconClasses">
      <slot name="logo"></slot>
    </div>
    <div class="p-4">
      <h3><slot name="title" /></h3>
      <slot />
    </div>
  </NuxtLink>
</template>
