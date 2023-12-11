<?php
$statement = $pdo->prepare("SELECT * FROM tbl_settings WHERE id=1");
$statement->execute();
$result = $statement->fetchAll(PDO::FETCH_ASSOC);
foreach ($result as $row) {
    $footer_about = $row['footer_about'];
    $contact_email = $row['contact_email'];
    $contact_phone = $row['contact_phone'];
    $contact_address = $row['contact_address'];
    $footer_copyright = $row['footer_copyright'];
    $total_recent_post_footer = $row['total_recent_post_footer'];
    $total_popular_post_footer = $row['total_popular_post_footer'];
    $newsletter_on_off = $row['newsletter_on_off'];
    $before_body = $row['before_body'];
}
?>


<?php if ($newsletter_on_off == 1) : ?>
    <section class="home-newsletter">
        <div class="container text-center">
            <div class="row">
                <div class="col-sm-3">
                    <div class="JMCbqu">
                        <h4>CUSTOMER SERVICE</h4>
                        <ul style="list-style-type: none;">
                            <li class="o8Gbgv"><a href="about.php" class="FA0WjS" title="" target="_blank" rel="noopener noreferrer"><span class="xTjlXx"><i class="fa fa-users" aria-hidden="true"></i>
                                        About Us</span></a></li>
                            <li class="o8Gbgv"><a href="faq.php" class="FA0WjS" title="" target="_blank" rel="noopener noreferrer"><span class="xTjlXx"><i class="fa fa-question-circle" aria-hidden="true"></i> FAQ</span></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="JMCbqu">
                        <h4>PRODUCTS</h4>
                        <ul style="list-style-type: none;">
                            <li class="o8Gbgv"><a href="product-category.php?id=1&type=top-category" class="FA0WjS" title="" target="_blank" rel="noopener noreferrer"><span class="xTjlXx">Health</span></a></li>
                            <li class="o8Gbgv"><a href="product-category.php?id=2&type=top-category" class="FA0WjS" title="" target="_blank" rel="noopener noreferrer"><span class="xTjlXx">Skincare</span></a></li>
                            <li class="o8Gbgv"><a href="product-category.php?id=3&type=top-category" class="FA0WjS" title="" target="_blank" rel="noopener noreferrer"><span class="xTjlXx">Personal Care</span></a></li>
                            <li class="o8Gbgv"><a href="product-category.php?id=4&type=top-category" class="FA0WjS" title="" target="_blank" rel="noopener noreferrer"><span class="xTjlXx">Mom & Baby</span></a></li>
                            <li class="o8Gbgv"><a href="product-category.php?id=5&type=top-category" class="FA0WjS" title="" target="_blank" rel="noopener noreferrer"><span class="xTjlXx">Sexual Wellness</span></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="JMCbqu">
                        <h4>CONTACT US</h4>
                        <ul style="list-style-type: none;">
                            <li class="o8Gbgv"><a href="contact.php" class="FA0WjS" title="" target="_blank" rel="noopener noreferrer"><span class="xTjlXx"><i class="fa fa-phone" aria-hidden="true"></i> Contact</span></a></li>
                            <li class="o8Gbgv"><a href="contact.php" class="FA0WjS" title="" target="_blank" rel="noopener noreferrer"><span class="xTjlXx"><i class="fa fa-building" aria-hidden="true"></i>Our Office</span></a></li>
                            <li class="o8Gbgv"><a href="contact.php" class="FA0WjS" title="" target="_blank" rel="noopener noreferrer"><span class="xTjlXx"><i class="fa fa-map-marker" aria-hidden="true"></i>Find Us On Map</span></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="JMCbqu">
                        <h4>FOLLOW US</h4>
                        <ul style="list-style-type: none;">
                            <li class="o8Gbgv"><a href="https://www.facebook.com/" class="FA0WjS" title="" target="_blank" rel="noopener noreferrer"><span class="xTjlXx"><i class="fa fa-facebook-square" aria-hidden="true"></i> Facebook</span></a></li>
                            <li class="o8Gbgv"><a href="https://www.instagram.com/?hl=en" class="FA0WjS" title="" target="_blank" rel="noopener noreferrer"><span class="xTjlXx"><i class="fa fa-instagram" aria-hidden="true"></i> Instagram </span></a></li>
                            <li class="o8Gbgv"><a href="https://web.whatsapp.com/" class="FA0WjS" title="" target="_blank" rel="noopener noreferrer"><span class="xTjlXx"><i class="fa fa-whatsapp" aria-hidden="true"></i> Whatsapp</span></a></li>
                            <li class="o8Gbgv"><a href="https://twitter.com/" class="FA0WjS" title="" target="_blank" rel="noopener noreferrer"><span class="xTjlXx"><i class="fa fa-twitter" aria-hidden="true"></i> Twitter</span></a></li>
                            <li class="o8Gbgv"><a href="https://www.linkedin.com/" class="FA0WjS" title="" target="_blank" rel="noopener noreferrer"><span class="xTjlXx"><i class="fa fa-linkedin-square" aria-hidden="true"></i> LinkedIn</span></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>




<div class="footer-bottom">
    <div class="container">
        <div class="row">
            <div class="col-md-12 copyright">
                <?php echo $footer_copyright; ?>
            </div>
        </div>
    </div>
</div>


<a href="#" class="scrollup">
    <i class="fa fa-angle-up"></i>
</a>

<?php
$statement = $pdo->prepare("SELECT * FROM tbl_settings WHERE id=1");
$statement->execute();
$result = $statement->fetchAll(PDO::FETCH_ASSOC);
foreach ($result as $row) {
    $stripe_public_key = $row['stripe_public_key'];
    $stripe_secret_key = $row['stripe_secret_key'];
}
?>








<script src="assets/js/jquery-2.2.4.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="https://js.stripe.com/v2/"></script>
<script src="assets/js/megamenu.js"></script>
<script src="assets/js/owl.carousel.min.js"></script>
<script src="assets/js/owl.animate.js"></script>
<script src="assets/js/jquery.bxslider.min.js"></script>
<script src="assets/js/jquery.magnific-popup.min.js"></script>
<script src="assets/js/rating.js"></script>
<script src="assets/js/jquery.touchSwipe.min.js"></script>
<script src="assets/js/bootstrap-touch-slider.js"></script>
<script src="assets/js/select2.full.min.js"></script>
<script src="assets/js/custom.js"></script>