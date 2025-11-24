<x-shop::layouts>
    <x-slot:title>Servicios</x-slot>

    @push('styles')
        <link rel="stylesheet" href="{{ asset('css/servicios.css') }}">
    @endpush

    <!-- HERO -->
    <section class="hero">
        <div class="hero-content">
            <h1>SERVICIOS PROFESIONALES DE REDES Y SOPORTE TÉCNICO</h1>
            <p>Ofrecemos soluciones confiables y personalizadas para mantener tus sistemas, redes y equipos funcionando al máximo rendimiento.</p>
        </div>
    </section>

    <!-- SECCIÓN DE SERVICIOS -->
    <section id="servicios" class="servicios reveal">
        <h2>Nuestros Servicios</h2>

        <div class="servicio-lista">
            <!-- SERVICIO 1 -->
            <div class="servicio visible reveal">
                <div class="icono">💻</div>
                <h3>Soporte Técnico</h3>
                <ul class="subservicios">
                    <li>Mantenimiento preventivo y correctivo</li>
                    <li>Formateo e instalación de sistemas</li>
                    <li>Optimización de rendimiento</li>
                </ul>
                <p>Soluciones rápidas y efectivas para mantener tus equipos en óptimo estado y maximizar su rendimiento.</p>
            </div>

            <!-- SERVICIO 2 -->
            <div class="servicio visible reveal">
                <div class="icono">🌐</div>
                <h3>Redes y Conectividad</h3>
                <ul class="subservicios">
                    <li>Instalación y configuración de redes LAN/Wi-Fi</li>
                    <li>Seguridad de red y firewalls</li>
                    <li>Montaje de cableado estructurado</li>
                </ul>
                <p>Garantizamos conexiones estables y seguras para tu hogar u oficina, adaptadas a tus necesidades.</p>
            </div>

            <!-- SERVICIO 3 -->
            <div class="servicio visible reveal">
                <div class="icono">🔧</div>
                <h3>Infraestructura Tecnológica</h3>
                <ul class="subservicios">
                    <li>Implementación de servidores</li>
                    <li>Virtualización y respaldo de datos</li>
                    <li>Soporte a hardware empresarial</li>
                </ul>
                <p>Diseñamos y mantenemos infraestructuras sólidas que soporten el crecimiento y la eficiencia de tu empresa.</p>
            </div>

            <!-- SERVICIO 4 -->
            <div class="servicio visible reveal">
                <div class="icono">🧠</div>
                <h3>Consultoría IT</h3>
                <ul class="subservicios">
                    <li>Auditorías tecnológicas</li>
                    <li>Asesoría en seguridad informática</li>
                    <li>Optimización de procesos digitales</li>
                </ul>
                <p>Te ayudamos a tomar decisiones tecnológicas estratégicas para potenciar la productividad y seguridad.</p>
            </div>
        </div>

        <div class="cta reveal">
            <a href="{{ route('shop.home.contacto') }}" class="btn">Solicita una cotización</a>
        </div>
    </section>

    @push('scripts') 
        <script src="{{ asset('js/scroll.js') }}"></script>
    @endpush
</x-shop::layouts>
