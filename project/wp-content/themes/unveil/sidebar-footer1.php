
<?php if ( is_active_sidebar('footer-sidebar1') ) : ?>
    <div class="sidebar-module">
        <?php dynamic_sidebar('footer-sidebar1'); ?>
    </div>
<?php else: ?>
    <div class="sidebar-module">
        <h4>Add Your Widgets to this Footer Sidebar</h4>
    </div>
<?php endif; ?>