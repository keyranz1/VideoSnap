var Notify = function (preferences) {

    if (preferences == undefined) {
        preferences = "The action was completed";
    }

    if (preferences) {
        /*
          Shorthand for alert with text only.
        */
        if (typeof preferences === "string") {
            var message = preferences;
            preferences = {};
            preferences.message = message;
        }

        preferences.id = "notif-" + Math.ceil(Math.random() * Math.pow(10, 5));
        preferences.title = preferences.title || "Alert";
        preferences.type = preferences.type || "info";
        preferences.length = preferences.length || "short";


        var node = "<div id=" + preferences.id + " class='notif notif-" + preferences.type + " animated slideInRight' >";
        node += "<span class='cross'>&times;</span>";
        node += "<h4>" + preferences.title + "</h4>";
        node += "<p>" + preferences.message + "</p>";

        if (preferences.action) {
            var action = preferences.action;
            node += "<a href=" + action.link + " class='btn btn-" + preferences.type + "'>"
                 + action.text
                 + "</a>";
        }
        var date = new Date();

        var timeString = "" + ((date.getHours() > 12) ? date.getHours() - 12 : date.getHours()) +
            ":" + date.getMinutes() + ((date.getHours() > 12) ? " PM" : " AM");

        node += "<span class='time'>" + timeString + "</span>";
        node += "</div>";
    }

    var alertNode;
    var wrapper = $("#page-container");
    if (wrapper.length == 0) {
        wrapper = $("body");
    }


    if (document.getElementById("notif-container") === null) {
        alertNode = document.createElement("DIV");
        alertNode.id = "notif-container";
        document.body.appendChild(alertNode);
    } else {
        alertNode = document.getElementById("notif-container");
    }

    if (alertNode.childNodes.length >= 4) {
        alertNode.removeChild(alertNode.childNodes[0]);
    }

    $("#notif-container").append(node);
    wrapper.css("opacity", .8);

    if (preferences.length !== "static") {
        var length = (preferences.length === "long") ? 10000 : 5000;
        setTimeout(function () {

            var parent = $("#" + preferences.id).remove();
            parent.removeClass("slideInRight").addClass("slideOutRight");

            wrapper.css("opacity", 1);
            setTimeout(function () {
                parent.remove(); //500ms delay due to animation
            }, 600);
        }, length);
    }



};

$.notify = function (preferences) {
    Notify(preferences);
}

$("document").ready(function () {
    var wrapper = $("#body-wrapper");

    if (!wrapper) {
        wrapper = $("body");
    }

    $("body").on("click", ".notif .cross", function () {
        wrapper.css("opacity", .5);
        var parent = $(this).parents(".notif");
        parent.removeClass("slideInRight").addClass("slideOutRight");
        setTimeout(function () {
            parent.remove(); //600ms delay due to animation
            wrapper.css("opacity", 1);
        }, 600);
    });
});