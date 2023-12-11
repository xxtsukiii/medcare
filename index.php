<?php require_once('header.php'); ?>

<?php
$statement = $pdo->prepare("SELECT * FROM tbl_settings WHERE id=1");
$statement->execute();
$result = $statement->fetchAll(PDO::FETCH_ASSOC);
foreach ($result as $row) {
    $cta_title = $row['cta_title'];
    $cta_content = $row['cta_content'];
    $cta_read_more_text = $row['cta_read_more_text'];
    $cta_read_more_url = $row['cta_read_more_url'];
    $cta_photo = $row['cta_photo'];
    $featured_product_title = $row['featured_product_title'];
    $featured_product_subtitle = $row['featured_product_subtitle'];
    $latest_product_title = $row['latest_product_title'];
    $latest_product_subtitle = $row['latest_product_subtitle'];
    $popular_product_title = $row['popular_product_title'];
    $popular_product_subtitle = $row['popular_product_subtitle'];
    $total_featured_product_home = $row['total_featured_product_home'];
    $total_latest_product_home = $row['total_latest_product_home'];
    $total_popular_product_home = $row['total_popular_product_home'];
    $home_service_on_off = $row['home_service_on_off'];
    $home_welcome_on_off = $row['home_welcome_on_off'];
    $home_featured_product_on_off = $row['home_featured_product_on_off'];
    $home_latest_product_on_off = $row['home_latest_product_on_off'];
    $home_popular_product_on_off = $row['home_popular_product_on_off'];
}


?>

<div id="bootstrap-touch-slider" class="carousel bs-slider fade control-round indicators-line" data-ride="carousel"
    data-pause="hover" data-interval="false">

    <!-- Indicators -->
    <ol class="carousel-indicators">
        <?php
        $i = 0;
        $statement = $pdo->prepare("SELECT * FROM tbl_slider");
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        foreach ($result as $row) {
            ?>
            <li data-target="#bootstrap-touch-slider" data-slide-to="<?php echo $i; ?>" <?php if ($i == 0) {
                   echo 'class="active"';
               } ?>></li>
            <?php
            $i++;
        }
        ?>
    </ol>

    <!-- Wrapper For Slides -->
    <div class="carousel-inner" role="listbox">

        <?php
        $i = 0;
        $statement = $pdo->prepare("SELECT * FROM tbl_slider");
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        foreach ($result as $row) {
            ?>
            <div class="item <?php if ($i == 0) {
                echo 'active';
            } ?>" style="background-image:url(assets/uploads/<?php echo $row['photo']; ?>);">
                <div class="bs-slider-overlay"></div>
                <div class="container">
                    <div class="row">
                        <div class="slide-text <?php if ($row['position'] == 'Left') {
                            echo 'slide_style_left';
                        } elseif ($row['position'] == 'Center') {
                            echo 'slide_style_center';
                        } elseif ($row['position'] == 'Right') {
                            echo 'slide_style_right';
                        } ?>">
                            <h1 data-animation="animated <?php if ($row['position'] == 'Left') {
                                echo 'zoomInLeft';
                            } elseif ($row['position'] == 'Center') {
                                echo 'flipInX';
                            } elseif ($row['position'] == 'Right') {
                                echo 'zoomInRight';
                            } ?>">
                                <?php echo $row['heading']; ?>
                            </h1>
                            <p data-animation="animated <?php if ($row['position'] == 'Left') {
                                echo 'fadeInLeft';
                            } elseif ($row['position'] == 'Center') {
                                echo 'fadeInDown';
                            } elseif ($row['position'] == 'Right') {
                                echo 'fadeInRight';
                            } ?>">
                                <?php echo nl2br($row['content']); ?>
                            </p>
                            <a href="<?php echo $row['button_url']; ?>" target="_blank" class="btn btn-primary"
                                data-animation="animated <?php if ($row['position'] == 'Left') {
                                    echo 'fadeInLeft';
                                } elseif ($row['position'] == 'Center') {
                                    echo 'fadeInDown';
                                } elseif ($row['position'] == 'Right') {
                                    echo 'fadeInRight';
                                } ?>">
                                <?php echo $row['button_text']; ?>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <?php
            $i++;
        }
        ?>
    </div>

    <!-- Slider Left Control -->
    <a class="left carousel-control" href="#bootstrap-touch-slider" role="button" data-slide="prev">
        <span class="fa fa-angle-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>

    <!-- Slider Right Control -->
    <a class="right carousel-control" href="#bootstrap-touch-slider" role="button" data-slide="next">
        <span class="fa fa-angle-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>

</div>

<!-- 
<?php if ($home_service_on_off == 1): ?>
    <div class="service bg-gray">
        <div class="container">
            <div class="row">
                <?php
                $statement = $pdo->prepare("SELECT * FROM tbl_service");
                $statement->execute();
                $result = $statement->fetchAll(PDO::FETCH_ASSOC);
                foreach ($result as $row) {
                    ?>
                    <div class="col-md-4">
                        <div class="item">
                            <div class="photo"><img src="assets/uploads/<?php echo $row['photo']; ?>" width="140px"
                                    alt="<?php echo $row['title']; ?>"></div>
                            <h3>
                                <?php echo $row['title']; ?>
                            </h3>
                            <p>
                                <?php echo nl2br($row['content']); ?>
                            </p>
                        </div>
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>
    </div>
<?php endif; ?> -->

<?php if ($home_featured_product_on_off == 1): ?>
    <div class="product pt_70 pb_70">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="headline">
                        <h2>
                            <?php echo $featured_product_title; ?>
                        </h2>
                        <h3>
                            <?php echo $featured_product_subtitle; ?>
                        </h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">

                    <div class="product-carousel">

                        <?php
                        $statement = $pdo->prepare("SELECT * FROM tbl_product WHERE p_is_featured=? AND p_is_active=? LIMIT " . $total_featured_product_home);
                        $statement->execute(array(1, 1));
                        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
                        foreach ($result as $row) {
                            ?>
                            <div class="item">
                                <div class="thumb">
                                    <div class="photo"
                                        style="background-image:url(assets/uploads/product_photos/<?php echo $row['p_featured_photo']; ?>);">
                                    </div>

                                </div>
                                <div class="text" style="width: 100%; max-width: 270px; height: 270px; background-color: #f0f0f0;">
                                    <h3><a href="product.php?id=<?php echo $row['p_id']; ?>">
                                            <?php echo $row['p_name']; ?>
                                        </a>
                                    </h3>
                                    <h4>
                                        ₱
                                        <?php echo $row['p_current_price']; ?>
                                        <?php if ($row['p_old_price'] != ''): ?>
                                            <del>
                                                ₱
                                                <?php echo $row['p_old_price']; ?>
                                            </del>
                                        <?php endif; ?>
                                    </h4>
                                    <div class="rating">
                                        <?php
                                        $t_rating = 0;
                                        $statement1 = $pdo->prepare("SELECT * FROM tbl_rating WHERE p_id=?");
                                        $statement1->execute(array($row['p_id']));
                                        $tot_rating = $statement1->rowCount();
                                        if ($tot_rating == 0) {
                                            $avg_rating = 0;
                                        } else {
                                            $result1 = $statement1->fetchAll(PDO::FETCH_ASSOC);
                                            foreach ($result1 as $row1) {
                                                $t_rating = $t_rating + $row1['rating'];
                                            }
                                            $avg_rating = $t_rating / $tot_rating;
                                        }
                                        ?>
                                        <?php
                                        if ($avg_rating == 0) {
                                            echo '';
                                        } elseif ($avg_rating == 1.4) {
                                            echo '
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-half-o"></i>
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                        ';
                                        } elseif ($avg_rating == 2.4) {
                                            echo '
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-half-o"></i>
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                        ';
                                        } elseif ($avg_rating == 3.4) {
                                            echo '
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-half-o"></i>
                                            <i class="fa fa-star-o"></i>
                                        ';
                                        } elseif ($avg_rating == 4.4) {
                                            echo '
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-half-o"></i>
                                        ';
                                        } else {
                                            for ($i = 1; $i <= 4; $i++) {
                                                ?>
                                                <?php if ($i > $avg_rating): ?>
                                                    <i class="fa fa-star-o"></i>
                                                <?php else: ?>
                                                    <i class="fa fa-star"></i>
                                                <?php endif; ?>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </div>

                                    <?php if ($row['p_qty'] == 0): ?>
                                        <div class="out-of-stock">
                                            <div class="inner">
                                                Out Of Stock
                                            </div>
                                        </div>
                                    <?php else: ?>
                                    </div>
                                    <p><a href="product.php?id=<?php echo $row['p_id']; ?>"><i class="fa fa-shopping-cart"></i>
                                            Add to Cart</a></p>
                                <?php endif; ?>
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>


<?php if ($home_latest_product_on_off == 1): ?>
    <div class="product bg-gray pt_70 pb_30">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="headline">
                        <h2>
                            <?php echo $latest_product_title; ?>
                        </h2>
                        <h3>
                            <?php echo $latest_product_subtitle; ?>
                        </h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">

                    <div class="product-carousel">

                        <?php
                        $statement = $pdo->prepare("SELECT * FROM tbl_product WHERE p_is_active=? ORDER BY p_id DESC LIMIT " . $total_latest_product_home);
                        $statement->execute(array(1));
                        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
                        foreach ($result as $row) {
                            ?>
                            <div class="item">
                                <div class="thumb">
                                    <div class="photo"
                                        style="background-image:url(assets/uploads/product_photos/<?php echo $row['p_featured_photo']; ?>);">
                                    </div>

                                </div>
                                <div class="text" style="width: 100%; max-width: 270px; height: 270px; background-color: #f0f0f0;">
                                    <h3><a href="product.php?id=<?php echo $row['p_id']; ?>">
                                            <?php echo $row['p_name']; ?>
                                        </a>
                                    </h3>
                                    <h4>
                                        ₱
                                        <?php echo $row['p_current_price']; ?>
                                        <?php if ($row['p_old_price'] != ''): ?>
                                            <del>
                                                ₱
                                                <?php echo $row['p_old_price']; ?>
                                            </del>
                                        <?php endif; ?>
                                    </h4>
                                    <div class="rating">
                                        <?php
                                        $t_rating = 0;
                                        $statement1 = $pdo->prepare("SELECT * FROM tbl_rating WHERE p_id=?");
                                        $statement1->execute(array($row['p_id']));
                                        $tot_rating = $statement1->rowCount();
                                        if ($tot_rating == 0) {
                                            $avg_rating = 0;
                                        } else {
                                            $result1 = $statement1->fetchAll(PDO::FETCH_ASSOC);
                                            foreach ($result1 as $row1) {
                                                $t_rating = $t_rating + $row1['rating'];
                                            }
                                            $avg_rating = $t_rating / $tot_rating;
                                        }
                                        ?>
                                        <?php
                                        if ($avg_rating == 0) {
                                            echo '';
                                        } elseif ($avg_rating == 1.4) {
                                            echo '
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-half-o"></i>
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                        ';
                                        } elseif ($avg_rating == 2.4) {
                                            echo '
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-half-o"></i>
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                        ';
                                        } elseif ($avg_rating == 3.4) {
                                            echo '
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-half-o"></i>
                                            <i class="fa fa-star-o"></i>
                                        ';
                                        } elseif ($avg_rating == 4.4) {
                                            echo '
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-half-o"></i>
                                        ';
                                        } else {
                                            for ($i = 1; $i <= 4; $i++) {
                                                ?>
                                                <?php if ($i > $avg_rating): ?>
                                                    <i class="fa fa-star-o"></i>
                                                <?php else: ?>
                                                    <i class="fa fa-star"></i>
                                                <?php endif; ?>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </div>
                                    <?php if ($row['p_qty'] == 0): ?>
                                        <div class="out-of-stock">
                                            <div class="inner">
                                                Out Of Stock
                                            </div>
                                        </div>
                                    <?php else: ?>
                                    </div>
                                    <p><a href="product.php?id=<?php echo $row['p_id']; ?>"><i class="fa fa-shopping-cart"></i>
                                            Add to Cart</a></p>
                                <?php endif; ?>
                            </div>
                            <?php
                        }
                        ?>

                    </div>


                </div>
            </div>
        </div>
    </div>
<?php endif; ?>


<?php if ($home_popular_product_on_off == 1): ?>
    <div class="product pt_70 pb_70">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="headline">
                        <h2>
                            <?php echo $popular_product_title; ?>
                        </h2>
                        <h3>
                            <?php echo $popular_product_subtitle; ?>
                        </h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">

                    <div class="product-carousel">

                        <?php
                        $statement = $pdo->prepare("SELECT * FROM tbl_product WHERE p_is_active=? ORDER BY p_total_view DESC LIMIT " . $total_popular_product_home);
                        $statement->execute(array(1));
                        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
                        foreach ($result as $row) {
                            ?>
                            <div class="item">
                                <div class="thumb">
                                    <div class="photo"
                                        style="background-image:url(assets/uploads/product_photos/<?php echo $row['p_featured_photo']; ?>);">
                                    </div>

                                </div>
                                <div class="text" style="width: 100%; max-width: 270px; height: 270px; background-color: #f0f0f0;">
                                    <h3><a href="product.php?id=<?php echo $row['p_id']; ?>">
                                            <?php echo $row['p_name']; ?>
                                        </a>
                                    </h3>
                                    <h4>
                                        ₱
                                        <?php echo $row['p_current_price']; ?>
                                        <?php if ($row['p_old_price'] != ''): ?>
                                            <del>
                                                ₱
                                                <?php echo $row['p_old_price']; ?>
                                            </del>
                                        <?php endif; ?>
                                    </h4>
                                    <div class="rating">
                                        <?php
                                        $t_rating = 0;
                                        $statement1 = $pdo->prepare("SELECT * FROM tbl_rating WHERE p_id=?");
                                        $statement1->execute(array($row['p_id']));
                                        $tot_rating = $statement1->rowCount();
                                        if ($tot_rating == 0) {
                                            $avg_rating = 0;
                                        } else {
                                            $result1 = $statement1->fetchAll(PDO::FETCH_ASSOC);
                                            foreach ($result1 as $row1) {
                                                $t_rating = $t_rating + $row1['rating'];
                                            }
                                            $avg_rating = $t_rating / $tot_rating;
                                        }
                                        ?>
                                        <?php
                                        if ($avg_rating == 0) {
                                            echo '';
                                        } elseif ($avg_rating == 1.4) {
                                            echo '
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-half-o"></i>
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                        ';
                                        } elseif ($avg_rating == 2.4) {
                                            echo '
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-half-o"></i>
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                        ';
                                        } elseif ($avg_rating == 3.4) {
                                            echo '
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-half-o"></i>
                                            <i class="fa fa-star-o"></i>
                                        ';
                                        } elseif ($avg_rating == 4.4) {
                                            echo '
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-half-o"></i>
                                        ';
                                        } else {
                                            for ($i = 1; $i <= 4; $i++) {
                                                ?>
                                                <?php if ($i > $avg_rating): ?>
                                                    <i class="fa fa-star-o"></i>
                                                <?php else: ?>
                                                    <i class="fa fa-star"></i>
                                                <?php endif; ?>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </div>
                                    <?php if ($row['p_qty'] == 0): ?>
                                        <div class="out-of-stock">
                                            <div class="inner">
                                                Out Of Stock
                                            </div>
                                        </div>
                                    <?php else: ?>
                                    </div>
                                    <p><a href="product.php?id=<?php echo $row['p_id']; ?>"><i class="fa fa-shopping-cart"></i>
                                            Add to Cart</a></p>
                                <?php endif; ?>
                            </div>
                            <?php
                        }
                        ?>

                    </div>

                </div>
            </div>
        </div>
    </div>
<?php endif; ?>


<div class="product bg-gray pt_70 pb_30">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="headline">
                    <h2>Health Concern</h2>
                    <h3></h3>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="product-carousel">
                    <div class="item">
                        <div class="thumb">
                            <div class="photo" style="background-image:url(images/brain1.jpg);">
                            </div>
                        </div>
                        <div div class="text" style="width: 100%; max-width: 270px; height: 250px; background-color: #f0f0f0;">
                            <h2>Brain</h2>
                            <h5>Changes to your body and brain are normal as you age. However,
                                there are some things you can do to help slow any decline in memory and lower your risk
                                of
                                developing Alzheimer's disease or other dementias.
                            </h5>
                        </div>
                        <p><a
                                    href="https://www.mayoclinichealthsystem.org/hometown-health/speaking-of-health/5-tips-to-keep-your-brain-healthy">
                                    Read More </a></p>
                    </div>

                    <div class="item">
                        <div class="thumb">
                            <div class="photo" style="background-image:url(images/heart.jpg);">
                            </div>
                        </div>
                        <div div class="text" style="width: 100%; max-width: 270px; height: 250px; background-color: #f0f0f0;">
                            <h2>Heart</h2>
                            <h5>Heart disease is the leading cause of death for both men and women in the United States.
                                Take steps today to lower your risk of heart disease.
                            </h5>
                        </div>
                        <p><a
                                    href="https://health.gov/myhealthfinder/health-conditions/heart-health/keep-your-heart-healthy#the-basics-tab">
                                    Read More </a></p>
                    </div>

                    <div class="item">
                        <div class="thumb">
                            <div class="photo" style="background-image:url(images/stomach.jpg);">
                            </div>
                        </div>
                        <div div class="text" style="width: 100%; max-width: 270px; height: 250px; background-color: #f0f0f0;">
                            <h2>Stomach</h2>
                            <h5>Eating is not only one of the great pleasures in life, it's also essential to your
                                health and well-being.
                                The foods you eat nourish your body, providing energy and enhancing the function of all
                                your vital organs.
                            </h5>
                        </div>
                        <p><a
                                    href="https://www.intercoastalmedical.com/2018/09/07/eating-for-a-healthy-digestive-system/">
                                    Read More </a></p>
                    </div>

                    <div class="item">
                        <div class="thumb">
                            <div class="photo" style="background-image:url(images/lungs.jpg);">
                            </div>
                        </div>
                        <div div class="text" style="width: 100%; max-width: 270px; height: 250px; background-color: #f0f0f0;">
                            <h2>Lungs</h2>
                            <h5>Don't take your lungs for granted. They are essential for life, even if you don't think
                                about them.
                                That's why it is crucial to prioritize your lung health. These helpful recommendations
                                can help you breathe easier and keep your lungs healthy.
                            </h5>
                        </div>
                        <p><a
                                    href="https://www.lompocvmc.com/blogs/2020/december/7-ways-to-keep-lungs-healthy/?locale=en">
                                    Read More </a></p>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>






<?php require_once('footer.php'); ?>