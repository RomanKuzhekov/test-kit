// Если выбрали элемент для удаления
document.addEventListener('click', function(e) {
    console.log(e.target.id);
    if(e.target.id === 'delete') {
        e.preventDefault(); // Отменяем переход по ссылке
        var isDelete = confirm("Удалить элемент?");
        if (isDelete) {
            window.location.href = e.target.href;
        }
    }
});