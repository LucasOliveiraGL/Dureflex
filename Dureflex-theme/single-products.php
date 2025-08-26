<?php get_header(); ?>

<main>
    <?php while (have_posts()) : the_post(); ?>
        <?php
        $price = get_post_meta(get_the_ID(), '_product_price', true);
        $specifications = get_post_meta(get_the_ID(), '_product_specifications', true);
        $in_stock = get_post_meta(get_the_ID(), '_product_in_stock', true);
        $featured = get_post_meta(get_the_ID(), '_product_featured', true);
        $categories = wp_get_post_terms(get_the_ID(), 'product_category');
        ?>
        
        <section style="padding: 2rem 0; margin-top: 4rem;">
            <div style="max-width: 1200px; margin: 0 auto; padding: 0 2rem;">
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 4rem; align-items: start;">
                    <!-- Product Image -->
                    <div>
                        <?php if (has_post_thumbnail()) : ?>
                            <?php the_post_thumbnail('large', array('style' => 'width: 100%; height: auto; border-radius: 0.5rem; box-shadow: 0 4px 6px rgba(0,0,0,0.1);')); ?>
                        <?php else : ?>
                            <div style="background: #f3f4f6; height: 400px; display: flex; align-items: center; justify-content: center; border-radius: 0.5rem;">
                                <svg width="120" height="120" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="color: #9ca3af;">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                                </svg>
                            </div>
                        <?php endif; ?>
                        
                        <?php if ($featured) : ?>
                            <span style="position: absolute; top: 1rem; left: 1rem; background: #fbbf24; color: #92400e; padding: 0.5rem 1rem; border-radius: 0.375rem; font-size: 0.875rem; font-weight: bold;">Produto em Destaque</span>
                        <?php endif; ?>
                    </div>
                    
                    <!-- Product Details -->
                    <div>
                        <nav style="margin-bottom: 1rem; font-size: 0.875rem; color: #6b7280;">
                            <a href="<?php echo home_url(); ?>" style="color: #6b7280; text-decoration: none;">Home</a> >
                            <?php if (!empty($categories)) : ?>
                                <a href="<?php echo get_term_link($categories[0]); ?>" style="color: #6b7280; text-decoration: none;"><?php echo esc_html($categories[0]->name); ?></a> >
                            <?php endif; ?>
                            <span style="color: #111827;"><?php the_title(); ?></span>
                        </nav>
                        
                        <h1 style="font-size: 2.5rem; font-weight: bold; color: #111827; margin-bottom: 0.5rem;"><?php the_title(); ?></h1>
                        
                        <?php if (!empty($categories)) : ?>
                            <p style="color: #1e40af; font-weight: 600; margin-bottom: 1rem;"><?php echo esc_html($categories[0]->name); ?></p>
                        <?php endif; ?>
                        
                        <div style="display: flex; align-items: center; gap: 1rem; margin-bottom: 2rem;">
                            <span style="font-size: 2rem; font-weight: bold; color: #1e40af;">R$ <?php echo number_format($price, 2, ',', '.'); ?></span>
                            <span style="padding: 0.5rem 1rem; border-radius: 9999px; font-size: 0.875rem; font-weight: 600; <?php echo $in_stock ? 'background: #d1fae5; color: #065f46;' : 'background: #fee2e2; color: #991b1b;'; ?>">
                                <?php echo $in_stock ? 'Disponível' : 'Indisponível'; ?>
                            </span>
                        </div>
                        
                        <div style="margin-bottom: 2rem;">
                            <?php the_content(); ?>
                        </div>
                        
                        <?php if ($specifications) : ?>
                            <div style="margin-bottom: 2rem;">
                                <h3 style="font-size: 1.5rem; font-weight: bold; color: #111827; margin-bottom: 1rem;">Especificações Técnicas</h3>
                                <ul style="list-style: none; padding: 0;">
                                    <?php 
                                    $specs = explode("\n", $specifications);
                                    foreach ($specs as $spec) : 
                                        if (trim($spec)) : ?>
                                            <li style="display: flex; align-items: center; padding: 0.5rem 0; border-bottom: 1px solid #e5e7eb;">
                                                <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="color: #10b981; margin-right: 0.75rem;">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                                </svg>
                                                <?php echo esc_html($spec); ?>
                                            </li>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        <?php endif; ?>
                        
                        <div style="background: #f9fafb; padding: 2rem; border-radius: 0.5rem; margin-bottom: 2rem;">
                            <h3 style="font-size: 1.5rem; font-weight: bold; color: #111827; margin-bottom: 1rem;">Solicitar Orçamento</h3>
                            <p style="color: #6b7280; margin-bottom: 1.5rem;">Entre em contato para mais informações sobre este produto.</p>
                            <a href="#contact" style="background: #1e40af; color: white; padding: 0.75rem 1.5rem; border-radius: 0.375rem; font-weight: 600; text-decoration: none; display: inline-block;">
                                Solicitar Orçamento
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php endwhile; ?>
    
    <!-- Related Products -->
    <section style="background: #f9fafb; padding: 4rem 0;">
        <div style="max-width: 1200px; margin: 0 auto; padding: 0 2rem;">
            <h2 style="font-size: 2rem; font-weight: bold; color: #111827; margin-bottom: 2rem; text-align: center;">Produtos Relacionados</h2>
            <div class="products-grid">
                <?php
                $related_args = array(
                    'post_type' => 'products',
                    'posts_per_page' => 3,
                    'post__not_in' => array(get_the_ID()),
                    'orderby' => 'rand'
                );
                
                if (!empty($categories)) {
                    $related_args['tax_query'] = array(
                        array(
                            'taxonomy' => 'product_category',
                            'field' => 'term_id',
                            'terms' => $categories[0]->term_id
                        )
                    );
                }
                
                $related_products = new WP_Query($related_args);
                if ($related_products->have_posts()) :
                    while ($related_products->have_posts()) : $related_products->the_post();
                        get_template_part('template-parts/product', 'card');
                    endwhile;
                    wp_reset_postdata();
                endif;
                ?>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>