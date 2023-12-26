<?php include(get_template_directory().'/includes/footer.php');?>

<script src="<?php echo get_template_directory_uri(); ?>/assets/js/common/index.js" defer charset="UTF-8"></script>
<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/vendor/picturefill.min.js" defer charset="UTF-8"></script>
<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/vendor/modernizr.js" defer charset="UTF-8"></script>
<?php if($scripts){ ?>
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/pages/<?php echo $pageid ?>/index.js" defer charset="UTF-8"></script>
<?php } ?>

<?php wp_footer(); ?>
</body>
</html>
