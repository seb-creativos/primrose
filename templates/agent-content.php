<?php
$name = get_the_title();
$first_name = rwmb_meta('agent-name');
switch(rwmb_meta('agent-pronouns')){
    case 'he':
        $pronoun = 'him';
        break;
    case 'she':
        $pronoun = 'her';
        break;
    case 'them':
        $pronoun = 'them';
        break;
    default:
        $pronoun = 'them';
}
$titles = [
    'about'     => sprintf(__('About %s'), $first_name),
    'contact'   => __(sprintf('Contact %s', $pronoun)),
]
?>
<section class="agent mb-100">
    <div class="container-wide py-100">
        <div class="row gx-md-60">
            <?php get_template_part( 'templates/agent-sidebar' ) ?>
            <div class="agent__content col-md">
                <div class="agent__content--about mb-50">
                    <h3 class="text-primary my-30"><?= $titles['about'] ?></h3>
                    <?php the_content() ?>
                </div>
                <div class="agent__content--contact mw-850">
                    <h3 class="text-primary my-30"><?= $titles['contact'] ?></h3>
                    <?= do_shortcode( '[ws_form id="2"]' ) ?>
                </div>
            </div>
        </div>
    </div>
</section>