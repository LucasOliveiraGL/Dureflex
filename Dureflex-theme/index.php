<?php get_header(); ?>

<main>
    <!-- Hero Section -->
    <section class="hero">
        <div class="hero-content">
            <h1>Soluções Completas para <span class="highlight">Logística e Armazenamento</span></h1>
            <p>A Dureflex oferece equipamentos e insumos de alta qualidade para otimizar sua operação logística. Desde racks industriais até sistemas automatizados, temos a solução ideal para seu negócio.</p>
            
            <div class="cta-buttons">
                <a href="#products" class="btn-primary">Ver Catálogo de Produtos</a>
                <a href="#contact" class="btn-secondary">Solicitar Consultoria</a>
            </div>
            
            <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 2rem; margin-top: 3rem; max-width: 900px; margin-left: auto; margin-right: auto;">
                <div style="text-align: center;">
                    <svg style="width: 3rem; height: 3rem; color: #fbbf24; margin: 0 auto 1rem;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                    </svg>
                    <h3 style="font-size: 1.25rem; font-weight: bold; margin-bottom: 0.5rem;">Equipamentos Premium</h3>
                    <p style="opacity: 0.9;">Produtos de alta durabilidade e performance para operações intensivas</p>
                </div>
                <div style="text-align: center;">
                    <svg style="width: 3rem; height: 3rem; color: #fbbf24; margin: 0 auto 1rem;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                    </svg>
                    <h3 style="font-size: 1.25rem; font-weight: bold; margin-bottom: 0.5rem;">Eficiência Aumentada</h3>
                    <p style="opacity: 0.9;">Soluções que aumentam a produtividade e reduzem custos operacionais</p>
                </div>
                <div style="text-align: center;">
                    <svg style="width: 3rem; height: 3rem; color: #fbbf24; margin: 0 auto 1rem;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                    </svg>
                    <h3 style="font-size: 1.25rem; font-weight: bold; margin-bottom: 0.5rem;">Suporte Especializado</h3>
                    <p style="opacity: 0.9;">Equipe técnica qualificada para instalação e manutenção</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Products Section -->
    <section id="products" class="products-section">
        <div class="section-title">Catálogo de Produtos</div>
        <div class="section-subtitle">
            Soluções completas para otimizar sua operação logística. Todos os produtos com garantia e suporte técnico especializado.
        </div>
        
        <?php echo do_shortcode('[dureflex_products]'); ?>
    </section>

    <!-- Testimonials Section -->
    <section id="testimonials" class="testimonials-section">
        <div class="section-title">Depoimentos de Clientes</div>
        <div class="section-subtitle">
            Confiança construída através de resultados excepcionais. Veja o que nossos clientes dizem sobre a qualidade dos nossos produtos e serviços.
        </div>
        
        <?php echo do_shortcode('[dureflex_testimonials]'); ?>
        
        <div style="background: #1e40af; color: white; padding: 2rem; border-radius: 0.5rem; text-align: center; margin-top: 3rem;">
            <h3 style="font-size: 1.5rem; font-weight: bold; margin-bottom: 1rem;">Junte-se a mais de 500 empresas satisfeitas</h3>
            <p style="font-size: 1.125rem; margin-bottom: 1.5rem;">Transforme sua operação logística com soluções da Dureflex</p>
            <a href="#contact" style="background: #fbbf24; color: #1e40af; padding: 0.75rem 1.5rem; border-radius: 0.375rem; font-weight: bold; text-decoration: none;">Solicitar Consultoria Gratuita</a>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="contact-section">
        <div class="section-title">Entre em Contato</div>
        <div class="section-subtitle">
            Pronto para transformar sua operação logística? Entre em contato com nossa equipe especializada para uma consultoria personalizada.
        </div>
        
        <div class="contact-container">
            <div class="contact-form">
                <h3>Solicite um Orçamento</h3>
                
                <form id="contact-form" method="post" action="<?php echo admin_url('admin-ajax.php'); ?>">
                    <input type="hidden" name="action" value="dureflex_contact_form">
                    <input type="hidden" name="nonce" value="<?php echo wp_create_nonce('dureflex_nonce'); ?>">
                    
                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem;">
                        <div class="form-group">
                            <label for="name">Nome Completo *</label>
                            <input type="text" id="name" name="name" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email *</label>
                            <input type="email" id="email" name="email" required>
                        </div>
                    </div>
                    
                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem;">
                        <div class="form-group">
                            <label for="company">Empresa *</label>
                            <input type="text" id="company" name="company" required>
                        </div>
                        <div class="form-group">
                            <label for="phone">Telefone *</label>
                            <input type="tel" id="phone" name="phone" required>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="product_interest">Produto de Interesse</label>
                        <select id="product_interest" name="product_interest">
                            <option value="">Selecione um produto...</option>
                            <option value="Rack System">Sistema de Racks</option>
                            <option value="Conveyor Belt">Esteira Transportadora</option>
                            <option value="Lift Table">Mesa Elevatória</option>
                            <option value="Stretch Wrap">Filme Stretch</option>
                            <option value="Shelving">Estantes Industriais</option>
                            <option value="Forklift">Empilhadeira</option>
                            <option value="Safety Equipment">Equipamentos de Segurança</option>
                            <option value="Other">Outro</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="message">Mensagem *</label>
                        <textarea id="message" name="message" rows="4" required placeholder="Descreva suas necessidades e como podemos ajudar..."></textarea>
                    </div>
                    
                    <button type="submit" class="btn-submit">
                        <span class="btn-text">Enviar Mensagem</span>
                        <span class="btn-loading" style="display: none;">Enviando...</span>
                    </button>
                </form>
                
                <div id="form-message" style="display: none; margin-top: 1rem; padding: 1rem; border-radius: 0.375rem;"></div>
            </div>
            
            <div class="contact-info">
                <div class="contact-card">
                    <h3>Informações de Contato</h3>
                    
                    <div class="contact-item">
                        <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                        </svg>
                        <div>
                            <p style="font-weight: bold;">Telefone</p>
                            <p style="color: #6b7280;">+55 (11) 9999-8888</p>
                            <p style="color: #6b7280; font-size: 0.875rem;">Segunda a Sexta, 8h às 18h</p>
                        </div>
                    </div>
                    
                    <div class="contact-item">
                        <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                        </svg>
                        <div>
                            <p style="font-weight: bold;">Email</p>
                            <p style="color: #6b7280;">contato@dureflex.com.br</p>
                            <p style="color: #6b7280; font-size: 0.875rem;">Resposta em até 24h</p>
                        </div>
                    </div>
                    
                    <div class="contact-item">
                        <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                        <div>
                            <p style="font-weight: bold;">Endereço</p>
                            <p style="color: #6b7280;">Av. Industrial, 1234</p>
                            <p style="color: #6b7280; font-size: 0.875rem;">São Paulo, SP - CEP 00000-000</p>
                        </div>
                    </div>
                    
                    <div class="contact-item">
                        <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <div>
                            <p style="font-weight: bold;">Horário de Atendimento</p>
                            <p style="color: #6b7280;">Segunda a Sexta: 8h - 18h</p>
                            <p style="color: #6b7280; font-size: 0.875rem;">Sábado: 9h - 13h</p>
                        </div>
                    </div>
                </div>
                
                <div class="contact-card" style="background: #1e40af; color: white;">
                    <h3>Consultoria Especializada</h3>
                    <p style="margin-bottom: 1rem;">Nossa equipe de especialistas está pronta para analisar suas necessidades e oferecer a solução mais adequada para sua operação.</p>
                    <ul style="list-style: none; padding: 0;">
                        <li style="margin-bottom: 0.5rem;">• Avaliação gratuita do espaço</li>
                        <li style="margin-bottom: 0.5rem;">• Projeto personalizado</li>
                        <li style="margin-bottom: 0.5rem;">• Instalação profissional</li>
                        <li style="margin-bottom: 0.5rem;">• Suporte técnico contínuo</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
</main>

<script>
jQuery(document).ready(function($) {
    $('#contact-form').on('submit', function(e) {
        e.preventDefault();
        
        var $form = $(this);
        var $submitBtn = $form.find('.btn-submit');
        var $btnText = $submitBtn.find('.btn-text');
        var $btnLoading = $submitBtn.find('.btn-loading');
        var $message = $('#form-message');
        
        $submitBtn.prop('disabled', true);
        $btnText.hide();
        $btnLoading.show();
        
        $.ajax({
            url: dureflex_ajax.ajax_url,
            type: 'POST',
            data: $form.serialize() + '&action=dureflex_contact_form&nonce=' + dureflex_ajax.nonce,
            success: function(response) {
                if (response.success) {
                    $message.removeClass('error').addClass('success')
                        .css({'background-color': '#d1fae5', 'color': '#065f46', 'border': '1px solid #6ee7b7'})
                        .text(response.data).show();
                    $form[0].reset();
                } else {
                    $message.removeClass('success').addClass('error')
                        .css({'background-color': '#fee2e2', 'color': '#991b1b', 'border': '1px solid #fca5a5'})
                        .text(response.data).show();
                }
            },
            error: function() {
                $message.removeClass('success').addClass('error')
                    .css({'background-color': '#fee2e2', 'color': '#991b1b', 'border': '1px solid #fca5a5'})
                    .text('Erro ao enviar mensagem. Por favor, tente novamente.').show();
            },
            complete: function() {
                $submitBtn.prop('disabled', false);
                $btnText.show();
                $btnLoading.hide();
            }
        });
    });
    
    // Smooth scroll for anchor links
    $('a[href^="#"]').on('click', function(e) {
        e.preventDefault();
        var target = $(this.getAttribute('href'));
        if (target.length) {
            $('html, body').animate({
                scrollTop: target.offset().top - 80
            }, 1000);
        }
    });
});
</script>

<?php get_footer(); ?>