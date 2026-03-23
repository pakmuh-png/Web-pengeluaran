    <!-- Image Slider -->
    <div class="absolute inset-0">
        <div class="hero-slide active">
            <img src="{{ asset('img/banner-2.jpg') }}"
                 alt="Halaman Gudang Bulk Material"
                 class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-black/40"></div>
        </div>
    </div>
    <!-- Hero Content -->
    <div class="absolute inset-0 flex items-center justify-center text-center z-10">
        <div class="max-w-10xl mx-auto px-10 sm:px-10 lg:px-10">
            <h1 class="text-4xl md:text-6xl lg:text-6xl font-bold text-blue-900 mb-6 animate-fade-in-up">
                Welcome to <span class="text-amber-500">Gudang Bulk Material</span>
                <br>Departement PP&P
            </h1>

            <p class="text-xl md:text-2xl font-bold text-amber-100 mb-8 animate-fade-in-up animation-delay-200">
                PT PUPUK KALIMANTAN TIMUR
            </p>

            <div class="flex flex-col sm:flex-row gap-4 justify-center animate-fade-in-up animation-delay-400">
                <a href="{{ url('/orderrutin') }}" class=" border-5 bg-blue-900 hover:bg-amber-300 text-white px-8 py-4 rounded-lg text-lg font-semibold transition-all duration-200 transform hover:scale-105 hover:shadow-lg">
                    Order Rutin
                </a>
                <a href="{{ url('/orderta') }}" class=" border-5 bg-amber-400 text-white hover:bg-amber-400 hover:text-amber-300 px-8 py-4 rounded-lg text-lg font-semibold transition-all duration-200 transform hover:scale-105">
                    Order TA
                </a>
            </div>
        </div>
    </div>



<script>
    document.addEventListener('DOMContentLoaded', function() {
        const slides = document.querySelectorAll('.hero-slide');
        const indicators = document.querySelectorAll('.slide-indicator');
        const prevButton = document.getElementById('prev-slide');
        const nextButton = document.getElementById('next-slide');

        let currentSlide = 0;
        let slideInterval;

        function showSlide(index) {
            // Hide all slides
            slides.forEach(slide => slide.classList.remove('active'));
            indicators.forEach(indicator => indicator.classList.remove('active'));

            // Show current slide
            slides[index].classList.add('active');
            indicators[index].classList.add('active');

            currentSlide = index;
        }

        function nextSlide() {
            const next = (currentSlide + 1) % slides.length;
            showSlide(next);
        }

        function prevSlide() {
            const prev = (currentSlide - 1 + slides.length) % slides.length;
            showSlide(prev);
        }

        function startAutoSlide() {
            slideInterval = setInterval(nextSlide, 5000);
        }

        function stopAutoSlide() {
            clearInterval(slideInterval);
        }

        // Event listeners
        nextButton.addEventListener('click', () => {
            stopAutoSlide();
            nextSlide();
            startAutoSlide();
        });

        prevButton.addEventListener('click', () => {
            stopAutoSlide();
            prevSlide();
            startAutoSlide();
        });

        indicators.forEach((indicator, index) => {
            indicator.addEventListener('click', () => {
                stopAutoSlide();
                showSlide(index);
                startAutoSlide();
            });
        });

        // Pause auto-slide on hover
        const heroSection = document.getElementById('hero');
        heroSection.addEventListener('mouseenter', stopAutoSlide);
        heroSection.addEventListener('mouseleave', startAutoSlide);

        // Start auto-slide
        startAutoSlide();

        // Touch/swipe support for mobile
        let touchStartX = 0;
        let touchEndX = 0;
        let touchStartY = 0;
        let touchEndY = 0;
        let isSwiping = false;

        heroSection.addEventListener('touchstart', (e) => {
            touchStartX = e.changedTouches[0].screenX;
            touchStartY = e.changedTouches[0].screenY;
            isSwiping = true;
            // Prevent default to avoid scrolling interference
            e.preventDefault();
        }, { passive: false });

        heroSection.addEventListener('touchmove', (e) => {
            if (!isSwiping) return;
            // Prevent default scrolling during swipe
            e.preventDefault();
        }, { passive: false });

        heroSection.addEventListener('touchend', (e) => {
            if (!isSwiping) return;

            touchEndX = e.changedTouches[0].screenX;
            touchEndY = e.changedTouches[0].screenY;
            handleSwipe();
            isSwiping = false;
        });

        // Also handle touchcancel
        heroSection.addEventListener('touchcancel', () => {
            isSwiping = false;
        });

        function handleSwipe() {
            const swipeThreshold = 80; // Increased threshold for better accuracy
            const diffX = touchStartX - touchEndX;
            const diffY = Math.abs(touchStartY - touchEndY);

            // Only trigger swipe if horizontal movement is greater than vertical
            if (Math.abs(diffX) > swipeThreshold && Math.abs(diffX) > diffY) {
                stopAutoSlide();
                if (diffX > 0) {
                    nextSlide(); // Swipe left - next slide
                } else {
                    prevSlide(); // Swipe right - previous slide
                }
                startAutoSlide();

                console.log('Swipe detected:', diffX > 0 ? 'left (next)' : 'right (prev)');
            }
        }
    });
</script>
