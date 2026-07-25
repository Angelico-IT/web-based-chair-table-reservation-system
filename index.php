<?php
require_once 'Admin_Page/admin/config_db.php';
require_once 'Admin_Page/admin/config_session.php';
// Get content from database
$stmt = $pdo->query("SELECT section, content_type, content FROM homepage_content");
$content = [];
while ($row = $stmt->fetch()) {
    $content[$row['section']][$row['content_type']] = $row['content'];
}
// Default values if content not in database
$defaults = [
    'hero_title' => ['text' => 'Welcome to Jun Mar Chairs and Tables'],
    'hero_text' => ['text' => 'We specialize in providing top-quality Table and Chair rentals to make your events effortless and comfortable.<br>Discover the perfect setup for your occasion today!'],
    'hero_image' => ['image' => 'images/bg1.jpg'],
    'about_title' => ['text' => 'About Us'],
    'about_text' => ['text' => 'At Jun Mar Chair\'s and Table\'s Rental, our mission is to work closely with our customers, collaborating with them to craft the perfect event experience. We understand that every event is distinct, and we\'re here to help you bring your vision to life. Whether you have a clear idea of what you need or require assistance in selecting the right items, our dedicated team is ready to assist you every step of the way.<br><br>Our commitment to delivering exceptional value is reflected in our approach. We take pride in offering superior quality products, combined with competitive pricing, to ensure that you get the best value for your investment. Your satisfaction is our priority, and we strive to exceed your expectations with both our service and our rental offerings.<br><br>As a dynamic and forward-thinking business, Jun Mar Chair\'s and Table\'s Rental is continuously growing and evolving. If you don\'t find precisely what you\'re looking for on our website, we encourage you to get in touch with us.'],
    'about_image' => ['image' => 'images/bg1.jpg'],
    'warehouse_title' => ['text' => 'Warehouse Hours'],
    'warehouse_image' => ['image' => 'images/bg3.jpg'],
    'carousel_text_1' => ['text' => 'Cocktail Table with <br> Linen & Ribbon'],
    'carousel_image_1' => ['image' => 'images/Items/Tables/cocktail_Table/black.png'],
    'carousel_text_2' => ['text' => 'Rectangular Table with <br>Linen & Runner'],
    'carousel_image_2' => ['image' => 'images/Items/Tables/Square Table/TABLE COVER w Linens/Gold.png'],
    'carousel_text_3' => ['text' => 'Long Table with <br>Red Linen'],
    'carousel_image_3' => ['image' => 'images/Items/Tables/Long table/Table cover/red.png'],
    'carousel_text_4' => ['text' => 'Round Table with <br>Linen'],
    'carousel_image_4' => ['image' => 'images/Items/Tables/Round Table/Round Table 12 seater/RT _12ST_wth_cvr.png'],
    'carousel_text_5' => ['text' => 'Chair with cover <br>& Orange Ribbon'],
    'carousel_image_5' => ['image' => 'images/Items/Chair/Linens/orange_back.png']
];
// Merge with defaults
foreach ($defaults as $section => $types) {
    foreach ($types as $type => $default) {
        if (!isset($content[$section][$type])) {
            $content[$section][$type] = $default;
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Junmar's Rental</title>
    <link rel="icon" href="images/black.png" type="image/x-icon">
    <!-- PWA Meta Tags -->
    <link rel="manifest" href="/manifest.json">
    <meta name="theme-color" content="#F0BB78">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="apple-mobile-web-app-title" content="Junmar Rental">
    <link rel="apple-touch-icon" href="/images/JunMarLogo.png">
    <link rel="stylesheet" href="/css2/index_home.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@24,400,0,0&icon_names=arrow_forward" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.4/tiny-slider.css">
</head>
<style>
    .header-btns {
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .install-btn {
        display: flex;
        align-items: center;
        gap: 8px;
        padding: 9px 18px;
        background-color: transparent;
        color: black;
        border: 2px solid #F0BB78;
        border-radius: 6px;
        font-size: 14px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
        white-space: nowrap;
    }

    .install-btn:hover {
        background-color: #F0BB78;
        color: black;
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(240, 187, 120, 0.5);
    }

    .install-btn:active {
        transform: translateY(0);
    }

    /* Mobile responsive */
    @media (max-width: 576px) {
        .header-btns {
            gap: 6px;
        }
        .install-btn {
            padding: 7px 10px;
            font-size: 12px;
        }
        .install-btn span {
            display: none; /* Show only icon on very small screens */
        }
    }
</style>
<header>
    <div class="container">
    <a class="Junmar" href="index.php"><img src="images/JunMarLogo.png"></a>
    <div class="header-btns">
        <button id="pwa-install-btn" class="install-btn" style="display:none;">
            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/>
                <polyline points="7 10 12 15 17 10"/>
                <line x1="12" y1="15" x2="12" y2="3"/>
            </svg>
            <span id="install-btn-text">Install App</span>
        </button>
        <button style="color:black;" class="reserve-btn" input="button" onclick="location.href='/pages/rentals.php'">Reserve Now</button>
    </div>
</div>
   
    <div>
        <nav class="navbar navbar-expand-lg justify-content-center">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <img src="images/NavIcon.png">
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/pages/rentals.php">Rentals</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="pages/FAQs.php">FAQs</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="pages/contactus.php">Contact Us</a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</header>
<body>
   
    <section class="hero text-center" style="background-image: url('<?= htmlspecialchars($content['hero_image']['image']) ?>?<?= time() ?>');">
        <div class="hero-overlay">
            <h2 class="Welcome-msg"><?= htmlspecialchars($content['hero_title']['text']) ?></h2>
            <p class="msg"><?= nl2br(htmlspecialchars($content['hero_text']['text'])) ?></p>
        </div>
    </section>

    <section id="slider">
        <div class="container-slider">
            <div class="subcontainer">
                <div class="slider-wrapper">
                    <h2 class="my-text">Our Rentals</h2>
                </div>
                <br>
                <div class="my-slider">
                    <div>
                        <div class="slide">
                            <div class="slide-img" style="background-image:url(<?= htmlspecialchars($content['carousel_image_1']['image']) ?>?<?= time() ?>);">
                                <a href="pages/rentals.php" class="my-text" style="text-align: center;">
                                    <?= $content['carousel_text_1']['text'] ?>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="slide">
                            <div class="slide-img" style="background-image: url(<?= htmlspecialchars($content['carousel_image_2']['image']) ?>?<?= time() ?>);">
                                <a href="pages/rentals.php" class="my-text" style="text-align: center;">
                                    <?= $content['carousel_text_2']['text'] ?>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="slide">
                            <div class="slide-img" style="background-image: url(<?= htmlspecialchars($content['carousel_image_3']['image']) ?>?<?= time() ?>);">
                                <a href="pages/rentals.php" class="my-text" style="text-align: center;">
                                    <?= $content['carousel_text_3']['text'] ?>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="slide">
                            <div class="slide-img" style="background-image: url(<?= htmlspecialchars($content['carousel_image_4']['image']) ?>?<?= time() ?>);">
                                <a href="pages/rentals.php" class="my-text" style="text-align: center;">
                                    <?= $content['carousel_text_4']['text'] ?>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="slide">
                            <div class="slide-img" style="background-image: url(<?= htmlspecialchars($content['carousel_image_5']['image']) ?>?<?= time() ?>);">
                                <a href="pages/rentals.php" class="my-text" style="text-align: center;">
                                    <?= $content['carousel_text_5']['text'] ?>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="custom-controls">
            <button id="prev">❮</button>
            <button id="next">❯</button>
        </div>
    </section>

    <div class="view-rentals">
        <button style="color:black;" class="rentals-button" onclick="location.href='pages/rentals.php'">View All Rentals</button>
    </div>

    <section id="about" class="about-section py-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <h2 class="about-title"><?= htmlspecialchars($content['about_title']['text']) ?></h2>
                    <div class="icon-container">
                        <span class="about-diamond material-symbols-outlined">stat_0</span>
                        <span class="about-line material-symbols-outlined">horizontal_rule</span>
                    </div>
                    <div class="about-text">
                        <?= $content['about_text']['text'] ?>
                    </div>
                </div>
                <div class="col-md-6">
                    <img src="<?= htmlspecialchars($content['about_image']['image']) ?>?<?= time() ?>" alt="Event Setup" class="about-image">
                </div>
            </div>
        </div>
    </section>

    <section class="wh-container">
    <div class="wh-contents">
        <img src="<?= htmlspecialchars($content['warehouse_image']['image']) ?>?<?= time() ?>"
             alt="Warehouse Image"
             class="wh-image wh-image-enhanced">
        <div class="wh-text-block">
            <h1 class="wh-title"><?= htmlspecialchars($content['warehouse_title']['text']) ?></h1>
            <div class="hours-section">
                <table class="hours-table">
                    <tr><th style="background-color:#F0BB78;">Sunday</th><td>7:00 AM - 5:00 PM</td></tr>
                    <tr><th style="background-color:#F0BB78;">Monday</th><td style="background-color:#FFF0DC;">7:00 AM - 5:00 PM</td></tr>
                    <tr><th style="background-color:#F0BB78;">Tuesday</th><td>7:00 AM - 5:00 PM</td></tr>
                    <tr><th style="background-color:#F0BB78;">Wednesday</th><td style="background-color:#FFF0DC;">7:00 AM - 5:00 PM</td></tr>
                    <tr><th style="background-color:#F0BB78;">Thursday</th><td>7:00 AM - 5:00 PM</td></tr>
                    <tr><th style="background-color:#F0BB78;">Friday</th><td style="background-color:#FFF0DC;">7:00 AM - 5:00 PM</td></tr>
                    <tr><th style="background-color:#F0BB78;">Saturday</th><td>7:00 AM - 5:00 PM</td></tr>
                </table>
                <div class="hours-bottom">
                    <div class="call-info">
                        <p><b>Call Us Monday through Friday</b></p>
                        <p>9am - 5pm</p>
                    </div>
                    <button class="contact-button" onclick="location.href='/pages/contactus.php'">
                        Contact Us
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>

    <?php include 'includes/footer.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.4/min/tiny-slider.js"></script>
    <script src="js/rentalscarousel.js"></script>
    <script src="js/pwa-register.js"></script>
   
</body>
</html>