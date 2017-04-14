<div align="center">
    <?php if (!empty($errors)) { ?>
        <div style="color: red;"><?php echo array_shift($errors); ?></div>
        <hr/>
    <?php } ?>

    <form method="post" action="/mvc_autorization/main/login">
        <p>
            <span>Email:</span><br/>
            <input type="email" name="email" value="<?php echo @$data['email'] ?>"/>
        </p>
        <p>
            <span>Пароль:</span><br/>
            <input type="password" name="password"/>
        </p>
        <p>
            <button type="submit" name="do_login">Вхід</button>
        </p>
    </form>
</div>
