$(document).ready(function() {

    skip = false;
    $("ul").addClass("firstlevelul");
    $("ul li").addClass("firstlevelli");
    $("ul li ul").removeClass("firstlevelul");
    $("ul li ul li").removeClass("firstlevelli");
    $(".firstlevelul").addClass("left");
    $(".firstlevelul").last().after("<ul class='right'></ul>");
    $("li").each(
        function () {
            $(this).addClass(toclasssafe($(this).text()));
            $(this).prepend("<a class='add' >+</a>");
                });
    $("li ul li").each(
        function () {
            $(this).html($(this).html().split(".").join("<sup>") + "</sup>");
        });
    skip = false;
    $(".firstlevelli").each(function (index, Element) {
        
            if (skip) {
                skip = false;
            } else {
                $(".right").append($(this));
                skip = true;
            }
    });
    
    $(".firstlevelli").children(".add").remove();
    
    $(".add").click(additem);
    openorclosed();
    
});


function dropdown() {
    $(this).siblings("ul").children("li").each(function () {
        $(this).toggle(300);
    });
}
  

function additem() {
    itemname = $(this).parent().attr("class");
    itemname_spaces = fromclasssafe(itemname);
    if($("#items td").length == 0)   {
        $("#summarynothing").hide(100);
        $("#summarytotal").show(100);
    }
    if($("#items ." + itemname).length == 0) {
        $("#items").append(createtr(itemname_spaces))
        $(".clearbutton").click(clearitem);
    } else {
        quanity = $("#items ." + itemname).siblings(".quanity").first();
        quanity.html(Number(quanity.html())+1);
    }
    updateorder();
}

function toclasssafe(input) {
    dollar = "DOLLAAAA";
    dot    = "DOTTTAAA";
    return input.split(' ').join('_').split('\$').join(dollar).split('\.').join(dot);
}

function fromclasssafe(input) {
    dollar = "DOLLAAAA";
    dot    = "DOTTTAAA";
    return input.split('_').join(' ').split(dollar).join("\$").split(dot).join("\.");
}



function clearitem() {
    $(this).parent().parent().remove();
    if($("#items td").length == 0)   {
        $("#summarynothing").show(100);
        $("#summarytotal").hide(100);
    }
    updateorder();
}

function createtr(itemname) {
    return "<tr>" +
            createtd("clear", "<a class='clearbutton'>x</a>") +
            createtd("quanity", 1) +
            createtd(toclasssafe(itemname), itemname) + "</tr>";
}

function createtd(classname, content) {
    return "<td class='" + classname +"'>" + content + "</td>";
}

function updateorder() {
    order = $(":input[name=order]");
    order.val("");
    $("#items tr").each(function () {
        $(this).children().each(function () {
            if($(this).attr("class") != "clear") {
                order.val(order.val() + " " + $(this).html());
            }
        });
        order.val(order.val() + ",");
    });
    
    
    total = 0.00;
    patt = /\$(.*)/;
    patt2 = /¢(.*)/;
    $("#items tr").each(function () {
        Price =  $(this).children().last().text().match(patt);
        if (Price == null) {
            Price = Number("."+ $(this).children().last().text().match(patt2)[1]);
        } else {
            Price = Number(Price[1]);
        }
        
        Quantity = Number($(this).children(".quanity").text());
        total += Price*Quantity;
    });
    $("#summarytotalammount").html(total.toFixed(2));
    $(":input[name=total]").val(total.toFixed(2));
}

function openorclosed() {
    if(false) {
        $('#closed').hide();
        $('#open').show();
        $('.add').show();
    } else {
        $('#open').hide();
        $('#closed').show();
        $('.add').hide();
    }
    setTimeout(openorclosed, 30000);
}
