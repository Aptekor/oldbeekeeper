const   button1 = document.getElementById('search-button');
const   modal1 = document.getElementById('container-1');


button1.onclick = function () {
    modal1.style.display = 'none';
    $('#box2-1-3').empty('<h4>');
}

$("#search-input").on("input", function() {
    if ($(this).val()) {
        $('#btn-search-reset').show();
    } else {
        $('#btn-search-reset').hide();
    }
});

$('#btn-search-reset').click(function() {
    $("#search-input").val('');
    $(this).hide();
});


// декодирует HTML сущности
function htmlDecode(value){
    return $('<div/>').html(value).text();
}


$(document).ready(function() {
    $('.btn2').click(function (e) { //устанавливаем событие отправки для формы с id=form
        e.preventDefault();
        let search = $('.search-input').val();

        if (search === "") {
            $("#box2-1-5").html("");
            modal1.style.display = 'flex';
            $('#box2-1-3').append('<h4>Список статей на сайте: </h4>');
        }else {


            $.ajax({
                url: '/',
                type: 'POST',
                dataType: 'JSON',
                cache: false,
                data: {
                    query: search,
                    search_button: true
                }
                ,

                success: function (arr) {

                    $('#box2-1-3').append('<h4> Результаты поиска: </h4>');
                    $("#box2-1-5").empty();

                    let result1 = document.querySelector('.box2-1-5')

                    for (let i = 0; i < arr.length; i++) {

                        let p1 = document.createElement('div');
                        p1.id = "blok"+ (i+1);  p1.className = "box2-1-5-1";
                        result1.appendChild(p1);
                        let block = "#blok"+ (i+1);

                        let result2 = document.querySelector(block);

                            let p2 = document.createElement('a');
                            p2.id = "d"+ (i+1);  p2.className = "text_link";
                            p2.href = "content/" + arr[i]['idArticle'];
                            p2.innerHTML = arr[i]['titleArticle'];
                            result2.appendChild(p2);

                            let p3 = document.createElement('p');
                            p3.id = "d"+ (i+2); p3.className = "text-1";
                            p3.innerHTML = htmlDecode(arr[i]['textArticle']);
                            result2.appendChild(p3);

                            let p4 = document.createElement('p');
                            p4.id = "d"+ (i+3);  p4.className = "text-2";
                            p4.innerHTML = arr[i]['autorArticle'] + ", " + arr[i]['dataArticle'] + ", id#" + arr[i]['idArticle'];
                            result2.appendChild(p4);

                    }
                }
            });
        }
    });
});