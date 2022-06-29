$(document).ready(function(){
    $('.section').click(function (event){
        $('.section,.menu').toggleClass('active');
        $('body').toggleClass('lock');
    });
});


$(document).ready(function () {

    let element1 = document.getElementById('red-text-coment');
    let element2 = document.getElementById('box2-1-8');
    let element3 = document.getElementById('box2-1-7');

    $('#comment-panel-1').click(function() {
        $('.box2-1-7').toggleClass('active');

        if (element2.classList.contains('active')) {
            $('.box2-1-8').toggleClass('active');
        }

        element1.style.display = 'none';

    });

    $('#comment-panel-2').click(function() {
        $('.box2-1-8').toggleClass('active');

        if (element3.classList.contains('active')) {
            $('.box2-1-7').toggleClass('active');
        }

        element1.style.display = 'none';
    });

    //Вызов окна редактирования статьи
    $('.button15btn7').click(function(e) {
        e.preventDefault();

        element1.style.display = 'flex';

        if (element2.classList.contains('active')) {
            $('.box2-1-8').toggleClass('active');
        }
        if (element3.classList.contains('active')) {
            $('.box2-1-7').toggleClass('active');
        }

        let id = $("#id_del_article").attr('value')
        let urlid = '/content/'+ id
        let value = $(this).attr('value')

        $.ajax({   //Ajax на запрос данных на редактирование коментариев
            url: urlid,
            dataType: 'JSON',
            type: 'POST',
            data: {
                country: value,
                red_coments: true,
            },
            success: function (data) {

                $("#redTextComent").empty();

                let result1 = document.querySelector('#redTextComent')

                for (let i = 0; i < data.length; i++) {
                    let p1 = document.createElement('textarea');
                    p1.id = "b" + i; p1.name = 'text-redact-one-coment';
                    p1.innerHTML = data[i]['text_comment'];
                    result1.appendChild(p1);

                    let p2 = document.createElement('input');
                    p2.id = "b" + (i+1);  p2.type = "hidden";
                    p2.value = data[i]['id_Com']; p2.name = 'country';
                    result1.appendChild(p2);
                }
            }
        });
    });
});



    //Drag&Drop функция
    let elem = document.querySelector('#box2-1-8')
    let offsetX;
    let offsetY;


        $('#slaide').mousedown(function (event) {
            elem.addEventListener('dragstart', function (event) {
                offsetX = event.offsetX;
                offsetY = event.offsetY;
            });

            elem.addEventListener('dragend', function (event) {
                elem.style.top = (event.pageY - offsetY) + 'px';
                elem.style.left = (event.pageX - offsetX) + 'px';
            });
        })


















