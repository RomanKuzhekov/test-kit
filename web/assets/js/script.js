// В админке если выбрали элемент для удаления - запрашиваем подтверждение
document.addEventListener('click', function(e) {
    if (e.target.id === 'delete') {
        e.preventDefault(); // Отменяем переход по ссылке
        var isDelete = confirm("Удалить элемент?");
        if (isDelete) {
            window.location.href = e.target.href;
        }
    }
});


// На главной странице сайта - функционал иерархии - показываем/скрываем элементы (описание)
$(document).ready(function(){
    var arSons = [];
    $("#data-structure .list-items .item").each(function () {
        $(this).find(".text").hide();

        if ($(this).attr('data-parent')) {
            arSons.push($(this).attr('data-parent'));
        }
    });
    arSons = $.unique(arSons); //получаем массив id потомков

    // Возле родителя показываем иконку "Показать/скрыть потомков"
    $("#data-structure .list-items .item").each(function () {
        if ($.inArray($(this).attr('data-id'), arSons) != -1) {
            $(this).prepend("<span class='hide-show'>&#10010;</span> ");
        }

        // Скрываем всех потомков
        if ($.inArray($(this).attr('data-parent'), arSons) != -1) {
            $(this).parent().hide();
        }
    });

    // Показываем/скрываем потомков у этого элемента при клике
    $("#data-structure .list-items .item .hide-show").click(function () {
        let idParent = $(this).parent().attr('data-id');

        $("#data-structure .list-items .item").each(function () {
            if ($(this).attr('data-parent') == idParent) {
              //  $(this).parent().show();
                $(this).parent().slideToggle(300);
            }
        });
        return false;
    });

    // Если нажимаем по названию - показываем/скрываем описание у этого элемента
    $("#data-structure .list-items .item").click(function () {
        $(this).find(".text").slideToggle(300);
        return false;
    });
});