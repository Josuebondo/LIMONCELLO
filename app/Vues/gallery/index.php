<?php \Core\Vue::extends('layouts.principal'); ?>
<?php \Core\Vue::debut_section('contenu'); ?>
<style>
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(20px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes scaleInImage {
        from {
            opacity: 0;
            transform: scale(0.95);
        }

        to {
            opacity: 1;
            transform: scale(1);
        }
    }

    @keyframes slideInLeft {
        from {
            opacity: 0;
            transform: translateX(-30px);
        }

        to {
            opacity: 1;
            transform: translateX(0);
        }
    }

    .masonry-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 1.5rem;
        animation: fadeInUp 0.6s ease-out;
        width: 100%;
        auto-rows: auto;
    }

    @media (min-width: 768px) {
        .masonry-grid {
            grid-template-columns: repeat(3, 1fr);
            auto-rows: minmax(250px, auto);
        }
    }

    @media (min-width: 1024px) {
        .masonry-grid {
            grid-template-columns: repeat(4, 1fr);
            auto-rows: minmax(280px, auto);
        }
    }

    .masonry-item {
        break-inside: auto;
        margin-bottom: 0;
        width: 100%;
        min-height: 200px;
        animation: fadeInUp 0.7s ease-out backwards;
        border-radius: 0.75rem;
        overflow: hidden;
        animation-timeline: view();
        animation-range: entry 0% cover 30%;
        display: flex;
        align-items: stretch;
    }

    .masonry-item img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    @media (min-width: 768px) {
        .masonry-item {
            min-height: 250px;
        }
    }

    @media (min-width: 1024px) {
        .masonry-item {
            min-height: 280px;
        }
    }

    .hover-overlay {
        transition: opacity 0.4s ease-out, background-color 0.4s ease-out;
        animation: fadeInUp 0.6s ease-out;
        animation-timeline: view();
        animation-range: entry 10% cover 35%;
    }

    .gallery-hover:hover .hover-overlay {
        opacity: 1;
    }

    /* Page heading animation */
    main>div:first-child {
        animation: slideInLeft 0.8s ease-out;
        animation-timeline: view();
        animation-range: entry 0% cover 40%;
    }

    .content-center {
        animation: fadeInUp 0.8s ease-out;
        animation: slideInLeft 0.8s ease-out;
        animation-timeline: view();
        animation-range: entry 20% cover 50%;
    }

    /* Filter button animations */
    .filter-btn {
        position: relative;
        overflow: hidden;
        transition: all 0.3s ease;
    }

    .filter-btn::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: rgba(255, 255, 255, 0.2);
        transition: left 0.3s ease;
    }

    .filter-btn:hover::before {
        left: 100%;
    }

    .filter-btn.active {
        background-color: #1a4d2e !important;
        color: white !important;
        box-shadow: 0 4px 12px rgba(26, 77, 46, 0.3);
    }

    .filter-btn.active.dark\:bg-\[\#2d4a36\] {
        background-color: #D4AF37 !important;
        color: #1c180d !important;
    }

    /* Gallery items animation on filter */
    .masonry-item {
        transition: opacity 0.4s ease, transform 0.4s ease;
    }

    .masonry-item.hidden {
        opacity: 0;
        transform: scale(0.95);
        pointer-events: none;
    }

    .masonry-item.visible {
        opacity: 1;
        transform: scale(1);
    }

    /* Hide scrollbar but keep functionality */
    .scrollbar-hide {
        -ms-overflow-style: none;
        /* IE and Edge */
        scrollbar-width: none;
        /* Firefox */
    }

    .scrollbar-hide::-webkit-scrollbar {
        display: none;
        /* Chrome, Safari and Opera */
    }

    /* Gallery page header */
    .gallery-header {
        background: linear-gradient(135deg, rgba(255, 253, 247, 0.95) 0%, rgba(244, 240, 231, 0.9) 100%);
    }

    html.dark .gallery-header {
        background: linear-gradient(135deg, rgba(10, 26, 10, 0.95) 0%, rgba(26, 38, 26, 0.9) 100%);
    }

    .gallery-header h1 {
        color: #1c180d;
        font-weight: 900;
        letter-spacing: -0.033em;
        text-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
    }

    html.dark .gallery-header h1 {
        color: #fdfdfb;
        text-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
    }

    .gallery-header p {
        color: #6b5d45;
    }

    html.dark .gallery-header p {
        color: #d4c5a9;
    }

    /* Filter section styling */
    .filter-section {
        background: linear-gradient(135deg, rgba(255, 253, 247, 0.5) 0%, rgba(244, 240, 231, 0.3) 100%);
        backdrop-filter: blur(10px);
        padding: 1.5rem;
        border-radius: 1rem;
        border: 1px solid rgba(26, 77, 46, 0.1);
        margin-bottom: 2rem;
    }

    html.dark .filter-section {
        background: linear-gradient(135deg, rgba(10, 26, 10, 0.5) 0%, rgba(26, 38, 26, 0.3) 100%);
        border: 1px solid rgba(212, 175, 55, 0.1);
    }

    .filter-chips-wrapper {
        display: flex;
        gap: 0.75rem;
        overflow-x: auto;
        padding: 0.5rem 0;
        scroll-behavior: smooth;
    }

    .filter-btn {
        position: relative;
        overflow: hidden;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        white-space: nowrap;
        flex-shrink: 0;
        border: 2px solid transparent;
    }

    .filter-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(26, 77, 46, 0.2);
    }

    html.dark .filter-btn:hover {
        box-shadow: 0 6px 20px rgba(212, 175, 55, 0.15);
    }

    .filter-btn.active {
        background-color: #1a4d2e !important;
        color: #fdfdfb !important;
        border-color: #1a4d2e;
        box-shadow: 0 8px 24px rgba(26, 77, 46, 0.3);
        font-weight: 600;
    }

    html.dark .filter-btn.active {
        background-color: #D4AF37 !important;
        color: #1c180d !important;
        border-color: #D4AF37;
        box-shadow: 0 8px 24px rgba(212, 175, 55, 0.25);
    }

    .filter-btn:not(.active) {
        background-color: rgba(244, 240, 231, 0.8) !important;
        color: #1c180d !important;
        border: 2px solid rgba(26, 77, 46, 0.2);
    }

    html.dark .filter-btn:not(.active) {
        background-color: rgba(45, 74, 54, 0.7) !important;
        color: #d4c5a9 !important;
        border: 2px solid rgba(212, 175, 55, 0.2);
    }

    .filter-btn .material-symbols-outlined {
        font-size: 1.25rem;
        font-weight: 700;
    }
</style>
<main class="w-full mx-auto px-2 md:px-6 lg:px-10 py-8 md:py-12">
    <!-- Page Heading -->
    <div class="gallery-header flex flex-col gap-4 mb-10 animate__bounceIn rounded-xl p-6 md:p-8 lg:p-10">
        <h1 class="text-5xl md:text-6xl font-black leading-tight tracking-[-0.033em] animate__fadeInDown">La Galerie</h1>
        <p class="text-lg font-normal max-w-2xl animate__fadeInUp">
            Découvrez l'âme de l'Italie à travers notre regard. Une immersion visuelle au cœur de notre restaurant d'exception, entre tradition et modernité.
        </p>
    </div>
    <!-- Filter Chips -->
    <div class="filter-section mb-8">
        <div class="filter-chips-wrapper ">
            <button class="filter-btn active flex h-11 shrink-0 items-center justify-center gap-x-2 rounded-full px-6 font-semibold text-sm " data-filter="all">
                Tout
            </button>
            <button class="filter-btn flex h-11 shrink-0 items-center justify-center gap-x-2 rounded-full px-6 font-medium text-sm " data-filter="le-jardin">
                <span class="material-symbols-outlined">park</span>
                <span class="hidden sm:inline">Le Jardin</span>
            </button>
            <button class="filter-btn flex h-11 shrink-0 items-center justify-center gap-x-2 rounded-full px-6 font-medium text-sm " data-filter="nos-plats">
                <span class="material-symbols-outlined">restaurant</span>
                <span class="hidden sm:inline">Nos Plats</span>
            </button>
            <button class="filter-btn flex h-11 shrink-0 items-center justify-center gap-x-2 rounded-full px-6 font-medium text-sm " data-filter="ambiance">
                <span class="material-symbols-outlined">lights</span>
                <span class="hidden sm:inline">L'Ambiance</span>
            </button>
            <button class="filter-btn flex h-11 shrink-0 items-center justify-center gap-x-2 rounded-full px-6 font-medium text-sm " data-filter="evenements">
                <span class="material-symbols-outlined">celebration</span>
                <span class="hidden sm:inline">Événements</span>
            </button>
        </div>
    </div>
    <!-- Masonry Gallery -->
    <div class="masonry-grid">
        <!-- Item 1 -->
        <div class="masonry-item gallery-hover relative group cursor-pointer overflow-hidden rounded-xl bg-gray-200 animate__zoomIn visible" data-category="ambiance">
            <img alt="Restaurant interior" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110 animate__rollIn" data-alt="L'ambiance chaleureuse du restaurant le soir" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBIPBXsGKCNZCrLg9mO4LEjJEBekkEs2CyYxDxn_conGwJDeMPR0QkO6VU8Wa6tlOJJMNeOa4AwfmHI-txIp_qgOS1qx1GHzOy7Gp16zBuigFiKRWZaxHIoQ5B6LHZAZv4aw9pSwGDF1qvPT_KJ1DjbcExCeP3mIANSRmoq-UnAfv4vcvkXPOpJ0_ovXczOqq4rv6pHqY5OSDRpXBDDlEbBhunY2UTQbSsSI23h-XN6BPZRmWWiFgpxcCPQx0-2WvgQ8LhANymd0ozh" />
            <div class="hover-overlay absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent opacity-0 transition-opacity duration-300 flex flex-col justify-end p-6 animate__fadeInUp">
                <span class="text-primary text-xs font-bold tracking-widest uppercase mb-1">Ambiance</span>
                <p class="text-white text-lg font-bold">L'heure dorée au Limoncello</p>
                <div class="mt-4 flex items-center text-white/80 text-sm">
                    <span class="material-symbols-outlined text-sm mr-2">zoom_in</span>
                    Voir en grand
                </div>
            </div>
        </div>
        <!-- Item 2 -->
        <div class="masonry-item gallery-hover relative group cursor-pointer overflow-hidden rounded-xl bg-gray-200 animate__zoomIn visible" data-category="nos-plats">
            <img alt="Italian pizza" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110 animate__rollIn" data-alt="Une pizza napolitaine authentique sortant du four" src="https://lh3.googleusercontent.com/aida-public/AB6AXuAHiXK8OBp2X9KOvpSLpRkfFMmDldOnAVENHs9CQFFPSKufaJaoF1PkRzUr1E56onizP19pKnZCZ36wl9NMg6obdkRCKHOEdSX70PyTGHWsCTuIYmS3R2X3hPtxD0b2dgAkyjpoGnqrV4owCquVGsdTGHIXt-dxQuDGYYgZklbPxlZmyTuRAo5DjKu1Y7957tLTDaIOdDiOyAyIaJ03UD_QY0OvUIiMQcYvc2aninTV-6ktntyafjY02NkHdgoWV4jlH0bpNhE-OiZP" />
            <div class="hover-overlay absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent opacity-0 transition-opacity duration-300 flex flex-col justify-end p-6 animate__fadeInUp">
                <span class="text-primary text-xs font-bold tracking-widest uppercase mb-1">Nos Plats</span>
                <p class="text-white text-lg font-bold">Authentique Pizza Napolitaine</p>
            </div>
        </div>
        <!-- Item 3 -->
        <div class="masonry-item gallery-hover relative group cursor-pointer overflow-hidden rounded-xl bg-gray-200 visible" data-category="le-jardin">
            <img alt="Outdoor terrace" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110" data-alt="Terrasse extérieure fleurie avec citronniers" src="https://lh3.googleusercontent.com/aida-public/AB6AXuA_6xF4tRF-bI7wpLro96jH0Pg-5WRx1QaznLhnTiUwZEMGXF-sITHVf4AJKsewVxlcZ4gvrProsn7kEfrjElsi3AU3nRo5lOopdPcfd2tPDSIaBYKZIfduWn1SG_nCp4vFVbozdquJjD4xF1-D5_krC4uwu3mx0H9eEJ1V7YkIwnwcvvN4tdtvOBQaszFYWasWtTTVIvEsDBkZ-sGGrS7Z_0Lhtly898ILgd4TJvnuMU4InnVjMA56CMNcdZl-ZPbgS4plog1PqPcG" />
            <div class="hover-overlay absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent opacity-0 transition-opacity duration-300 flex flex-col justify-end p-6">
                <span class="text-primary text-xs font-bold tracking-widest uppercase mb-1">Le Jardin</span>
                <p class="text-white text-lg font-bold">Le calme de nos citronniers</p>
            </div>
        </div>
        <!-- Item 4 -->
        <div class="masonry-item gallery-hover relative group cursor-pointer overflow-hidden rounded-xl bg-gray-200 visible" data-category="nos-plats">
            <img alt="Pasta dish" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110" data-alt="Pâtes fraîches maison aux fruits de mer" src="https://lh3.googleusercontent.com/aida-public/AB6AXuA_M7VqGPZJmEya0Uvi4-XbV8beEJuMHS4BRSOipfdkIkAMRJTI6iIwRdw-qMx1Dhwg2FLyD_Hw4HPnfK-3GU2b3xknL_3lUeyoWu6uQbWkQ0k6NT5-Ju7czyBHQz-nLuxWzfjOIugMBcHgZFEEvJJJh5yzg0uiVSpgqsYHm4Ga08YXGTA_WSgfuWvCrjb5j25ufYGkypxsUBbTFxLBxpRMITR7xX6AN3YyBHegE7Zgq5WcGNHFdyS0tGOy5M1ssyRYEoml9k2enmBf" />
            <div class="hover-overlay absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent opacity-0 transition-opacity duration-300 flex flex-col justify-end p-6">
                <span class="text-primary text-xs font-bold tracking-widest uppercase mb-1">Nos Plats</span>
                <p class="text-white text-lg font-bold">Linguine allo Scoglio</p>
            </div>
        </div>
        <!-- Item 5 -->
        <div class="masonry-item gallery-hover relative group cursor-pointer overflow-hidden rounded-xl bg-gray-200 visible" data-category="evenements">
            <img alt="Private event" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110" data-alt="Table dressée pour un événement privé élégant" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDpDSBhLlt-0dPPxbzebh64YwTwYp_VHXseUssn3nnQH7edTMLzN-hE7Zm-EGb4ZQYjWd3otmXEHeKTMBN8CEYPIV9MyQwMEqjHhAYErmBmvt8cBUmsvF0sBJqB5qtKYEjFvToI4rRc0Nim-MvgjeMS97apVaQNr-h5bXCfDbm0T_i-d8mrCE07n1DTQrp0tJW5MXZ3huRNxIBPk1s3V9B_wi3Y4W4iogxVBsPNKqBF_DHdcokv1ADt27OWtuShUvZUlRd8SUEBWA_m" />
            <div class="hover-overlay absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent opacity-0 transition-opacity duration-300 flex flex-col justify-end p-6">
                <span class="text-primary text-xs font-bold tracking-widest uppercase mb-1">Événements</span>
                <p class="text-white text-lg font-bold">Réceptions Sur Mesure</p>
            </div>
        </div>
        <!-- Item 6 -->
        <div class="masonry-item gallery-hover relative group cursor-pointer overflow-hidden rounded-xl bg-gray-200 visible" data-category="ambiance">
            <img alt="Italian cocktail" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110" data-alt="Cocktail Aperol Spritz sur une table en bois" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBV7la55VLaMDnwibdVV4HMb_XX7rjrcelqW7_4_pfq1mNsmGlQTWtPkNbylyRSNsp7Xn1g-L26l7ZC7pplhB4sda1Kt2RY4k68wuMyHxsOCZ16zqmTPrVDzCef078o4rcorSQkst28TdfIOpbv0kBNcYvZfzHh2_wuKpD32eJGAFE4hdpxSw1r9hTLGbTj6qrUG6ZpDz1SfgqsYSlQFxgHJGijzMFuzIKyg11LANOWh7Z91VeEB6TzEI2FgGqAzqK3lmdmHf2QANQD" />
            <div class="hover-overlay absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent opacity-0 transition-opacity duration-300 flex flex-col justify-end p-6">
                <span class="text-primary text-xs font-bold tracking-widest uppercase mb-1">L'Ambiance</span>
                <p class="text-white text-lg font-bold">L'Aperitivo Traditionnel</p>
            </div>
        </div>
        <!-- Item 7 -->
        <div class="masonry-item gallery-hover relative group cursor-pointer overflow-hidden rounded-xl bg-gray-200 visible" data-category="le-jardin">
            <img alt="Restaurant facade" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110" data-alt="Façade fleurie du restaurant en pleine journée" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCQaLsFzssHyL1P5YwovbkYwTy8u8j17S_A3ye9W6r6AXM35sG_ViFr3o5nwOoa2Jvxluq7kY-RwWTk_DSZ7t2wj1CDVOoW3hRAQ9KhyDXHRtVspwpUlvvDROQB49J_Cv4BMC0Ty6vB5pr0O07AMYunN13So1ExASfFl72SFM7u4pPox2LavdmN0kADN2wRVu2uUpZ6KWUR-MbNhm2I9atwjRP6pygA1taYxZCte_CRRoCLBl5zhc6tZLSJxQV6s7BTYf8hMiUmX20V" />
            <div class="hover-overlay absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent opacity-0 transition-opacity duration-300 flex flex-col justify-end p-6">
                <span class="text-primary text-xs font-bold tracking-widest uppercase mb-1">Le Jardin</span>
                <p class="text-white text-lg font-bold">L'Entrée Fleurie</p>
            </div>
        </div>
        <!-- Item 8 -->
        <div class="masonry-item gallery-hover relative group cursor-pointer overflow-hidden rounded-xl bg-gray-200 visible" data-category="nos-plats">
            <img alt="Italian Dessert" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110" data-alt="Tiramisu classique saupoudré de cacao" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBDWbj7xJMohDqMtjnsobUOUKhXSkKDsMxFwOpflXLpoqsAkpo1WT2GVz7h6nIqfrtvkHg8Q1dDeNvyayWDOCftt0zhys7tPTJ34eM09ggKb1NKYlSqVANAdn2wrgf_DsFkQrqJexlqG3IuNPhSB9wSSHwWmYl0SxcOKdEBekuYnlAV82bEWkTEZM4aG80K4tc9I1tPdZL0K0CKq8jcLIMrl-1izDYYgMupKvddyHr2iefhbwxFI2ZNQdKwmkcvTtQ8XNr1nCbmZsBh" />
            <div class="hover-overlay absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent opacity-0 transition-opacity duration-300 flex flex-col justify-end p-6">
                <span class="text-primary text-xs font-bold tracking-widest uppercase mb-1">Nos Plats</span>
                <p class="text-white text-lg font-bold">Il Vero Tiramisù</p>
            </div>
        </div>
    </div>
    <!-- CTA Section -->
    <div class="mt-20 @container content-center">
        <div class="flex flex-col items-center justify-center gap-6 px-4 py-16 bg-primary/10 dark:bg-[#2d4a36] rounded-2xl border border-primary/20">
            <div class="flex flex-col gap-3 text-center">
                <h2 class="text-[#1c180d] dark:text-ivory text-3xl font-black md:text-4xl tracking-tight max-w-[720px]">
                    Vivez l'expérience Limoncello
                </h2>
                <p class="text-[#1c180d]/80 dark:text-ivory/80 text-base md:text-lg font-medium max-w-[600px] mx-auto">
                    Réservez votre table pour une soirée inoubliable dans notre jardin italien. Des saveurs authentiques vous attendent.
                </p>
            </div>
            <div class="flex flex-wrap justify-center gap-4 mt-4">
                <button class="flex min-w-[180px] cursor-pointer items-center justify-center rounded-lg h-12 px-8 bg-primary text-[#1c180d] text-base font-bold shadow-lg hover:bg-primary/90 transition-all">
                    Réserver maintenant
                </button>
                <button class="flex min-w-[180px] cursor-pointer items-center justify-center rounded-lg h-12 px-8 bg-white dark:bg-background-dark border-2 border-primary text-primary text-base font-bold hover:bg-primary/5 transition-all">
                    Consulter le menu
                </button>
            </div>
        </div>
    </div>
</main>
<?php \Core\Vue::fin_section('contenu'); ?>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Gallery Filter System
        const filterButtons = document.querySelectorAll('.filter-btn');
        const galleryItems = document.querySelectorAll('.masonry-item');

        filterButtons.forEach(button => {
            button.addEventListener('click', function() {
                const filterValue = this.getAttribute('data-filter');

                // Update active button
                filterButtons.forEach(btn => {
                    btn.classList.remove('active');
                });
                this.classList.add('active');

                // Filter gallery items
                galleryItems.forEach(item => {
                    const category = item.getAttribute('data-category');

                    if (filterValue === 'all' || category === filterValue) {
                        item.classList.add('visible');
                        item.classList.remove('hidden');
                    } else {
                        item.classList.add('hidden');
                        item.classList.remove('visible');
                    }
                });

                // Refresh scroll animations if GSAP is available
                if (typeof ScrollTrigger !== 'undefined') {
                    ScrollTrigger.refresh();
                }
            });
        });
    });
</script>
<!-- Footer -->