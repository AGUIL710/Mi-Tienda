<x-shop::layouts>
    <x-slot:title>Nosotros</x-slot>
    @push('styles')
        <!-- ===== ESTILOS PROPIOS ===== -->
        <link rel="stylesheet" href="{{ asset('css/nosotros.css') }}">
    @endpush

    <section class="hero">
        <h1>Conoce Nuestra Historia</h1>
        <p>Más de 10 años brindando soluciones tecnológicas de calidad</p>
    </section>

    <section class="section reveal">
        <div class="container">
            <div class="section-title reveal">
                <h2>Nuestra Historia</h2>
            </div>

            <div class="history">
                <div class="history-content">
                    <p>
                        Somos una empresa dedicada a ofrecer soluciones tecnológicas integrales. 
                        Desde nuestros inicios, nos hemos enfocado en brindar un servicio de calidad, 
                        innovador y confiable a todos nuestros clientes.
                        Somos una empresa dedicada a ofrecer soluciones tecnológicas integrales. 
                        Desde nuestros inicios, nos hemos enfocado en brindar un servicio de calidad, 
                        innovador y confiable a todos nuestros clientes.
                        Somos una empresa dedicada a ofrecer soluciones tecnológicas integrales. 
                        Desde nuestros inicios, nos hemos enfocado en brindar un servicio de calidad, 
                        innovador y confiable a todos nuestros clientes.
                        Somos una empresa dedicada a ofrecer soluciones tecnológicas integrales. 
                        Desde nuestros inicios, nos hemos enfocado en brindar un servicio de calidad, 
                        innovador y confiable a todos nuestros clientes.
                        Somos una empresa dedicada a ofrecer soluciones tecnológicas integrales. 
                        Desde nuestros inicios, nos hemos enfocado en brindar un servicio de calidad, 
                        innovador y confiable a todos nuestros clientes.
                    </p>
                </div>
                <div class="history-image">
                    <img src="https://images.unsplash.com/photo-1519389950473-47ba0277781c" alt="Nuestra historia">
                </div>
            </div>

            <div class="mission-vision reveal">
                <div class="mission">
                    <i class="fas fa-bullseye"></i>
                    <h3>Misión</h3>
                    <p>
                        Brindar servicios tecnológicos confiables, ofreciendo soluciones eficientes que 
                        ayuden a nuestros clientes a mejorar su productividad y experiencia digital.
                    </p>
                </div>

                <div class="vision">
                    <i class="fas fa-eye"></i>
                    <h3>Visión</h3>
                    <p>
                        Ser líderes en innovación tecnológica, reconocidos por nuestro compromiso, 
                        calidad y atención personalizada.
                    </p>
                </div>
            </div>

            <!-- Nuestro Equipo -->
            <div class="team">
                <div class="section-title reveal">
                    <h2>Nuestro Equipo</h2>
                </div>
                
                <div class="team-members reveal">
                    <div class="team-member">
                        <div class="member-image">
                            <img src="https://images.unsplash.com/photo-1560250097-0b93528c311a?ixlib=rb-1.2.1&auto=format&fit=crop&w=634&q=80" alt="Carlos Martínez">
                        </div>
                        <div class="member-info">
                            <h3>Carlos Martínez</h3>
                            <p>CEO & Fundador</p>
                        </div>
                    </div>
                    
                    <div class="team-member">
                        <div class="member-image">
                            <img src="https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?ixlib=rb-1.2.1&auto=format&fit=crop&w=634&q=80" alt="Ana Rodríguez">
                        </div>
                        <div class="member-info">
                            <h3>Ana Rodríguez</h3>
                            <p>Directora de Proyectos</p>
                        </div>
                    </div>
                    
                    <div class="team-member">
                        <div class="member-image">
                            <img src="https://images.unsplash.com/photo-1580489944761-15a19d654956?ixlib=rb-1.2.1&auto=format&fit=crop&w=634&q=80" alt="Luisa Fernández">
                        </div>
                        <div class="member-info">
                            <h3>Luisa Fernández</h3>
                            <p>Ingeniera de Redes</p>
                        </div>
                    </div>
                    
                    <div class="team-member">
                        <div class="member-image">
                            <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?ixlib=rb-1.2.1&auto=format&fit=crop&w=634&q=80" alt="Jorge López">
                        </div>
                        <div class="member-info">
                            <h3>Jorge López</h3>
                            <p>Desarrollador Senior</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Nuestros Valores -->
            <div class="section-title reveal">
                <h2>Nuestros Valores</h2>
            </div>

            <div class="values reveal">
                <div class="value-card">
                    <div class="value-icon"><i class="fas fa-handshake"></i></div>
                    <h3>Compromiso</h3>
                    <p>Nos comprometemos con cada cliente para superar sus expectativas.</p>
                </div>

                <div class="value-card">
                    <div class="value-icon"><i class="fas fa-lightbulb"></i></div>
                    <h3>Innovación</h3>
                    <p>Buscamos constantemente nuevas formas de mejorar y crear valor.</p>
                </div>

                <div class="value-card">
                    <div class="value-icon"><i class="fas fa-users"></i></div>
                    <h3>Trabajo en equipo</h3>
                    <p>Creemos en la colaboración como clave del éxito.</p>
                </div>

                <div class="value-card">
                    <div class="value-icon"><i class="fas fa-award"></i></div>
                    <h3>Excelencia</h3>
                    <p>Nos esforzamos por ofrecer siempre un servicio de la más alta calidad.</p>
                </div>
            </div>
        </div>
    </section>
    @push('scripts')
        <script src="{{ asset('js/scroll.js') }}"></script>
    @endpush
</x-shop::layouts>
