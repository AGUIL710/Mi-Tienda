@php
    $channel = core()->getCurrentChannel();
@endphp

<!-- SEO Meta Content -->
@push ('meta')
    <meta
        name="title"
        content="{{ $channel->home_seo['meta_title'] ?? '' }}"
    />

    <meta
        name="description"
        content="{{ $channel->home_seo['meta_description'] ?? '' }}"
    />

    <meta
        name="keywords"
        content="{{ $channel->home_seo['meta_keywords'] ?? '' }}"
    />
@endPush

<x-shop::layouts>
    <!-- Page Title -->
    <x-slot:title>
        {{  $channel->home_seo['meta_title'] ?? '' }}
    </x-slot>
    
    <!-- Loop over the theme customization -->
    @foreach ($customizations as $customization)
        @php ($data = $customization->options) @endphp

        @switch ($customization->type)
            @case ($customization::IMAGE_CAROUSEL)
                @push('styles')
                    <style>
                        /* Fondo con efecto gradient solo al carrusel */
                        .custom-carousel-banner {
                            position: relative;
                            height: 100vh;
                            display: flex;
                            align-items: center;
                            justify-content: center;
                            flex-direction: column;
                            text-align: center;
                            background: linear-gradient(45deg, rgba(37, 99, 235, 0.9), rgba(30, 64, 175, 0.9)),
                                        url('https://images.unsplash.com/photo-1519389950473-47ba0277781c?auto=format&fit=crop&w=1920') center/cover no-repeat;
                            color: var(--light);
                            padding: 0 5%;
                        }

                        /* ---- Estilo del título animado ---- */
                        .custom-carousel-banner h1 {
                            font-size: 4.5rem;
                            font-weight: 800;  /* más grueso */
                            margin-bottom: 1.5rem;
                            color: #fff;
                            opacity: 0;
                            transform: translateY(30px);
                            animation: fadeUp 0.8s forwards 0.3s;
                        }

                        @keyframes fadeUp {
                            to {
                                opacity: 1;
                                transform: translateY(0);
                            }
                        }

                        /* Título con animación drop */
                        .animated-title {
                            display: inline-block;
                            overflow: hidden;
                            white-space: nowrap;
                        }

                        .animated-title span {
                            display: inline-block;
                            opacity: 0;
                            transform: translateY(-100%);
                            animation: dropIn 0.5s forwards;
                        }

                        @keyframes dropIn {
                            to {
                                opacity: 1;
                                transform: translateY(0);
                            }
                        }

                        /* ===== RESPONSIVE TÍTULO HERO ===== */
                        @media (max-width: 768px) {
                            .custom-carousel-banner {
                                height: auto;
                                padding: 80px 20px;
                            }

                            .custom-carousel-banner h1 {
                                font-size: 2rem; /* más pequeño en pantallas pequeñas */
                                line-height: 1.4;
                                white-space: normal; /* permite que el texto se parta en varias líneas */
                                word-break: break-word;
                                text-align: center;
                                padding: 0 10px;
                            }

                            .custom-carousel-banner .banner-buttons {
                                flex-direction: column;
                                gap: 12px;
                                margin-top: 20px;
                            }

                            .custom-carousel-banner .banner-buttons a {
                                width: 100%;
                                max-width: 260px;
                                margin: 0 auto;
                                padding: 10px 25px;
                                font-size: 0.95rem;
                            }
                        }

                        
                        /* Contenedor de botones */
                        .custom-carousel-banner .banner-buttons {
                            margin-top: 25px;
                            display: flex;
                            gap: 15px;
                            justify-content: center;
                        }

                        /* Botones principales */
                        .custom-carousel-banner .banner-buttons a {
                            position: relative;
                            background-color: #ff7b00; /* Naranja sólido */
                            color: #fff;
                            border: none;
                            padding: 12px 35px;
                            border-radius: 30px;
                            text-decoration: none;
                            font-weight: 600;
                            box-shadow: 0 6px 15px rgba(255, 123, 0, 0.4); /* efecto 3D */
                            transition: all 0.4s ease;
                            overflow: hidden; /* importante para el brillo */
                            opacity: 0;
                            transform: scale(0.5);
                            animation: buttonPop 1s forwards ease-out; /* animación original */
                        }

                        /* Segundo botón con retardo */
                        .custom-carousel-banner .banner-buttons a:nth-child(1) {
                            animation-delay: 0.8s;
                        }

                        .custom-carousel-banner .banner-buttons a:nth-child(2) {
                            animation-delay: 1.2s;
                        }

                        /* Animación de aparición */
                        @keyframes buttonPop {
                            0% {
                                opacity: 0;
                                transform: scale(0.5);
                            }
                            60% {
                                opacity: 1;
                                transform: scale(1.15);
                            }
                            100% {
                                opacity: 1;
                                transform: scale(1);
                            }
                        }

                        /* ---- Efecto de brillo al pasar el mouse ---- */
                        .custom-carousel-banner .banner-buttons a::before {
                            content: "";
                            position: absolute;
                            top: 0;
                            left: -100%;
                            width: 130%;
                            height: 120%;
                            background: rgba(255, 255, 255, 0.3);
                            transform: skewX(-20deg);
                            transition: 0.7s;
                        }

                        /* Hover con animación de brillo + cambio de color */
                        .custom-carousel-banner .banner-buttons a:hover::before {
                            left: 100%;
                        }

                        .custom-carousel-banner .banner-buttons a:hover {
                            background-color: #fff;
                            color: #1e40af;
                            transform: translateY(-4px) scale(1.05);
                            box-shadow: 0 10px 25px rgba(255, 255, 255, 0.3);
                        }

                        /* Efecto al hacer clic */
                        .custom-carousel-banner .banner-buttons a:active {
                            transform: scale(0.96);
                            box-shadow: 0 4px 10px rgba(255, 123, 0, 0.4);
                        }
                        /* ==== Estilo responsivo para reseñas ==== */
                        @media (max-width: 768px) {
                            /* Cambia a una sola columna */
                            .grid.grid-cols-2 {
                                grid-template-columns: 1fr;
                                gap: 25px;
                            }

                            /* Oculta reseñas después de la tercera */
                            .grid.grid-cols-2 > div:nth-child(n+4) {
                                display: none;
                            }

                            /* Ajuste general del ancho y posición */
                            .grid.grid-cols-2 > div {
                                width: 100%;
                                margin: 0 auto;
                                transform: scale(0.95); /* compacta un poco sin deformar */
                            }

                            /* Ajuste tipográfico */
                            .grid .border-2 h3 {
                                font-size: 0.95rem;
                            }

                            .grid .border-2 p {
                                font-size: 0.85rem;
                            }

                            /* Estrellas más pequeñas */
                            .grid .border-2 svg {
                                width: 16px;
                                height: 16px;
                            }

                            /* Avatar más pequeño */
                            .grid .border-2 .w-20 {
                                width: 55px;
                                height: 55px;
                                font-size: 0.9rem;
                            }

                            /* Centra el título */
                            section.container h2 {
                                font-size: 1.5rem;
                                text-align: center;
                                margin-bottom: 1.5rem;
                            }
                        }
                    </style>
                @endpush

                <!-- Carrusel con fondo personalizado -->
                <div class="custom-carousel-banner">
                    {{-- <x-shop::carousel
                        :options="$data"
                        aria-label="{{ trans('shop::app.home.index.image-carousel') }}"
                    /> --}}

                    <!-- Título animado -->
                    <h1 class="animated-title">Soluciones Informáticas a tu Alcance!</h1>

                    <!-- Botones centrados -->
                    <div class="banner-buttons">
                        <a href="{{ url('/servicios') }}">Ver nuestros servicios</a>
                        <a href="{{ url('/tienda') }}">Visitar tienda</a>
                    </div>
                </div>
            @break


            @case ($customization::STATIC_CONTENT)
                @if (! empty($data['css']))
                    @push ('styles')
                        <style>
                            {{ $data['css'] }}
                        </style>
                    @endpush
                @endif

                @if (! empty($data['html']))
                    {!! $data['html'] !!}
                @endif
                @break

            @case ($customization::CATEGORY_CAROUSEL)
                <x-shop::categories.carousel
                    :title="$data['title'] ?? ''"
                    :src="route('shop.api.categories.index', $data['filters'] ?? [])"
                    :navigation-link="route('shop.home.index')"
                    aria-label="{{ trans('shop::app.home.index.categories-carousel') }}"
                />
            @break

            @case ($customization::PRODUCT_CAROUSEL)
                <x-shop::products.carousel
                    :title="$data['title'] ?? ''"
                    :src="route('shop.api.products.index', $data['filters'] ?? [])"
                    :navigation-link="route('shop.search.index', $data['filters'] ?? [])"
                    aria-label="{{ trans('shop::app.home.index.product-carousel') }}"
                />
            @break
        @endswitch
    @endforeach

    {{-- ============================= --}}
    {{-- ⭐ Reseñas Aprobadas ⭐ --}}
    {{-- ============================= --}}

    @php
        // Traemos las reseñas aprobadas (status = 'approved')
        $approvedReviews = Webkul\Product\Models\ProductReview::where('status', 'approved')
            ->with('product') // incluye el producto relacionado
            ->latest()        // las más recientes primero
            ->take(4)         // cantidad a mostrar
            ->get();
    @endphp

   @if ($approvedReviews->count())
        <section class="container mt-[60px]">
            <h2 class="text-2xl font-bold mb-6 text-center">
                Testimonios de Nuestros Clientes
            </h2>

            <!-- Contenedor scrollable vertical -->
            <div class="grid grid-cols-2 gap-6 max-h-[900px] overflow-y-auto">
                @foreach ($approvedReviews as $index => $review)
                    @php
                        $name = trim($review->name);
                        $parts = preg_split('/\s+/', $name);

                        // Nombre enmascarado: primera letra visible, resto en asteriscos
                        $maskedName = collect($parts)
                            ->map(fn($part) => mb_substr($part, 0, 1) . str_repeat('*', max(mb_strlen($part)-1,0)))
                            ->implode(' ');

                        // Iniciales: todas las iniciales de cada palabra del nombre/apellido
                        $initials = collect($parts)
                            ->map(fn($n) => strtoupper(mb_substr($n, 0, 1)))
                            ->implode('');

                        // Alterna columna izquierda/derecha
                        $orderClass = $index % 2 == 0 ? 'order-1' : 'order-2';
                    @endphp

                    <div class="border-2 border-[#007BFF] rounded-xl p-5 shadow-sm hover:shadow-md bg-white mx-auto w-full max-w-[300px] {{ $orderClass }}">
                        <!-- Avatar, nombre, fecha y estrellas -->
                        <div class="flex items-start gap-4 mb-4">
                            <!-- Cuadro gris con todas las iniciales -->
                            <div class="w-20 h-20 rounded-lg bg-gray-200 flex items-center justify-center text-gray-700 font-bold text-xl">
                                {{ $initials }}
                            </div>

                            <div class="flex flex-col">
                                <h3 class="font-semibold text-gray-800 text-base">{{ $maskedName }}</h3>
                                <p class="text-sm text-gray-500 mb-2">{{ $review->created_at->format('M d, Y') }}</p>

                                <div class="flex mt-1 space-x-1.5">
                                    @for ($i = 1; $i <= 5; $i++)
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                            fill="{{ $i <= $review->rating ? '#facc15' : '#d1d5db' }}" class="w-5 h-5">
                                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.286 3.948a1 1 0 00.95.69h4.151c.969 0 1.371 1.24.588 1.81l-3.36 2.44a1 1 0 00-.364 1.118l1.286 3.948c.3.921-.755 1.688-1.54 1.118l-3.36-2.44a1 1 0 00-1.176 0l-3.36 2.44c-.784.57-1.838-.197-1.539-1.118l1.285-3.948a1 1 0 00-.364-1.118l-3.36-2.44c-.783-.57-.38-1.81.588-1.81h4.15a1 1 0 00.951-.69l1.286-3.948z" />
                                        </svg>
                                    @endfor
                                </div>
                            </div>
                        </div>

                        <p class="font-semibold text-gray-800 mb-1 text-[15px]">{{ $review->title }}</p>
                        <p class="text-gray-700 leading-relaxed mb-2 text-[14.5px]">{{ $review->comment }}</p>
                        <a href="{{ route('shop.product_or_category.index', $review->product->url_key) }}"
                        class="text-blue-600 hover:text-blue-800 text-sm mt-3 inline-block font-medium">Ver producto →</a>
                    </div>
                @endforeach
            </div>
        </section>
    @endif

</x-shop::layouts>
