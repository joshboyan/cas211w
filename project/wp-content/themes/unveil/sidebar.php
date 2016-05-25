
<?php if ( is_active_sidebar('main-sidebar') ) : ?>
    <div class="sidebar-module">
    <?php dynamic_sidebar('main-sidebar'); ?>
    </div>
<?php else: ?>
    <div class="sidebar-module">
        <h4>Add Your Widgets to this Main Sidebar</h4>
    </div>
<?php endif; ?>



    