<script setup lang="ts">
import { ref, onMounted } from 'vue';
import { Head } from '@inertiajs/vue3';
import HeroSection from '@/components/sections/HeroSection.vue';
import ServicesSection from '@/components/sections/ServicesSection.vue';
import ClientsSection from '@/components/sections/ClientsSection.vue';
import PortfolioSection from '@/components/sections/PortfolioSection.vue';
import MethodologySection from '@/components/sections/MethodologySection.vue';
import ContactSection from '@/components/sections/ContactSection.vue';
import PremiumHeader from '@/components/layout/PremiumHeader.vue';
import PremiumFooter from '@/components/layout/PremiumFooter.vue';

// Import company data
import companyData from '../../../docs/datas.json';

const isHeaderCompact = ref(false);

onMounted(() => {
  window.addEventListener('scroll', handleScroll);
});

const handleScroll = () => {
  isHeaderCompact.value = window.scrollY > 100;
};
</script>

<template>
  <Head title="M4 Entreprise - Solutions web, IT et médias pour TPE/PME" />

  <div class="min-h-screen bg-background text-foreground overflow-x-hidden">
    <PremiumHeader :is-compact="isHeaderCompact" />

    <main>
      <HeroSection :data="companyData.entreprise" />
      <ServicesSection :poles="companyData.poles" :services="companyData.services_details" />
      <ClientsSection />
      <PortfolioSection />
      <MethodologySection />
      <ContactSection :contact="companyData.entreprise.coordonnees" />
    </main>

    <PremiumFooter :data="companyData.entreprise" />
  </div>
</template>
