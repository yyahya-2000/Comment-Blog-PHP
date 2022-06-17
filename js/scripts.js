function clearError() {
    window.history.pushState({}, document.title, "/WebStudio/login");
}

function animateEnter(DOMElement, id) {
    $(DOMElement)
        .hide()
        .css('opacity',0.0)
        .prependTo(id)
        .slideDown('slow')
        .animate({opacity: 1.0})
}

function get3Comments(page) {
    let result = [];
    $.ajax({
        method: 'get',
        url: '/WebStudio/model/actions/read_comments.php',
        data: {
            'page': page,
            'ajax': true
        },
        success: function (data) {
            result = JSON.parse(data);
        },
        error: function (e) {
            alert("Error: " + e);
        }
    });

    return result;
}

$(document).ready(function () {
    let page = 0;
    $('.slider-container').slick({
        slidesToShow: 2,
        slidesToScroll: 1,
        centerMode: true,
        autoplay: true,
        nextArrow: '<i class="fa-regular fa-angle-right" style="cursor:pointer"></i>',
        prevArrow: '<i class="fa-regular fa-angle-left" style="cursor:pointer"></i>',
        focusOnSelect: true,
        adaptiveHeight: true,
    });

    let commentsList = document.getElementById('comments-list-home');
    if (commentsList) {
        const comments = get3Comments(page++);
        comments.forEach((comment) => {
            // $("#comments-list-home:first").prepend('')
        })
        const html = '<button id="submit">Submit</button>';
    }


    $("#submit-comment-btn").on('click', function () {
        const date = new Date();
        const dataString = date.getFullYear() + "-" + ("0" + (date.getMonth() + 1)).slice(-2) + "-"
            + ("0" + (date.getDate())).slice(-2) + " " + date.getHours() + ":" + date.getMinutes()
            + ":" + date.getSeconds();

        const commentTestArea = $("#add-comment-textarea");
        const commentDiv = document.querySelector("#comments-list-home > .card");
        const clonedComment = commentDiv.cloneNode(true);

        $.ajax({
            method: 'get',
            url: '/WebStudio/model/actions/add_comment.php',
            data: {
                'body': commentTestArea.val(),
                'date': dataString,
                'ajax': true
            },
            success: function (data) {
                data = JSON.parse(data);

                clonedComment.querySelector("#card-login-home-btm").innerText = data["author"];
                clonedComment.querySelector("#card-date-home-btm").innerText = dataString;
                clonedComment.querySelector("#card-body-home-btm").innerText = commentTestArea.val();
                $("#comments-list-home:first").prepend(clonedComment);

                animateEnter(clonedComment, "#comments-list-home:first");

                $("#addCommentPopup").modal('toggle');
                commentTestArea.val( "");
            },
            error: function (e) {
                alert("Error: " + e);
            }
        });

    });
});