<?php
$company = get_post_meta(get_the_ID(), '_testimonial_company', true);
$role = get_post_meta(get_the_ID(), '_testimonial_role', true);
$rating = get_post_meta(get_the_ID(), '_testimonial_rating', true);

// Get initials for avatar
$initials = '';
$name_parts = explode(' ', get_the_title());
foreach ($name_parts as $part) {
    if (!empty($part)) {
        $initials .= strtoupper(substr($part, 0, 1));
    }
    if (strlen($initials) >= 2) break;
}
?>

<div class="testimonial-card">
    <div class="testimonial-header">
        <div class="testimonial-avatar">
            <?php echo esc_html($initials); ?>
        </div>
        <div class="testimonial-info">
            <h4><?php the_title(); ?></h4>
            <p><?php echo esc_html($role); ?></p>
            <p style="color: #6b7280; font-size: 0.875rem;"><?php echo esc_html($company); ?></p>
        </div>
    </div>
    
    <div class="testimonial-stars">
        <?php for ($i = 1; $i <= 5; $i++) : ?>
            <svg width="20" height="20" fill="<?php echo $i <= $rating ? 'currentColor' : 'none'; ?>" stroke="currentColor" viewBox="0 0 24 24" style="color: #fbbf24;">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"></path>
            </svg>
        <?php endfor; ?>
    </div>
    
    <blockquote class="testimonial-text">
        <svg width="24" height="24" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="color: #1e40af; margin-bottom: 0.5rem;">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
        </svg>
        "<?php echo wp_trim_words(get_the_content(), 30); ?>"
    </blockquote>
</div>