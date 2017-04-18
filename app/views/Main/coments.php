<script type="text/javascript">
    $(document).ready(function () {

        $("a.reaply").click(function () {
            var id = $(this).attr("id");
            $("#parent_id").attr("value", id);
            var name = $(this).attr("name");
            $("textarea").val(name + ",");
            $("textarea").focus();
            $("#chengy").attr("value", -1);
            $("#submit").attr("value", "Коментувати")

        });

        $("a.chengy").click(function () {
            var id = $(this).attr("id");
            $("#parent_id").attr("value", id);
            var content = $(this).attr("content");
            $("textarea").val(content);
            $("textarea").focus();
            var id = $(this).attr("id");
            $("#chengy").attr("value", id);
            $("#submit").attr("value", "Змінити");

        });
    });

</script>

<ul id="comments">
    <form id="comment_from" action="/mvc_autorization/main/coments" method="post">
        <p><textarea name="text"></textarea></p>
        <input type="hidden" name="parent_id" id="parent_id" value="0"/>
        <input type="hidden" name="chengy" id="chengy" value="-1"/>
        <p><input type="submit" id="submit" value="Коментувати"/></p>
    </form>
    <?php
    function getComment($row)
    { ?>
        <li class="coment">

            <div class="author"><?php echo $row['Name'] ?></div>
            <div class="text"><?php echo $row['text'] ?></div>

            <a href="#" class="reaply" id="<?php echo $row['id'] ?>" name="<?php echo $row['Name'] ?>">Відповісти</a>
            <?php if ($row["user_id"] == $_SESSION["User_login"]['id']): ?>
                <a href="#" class="chengy" id="<?php echo $row['id'] ?>" content="<?php echo $row['text'] ?>" name="">Змінити</a>
                    <form action="/mvc_autorization/main/coments" method="post">
                        <button name="delete" value="<?php echo $row['id'] ?>">Видалити</button>
                    </form>
            <?php else:?>
                <form action="/mvc_autorization/main/coments" method="post">
                    <select name="mark" >
                        <option value="">Оцінка:</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                    <input type="hidden" name="coment_id" value="<?php echo $row['id'] ?>"/>
                    <input type="hidden" name="user_id" value="<?php echo $_SESSION["User_login"]['id'] ?>"/>
                    <button id="mark">Оцінити</button>
                </form>
                <?php endif;

            $coments_mod = new \app\models\Coments();
            $res = $coments_mod->ShowWherParentId($row['id']);
            if (!empty($res)) { ?>
                <ul id="<?php echo $row['id'] ?>">
                    <?php foreach ($res as $res1) {
                        getComment($res1);
                    } ?>
                </ul>
                <?php
            } ?>
        </li>
    <?php }

    foreach ($coments as $coment):
        getComment($coment);
    endforeach;
    ?>
    <br/>


</ul>
