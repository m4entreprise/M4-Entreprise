<script setup lang="ts">
import { ref, onMounted } from 'vue';
import { Head } from '@inertiajs/vue3';
import {
  PhEnvelope,
  PhPhone,
  PhMapPin,
  PhPaperPlane,
  PhUser,
  PhBuildings,
  PhCheckCircle,
} from '@phosphor-icons/vue';
import PremiumHeader from '@/components/layout/PremiumHeader.vue';
import PremiumFooter from '@/components/layout/PremiumFooter.vue';
import companyData from '../../../docs/datas.json';

const isHeaderCompact = ref(false);
const isSubmitting = ref(false);
const submitSuccess = ref(false);

const form = ref({
  name: '',
  email: '',
  company: '',
  phone: '',
  service: '',
  message: '',
});

const services = [
  'Développement Web',
  'Consulting IT',
  'Production Média',
  'Autre',
];

const handleScroll = () => {
  isHeaderCompact.value = window.scrollY > 100;
};

const submitForm = async () => {
  isSubmitting.value = true;
  
  // Simuler l'envoi du formulaire
  setTimeout(() => {
    isSubmitting.value = false;
    submitSuccess.value = true;
    
    // Réinitialiser le formulaire
    form.value = {
      name: '',
      email: '',
      company: '',
      phone: '',
      service: '',
      message: '',
    };
    
    // Masquer le message de succès après 5 secondes
    setTimeout(() => {
      submitSuccess.value = false;
    }, 5000);
  }, 1500);
};

onMounted(() => {
  window.addEventListener('scroll', handleScroll);
});
</script>

<template>
  <Head title="Contact - M4 Entreprise" />

  <div class="min-h-screen bg-background text-foreground">
    <PremiumHeader :is-compact="isHeaderCompact" />

    <!-- Hero Section -->
    <section class="relative min-h-[60vh] flex items-center justify-center overflow-hidden pt-32 pb-20">
      <!-- Background gradient -->
      <div class="absolute inset-0 bg-gradient-to-b from-primary/20 via-background to-background" />

      <!-- Animated background elements -->
      <div class="absolute inset-0 overflow-hidden">
        <div class="absolute top-1/4 left-1/4 w-[600px] h-[600px] bg-primary/30 rounded-full blur-[120px] animate-float" />
        <div class="absolute bottom-1/4 right-1/4 w-[500px] h-[500px] bg-accent/25 rounded-full blur-[120px] animate-float" style="animation-delay: 2s;" />
      </div>

      <!-- Content -->
      <div class="container mx-auto px-6 lg:px-12 relative z-10">
        <div class="max-w-4xl mx-auto text-center">
          <!-- Badge -->
          <div class="inline-flex items-center gap-2 px-4 py-2 glass-strong rounded-full border border-primary/30 mb-8">
            <PhEnvelope :size="16" class="text-primary" weight="duotone" />
            <span class="text-sm font-medium text-white">Parlons de votre projet</span>
          </div>

          <h1 class="text-4xl sm:text-5xl md:text-6xl lg:text-7xl xl:text-8xl font-display font-bold mb-8 leading-[1.05]">
            <span class="gradient-text drop-shadow-[0_0_40px_rgba(108,76,255,0.6)]">Contactez-nous</span>
          </h1>

          <p class="text-xl md:text-2xl text-foreground/80 mb-8 max-w-3xl mx-auto font-medium leading-relaxed">
            Une question ? Un projet ? Notre équipe est là pour vous répondre
          </p>
        </div>
      </div>
    </section>

    <!-- Contact Section -->
    <section class="py-20 relative">
      <div class="container mx-auto px-6 lg:px-12">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 max-w-7xl mx-auto">
          <!-- Contact Info -->
          <div class="space-y-8">
            <div>
              <h2 class="text-3xl sm:text-4xl font-display font-bold text-white mb-6">
                Nos coordonnées
              </h2>
              <p class="text-lg text-foreground/70 mb-8">
                N'hésitez pas à nous contacter par téléphone, email ou via le formulaire ci-contre.
              </p>
            </div>

            <!-- Contact Cards -->
            <div class="space-y-4">
              <a
                :href="`mailto:${companyData.entreprise.coordonnees.email}`"
                class="group flex items-start gap-4 p-6 glass-strong rounded-2xl border border-white/10 hover:border-primary/50 transition-all duration-300 hover:scale-[1.02]"
              >
                <div class="w-12 h-12 rounded-xl bg-primary/20 flex items-center justify-center group-hover:bg-primary/30 transition-colors">
                  <PhEnvelope :size="24" class="text-primary" weight="duotone" />
                </div>
                <div>
                  <h3 class="font-semibold text-white mb-1">Email</h3>
                  <p class="text-foreground/70">{{ companyData.entreprise.coordonnees.email }}</p>
                </div>
              </a>

              <a
                :href="`tel:${companyData.entreprise.coordonnees.telephone}`"
                class="group flex items-start gap-4 p-6 glass-strong rounded-2xl border border-white/10 hover:border-primary/50 transition-all duration-300 hover:scale-[1.02]"
              >
                <div class="w-12 h-12 rounded-xl bg-primary/20 flex items-center justify-center group-hover:bg-primary/30 transition-colors">
                  <PhPhone :size="24" class="text-primary" weight="duotone" />
                </div>
                <div>
                  <h3 class="font-semibold text-white mb-1">Téléphone</h3>
                  <p class="text-foreground/70">{{ companyData.entreprise.coordonnees.telephone }}</p>
                </div>
              </a>

              <div class="flex items-start gap-4 p-6 glass-strong rounded-2xl border border-white/10">
                <div class="w-12 h-12 rounded-xl bg-primary/20 flex items-center justify-center">
                  <PhMapPin :size="24" class="text-primary" weight="duotone" />
                </div>
                <div>
                  <h3 class="font-semibold text-white mb-1">Adresse</h3>
                  <p class="text-foreground/70">{{ companyData.entreprise.coordonnees.adresse }}</p>
                </div>
              </div>
            </div>

            <!-- Zones d'intervention -->
            <div class="p-6 glass rounded-2xl border border-white/10">
              <h3 class="font-semibold text-white mb-4">Zones d'intervention</h3>
              <div class="flex flex-wrap gap-2">
                <span
                  v-for="zone in companyData.entreprise.zones"
                  :key="zone"
                  class="px-4 py-2 glass-strong rounded-full text-sm text-foreground/80 border border-white/10"
                >
                  {{ zone }}
                </span>
              </div>
            </div>
          </div>

          <!-- Contact Form -->
          <div class="glass-strong rounded-3xl p-8 lg:p-10 border border-white/10">
            <!-- Success Message -->
            <div
              v-if="submitSuccess"
              class="mb-6 p-4 bg-green-500/20 border border-green-500/30 rounded-2xl flex items-center gap-3 animate-fade-in"
            >
              <PhCheckCircle :size="24" class="text-green-400" weight="duotone" />
              <p class="text-green-100 text-sm">Votre message a été envoyé avec succès !</p>
            </div>

            <h3 class="text-2xl font-display font-bold text-white mb-6">
              Envoyez-nous un message
            </h3>

            <form @submit.prevent="submitForm" class="space-y-5">
              <!-- Name -->
              <div>
                <label for="name" class="block text-sm font-medium text-foreground/80 mb-2">
                  Nom complet *
                </label>
                <div class="relative">
                  <PhUser :size="20" class="absolute left-4 top-1/2 -translate-y-1/2 text-foreground/40" />
                  <input
                    id="name"
                    v-model="form.name"
                    type="text"
                    required
                    class="w-full pl-12 pr-4 py-3 bg-background/50 border border-white/10 rounded-xl text-white focus:outline-none focus:border-primary/50 transition-colors"
                    placeholder="Jean Dupont"
                  />
                </div>
              </div>

              <!-- Email -->
              <div>
                <label for="email" class="block text-sm font-medium text-foreground/80 mb-2">
                  Email *
                </label>
                <div class="relative">
                  <PhEnvelope :size="20" class="absolute left-4 top-1/2 -translate-y-1/2 text-foreground/40" />
                  <input
                    id="email"
                    v-model="form.email"
                    type="email"
                    required
                    class="w-full pl-12 pr-4 py-3 bg-background/50 border border-white/10 rounded-xl text-white focus:outline-none focus:border-primary/50 transition-colors"
                    placeholder="jean@exemple.com"
                  />
                </div>
              </div>

              <!-- Company & Phone -->
              <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                <div>
                  <label for="company" class="block text-sm font-medium text-foreground/80 mb-2">
                    Entreprise
                  </label>
                  <div class="relative">
                    <PhBuildings :size="20" class="absolute left-4 top-1/2 -translate-y-1/2 text-foreground/40" />
                    <input
                      id="company"
                      v-model="form.company"
                      type="text"
                      class="w-full pl-12 pr-4 py-3 bg-background/50 border border-white/10 rounded-xl text-white focus:outline-none focus:border-primary/50 transition-colors"
                      placeholder="Ma Société"
                    />
                  </div>
                </div>

                <div>
                  <label for="phone" class="block text-sm font-medium text-foreground/80 mb-2">
                    Téléphone
                  </label>
                  <div class="relative">
                    <PhPhone :size="20" class="absolute left-4 top-1/2 -translate-y-1/2 text-foreground/40" />
                    <input
                      id="phone"
                      v-model="form.phone"
                      type="tel"
                      class="w-full pl-12 pr-4 py-3 bg-background/50 border border-white/10 rounded-xl text-white focus:outline-none focus:border-primary/50 transition-colors"
                      placeholder="+32 XXX XX XX XX"
                    />
                  </div>
                </div>
              </div>

              <!-- Service -->
              <div>
                <label for="service" class="block text-sm font-medium text-foreground/80 mb-2">
                  Service concerné
                </label>
                <select
                  id="service"
                  v-model="form.service"
                  class="w-full px-4 py-3 bg-background/50 border border-white/10 rounded-xl text-white focus:outline-none focus:border-primary/50 transition-colors"
                >
                  <option value="" disabled selected>Sélectionnez un service</option>
                  <option v-for="service in services" :key="service" :value="service">
                    {{ service }}
                  </option>
                </select>
              </div>

              <!-- Message -->
              <div>
                <label for="message" class="block text-sm font-medium text-foreground/80 mb-2">
                  Message *
                </label>
                <textarea
                  id="message"
                  v-model="form.message"
                  required
                  rows="5"
                  class="w-full px-4 py-3 bg-background/50 border border-white/10 rounded-xl text-white focus:outline-none focus:border-primary/50 transition-colors resize-none"
                  placeholder="Décrivez-nous votre projet..."
                ></textarea>
              </div>

              <!-- Submit Button -->
              <button
                type="submit"
                :disabled="isSubmitting"
                class="group w-full px-8 py-4 bg-gradient-to-r from-primary to-accent text-white rounded-full font-semibold text-lg transition-all duration-300 hover:scale-105 hover:shadow-2xl hover:shadow-primary/50 inline-flex items-center justify-center gap-3 disabled:opacity-50 disabled:cursor-not-allowed disabled:hover:scale-100"
              >
                <span>{{ isSubmitting ? 'Envoi en cours...' : 'Envoyer le message' }}</span>
                <PhPaperPlane :size="20" class="group-hover:translate-x-1 transition-transform" weight="bold" />
              </button>
            </form>
          </div>
        </div>
      </div>
    </section>

    <PremiumFooter :data="companyData.entreprise" />
  </div>
</template>
