<script setup lang="ts">
import { ref, onMounted } from 'vue';
import { Head, Link } from '@inertiajs/vue3';
import {
  PhVideo,
  PhCamera,
  PhPaintBrush,
  PhPrinter,
  PhArrowRight,
  PhCheck,
  PhSparkle,
  PhEye,
  PhLightning,
  PhRocket,
  PhUsers,
} from '@phosphor-icons/vue';
import gsap from 'gsap';
import { ScrollTrigger } from 'gsap/ScrollTrigger';
import PremiumHeader from '@/components/layout/PremiumHeader.vue';
import PremiumFooter from '@/components/layout/PremiumFooter.vue';
import companyData from '../../../../docs/datas.json';

gsap.registerPlugin(ScrollTrigger);

const isHeaderCompact = ref(false);
const sectionsRef = ref<HTMLElement[]>([]);

const mediaServices = [
  {
    id: 'video',
    icon: PhVideo,
    title: 'Production Vidéo',
    gradient: 'from-purple-500 to-pink-500',
    description: 'Créations vidéo professionnelles en 4K/8K pour captiver votre audience',
    features: [
      'Tournage professionnel 4K/8K',
      'Montage et post-production',
      'Motion design et effets spéciaux',
      'Vidéos corporate et publicitaires',
      'Captation d\'événements',
      'Vidéos pour réseaux sociaux',
    ],
  },
  {
    id: 'photo',
    icon: PhCamera,
    title: 'Photographie Pro',
    gradient: 'from-pink-500 to-purple-500',
    description: 'Photos professionnelles qui valorisent votre image de marque',
    features: [
      'Photographie corporate',
      'Photos produits e-commerce',
      'Reportage événementiel',
      'Portraits professionnels',
      'Photos d\'architecture',
      'Retouche professionnelle',
    ],
  },
  {
    id: 'design',
    icon: PhPaintBrush,
    title: 'Identité Visuelle',
    gradient: 'from-purple-600 to-pink-600',
    description: 'Création d\'une identité visuelle unique et mémorable',
    features: [
      'Logo et charte graphique',
      'Branding complet',
      'Design de supports print',
      'Templates réseaux sociaux',
      'Packaging produits',
      'Guidelines de marque',
    ],
  },
  {
    id: 'print',
    icon: PhPrinter,
    title: 'Impression',
    gradient: 'from-pink-600 to-purple-600',
    description: 'Impression professionnelle de tous vos supports de communication',
    features: [
      'Cartes de visite',
      'Flyers et brochures',
      'Affiches et roll-ups',
      'Enseignes et signalétique',
      'Packaging personnalisé',
      'Supports événementiels',
    ],
  },
];

const features = [
  {
    icon: PhSparkle,
    title: 'Créativité',
    description: 'Des concepts originaux et impactants',
  },
  {
    icon: PhEye,
    title: 'Qualité Pro',
    description: 'Matériel haut de gamme et expertise',
  },
  {
    icon: PhLightning,
    title: 'Réactivité',
    description: 'Délais respectés, livrables rapides',
  },
  {
    icon: PhUsers,
    title: 'Collaboration',
    description: 'Écoute et accompagnement personnalisé',
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
  window.location.href = '/#contact';
  window.scrollTo({ top: 0, behavior: 'smooth' });
};
</script>

<template>
  <Head title="Production Média - M4 Entreprise" />

  <div class="min-h-screen bg-background text-foreground">
    <PremiumHeader :is-compact="isHeaderCompact" />

    <!-- Hero Section -->
    <section class="relative min-h-[85vh] flex items-center justify-center overflow-hidden pt-32 pb-20">
      <!-- Background gradient -->
      <div class="absolute inset-0 bg-gradient-to-b from-purple-500/20 via-background to-background" />

      <!-- Animated background elements -->
      <div class="absolute inset-0 overflow-hidden">
        <div class="absolute top-1/4 left-1/4 w-[600px] h-[600px] bg-purple-500/30 rounded-full blur-[120px] animate-float" />
        <div class="absolute bottom-1/4 right-1/4 w-[500px] h-[500px] bg-pink-500/30 rounded-full blur-[120px] animate-float" style="animation-delay: 2s;" />
        <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[400px] h-[400px] bg-purple-600/20 rounded-full blur-[140px] animate-glow" />
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
            <span class="text-white font-medium">Production Média</span>
          </div>

          <!-- Badge avec partenariat -->
          <div class="inline-flex items-center gap-2 px-4 py-2 glass-strong rounded-full border border-purple-500/30 mb-8">
            <div class="w-2 h-2 rounded-full bg-purple-500 shadow-lg shadow-purple-500/50 animate-pulse" />
            <span class="text-sm font-medium text-white">En partenariat avec <span class="text-transparent bg-clip-text bg-gradient-to-r from-purple-400 to-pink-400 font-bold">Kreate</span></span>
          </div>

          <h1 class="text-4xl sm:text-5xl md:text-6xl lg:text-7xl xl:text-8xl font-display font-bold mb-8 leading-[1.05]">
            <span class="text-transparent bg-clip-text bg-gradient-to-r from-purple-400 via-pink-400 to-purple-400 drop-shadow-[0_0_40px_rgba(168,85,247,0.6)]">Production Média</span>
            <br />
            <span class="text-white">& Création Visuelle</span>
          </h1>

          <p class="text-xl md:text-2xl lg:text-3xl text-foreground/80 mb-12 max-w-3xl mx-auto font-medium leading-relaxed">
            Donnez vie à votre vision avec nos services de création vidéo, photo, design et impression
          </p>

          <div class="flex flex-col sm:flex-row gap-5 justify-center items-center">
            <button
              @click="scrollToContact"
              class="group relative px-10 py-5 bg-gradient-to-r from-purple-500 to-pink-500 text-white rounded-full font-semibold text-lg transition-all duration-300 hover:scale-110 hover:shadow-2xl hover:shadow-purple-500/50 flex items-center gap-3 w-full sm:w-auto justify-center overflow-hidden"
            >
              <span class="absolute inset-0 bg-white/20 translate-y-full group-hover:translate-y-0 transition-transform duration-300"></span>
              <span class="relative">Démarrer un projet créatif</span>
              <PhArrowRight :size="24" class="group-hover:translate-x-2 transition-transform relative" weight="bold" />
            </button>
            <a
              href="/#portfolio"
              class="group px-8 py-5 glass-strong hover:bg-white/10 text-white rounded-full font-semibold text-lg transition-all duration-300 hover:scale-105 flex items-center gap-3 border border-white/20 hover:border-purple-500/50 w-full sm:w-auto justify-center"
            >
              <span>Voir notre portfolio</span>
              <PhCamera :size="24" class="group-hover:scale-110 transition-transform" weight="duotone" />
            </a>
          </div>
        </div>
      </div>
    </section>

    <!-- Partnership Banner -->
    <section class="py-16 relative overflow-hidden">
      <div class="absolute inset-0 bg-gradient-to-r from-purple-500/10 via-pink-500/10 to-purple-500/10" />

      <div class="container mx-auto px-6 lg:px-12 relative z-10">
        <div class="max-w-4xl mx-auto text-center glass-strong rounded-3xl p-8 md:p-12 border border-purple-500/30">
          <div class="flex items-center justify-center gap-4 mb-6">
            <div class="text-2xl font-display font-bold text-white">M4 Entreprise</div>
            <div class="w-12 h-0.5 bg-gradient-to-r from-purple-500 to-pink-500" />
            <div class="text-2xl font-display font-bold text-transparent bg-clip-text bg-gradient-to-r from-purple-400 to-pink-400">Kreate</div>
          </div>
          <p class="text-lg text-muted-foreground leading-relaxed">
            Notre partenariat avec <span class="text-white font-semibold">Kreate</span>, studio créatif spécialisé en production audiovisuelle et design,
            nous permet de vous offrir des services média haut de gamme avec l'expertise et le matériel professionnel d'une agence créative reconnue.
          </p>
        </div>
      </div>
    </section>

    <!-- Features Grid -->
    <section class="py-24 relative">
      <div class="container mx-auto px-6 lg:px-12">
        <!-- Section Header -->
        <div class="max-w-3xl mx-auto text-center mb-16">
          <h2 class="text-3xl sm:text-4xl md:text-5xl font-display font-bold mb-6 text-white">
            Notre <span class="text-transparent bg-clip-text bg-gradient-to-r from-purple-400 to-pink-400 drop-shadow-[0_0_30px_rgba(168,85,247,0.5)]">approche créative</span>
          </h2>
          <p class="text-lg text-muted-foreground">
            Des créations qui captivent, inspirent et convertissent
          </p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 max-w-7xl mx-auto">
          <div
            v-for="(feature, index) in features"
            :key="feature.title"
            class="group relative glass-strong rounded-3xl p-8 hover:bg-purple-500/10 transition-all duration-500 hover:scale-105 text-center border border-white/10 hover:border-purple-500/50 hover:shadow-2xl hover:shadow-purple-500/20"
          >
            <!-- Decorative gradient -->
            <div class="absolute inset-0 bg-gradient-to-br from-purple-500/5 to-pink-500/5 opacity-0 group-hover:opacity-100 transition-opacity duration-500 rounded-3xl" />

            <!-- Icon -->
            <div class="relative w-20 h-20 mx-auto mb-6 rounded-2xl bg-gradient-to-br from-purple-500/20 to-pink-500/20 flex items-center justify-center group-hover:scale-110 group-hover:rotate-3 transition-all duration-300 shadow-lg">
              <component :is="feature.icon" :size="36" class="text-purple-400 drop-shadow-[0_0_10px_rgba(168,85,247,0.5)]" weight="duotone" />
            </div>

            <!-- Content -->
            <div class="relative">
              <h3 class="font-display font-bold text-white mb-3 text-lg group-hover:text-purple-400 transition-colors">{{ feature.title }}</h3>
              <p class="text-sm text-muted-foreground leading-relaxed">{{ feature.description }}</p>
            </div>

            <!-- Number indicator -->
            <div class="absolute top-4 right-4 w-8 h-8 rounded-full bg-purple-500/20 flex items-center justify-center text-purple-400 text-xs font-bold opacity-50 group-hover:opacity-100 transition-opacity">
              {{ index + 1 }}
            </div>

            <!-- Decorative element -->
            <div class="absolute -bottom-12 -right-12 w-32 h-32 bg-purple-500/10 rounded-full blur-2xl group-hover:scale-150 transition-transform duration-700" />
          </div>
        </div>
      </div>
    </section>

    <!-- Services Details -->
    <section class="py-32 relative overflow-hidden">
      <!-- Background -->
      <div class="absolute inset-0 bg-gradient-to-b from-background via-purple-500/5 to-background" />

      <div class="container mx-auto px-6 lg:px-12 relative z-10">
        <!-- Section Header -->
        <div class="max-w-3xl mx-auto text-center mb-20">
          <h2 class="text-3xl sm:text-4xl md:text-5xl font-display font-bold mb-6 text-white">
            Nos <span class="text-transparent bg-clip-text bg-gradient-to-r from-purple-400 to-pink-400 drop-shadow-[0_0_30px_rgba(168,85,247,0.5)]">services créatifs</span>
          </h2>
          <p class="text-lg text-muted-foreground">
            De la conception à la réalisation, nous créons du contenu qui marque les esprits
          </p>
        </div>

        <div class="space-y-40">
          <div
            v-for="(service, index) in mediaServices"
            :key="service.id"
            :ref="(el) => setSectionRef(el, index)"
            :class="[
              'grid grid-cols-1 lg:grid-cols-2 gap-16 items-center max-w-7xl mx-auto',
              index % 2 === 1 && 'lg:grid-flow-dense',
            ]"
          >
            <!-- Image/Visual Side -->
            <div :class="index % 2 === 1 && 'lg:col-start-2'">
              <div class="group relative glass-strong rounded-3xl p-12 hover:scale-105 transition-all duration-500 border border-white/10 hover:border-purple-500/50 hover:shadow-2xl hover:shadow-purple-500/20 overflow-hidden">
                <!-- Gradient overlay -->
                <div :class="['absolute inset-0 opacity-10 group-hover:opacity-20 transition-opacity duration-500 bg-gradient-to-br', service.gradient]" />

                <!-- Icon with glow effect -->
                <div class="relative mb-8">
                  <div :class="['w-28 h-28 mx-auto rounded-3xl bg-gradient-to-br flex items-center justify-center shadow-2xl group-hover:scale-110 group-hover:rotate-3 transition-all duration-500', service.gradient]" style="box-shadow: 0 20px 60px rgba(168, 85, 247, 0.4);">
                    <component :is="service.icon" :size="56" class="text-white drop-shadow-lg" weight="duotone" />
                  </div>
                  <!-- Decorative rings -->
                  <div :class="['absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-32 h-32 rounded-full border-2 border-purple-400/30 opacity-0 group-hover:opacity-100 group-hover:scale-150 transition-all duration-700']" />
                </div>

                <!-- Title & Description -->
                <div class="relative text-center">
                  <h2 class="text-3xl sm:text-4xl md:text-5xl font-display font-bold text-white mb-4 group-hover:text-transparent group-hover:bg-clip-text group-hover:bg-gradient-to-r group-hover:from-purple-400 group-hover:to-pink-400 transition-all duration-300">
                    {{ service.title }}
                  </h2>
                  <p class="text-lg text-muted-foreground leading-relaxed">
                    {{ service.description }}
                  </p>
                </div>

                <!-- Decorative corner -->
                <div class="absolute top-0 right-0 w-24 h-24 bg-gradient-to-br from-purple-500/20 to-transparent rounded-bl-full opacity-0 group-hover:opacity-100 transition-opacity duration-500" />
              </div>
            </div>

            <!-- Content Side -->
            <div :class="[index % 2 === 1 && 'lg:col-start-1 lg:row-start-1', 'space-y-8']">
              <!-- Features -->
              <div class="glass-strong rounded-3xl p-8 border border-white/10 hover:border-purple-400/30 transition-all duration-300">
                <div class="flex items-center gap-3 mb-6">
                  <div class="w-10 h-10 rounded-xl bg-purple-500/20 flex items-center justify-center">
                    <PhCheck :size="20" class="text-purple-400" weight="bold" />
                  </div>
                  <h3 class="text-2xl font-display font-bold text-white">Nos prestations</h3>
                </div>
                <ul class="space-y-4">
                  <li
                    v-for="feature in service.features"
                    :key="feature"
                    class="flex items-start gap-4 text-muted-foreground group/item hover:text-white transition-colors"
                  >
                    <div class="w-6 h-6 mt-0.5 rounded-lg bg-purple-500/10 flex items-center justify-center flex-shrink-0 group-hover/item:bg-purple-500/20 transition-colors">
                      <PhCheck :size="16" class="text-purple-400" weight="bold" />
                    </div>
                    <span class="leading-relaxed">{{ feature }}</span>
                  </li>
                </ul>
              </div>

              <!-- CTA Box -->
              <div class="glass-strong rounded-3xl p-8 border border-white/10 bg-gradient-to-br from-purple-500/5 to-pink-500/5">
                <div class="flex items-center gap-3 mb-4">
                  <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-purple-500/20 to-pink-500/20 flex items-center justify-center">
                    <PhRocket :size="20" class="text-purple-400" weight="duotone" />
                  </div>
                  <h4 class="font-display font-bold text-white text-lg">Intéressé par ce service ?</h4>
                </div>
                <p class="text-sm text-muted-foreground mb-6 leading-relaxed">
                  Discutons de votre projet et créons ensemble quelque chose d'exceptionnel
                </p>
                <button
                  @click="scrollToContact"
                  class="group w-full px-6 py-3 bg-gradient-to-r from-purple-500 to-pink-500 text-white rounded-xl font-semibold transition-all duration-300 hover:scale-105 hover:shadow-lg hover:shadow-purple-500/50 flex items-center justify-center gap-2"
                >
                  <span>Demander un devis</span>
                  <PhArrowRight :size="20" class="group-hover:translate-x-1 transition-transform" weight="bold" />
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- CTA Section -->
    <section class="py-32 relative overflow-hidden">
      <!-- Animated background -->
      <div class="absolute inset-0 bg-gradient-to-b from-background via-purple-500/10 to-background" />
      <div class="absolute inset-0 overflow-hidden">
        <div class="absolute top-1/2 left-1/4 w-[500px] h-[500px] bg-purple-500/20 rounded-full blur-[120px] animate-float" />
        <div class="absolute bottom-1/4 right-1/4 w-[400px] h-[400px] bg-pink-500/20 rounded-full blur-[120px] animate-float" style="animation-delay: 1.5s;" />
      </div>

      <div class="container mx-auto px-6 lg:px-12 relative z-10">
        <div class="max-w-5xl mx-auto">
          <!-- Main CTA Card -->
          <div class="glass-strong rounded-3xl p-12 md:p-16 border border-purple-500/30 hover:border-purple-500/50 transition-all duration-500 hover:shadow-2xl hover:shadow-purple-500/20">
            <div class="text-center">
              <!-- Icon -->
              <div class="inline-flex items-center justify-center w-20 h-20 rounded-2xl bg-gradient-to-br from-purple-500 to-pink-500 mb-8 shadow-xl shadow-purple-500/30 animate-float">
                <PhSparkle :size="40" class="text-white" weight="duotone" />
              </div>

              <!-- Title -->
              <h2 class="text-3xl sm:text-4xl md:text-5xl lg:text-6xl font-display font-bold mb-6 text-white leading-tight">
                Donnez vie à votre <br />
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-purple-400 to-pink-400 drop-shadow-[0_0_30px_rgba(168,85,247,0.5)]">vision créative</span>
              </h2>

              <!-- Description -->
              <p class="text-xl md:text-2xl text-muted-foreground mb-12 max-w-3xl mx-auto leading-relaxed">
                Notre équipe créative est prête à transformer vos idées en réalisations visuelles exceptionnelles
              </p>

              <!-- CTAs -->
              <div class="flex flex-col sm:flex-row gap-5 justify-center items-center">
                <button
                  @click="scrollToContact"
                  class="group relative px-10 py-5 bg-gradient-to-r from-purple-500 to-pink-500 text-white rounded-full font-semibold text-lg transition-all duration-300 hover:scale-110 hover:shadow-2xl hover:shadow-purple-500/50 inline-flex items-center gap-3 overflow-hidden"
                >
                  <span class="absolute inset-0 bg-white/20 translate-y-full group-hover:translate-y-0 transition-transform duration-300"></span>
                  <span class="relative">Créons ensemble</span>
                  <PhArrowRight :size="24" class="group-hover:translate-x-2 transition-transform relative" weight="bold" />
                </button>

                <a
                  href="/#portfolio"
                  class="group px-8 py-5 glass-strong hover:bg-white/10 text-white rounded-full font-semibold text-lg transition-all duration-300 hover:scale-105 inline-flex items-center gap-3 border border-white/20 hover:border-purple-500/50"
                >
                  <span>Découvrir notre portfolio</span>
                  <PhArrowRight :size="24" class="group-hover:translate-x-2 transition-transform" weight="bold" />
                </a>
              </div>
            </div>

            <!-- Stats Grid -->
            <div class="mt-16 pt-12 border-t border-white/10">
              <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
                <div class="text-center group">
                  <div class="text-3xl sm:text-4xl font-display font-bold text-transparent bg-clip-text bg-gradient-to-r from-purple-400 to-pink-400 mb-2 drop-shadow-[0_0_20px_rgba(168,85,247,0.5)] group-hover:scale-110 transition-transform">
                    300+
                  </div>
                  <div class="text-sm text-muted-foreground group-hover:text-white transition-colors">
                    Créations réalisées
                  </div>
                </div>
                <div class="text-center group">
                  <div class="text-3xl sm:text-4xl font-display font-bold text-transparent bg-clip-text bg-gradient-to-r from-purple-400 to-pink-400 mb-2 drop-shadow-[0_0_20px_rgba(168,85,247,0.5)] group-hover:scale-110 transition-transform">
                    4K/8K
                  </div>
                  <div class="text-sm text-muted-foreground group-hover:text-white transition-colors">
                    Qualité vidéo
                  </div>
                </div>
                <div class="text-center group">
                  <div class="text-3xl sm:text-4xl font-display font-bold text-transparent bg-clip-text bg-gradient-to-r from-purple-400 to-pink-400 mb-2 drop-shadow-[0_0_20px_rgba(168,85,247,0.5)] group-hover:scale-110 transition-transform">
                    100%
                  </div>
                  <div class="text-sm text-muted-foreground group-hover:text-white transition-colors">
                    Clients satisfaits
                  </div>
                </div>
                <div class="text-center group">
                  <div class="text-3xl sm:text-4xl font-display font-bold text-transparent bg-clip-text bg-gradient-to-r from-purple-400 to-pink-400 mb-2 drop-shadow-[0_0_20px_rgba(168,85,247,0.5)] group-hover:scale-110 transition-transform">
                    Pro
                  </div>
                  <div class="text-sm text-muted-foreground group-hover:text-white transition-colors">
                    Matériel haut de gamme
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <PremiumFooter :data="companyData.entreprise" />
  </div>
</template>
