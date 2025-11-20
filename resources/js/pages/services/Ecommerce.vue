<script setup lang="ts">
import { ref, onMounted } from 'vue';
import { Head, Link } from '@inertiajs/vue3';
import {
  PhShoppingCart,
  PhCheck,
  PhArrowRight,
  PhCreditCard,
  PhTruck,
  PhChartLineUp,
  PhShieldCheck,
  PhUsers,
  PhGear,
  PhLightning,
} from '@phosphor-icons/vue';
import gsap from 'gsap';
import { ScrollTrigger } from 'gsap/ScrollTrigger';
import PremiumHeader from '@/components/layout/PremiumHeader.vue';
import PremiumFooter from '@/components/layout/PremiumFooter.vue';
import companyData from '../../../../docs/datas.json';

gsap.registerPlugin(ScrollTrigger);

const isHeaderCompact = ref(false);
const sectionsRef = ref<HTMLElement[]>([]);

const ecommercePage = companyData.services_details.creation_web.sites_ecommerce;

const features = [
  {
    icon: PhShoppingCart,
    title: 'Catalogue produits',
    description: 'Gestion simple de vos produits et variantes',
  },
  {
    icon: PhCreditCard,
    title: 'Paiements sécurisés',
    description: 'Intégration Stripe, PayPal et autres',
  },
  {
    icon: PhTruck,
    title: 'Gestion livraisons',
    description: 'Suivi des commandes et expéditions',
  },
  {
    icon: PhChartLineUp,
    title: 'Analytics avancés',
    description: 'Statistiques de vente et performance',
  },
  {
    icon: PhUsers,
    title: 'Espace client',
    description: 'Comptes clients et historique',
  },
  {
    icon: PhGear,
    title: 'Automatisation',
    description: 'Emails automatiques et workflows',
  },
];

const processSteps = [
  {
    number: '01',
    title: 'Stratégie',
    description: 'Définition de votre modèle e-commerce',
  },
  {
    number: '02',
    title: 'Design UX/UI',
    description: 'Interface optimisée pour la conversion',
  },
  {
    number: '03',
    title: 'Développement',
    description: 'Intégration complète du système',
  },
  {
    number: '04',
    title: 'Configuration',
    description: 'Paramétrage paiements et livraisons',
  },
  {
    number: '05',
    title: 'Formation',
    description: 'Prise en main de votre boutique',
  },
];

const setSectionRef = (el: any, index: number) => {
  if (el) sectionsRef.value[index] = el;
};

onMounted(() => {
  window.addEventListener('scroll', handleScroll);

  // Animate sections
  sectionsRef.value.forEach((section, index) => {
    gsap.from(section, {
      scrollTrigger: {
        trigger: section,
        start: 'top 80%',
        end: 'bottom 20%',
        toggleActions: 'play none none reverse',
      },
      y: 80,
      opacity: 0,
      duration: 1,
      delay: index * 0.1,
      ease: 'power3.out',
    });
  });
});

const handleScroll = () => {
  isHeaderCompact.value = window.scrollY > 100;
};

const scrollToContact = () => {
  window.location.href = '/contact';
};
</script>

<template>
  <Head title="E-commerce - M4 Entreprise" />

  <div class="min-h-screen bg-background text-foreground">
    <PremiumHeader :is-compact="isHeaderCompact" />

    <!-- Hero Section -->
    <section class="relative min-h-[80vh] flex items-center justify-center overflow-hidden pt-32 pb-20">
      <!-- Background gradient -->
      <div class="absolute inset-0 bg-gradient-to-b from-accent/20 via-background to-background" />

      <!-- Animated background elements -->
      <div class="absolute inset-0 overflow-hidden">
        <div class="absolute top-1/4 left-1/4 w-[600px] h-[600px] bg-accent/30 rounded-full blur-[120px] animate-float" />
        <div class="absolute bottom-1/4 right-1/4 w-[500px] h-[500px] bg-primary/25 rounded-full blur-[120px] animate-float" style="animation-delay: 2s;" />
        <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[400px] h-[400px] bg-accent/20 rounded-full blur-[140px] animate-glow" />
      </div>

      <!-- Content -->
      <div class="container mx-auto px-6 lg:px-12 relative z-10">
        <div class="max-w-5xl mx-auto text-center">
          <!-- Breadcrumb -->
          <div class="mb-8 flex items-center justify-center gap-2 text-sm">
            <Link href="/" class="text-muted-foreground hover:text-primary transition-colors">
              Accueil
            </Link>
            <span class="text-muted-foreground">/</span>
            <Link href="/services/developpement-web" class="text-muted-foreground hover:text-primary transition-colors">
              Services
            </Link>
            <span class="text-muted-foreground">/</span>
            <span class="text-white font-medium">E-commerce</span>
          </div>

          <!-- Badge -->
          <div class="inline-flex items-center gap-2 px-4 py-2 glass-strong rounded-full border border-accent/30 mb-8">
            <PhShoppingCart :size="16" class="text-accent" weight="duotone" />
            <span class="text-sm font-medium text-white">Développement Web</span>
          </div>

          <h1 class="text-4xl sm:text-5xl md:text-6xl lg:text-7xl xl:text-8xl font-display font-bold mb-8 leading-[1.05]">
            <span class="gradient-text drop-shadow-[0_0_40px_rgba(238,75,181,0.6)]">Site E-commerce</span>
          </h1>

          <p class="text-xl md:text-2xl lg:text-3xl text-foreground/80 mb-12 max-w-3xl mx-auto font-medium leading-relaxed">
            {{ ecommercePage.description }}
          </p>

          <div class="flex flex-col sm:flex-row gap-5 justify-center items-center">
            <button
              @click="scrollToContact"
              class="group px-10 py-5 bg-gradient-to-r from-accent to-primary text-white rounded-full font-semibold text-lg transition-all duration-300 hover:scale-110 hover:shadow-2xl hover:shadow-accent/50 inline-flex items-center gap-3"
            >
              <span>Demander un devis</span>
              <PhArrowRight :size="24" class="group-hover:translate-x-2 transition-transform" weight="bold" />
            </button>
          </div>
        </div>
      </div>
    </section>

    <!-- Objectifs Section -->
    <section :ref="(el) => setSectionRef(el, 0)" class="py-20 relative">
      <div class="container mx-auto px-6 lg:px-12">
        <div class="max-w-7xl mx-auto">
          <div class="text-center mb-16">
            <h2 class="text-3xl sm:text-4xl md:text-5xl font-display font-bold text-white mb-6">
              Pourquoi un <span class="gradient-text">site e-commerce</span> ?
            </h2>
            <p class="text-lg text-foreground/70 max-w-2xl mx-auto">
              Vendez vos produits 24/7 et développez votre chiffre d'affaires en ligne
            </p>
          </div>

          <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <div
              v-for="(objectif, index) in ecommercePage.objectifs"
              :key="index"
              class="group p-8 glass-strong rounded-3xl border border-white/10 hover:border-accent/50 transition-all duration-300 hover:scale-[1.02]"
            >
              <div class="flex items-start gap-4">
                <div class="w-10 h-10 rounded-xl bg-accent/20 flex items-center justify-center flex-shrink-0 group-hover:bg-accent/30 transition-colors">
                  <PhCheck :size="24" class="text-accent" weight="bold" />
                </div>
                <p class="text-foreground/90 text-lg leading-relaxed">{{ objectif }}</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Fonctionnalités Section -->
    <section :ref="(el) => setSectionRef(el, 1)" class="py-20 relative overflow-hidden">
      <div class="absolute inset-0 bg-gradient-to-b from-background via-accent/5 to-background" />
      
      <div class="container mx-auto px-6 lg:px-12 relative z-10">
        <div class="max-w-7xl mx-auto">
          <div class="text-center mb-16">
            <h2 class="text-3xl sm:text-4xl md:text-5xl font-display font-bold text-white mb-6">
              <span class="gradient-text">Fonctionnalités</span> essentielles
            </h2>
          </div>

          <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <div
              v-for="feature in features"
              :key="feature.title"
              class="group flex flex-col items-center text-center p-8 glass rounded-3xl border border-white/10 hover:border-accent/30 transition-all duration-300 hover:scale-[1.02]"
            >
              <div class="w-16 h-16 rounded-2xl bg-gradient-to-br from-accent/30 to-primary/30 flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                <component :is="feature.icon" :size="32" class="text-accent" weight="duotone" />
              </div>
              <h3 class="text-xl font-display font-bold text-white mb-3">{{ feature.title }}</h3>
              <p class="text-foreground/70">{{ feature.description }}</p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Fonctionnalités détaillées -->
    <section :ref="(el) => setSectionRef(el, 2)" class="py-20 relative">
      <div class="container mx-auto px-6 lg:px-12">
        <div class="max-w-7xl mx-auto">
          <div class="text-center mb-16">
            <h2 class="text-3xl sm:text-4xl md:text-5xl font-display font-bold text-white mb-6">
              Tout ce dont vous avez <span class="gradient-text">besoin</span>
            </h2>
          </div>

          <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div
              v-for="(fonctionnalite, index) in ecommercePage.fonctionnalites"
              :key="index"
              class="flex items-center gap-4 p-6 glass-strong rounded-2xl border border-white/10 hover:border-accent/30 transition-all duration-300"
            >
              <div class="w-12 h-12 rounded-xl bg-accent/20 flex items-center justify-center flex-shrink-0">
                <PhLightning :size="24" class="text-accent" weight="duotone" />
              </div>
              <p class="text-foreground/90 text-lg">{{ fonctionnalite }}</p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Technologies Section -->
    <section :ref="(el) => setSectionRef(el, 3)" class="py-20 relative overflow-hidden">
      <div class="absolute inset-0 bg-gradient-to-b from-background via-accent/5 to-background" />
      
      <div class="container mx-auto px-6 lg:px-12 relative z-10">
        <div class="max-w-5xl mx-auto">
          <div class="glass-strong rounded-3xl p-12 border border-white/10">
            <div class="text-center mb-12">
              <h2 class="text-3xl sm:text-4xl font-display font-bold text-white mb-6">
                <span class="gradient-text">Technologies</span> utilisées
              </h2>
              <p class="text-lg text-foreground/70 max-w-2xl mx-auto">
                Solutions adaptées à vos besoins et votre budget
              </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
              <div
                v-for="techno in ecommercePage.technos"
                :key="techno"
                class="p-6 glass rounded-2xl border border-white/10 hover:border-accent/30 transition-all duration-300"
              >
                <div class="flex items-center gap-4">
                  <div class="w-12 h-12 rounded-xl bg-accent/20 flex items-center justify-center flex-shrink-0">
                    <PhShieldCheck :size="24" class="text-accent" weight="duotone" />
                  </div>
                  <p class="text-white text-lg font-semibold">{{ techno }}</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Process Section -->
    <section :ref="(el) => setSectionRef(el, 4)" class="py-20 relative">
      <div class="container mx-auto px-6 lg:px-12">
        <div class="max-w-7xl mx-auto">
          <div class="text-center mb-16">
            <h2 class="text-3xl sm:text-4xl md:text-5xl font-display font-bold text-white mb-6">
              Notre <span class="gradient-text">processus</span>
            </h2>
            <p class="text-lg text-foreground/70 max-w-2xl mx-auto">
              De la conception à la mise en ligne de votre boutique
            </p>
          </div>

          <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-8">
            <div
              v-for="(step, index) in processSteps"
              :key="index"
              class="relative group"
            >
              <!-- Connector line (hidden on last item) -->
              <div
                v-if="index < processSteps.length - 1"
                class="hidden lg:block absolute top-16 left-full w-full h-0.5 bg-gradient-to-r from-accent/50 to-transparent -translate-x-1/2"
              />

              <div class="text-center relative z-10">
                <div class="inline-flex items-center justify-center w-32 h-32 rounded-3xl bg-gradient-to-br from-accent/30 to-primary/30 border-4 border-background mb-6 group-hover:scale-110 transition-transform">
                  <span class="text-5xl font-display font-bold gradient-text">{{ step.number }}</span>
                </div>
                <h3 class="text-2xl font-display font-bold text-white mb-3">{{ step.title }}</h3>
                <p class="text-foreground/70">{{ step.description }}</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- CTA Section -->
    <section :ref="(el) => setSectionRef(el, 5)" class="py-32 relative overflow-hidden">
      <div class="absolute inset-0 bg-gradient-to-b from-background via-accent/10 to-background" />
      <div class="absolute inset-0 overflow-hidden">
        <div class="absolute top-1/2 left-1/4 w-[500px] h-[500px] bg-accent/20 rounded-full blur-[120px] animate-float" />
        <div class="absolute bottom-1/4 right-1/4 w-[400px] h-[400px] bg-primary/20 rounded-full blur-[120px] animate-float" style="animation-delay: 1.5s;" />
      </div>

      <div class="container mx-auto px-6 lg:px-12 relative z-10">
        <div class="max-w-4xl mx-auto">
          <div class="glass-strong rounded-3xl p-12 md:p-16 border border-accent/30 hover:border-accent/50 transition-all duration-500 hover:shadow-2xl hover:shadow-accent/20">
            <div class="text-center">
              <div class="inline-flex items-center justify-center w-20 h-20 rounded-2xl bg-gradient-to-br from-accent to-primary mb-8 shadow-xl shadow-accent/30 animate-float">
                <PhShoppingCart :size="40" class="text-white" weight="duotone" />
              </div>

              <h2 class="text-3xl sm:text-4xl md:text-5xl font-display font-bold mb-6 text-white leading-tight">
                Lancez votre <br />
                <span class="gradient-text drop-shadow-[0_0_30px_rgba(238,75,181,0.5)]">boutique en ligne</span>
              </h2>

              <p class="text-xl text-muted-foreground mb-12 max-w-2xl mx-auto leading-relaxed">
                Concrétisons ensemble votre projet e-commerce et développez vos ventes
              </p>

              <div class="flex flex-col sm:flex-row gap-5 justify-center items-center">
                <button
                  @click="scrollToContact"
                  class="group relative px-10 py-5 bg-gradient-to-r from-accent to-primary text-white rounded-full font-semibold text-lg transition-all duration-300 hover:scale-110 hover:shadow-2xl hover:shadow-accent/50 inline-flex items-center gap-3"
                >
                  <span>Demander un devis</span>
                  <PhArrowRight :size="24" class="group-hover:translate-x-2 transition-transform" weight="bold" />
                </button>

                <Link
                  href="/portfolio"
                  class="group px-8 py-5 glass-strong hover:bg-white/10 text-white rounded-full font-semibold text-lg transition-all duration-300 hover:scale-105 inline-flex items-center gap-3 border border-white/20 hover:border-accent/50"
                >
                  <span>Voir nos réalisations</span>
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
