<x-shop::layouts>
    <x-slot:title>Contáctanos</x-slot>
    @push('styles')
        <!-- ===== ESTILOS PROPIOS ===== -->
        <link rel="stylesheet" href="{{ asset('css/contacto.css') }}">
    @endpush
    
    <!-- ===== HERO ===== -->
    <section class="hero">
        <h1>Contáctanos</h1>
        <p>Estamos aquí para responder tus preguntas y brindarte las mejores soluciones tecnológicas</p>
    </section>

    <!-- ===== SECCIÓN DE CONTACTO ===== -->
    <section class="contact-section reveal">
        <div class="container">
            <div class="contact-container">
                <!-- Información de contacto -->
                <div class="contact-info reveal">
                    <h2 class="contact-title">Información de Contacto</h2>
                    
                    <div class="info-item">
                        <div class="info-icon">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <div class="info-content">
                            <h3>Dirección</h3>
                            <p>Calle Tecnológica 123, Distrito Digital, Ciudad</p>
                        </div>
                    </div>
                    
                    <div class="info-item">
                        <div class="info-icon">
                            <i class="fas fa-phone-alt"></i>
                        </div>
                        <div class="info-content">
                            <h3>Teléfono</h3>
                            <p><a href="tel:+1234567890">+1 (234) 567-890</a></p>
                        </div>
                    </div>
                    
                    <div class="info-item">
                        <div class="info-icon">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <div class="info-content">
                            <h3>Email</h3>
                            <p><a href="mailto:info@redeshard.com">info@redeshard.com</a></p>
                        </div>
                    </div>
                    
                    <div class="opening-hours">
                        <h3>Horario de Atención</h3>
                        <ul class="hours-list">
                            <li><span>Lunes - Viernes:</span> <span>9:00 - 18:00</span></li>
                            <li><span>Sábado:</span> <span>10:00 - 14:00</span></li>
                            <li><span>Domingo:</span> <span>Cerrado</span></li>
                        </ul>
                    </div>
                </div>
                
                <!-- Formulario -->
                <div class="contact-form reveal">
                    <h2 class="contact-title">Formulario de Contacto</h2>
                    <form>
                        <div class="form-group">
                            <label for="name">Nombre</label>
                            <input type="text" id="name" class="form-control" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="email">Correo Electrónico</label>
                            <input type="email" id="email" class="form-control" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="phone">Teléfono</label>
                            <input type="tel" id="phone" class="form-control">
                        </div>
                        
                        <div class="form-group">
                            <label for="message">Mensaje</label>
                            <textarea id="message" class="form-control" required></textarea>
                        </div>
                        
                        <button type="submit" class="btn submit-btn">Enviar Mensaje</button>
                    </form>
                </div>
            </div>
            
            <!-- Mapa -->
            <div class="map-container reveal">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3022.215573291234!2d-73.98784492416465!3d40.74844097138968!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c259a9b3117469%3A0xd134e199a405a163!2sEmpire%20State%20Building!5e0!3m2!1sen!2sus!4v1623251234567!5m2!1sen!2sus" allowfullscreen="" loading="lazy"></iframe>
            </div>
        </div>
    </section>
    @push('scripts')
        <script src="{{ asset('js/scroll.js') }}"></script>
    @endpush
</x-shop::layouts>
