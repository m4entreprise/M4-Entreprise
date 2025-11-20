<script setup lang="ts">
import { ref } from 'vue';
import {
  PhEnvelope,
  PhPhone,
  PhMapPin,
  PhPaperPlaneTilt,
  PhCheck,
} from '@phosphor-icons/vue';

const props = defineProps<{
  contact: {
    adresse: string;
    telephone: string;
    email: string;
  };
}>();

const formData = ref({
  name: '',
  email: '',
  phone: '',
  company: '',
  service: '',
  message: '',
});

const isSubmitting = ref(false);
const isSubmitted = ref(false);

const services = [
  'Développement Web',
  'E-commerce',
  'Application Métier',
  'Consulting IT',
  'Cybersécurité',
  'Support IT',
  'Production Vidéo',
  'Photographie',
  'Branding',
  'Autre',
];

const handleSubmit = async () => {
  isSubmitting.value = true;

  // Simulate API call
  await new Promise((resolve) => setTimeout(resolve, 2000));

  isSubmitted.value = true;
  isSubmitting.value = false;

  // Reset form after 3 seconds
  setTimeout(() => {
    formData.value = {
      name: '',
      email: '',
      phone: '',
      company: '',
      service: '',
      message: '',
    };
    isSubmitted.value = false;
  }, 3000);
};
</script>

<template>
  <section id="contact" class="py-32 relative overflow-hidden">
    <!-- Background -->
    <div class="absolute inset-0 bg-gradient-to-b from-background via-primary/5 to-background" />

    <div class="container mx-auto px-6 lg:px-12 relative z-10">
      <!-- Section Header -->
      <div class="max-w-3xl mx-auto text-center mb-12 sm:mb-16">
        <h2 class="text-3xl sm:text-4xl md:text-5xl lg:text-h2 font-display font-bold mb-4 sm:mb-6 text-white px-4 sm:px-0">
          Démarrons votre <span class="gradient-text drop-shadow-[0_0_30px_rgba(108,76,255,0.5)]">projet</span>
        </h2>
        <p class="text-base sm:text-lg md:text-xl text-foreground/70 px-4 sm:px-0">
          Parlez-nous de vos besoins, nous vous accompagnerons vers la réussite
        </p>
      </div>

      <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 max-w-6xl mx-auto">
        <!-- Contact Info -->
        <div class="space-y-8">
          <div>
            <h3 class="text-h3 font-display font-bold mb-6">Contactez-nous</h3>
            <p class="text-muted-foreground mb-8">
              Notre équipe est disponible pour répondre à toutes vos questions et vous accompagner dans vos projets digitaux.
            </p>
          </div>

          <!-- Contact Cards -->
          <div class="space-y-4">
            <a
              :href="`mailto:${contact.email}`"
              class="group flex items-start gap-4 glass-strong rounded-2xl p-6 hover:bg-primary/10 transition-all duration-300 hover:scale-105"
            >
              <div class="w-12 h-12 rounded-xl bg-primary/20 flex items-center justify-center group-hover:bg-primary/30 transition-colors">
                <PhEnvelope :size="24" class="text-primary" weight="duotone" />
              </div>
              <div>
                <div class="font-medium text-white mb-1">Email</div>
                <div class="text-sm text-muted-foreground">{{ contact.email }}</div>
              </div>
            </a>

            <a
              :href="`tel:${contact.telephone}`"
              class="group flex items-start gap-4 glass-strong rounded-2xl p-6 hover:bg-primary/10 transition-all duration-300 hover:scale-105"
            >
              <div class="w-12 h-12 rounded-xl bg-primary/20 flex items-center justify-center group-hover:bg-primary/30 transition-colors">
                <PhPhone :size="24" class="text-primary" weight="duotone" />
              </div>
              <div>
                <div class="font-medium text-white mb-1">Téléphone</div>
                <div class="text-sm text-muted-foreground">{{ contact.telephone }}</div>
              </div>
            </a>

            <div class="group flex items-start gap-4 glass-strong rounded-2xl p-6">
              <div class="w-12 h-12 rounded-xl bg-primary/20 flex items-center justify-center">
                <PhMapPin :size="24" class="text-primary" weight="duotone" />
              </div>
              <div>
                <div class="font-medium text-white mb-1">Adresse</div>
                <div class="text-sm text-muted-foreground">{{ contact.adresse }}</div>
              </div>
            </div>
          </div>

          <!-- Availability -->
          <div class="glass-strong rounded-2xl p-6">
            <h4 class="font-display font-semibold text-white mb-3">Disponibilité</h4>
            <div class="space-y-2 text-sm text-muted-foreground">
              <div class="flex justify-between">
                <span>Lundi - Vendredi</span>
                <span class="text-white">9h - 18h</span>
              </div>
              <div class="flex justify-between">
                <span>Week-end</span>
                <span class="text-white">Sur rendez-vous</span>
              </div>
            </div>
          </div>
        </div>

        <!-- Contact Form -->
        <div class="glass-strong rounded-3xl p-8">
          <form @submit.prevent="handleSubmit" class="space-y-6">
            <!-- Name -->
            <div>
              <label class="block text-sm font-medium text-white mb-2">
                Nom complet *
              </label>
              <input
                v-model="formData.name"
                type="text"
                required
                class="w-full px-4 py-3 bg-background/50 border border-border rounded-xl text-white placeholder-muted-foreground focus:outline-none focus:ring-2 focus:ring-primary transition-all"
                placeholder="Jean Dupont"
              />
            </div>

            <!-- Email & Phone -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
              <div>
                <label class="block text-sm font-medium text-white mb-2">
                  Email *
                </label>
                <input
                  v-model="formData.email"
                  type="email"
                  required
                  class="w-full px-4 py-3 bg-background/50 border border-border rounded-xl text-white placeholder-muted-foreground focus:outline-none focus:ring-2 focus:ring-primary transition-all"
                  placeholder="jean@exemple.com"
                />
              </div>

              <div>
                <label class="block text-sm font-medium text-white mb-2">
                  Téléphone
                </label>
                <input
                  v-model="formData.phone"
                  type="tel"
                  class="w-full px-4 py-3 bg-background/50 border border-border rounded-xl text-white placeholder-muted-foreground focus:outline-none focus:ring-2 focus:ring-primary transition-all"
                  placeholder="+32 123 45 67 89"
                />
              </div>
            </div>

            <!-- Company -->
            <div>
              <label class="block text-sm font-medium text-white mb-2">
                Entreprise
              </label>
              <input
                v-model="formData.company"
                type="text"
                class="w-full px-4 py-3 bg-background/50 border border-border rounded-xl text-white placeholder-muted-foreground focus:outline-none focus:ring-2 focus:ring-primary transition-all"
                placeholder="Nom de votre entreprise"
              />
            </div>

            <!-- Service -->
            <div>
              <label class="block text-sm font-medium text-white mb-2">
                Service recherché *
              </label>
              <select
                v-model="formData.service"
                required
                class="w-full px-4 py-3 bg-background/50 border border-border rounded-xl text-white focus:outline-none focus:ring-2 focus:ring-primary transition-all"
              >
                <option value="" disabled>Sélectionnez un service</option>
                <option v-for="service in services" :key="service" :value="service">
                  {{ service }}
                </option>
              </select>
            </div>

            <!-- Message -->
            <div>
              <label class="block text-sm font-medium text-white mb-2">
                Message *
              </label>
              <textarea
                v-model="formData.message"
                required
                rows="5"
                class="w-full px-4 py-3 bg-background/50 border border-border rounded-xl text-white placeholder-muted-foreground focus:outline-none focus:ring-2 focus:ring-primary transition-all resize-none"
                placeholder="Décrivez votre projet..."
              />
            </div>

            <!-- Submit Button -->
            <button
              type="submit"
              :disabled="isSubmitting || isSubmitted"
              :class="[
                'w-full px-6 py-4 rounded-xl font-medium transition-all duration-300 flex items-center justify-center gap-3',
                isSubmitted
                  ? 'bg-success text-white'
                  : 'bg-primary hover:bg-primary/90 text-white hover:scale-105',
                isSubmitting && 'opacity-70 cursor-not-allowed',
              ]"
            >
              <template v-if="isSubmitted">
                <PhCheck :size="24" weight="bold" />
                Message envoyé !
              </template>
              <template v-else-if="isSubmitting">
                Envoi en cours...
              </template>
              <template v-else>
                Envoyer le message
                <PhPaperPlaneTilt :size="24" weight="duotone" />
              </template>
            </button>
          </form>
        </div>
      </div>
    </div>
  </section>
</template>
