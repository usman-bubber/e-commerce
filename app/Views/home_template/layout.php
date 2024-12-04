<!DOCTYPE html>
<html lang="en" dir="ltr">

<!-- Head Section -->
<?= $this->include('home_template/head') ?>

<body>
    <main>
        <?php 
        // Check if the current route is the login page
        $uri = service('uri');
        $currentPage = $uri->getSegment(1); // Change segment if login page is deeper, e.g., /auth/login
        ?>

        <!-- Navbar -->
        <?php if ($currentPage !== 'login'): ?>
            <header class="container-fluid px-0 top_nav_bg">
                <?= $this->include('home_template/navbar') ?>
            </header>
        <?php endif; ?>
        <!-- End Navbar -->

        <!-- Main Content -->
        <section>
            <?= $this->renderSection('main_content') ?>
        </section>
        <!-- End Main Content -->

        <!-- Footer -->
        <?php if ($currentPage !== 'login'): ?>
            <footer>
                <?= $this->include('home_template/footer') ?>
            </footer>
        <?php endif; ?>
        <!-- End Footer -->
    </main>

    <!-- Scripts -->
    <?= $this->include('home_template/script') ?>
    <!-- Additional Scripts -->
    <?= $this->renderSection('extraScript') ?>
</body>

</html>
