const button = document.getElementById('linkInPut');
const modal = document.getElementById('modal');
const wrapper = document.getElementById('wrapper');

button.onclick = function () {
    modal.style.display = 'block';
    wrapper.style.display = 'block';
}

wrapper.onclick = function () {
    modal.style.display = 'none';
    wrapper.style.display = 'none';
}

//Ajax на форму для регистрации
$('.btn1').click(function(e){ //устанавливаем событие отправки для формы с id=form
    e.preventDefault();
    let login = $('.username').val();
    let password = $('.password').val();

    $.ajax({
        url: '/',
        type:'POST',
        dataType:'JSON',
        cache: false,
        data: {
            loginUser: login,
            passUser: password,
            in_put: true
        }
        ,
        success: function(data){
        console.log(data); // выводишь любое переданное значение.
        $("#msg1").text(data.msg);


            if (data.msg === 'Авторизация прошла успешно'){
                location.reload();
            }
        }
    });
});

