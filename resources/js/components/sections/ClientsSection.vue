<script setup lang="ts">
import { ref, onMounted } from 'vue';
import gsap from 'gsap';
import { ScrollTrigger } from 'gsap/ScrollTrigger';

gsap.registerPlugin(ScrollTrigger);

// Logos clients (placeholders pour le moment)
const clients = [
  { name: 'Client 1', logo: 'https://via.placeholder.com/200x80/6C4CFF/FFFFFF?text=Client+1' },
  { name: 'Client 2', logo: 'https://via.placeholder.com/200x80/E2DEFF/0D0D0D?text=Client+2' },
  { name: 'Client 3', logo: 'https://via.placeholder.com/200x80/6C4CFF/FFFFFF?text=Client+3' },
  { name: 'Client 4', logo: 'https://via.placeholder.com/200x80/E2DEFF/0D0D0D?text=Client+4' },
  { name: 'Client 5', logo: 'https://via.placeholder.com/200x80/6C4CFF/FFFFFF?text=Client+5' },
  { name: 'Client 6', logo: 'https://via.placeholder.com/200x80/E2DEFF/0D0D0D?text=Client+6' },
  { name: 'Client 7', logo: 'https://via.placeholder.com/200x80/6C4CFF/FFFFFF?text=Client+7' },
  { name: 'Client 8', logo: 'https://via.placeholder.com/200x80/E2DEFF/0D0D0D?text=Client+8' },
  { name: 'Client 9', logo: 'https://via.placeholder.com/200x80/6C4CFF/FFFFFF?text=Client+9' },
  { name: 'Client 10', logo: 'https://via.placeholder.com/200x80/E2DEFF/0D0D0D?text=Client+10' },
  { name: 'Client 11', logo: 'https://via.placeholder.com/200x80/6C4CFF/FFFFFF?text=Client+11' },
  { name: 'Client 12', logo: 'https://via.placeholder.com/200x80/E2DEFF/0D0D0D?text=Client+12' },
];

const logosRef = ref<HTMLElement[]>([]);

const setLogoRef = (el: any, index: number) => {
  if (el) logosRef.value[index] = el;
};

onMounted(() => {
  logosRef.value.forEach((logo, index) => {
    gsap.from(logo, {
      scrollTrigger: {
        trigger: logo,
        start: 'top 85%',
        end: 'bottom 20%',
        toggleActions: 'play none none reverse',
      },
      opacity: 0,
      scale: 0.8,
      duration: 0.6,
      delay: index * 0.05,
      ease: 'power3.out',
    });
  });
});
</script>

<template>
  <section id="clients" class="py-32 relative overflow-hidden">
    <!-- Background Gradient -->
    <div class="absolute inset-0 bg-gradient-to-b from-background via-primary/5 to-background" />

    <div class="container mx-auto px-6 lg:px-12 relative z-10">
      <!-- Section Header -->
      <div class="max-w-3xl mx-auto text-center mb-12 sm:mb-20">
        <h2 class="text-3xl sm:text-4xl md:text-5xl lg:text-h2 font-display font-bold mb-4 sm:mb-6 text-white px-4 sm:px-0">
          Ils nous font <span class="gradient-text drop-shadow-[0_0_30px_rgba(108,76,255,0.5)]">confiance</span>
        </h2>
        <p class="text-base sm:text-lg md:text-xl text-foreground/70 px-4 sm:px-0">
          Des entreprises de tous secteurs nous font confiance pour leur transformation digitale
        </p>
      </div>

      <!-- Logos Grid -->
      <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8 max-w-6xl mx-auto">
        <div
          v-for="(client, index) in clients"
          :key="client.name"
          :ref="(el) => setLogoRef(el, index)"
          class="group flex items-center justify-center p-8 glass-strong rounded-2xl hover:bg-white/10 transition-all duration-300 hover:scale-105 border border-white/10 hover:border-primary/30"
        >
          <img
            :src="client.logo"
            :alt="client.name"
            class="w-full h-auto object-contain opacity-60 group-hover:opacity-100 transition-opacity duration-300 filter grayscale group-hover:grayscale-0"
          />
        </div>
      </div>

      <!-- Stats -->
      <div class="mt-12 sm:mt-20 grid grid-cols-2 md:grid-cols-4 gap-4 sm:gap-6 max-w-4xl mx-auto px-4 sm:px-0">
        <div class="group text-center p-4 sm:p-6 rounded-2xl glass-strong hover:bg-primary/10 transition-all duration-300 hover:scale-105">
          <div class="text-3xl sm:text-4xl font-display font-bold gradient-text mb-2 drop-shadow-[0_0_20px_rgba(108,76,255,0.5)]">50+</div>
          <div class="text-xs sm:text-sm font-medium text-foreground/70 group-hover:text-white transition-colors">Clients actifs</div>
        </div>
        <div class="group text-center p-4 sm:p-6 rounded-2xl glass-strong hover:bg-primary/10 transition-all duration-300 hover:scale-105">
          <div class="text-3xl sm:text-4xl font-display font-bold gradient-text mb-2 drop-shadow-[0_0_20px_rgba(108,76,255,0.5)]">200+</div>
          <div class="text-xs sm:text-sm font-medium text-foreground/70 group-hover:text-white transition-colors">Projets livrés</div>
        </div>
        <div class="group text-center p-4 sm:p-6 rounded-2xl glass-strong hover:bg-primary/10 transition-all duration-300 hover:scale-105">
          <div class="text-3xl sm:text-4xl font-display font-bold gradient-text mb-2 drop-shadow-[0_0_20px_rgba(108,76,255,0.5)]">98%</div>
          <div class="text-xs sm:text-sm font-medium text-foreground/70 group-hover:text-white transition-colors">Satisfaction</div>
        </div>
        <div class="group text-center p-4 sm:p-6 rounded-2xl glass-strong hover:bg-primary/10 transition-all duration-300 hover:scale-105">
          <div class="text-3xl sm:text-4xl font-display font-bold gradient-text mb-2 drop-shadow-[0_0_20px_rgba(108,76,255,0.5)]">5+</div>
          <div class="text-xs sm:text-sm font-medium text-foreground/70 group-hover:text-white transition-colors">Années d'expérience</div>
        </div>
      </div>
    </div>
  </section>
</template>
