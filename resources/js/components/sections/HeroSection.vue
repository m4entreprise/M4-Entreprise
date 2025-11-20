<script setup lang="ts">
import { ref, onMounted } from 'vue';
import { PhArrowRight, PhPlay } from '@phosphor-icons/vue';
import gsap from 'gsap';

const props = defineProps<{
  data: {
    nom: string;
    baseline: string;
    promesse: string[];
  };
}>();

const titleRef = ref<HTMLElement | null>(null);
const subtitleRef = ref<HTMLElement | null>(null);
const ctaRef = ref<HTMLElement | null>(null);

onMounted(() => {
  // GSAP Animations
  const tl = gsap.timeline({ defaults: { ease: 'power3.out' } });

  tl.from(titleRef.value, {
    y: 100,
    opacity: 0,
    duration: 1.2,
    delay: 0.3,
  })
    .from(
      subtitleRef.value,
      {
        y: 50,
        opacity: 0,
        duration: 1,
      },
      '-=0.6',
    )
    .from(
      ctaRef.value,
      {
        y: 30,
        opacity: 0,
        duration: 0.8,
      },
      '-=0.4',
    );
});

const scrollToContact = () => {
  document.querySelector('#contact')?.scrollIntoView({ behavior: 'smooth' });
};
</script>

<template>
  <section
    id="hero"
    class="relative min-h-screen flex items-center justify-center overflow-hidden pt-20"
  >
    <!-- Background gradient -->
    <div class="absolute inset-0 bg-gradient-to-b from-primary/20 via-background to-background" />

    <!-- Animated background elements -->
    <div class="absolute inset-0 overflow-hidden">
      <div class="absolute top-1/4 left-1/4 w-[600px] h-[600px] bg-primary/30 rounded-full blur-[100px] animate-float" />
      <div class="absolute bottom-1/4 right-1/4 w-[500px] h-[500px] bg-accent/25 rounded-full blur-[100px] animate-float delay-1000" style="animation-delay: 2s;" />
      <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[400px] h-[400px] bg-primary/20 rounded-full blur-[120px] animate-glow" />
    </div>

    <!-- Content -->
    <div class="container mx-auto px-6 lg:px-12 relative z-10">
      <div class="max-w-5xl mx-auto text-center">
        <!-- Main Title -->
        <h1
          ref="titleRef"
          class="text-h1 font-display font-bold mb-8 leading-[1.05]"
        >
          <span class="gradient-text drop-shadow-[0_0_30px_rgba(108,76,255,0.5)]">Solutions digitales</span>
          <br />
          <span class="text-white">pour votre entreprise</span>
        </h1>

        <!-- Baseline -->
        <p
          ref="subtitleRef"
          class="text-2xl md:text-3xl text-foreground/80 mb-6 max-w-3xl mx-auto font-medium"
        >
          {{ data.baseline }}
        </p>

        <!-- Promesses -->
        <div
          ref="subtitleRef"
          class="flex flex-wrap justify-center gap-3 mb-12"
        >
          <div
            v-for="(promesse, index) in data.promesse"
            :key="index"
            class="flex items-center gap-2 glass-strong px-5 py-3 rounded-full border border-primary/20 hover:border-primary/50 transition-all duration-300 hover:scale-105"
          >
            <div class="w-2 h-2 rounded-full bg-primary shadow-lg shadow-primary/50 animate-pulse" />
            <span class="text-sm font-medium text-white">{{ promesse }}</span>
          </div>
        </div>

        <!-- CTAs -->
        <div
          ref="ctaRef"
          class="flex flex-col sm:flex-row gap-5 justify-center items-center"
        >
          <button
            @click="scrollToContact"
            class="group relative px-10 py-5 bg-gradient-to-r from-primary to-accent text-white rounded-full font-semibold text-lg transition-all duration-300 hover:scale-110 hover:shadow-2xl hover:shadow-primary/50 flex items-center gap-3 overflow-hidden"
          >
            <span class="absolute inset-0 bg-white/20 translate-y-full group-hover:translate-y-0 transition-transform duration-300"></span>
            <span class="relative">Démarrer un projet</span>
            <PhArrowRight
              :size="24"
              class="group-hover:translate-x-2 transition-transform relative"
              weight="bold"
            />
          </button>

          <a
            href="#portfolio"
            class="group px-8 py-5 glass-strong hover:bg-white/10 text-white rounded-full font-semibold text-lg transition-all duration-300 hover:scale-105 flex items-center gap-3 border border-white/20 hover:border-primary/50"
          >
            <div class="w-12 h-12 rounded-full bg-gradient-to-br from-primary/30 to-accent/30 flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
              <PhPlay :size="20" weight="fill" class="ml-0.5" />
            </div>
            Voir nos réalisations
          </a>
        </div>

        <!-- Stats or Trust Indicators -->
        <div class="mt-24 grid grid-cols-2 md:grid-cols-3 gap-8 max-w-4xl mx-auto">
          <div class="group text-center p-6 rounded-2xl glass-strong hover:bg-primary/10 transition-all duration-300 hover:scale-105">
            <div class="text-5xl font-display font-bold gradient-text mb-3 drop-shadow-[0_0_20px_rgba(108,76,255,0.5)]">50+</div>
            <div class="text-sm font-medium text-foreground/70 group-hover:text-white transition-colors">Projets réalisés</div>
          </div>
          <div class="group text-center p-6 rounded-2xl glass-strong hover:bg-primary/10 transition-all duration-300 hover:scale-105">
            <div class="text-5xl font-display font-bold gradient-text mb-3 drop-shadow-[0_0_20px_rgba(108,76,255,0.5)]">3</div>
            <div class="text-sm font-medium text-foreground/70 group-hover:text-white transition-colors">Pôles d'expertise</div>
          </div>
          <div class="group text-center col-span-2 md:col-span-1 p-6 rounded-2xl glass-strong hover:bg-primary/10 transition-all duration-300 hover:scale-105">
            <div class="text-5xl font-display font-bold gradient-text mb-3 drop-shadow-[0_0_20px_rgba(108,76,255,0.5)]">100%</div>
            <div class="text-sm font-medium text-foreground/70 group-hover:text-white transition-colors">Satisfaction client</div>
          </div>
        </div>
      </div>
    </div>

    <!-- Scroll indicator -->
    <div class="absolute bottom-12 left-1/2 -translate-x-1/2 animate-bounce">
      <div class="w-7 h-12 border-2 border-primary rounded-full flex justify-center p-2 shadow-lg shadow-primary/30 bg-primary/5">
        <div class="w-1.5 h-4 bg-gradient-to-b from-primary to-accent rounded-full animate-pulse" />
      </div>
    </div>
  </section>
</template>

<style scoped>
.delay-1000 {
  animation-delay: 1s;
}
</style>
