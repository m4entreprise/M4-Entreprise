<script setup lang="ts">
import { PhEnvelope, PhPhone, PhMapPin, PhLinkedinLogo, PhFacebookLogo, PhInstagramLogo } from '@phosphor-icons/vue';

const props = defineProps<{
  data: {
    nom: string;
    baseline: string;
    coordonnees: {
      adresse: string;
      telephone: string;
      email: string;
      tva: string;
    };
    reseaux_sociaux?: {
      instagram?: string;
      facebook?: string;
      linkedin?: string;
    };
  };
}>();

const footerLinks = {
  services: [
    { label: 'Développement Web', href: '/services/developpement-web' },
    { label: 'Consulting IT', href: '/services/consulting-it' },
    { label: 'Production Média', href: '/services/production-media' },
    { label: 'Support & Maintenance', href: '/services/consulting-it' },
  ],
  entreprise: [
    { label: 'À propos', href: '/#about' },
    { label: 'Portfolio', href: '/portfolio' },
    { label: 'Méthodologie', href: '/#methodologie' },
    { label: 'Contact', href: '/#contact' },
  ],
  legal: [
    { label: 'Mentions légales', href: '/legal' },
    { label: 'Politique de confidentialité', href: '/privacy' },
    { label: 'CGV', href: '/cgv' },
  ],
};

const socialLinks = [
  { icon: PhLinkedinLogo, href: props.data.reseaux_sociaux?.linkedin || '#', label: 'LinkedIn' },
  { icon: PhFacebookLogo, href: props.data.reseaux_sociaux?.facebook || '#', label: 'Facebook' },
  { icon: PhInstagramLogo, href: props.data.reseaux_sociaux?.instagram || '#', label: 'Instagram' },
];
</script>

<template>
  <footer class="relative mt-32 border-t border-white/10 bg-gradient-to-b from-background to-card">
    <!-- Main Footer -->
    <div class="container mx-auto px-6 lg:px-12 py-16">
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12">
        <!-- Company Info -->
        <div class="lg:col-span-1">
          <div class="flex items-center gap-3 mb-4">
            <div class="w-12 h-12 rounded-full gradient-primary flex items-center justify-center">
              <span class="text-white font-bold text-xl">M4</span>
            </div>
            <div>
              <h3 class="text-xl font-display font-bold text-white">{{ data.nom }}</h3>
            </div>
          </div>
          <p class="text-muted-foreground mb-6">{{ data.baseline }}</p>

          <!-- Contact Info -->
          <div class="space-y-3">
            <a
              :href="`mailto:${data.coordonnees.email}`"
              class="flex items-center gap-3 text-muted-foreground hover:text-primary transition-colors group"
            >
              <PhEnvelope :size="20" class="group-hover:scale-110 transition-transform" />
              <span class="text-sm">{{ data.coordonnees.email }}</span>
            </a>
            <a
              :href="`tel:${data.coordonnees.telephone}`"
              class="flex items-center gap-3 text-muted-foreground hover:text-primary transition-colors group"
            >
              <PhPhone :size="20" class="group-hover:scale-110 transition-transform" />
              <span class="text-sm">{{ data.coordonnees.telephone }}</span>
            </a>
            <div class="flex items-start gap-3 text-muted-foreground">
              <PhMapPin :size="20" class="mt-0.5" />
              <span class="text-sm">{{ data.coordonnees.adresse }}</span>
            </div>
          </div>
        </div>

        <!-- Services -->
        <div>
          <h4 class="font-display font-semibold text-white mb-4">Services</h4>
          <ul class="space-y-2">
            <li v-for="link in footerLinks.services" :key="link.label">
              <a
                :href="link.href"
                class="text-muted-foreground hover:text-primary transition-colors text-sm"
              >
                {{ link.label }}
              </a>
            </li>
          </ul>
        </div>

        <!-- Entreprise -->
        <div>
          <h4 class="font-display font-semibold text-white mb-4">Entreprise</h4>
          <ul class="space-y-2">
            <li v-for="link in footerLinks.entreprise" :key="link.label">
              <a
                :href="link.href"
                class="text-muted-foreground hover:text-primary transition-colors text-sm"
              >
                {{ link.label }}
              </a>
            </li>
          </ul>
        </div>

        <!-- Legal -->
        <div>
          <h4 class="font-display font-semibold text-white mb-4">Légal</h4>
          <ul class="space-y-2 mb-6">
            <li v-for="link in footerLinks.legal" :key="link.label">
              <a
                :href="link.href"
                class="text-muted-foreground hover:text-primary transition-colors text-sm"
              >
                {{ link.label }}
              </a>
            </li>
          </ul>

          <!-- Social Links -->
          <div class="flex gap-3">
            <a
              v-for="social in socialLinks"
              :key="social.label"
              :href="social.href"
              target="_blank"
              rel="noopener noreferrer"
              :aria-label="social.label"
              class="w-10 h-10 rounded-full glass flex items-center justify-center hover:bg-primary/20 transition-all duration-200 hover:scale-110"
            >
              <component :is="social.icon" :size="20" />
            </a>
          </div>
        </div>
      </div>
    </div>

    <!-- Bottom Bar -->
    <div class="border-t border-border/50">
      <div class="container mx-auto px-6 lg:px-12 py-6">
        <div class="flex flex-col md:flex-row justify-between items-center gap-4">
          <p class="text-sm text-muted-foreground">
            © {{ new Date().getFullYear() }} {{ data.nom }}. Tous droits réservés.
          </p>
          <p class="text-sm text-muted-foreground">
            TVA: {{ data.coordonnees.tva }}
          </p>
        </div>
      </div>
    </div>
  </footer>
</template>
