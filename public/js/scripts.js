$(document).ready(function(){

/* Переменная-флаг для отслеживания того, происходит ли в данный момент ajax-запрос. В самом начале даем ей значение false, т.е. запрос не в процессе выполнения */
var inProcess = false;
/* С какой статьи надо делать выборку из базы при ajax-запросе */
var startFrom = 3;

    /* Используйте вариант $('#more').click(function() для того, чтобы дать пользователю возможность управлять процессом, кликая по кнопке "Дальше" под блоком статей (см. файл index.php) */
    $(window).scroll(function(){
        if($(window).scrollTop() + $(window).height() >= $(document).height() && !inProcess ) {

            $.ajax({
                url: "/mvc_autorization/main/coments",
                method: 'GET',
                data: {"startFrom" : startFrom},
                beforeSend: function() {
                    inProcess = true;
                }
            }).done(function(data){
                data = jQuery.parseJSON(data);
                var coment = data['coment'];
                alert(coment);

                if (coment.length > 0) {

                         $("#comments").append("<?php foreach ($coments as $coment): getComment($coment); endforeach; ?> <br/>");

                    inProcess = false;
                    startFrom += 3;
                }
            });
        }
    });
});