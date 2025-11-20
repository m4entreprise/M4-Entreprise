<script setup lang="ts">
import { ref, onMounted } from 'vue';
import { Head, Link } from '@inertiajs/vue3';
import {
  PhShieldCheck,
  PhNetwork,
  PhDesktop,
  PhHeadset,
  PhPhone,
  PhArrowRight,
  PhCheck,
  PhLightning,
  PhLock,
  PhGear,
  PhRocket,
} from '@phosphor-icons/vue';
import gsap from 'gsap';
import { ScrollTrigger } from 'gsap/ScrollTrigger';
import PremiumHeader from '@/components/layout/PremiumHeader.vue';
import PremiumFooter from '@/components/layout/PremiumFooter.vue';
import companyData from '../../../../docs/datas.json';

gsap.registerPlugin(ScrollTrigger);

const isHeaderCompact = ref(false);
const sectionsRef = ref<HTMLElement[]>([]);

const itServices = [
  {
    id: 'cybersecurite',
    icon: PhShieldCheck,
    title: 'Cybersécurité',
    gradient: 'from-primary to-accent',
    description: companyData.services_details.cyber_securite.citation,
    interets: companyData.services_details.cyber_securite.intérêts,
    offres: companyData.services_details.cyber_securite.offres,
  },
  {
    id: 'maintenance',
    icon: PhDesktop,
    title: 'Maintenance Informatique',
    gradient: 'from-accent to-primary',
    ...companyData.services_details.maintenance_informatique,
  },
  {
    id: 'support',
    icon: PhHeadset,
    title: 'Support Informatique',
    gradient: 'from-primary/80 to-accent/80',
    ...companyData.services_details.support_informatique,
  },
  {
    id: 'voip',
    icon: PhPhone,
    title: 'VoIP & Téléphonie',
    gradient: 'from-accent/80 to-primary/80',
    interets: companyData.services_details.voip_telephonie.interets,
    fonctionnalites: companyData.services_details.voip_telephonie['3cx'],
    offre: companyData.services_details.voip_telephonie.offre,
  },
  {
    id: 'wifi',
    icon: PhNetwork,
    title: 'Audit WiFi',
    gradient: 'from-primary/90 to-accent/90',
    objectifs: companyData.services_details.audit_wifi.objectifs,
    offres: companyData.services_details.audit_wifi.offres,
    technos: companyData.services_details.audit_wifi.technos,
  },
];

const features = [
  {
    icon: PhLightning,
    title: 'Réactivité',
    description: 'Intervention rapide et efficace',
  },
  {
    icon: PhLock,
    title: 'Sécurité',
    description: 'Protection maximale de vos données',
  },
  {
    icon: PhGear,
    title: 'Expertise',
    description: 'Techniciens qualifiés et certifiés',
  },
  {
    icon: PhHeadset,
    title: 'Support 24/7',
    description: 'Assistance disponible à tout moment',
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
  <Head title="Consulting IT - M4 Entreprise" />

  <div class="min-h-screen bg-background text-foreground">
    <PremiumHeader :is-compact="isHeaderCompact" />

    <!-- Hero Section -->
    <section class="relative min-h-[85vh] flex items-center justify-center overflow-hidden pt-32 pb-20">
      <!-- Background gradient -->
      <div class="absolute inset-0 bg-gradient-to-b from-accent/20 via-background to-background" />

      <!-- Animated background elements -->
      <div class="absolute inset-0 overflow-hidden">
        <div class="absolute top-1/4 left-1/4 w-[600px] h-[600px] bg-accent/30 rounded-full blur-[120px] animate-float" />
        <div class="absolute bottom-1/4 right-1/4 w-[500px] h-[500px] bg-primary/30 rounded-full blur-[120px] animate-float" style="animation-delay: 2s;" />
        <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[400px] h-[400px] bg-accent/20 rounded-full blur-[140px] animate-glow" />
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
            <span class="text-white font-medium">Consulting IT</span>
          </div>

          <!-- Badge -->
          <div class="inline-flex items-center gap-2 px-4 py-2 glass-strong rounded-full border border-accent/30 mb-8">
            <div class="w-2 h-2 rounded-full bg-accent shadow-lg shadow-accent/50 animate-pulse" />
            <span class="text-sm font-medium text-white">Expertise IT</span>
          </div>

          <h1 class="text-4xl sm:text-5xl md:text-6xl lg:text-7xl xl:text-8xl font-display font-bold mb-8 leading-[1.05]">
            <span class="gradient-text drop-shadow-[0_0_40px_rgba(226,222,255,0.6)]">Consulting IT</span>
            <br />
            <span class="text-white">& Cybersécurité</span>
          </h1>

          <p class="text-xl md:text-2xl lg:text-3xl text-foreground/80 mb-12 max-w-3xl mx-auto font-medium leading-relaxed">
            Sécurisez et optimisez votre infrastructure informatique avec nos experts certifiés
          </p>

          <div class="flex flex-col sm:flex-row gap-5 justify-center items-center">
            <button
              @click="scrollToContact"
              class="group relative px-10 py-5 bg-gradient-to-r from-accent to-primary text-white rounded-full font-semibold text-lg transition-all duration-300 hover:scale-110 hover:shadow-2xl hover:shadow-accent/50 flex items-center gap-3 w-full sm:w-auto justify-center overflow-hidden"
            >
              <span class="absolute inset-0 bg-white/20 translate-y-full group-hover:translate-y-0 transition-transform duration-300"></span>
              <span class="relative">Demander un audit</span>
              <PhArrowRight :size="24" class="group-hover:translate-x-2 transition-transform relative" weight="bold" />
            </button>
            <a
              href="/#portfolio"
              class="group px-8 py-5 glass-strong hover:bg-white/10 text-white rounded-full font-semibold text-lg transition-all duration-300 hover:scale-105 flex items-center gap-3 border border-white/20 hover:border-accent/50 w-full sm:w-auto justify-center"
            >
              <span>Nos références</span>
              <PhShieldCheck :size="24" class="group-hover:scale-110 transition-transform" weight="duotone" />
            </a>
          </div>
        </div>
      </div>
    </section>

    <!-- Features Grid -->
    <section class="py-24 relative">
      <div class="container mx-auto px-6 lg:px-12">
        <!-- Section Header -->
        <div class="max-w-3xl mx-auto text-center mb-16">
          <h2 class="text-3xl sm:text-4xl md:text-5xl font-display font-bold mb-6 text-white">
            Notre <span class="gradient-text drop-shadow-[0_0_30px_rgba(226,222,255,0.5)]">expertise</span>
          </h2>
          <p class="text-lg text-muted-foreground">
            Des solutions IT complètes pour garantir la continuité de votre activité
          </p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 max-w-7xl mx-auto">
          <div
            v-for="(feature, index) in features"
            :key="feature.title"
            class="group relative glass-strong rounded-3xl p-8 hover:bg-accent/10 transition-all duration-500 hover:scale-105 text-center border border-white/10 hover:border-accent/50 hover:shadow-2xl hover:shadow-accent/20"
          >
            <!-- Decorative gradient -->
            <div class="absolute inset-0 bg-gradient-to-br from-accent/5 to-primary/5 opacity-0 group-hover:opacity-100 transition-opacity duration-500 rounded-3xl" />

            <!-- Icon -->
            <div class="relative w-20 h-20 mx-auto mb-6 rounded-2xl bg-gradient-to-br from-accent/20 to-primary/20 flex items-center justify-center group-hover:scale-110 group-hover:rotate-3 transition-all duration-300 shadow-lg">
              <component :is="feature.icon" :size="36" class="text-accent drop-shadow-[0_0_10px_rgba(226,222,255,0.5)]" weight="duotone" />
            </div>

            <!-- Content -->
            <div class="relative">
              <h3 class="font-display font-bold text-white mb-3 text-lg group-hover:text-accent transition-colors">{{ feature.title }}</h3>
              <p class="text-sm text-muted-foreground leading-relaxed">{{ feature.description }}</p>
            </div>

            <!-- Number indicator -->
            <div class="absolute top-4 right-4 w-8 h-8 rounded-full bg-accent/20 flex items-center justify-center text-accent text-xs font-bold opacity-50 group-hover:opacity-100 transition-opacity">
              {{ index + 1 }}
            </div>

            <!-- Decorative element -->
            <div class="absolute -bottom-12 -right-12 w-32 h-32 bg-accent/10 rounded-full blur-2xl group-hover:scale-150 transition-transform duration-700" />
          </div>
        </div>
      </div>
    </section>

    <!-- Services Details -->
    <section class="py-32 relative overflow-hidden">
      <!-- Background -->
      <div class="absolute inset-0 bg-gradient-to-b from-background via-accent/5 to-background" />

      <div class="container mx-auto px-6 lg:px-12 relative z-10">
        <!-- Section Header -->
        <div class="max-w-3xl mx-auto text-center mb-20">
          <h2 class="text-3xl sm:text-4xl md:text-5xl font-display font-bold mb-6 text-white">
            Nos <span class="gradient-text drop-shadow-[0_0_30px_rgba(226,222,255,0.5)]">services IT</span>
          </h2>
          <p class="text-lg text-muted-foreground">
            Un accompagnement complet pour sécuriser, maintenir et optimiser votre infrastructure
          </p>
        </div>

        <div class="space-y-40">
          <div
            v-for="(service, index) in itServices"
            :key="service.id"
            :ref="(el) => setSectionRef(el, index)"
            :class="[
              'grid grid-cols-1 lg:grid-cols-2 gap-16 items-start max-w-7xl mx-auto',
              index % 2 === 1 && 'lg:grid-flow-dense',
            ]"
          >
            <!-- Image/Visual Side -->
            <div :class="index % 2 === 1 && 'lg:col-start-2'">
              <div class="group relative glass-strong rounded-3xl p-12 hover:scale-105 transition-all duration-500 border border-white/10 hover:border-accent/50 hover:shadow-2xl hover:shadow-accent/20 overflow-hidden sticky top-24">
                <!-- Gradient overlay -->
                <div :class="['absolute inset-0 opacity-10 group-hover:opacity-20 transition-opacity duration-500 bg-gradient-to-br', service.gradient]" />

                <!-- Icon with glow effect -->
                <div class="relative mb-8">
                  <div :class="['w-28 h-28 mx-auto rounded-3xl bg-gradient-to-br flex items-center justify-center shadow-2xl group-hover:scale-110 group-hover:rotate-3 transition-all duration-500', service.gradient]" style="box-shadow: 0 20px 60px rgba(226, 222, 255, 0.4);">
                    <component :is="service.icon" :size="56" class="text-white drop-shadow-lg" weight="duotone" />
                  </div>
                  <!-- Decorative rings -->
                  <div :class="['absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-32 h-32 rounded-full border-2 border-accent/30 opacity-0 group-hover:opacity-100 group-hover:scale-150 transition-all duration-700']" />
                </div>

                <!-- Title & Description -->
                <div class="relative text-center">
                  <h2 class="text-3xl sm:text-4xl md:text-5xl font-display font-bold text-white mb-4 group-hover:text-transparent group-hover:bg-clip-text group-hover:bg-gradient-to-r group-hover:from-accent group-hover:to-primary transition-all duration-300">
                    {{ service.title }}
                  </h2>
                  <p v-if="service.description" class="text-lg text-muted-foreground leading-relaxed italic">
                    "{{ service.description }}"
                  </p>
                  <p v-if="service.definition" class="text-lg text-muted-foreground leading-relaxed">
                    {{ service.definition }}
                  </p>
                </div>

                <!-- Decorative corner -->
                <div class="absolute top-0 right-0 w-24 h-24 bg-gradient-to-br from-accent/20 to-transparent rounded-bl-full opacity-0 group-hover:opacity-100 transition-opacity duration-500" />
              </div>
            </div>

            <!-- Content Side -->
            <div :class="[index % 2 === 1 && 'lg:col-start-1 lg:row-start-1', 'space-y-8']">
              <!-- Objectifs / Intérêts -->
              <div v-if="service.objectifs || service.interets" class="glass-strong rounded-3xl p-8 border border-white/10 hover:border-accent/30 transition-all duration-300">
                <div class="flex items-center gap-3 mb-6">
                  <div class="w-10 h-10 rounded-xl bg-accent/20 flex items-center justify-center">
                    <PhCheck :size="20" class="text-accent" weight="bold" />
                  </div>
                  <h3 class="text-2xl font-display font-bold text-white">{{ service.objectifs ? 'Objectifs' : 'Intérêts' }}</h3>
                </div>
                <ul class="space-y-4">
                  <li
                    v-for="item in service.objectifs || service.interets"
                    :key="item"
                    class="flex items-start gap-4 text-muted-foreground group/item hover:text-white transition-colors"
                  >
                    <div class="w-6 h-6 mt-0.5 rounded-lg bg-accent/10 flex items-center justify-center flex-shrink-0 group-hover/item:bg-accent/20 transition-colors">
                      <PhCheck :size="16" class="text-accent" weight="bold" />
                    </div>
                    <span class="leading-relaxed">{{ item }}</span>
                  </li>
                </ul>
              </div>

              <!-- Fonctionnalités / Tâches / Approche -->
              <div v-if="service.fonctionnalites || service.taches || service.approche || service.offre" class="glass-strong rounded-3xl p-8 border border-white/10 hover:border-primary/30 transition-all duration-300">
                <div class="flex items-center gap-3 mb-6">
                  <div class="w-10 h-10 rounded-xl bg-primary/20 flex items-center justify-center">
                    <PhGear :size="20" class="text-primary" weight="duotone" />
                  </div>
                  <h3 class="text-2xl font-display font-bold text-white">
                    {{ service.fonctionnalites ? 'Fonctionnalités 3CX' : service.taches ? 'Tâches' : service.offre ? 'Notre offre' : 'Approche' }}
                  </h3>
                </div>
                <ul class="space-y-4">
                  <li
                    v-for="item in service.fonctionnalites || service.taches || service.approche || service.offre"
                    :key="item"
                    class="flex items-start gap-4 text-muted-foreground group/item hover:text-white transition-colors"
                  >
                    <div class="w-6 h-6 mt-0.5 rounded-lg bg-primary/10 flex items-center justify-center flex-shrink-0 group-hover/item:bg-primary/20 transition-colors">
                      <PhCheck :size="16" class="text-primary" weight="bold" />
                    </div>
                    <span class="leading-relaxed">{{ item }}</span>
                  </li>
                </ul>
              </div>

              <!-- Offres / Parc / Niveaux -->
              <div v-if="service.offres || service.parc || service.niveaux" class="glass-strong rounded-3xl p-8 border border-white/10">
                <h4 class="font-display font-bold text-white mb-5 text-lg flex items-center gap-2">
                  <div class="w-1.5 h-1.5 rounded-full bg-accent animate-pulse" />
                  {{ service.offres ? 'Nos offres' : service.parc ? 'Parc informatique géré' : 'Niveaux de support' }}
                </h4>
                <div class="space-y-4">
                  <template v-if="service.offres">
                    <div v-for="(items, key) in service.offres" :key="key" class="glass rounded-2xl p-4">
                      <h5 class="font-semibold text-white mb-3 capitalize">{{ key.replace('_', ' ') }}</h5>
                      <ul class="space-y-2">
                        <li v-for="item in items" :key="item" class="flex items-center gap-2 text-sm text-muted-foreground">
                          <div class="w-1 h-1 rounded-full bg-accent" />
                          {{ item }}
                        </li>
                      </ul>
                    </div>
                  </template>
                  <template v-else-if="service.parc">
                    <div class="flex flex-wrap gap-3">
                      <span
                        v-for="item in service.parc"
                        :key="item"
                        class="px-5 py-2.5 bg-accent/10 text-accent text-sm font-medium rounded-full border border-accent/30 hover:bg-accent/20 hover:scale-105 hover:shadow-lg hover:shadow-accent/30 transition-all duration-300 cursor-default"
                      >
                        {{ item }}
                      </span>
                    </div>
                  </template>
                  <template v-else-if="service.niveaux">
                    <div v-for="(items, key) in service.niveaux" :key="key" class="glass rounded-2xl p-4">
                      <h5 class="font-semibold text-white mb-3 capitalize">{{ key.replace('niveau', 'Niveau ') }}</h5>
                      <ul class="space-y-2">
                        <li v-for="item in items" :key="item" class="flex items-center gap-2 text-sm text-muted-foreground">
                          <div class="w-1 h-1 rounded-full bg-accent" />
                          {{ item }}
                        </li>
                      </ul>
                    </div>
                  </template>
                </div>
              </div>

              <!-- Technologies WiFi -->
              <div v-if="service.technos && typeof service.technos === 'object'" class="glass-strong rounded-3xl p-8 border border-white/10">
                <h4 class="font-display font-bold text-white mb-5 text-lg flex items-center gap-2">
                  <div class="w-1.5 h-1.5 rounded-full bg-primary animate-pulse" />
                  Technologies WiFi
                </h4>
                <div class="space-y-3">
                  <div class="flex items-center justify-between p-3 glass rounded-xl">
                    <span class="font-semibold text-white">WiFi 4</span>
                    <span class="text-accent font-bold">{{ service.technos.wifi4 }}</span>
                  </div>
                  <div class="flex items-center justify-between p-3 glass rounded-xl">
                    <span class="font-semibold text-white">WiFi 5</span>
                    <span class="text-accent font-bold">{{ service.technos.wifi5 }}</span>
                  </div>
                  <div class="flex items-center justify-between p-3 glass rounded-xl">
                    <span class="font-semibold text-white">WiFi 6</span>
                    <span class="text-primary font-bold">{{ service.technos.wifi6 }}</span>
                  </div>
                  <div class="mt-4 flex flex-wrap gap-2">
                    <span
                      v-for="carac in service.technos.caracteristiques"
                      :key="carac"
                      class="px-4 py-2 bg-primary/10 text-primary text-xs font-medium rounded-full border border-primary/30"
                    >
                      {{ carac }}
                    </span>
                  </div>
                </div>
              </div>

              <!-- Avantages -->
              <div v-if="service.avantages" class="glass-strong rounded-3xl p-8 border border-white/10 hover:border-accent/30 transition-all duration-300">
                <div class="flex items-center gap-3 mb-6">
                  <div class="w-10 h-10 rounded-xl bg-accent/20 flex items-center justify-center">
                    <PhRocket :size="20" class="text-accent" weight="duotone" />
                  </div>
                  <h3 class="text-2xl font-display font-bold text-white">Avantages</h3>
                </div>
                <ul class="space-y-4">
                  <li
                    v-for="item in service.avantages"
                    :key="item"
                    class="flex items-start gap-4 text-muted-foreground group/item hover:text-white transition-colors"
                  >
                    <div class="w-6 h-6 mt-0.5 rounded-lg bg-accent/10 flex items-center justify-center flex-shrink-0 group-hover/item:bg-accent/20 transition-colors">
                      <PhCheck :size="16" class="text-accent" weight="bold" />
                    </div>
                    <span class="leading-relaxed">{{ item }}</span>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- CTA Section -->
    <section class="py-32 relative overflow-hidden">
      <!-- Animated background -->
      <div class="absolute inset-0 bg-gradient-to-b from-background via-accent/10 to-background" />
      <div class="absolute inset-0 overflow-hidden">
        <div class="absolute top-1/2 left-1/4 w-[500px] h-[500px] bg-accent/20 rounded-full blur-[120px] animate-float" />
        <div class="absolute bottom-1/4 right-1/4 w-[400px] h-[400px] bg-primary/20 rounded-full blur-[120px] animate-float" style="animation-delay: 1.5s;" />
      </div>

      <div class="container mx-auto px-6 lg:px-12 relative z-10">
        <div class="max-w-5xl mx-auto">
          <!-- Main CTA Card -->
          <div class="glass-strong rounded-3xl p-12 md:p-16 border border-accent/30 hover:border-accent/50 transition-all duration-500 hover:shadow-2xl hover:shadow-accent/20">
            <div class="text-center">
              <!-- Icon -->
              <div class="inline-flex items-center justify-center w-20 h-20 rounded-2xl bg-gradient-to-br from-accent to-primary mb-8 shadow-xl shadow-accent/30 animate-float">
                <PhShieldCheck :size="40" class="text-white" weight="duotone" />
              </div>

              <!-- Title -->
              <h2 class="text-3xl sm:text-4xl md:text-5xl lg:text-6xl font-display font-bold mb-6 text-white leading-tight">
                Sécurisez votre <br />
                <span class="gradient-text drop-shadow-[0_0_30px_rgba(226,222,255,0.5)]">infrastructure IT</span>
              </h2>

              <!-- Description -->
              <p class="text-xl md:text-2xl text-muted-foreground mb-12 max-w-3xl mx-auto leading-relaxed">
                Nos experts réalisent un audit complet et vous accompagnent dans l'optimisation de votre système informatique
              </p>

              <!-- CTAs -->
              <div class="flex flex-col sm:flex-row gap-5 justify-center items-center">
                <button
                  @click="scrollToContact"
                  class="group relative px-10 py-5 bg-gradient-to-r from-accent to-primary text-white rounded-full font-semibold text-lg transition-all duration-300 hover:scale-110 hover:shadow-2xl hover:shadow-accent/50 inline-flex items-center gap-3 overflow-hidden"
                >
                  <span class="absolute inset-0 bg-white/20 translate-y-full group-hover:translate-y-0 transition-transform duration-300"></span>
                  <span class="relative">Demander un audit gratuit</span>
                  <PhArrowRight :size="24" class="group-hover:translate-x-2 transition-transform relative" weight="bold" />
                </button>

                <a
                  href="/#services"
                  class="group px-8 py-5 glass-strong hover:bg-white/10 text-white rounded-full font-semibold text-lg transition-all duration-300 hover:scale-105 inline-flex items-center gap-3 border border-white/20 hover:border-accent/50"
                >
                  <span>Tous nos services</span>
                  <PhArrowRight :size="24" class="group-hover:translate-x-2 transition-transform" weight="bold" />
                </a>
              </div>
            </div>

            <!-- Stats Grid -->
            <div class="mt-16 pt-12 border-t border-white/10">
              <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
                <div class="text-center group">
                  <div class="text-3xl sm:text-4xl font-display font-bold gradient-text mb-2 drop-shadow-[0_0_20px_rgba(226,222,255,0.5)] group-hover:scale-110 transition-transform">
                    200+
                  </div>
                  <div class="text-sm text-muted-foreground group-hover:text-white transition-colors">
                    Audits réalisés
                  </div>
                </div>
                <div class="text-center group">
                  <div class="text-3xl sm:text-4xl font-display font-bold gradient-text mb-2 drop-shadow-[0_0_20px_rgba(226,222,255,0.5)] group-hover:scale-110 transition-transform">
                    99.9%
                  </div>
                  <div class="text-sm text-muted-foreground group-hover:text-white transition-colors">
                    Uptime garanti
                  </div>
                </div>
                <div class="text-center group">
                  <div class="text-3xl sm:text-4xl font-display font-bold gradient-text mb-2 drop-shadow-[0_0_20px_rgba(226,222,255,0.5)] group-hover:scale-110 transition-transform">
                    &lt;2h
                  </div>
                  <div class="text-sm text-muted-foreground group-hover:text-white transition-colors">
                    Temps de réponse
                  </div>
                </div>
                <div class="text-center group">
                  <div class="text-3xl sm:text-4xl font-display font-bold gradient-text mb-2 drop-shadow-[0_0_20px_rgba(226,222,255,0.5)] group-hover:scale-110 transition-transform">
                    24/7
                  </div>
                  <div class="text-sm text-muted-foreground group-hover:text-white transition-colors">
                    Support disponible
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
