<?php
$landing = get_post_meta( get_the_ID(), 'area-landing', true );
?>
<section class="area mb-100">
    <div class="container-wide py-50">
        <div class="row gx-md-50">
            <?php get_template_part( 'templates/area-sidebar' ) ?>
            <div class="area__content col-md">
                <?php get_template_part( 'templates/area-gallery' ) ?>
                <h1 class="text-primary my-30"><?php the_title() ?></h1>
                <?php the_content() ?>
                <a href="<?= $landing ?>" class="btn btn-link has-icon mt-50">
                    <span>
                        <?= sprintf(__('View Properties in %s'), get_the_title() ) ?>
                    </span>
                    <i class="icon icon-arrow-sm-right"></i>
                </a>
            </div>
        </div>
    </div>
</section>
<?php render_pattern('Let\'s Talk') ?>