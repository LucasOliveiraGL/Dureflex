<?php
$price = get_post_meta(get_the_ID(), '_product_price', true);
$specifications = get_post_meta(get_the_ID(), '_product_specifications', true);
$in_stock = get_post_meta(get_the_ID(), '_product_in_stock', true);
$featured = get_post_meta(get_the_ID(), '_product_featured', true);
$categories = wp_get_post_terms(get_the_ID(), 'product_category');
?>

<div class="product-card">
    <div class="product-image">
        <?php if (has_post_thumbnail()) : ?>
            <?php the_post_thumbnail('product-thumb', array('alt' => get_the_title())); ?>
        <?php else : ?>
            <svg width="96" height="96" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="color: #9ca3af;">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
            </svg>
        <?php endif; ?>
        
        <?php if ($featured) : ?>
            <span style="position: absolute; top: 8px; right: 8px; background: #fbbf24; color: #92400e; padding: 4px 8px; border-radius: 4px; font-size: 0.75rem; font-weight: bold;">Destaque</span>
        <?php endif; ?>
        
        <?php if (!$in_stock) : ?>
            <div style="position: absolute; inset: 0; background: rgba(0,0,0,0.5); display: flex; align-items: center; justify-content: center;">
                <span style="background: #ef4444; color: white; padding: 0.5rem 1rem; border-radius: 9999px; font-size: 0.875rem; font-weight: bold;">Indisponível</span>
            </div>
        <?php endif; ?>
    </div>
    
    <div class="product-info">
        <div style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 0.5rem;">
            <h3 class="product-title"><?php the_title(); ?></h3>
            <span class="product-price">R$ <?php echo number_format($price, 2, ',', '.'); ?></span>
        </div>
        
        <?php if (!empty($categories)) : ?>
            <p class="product-category"><?php echo esc_html($categories[0]->name); ?></p>
        <?php endif; ?>
        
        <p class="product-description"><?php echo wp_trim_words(get_the_content(), 20); ?></p>
        
        <?php if ($specifications) : ?>
            <ul class="product-specs">
                <?php 
                $specs = explode("\n", $specifications);
                foreach (array_slice($specs, 0, 3) as $spec) : 
                    if (trim($spec)) : ?>
                        <li>
                            <svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="color: #10b981; margin-right: 0.5rem;">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <?php echo esc_html($spec); ?>
                        </li>
                    <?php endif; ?>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>

        <div class="product-actions">
            <a href="<?php the_permalink(); ?>" class="btn-product primary">Ver Detalhes</a>
            <button class="btn-product secondary" <?php echo !$in_stock ? 'disabled' : ''; ?>>
                <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
                </svg>
            </button>
        </div>
    </div>
</div>