
<?php if ( is_active_sidebar('left-sidebar') ) : ?>
    <div class="sidebar-module">
        <?php dynamic_sidebar('left-sidebar'); ?>
    </div>
<?php else: ?>
    <div class="sidebar-module">
        <h4>Add Your Widgets to this Left Sidebar</h4>
    </div>
<?php endif; ?>