<script setup lang="ts">
const { data, refresh, error, status, clear } = await useKql({
  query: 'site',
  select: {
    title: true,
    children: true
  }
})

if (error.value) {
  console.error(error.value)
}
</script>

<template>
  <div class="min-h-12 w-full border">
    <h1>{{ data?.result?.title }}</h1>
    <pre>{{ JSON.stringify(data?.result, undefined, 2) }}</pre>
  </div>
</template>