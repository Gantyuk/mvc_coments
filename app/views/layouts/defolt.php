<title>SoftGroup</title>
<link rel="stylesheet" type="text/css" href="/mvc_autorization/css/style.css"/>
</head>
<body>
<div class="header">
    <a target="_blank" href="http://www.soft-group.com">
        <img id="logo" src="/mvc_autorization/images/Logo.PNG" width="189" height="60">
    </a>
    <div class="menu_head">
        <a href="/mvc_autorization/main/index">Головна</a>
        <a href="/mvc_autorization/main/autor">Автор</a>
        <a target="_blank" href="http://www.soft-group.com">SoftGroup </a>
    </div>
    <div class="text_head">
        <h2>SoftGroup </h2>
    </div>
</div>
<div class="pages">
    <div class="sidebar">
        <ul>
            <?php if (isset($_SESSION['User_login'])): ?>
                <li><a href="/mvc_autorization/main/index">Коментарі</a></li>
                <li><a href="/mvc_autorization/main/logout">Вихід</a></li>
            <?php else: ?>
                <li><a href="/mvc_autorization/main/login">Вхід</a></li>
                <li><a href="/mvc_autorization/main/registration">Реєстрація</a></li>
            <?php endif; ?>

        </ul>
    </div>
    <div class="content">
        <?php echo $contend; ?>
    </div>
    <div class="foot">
    </div>
</div>
<div align="center" class="footer">
    <h2>Автор: Гантюк В'ячеслав © 2017</h2>
</div>
</body>
</html>