var flag = false;
$(document).ready(function () {
    $('.select1, .select2').click(function () {
        if (!flag) {
            compareanswer(this);
        }
    });
    initializeClock('clockdiv', new Date(Date.parse(new Date()) + TIME_ALLOWED));
});

compareanswer = function (el) {
    var selectanswer = $(el).data('value');
    $.ajax({
        type: 'POST',
        dataType: 'text',
        data: {
            selectAnswer: selectanswer,
            problemId: $('#problemId').val()
        },
        url: SITE_URL + 'student/checkanswer',
        success: function (data) {
            var json = JSON.parse(data);
            if (json.status) {
                flag = true;
                //$('.pr-ref').empty();
                $('.form-group span.select1').html($('<i>').addClass('fa fa-times')).addClass('wrong-icon');
                $('span[value="' + selectanswer + '"]').html($('<i>')
                    .addClass('fa fa-check'))
                    .addClass('correct-icon');
                $('.answer-text[data-value="' + selectanswer + '"]').addClass('correct-label');
                $('.answer-text').css({ "color": "#ed0b4c" });
                $('.sr-ref').html(json.solution);
            }
            else {
                flag = true;
                $('span[value="' + selectanswer + '"]').html($('<i>')
                    .addClass('fa fa-times'))
                    .addClass('wrong-icon');
                $('.answer-text[data-value="' + selectanswer + '"]').css({ "color": "#ed0b4c" });
            }
        }
    })
}