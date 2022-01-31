$(function () {
    let $filtforms = $(".filtforms .filtform");

    $filtforms.on("keyup", function() {

        $("#tab tr").show();
        console.log(1);

        $filtforms.each(function(index, value) {
        let val = value.firstElementChild.value.toLowerCase();

            $("#tab tr").filter(function() {

                if (val != ""){
                let hh = $(this).children().eq(index).text().toLowerCase();
                    if (hh.indexOf(val) < 0) {
                    $(this).hide();
                    console.log(2);
                    }
                }
            });

        });
    });









$('.remove_sql').click(function f() {

    let isBoss = confirm("Удалить?");

    if (isBoss === true) {
        $.ajax({
            type: "POST",
            url: "ajax_delete.php",
            data: "delete=" + $(this).val()
        });
        $(this).parent().parent().fadeOut("slow");
    }
    });

    $('.add_sql').click(function () {
    let inputs = $('.add :input');
        var post1 = "",
            len = inputs.length -1;
            norm = 0,
            post2 = "";

        for (let i = 0; i < len; i++) {
            let data = inputs.eq(i).eq(0).data("value");
            let val = inputs.eq(i).eq(0).val();

            var post1 = post1 + data + ",";
            if (val == ""){
                var post2 = post2 + "" + null + ",";
            }
            else {
                var post2 = post2 + "'" + val + "',";
            }

            norm++;
          //  }
            //console.log($('.add :input').eq(i).eq(0).data("value"));
           if (len == norm){
            console.log(post1.slice(0, -1));
            console.log(post2.slice(0, -1));
                $.ajax({
                    type: "POST",
                    url: "ajax_add.php",
                    data: "fild=" + post1.slice(0, -1) + "&val=" + post2.slice(0, -1),
                    success: function (response) {
                        console.log(response);
                        location.reload();
                    }
                });
           }
       }

    });


    $( "#tab tr td" ).on( "dblclick", function() {
        // $( this ).(function() {
        let $text = $( this );
        let text = $( this ).html();
        let textinp =  "<textarea>" + $( this ).html().replaceAll('<br>', '') + "</textarea>";
        let texttd =  "<td>" + $( this ).html() + "</td>";

            if (!$( this ).children("textarea").val()){
             $( this ).html(textinp);
                console.log($( this ).children("textarea").focus());
            }

            $( this ).children("textarea").val();
            $( this ).children("textarea").on("blur", function() {
            $text.html($(this).val());

            let new_text = ($(this).val()),
                td_id = $text.parent().data("id"),
                filt = $text.data("filt");


            if(new_text == ""){
                new_text = " ";
            }
                if(new_text == "0"){
                    new_text = "00";
                }
            console.log(new_text + "= Новый текст");
            console.log(text + "= текст");


            if (new_text != text){

            $.ajax({
                type: "POST",
                url: "ajax_update.php",
                data: "new_text=" + new_text + "&td_id=" + td_id + "&filt=" + filt,
                success: function (response) {
                    console.log(response);

                }
            });
            }
         });

    });

});

