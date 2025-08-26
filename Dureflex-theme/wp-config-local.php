<?php
/**
 * Configuração local do WordPress para desenvolvimento
 * Este arquivo simula as configurações básicas do WordPress para testar o tema
 */

// Configurações do banco de dados (SQLite para desenvolvimento local)
define('DB_NAME', 'dureflex_local');
define('DB_USER', 'root');
define('DB_PASSWORD', '');
define('DB_HOST', 'localhost');
define('DB_CHARSET', 'utf8mb4');
define('DB_COLLATE', '');

// Chaves de autenticação e salts
define('AUTH_KEY',         'dureflex-auth-key-local-development-only');
define('SECURE_AUTH_KEY',  'dureflex-secure-auth-key-local-development');
define('LOGGED_IN_KEY',    'dureflex-logged-in-key-local-development');
define('NONCE_KEY',        'dureflex-nonce-key-local-development-only');
define('AUTH_SALT',        'dureflex-auth-salt-local-development-only');
define('SECURE_AUTH_SALT', 'dureflex-secure-auth-salt-local-development');
define('LOGGED_IN_SALT',   'dureflex-logged-in-salt-local-development');
define('NONCE_SALT',       'dureflex-nonce-salt-local-development-only');

// Prefixo da tabela
$table_prefix = 'wp_';

// Modo de desenvolvimento
define('WP_DEBUG', true);
define('WP_DEBUG_LOG', true);
define('WP_DEBUG_DISPLAY', true);

// Configurações locais
define('WP_HOME', 'http://localhost:8080');
define('WP_SITEURL', 'http://localhost:8080');

// Não editar daqui para baixo
if (!defined('ABSPATH')) {
    define('ABSPATH', __DIR__ . '/');
}

// Variáveis globais simuladas do WordPress
global $wp_version;
$wp_version = '6.4.0';

// Funções básicas para testar o tema
if (!function_exists('get_header')) {
    function get_header() {
        include 'header.php';
    }
}

if (!function_exists('get_footer')) {
    function get_footer() {
        include 'footer.php';
    }
}

if (!function_exists('wp_head')) {
    function wp_head() {
        echo "<!-- WordPress Head -->\n";
        echo "<meta charset=\"" . get_bloginfo('charset') . "\">\n";
        echo "<meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">\n";
        echo "<title>" . get_bloginfo('name') . "</title>\n";
    }
}

if (!function_exists('wp_footer')) {
    function wp_footer() {
        echo "<!-- WordPress Footer -->\n";
    }
}

if (!function_exists('get_bloginfo')) {
    function get_bloginfo($show = '') {
        switch ($show) {
            case 'name':
                return 'Dureflex - Suprimentos Logísticos';
            case 'description':
                return 'Soluções completas em equipamentos industriais e sistemas de armazenamento';
            case 'charset':
                return 'UTF-8';
            case 'url':
                return 'http://localhost:8080';
            default:
                return 'Dureflex';
        }
    }
}

if (!function_exists('bloginfo')) {
    function bloginfo($show = '') {
        echo get_bloginfo($show);
    }
}

if (!function_exists('admin_url')) {
    function admin_url($path = '') {
        return 'http://localhost:8080/wp-admin/' . $path;
    }
}

if (!function_exists('wp_create_nonce')) {
    function wp_create_nonce($action = '') {
        return md5('dureflex_nonce_' . $action . time());
    }
}

if (!function_exists('get_template_directory_uri')) {
    function get_template_directory_uri() {
        return 'http://localhost:8080';
    }
}

if (!function_exists('wp_enqueue_style')) {
    function wp_enqueue_style($handle, $src = '', $deps = array(), $ver = false, $media = 'all') {
        // Simular enfileiramento de estilos
        echo "<!-- Enqueued style: $handle -->\n";
    }
}

if (!function_exists('wp_enqueue_script')) {
    function wp_enqueue_script($handle, $src = '', $deps = array(), $ver = false, $in_footer = false) {
        // Simular enfileiramento de scripts
        echo "<!-- Enqueued script: $handle -->\n";
    }
}

if (!function_exists('add_theme_support')) {
    function add_theme_support($feature, ...$args) {
        // Simular suporte a recursos do tema
        return true;
    }
}

if (!function_exists('register_nav_menus')) {
    function register_nav_menus($locations = array()) {
        // Simular registro de menus
        return true;
    }
}

if (!function_exists('add_action')) {
    function add_action($tag, $function_to_add, $priority = 10, $accepted_args = 1) {
        // Simular hooks do WordPress
        return true;
    }
}

if (!function_exists('wp_nav_menu')) {
    function wp_nav_menu($args = array()) {
        // Menu de navegação simulado
        echo '<ul class="nav-menu">';
        echo '<li><a href="#inicio" style="font-family: Inter, sans-serif !important; font-weight: 600 !important;">Início</a></li>';
        echo '<li><a href="#products" style="font-family: Inter, sans-serif !important; font-weight: 600 !important;">Produtos</a></li>';
        echo '<li><a href="#testimonials" style="font-family: Inter, sans-serif !important; font-weight: 600 !important;">Depoimentos</a></li>';
        echo '<li><a href="#contact" style="font-family: Inter, sans-serif !important; font-weight: 600 !important;">Contato</a></li>';
        echo '</ul>';
    }
}

if (!function_exists('language_attributes')) {
    function language_attributes() {
        echo 'lang="pt-BR"';
    }
}

if (!function_exists('body_class')) {
    function body_class() {
        echo 'class="dureflex-theme local-development"';
    }
}

if (!function_exists('get_theme_mod')) {
    function get_theme_mod($name, $default = '') {
        $mods = array(
            'contact_phone' => '+55 (11) 9999-8888',
            'contact_email' => 'contato@dureflex.com.br',
            'contact_address' => 'Av. Industrial, 1234 - São Paulo, SP'
        );
        return isset($mods[$name]) ? $mods[$name] : $default;
    }
}

if (!function_exists('do_shortcode')) {
    function do_shortcode($content) {
        // Simular shortcodes do tema
        if (strpos($content, '[dureflex_products]') !== false) {
            return get_products_html();
        }
        if (strpos($content, '[dureflex_testimonials]') !== false) {
            return get_testimonials_html();
        }
        return $content;
    }
}

// Funções auxiliares para renderizar produtos e depoimentos
function get_products_html() {
    $products = get_sample_products();
    $html = '<div class="products-grid">';
    
    foreach ($products as $product) {
        $html .= '<div class="product-card">';
        $html .= '<div class="product-image">';
        $html .= '<div class="placeholder-image">Imagem do Produto</div>';
        $html .= '</div>';
        $html .= '<div class="product-info">';
        $html .= '<h3 class="product-title">' . htmlspecialchars($product['title']) . '</h3>';
        $html .= '<p class="product-category">' . htmlspecialchars($product['category']) . '</p>';
        $html .= '<div class="product-price">R$ ' . number_format($product['price'], 2, ',', '.') . '</div>';
        $html .= '<div class="product-specs">';
        foreach ($product['specs'] as $spec) {
            $html .= '<div class="spec-item">• ' . htmlspecialchars($spec) . '</div>';
        }
        $html .= '</div>';
        $html .= '<button class="btn-product">Solicitar Orçamento</button>';
        $html .= '</div>';
        $html .= '</div>';
    }
    
    $html .= '</div>';
    return $html;
}

function get_testimonials_html() {
    $testimonials = get_sample_testimonials();
    $html = '<div class="testimonials-grid">';
    
    foreach ($testimonials as $testimonial) {
        $html .= '<div class="testimonial-card">';
        $html .= '<div class="testimonial-rating">';
        for ($i = 0; $i < $testimonial['rating']; $i++) {
            $html .= '<span class="star">⭐</span>';
        }
        $html .= '</div>';
        $html .= '<blockquote class="testimonial-content">"' . htmlspecialchars($testimonial['content']) . '"</blockquote>';
        $html .= '<div class="testimonial-author">';
        $html .= '<strong>' . htmlspecialchars($testimonial['name']) . '</strong>';
        $html .= '<div class="testimonial-company">' . htmlspecialchars($testimonial['position']) . ' - ' . htmlspecialchars($testimonial['company']) . '</div>';
        $html .= '</div>';
        $html .= '</div>';
    }
    
    $html .= '</div>';
    return $html;
}

// Dados simulados para produtos
function get_sample_products() {
    return [
        [
            'id' => 1,
            'title' => 'Caixa de Folhas A4',
            'price' => 25,90,
            'category' => 'Papelaria Corporativa',
            'image' => 'assets/images/folha-a4-caixa.jpg',
            'specs' => [
                'Formato: A4 (210 x 297mm)',
                'Gramatura: 75g/m²',
                'Quantidade: 500 folhas por pacote',
                'Brancura: 96% ISO',
                'Papel alcalino de alta qualidade',
                'Ideal para impressão e cópias'
            ]
        ],
        [
            'id' => 2,
            'title' => 'Filme Stretch',
            'price' => 85.00,
            'category' => 'Embalagem Industrial',
            'image' => 'assets/images/filme-stretch.jpg',
            'specs' => [
                'Espessura: 20 microns',
                'Largura: 500mm',
                'Comprimento: 300 metros por rolo',
                'Peso do rolo: 2,8kg',
                'Transparente cristal',
                'Resistente a rasgos e perfurações'
            ]
        ],
        [
            'id' => 3,
            'title' => 'Etiquetas',
            'price' => 45.00,
            'category' => 'Identificação',
            'image' => 'assets/images/etiquetas.jpg',
            'specs' => [
                'Dimensões: 100x50mm',
                'Material: Papel adesivo branco',
                'Adesivo: Permanente',
                'Quantidade: 1000 unidades por rolo',
                'Compatível com impressoras térmicas',
                'Resistente a umidade'
            ]
        ],
        [
            'id' => 4,
            'title' => 'Fitas Adesivas',
            'price' => 12.00,
            'category' => 'Material de Embalagem',
            'image' => 'assets/images/fitas-adesivas.jpg',
            'specs' => [
                'Largura: 48mm',
                'Comprimento: 100 metros',
                'Espessura: 40 microns',
                'Cor: Transparente',
                'Adesivo acrílico de alta aderência',
                'Silenciosa ao desenrolar'
            ]
        ]
    ];
}

// Dados simulados para depoimentos
function get_sample_testimonials() {
    return [
        [
            'id' => 1,
            'name' => 'Carlos Mendes',
            'company' => 'Escritório Contábil Santos',
            'position' => 'Gerente Administrativo',
            'rating' => 5,
            'content' => 'As folhas A4 da Dureflex têm excelente qualidade para impressão. Não emperram na impressora e a brancura é perfeita. Ótimo custo-benefício para nosso escritório!'
        ],
        [
            'id' => 2,
            'name' => 'Marina Silva',
            'company' => 'Distribuidora Central',
            'position' => 'Coordenadora de Expedição',
            'rating' => 5,
            'content' => 'O filme stretch é resistente e transparente, ideal para nossa operação. As fitas adesivas são silenciosas e muito aderentes. Produtos de qualidade com entrega rápida!'
        ],
        [
            'id' => 3,
            'name' => 'Roberto Santos',
            'company' => 'Loja Online Tech',
            'position' => 'Responsável por Embalagem',
            'rating' => 5,
            'content' => 'As etiquetas são perfeitas para nossos produtos. Boa aderência, não descolam e são compatíveis com nossa impressora térmica. Recomendo a Dureflex!'
        ]
    ];
}
