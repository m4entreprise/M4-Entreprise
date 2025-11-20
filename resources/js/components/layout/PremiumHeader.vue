<script setup lang="ts">
import { ref } from 'vue';
import { Link } from '@inertiajs/vue3';
import { PhList, PhX, PhCaretDown } from '@phosphor-icons/vue';

defineProps<{
  isCompact: boolean;
}>();

const isMenuOpen = ref(false);
const isServicesOpen = ref(false);
const isWebMenuOpen = ref(false);
const isMobileServicesOpen = ref(false);
const isMobileWebOpen = ref(false);

let servicesCloseTimer: number | null = null;
let webMenuCloseTimer: number | null = null;

const openServicesMenu = () => {
  if (servicesCloseTimer) clearTimeout(servicesCloseTimer);
  isServicesOpen.value = true;
};

const closeServicesMenu = () => {
  servicesCloseTimer = window.setTimeout(() => {
    isServicesOpen.value = false;
    isWebMenuOpen.value = false;
  }, 300);
};

const openWebMenu = () => {
  if (webMenuCloseTimer) clearTimeout(webMenuCloseTimer);
  isWebMenuOpen.value = true;
};

const closeWebMenu = () => {
  webMenuCloseTimer = window.setTimeout(() => {
    isWebMenuOpen.value = false;
  }, 200);
};

const servicesMenu = [
  {
    label: 'Développement Web',
    href: '/services/developpement-web',
    submenu: [
      { label: 'Site Vitrine', href: '/services/site-vitrine' },
      { label: 'E-commerce', href: '/services/ecommerce' },
      { label: 'Sur-mesure', href: '#', disabled: true },
    ]
  },
  { label: 'Consulting IT', href: '/services/consulting-it' },
  { label: 'Production Média', href: '/services/production-media' },
];

const menuItems = [
  { label: 'Portfolio', href: '/portfolio' },
  { label: 'Contact', href: '/contact' },
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
        <Link href="/" class="flex items-center gap-3 group hover:scale-105 transition-transform duration-300">
          <div class="w-12 h-12 rounded-2xl gradient-primary flex items-center justify-center shadow-lg shadow-primary/50 group-hover:shadow-primary/70 transition-all duration-300">
            <span class="text-white font-bold text-xl">M4</span>
          </div>
          <div class="hidden md:block">
            <h1 class="text-2xl font-display font-bold text-white group-hover:text-primary transition-colors duration-300">M4 Entreprise</h1>
            <p class="text-xs text-foreground/60">Solutions digitales premium</p>
          </div>
        </Link>

        <!-- Desktop Menu -->
        <nav class="hidden lg:flex items-center gap-8">
          <!-- Services Dropdown -->
          <div
            class="relative"
            @mouseenter="openServicesMenu"
            @mouseleave="closeServicesMenu"
          >
            <button
              class="relative text-foreground/90 hover:text-white font-medium text-[15px] transition-all duration-300 group flex items-center gap-1"
            >
              Services
              <PhCaretDown :size="16" :class="['transition-transform duration-300', isServicesOpen ? 'rotate-180' : '']" />
              <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-gradient-to-r from-primary to-accent group-hover:w-full transition-all duration-300"></span>
            </button>
            
            <!-- Services Dropdown Menu -->
            <div
              v-if="isServicesOpen"
              class="absolute top-full left-0 mt-2 min-w-[250px] glass-strong rounded-2xl border border-white/10 shadow-2xl shadow-black/50 animate-fade-in"
            >
              <div class="py-2">
                <div
                  v-for="service in servicesMenu"
                  :key="service.label"
                  class="relative"
                  @mouseenter="service.submenu ? openWebMenu() : null"
                  @mouseleave="service.submenu ? closeWebMenu() : null"
                >
                  <a
                    v-if="!service.submenu"
                    :href="service.href"
                    class="block px-6 py-3 text-foreground/90 hover:text-white hover:bg-primary/10 transition-all duration-200 font-medium"
                  >
                    {{ service.label }}
                  </a>
                  
                  <!-- Web Submenu -->
                  <div v-else class="relative">
                    <a
                      :href="service.href"
                      class="flex items-center justify-between px-6 py-3 text-foreground/90 hover:text-white hover:bg-primary/10 transition-all duration-200 font-medium"
                    >
                      {{ service.label }}
                      <PhCaretDown :size="16" class="-rotate-90" />
                    </a>
                    
                    <!-- Web Submenu Items -->
                    <div
                      v-if="isWebMenuOpen"
                      class="absolute left-full top-0 ml-2 min-w-[200px] glass-strong rounded-2xl border border-white/10 shadow-2xl shadow-black/50 animate-fade-in"
                    >
                      <div class="py-2">
                        <a
                          v-for="subitem in service.submenu"
                          :key="subitem.label"
                          :href="subitem.href"
                          :class="[
                            'block px-6 py-3 text-foreground/90 transition-all duration-200 font-medium',
                            subitem.disabled
                              ? 'opacity-50 cursor-not-allowed'
                              : 'hover:text-white hover:bg-primary/10'
                          ]"
                          @click="subitem.disabled ? $event.preventDefault() : null"
                        >
                          {{ subitem.label }}
                          <span v-if="subitem.disabled" class="text-xs text-muted-foreground ml-2">(à venir)</span>
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Other Menu Items -->
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
            href="/#contact"
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
          <!-- Services Mobile -->
          <div>
            <button
              @click="isMobileServicesOpen = !isMobileServicesOpen"
              class="w-full flex items-center justify-between text-foreground/90 hover:text-white hover:bg-primary/10 transition-all duration-300 font-medium py-3 px-4 rounded-xl"
            >
              Services
              <PhCaretDown :size="16" :class="['transition-transform duration-300', isMobileServicesOpen ? 'rotate-180' : '']" />
            </button>
            
            <div v-if="isMobileServicesOpen" class="ml-4 mt-2 space-y-1">
              <div v-for="service in servicesMenu" :key="service.label">
                <a
                  v-if="!service.submenu"
                  :href="service.href"
                  @click="isMenuOpen = false"
                  class="block text-foreground/80 hover:text-white hover:bg-primary/10 transition-all duration-300 py-2 px-4 rounded-lg text-sm"
                >
                  {{ service.label }}
                </a>
                
                <!-- Web with submenu -->
                <div v-else>
                  <button
                    @click="isMobileWebOpen = !isMobileWebOpen"
                    class="w-full flex items-center justify-between text-foreground/80 hover:text-white hover:bg-primary/10 transition-all duration-300 py-2 px-4 rounded-lg text-sm"
                  >
                    {{ service.label }}
                    <PhCaretDown :size="14" :class="['transition-transform duration-300', isMobileWebOpen ? 'rotate-180' : '']" />
                  </button>
                  
                  <div v-if="isMobileWebOpen" class="ml-4 mt-1 space-y-1">
                    <a
                      v-for="subitem in service.submenu"
                      :key="subitem.label"
                      :href="subitem.href"
                      :class="[
                        'block py-2 px-4 rounded-lg text-xs transition-all duration-300',
                        subitem.disabled
                          ? 'text-foreground/50 cursor-not-allowed'
                          : 'text-foreground/70 hover:text-white hover:bg-primary/10'
                      ]"
                      @click="subitem.disabled ? $event.preventDefault() : (isMenuOpen = false)"
                    >
                      {{ subitem.label }}
                      <span v-if="subitem.disabled" class="text-muted-foreground ml-1">(à venir)</span>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Other Items Mobile -->
          <a
            v-for="item in menuItems"
            :key="item.href"
            :href="item.href"
            class="text-foreground/90 hover:text-white hover:bg-primary/10 transition-all duration-300 font-medium py-3 px-4 rounded-xl"
            @click="isMenuOpen = false"
          >
            {{ item.label }}
          </a>

          <a
            href="/#contact"
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
