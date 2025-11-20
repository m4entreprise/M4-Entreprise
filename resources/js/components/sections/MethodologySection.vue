<script setup lang="ts">
import { ref, onMounted } from 'vue';
import {
  PhMagnifyingGlass,
  PhPencilRuler,
  PhPaintBrush,
  PhCode,
  PhTestTube,
  PhRocket,
} from '@phosphor-icons/vue';
import gsap from 'gsap';
import { ScrollTrigger } from 'gsap/ScrollTrigger';

gsap.registerPlugin(ScrollTrigger);

const steps = [
  {
    id: 1,
    icon: PhMagnifyingGlass,
    title: 'Analyse',
    description: 'Étude approfondie de vos besoins et de vos objectifs',
    details: ['Audit de l\'existant', 'Définition des objectifs', 'Analyse de la concurrence'],
  },
  {
    id: 2,
    icon: PhPencilRuler,
    title: 'Conception',
    description: 'Architecture et planification de votre solution',
    details: ['Architecture technique', 'Wireframes et maquettes', 'Planification du projet'],
  },
  {
    id: 3,
    icon: PhPaintBrush,
    title: 'Design',
    description: 'Création d\'une identité visuelle unique et impactante',
    details: ['UI/UX Design', 'Prototypes interactifs', 'Design system'],
  },
  {
    id: 4,
    icon: PhCode,
    title: 'Développement',
    description: 'Construction de votre solution avec les meilleures technologies',
    details: ['Code de qualité', 'Best practices', 'Versioning Git'],
  },
  {
    id: 5,
    icon: PhTestTube,
    title: 'Tests',
    description: 'Validation complète de la solution',
    details: ['Tests fonctionnels', 'Tests de performance', 'Tests de sécurité'],
  },
  {
    id: 6,
    icon: PhRocket,
    title: 'Lancement',
    description: 'Mise en production et accompagnement',
    details: ['Déploiement', 'Formation', 'Support continu'],
  },
];

const stepsRef = ref<HTMLElement[]>([]);
const timelineRef = ref<HTMLElement | null>(null);

const setStepRef = (el: any, index: number) => {
  if (el) stepsRef.value[index] = el;
};

onMounted(() => {
  // Animate timeline line
  if (timelineRef.value) {
    gsap.from(timelineRef.value, {
      scrollTrigger: {
        trigger: timelineRef.value,
        start: 'top 80%',
        end: 'bottom 20%',
        scrub: 1,
      },
      scaleY: 0,
      transformOrigin: 'top',
      ease: 'none',
    });
  }

  // Animate each step
  stepsRef.value.forEach((step, index) => {
    gsap.from(step, {
      scrollTrigger: {
        trigger: step,
        start: 'top 80%',
        end: 'bottom 20%',
        toggleActions: 'play none none reverse',
      },
      x: index % 2 === 0 ? -100 : 100,
      opacity: 0,
      duration: 1,
      ease: 'power3.out',
    });
  });
});
</script>

<template>
  <section id="methodologie" class="py-32 relative overflow-hidden">
    <!-- Background -->
    <div class="absolute inset-0 bg-gradient-to-b from-background via-primary/5 to-background" />

    <div class="container mx-auto px-6 lg:px-12 relative z-10">
      <!-- Section Header -->
      <div class="max-w-3xl mx-auto text-center mb-20">
        <h2 class="text-h2 font-display font-bold mb-6">
          Notre <span class="gradient-text">Méthodologie</span>
        </h2>
        <p class="text-body text-muted-foreground">
          Un processus éprouvé pour garantir la réussite de votre projet
        </p>
      </div>

      <!-- Timeline -->
      <div class="max-w-5xl mx-auto relative">
        <!-- Vertical Line -->
        <div
          ref="timelineRef"
          class="absolute left-1/2 top-0 bottom-0 w-1 bg-gradient-to-b from-primary via-accent to-primary transform -translate-x-1/2 hidden lg:block"
        />

        <!-- Steps -->
        <div class="space-y-20">
          <div
            v-for="(step, index) in steps"
            :key="step.id"
            :ref="(el) => setStepRef(el, index)"
            :class="[
              'relative flex items-center gap-8',
              index % 2 === 0 ? 'lg:flex-row' : 'lg:flex-row-reverse',
            ]"
          >
            <!-- Content -->
            <div
              :class="[
                'flex-1',
                index % 2 === 0 ? 'lg:text-right' : 'lg:text-left',
              ]"
            >
              <div class="glass-strong rounded-3xl p-8 hover:scale-105 transition-transform duration-300">
                <div
                  :class="[
                    'flex items-center gap-4 mb-4',
                    index % 2 === 0 ? 'lg:flex-row-reverse lg:justify-end' : 'lg:justify-start',
                  ]"
                >
                  <div class="w-16 h-16 rounded-2xl bg-gradient-to-br from-primary to-accent flex items-center justify-center">
                    <component :is="step.icon" :size="32" class="text-white" weight="duotone" />
                  </div>
                  <div>
                    <div class="text-sm text-primary font-medium mb-1">Étape {{ step.id }}</div>
                    <h3 class="text-2xl font-display font-bold text-white">{{ step.title }}</h3>
                  </div>
                </div>

                <p class="text-muted-foreground mb-4">
                  {{ step.description }}
                </p>

                <ul
                  :class="[
                    'space-y-2',
                    index % 2 === 0 ? 'lg:text-right' : 'lg:text-left',
                  ]"
                >
                  <li
                    v-for="detail in step.details"
                    :key="detail"
                    class="text-sm text-muted-foreground flex items-center gap-2"
                    :class="index % 2 === 0 ? 'lg:flex-row-reverse lg:justify-end' : ''"
                  >
                    <div class="w-1.5 h-1.5 rounded-full bg-primary" />
                    <span>{{ detail }}</span>
                  </li>
                </ul>
              </div>
            </div>

            <!-- Center Icon -->
            <div class="hidden lg:block flex-shrink-0 relative z-10">
              <div class="w-6 h-6 rounded-full bg-primary border-4 border-background shadow-lg shadow-primary/50" />
            </div>

            <!-- Spacer -->
            <div class="hidden lg:block flex-1" />
          </div>
        </div>
      </div>

      <!-- Bottom CTA -->
      <div class="mt-20 text-center">
        <a
          href="#contact"
          class="inline-flex items-center gap-3 px-8 py-4 bg-primary hover:bg-primary/90 text-white rounded-full font-medium transition-all duration-300 hover:scale-105"
        >
          Commençons votre projet
        </a>
      </div>
    </div>
  </section>
</template>
