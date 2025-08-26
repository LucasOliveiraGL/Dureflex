<?php
/**
 * Theme Functions
 * Dureflex - Logística & Armazenamento
 */

// Theme Setup
function dureflex_setup() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', array('search-form', 'comment-list', 'comment-form', 'gallery', 'caption'));
    add_theme_support('custom-logo');
    add_theme_support('custom-header');
    add_theme_support('custom-background');
    
    // Register Navigation Menus
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'dureflex'),
        'footer' => __('Footer Menu', 'dureflex')
    ));
    
    // Add image sizes
    add_image_size('product-thumb', 400, 300, true);
    add_image_size('testimonial-avatar', 100, 100, true);
}
add_action('after_setup_theme', 'dureflex_setup');

// Enqueue Scripts and Styles
function dureflex_scripts() {
    // Enqueue theme stylesheet
    wp_enqueue_style('dureflex-style', get_stylesheet_uri());
    
    // Enqueue custom JavaScript
    wp_enqueue_script('dureflex-script', get_template_directory_uri() . '/assets/js/main.js', array('jquery'), '1.0.0', true);
    
    // Localize script for AJAX
    wp_localize_script('dureflex-script', 'dureflex_ajax', array(
        'ajax_url' => admin_url('admin-ajax.php'),
        'nonce' => wp_create_nonce('dureflex_nonce')
    ));
}
add_action('wp_enqueue_scripts', 'dureflex_scripts');

// Custom Post Types
function dureflex_custom_post_types() {
    // Products
    register_post_type('products', array(
        'labels' => array(
            'name' => __('Produtos', 'dureflex'),
            'singular_name' => __('Produto', 'dureflex')
        ),
        'public' => true,
        'has_archive' => true,
        'supports' => array('title', 'editor', 'thumbnail', 'custom-fields'),
        'rewrite' => array('slug' => 'produtos'),
        'show_in_rest' => true
    ));
    
    // Testimonials
    register_post_type('testimonials', array(
        'labels' => array(
            'name' => __('Depoimentos', 'dureflex'),
            'singular_name' => __('Depoimento', 'dureflex')
        ),
        'public' => true,
        'has_archive' => false,
        'supports' => array('title', 'editor', 'thumbnail', 'custom-fields'),
        'rewrite' => array('slug' => 'depoimentos'),
        'show_in_rest' => true
    ));
}
add_action('init', 'dureflex_custom_post_types');

// Custom Taxonomies
function dureflex_custom_taxonomies() {
    // Product Categories
    register_taxonomy('product_category', 'products', array(
        'labels' => array(
            'name' => __('Categorias de Produtos', 'dureflex'),
            'singular_name' => __('Categoria de Produto', 'dureflex')
        ),
        'hierarchical' => true,
        'rewrite' => array('slug' => 'categoria-produto'),
        'show_in_rest' => true
    ));
}
add_action('init', 'dureflex_custom_taxonomies');

// Custom Meta Boxes
function dureflex_add_meta_boxes() {
    // Product Meta Box
    add_meta_box(
        'product_details',
        __('Detalhes do Produto', 'dureflex'),
        'dureflex_product_meta_box_callback',
        'products',
        'normal',
        'high'
    );
    
    // Testimonial Meta Box
    add_meta_box(
        'testimonial_details',
        __('Detalhes do Depoimento', 'dureflex'),
        'dureflex_testimonial_meta_box_callback',
        'testimonials',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'dureflex_add_meta_boxes');

// Product Meta Box Callback
function dureflex_product_meta_box_callback($post) {
    wp_nonce_field('dureflex_save_product_data', 'dureflex_product_nonce');
    
    $price = get_post_meta($post->ID, '_product_price', true);
    $specifications = get_post_meta($post->ID, '_product_specifications', true);
    $in_stock = get_post_meta($post->ID, '_product_in_stock', true);
    $featured = get_post_meta($post->ID, '_product_featured', true);
    ?>
    <p>
        <label for="product_price">Preço (R$):</label><br>
        <input type="number" step="0.01" id="product_price" name="product_price" value="<?php echo esc_attr($price); ?>" style="width: 100%;">
    </p>
    <p>
        <label for="product_specifications">Especificações (uma por linha):</label><br>
        <textarea id="product_specifications" name="product_specifications" rows="5" style="width: 100%;"><?php echo esc_textarea($specifications); ?></textarea>
    </p>
    <p>
        <label>
            <input type="checkbox" name="product_in_stock" value="1" <?php checked($in_stock, 1); ?>>
            Em Estoque
        </label>
    </p>
    <p>
        <label>
            <input type="checkbox" name="product_featured" value="1" <?php checked($featured, 1); ?>>
            Produto em Destaque
        </label>
    </p>
    <?php
}

// Testimonial Meta Box Callback
function dureflex_testimonial_meta_box_callback($post) {
    wp_nonce_field('dureflex_save_testimonial_data', 'dureflex_testimonial_nonce');
    
    $company = get_post_meta($post->ID, '_testimonial_company', true);
    $role = get_post_meta($post->ID, '_testimonial_role', true);
    $rating = get_post_meta($post->ID, '_testimonial_rating', true);
    ?>
    <p>
        <label for="testimonial_company">Empresa:</label><br>
        <input type="text" id="testimonial_company" name="testimonial_company" value="<?php echo esc_attr($company); ?>" style="width: 100%;">
    </p>
    <p>
        <label for="testimonial_role">Cargo:</label><br>
        <input type="text" id="testimonial_role" name="testimonial_role" value="<?php echo esc_attr($role); ?>" style="width: 100%;">
    </p>
    <p>
        <label for="testimonial_rating">Avaliação (1-5):</label><br>
        <select id="testimonial_rating" name="testimonial_rating" style="width: 100%;">
            <option value="5" <?php selected($rating, 5); ?>>5 - Excelente</option>
            <option value="4" <?php selected($rating, 4); ?>>4 - Muito Bom</option>
            <option value="3" <?php selected($rating, 3); ?>>3 - Bom</option>
            <option value="2" <?php selected($rating, 2); ?>>2 - Regular</option>
            <option value="1" <?php selected($rating, 1); ?>>1 - Ruim</option>
        </select>
    </p>
    <?php
}

// Save Meta Box Data
function dureflex_save_meta_box_data($post_id) {
    // Product data
    if (isset($_POST['dureflex_product_nonce']) && 
        wp_verify_nonce($_POST['dureflex_product_nonce'], 'dureflex_save_product_data')) {
        
        if (isset($_POST['product_price'])) {
            update_post_meta($post_id, '_product_price', sanitize_text_field($_POST['product_price']));
        }
        if (isset($_POST['product_specifications'])) {
            update_post_meta($post_id, '_product_specifications', sanitize_textarea_field($_POST['product_specifications']));
        }
        if (isset($_POST['product_in_stock'])) {
            update_post_meta($post_id, '_product_in_stock', 1);
        } else {
            update_post_meta($post_id, '_product_in_stock', 0);
        }
        if (isset($_POST['product_featured'])) {
            update_post_meta($post_id, '_product_featured', 1);
        } else {
            update_post_meta($post_id, '_product_featured', 0);
        }
    }
    
    // Testimonial data
    if (isset($_POST['dureflex_testimonial_nonce']) && 
        wp_verify_nonce($_POST['dureflex_testimonial_nonce'], 'dureflex_save_testimonial_data')) {
        
        if (isset($_POST['testimonial_company'])) {
            update_post_meta($post_id, '_testimonial_company', sanitize_text_field($_POST['testimonial_company']));
        }
        if (isset($_POST['testimonial_role'])) {
            update_post_meta($post_id, '_testimonial_role', sanitize_text_field($_POST['testimonial_role']));
        }
        if (isset($_POST['testimonial_rating'])) {
            update_post_meta($post_id, '_testimonial_rating', intval($_POST['testimonial_rating']));
        }
    }
}
add_action('save_post', 'dureflex_save_meta_box_data');

// Contact Form Handler
function dureflex_handle_contact_form() {
    if (!wp_verify_nonce($_POST['nonce'], 'dureflex_nonce')) {
        wp_die('Security check failed');
    }
    
    $name = sanitize_text_field($_POST['name']);
    $email = sanitize_email($_POST['email']);
    $company = sanitize_text_field($_POST['company']);
    $phone = sanitize_text_field($_POST['phone']);
    $message = sanitize_textarea_field($_POST['message']);
    $product_interest = sanitize_text_field($_POST['product_interest']);
    
    $to = get_option('admin_email');
    $subject = 'Novo Contato - Dureflex';
    $body = "Nome: $name\nEmail: $email\nEmpresa: $company\nTelefone: $phone\nProduto de Interesse: $product_interest\nMensagem: $message";
    $headers = array('Content-Type: text/plain; charset=UTF-8');
    
    if (wp_mail($to, $subject, $body, $headers)) {
        wp_send_json_success('Mensagem enviada com sucesso!');
    } else {
        wp_send_json_error('Erro ao enviar mensagem.');
    }
}
add_action('wp_ajax_dureflex_contact_form', 'dureflex_handle_contact_form');
add_action('wp_ajax_nopriv_dureflex_contact_form', 'dureflex_handle_contact_form');

// Custom Shortcodes
function dureflex_products_shortcode($atts) {
    $atts = shortcode_atts(array(
        'category' => '',
        'limit' => -1,
        'featured' => false
    ), $atts);
    
    $args = array(
        'post_type' => 'products',
        'posts_per_page' => $atts['limit'],
        'orderby' => 'date',
        'order' => 'DESC'
    );
    
    if ($atts['category']) {
        $args['tax_query'] = array(
            array(
                'taxonomy' => 'product_category',
                'field' => 'slug',
                'terms' => $atts['category']
            )
        );
    }
    
    if ($atts['featured'] == 'true') {
        $args['meta_query'] = array(
            array(
                'key' => '_product_featured',
                'value' => 1,
                'compare' => '='
            )
        );
    }
    
    $products = new WP_Query($args);
    
    ob_start();
    if ($products->have_posts()) {
        echo '<div class="products-grid">';
        while ($products->have_posts()) {
            $products->the_post();
            get_template_part('template-parts/product', 'card');
        }
        echo '</div>';
    }
    wp_reset_postdata();
    
    return ob_get_clean();
}
add_shortcode('dureflex_products', 'dureflex_products_shortcode');

function dureflex_testimonials_shortcode($atts) {
    $atts = shortcode_atts(array(
        'limit' => -1
    ), $atts);
    
    $args = array(
        'post_type' => 'testimonials',
        'posts_per_page' => $atts['limit'],
        'orderby' => 'date',
        'order' => 'DESC'
    );
    
    $testimonials = new WP_Query($args);
    
    ob_start();
    if ($testimonials->have_posts()) {
        echo '<div class="testimonials-grid">';
        while ($testimonials->have_posts()) {
            $testimonials->the_post();
            get_template_part('template-parts/testimonial', 'card');
        }
        echo '</div>';
    }
    wp_reset_postdata();
    
    return ob_get_clean();
}
add_shortcode('dureflex_testimonials', 'dureflex_testimonials_shortcode');

// Widget Areas
function dureflex_widgets_init() {
    register_sidebar(array(
        'name' => __('Sidebar Principal', 'dureflex'),
        'id' => 'primary-sidebar',
        'description' => __('Widgets para a sidebar principal', 'dureflex'),
        'before_widget' => '<div class="widget">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ));
    
    register_sidebar(array(
        'name' => __('Footer Coluna 1', 'dureflex'),
        'id' => 'footer-1',
        'before_widget' => '<div class="footer-widget">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="footer-widget-title">',
        'after_title' => '</h3>',
    ));
    
    register_sidebar(array(
        'name' => __('Footer Coluna 2', 'dureflex'),
        'id' => 'footer-2',
        'before_widget' => '<div class="footer-widget">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="footer-widget-title">',
        'after_title' => '</h3>',
    ));
    
    register_sidebar(array(
        'name' => __('Footer Coluna 3', 'dureflex'),
        'id' => 'footer-3',
        'before_widget' => '<div class="footer-widget">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="footer-widget-title">',
        'after_title' => '</h3>',
    ));
}
add_action('widgets_init', 'dureflex_widgets_init');

// Customizer Settings
function dureflex_customize_register($wp_customize) {
    // Contact Info Section
    $wp_customize->add_section('contact_info', array(
        'title' => __('Informações de Contato', 'dureflex'),
        'priority' => 30,
    ));
    
    $wp_customize->add_setting('contact_phone', array(
        'default' => '+55 (11) 9999-8888',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('contact_phone', array(
        'label' => __('Telefone', 'dureflex'),
        'section' => 'contact_info',
        'type' => 'text',
    ));
    
    $wp_customize->add_setting('contact_email', array(
        'default' => 'contato@dureflex.com.br',
        'sanitize_callback' => 'sanitize_email',
    ));
    
    $wp_customize->add_control('contact_email', array(
        'label' => __('Email', 'dureflex'),
        'section' => 'contact_info',
        'type' => 'email',
    ));
    
    $wp_customize->add_setting('contact_address', array(
        'default' => 'Av. Industrial, 1234 - São Paulo, SP',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('contact_address', array(
        'label' => __('Endereço', 'dureflex'),
        'section' => 'contact_info',
        'type' => 'text',
    ));
}
add_action('customize_register', 'dureflex_customize_register');

// Remove WordPress Admin Bar for non-admins
function dureflex_remove_admin_bar() {
    if (!current_user_can('administrator') && !is_admin()) {
        show_admin_bar(false);
    }
}
add_action('after_setup_theme', 'dureflex_remove_admin_bar');

// Add page slug to body class
function dureflex_add_slug_body_class($classes) {
    global $post;
    if (isset($post)) {
        $classes[] = $post->post_type . '-' . $post->post_name;
    }
    return $classes;
}
add_filter('body_class', 'dureflex_add_slug_body_class');

// Custom excerpt length
function dureflex_excerpt_length($length) {
    return 20;
}
add_filter('excerpt_length', 'dureflex_excerpt_length', 999);

// Custom excerpt more
function dureflex_excerpt_more($more) {
    return '...';
}
add_filter('excerpt_more', 'dureflex_excerpt_more');
?>