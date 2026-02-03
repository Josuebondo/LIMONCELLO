<?php
\core\Vue::extends('layouts.principal');
\core\Vue::debut_section('contenu');

?>

<style type="text/tailwindcss">
    @layer base {
            body {
                font-family: 'Epilogue', sans-serif;
                scroll-behavior: smooth;
            }
        }
        .glass-nav {
            background: rgba(10, 15, 11, 0.85);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
        }
        .hero-gradient {
            background: linear-gradient(to bottom, rgba(10, 15, 11, 0.3) 0%, rgba(10, 15, 11, 0.9) 100%);
        }
        .floating-card {
            transition: transform 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        }
        .floating-card:hover {
            transform: translateY(-10px);
        }.slider-container {
            position: relative;
            width: 100%;
            height: 100vh;
            overflow: hidden;
        }
        .slide {
            position: absolute;
            inset: 0;
            opacity: 0;
            transition: opacity 1.5s ease-in-out;
        }
        .slide.active {
            opacity: 1;
        }@keyframes subtleZoom {
            from { transform: scale(1); }
            to { transform: scale(1.1); }
        }
        .active .slide-bg {
            animation: subtleZoom 10s forwards;
        }
    </style>


<section class="slider-container">
    <div class="slide active">
        <div class="absolute inset-0 z-0">
            <div class="w-full h-full bg-cover bg-center slide-bg" style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuBV2mMxTOTU73qSLrTFzfu8ed5I6Z22MYqP--13FidM5ZRhIWSA5t4vxB2rzN4tk-YQkDePO_j4G3On1nF8SB2qTe4zlH_yjrFhE8IKMqWmb-zbYAYnRLbd3Lw5RPVYiXyyDEc002fB0MwPIZXI9cXlS7v70P_BdSdmHFKH0LUdhCZP5CVQcO-k5ufyBavPQM2AfRKiFel_TcEeBpZqMtG20anbNkSwbve4LOP9ReTwtue__tSSRzUQej6AgWkW53cXaPfS2hTNhC4");'></div>
            <div class="absolute inset-0 hero-gradient"></div>
        </div>
        <div class="relative h-full flex items-center justify-center z-10 text-center px-6 max-w-5xl mx-auto">
            <div class="space-y-8">
                <span class="text-primary font-bold uppercase tracking-[0.5em] text-sm block">Excellence &amp; Tradition</span>
                <h1 class="text-white text-6xl md:text-8xl font-black tracking-tighter font-display leading-[0.9]">
                    Une Expérience <br /><span class="text-primary italic">Culinaire Unique</span>
                </h1>
                <p class="text-white/80 text-lg md:text-xl max-w-2xl mx-auto font-light leading-relaxed">
                    Découvrez l'apogée de la gastronomie contemporaine, où chaque détail est une œuvre d'art orchestrée pour vos sens.
                </p>
                <div class="flex flex-col sm:flex-row gap-6 justify-center pt-4">
                    <a href="/reservation" class="bg-primary text-background-dark px-12 py-4 rounded font-black text-sm uppercase tracking-[0.3em] shadow-[0_0_30px_rgba(212,175,55,0.2)] hover:scale-105 transition-transform">
                        Réserver une Table
                    </a>
                    <a href="/menus" class="border border-white/20 text-white backdrop-blur-md px-12 py-4 rounded font-black text-sm uppercase tracking-[0.3em] hover:bg-white hover:text-background-dark transition-all">
                        Explorer le Menu
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="slide">
        <div class="absolute inset-0 z-0">
            <div class="w-full h-full bg-cover bg-center slide-bg" style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuCeNoz3MbbnIksyX3hhnaG56YIjd8Ls5uGm0JmGwPRX3TqbOUGy2pWJMwIDqmstycMD7ikMaBpZ7oVLIjOoian2YykKnQs2e6mlGYKWXjbnjiHh-a29EhI1wHdmytIUudVsPbbHCyfoi9n2wtfp6ufJdJRDjvUD3UB65JhEfZWq6MB0-8NrhB9BN_HyNij16yuSfTsljPl6DATFiVC9cs2BA1hdT7BKRDRR2NrMouRdJL-AFjfy0qpy7SJzFjdpRoYpT6vc6fDacpk");'></div>
            <div class="absolute inset-0 hero-gradient"></div>
        </div>
        <div class="relative h-full flex items-center justify-center z-10 text-center px-6 max-w-5xl mx-auto">
            <div class="space-y-8">
                <span class="text-primary font-bold uppercase tracking-[0.5em] text-sm block">L'Art de la Viande</span>
                <h2 class="text-white text-6xl md:text-8xl font-black tracking-tighter font-display leading-[0.9]">
                    Wagyu <br /><span class="text-primary italic">Signature</span>
                </h2>
                <p class="text-white/80 text-lg md:text-xl max-w-2xl mx-auto font-light leading-relaxed">
                    Une sélection d'exception maturée avec soin, pour une tendreté et des saveurs inégalées.
                </p>
                <div class="flex flex-col sm:flex-row gap-6 justify-center pt-4">
                    <button class="bg-primary text-background-dark px-12 py-4 rounded font-black text-sm uppercase tracking-[0.3em] hover:scale-105 transition-transform">
                        Réserver une Table
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="slide">
        <div class="absolute inset-0 z-0">
            <div class="w-full h-full bg-cover bg-center slide-bg" style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuBViL4ZW_Qn04Mg1rNcqVkwfP-x7hxNl_QA7QvQkgRGOyDMpl2VlE6tLCT9Bk0QXW53mbC12DZ9so-fxAm9W05SbT2tVcqc3jdYv4kraUFWXavKoXovyM350uwgq-UHS0wATebL6XYUSY186cCEn4840CH2zzni6f9aA7maYnYgvJEHBTYq0LbI0EqebYphVZpVpsR9OqtAyxEyOx0dOfG6Dv0epHpcGo6AMHeMi0U2ZUaeYB90qybM5p4nOA4TuIUkqQUN9vgGJO0");'></div>
            <div class="absolute inset-0 hero-gradient"></div>
        </div>
        <div class="relative h-full flex items-center justify-center z-10 text-center px-6 max-w-5xl mx-auto">
            <div class="space-y-8">
                <span class="text-primary font-bold uppercase tracking-[0.5em] text-sm block">Trésors Marins</span>
                <h2 class="text-white text-6xl md:text-8xl font-black tracking-tighter font-display leading-[0.9]">
                    Fraîcheur <br /><span class="text-primary italic">Océanique</span>
                </h2>
                <p class="text-white/80 text-lg md:text-xl max-w-2xl mx-auto font-light leading-relaxed">
                    Le meilleur de nos côtes, sublimé par la créativité de nos chefs et la finesse des épices.
                </p>
                <div class="flex flex-col sm:flex-row gap-6 justify-center pt-4">
                    <button class="bg-primary text-background-dark px-12 py-4 rounded font-black text-sm uppercase tracking-[0.3em] hover:scale-105 transition-transform">
                        Réserver une Table
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="absolute bottom-20 left-1/2 -translate-x-1/2 z-20 flex gap-4">
        <div class="w-12 h-1 bg-primary rounded-full opacity-100"></div>
        <div class="w-12 h-1 bg-white/20 rounded-full opacity-100"></div>
        <div class="w-12 h-1 bg-white/20 rounded-full opacity-100"></div>
    </div>
    <div class="absolute bottom-10 left-1/2 -translate-x-1/2 animate-bounce z-20">
        <span class="material-symbols-outlined text-primary/40 text-4xl">keyboard_double_arrow_down</span>
    </div>
</section>
<section class="py-24 px-6 bg-background-light dark:bg-background-dark" id="menu">
    <div class="max-w-7xl mx-auto">
        <div class="mb-16 text-center">
            <span class="text-primary font-bold uppercase tracking-[0.3em] text-sm mb-4 block">Sélection de Saison</span>
            <h2 class="text-4xl md:text-5xl font-black dark:text-white text-slate-900 tracking-tighter">Nos Créations Signature</h2>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="floating-card group bg-charcoal rounded-xl overflow-hidden border border-white/5 shadow-2xl">
                <div class="aspect-[4/5] overflow-hidden">
                    <div class="w-full h-full bg-center bg-cover transition-transform duration-700 group-hover:scale-110" style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuBViL4ZW_Qn04Mg1rNcqVkwfP-x7hxNl_QA7QvQkgRGOyDMpl2VlE6tLCT9Bk0QXW53mbC12DZ9so-fxAm9W05SbT2tVcqc3jdYv4kraUFWXavKoXovyM350uwgq-UHS0wATebL6XYUSY186cCEn4840CH2zzni6f9aA7maYnYgvJEHBTYq0LbI0EqebYphVZpVpsR9OqtAyxEyOx0dOfG6Dv0epHpcGo6AMHeMi0U2ZUaeYB90qybM5p4nOA4TuIUkqQUN9vgGJO0");'></div>
                </div>
                <div class="p-8">
                    <div class="flex justify-between items-start mb-2">
                        <h3 class="text-white text-2xl font-bold tracking-tight">Noix de Saint-Jacques</h3>
                        <span class="text-primary font-bold">32€</span>
                    </div>
                    <p class="dark:text-white/60 text-sm leading-relaxed mb-6">Beurre herbes-citron, velouté de chou-fleur, huile de chorizo, jeunes pousses.</p>
                    <button class="flex items-center gap-2 text-primary text-xs font-black uppercase tracking-widest group-hover:gap-4 transition-all">
                        Détails <span class="material-symbols-outlined text-sm">arrow_forward</span>
                    </button>
                </div>
            </div>
            <div class="floating-card group bg-charcoal rounded-xl overflow-hidden border border-white/5 shadow-2xl">
                <div class="aspect-[4/5] overflow-hidden">
                    <div class="w-full h-full bg-center bg-cover transition-transform duration-700 group-hover:scale-110" style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuCeNoz3MbbnIksyX3hhnaG56YIjd8Ls5uGm0JmGwPRX3TqbOUGy2pWJMwIDqmstycMD7ikMaBpZ7oVLIjOoian2YykKnQs2e6mlGYKWXjbnjiHh-a29EhI1wHdmytIUudVsPbbHCyfoi9n2wtfp6ufJdJRDjvUD3UB65JhEfZWq6MB0-8NrhB9BN_HyNij16yuSfTsljPl6DATFiVC9cs2BA1hdT7BKRDRR2NrMouRdJL-AFjfy0qpy7SJzFjdpRoYpT6vc6fDacpk");'></div>
                </div>
                <div class="p-8">
                    <div class="flex justify-between items-start mb-2">
                        <h3 class="text-white text-2xl font-bold tracking-tight">Entrecôte Wagyu</h3>
                        <span class="text-primary font-bold">85€</span>
                    </div>
                    <p class="dark:text-white/60 text-sm leading-relaxed mb-6">Grade A5, sel marin fumé, jus à la truffe, poireaux brûlés.</p>
                    <button class="flex items-center gap-2 text-primary text-xs font-black uppercase tracking-widest group-hover:gap-4 transition-all">
                        Détails <span class="material-symbols-outlined text-sm">arrow_forward</span>
                    </button>
                </div>
            </div>
            <div class="floating-card group bg-charcoal rounded-xl overflow-hidden border border-white/5 shadow-2xl">
                <div class="aspect-[4/5] overflow-hidden">
                    <div class="w-full h-full bg-center bg-cover transition-transform duration-700 group-hover:scale-110" style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuAvVpDu63fXgVnX-vadbFs-tX4uN5bckg_FwrKKH2THxFCLrjDaxG3WVn0JNoAoPSGT4TS7tv4hdPV3Zq8yITykkAd1O4Ut0_mrYETnSbrD-yU4zaUve-Kki_HGUYUwJA-jo1FVhrSTWiu9IjHomXSgJobmLiXxH3Bpyy-8ULP_F4S_nr5TVfRZodgs8WEJZaKRV21fusWJnANlGHuy388E-c5Rv3dtrBiYdZsgllUJ47GkZuof8g3mMXtpLX_vTdg3PQi6p3j2UMU");'></div>
                </div>
                <div class="p-8">
                    <div class="flex justify-between items-start mb-2">
                        <h3 class="text-white text-2xl font-bold tracking-tight">Risotto du Jardin</h3>
                        <span class="text-primary font-bold">28€</span>
                    </div>
                    <p class="dark:text-white/60 text-sm leading-relaxed mb-6">Légumes anciens, parmesan affiné, essence de basilic, or comestible.</p>
                    <button class="flex items-center gap-2 text-primary text-xs font-black uppercase tracking-widest group-hover:gap-4 transition-all">
                        Détails <span class="material-symbols-outlined text-sm">arrow_forward</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="py-24 px-6 dark:bg-background-dark text-primary  dark:text-white/70 bg-white" id="vision">
    <div class="max-w-7xl mx-auto">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-20 items-center">
            <div class="space-y-8">
                <span class="text-primary font-bold uppercase tracking-[0.3em] text-sm">Philosophie</span>
                <h2 class="text-5xl md:text-6xl font-black tracking-tighter leading-[0.9] bg-gradient-to-r from-gold via-primary to-gold bg-clip-text text-transparent drop-shadow-lg dark:drop-shadow-[0_2px_24px_rgba(212,175,55,0.5)]">
                    La Vision du <span class="text-gold dark:text-gold">Goût Pur</span>
                </h2>
                <p class="text-lg text-slate-600 dark:text-white/90 leading-relaxed font-light dark:drop-shadow-[0_1px_8px_rgba(212,175,55,0.15)]">
                    Notre philosophie repose sur l'<span class="text-gold font-semibold dark:text-gold">harmonie</span> entre la <span class="text-primary font-semibold dark:text-gold">nature</span> et la <span class="text-primary font-semibold dark:text-gold">technique</span>. Chaque ingrédient est sourcé auprès d'<span class="text-gold font-semibold dark:text-gold">artisans locaux</span> pour créer une <span class="text-gold font-semibold dark:text-gold">symphonie de saveurs</span> qui honore la terre. Nous croyons que la <span class="text-gold font-semibold dark:text-gold">haute gastronomie</span> est plus qu'un repas — c'est un <span class="text-primary font-semibold dark:text-gold">voyage sensoriel</span> à travers les saisons.
                </p>
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 pt-10">
                    <div class="space-y-3">
                        <div class="w-12 h-1 bg-gold"></div>
                        <h4 class="font-bold uppercase tracking-widest text-sm text-gold">Sourcing</h4>
                        <p class="text-xs text-slate-500 dark:text-white/50 uppercase leading-loose">Livraisons quotidiennes garantissant des produits d'une fraîcheur absolue.</p>
                    </div>
                    <div class="space-y-3">
                        <div class="w-12 h-1 bg-gold"></div>
                        <h4 class="font-bold uppercase tracking-widest text-sm text-gold">Artisanat</h4>
                        <p class="text-xs text-slate-500 dark:text-white/50 uppercase leading-loose">Préparation méticuleuse par nos maîtres culinaires.</p>
                    </div>
                    <div class="space-y-3">
                        <div class="w-12 h-1 bg-gold"></div>
                        <h4 class="font-bold uppercase tracking-widest text-sm text-gold">Ambiance</h4>
                        <p class="text-xs text-slate-500 dark:text-white/50 uppercase leading-loose">Une atmosphère intime pour une immersion sensorielle totale.</p>
                    </div>
                </div>
            </div>
            <div class="grid grid-cols-2 gap-4">
                <div class="space-y-4">
                    <div class="h-64 bg-cover bg-center rounded-xl" style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuCttGuKhxva8baA9A1l9UQ8K4o3sGWiaGwPXEYjHjfC7kGY34qklT_i06zw24NuWoGbnXXj11dd0B3O7Td7swn4YC09d6iF8I1aAy3ms6HpIONK62JFPhynnCDVMbZlrmF9A2GV1r6F8V97--wA07QB4Rk7WBqF-p4_gqEV8kbmjD30I_5M2nO5d4DjQsIyNj8NSNzXO3Gf6qMYcIeeZzdUSifoP6liB_ruTA8HW21t7Tiroi3bkVMvy3CylnlPBxU-hU6ufBFp1O8");'></div>
                    <div class="h-48 bg-cover bg-center rounded-xl" style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuACrLZVgRN2HsUYI--omjNhOlA6P-8wjpTA6AZ6Y0hEg0_zwyIoWOTb3PGB0lAYOvBlaM5YzZioPqmCMWy9J983YShZjODdG8r6L8w1kUbwWISPCKc3WiRBFDlE0TBFU028u1PQOKJUswBzvWMr1D9tZLgtqD8kK4ubeaE8y8mBTZjos5Un9HAfbFfdrUP9EyyfHRsCs2GDE-f_EYiVH1_WFVWOHUT47JnWSGRV0AjxVqgMoGODf9TcoMWKXOa6Mk-W-TX3ZJ3Otvk");'></div>
                </div>
                <div class="pt-12 space-y-4">
                    <div class="h-48 bg-cover bg-center rounded-xl" style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuBJ8IdUcKORNnJEd6SblMT2ItHWfZ51ZQFH-9OSPhMuwHG94UJ2a4hNXfcVC-DufPTff5kw_GsOVSYZeGibcHCfpod07vouC3FjHyWUPGrKLzX2mch9EqNiBqFAhZq5zGyYRuNrcN5Ei7jzgjJi5pCF34ghvQnAa0uh3CDCn5bQHpxnKK_zDpXqhH3DdD6fS00j42_Z8o3xuCCLHNVC3C1tuYtsDPoXqFkf2uS3tUQVFsNWnrXzNmqkeGomuM9_m97KN8ZcNzbIoUc");'></div>
                    <div class="h-64 bg-cover bg-center rounded-xl" style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuDR_GdCA1NT_1AbTtXhD9LDUwDdZoWph4xZ8m0aAf74Eb17E3oCXpZQ7amBCKHduXcKk6FA9H-1rMDdeHIKLhlDdeD8y-6JaP5s4sGuy4TVz17WLdtXw370SV5dGiw78YTglaYs-stzlCw9otyt6TOjFwdExVYfhO5sUR4vY1LV-mn30TqAHV57uO4eDjPsJ2V8uKf3qEyeIbtsX__uHkAyBUu0cCLfESMdFClh2cTwM0iaveI6y6l9Sxiu9QOA4D03gBzEYnNELoo");'></div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php \core\Vue::fin_section('contenu'); ?>