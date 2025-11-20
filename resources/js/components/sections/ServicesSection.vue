<script setup lang="ts">
import { ref, onMounted } from 'vue';
import { Link } from '@inertiajs/vue3';
import {
  PhCode,
  PhShieldCheck,
  PhVideo,
  PhArrowRight,
  PhCheckCircle,
} from '@phosphor-icons/vue';
import gsap from 'gsap';
import { ScrollTrigger } from 'gsap/ScrollTrigger';

gsap.registerPlugin(ScrollTrigger);

const props = defineProps<{
  poles: {
    web: { services: string[] };
    consult: { services: string[] };
    media: { services: string[] };
  };
  services: any;
}>();

const servicesData = [
  {
    id: 'web',
    icon: PhCode,
    title: 'Développement Web',
    description: 'Solutions web sur mesure pour votre entreprise',
    color: 'from-primary to-accent',
    services: props.poles.web.services,
    link: '/services/developpement-web',
  },
  {
    id: 'consult',
    icon: PhShieldCheck,
    title: 'Consulting IT',
    description: 'Expertise technique et sécurité informatique',
    color: 'from-accent to-primary',
    services: props.poles.consult.services,
    link: '/services/consulting-it',
  },
  {
    id: 'media',
    icon: PhVideo,
    title: 'Production Média',
    description: 'Création de contenu visuel premium',
    color: 'from-primary/80 to-accent/80',
    services: props.poles.media.services,
    link: '/services/production-media',
  },
];

const cardsRef = ref<HTMLElement[]>([]);

onMounted(() => {
  cardsRef.value.forEach((card, index) => {
    gsap.from(card, {
      scrollTrigger: {
        trigger: card,
        start: 'top 80%',
        end: 'bottom 20%',
        toggleActions: 'play none none reverse',
      },
      y: 100,
      opacity: 0,
      duration: 1,
      delay: index * 0.2,
      ease: 'power3.out',
    });
  });
});

const setCardRef = (el: any, index: number) => {
  if (el) cardsRef.value[index] = el;
};
</script>

<template>
  <section id="services" class="py-32 relative">
    <div class="container mx-auto px-6 lg:px-12">
      <!-- Section Header -->
      <div class="max-w-3xl mx-auto text-center mb-12 sm:mb-20">
        <h2 class="text-3xl sm:text-4xl md:text-5xl lg:text-h2 font-display font-bold mb-4 sm:mb-6 text-white px-4 sm:px-0">
          Nos <span class="gradient-text drop-shadow-[0_0_30px_rgba(108,76,255,0.5)]">Services</span>
        </h2>
        <p class="text-base sm:text-lg md:text-xl text-foreground/70 px-4 sm:px-0">
          Trois pôles d'expertise pour couvrir tous vos besoins digitaux
        </p>
      </div>

      <!-- Services Grid -->
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        <div
          v-for="(service, index) in servicesData"
          :key="service.id"
          :ref="(el) => setCardRef(el, index)"
          class="group relative glass-strong rounded-3xl p-8 hover:scale-105 transition-all duration-500 cursor-pointer overflow-hidden border border-white/10 hover:border-primary/50 hover:shadow-2xl hover:shadow-primary/20"
        >
          <!-- Gradient Overlay on Hover -->
          <div
            :class="[
              'absolute inset-0 opacity-0 group-hover:opacity-20 transition-opacity duration-500 bg-gradient-to-br',
              service.color,
            ]"
          />

          <!-- Icon -->
          <div class="relative mb-6">
            <div
              :class="[
                'w-20 h-20 rounded-2xl bg-gradient-to-br flex items-center justify-center group-hover:scale-110 group-hover:rotate-3 transition-all duration-300 shadow-xl',
                service.color,
              ]"
              style="box-shadow: 0 10px 40px rgba(108, 76, 255, 0.3);"
            >
              <component :is="service.icon" :size="36" class="text-white" weight="duotone" />
            </div>
          </div>

          <!-- Content -->
          <div class="relative">
            <h3 class="text-2xl font-display font-bold mb-3 text-white group-hover:text-accent transition-colors">
              {{ service.title }}
            </h3>
            <p class="text-foreground/70 mb-6 font-medium">
              {{ service.description }}
            </p>

            <!-- Services List -->
            <ul class="space-y-3 mb-6">
              <li
                v-for="(item, idx) in service.services.slice(0, 4)"
                :key="idx"
                class="flex items-start gap-2 text-sm text-foreground/60 group-hover:text-foreground/80 transition-colors"
              >
                <PhCheckCircle :size="20" class="text-primary mt-0.5 flex-shrink-0 drop-shadow-[0_0_10px_rgba(108,76,255,0.5)]" weight="fill" />
                <span>{{ item }}</span>
              </li>
            </ul>

            <!-- CTA -->
            <Link
              :href="service.link"
              class="inline-flex items-center gap-2 text-primary group-hover:gap-4 transition-all duration-300 font-semibold hover:text-accent"
            >
              En savoir plus
              <PhArrowRight :size="20" weight="bold" />
            </Link>
          </div>

          <!-- Decorative element -->
          <div class="absolute -bottom-16 -right-16 w-40 h-40 bg-primary/20 rounded-full blur-3xl group-hover:scale-150 transition-transform duration-700" />
        </div>
      </div>

      <!-- Bottom CTA -->
      <div class="mt-20 text-center">
        <a
          href="#contact"
          class="inline-flex items-center gap-3 px-10 py-5 glass-strong hover:bg-primary/20 rounded-full font-semibold text-lg transition-all duration-300 hover:scale-105 border border-white/20 hover:border-primary/50 hover:shadow-xl hover:shadow-primary/30"
        >
          Découvrir tous nos services
          <PhArrowRight :size="24" weight="bold" />
        </a>
      </div>
    </div>
  </section>
</template>
