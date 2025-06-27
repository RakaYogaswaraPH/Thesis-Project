<!-- Preloader -->
<div id="preloader" class="fixed inset-0 z-[9999] bg-white flex items-center justify-center transition-opacity duration-500">
    <div class="relative">
        <!-- Logo Animation -->
        <div class="w-24 h-24 md:w-32 md:h-32 relative z-10 animate-bounce">
            <img src="images/Logo.png" alt="PPMH Logo" class="w-full h-full object-contain">
        </div>

        <!-- Colorful circles animation -->
        <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-32 h-32 md:w-40 md:h-40">
            <!-- Primary color circle -->
            <div class="absolute inset-0 rounded-full bg-primary-500/30 animate-ping"></div>
            <!-- Secondary color circle -->
            <div class="absolute inset-4 rounded-full bg-secondary-500/30 animate-ping animation-delay-300"></div>
        </div>

        <!-- Loading text -->
        <div class="mt-6 text-center font-bold text-gray-700">
            <span class="inline-block animate-pulse">M</span>
            <span class="inline-block animate-pulse animation-delay-100">e</span>
            <span class="inline-block animate-pulse animation-delay-200">m</span>
            <span class="inline-block animate-pulse animation-delay-300">u</span>
            <span class="inline-block animate-pulse animation-delay-400">a</span>
            <span class="inline-block animate-pulse animation-delay-500">t</span>
            <span class="inline-block animate-pulse animation-delay-700">.</span>
            <span class="inline-block animate-pulse animation-delay-800">.</span>
            <span class="inline-block animate-pulse animation-delay-900">.</span>
        </div>
    </div>
</div>

<!-- Custom styles for animation delays -->
<style>
    .animation-delay-100 {
        animation-delay: 0.1s;
    }

    .animation-delay-200 {
        animation-delay: 0.2s;
    }

    .animation-delay-300 {
        animation-delay: 0.3s;
    }

    .animation-delay-400 {
        animation-delay: 0.4s;
    }

    .animation-delay-500 {
        animation-delay: 0.5s;
    }

    .animation-delay-600 {
        animation-delay: 0.6s;
    }

    .animation-delay-700 {
        animation-delay: 0.7s;
    }

    .animation-delay-800 {
        animation-delay: 0.8s;
    }

    .animation-delay-900 {
        animation-delay: 0.9s;
    }
</style>

<script>
    // Wait for the page to fully load
    window.addEventListener('load', function() {
        const preloader = document.getElementById('preloader');

        // Start fade out animation
        if (preloader) {
            preloader.style.opacity = '0';

            // Remove from DOM after animation completes
            setTimeout(function() {
                preloader.style.display = 'none';
            }, 500);
        }
    });
</script>