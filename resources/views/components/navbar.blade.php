<nav id="navbar" class="fixed top-0 left-0 right-0 z-50 transition-all duration-500 ease-in-out bg-transparent">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16 md:h-20">
            <!-- Logo -->
            <div class="flex-shrink-0 flex items-center space-x-5">
                <img src="{{ asset('img/LOGO PUPUKKALTIM.png') }}" alt="LOGO PUPUK KALTIM" class="h-12 w-12 md:h-18 md:w-18 ">
                <a href="#home" class="text-xl md:text-2xl font-bold text-white hover:text-amber-300 transition-colors duration-300 text-glow">
                    WEB PENGELUARAN MATERIAL
                </a>
            </div>

            <!-- Desktop Menu -->
            <div class="hidden md:flex items-center space-x-8">
                <div class="flex items-baseline space-x-8">
                    <a href="{{ url('/') }}" class="nav-link text-white hover:text-amber-300 px-4 py-2 rounded-md text-base font-semibold tracking-wide transition-all duration-300 hover:bg-amber-800/20 relative group text-shadow-sm {{ request()->routeIs('Beranda') || request()->is('/') ? 'text-amber-300 bg-amber-800/30' : '' }}" data-section="Beranda">
                        Beranda
                        <span class="nav-underline absolute bottom-0 left-0 h-0.5 bg-amber-400 transition-all duration-300 {{ request()->routeIs('Beranda') || request()->is('/') ? 'w-full' : 'w-0 group-hover:w-full' }}"></span>
                    </a>
        
                    <a href="{{ url('/about') }}" class="nav-link text-white hover:text-amber-300 px-4 py-2 rounded-md text-base font-semibold tracking-wide transition-all duration-300 hover:bg-amber-800/20 relative group text-shadow-sm {{ request()->is('about') ? 'text-amber-300 bg-amber-800/30' : '' }}" data-section="about">
                        About
                        <span class="nav-underline absolute bottom-0 left-0 h-0.5 bg-amber-400 transition-all duration-300 {{ request()->is('about') ? 'w-full' : 'w-0 group-hover:w-full' }}"></span>
                    </a>
                </div>


            </div>

            <!-- Mobile menu button -->
            <div class="md:hidden">
                <button id="mobile-menu-button" class="text-white hover:text-amber-300 inline-flex items-center justify-center p-2 rounded-md hover:bg-amber-800/20 transition-all duration-300">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path class="hamburger" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path class="close hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div id="mobile-menu" class="md:hidden hidden">
        <div class="px-2 pt-2 pb-3 space-y-1 bg-amber-950/95 backdrop-blur-sm border-t border-amber-800/30">
            <a href="{{ url('/') }}" class="nav-link text-white hover:text-amber-300 block px-4 py-3 rounded-md text-lg font-semibold tracking-wide hover:bg-amber-800/20 transition-all duration-300 text-shadow-sm {{ request()->routeIs('home') || request()->is('/') ? 'text-amber-300 bg-amber-800/30' : '' }}" data-section="home">
                Beranda
            </a>

            <a href="{{ url('/about') }}" class="nav-link text-white hover:text-amber-300 block px-4 py-3 rounded-md text-lg font-semibold tracking-wide hover:bg-amber-800/20 transition-all duration-300 text-shadow-sm {{ request()->is('about') ? 'text-amber-300 bg-amber-800/30' : '' }}" data-section="about">
                About
            </a>


        </div>
    </div>
</nav>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const navbar = document.getElementById('navbar');
        const mobileMenuButton = document.getElementById('mobile-menu-button');
        const mobileMenu = document.getElementById('mobile-menu');
        const hamburger = document.querySelector('.hamburger');
        const close = document.querySelector('.close');

        let lastScrollTop = 0;
        let isMenuOpen = false;

        // Simple navbar scroll behavior
        function updateNavbar() {
            const scrollTop = window.pageYOffset || document.documentElement.scrollTop;

            // Show/hide navbar based on scroll direction
            if (scrollTop > lastScrollTop & scrollTop > 100) {
                // Scrolling down - hide navbar
                navbar.style.transform = 'translateY(-100%)';
            } else {
                // Scrolling up - show navbar
                navbar.style.transform = 'translateY(0)';
            }

            // Change navbar background based on scroll position
            if (scrollTop > 50) {
                // Scrolled - solid background
                navbar.style.background = 'rgba(120,53,15,0.95)';
                navbar.style.backdropFilter = 'blur(10px)';
                navbar.style.boxShadow = '0 4px 6px -1px rgba(120, 53, 15, 0.3)';
            } else {
                // At top - transparent gradient
                navbar.style.background = 'linear-gradient(180deg, rgba(120,53,15,0.8) 0%, rgba(146,64,14,0.5) 50%, transparent 100%)';
                navbar.style.backdropFilter = 'none';
                navbar.style.boxShadow = 'none';
            }

            lastScrollTop = scrollTop <= 0 ? 0 : scrollTop;
        }

        // bagian coklat navbar
        let ticking = false;
        function requestTick() {
            if (!ticking) {
                requestAnimationFrame(updateNavbar);
                ticking = true;
                setTimeout(() => { ticking = false; }, 16); // ~60fps
            }
        }

        window.addEventListener('scroll', requestTick);
        // Initial navbar state
        updateNavbar();
    });
</script>
