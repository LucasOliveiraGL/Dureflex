// Dureflex Theme JavaScript
(function($) {
    'use strict';

    // Smooth scrolling for anchor links
    $('a[href^="#"]').on('click', function(e) {
        e.preventDefault();
        var target = $(this.getAttribute('href'));
        if (target.length) {
            $('html, body').animate({
                scrollTop: target.offset().top - 80
            }, 1000);
        }
    });

    // Mobile menu toggle
    $('.mobile-menu-toggle').on('click', function() {
        $('.nav-menu').toggleClass('active');
    });

    // Contact form handling
    $('#contact-form').on('submit', function(e) {
        e.preventDefault();
        
        var $form = $(this);
        var $submitBtn = $form.find('.btn-submit');
        var $btnText = $submitBtn.find('.btn-text');
        var $btnLoading = $submitBtn.find('.btn-loading');
        var $message = $('#form-message');
        
        // Reset message
        $message.hide().removeClass('success error');
        
        // Disable submit button
        $submitBtn.prop('disabled', true);
        $btnText.hide();
        $btnLoading.show();
        
        // Submit form via AJAX
        $.ajax({
            url: dureflex_ajax.ajax_url,
            type: 'POST',
            data: $form.serialize() + '&action=dureflex_contact_form&nonce=' + dureflex_ajax.nonce,
            success: function(response) {
                if (response.success) {
                    $message.addClass('success')
                        .css({
                            'background-color': '#d1fae5',
                            'color': '#065f46',
                            'border': '1px solid #6ee7b7',
                            'padding': '1rem',
                            'border-radius': '0.375rem',
                            'margin-top': '1rem'
                        })
                        .text(response.data).show();
                    $form[0].reset();
                } else {
                    $message.addClass('error')
                        .css({
                            'background-color': '#fee2e2',
                            'color': '#991b1b',
                            'border': '1px solid #fca5a5',
                            'padding': '1rem',
                            'border-radius': '0.375rem',
                            'margin-top': '1rem'
                        })
                        .text(response.data || 'Erro ao enviar mensagem.').show();
                }
            },
            error: function() {
                $message.addClass('error')
                    .css({
                        'background-color': '#fee2e2',
                        'color': '#991b1b',
                        'border': '1px solid #fca5a5',
                        'padding': '1rem',
                        'border-radius': '0.375rem',
                        'margin-top': '1rem'
                    })
                    .text('Erro ao enviar mensagem. Por favor, tente novamente.').show();
            },
            complete: function() {
                $submitBtn.prop('disabled', false);
                $btnText.show();
                $btnLoading.hide();
                
                // Auto-hide message after 5 seconds
                setTimeout(function() {
                    $message.fadeOut();
                }, 5000);
            }
        });
    });

    // Product filtering
    $('.filter-btn').on('click', function() {
        var category = $(this).data('category');
        
        // Update active state
        $('.filter-btn').removeClass('active');
        $(this).addClass('active');
        
        // Filter products
        if (category === 'all') {
            $('.product-card').show();
        } else {
            $('.product-card').hide();
            $('.product-card[data-category="' + category + '"]').show();
        }
    });

    // Product modal functionality
    $('.btn-product[data-action="details"]').on('click', function() {
        var productId = $(this).data('product-id');
        // Open product modal
        openProductModal(productId);
    });

    // Close modal when clicking outside
    $(document).on('click', '.modal-overlay', function(e) {
        if (e.target === this) {
            $(this).fadeOut();
        }
    });

    // Header scroll effect
    $(window).on('scroll', function() {
        var scroll = $(window).scrollTop();
        if (scroll > 100) {
            $('.site-header').addClass('scrolled');
        } else {
            $('.site-header').removeClass('scrolled');
        }
    });

    // Lazy loading images
    if ('IntersectionObserver' in window) {
        var imageObserver = new IntersectionObserver(function(entries, observer) {
            entries.forEach(function(entry) {
                if (entry.isIntersecting) {
                    var img = $(entry.target);
                    img.attr('src', img.data('src')).removeClass('lazy');
                    observer.unobserve(entry.target);
                }
            });
        });

        $('img.lazy').each(function() {
            imageObserver.observe(this);
        });
    }

    // Form validation
    function validateForm(form) {
        var isValid = true;
        var requiredFields = form.find('[required]');
        
        requiredFields.each(function() {
            var field = $(this);
            if (!field.val().trim()) {
                field.addClass('error');
                isValid = false;
            } else {
                field.removeClass('error');
            }
        });
        
        // Email validation
        var emailField = form.find('input[type="email"]');
        if (emailField.length) {
            var email = emailField.val();
            var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailRegex.test(email)) {
                emailField.addClass('error');
                isValid = false;
            }
        }
        
        return isValid;
    }

    // Utility function to open product modal
    function openProductModal(productId) {
        // This would be implemented based on your needs
        console.log('Opening product modal for ID:', productId);
    }

})(jQuery);

// WordPress specific functions
(function() {
    // Ensure jQuery is available
    if (typeof jQuery === 'undefined') {
        console.error('jQuery is required for Dureflex theme functionality');
        return;
    }
})();