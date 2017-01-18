function vote(element, type) {
    $.ajax({
        url: "/like/" + type + "/" + $(element).data("name"),
        success: function(){
        if ($(element).hasClass("btn-success")) {
            $(element).removeClass("btn-success").addClass("btn-danger");
            $(element).html('<i class="fa fa-thumbs-down" aria-hidden="true"></i>');
        } else {
            $(element).removeClass("btn-danger").addClass("btn-success");
            $(element).html('<i class="fa fa-thumbs-up" aria-hidden="true"></i>');
        }
    }});
}