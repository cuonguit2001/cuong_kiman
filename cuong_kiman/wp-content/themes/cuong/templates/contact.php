
<?php get_header(); ?>
<div id="content">


    <section id="main-content">
        <div class="contact-info">
            <h4>Địa chỉ liên lạc</h4>
            <p>Ghi địa chỉ vào đây</p>
            <p>0394856334</p>
        </div>
        <div class="contact-form">
        <?php echo do_shortcode('[contact-form-7 id="85" title="Contact form 1"]'); ?>
</div>
    </section>
    <section id="sidebar">
        <?php get_sidebar(); ?>
    </section>


</div>


<?php get_footer(); ?>