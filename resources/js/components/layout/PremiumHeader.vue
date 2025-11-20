<script setup lang="ts">
import { ref } from 'vue';
import { PhList, PhX } from '@phosphor-icons/vue';

const props = defineProps<{
  isCompact: boolean;
}>();

const isMenuOpen = ref(false);

const menuItems = [
  { label: 'Services', href: '#services' },
  { label: 'Portfolio', href: '#portfolio' },
  { label: 'Méthodologie', href: '#methodologie' },
  { label: 'Contact', href: '#contact' },
];
</script>

<template>
  <header
    :class="[
      'fixed top-0 left-0 right-0 z-50 transition-all duration-500 ease-out',
      isCompact ? 'py-3 glass-strong shadow-2xl' : 'py-6 bg-background/30 backdrop-blur-sm',
    ]"
  >
    <div class="container mx-auto px-6 lg:px-12">
      <div class="flex items-center justify-between">
        <!-- Logo -->
        <a href="#" class="flex items-center gap-3 group hover:scale-105 transition-transform duration-300">
          <div class="w-12 h-12 rounded-2xl gradient-primary flex items-center justify-center shadow-lg shadow-primary/50 group-hover:shadow-primary/70 transition-all duration-300">
            <span class="text-white font-bold text-xl">M4</span>
          </div>
          <div class="hidden md:block">
            <h1 class="text-2xl font-display font-bold text-white group-hover:text-primary transition-colors duration-300">M4 Entreprise</h1>
            <p class="text-xs text-foreground/60">Solutions digitales premium</p>
          </div>
        </a>

        <!-- Desktop Menu -->
        <nav class="hidden lg:flex items-center gap-8">
          <a
            v-for="item in menuItems"
            :key="item.href"
            :href="item.href"
            class="relative text-foreground/90 hover:text-white font-medium text-[15px] transition-all duration-300 group"
          >
            {{ item.label }}
            <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-gradient-to-r from-primary to-accent group-hover:w-full transition-all duration-300"></span>
          </a>
        </nav>

        <!-- CTA Button -->
        <div class="hidden lg:flex items-center gap-4">
          <a
            href="#contact"
            class="px-6 py-3 bg-gradient-to-r from-primary to-accent hover:shadow-lg hover:shadow-primary/50 text-white rounded-full font-semibold transition-all duration-300 hover:scale-105"
          >
            Démarrer un projet
          </a>
        </div>

        <!-- Mobile Menu Button -->
        <button
          @click="isMenuOpen = !isMenuOpen"
          class="lg:hidden p-2 text-foreground hover:text-primary transition-colors"
        >
          <PhList v-if="!isMenuOpen" :size="32" />
          <PhX v-else :size="32" />
        </button>
      </div>

      <!-- Mobile Menu -->
      <div
        v-if="isMenuOpen"
        class="lg:hidden mt-6 py-6 glass-strong rounded-3xl animate-fade-in border border-white/10"
      >
        <nav class="flex flex-col gap-2 px-6">
          <a
            v-for="item in menuItems"
            :key="item.href"
            :href="item.href"
            @click="isMenuOpen = false"
            class="text-foreground/90 hover:text-white hover:bg-primary/10 transition-all duration-300 font-medium py-3 px-4 rounded-xl"
          >
            {{ item.label }}
          </a>
          <a
            href="#contact"
            @click="isMenuOpen = false"
            class="mt-4 px-6 py-3 bg-gradient-to-r from-primary to-accent hover:shadow-lg hover:shadow-primary/50 text-white rounded-full font-semibold text-center transition-all duration-300"
          >
            Démarrer un projet
          </a>
        </nav>
      </div>
    </div>
  </header>
</template>
