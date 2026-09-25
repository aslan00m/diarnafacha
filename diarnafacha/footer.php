<?php
/**
 * The Footer for DiarnaFacha Theme
 *
 * @package DiarnaFacha
 */

if (!defined('ABSPATH')) {
    exit;
}

$phone     = diarnafacha_opt('diarna_phone', '0536089153');
$whatsapp  = diarnafacha_opt('diarna_whatsapp', '966536089153');
$email     = diarnafacha_opt('diarna_email', 'Re@tajeermodat.com');
$address   = diarnafacha_opt('diarna_address', 'الرياض، المملكة العربية السعودية');
$about_txt = diarnafacha_opt('diarna_footer_about', 'شركة ديارنا الحديثة للاستثمار — مقاولات الحجر والواجهات للمشاريع السكنية والتجارية في الرياض والمملكة العربية السعودية.');
$copyright = diarnafacha_opt('diarna_copyright_text', 'شركة ديارنا الحديثة للاستثمار — جميع الحقوق محفوظة.');
$wa_url    = diarnafacha_whatsapp_url('', $whatsapp);
$phone_clean = diarnafacha_clean_phone($phone);
?>

<footer class="footer">
    <div class="container">
        <div class="footer__grid">
            <!-- Brand & Bio -->
            <div>
                <div class="brand">
                    <?php if (has_custom_logo()) : ?>
                        <?php the_custom_logo(); ?>
                    <?php else : ?>
                        <span class="brand__mark" aria-hidden="true"><?php echo diarnafacha_icon('building'); ?></span>
                        <span><span class="brand__name"><?php bloginfo('name'); ?></span><br><span class="brand__sub"><?php bloginfo('description'); ?></span></span>
                    <?php endif; ?>
                </div>
                <p class="footer__about"><?php echo esc_html($about_txt); ?></p>
            </div>

            <!-- Services Nav -->
            <div>
                <h4><?php esc_html_e('الخدمات', 'diarnafacha'); ?></h4>
                <?php
                if (has_nav_menu('footer_services')) {
                    wp_nav_menu(array(
                        'theme_location' => 'footer_services',
                        'container'      => false,
                        'fallback_cb'    => 'diarnafacha_footer_services_fallback',
                        'depth'          => 1,
                    ));
                } else {
                    diarnafacha_footer_services_fallback();
                }
                ?>
            </div>

            <!-- Quick Links -->
            <div>
                <h4><?php esc_html_e('روابط سريعة', 'diarnafacha'); ?></h4>
                <?php
                if (has_nav_menu('footer_links')) {
                    wp_nav_menu(array(
                        'theme_location' => 'footer_links',
                        'container'      => false,
                        'fallback_cb'    => 'diarnafacha_footer_links_fallback',
                        'depth'          => 1,
                    ));
                } else {
                    diarnafacha_footer_links_fallback();
                }
                ?>
            </div>

            <!-- Contact Column -->
            <div>
                <h4><?php esc_html_e('التواصل', 'diarnafacha'); ?></h4>
                <ul class="footer__contact">
                    <li>
                        <?php echo diarnafacha_icon('pin'); ?>
                        <span><?php echo esc_html($address); ?></span>
                    </li>
                    <li>
                        <?php echo diarnafacha_icon('phone'); ?>
                        <a href="tel:<?php echo esc_attr($phone_clean); ?>" dir="ltr"><?php echo esc_html($phone); ?></a>
                    </li>
                    <li>
                        <?php echo diarnafacha_icon('whatsapp'); ?>
                        <a href="<?php echo esc_url($wa_url); ?>" target="_blank" rel="noopener" dir="ltr"><?php echo esc_html($phone); ?></a>
                    </li>
                    <li>
                        <?php echo diarnafacha_icon('mail'); ?>
                        <a href="mailto:<?php echo esc_attr($email); ?>" dir="ltr"><?php echo esc_html($email); ?></a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="footer__bottom">
            <span>© <span id="year"><?php echo date('Y'); ?></span> <?php echo esc_html($copyright); ?></span>
            <span><?php esc_html_e('مقاولات الحجر والواجهات · الرياض', 'diarnafacha'); ?></span>
        </div>
    </div>
</footer>

<?php if (diarnafacha_opt('diarna_enable_wa_float', true)) : ?>
<!-- Floating WhatsApp Button -->
<a href="<?php echo esc_url($wa_url); ?>" target="_blank" rel="noopener" class="wa-float" aria-label="<?php esc_attr_e('تواصل عبر واتساب', 'diarnafacha'); ?>">
    <?php echo diarnafacha_icon('whatsapp'); ?>
</a>
<?php endif; ?>

<?php if (diarnafacha_opt('diarna_enable_mobile_bar', true)) : ?>
<!-- Bottom Mobile Bar -->
<div class="mobile-cta" role="region" aria-label="<?php esc_attr_e('تواصل سريع', 'diarnafacha'); ?>">
    <a href="<?php echo esc_url($wa_url); ?>" target="_blank" rel="noopener" class="m-wa">
        <?php echo diarnafacha_icon('whatsapp'); ?> <?php esc_html_e('واتساب', 'diarnafacha'); ?>
    </a>
    <a href="tel:<?php echo esc_attr($phone_clean); ?>" class="m-call">
        <?php echo diarnafacha_icon('phone'); ?> <?php esc_html_e('اتصل', 'diarnafacha'); ?>
    </a>
</div>
<?php endif; ?>

<!-- Schema.org JSON-LD -->
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@graph": [
    {
      "@type": "LocalBusiness",
      "@id": "<?php echo esc_url(home_url('/#business')); ?>",
      "name": "<?php echo esc_attr(get_bloginfo('name')); ?>",
      "description": "<?php echo esc_attr(get_bloginfo('description')); ?>",
      "telephone": "+<?php echo esc_attr($whatsapp); ?>",
      "email": "<?php echo esc_attr($email); ?>",
      "address": {
        "@type": "PostalAddress",
        "addressLocality": "الرياض",
        "addressCountry": "SA"
      },
      "areaServed": [
        {"@type": "City", "name": "الرياض"},
        {"@type": "Country", "name": "المملكة العربية السعودية"}
      ],
      "priceRange": "$$",
      "url": "<?php echo esc_url(home_url('/')); ?>"
    }
  ]
}
</script>

<?php wp_footer(); ?>
</body>
</html>
