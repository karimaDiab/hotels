$(document).ready(function () {

    $("#optionsRadios1").click(function () {

        $(".boxs-1").toggleClass("active");
        $(".boxs-2 , .boxs-3  , .boxs-4, .boxs-5  , .boxs-6 ").removeClass("active")

    });



    $("#optionsRadios2").click(function () {

        $(".boxs-2").toggleClass("active");
        $(".boxs-1 , .boxs-3  , .boxs-4, .boxs-5  , .boxs-6 ").removeClass("active")

    });

    $("#optionsRadios3").click(function () {

        $(".boxs-3").toggleClass("active");
        $(".boxs-2 , .boxs-1  , .boxs-4, .boxs-5  , .boxs-6 ").removeClass("active")

    });

    $("#optionsRadios4").click(function () {

        $(".boxs-4").toggleClass("active");
        $(".boxs-2 , .boxs-3  , .boxs-1, .boxs-5  , .boxs-6 ").removeClass("active")

    });

    $("#optionsRadios5").click(function () {

        $(".boxs-5").toggleClass("active");
        $(".boxs-2 , .boxs-3  , .boxs-4, .boxs-1  , .boxs-6 ").removeClass("active")

    });

    $("#optionsRadios6").click(function () {

        $(".boxs-6").toggleClass("active");
        $(".boxs-2 , .boxs-3  , .boxs-4, .boxs-5  , .boxs-1 ").removeClass("active")

    });



});
