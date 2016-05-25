<?php if ( is_active_sidebar('half-sidebar-left') ) : ?>
    <div class="sidebar-module">
        <?php dynamic_sidebar('half-sidebar-left'); ?>
    </div>
<?php else: ?>
    <div class="sidebar-module">
        <h4>Add Your Widgets to this Half Page Sidebar</h4>
    </div>
<?php endif; ?>