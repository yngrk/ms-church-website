<script setup lang="ts">
const route = useRoute()

const path = route.path === '/' ? 'home' : route.path

const { data } = await useKql({
  query: `page("${path}")`,
  select: {
    title: true,
    layout: 'page.layout.toResolvedLayouts',
  }
}, {})

onMounted(() => {
  console.log(data.value?.result)
})
</script>

<template>
  <pre class="border">
    {{ data?.result }}
  </pre>
</template>