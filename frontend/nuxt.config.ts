// https://nuxt.com/docs/api/configuration/nuxt-config
export default defineNuxtConfig({
  compatibilityDate: '2024-11-01',
  devtools: { enabled: true },
  modules: ['@nuxtjs/tailwindcss', 'nuxt-kql'],
  kql: {
    auth: 'bearer',
    token: process.env.KIRBY_API_TOKEN,
  }
})