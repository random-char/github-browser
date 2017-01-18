function vote(element, type) {
    $.ajax({
        url: "/like/" + type + "/" + $(element).data("name"),
        success: function(){
        if ($(element).hasClass("btn-success")) {
            $(element).removeClass("btn-success").addClass("btn-danger");
            $(element).text('UnLike');
        } else {
            $(element).removeClass("btn-danger").addClass("btn-success");
            $(element).text('Like');
        }
    }});
}