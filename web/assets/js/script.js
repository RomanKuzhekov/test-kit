window.onload = function () {
    // На главной странице сайта - функционал иерархии - показываем/скрываем элементы (описание)
    var arSons = [];
    for (let el of document.querySelectorAll('#data-structure .list-items .item')) {
        el.querySelector('.text').style.display = 'none';

        if (el.getAttribute('data-parent')) {
            arSons.push(el.getAttribute('data-parent'));
        }
    }
    arSons = Array.from(new Set(arSons)); //получаем уникальный массив id потомков

    // Возле родителя показываем иконку "Показать/скрыть потомков"
    for (let el of document.querySelectorAll('#data-structure .list-items .item')) {
        if (arSons.includes(el.getAttribute('data-id'))) {
           el.insertAdjacentHTML('beforebegin', "<span class='hide-show' data-test='343434'>&#10010;</span> ");
        }

        // Скрываем всех потомков
        if (arSons.includes(el.getAttribute('data-parent'))) {
           el.parentElement.style.display = 'none';
        }
    }

    // Показываем/скрываем потомков у этого элемента при клике
    [].forEach.call(document.querySelectorAll('.hide-show'), function(el) {
        el.onclick = function(e) {
           let idParent = el.nextElementSibling.getAttribute('data-id');
           let arSonsDop = [];
           for (let elSon of document.querySelectorAll('#data-structure .list-items .item')) {
               if (elSon.getAttribute('data-parent') == idParent) {
                   arSonsDop.push(elSon.getAttribute('data-id'));

                   if (elSon.parentElement.style.display == 'none'){
                       elSon.parentElement.style.display = '';
                   } else {
                       elSon.parentElement.style.display = 'none';
                   }

                   if (arSonsDop.includes(elSon.getAttribute('data-parent'))) {
                       elSon.getAttribute.parentElement().style.display = 'none';
                   }
               }
            }

            return false;
        }
    });

    // Если нажимаем по названию - показываем/скрываем описание у этого элемента
    [].forEach.call(document.querySelectorAll('#data-structure .item'), function(elDop) {
        elDop.onclick = function(e) {
            if (elDop.querySelector('.text').style.display == 'none'){
                elDop.querySelector('.text').style.display = '';
            } else {
                elDop.querySelector('.text').style.display = 'none';
            }

            return false;
        }
    });


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
}