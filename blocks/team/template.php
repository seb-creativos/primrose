<?php if($is_preview): ?>
    <small>
        <?= __('To edit the agents, go to', 'primrose') ?>
        <a href="/wp-admin/edit.php?post_type=agent" target="_blank">
            <?= __('WP Dashboard -> Agents', 'primrose') ?>
        </a>
    </small>
<?php else: ?>
    <?php get_template_part('templates/agent-listing'); ?>
<?php endif; ?>