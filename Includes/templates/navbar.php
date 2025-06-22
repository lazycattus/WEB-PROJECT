<!-- START NAVBAR SECTION -->
<header id="header" class="header-section">
    <div class="container">
        <nav class="navbar">
            <a href="index.php" class="navbar-brand" style=" margin-left: 0px;">
                <img src="ORDER LAH image.png" alt="Restaurant Logo" style="width: 300px; margin:0px">
            </a>

            <div class="d-flex menu-wrap align-items-center">
                <div class="mainmenu" id="mainmenu">
                    <ul class="nav">
                        <li><a href="index.php">HOME</a></li>
                        <li><a href="menu.php">MENUS</a></li>
                        <li><a href="gallery.php">GALLERY</a></li>
                        <li><a href="about.php">ABOUT</a></li>
                        <li><a href="contact.php">CONTACT</a></li>
                    </ul>
                </div>

               

                <div class="header-btn" style="margin-left:10px">
                    <a href="table-reservation.php" target="_blank" class="menu-btn">Reserve Table</a>
                </div>
                 <!-- LIVE CLOCK HERE -->
                <div id="live-clock" style="color: white; font-weight: bold; margin-left: 20px;"></div>
            </div>
        </nav>
    </div>
</header>

<div class="header-height" style="height: 120px;"></div>
<!-- END NAVBAR SECTION -->
 <script>
    function updateClock() {
        const now = new Date();
        document.getElementById("live-clock").innerText = now.toLocaleTimeString();
    }
    setInterval(updateClock, 1000);
    updateClock(); // initial call
</script>

