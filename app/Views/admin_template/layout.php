<!doctype html>
<html lang="en" dir="ltr">
<?= $this->include('admin_template/head') ?>

<body>
<?php
    $currentURL = current_url();
    $noNavbarRoutes = ['login'];
    $noSidebarRoutes = ['login'];
    
    $showNavbar = true;
    $showSidebar = true;
    
    // Hide navbar on specific routes
    foreach ($noNavbarRoutes as $route) {
        if (str_ends_with($currentURL, $route)) {
            $showNavbar = false;
            break;
        }
    }
    
    // Hide sidebar on specific routes
    foreach ($noSidebarRoutes as $route) {
        if (str_ends_with($currentURL, $route)) {
            $showSidebar = false;
            break;
        }
    }
    
    if ($showNavbar): ?>
        <?= $this->include('admin_template/navbar') ?>
    <?php endif; ?>
    
    <main>
        <div class="wrapper">
            <?php if ($showSidebar): ?>
                <?= $this->include('admin_template/sidebar') ?>
            <?php endif; ?>
            <div class="page-content">
                <?= $this->renderSection('main_content') ?>
                <?= $this->include('admin_template/footer') ?>
            </div>
        </div>
    </main>
    <?= $this->include('admin_template/script') ?>
</body>
<?= $this->renderSection('extraScript') ?>

</html>
