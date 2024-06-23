
<div class="Profile_menu">
    <div class="Profile_menu_logo" id="Profile_border_start">
        <img src="../assets/img/logo.png" id="Profile_start_img">
    </div>
    <div class="Profile_menu_setting">
        <div class="Profile_menu-home" id="Profile_border">
            <img src="../assets/img/home.png" id="Profile_img">
            <span class="Profile_border_span"><a href="../view/instagram.php">Главная</a></span>
        </div>
        <div class="Profile_menu-search" id="Profile_border">
            <img src="../assets/img/search.png" id="Profile_img">
            <span class="Profile_border_span">Поисковый запрос</span>
        </div>
        <div class="Profile_menu-reel" id="Profile_border">
            <img src="../assets/img/reel.png"  class="Profile_reels">
            <span class="Profile_border_span">Reels</span>
        </div>
        <div class="Profile_menu-chat" id="Profile_border">
            <img src="../assets/img/chat.png" id="Profile_img">
            <span class="Profile_border_span">Сообщения</span>
        </div>
        <div class="Profile_menu-like" id="Profile_border">
            <img src="../assets/img/like.png" id="Profile_img">
            <span class="Profile_border_span">Уведомления</span>
        </div>
        <div class="Profile_click_add">
            <div class="Profile_menu-add" id="Profile_border">
                <img src="../assets/img/add.png" id="Profile_img">
                <span class="Profile_border_span" id="Profile_create_post">Создать</span>
            </div>
        </div>
        <div class="Profile_menu_img" id="Profile_border">
            <div class="Profile_img_table" style="overflow: hidden"><img <?php if(isset($_SESSION["user"]["avatar"])){?> src="<?= $_SESSION["user"]["avatar"]; }?>" style="width: 34px;height: 34px;z-index: -1" ></div>
            <span class="Profile_border_span"<a href="./profile.php" style="text-decoration: none">Профиль</a></span>
        </div>
    </div>
    <div class="Profile_menu_else">
    </div>
</div>
