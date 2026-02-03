<!DOCTYPE html>
<html class="dark" lang="fr">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Limoncello - Finalisation de Commande</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Epilogue:wght@300;400;500;600;700;900&amp;display=swap" rel="stylesheet" />
    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        "primary": "#FFD700",
                        "background-light": "#f8f8f5",
                        "background-dark": "#0D0C08",
                        "card-dark": "#1E1C15",
                        "border-dark": "#443F30",
                        "muted-white": "#F2F2F2",
                    },
                    fontFamily: {
                        "display": ["Epilogue", "sans-serif"]
                    },
                    borderRadius: {
                        "DEFAULT": "0.25rem",
                        "lg": "0.5rem",
                        "xl": "0.75rem",
                        "full": "9999px"
                    },
                },
            },
        }
    </script>
    <style type="text/tailwindcss">
        body {
            font-family: 'Epilogue', sans-serif;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }
        .custom-scrollbar::-webkit-scrollbar {
            width: 4px;
        }
        .custom-scrollbar::-webkit-scrollbar-track {
            background: transparent;
        }
        .custom-scrollbar::-webkit-scrollbar-thumb {
            background: #443F30;
            border-radius: 10px;
        }
    </style>
</head>

<body class="bg-background-dark text-white min-h-screen">
    <header class="border-b border-solid border-border-dark px-6 lg:px-40 py-5 bg-background-dark sticky top-0 z-50">
        <div class="max-w-[1200px] mx-auto flex items-center justify-between whitespace-nowrap">
            <div class="flex items-center gap-4 text-primary">
                <div class="size-8">
                    <svg fill="currentColor" viewBox="0 0 48 48" xmlns="http://www.w3.org/2000/svg">
                        <path d="M24 4C25.7818 14.2173 33.7827 22.2182 44 24C33.7827 25.7818 25.7818 33.7827 24 44C22.2182 33.7827 14.2173 25.7818 4 24C14.2173 22.2182 22.2182 14.2173 24 4Z"></path>
                    </svg>
                </div>
                <h1 class="text-primary text-2xl font-black leading-tight tracking-tight uppercase">Limoncello</h1>
            </div>
            <nav class="hidden md:flex flex-1 justify-center gap-10">
                <a class="text-white hover:text-primary text-base font-semibold transition-colors" href="#">Menu</a>
                <a class="text-white hover:text-primary text-base font-semibold transition-colors" href="#">Réservations</a>
                <a class="text-white hover:text-primary text-base font-semibold transition-colors" href="#">À Propos</a>
                <a class="text-white hover:text-primary text-base font-semibold transition-colors" href="#">Contact</a>
            </nav>
            <div class="flex gap-4 items-center">
                <button class="flex items-center justify-center rounded-lg h-11 w-11 bg-card-dark text-primary border border-border-dark hover:bg-border-dark transition-all">
                    <span class="material-symbols-outlined text-[24px]">shopping_cart</span>
                </button>
                <div class="bg-center bg-no-repeat aspect-square bg-cover rounded-full size-11 border-2 border-primary" style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuDlRgNntNqHjJlqd5ARpeaF4DMefBtIWhmmkpbdPbMilSlFzPJM-oDjsM0euDLKGzsOPbewzvAs4WmA-x04BHSnldXAk3o9KNFR05z49oMKyoS5XDMbWm7b6eUmE8kOANVFLaBoxc1FqYHm25ZbGXohb8WppvolxNY4z_0D30kx4NVDZ1lLcLVgqSlrdHJ5p35GC7-5-NEsDhWBmG1ep6tGN-zKM6ArZSMyBV5qd-8gy-IpMsLKqm6Bp0ia9Dp-pEEi5_XK5ZINg35C");'></div>
            </div>
        </div>
    </header>
    <main class="max-w-[1200px] mx-auto px-6 lg:px-10 py-12">
        <nav class="flex items-center gap-2 mb-8">
            <a class="text-white opacity-80 text-sm font-medium hover:text-primary transition-colors" href="#">Panier</a>
            <span class="text-primary text-sm">/</span>
            <span class="text-primary text-sm font-bold">Finalisation</span>
        </nav>
        <div class="mb-14">
            <h2 class="text-primary text-5xl lg:text-6xl font-black leading-tight tracking-tight mb-4">Finalisation de commande</h2>
            <p class="text-muted-white text-xl max-w-2xl font-light">Veuillez renseigner vos informations pour savourer l'excellence italienne à Kinshasa.</p>
        </div>
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-16">
            <div class="lg:col-span-2 flex flex-col gap-14">
                <section>
                    <div class="flex items-center gap-4 mb-8">
                        <span class="flex items-center justify-center w-10 h-10 rounded-full bg-primary text-background-dark font-black text-lg">1</span>
                        <h3 class="text-primary text-2xl font-bold tracking-tight uppercase">Informations de Contact</h3>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <label class="flex flex-col">
                            <span class="text-white text-base font-bold pb-2 uppercase tracking-wide">Nom complet</span>
                            <input class="form-input w-full rounded-lg text-white border-2 border-border-dark bg-card-dark focus:border-primary focus:ring-0 h-14 placeholder:text-white/20 px-4 text-lg" placeholder="Ex: Jean Kasongo" />
                        </label>
                        <label class="flex flex-col">
                            <span class="text-white text-base font-bold pb-2 uppercase tracking-wide">Numéro de téléphone</span>
                            <input class="form-input w-full rounded-lg text-white border-2 border-border-dark bg-card-dark focus:border-primary focus:ring-0 h-14 placeholder:text-white/20 px-4 text-lg" placeholder="+243 ..." />
                        </label>
                        <label class="flex flex-col md:col-span-2">
                            <span class="text-white text-base font-bold pb-2 uppercase tracking-wide">Adresse Email</span>
                            <input class="form-input w-full rounded-lg text-white border-2 border-border-dark bg-card-dark focus:border-primary focus:ring-0 h-14 placeholder:text-white/20 px-4 text-lg" placeholder="votre@email.com" type="email" />
                        </label>
                    </div>
                </section>
                <section>
                    <div class="flex items-center gap-4 mb-8">
                        <span class="flex items-center justify-center w-10 h-10 rounded-full bg-primary text-background-dark font-black text-lg">2</span>
                        <h3 class="text-primary text-2xl font-bold tracking-tight uppercase">Mode de Réception</h3>
                    </div>
                    <div class="flex p-1.5 bg-card-dark rounded-xl mb-8 border border-border-dark w-full md:w-fit">
                        <button class="flex-1 md:w-48 py-4 rounded-lg bg-primary text-background-dark font-black text-base transition-all flex items-center justify-center gap-2 shadow-lg shadow-primary/10">
                            <span class="material-symbols-outlined text-xl">delivery_dining</span>
                            LIVRAISON
                        </button>
                        <button class="flex-1 md:w-48 py-4 rounded-lg text-white hover:text-primary font-bold text-base transition-all flex items-center justify-center gap-2">
                            <span class="material-symbols-outlined text-xl">storefront</span>
                            À EMPORTER
                        </button>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <label class="flex flex-col">
                            <span class="text-white text-base font-bold pb-2 uppercase tracking-wide">Commune</span>
                            <select class="form-select w-full rounded-lg text-white border-2 border-border-dark bg-card-dark focus:border-primary focus:ring-0 h-14 px-4 text-lg">
                                <option>Gombe</option>
                                <option>Ngaliema</option>
                                <option>Limete</option>
                                <option>Kintambo</option>
                                <option>Bandalungwa</option>
                            </select>
                        </label>
                        <label class="flex flex-col">
                            <span class="text-white text-base font-bold pb-2 uppercase tracking-wide">Quartier</span>
                            <input class="form-input w-full rounded-lg text-white border-2 border-border-dark bg-card-dark focus:border-primary focus:ring-0 h-14 placeholder:text-white/20 px-4 text-lg" placeholder="Ex: Macampagne" />
                        </label>
                        <label class="flex flex-col md:col-span-2">
                            <span class="text-white text-base font-bold pb-2 uppercase tracking-wide">Adresse &amp; N° de maison</span>
                            <input class="form-input w-full rounded-lg text-white border-2 border-border-dark bg-card-dark focus:border-primary focus:ring-0 h-14 placeholder:text-white/20 px-4 text-lg" placeholder="Ex: Avenue de la Justice, N° 12" />
                        </label>
                        <label class="flex flex-col md:col-span-2">
                            <span class="text-white text-base font-bold pb-2 uppercase tracking-wide">Point de repère (Landmark)</span>
                            <input class="form-input w-full rounded-lg text-white border-2 border-border-dark bg-card-dark focus:border-primary focus:ring-0 h-14 placeholder:text-white/20 px-4 text-lg" placeholder="Ex: En face de l'ambassade..." />
                        </label>
                    </div>
                </section>
                <section>
                    <div class="flex items-center gap-4 mb-8">
                        <span class="flex items-center justify-center w-10 h-10 rounded-full bg-primary text-background-dark font-black text-lg">3</span>
                        <h3 class="text-primary text-2xl font-bold tracking-tight uppercase">Notes pour la cuisine</h3>
                    </div>
                    <label class="flex flex-col">
                        <span class="text-white text-base font-bold pb-2 uppercase tracking-wide">Instructions spéciales</span>
                        <textarea class="form-textarea w-full rounded-lg text-white border-2 border-border-dark bg-card-dark focus:border-primary focus:ring-0 h-40 placeholder:text-white/20 p-4 text-lg" placeholder="Allergies, cuisson, pas de piment..."></textarea>
                    </label>
                </section>
                <div class="p-6 rounded-xl bg-primary/10 border-2 border-primary/30 flex gap-5 items-center">
                    <span class="material-symbols-outlined text-primary text-4xl">payments</span>
                    <div>
                        <p class="text-primary font-black text-xl uppercase">Paiement à la livraison</p>
                        <p class="text-muted-white text-base mt-1 font-medium">Le règlement s'effectue en espèces ou via Mobile Money lors de la réception.</p>
                    </div>
                </div>
            </div>
            <div class="lg:col-span-1">
                <div class="sticky top-28 p-8 rounded-2xl bg-card-dark border-2 border-border-dark flex flex-col gap-8 shadow-[0_20px_50px_rgba(0,0,0,0.5)]">
                    <h3 class="text-primary text-2xl font-black border-b-2 border-border-dark pb-6 uppercase tracking-wider">Résumé du Panier</h3>
                    <div class="flex flex-col gap-6 max-h-[450px] overflow-y-auto pr-2 custom-scrollbar">
                        <div class="flex gap-4 items-center">
                            <div class="w-20 h-20 rounded-xl bg-cover bg-center shrink-0 border-2 border-border-dark shadow-md" style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuBXuyZa4ekTBxa1TsGNkTGhpKgxQtTpmbtT7CoiW9cJSMKilJGnpFD-SkodEJeSZexJ1X24jNB_jAnJIlKAuitezws1y4kx50Rqp65RVmd5fh31tQjJXTZJdzMxiDpeBG3cbGMOyCpooXL15emEOty4R85I3YTKW-n0iqWvHZfGgGaxi8zmgNwpOw3MgzbEX-nA6MhKRhbpo0xZsy1gDQmX0n8Hd5PJDP9Vy3EIX8xp6PFi1GCLddq8g34_N3yON5DTM_CMwOdO1K3B')"></div>
                            <div class="flex-1">
                                <div class="flex justify-between items-start gap-2">
                                    <p class="text-white text-base font-bold leading-tight">Pizza Margherita D.O.P</p>
                                    <p class="text-primary text-lg font-black shrink-0">$18.00</p>
                                </div>
                                <p class="text-muted-white text-sm mt-2 font-medium bg-white/5 inline-block px-2 py-0.5 rounded">Quantité: 1</p>
                            </div>
                        </div>
                        <div class="flex gap-4 items-center">
                            <div class="w-20 h-20 rounded-xl bg-cover bg-center shrink-0 border-2 border-border-dark shadow-md" style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuAFFMlFCKzGqxL4hcwIkfVAnNhFMgtVUaXu6Na25_3mNJRBid0u2hBi4GrUcQdpUcCnJa4c7ILeJn4lRkSMUgir0aPbtElJKERnqlnI1JPpuIOCjmbtRVOl8xdUlTHIpFxMh_yYAhzxX6oRhMFiNf8cS2VdsRF8AviE9sQ-JE1UbKhBO8XsaVQhZDLWV0R26_ViOYtRMvHfYm2rU5lmees2beQ7VmInE4P0a6fJK4prz3JYeul1w99FCKfc6lKiqByibywus3cSgIKd')"></div>
                            <div class="flex-1">
                                <div class="flex justify-between items-start gap-2">
                                    <p class="text-white text-base font-bold leading-tight">Pappardelle al Tartufo</p>
                                    <p class="text-primary text-lg font-black shrink-0">$24.00</p>
                                </div>
                                <p class="text-muted-white text-sm mt-2 font-medium bg-white/5 inline-block px-2 py-0.5 rounded">Quantité: 2</p>
                            </div>
                        </div>
                        <div class="flex gap-4 items-center">
                            <div class="w-20 h-20 rounded-xl bg-cover bg-center shrink-0 border-2 border-border-dark shadow-md" style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuAg1wcrfgi14iAdTr_Uk0Kh3RwszIjoF676yCgJBK2Z_4IqxJvgYzyo2ZfiWGM6ypCUSe5Jya-5vME-d61Lk8BLTSYW0-rixKwUc28lL4XZ7cfAl3iQMVggVpv4fZjDEstzTxDSaHhPUGweH-M6RyqvAOfujchcme6id83Zol_C1JEJ9_Sm4Wq7P6_ONaAnbZxzmUl4PWw8Bh3sQLJ9EInoAq7R8k2wUx9qjcs33vEszKr--B_xr_uGPzpJ8Wxj1xhpG9FU2GciYXSR')"></div>
                            <div class="flex-1">
                                <div class="flex justify-between items-start gap-2">
                                    <p class="text-white text-base font-bold leading-tight">Limoncello Maison (Verre)</p>
                                    <p class="text-primary text-lg font-black shrink-0">$12.00</p>
                                </div>
                                <p class="text-muted-white text-sm mt-2 font-medium bg-white/5 inline-block px-2 py-0.5 rounded">Quantité: 2</p>
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-col gap-4 pt-8 border-t-2 border-border-dark">
                        <div class="flex justify-between items-center">
                            <p class="text-muted-white text-base font-medium">Sous-total</p>
                            <p class="text-white text-lg font-bold">$90.00</p>
                        </div>
                        <div class="flex justify-between items-center">
                            <p class="text-muted-white text-base font-medium">Frais de livraison</p>
                            <p class="text-white text-lg font-bold">$5.00</p>
                        </div>
                        <div class="flex justify-between items-center mt-4 p-4 bg-white/5 rounded-xl border border-white/10">
                            <p class="text-primary text-xl font-black uppercase">Total</p>
                            <p class="text-primary text-3xl font-black leading-tight">$95.00</p>
                        </div>
                    </div>
                    <button class="w-full h-20 bg-primary text-background-dark font-black text-xl uppercase tracking-widest rounded-xl shadow-2xl shadow-primary/30 hover:scale-[1.02] active:scale-[0.98] transition-all flex items-center justify-center gap-4">
                        <span class="material-symbols-outlined text-3xl font-bold">check_circle</span>
                        CONFIRMER LA COMMANDE
                    </button>
                    <p class="text-center text-muted-white text-[11px] uppercase tracking-widest leading-relaxed opacity-60 px-4">
                        En confirmant, vous acceptez nos CGV et notre politique de confidentialité.
                    </p>
                </div>
            </div>
        </div>
    </main>
    <footer class="mt-24 border-t-2 border-border-dark pt-16 pb-20 px-6 lg:px-40 bg-card-dark">
        <div class="max-w-[1200px] mx-auto grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12">
            <div class="flex flex-col gap-6">
                <div class="flex items-center gap-3 text-primary">
                    <span class="material-symbols-outlined text-3xl">restaurant_menu</span>
                    <h4 class="font-black text-xl text-white uppercase tracking-tight">Limoncello Kinshasa</h4>
                </div>
                <p class="text-muted-white text-base leading-relaxed font-medium">L'authentique cuisine italienne au cœur de la Gombe. Ingrédients importés et passion locale pour une expérience inoubliable.</p>
            </div>
            <div class="flex flex-col gap-6">
                <h4 class="font-black text-primary text-lg uppercase tracking-wider">Heures d'ouverture</h4>
                <div class="text-white text-base flex flex-col gap-2 font-bold">
                    <p>Lun - Jeu : <span class="text-muted-white font-medium">11h30 - 22h00</span></p>
                    <p>Ven - Dim : <span class="text-muted-white font-medium">11h30 - 23h30</span></p>
                </div>
            </div>
            <div class="flex flex-col gap-6">
                <h4 class="font-black text-primary text-lg uppercase tracking-wider">Contact</h4>
                <div class="text-white text-base flex flex-col gap-2 font-bold">
                    <p class="flex items-center gap-2"><span class="material-symbols-outlined text-primary">phone_iphone</span> +243 81 000 0000</p>
                    <p class="flex items-center gap-2 text-sm"><span class="material-symbols-outlined text-primary">mail</span> contact@limoncello-kin.com</p>
                </div>
            </div>
            <div class="flex flex-col gap-6">
                <h4 class="font-black text-primary text-lg uppercase tracking-wider">Localisation</h4>
                <div class="w-full h-36 rounded-xl overflow-hidden border-2 border-border-dark shadow-xl">
                    <img alt="Map Location Kinshasa" class="w-full h-full object-cover grayscale brightness-75 hover:grayscale-0 transition-all duration-700" src="https://lh3.googleusercontent.com/aida-public/AB6AXuD_oE9pmf6K_ni3o6HYQ9VNNMK-UQN3IfdCM91a__DiQqLuzPc_L-JrwYRjuEew5tHXfc7lTJfNEUIMrz-Iohw9HwwQvmC5-oReLiLWVSL210NAADC8yaJ0SqUcwAMwEngql_Sqx9lMrnnyJrGkRbABpJWK9X7E03rfTTw6bE__Kiy0yFhVmhQsp4uPHp1uX-CoLkE9A4zS2cZjOLznnF-cDF2eKPqcPtfrD_SlH3U9atTh88az_QXKZBmtmlBMiLf9Dh8pMlxYBcB1" />
                </div>
            </div>
        </div>
    </footer>

</body>

</html>