<script setup lang="ts">
import { ref, onMounted } from 'vue';
import { PhArrowUpRight } from '@phosphor-icons/vue';
import gsap from 'gsap';
import { ScrollTrigger } from 'gsap/ScrollTrigger';

gsap.registerPlugin(ScrollTrigger);

// Dummy portfolio data
const portfolioItems = [
  {
    id: 1,
    title: 'Plateforme E-commerce Premium',
    category: 'Web',
    image: '/images/portfolio/project-1.jpg',
    tags: ['E-commerce', 'React', 'Node.js'],
    size: 'large',
  },
  {
    id: 2,
    title: 'Application Métier SaaS',
    category: 'Web',
    image: '/images/portfolio/project-2.jpg',
    tags: ['SaaS', 'Vue.js', 'Laravel'],
    size: 'medium',
  },
  {
    id: 3,
    title: 'Campagne Vidéo 4K',
    category: 'Media',
    image: '/images/portfolio/project-3.jpg',
    tags: ['Vidéo', 'Motion Design'],
    size: 'medium',
  },
  {
    id: 4,
    title: 'Infrastructure IT Sécurisée',
    category: 'IT',
    image: '/images/portfolio/project-4.jpg',
    tags: ['Cybersécurité', 'Réseau'],
    size: 'small',
  },
  {
    id: 5,
    title: 'Identité Visuelle Complète',
    category: 'Media',
    image: '/images/portfolio/project-5.jpg',
    tags: ['Branding', 'Design'],
    size: 'small',
  },
  {
    id: 6,
    title: 'Site Vitrine Corporate',
    category: 'Web',
    image: '/images/portfolio/project-6.jpg',
    tags: ['Vitrine', 'SEO'],
    size: 'medium',
  },
];

const activeFilter = ref('all');
const filters = ['all', 'Web', 'Media', 'IT'];

const filteredItems = ref(portfolioItems);
const itemsRef = ref<HTMLElement[]>([]);

const filterProjects = (filter: string) => {
  activeFilter.value = filter;
  if (filter === 'all') {
    filteredItems.value = portfolioItems;
  } else {
    filteredItems.value = portfolioItems.filter((item) => item.category === filter);
  }
};

const setItemRef = (el: any, index: number) => {
  if (el) itemsRef.value[index] = el;
};

onMounted(() => {
  itemsRef.value.forEach((item, index) => {
    gsap.from(item, {
      scrollTrigger: {
        trigger: item,
        start: 'top 85%',
        end: 'bottom 20%',
        toggleActions: 'play none none reverse',
      },
      y: 80,
      opacity: 0,
      duration: 0.8,
      delay: index * 0.1,
      ease: 'power3.out',
    });
  });
});
</script>

<template>
  <section id="portfolio" class="py-32 relative">
    <div class="container mx-auto px-6 lg:px-12">
      <!-- Section Header -->
      <div class="max-w-3xl mx-auto text-center mb-16">
        <h2 class="text-h2 font-display font-bold mb-6 text-white">
          Notre <span class="gradient-text drop-shadow-[0_0_30px_rgba(108,76,255,0.5)]">Portfolio</span>
        </h2>
        <p class="text-xl text-foreground/70">
          Découvrez nos réalisations et l'impact que nous avons créé pour nos clients
        </p>
      </div>

      <!-- Filters -->
      <div class="flex flex-wrap justify-center gap-4 mb-12">
        <button
          v-for="filter in filters"
          :key="filter"
          @click="filterProjects(filter)"
          :class="[
            'px-6 py-3 rounded-full font-semibold transition-all duration-300',
            activeFilter === filter
              ? 'bg-gradient-to-r from-primary to-accent text-white shadow-lg shadow-primary/50 scale-105'
              : 'glass-strong hover:bg-primary/10 text-foreground/70 hover:text-white border border-white/10 hover:border-primary/30',
          ]"
        >
          {{ filter === 'all' ? 'Tous' : filter }}
        </button>
      </div>

      <!-- Portfolio Grid (Masonry-like) -->
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <div
          v-for="(item, index) in filteredItems"
          :key="item.id"
          :ref="(el) => setItemRef(el, index)"
          :class="[
            'group relative overflow-hidden rounded-3xl glass-strong cursor-pointer transition-all duration-500 hover:scale-[1.02]',
            item.size === 'large' && 'md:col-span-2 md:row-span-2',
            item.size === 'medium' && 'md:row-span-1',
          ]"
        >
          <!-- Image Placeholder -->
          <div
            :class="[
              'relative overflow-hidden bg-gradient-to-br from-primary/20 to-accent/20',
              item.size === 'large' ? 'h-96 md:h-full' : 'h-64',
            ]"
          >
            <!-- Overlay on hover -->
            <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/40 to-transparent opacity-60 group-hover:opacity-90 transition-opacity duration-300" />

            <!-- Content -->
            <div class="absolute inset-0 p-8 flex flex-col justify-end">
              <div class="transform translate-y-4 group-hover:translate-y-0 transition-transform duration-300">
                <!-- Category -->
                <span class="inline-block px-4 py-1 bg-primary/80 text-white text-xs font-medium rounded-full mb-3">
                  {{ item.category }}
                </span>

                <!-- Title -->
                <h3 class="text-2xl font-display font-bold text-white mb-2 group-hover:text-accent transition-colors duration-300">
                  {{ item.title }}
                </h3>

                <!-- Tags -->
                <div class="flex flex-wrap gap-2 mb-4 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                  <span
                    v-for="tag in item.tags"
                    :key="tag"
                    class="text-xs text-muted-foreground glass px-3 py-1 rounded-full"
                  >
                    {{ tag }}
                  </span>
                </div>

                <!-- CTA -->
                <div class="flex items-center gap-2 text-white opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                  <span class="text-sm font-medium">Voir le projet</span>
                  <PhArrowUpRight :size="20" class="group-hover:translate-x-1 group-hover:-translate-y-1 transition-transform duration-300" />
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- View All CTA -->
      <div class="mt-16 text-center">
        <a
          href="/portfolio"
          class="inline-flex items-center gap-3 px-8 py-4 glass-strong hover:bg-primary/20 rounded-full font-medium transition-all duration-300 hover:scale-105"
        >
          Voir tous les projets
          <PhArrowUpRight :size="24" />
        </a>
      </div>
    </div>
  </section>
</template>
