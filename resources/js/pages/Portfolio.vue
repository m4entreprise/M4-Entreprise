<script setup lang="ts">
import { ref, onMounted, computed } from 'vue';
import { Head, Link } from '@inertiajs/vue3';
import {
  PhArrowUpRight,
  PhArrowRight,
  PhFunnel,
  PhSquaresFour,
  PhRocket,
} from '@phosphor-icons/vue';
import gsap from 'gsap';
import { ScrollTrigger } from 'gsap/ScrollTrigger';
import PremiumHeader from '@/components/layout/PremiumHeader.vue';
import PremiumFooter from '@/components/layout/PremiumFooter.vue';
import companyData from '../../../docs/datas.json';

gsap.registerPlugin(ScrollTrigger);

const isHeaderCompact = ref(false);
const itemsRef = ref<HTMLElement[]>([]);

// Portfolio items avec plus de détails
const portfolioItems = [
  {
    id: 1,
    title: 'Plateforme E-commerce Premium',
    category: 'Web',
    client: 'Boutique de luxe',
    image: '/images/portfolio/project-1.jpg',
    description: 'Développement d\'une boutique en ligne haut de gamme avec expérience utilisateur premium',
    tags: ['E-commerce', 'React', 'Node.js', 'Stripe'],
    size: 'large',
    year: '2024',
  },
  {
    id: 2,
    title: 'Application Métier SaaS',
    category: 'Web',
    client: 'Entreprise industrielle',
    image: '/images/portfolio/project-2.jpg',
    description: 'Solution de gestion complète pour optimiser les processus internes',
    tags: ['SaaS', 'Vue.js', 'Laravel', 'API'],
    size: 'medium',
    year: '2024',
  },
  {
    id: 3,
    title: 'Campagne Vidéo 4K Corporate',
    category: 'Media',
    client: 'Groupe international',
    image: '/images/portfolio/project-3.jpg',
    description: 'Production vidéo professionnelle avec motion design avancé',
    tags: ['Vidéo 4K', 'Motion Design', 'Post-production'],
    size: 'medium',
    year: '2024',
  },
  {
    id: 4,
    title: 'Infrastructure IT Sécurisée',
    category: 'IT',
    client: 'Cabinet médical',
    image: '/images/portfolio/project-4.jpg',
    description: 'Mise en place d\'une infrastructure réseau sécurisée et performante',
    tags: ['Cybersécurité', 'Réseau', 'Firewall'],
    size: 'small',
    year: '2023',
  },
  {
    id: 5,
    title: 'Identité Visuelle Complète',
    category: 'Media',
    client: 'Startup innovante',
    image: '/images/portfolio/project-5.jpg',
    description: 'Création d\'une identité de marque unique et mémorable',
    tags: ['Branding', 'Logo', 'Charte graphique'],
    size: 'small',
    year: '2024',
  },
  {
    id: 6,
    title: 'Site Vitrine Corporate',
    category: 'Web',
    client: 'Cabinet d\'avocats',
    image: '/images/portfolio/project-6.jpg',
    description: 'Site web élégant avec optimisation SEO avancée',
    tags: ['Vitrine', 'SEO', 'Performance'],
    size: 'medium',
    year: '2024',
  },
  {
    id: 7,
    title: 'Audit & Sécurisation Réseau',
    category: 'IT',
    client: 'PME locale',
    image: '/images/portfolio/project-7.jpg',
    description: 'Audit complet et mise en conformité cybersécurité',
    tags: ['Audit', 'Sécurité', 'Compliance'],
    size: 'small',
    year: '2023',
  },
  {
    id: 8,
    title: 'Production Photo Produits',
    category: 'Media',
    client: 'Marque de cosmétiques',
    image: '/images/portfolio/project-8.jpg',
    description: 'Shooting professionnel pour catalogue e-commerce',
    tags: ['Photographie', 'Retouche', 'E-commerce'],
    size: 'medium',
    year: '2024',
  },
  {
    id: 9,
    title: 'Application Web Progressive',
    category: 'Web',
    client: 'Association',
    image: '/images/portfolio/project-9.jpg',
    description: 'PWA responsive avec fonctionnalités offline',
    tags: ['PWA', 'Mobile-first', 'Vue.js'],
    size: 'large',
    year: '2024',
  },
];

const activeFilter = ref('all');
const filters = [
  { value: 'all', label: 'Tous les projets' },
  { value: 'Web', label: 'Développement Web' },
  { value: 'IT', label: 'Consulting IT' },
  { value: 'Media', label: 'Production Média' },
];

const filteredItems = computed(() => {
  if (activeFilter.value === 'all') {
    return portfolioItems;
  }
  return portfolioItems.filter(item => item.category === activeFilter.value);
});

const setItemRef = (el: any, index: number) => {
  if (el) itemsRef.value[index] = el;
};

const filterProjects = (filter: string) => {
  activeFilter.value = filter;

  // Re-animate items when filter changes
  setTimeout(() => {
    itemsRef.value.forEach((item, index) => {
      gsap.fromTo(item,
        { y: 50, opacity: 0 },
        {
          y: 0,
          opacity: 1,
          duration: 0.6,
          delay: index * 0.1,
          ease: 'power3.out'
        }
      );
    });
  }, 100);
};

onMounted(() => {
  window.addEventListener('scroll', handleScroll);

  // Initial animation
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

const handleScroll = () => {
  isHeaderCompact.value = window.scrollY > 100;
};

const scrollToContact = () => {
  window.location.href = '/#contact';
  window.scrollTo({ top: 0, behavior: 'smooth' });
};
</script>

<template>
  <Head title="Portfolio - M4 Entreprise" />

  <div class="min-h-screen bg-background text-foreground">
    <PremiumHeader :is-compact="isHeaderCompact" />

    <!-- Hero Section -->
    <section class="relative min-h-[70vh] flex items-center justify-center overflow-hidden pt-32 pb-20">
      <!-- Background gradient -->
      <div class="absolute inset-0 bg-gradient-to-b from-primary/20 via-background to-background" />

      <!-- Animated background elements -->
      <div class="absolute inset-0 overflow-hidden">
        <div class="absolute top-1/4 left-1/4 w-[600px] h-[600px] bg-primary/30 rounded-full blur-[120px] animate-float" />
        <div class="absolute bottom-1/4 right-1/4 w-[500px] h-[500px] bg-accent/25 rounded-full blur-[120px] animate-float" style="animation-delay: 2s;" />
        <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[400px] h-[400px] bg-primary/20 rounded-full blur-[140px] animate-glow" />
      </div>

      <!-- Content -->
      <div class="container mx-auto px-6 lg:px-12 relative z-10">
        <div class="max-w-5xl mx-auto text-center">
          <!-- Breadcrumb -->
          <div class="mb-8 flex items-center justify-center gap-2 text-sm">
            <Link href="/" class="text-muted-foreground hover:text-primary transition-colors flex items-center gap-2">
              <span>Accueil</span>
            </Link>
            <span class="text-muted-foreground">/</span>
            <span class="text-white font-medium">Portfolio</span>
          </div>

          <!-- Badge -->
          <div class="inline-flex items-center gap-2 px-4 py-2 glass-strong rounded-full border border-primary/30 mb-8">
            <PhSquaresFour :size="16" class="text-primary" weight="duotone" />
            <span class="text-sm font-medium text-white">{{ filteredItems.length }} projets</span>
          </div>

          <h1 class="text-4xl sm:text-5xl md:text-6xl lg:text-7xl xl:text-8xl font-display font-bold mb-8 leading-[1.05]">
            <span class="gradient-text drop-shadow-[0_0_40px_rgba(108,76,255,0.6)]">Notre Portfolio</span>
          </h1>

          <p class="text-xl md:text-2xl lg:text-3xl text-foreground/80 mb-12 max-w-3xl mx-auto font-medium leading-relaxed">
            Découvrez nos réalisations et l'impact que nous avons créé pour nos clients
          </p>
        </div>
      </div>
    </section>

    <!-- Filters Bar -->
    <div class="relative py-8 bg-background/95 backdrop-blur-xl border-b border-white/10">
      <div class="container mx-auto px-6 lg:px-12">
        <div class="flex flex-wrap items-center justify-between gap-4 max-w-7xl mx-auto">
          <!-- Filter label -->
          <div class="flex items-center gap-3">
            <PhFunnel :size="24" class="text-primary" weight="duotone" />
            <span class="font-display font-semibold text-white hidden sm:inline">Filtrer par :</span>
          </div>

          <!-- Filter buttons -->
          <div class="flex flex-wrap gap-3 flex-1 justify-center sm:justify-end">
            <button
              v-for="filter in filters"
              :key="filter.value"
              @click="filterProjects(filter.value)"
              :class="[
                'px-6 py-3 rounded-full font-semibold transition-all duration-300 text-sm sm:text-base',
                activeFilter === filter.value
                  ? 'bg-gradient-to-r from-primary to-accent text-white shadow-lg shadow-primary/50 scale-105'
                  : 'glass-strong hover:bg-primary/10 text-foreground/70 hover:text-white border border-white/10 hover:border-primary/30',
              ]"
            >
              {{ filter.label }}
            </button>
          </div>
        </div>
      </div>
    </div>

    <!-- Portfolio Grid -->
    <section class="py-20 relative">
      <div class="container mx-auto px-6 lg:px-12">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 max-w-7xl mx-auto">
          <div
            v-for="(item, index) in filteredItems"
            :key="item.id"
            :ref="(el) => setItemRef(el, index)"
            :class="[
              'group relative overflow-hidden rounded-3xl glass-strong cursor-pointer transition-all duration-500 hover:scale-[1.02] border border-white/10 hover:border-primary/50 hover:shadow-2xl hover:shadow-primary/20',
              item.size === 'large' && 'md:col-span-2 md:row-span-2',
              item.size === 'medium' && 'md:row-span-1',
            ]"
          >
            <!-- Image Placeholder with gradient -->
            <div
              :class="[
                'relative overflow-hidden bg-gradient-to-br from-primary/20 to-accent/20',
                item.size === 'large' ? 'h-96 md:h-full min-h-[500px]' : 'h-80',
              ]"
            >
              <!-- Overlay on hover -->
              <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/60 to-transparent opacity-70 group-hover:opacity-95 transition-opacity duration-300" />

              <!-- Animated gradient background -->
              <div class="absolute inset-0 bg-gradient-to-br from-primary/30 via-accent/30 to-primary/30 opacity-50 group-hover:scale-110 transition-transform duration-700" />

              <!-- Content -->
              <div class="absolute inset-0 p-8 flex flex-col justify-end">
                <div class="transform translate-y-4 group-hover:translate-y-0 transition-transform duration-300">
                  <!-- Year & Category badges -->
                  <div class="flex items-center gap-2 mb-4 flex-wrap">
                    <span class="inline-block px-4 py-1.5 bg-primary/80 backdrop-blur-sm text-white text-xs font-bold rounded-full shadow-lg">
                      {{ item.category }}
                    </span>
                    <span class="inline-block px-4 py-1.5 glass-strong text-white text-xs font-medium rounded-full">
                      {{ item.year }}
                    </span>
                  </div>

                  <!-- Title -->
                  <h3 class="text-2xl sm:text-3xl font-display font-bold text-white mb-2 group-hover:text-accent transition-colors duration-300">
                    {{ item.title }}
                  </h3>

                  <!-- Client -->
                  <p class="text-sm text-muted-foreground mb-3 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                    Client : {{ item.client }}
                  </p>

                  <!-- Description -->
                  <p class="text-sm text-muted-foreground mb-4 opacity-0 group-hover:opacity-100 transition-opacity duration-300 delay-75 leading-relaxed">
                    {{ item.description }}
                  </p>

                  <!-- Tags -->
                  <div class="flex flex-wrap gap-2 mb-4 opacity-0 group-hover:opacity-100 transition-opacity duration-300 delay-100">
                    <span
                      v-for="tag in item.tags"
                      :key="tag"
                      class="text-xs text-muted-foreground glass px-3 py-1.5 rounded-full border border-white/10"
                    >
                      {{ tag }}
                    </span>
                  </div>

                  <!-- CTA -->
                  <div class="flex items-center gap-2 text-white opacity-0 group-hover:opacity-100 transition-opacity duration-300 delay-150">
                    <span class="text-sm font-semibold">Voir le projet</span>
                    <PhArrowUpRight :size="20" class="group-hover:translate-x-1 group-hover:-translate-y-1 transition-transform duration-300" weight="bold" />
                  </div>
                </div>
              </div>

              <!-- Decorative corner -->
              <div class="absolute top-0 right-0 w-24 h-24 bg-gradient-to-br from-primary/40 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500" />
            </div>
          </div>
        </div>

        <!-- Empty state -->
        <div v-if="filteredItems.length === 0" class="text-center py-20">
          <div class="w-20 h-20 mx-auto mb-6 rounded-2xl bg-primary/20 flex items-center justify-center">
            <PhSquaresFour :size="40" class="text-primary" weight="duotone" />
          </div>
          <h3 class="text-2xl font-display font-bold text-white mb-4">Aucun projet trouvé</h3>
          <p class="text-muted-foreground mb-8">Essayez un autre filtre pour voir nos réalisations</p>
          <button
            @click="filterProjects('all')"
            class="px-8 py-4 bg-gradient-to-r from-primary to-accent text-white rounded-full font-semibold transition-all duration-300 hover:scale-105 hover:shadow-lg hover:shadow-primary/50"
          >
            Voir tous les projets
          </button>
        </div>
      </div>
    </section>

    <!-- Stats Section -->
    <section class="py-20 relative overflow-hidden">
      <div class="absolute inset-0 bg-gradient-to-b from-background via-primary/5 to-background" />

      <div class="container mx-auto px-6 lg:px-12 relative z-10">
        <div class="max-w-6xl mx-auto">
          <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
            <div class="text-center glass-strong rounded-2xl p-8 hover:scale-105 transition-transform duration-300">
              <div class="text-4xl sm:text-5xl font-display font-bold gradient-text mb-3 drop-shadow-[0_0_20px_rgba(108,76,255,0.5)]">
                50+
              </div>
              <div class="text-sm text-muted-foreground">Projets livrés</div>
            </div>
            <div class="text-center glass-strong rounded-2xl p-8 hover:scale-105 transition-transform duration-300">
              <div class="text-4xl sm:text-5xl font-display font-bold gradient-text mb-3 drop-shadow-[0_0_20px_rgba(108,76,255,0.5)]">
                98%
              </div>
              <div class="text-sm text-muted-foreground">Satisfaction client</div>
            </div>
            <div class="text-center glass-strong rounded-2xl p-8 hover:scale-105 transition-transform duration-300">
              <div class="text-4xl sm:text-5xl font-display font-bold gradient-text mb-3 drop-shadow-[0_0_20px_rgba(108,76,255,0.5)]">
                3
              </div>
              <div class="text-sm text-muted-foreground">Pôles d'expertise</div>
            </div>
            <div class="text-center glass-strong rounded-2xl p-8 hover:scale-105 transition-transform duration-300">
              <div class="text-4xl sm:text-5xl font-display font-bold gradient-text mb-3 drop-shadow-[0_0_20px_rgba(108,76,255,0.5)]">
                5+
              </div>
              <div class="text-sm text-muted-foreground">Années d'expérience</div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- CTA Section -->
    <section class="py-32 relative overflow-hidden">
      <!-- Animated background -->
      <div class="absolute inset-0 bg-gradient-to-b from-background via-primary/10 to-background" />
      <div class="absolute inset-0 overflow-hidden">
        <div class="absolute top-1/2 left-1/4 w-[500px] h-[500px] bg-primary/20 rounded-full blur-[120px] animate-float" />
        <div class="absolute bottom-1/4 right-1/4 w-[400px] h-[400px] bg-accent/20 rounded-full blur-[120px] animate-float" style="animation-delay: 1.5s;" />
      </div>

      <div class="container mx-auto px-6 lg:px-12 relative z-10">
        <div class="max-w-5xl mx-auto">
          <!-- Main CTA Card -->
          <div class="glass-strong rounded-3xl p-12 md:p-16 border border-primary/30 hover:border-primary/50 transition-all duration-500 hover:shadow-2xl hover:shadow-primary/20">
            <div class="text-center">
              <!-- Icon -->
              <div class="inline-flex items-center justify-center w-20 h-20 rounded-2xl bg-gradient-to-br from-primary to-accent mb-8 shadow-xl shadow-primary/30 animate-float">
                <PhRocket :size="40" class="text-white" weight="duotone" />
              </div>

              <!-- Title -->
              <h2 class="text-3xl sm:text-4xl md:text-5xl lg:text-6xl font-display font-bold mb-6 text-white leading-tight">
                Prêt à créer le <br />
                <span class="gradient-text drop-shadow-[0_0_30px_rgba(108,76,255,0.5)]">prochain projet</span> ?
              </h2>

              <!-- Description -->
              <p class="text-xl md:text-2xl text-muted-foreground mb-12 max-w-3xl mx-auto leading-relaxed">
                Rejoignez nos clients satisfaits et donnons vie ensemble à votre vision
              </p>

              <!-- CTAs -->
              <div class="flex flex-col sm:flex-row gap-5 justify-center items-center">
                <button
                  @click="scrollToContact"
                  class="group relative px-10 py-5 bg-gradient-to-r from-primary to-accent text-white rounded-full font-semibold text-lg transition-all duration-300 hover:scale-110 hover:shadow-2xl hover:shadow-primary/50 inline-flex items-center gap-3 overflow-hidden"
                >
                  <span class="absolute inset-0 bg-white/20 translate-y-full group-hover:translate-y-0 transition-transform duration-300"></span>
                  <span class="relative">Démarrer un projet</span>
                  <PhArrowRight :size="24" class="group-hover:translate-x-2 transition-transform relative" weight="bold" />
                </button>

                <Link
                  href="/#services"
                  class="group px-8 py-5 glass-strong hover:bg-white/10 text-white rounded-full font-semibold text-lg transition-all duration-300 hover:scale-105 inline-flex items-center gap-3 border border-white/20 hover:border-primary/50"
                >
                  <span>Nos services</span>
                  <PhArrowRight :size="24" class="group-hover:translate-x-2 transition-transform" weight="bold" />
                </Link>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <PremiumFooter :data="companyData.entreprise" />
  </div>
</template>
