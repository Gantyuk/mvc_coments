<div align="center">
    <?php if (!empty($errors)) { ?>
        <div style="color: red;"><?php echo array_shift($errors); ?></div>
        <hr/>
    <?php } ?>
    <form method="post" action="/mvc_autorization/main/registration">
        <p>
            <span>І'мя:</span><br/>
            <input type="text" name="name" value="<?php echo @$data['name'] ?>"/>
        </p>
        <p>
            <span>Email:</span><br/>
            <input type="email" name="email" value="<?php echo @$data['email'] ?>"/>
        </p>
        <p>
            <span>Пароль:</span><br/>
            <input type="password" name="password"/>
        </p>
        <p>
            <span>Повторіть пароль:</span><br/>
            <input type="password" name="password_repeat"/>
        </p>
        <p>
            <button type="submit" name="do_singup">Зареєструватися</button>
        </p>
    </form>
</div>