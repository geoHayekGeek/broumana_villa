</main>
    <footer class="site-footer">
        <div class="footer-content text-white py-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4">
                        <img src="./assets/images/logos/broumana-villa-logo-1.png" alt="<?php echo SITE_NAME; ?>" class="footer-logo mb-3">
                        <p><?= htmlspecialchars($site_info["footer_text"]) ?></p>
                    </div>
                    <div class="col-lg-2">
                        <h5>Links</h5>
                        <ul class="list-unstyled">
                            <li><a href="<?php echo SITE_URL; ?>/contact-us">Contact Us</a></li>
                            <li><a href="<?php echo SITE_URL; ?>/all-outlets">Our Outlets</a></li>
                            <!-- <li><a href="<?php echo SITE_URL; ?>/careers.php">Careers</a></li> -->
                            <!-- <li><a href="<?php echo SITE_URL; ?>/contact-us.php">Privacy Policy</a></li> -->
                        </ul>
                    </div>
                    <div class="col-lg-2">
                        <h5>Our Clusters</h5>
                        <ul class="list-unstyled">
                            <li><a href="<?php echo SITE_URL; ?>/broumana-villa">Villa</a></li>
                            <li><a href="<?php echo SITE_URL; ?>/broumana-yard">Yard</a></li>
                            <li><a href="<?php echo SITE_URL; ?>/broumana-square">Square</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-4">
                        <h5>Subscribe to our newsletter</h5>
                        <form class="d-flex">
                            <input type="email" class="form-control me-2" placeholder="Email Address">
                            <button type="submit" class="btn btn-outline-light">→</button>
                        </form>
                        <div class="social-icons mt-3">
                            <a href="<?= htmlspecialchars($site_info["facebook_link"]) ?>" class="text-white me-2"><i class="bi bi-facebook"></i></a>
                            <a href="<?= htmlspecialchars($site_info["instagram_link"]) ?>" class="text-white me-2"><i class="bi bi-instagram"></i></a>
                        </div>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-12 text-center">
                        <p class="mb-0">&copy; <?php echo date('Y'); ?> The Broumana Golden Triangle. All rights reserved.</p>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>    <script src="<?php echo SITE_URL; ?>/assets/js/main.js"></script>
    <script src="./assets/js/main.js"></script>
    <script src="./assets/js/lazy-loading.js"></script>
</body>
</html>