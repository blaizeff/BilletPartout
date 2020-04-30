$(document).ready(function() {
    $(".checkoutButton").click(function() {
        validate();
    });

    function validate() {
        let nbTickets = null;
        let sectionId = null;
        $("#nbBilletsContainer div").each(function() {
            if ($(this).hasClass("selectedNb")) {
                if ($(this).is("#5plus")) {
                    nbTickets = $("#demo").text();
                } else {
                    nbTickets = $(this).text();
                }
            }
        });
        $(".sectionBillet").each(function() {
            if ($(this).hasClass("selectedSection")) {
                sectionId = $(this).attr("id").replace(/[a-z]/g, "");
            }
        });
        if (nbTickets === null) {
            $("#nbError").show();
        }
        if (sectionId === null) {
            $("#sectionError").show();
        }
        if (nbTickets !== null && sectionId !== null) {
            postForm(nbTickets, sectionId);
        }
    }

    function postForm(nbTickets, sectionId) {
        var form = document.createElement("form");
        var element1 = document.createElement("input");
        var element2 = document.createElement("input");

        form.method = "POST";
        form.action = "";

        element1.value = nbTickets;
        element1.name = "nbTickets";
        form.appendChild(element1);

        element2.value = sectionId;
        element2.name = "sectionId";
        form.appendChild(element2);

        document.body.appendChild(form);

        form.submit();
    }
    $("#buttonContainer>*").click(function() {
        if ($(this).is("#salleButton")) {
            showCarte();
        } else {
            showInfo();
        }
    });

    function showCarte() {
        $(".selected").addClass("unselected").removeClass("selected");
        $("#salleButton").addClass("selected").removeClass("unselected");
        $("#salleContainer").show();
        $("#moreInfoContainer").hide();
        $("html, body").animate({ scrollTop: $(document).height() - $(window).height() - 100 }, 500);
    }

    function showInfo() {
        $(".selected").addClass("unselected").removeClass("selected");
        $("#moreInfoButton").addClass("selected").removeClass("unselected");
        $("#salleContainer").hide();
        $("#moreInfoContainer").show();
        $("#moreInfoContainer").css("visibility", "inherit");
        $("#moreInfoContainer").css("position", "relative");
        $("#moreInfoContainer").css("top", "0");
        $("html, body").animate({ scrollTop: $(document).height() - $(window).height() - 100 }, 500);
    }
    $("#sectionBilletsContainer a").click(function() {
        $("#sectionError").hide();
        $(".selectedSection").each(function() {
            $
            let thisColor = $(this).css("background-color");
            thisColor = thisColor.replace(/rgb/, "rgba");
            thisColor = thisColor.replace(/\)/g, ",0.5)");
            $(this).css("background-color", thisColor);
        });
        $(".selectedSection").removeClass("selectedSection");
        let section = $(this).find("div")
        $(section).addClass("selectedSection");
        let color = $(section).css("background-color").slice(0, -4) + "1)";
        $(section).css("background-color", color);
        if ($(section).is("#section1")) {
            let src = $("#sceneImg").attr("src");
            src = src.replace(/-[0-9]/, "-1");
            $("#sceneImg").attr("src", src);
        } else if ($(section).is("#section2")) {
            let src = $("#sceneImg").attr("src");
            src = src.replace(/-[0-9]/, "-2");
            $("#sceneImg").attr("src", src);
        } else if ($(section).is("#section3")) {
            let src = $("#sceneImg").attr("src");
            src = src.replace(/-[0-9]/, "-3");
            $("#sceneImg").attr("src", src);
        }
    });
    $("#nbBilletsContainer div").click(function() {
        $("#nbError").hide();
        $("#nbBilletsContainer div").removeClass("selectedNb");
        $(this).addClass("selectedNb");
        console.log(this);
        if ($(this).is("#5plus")) {
            $(".slidecontainer").show();
        } else {
            $(".slidecontainer").hide();
        }
    })
    $("a.aBuyButton").click(function(event) {
        event.preventDefault();
        showCarte();
        $("html, body").animate({ scrollTop: $(document).height() - $(window).height() - 100 }, 500);
    });
    $("a.aVenue").click(function(event) {
        event.preventDefault();
        showInfo();
        $("html, body").animate({ scrollTop: $(document).height() - $(window).height() - 100 }, 500);
    });
});