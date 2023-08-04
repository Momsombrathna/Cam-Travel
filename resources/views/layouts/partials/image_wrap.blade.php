<script>
    window.onload = function () {
        var imgDefer = document.getElementsByTagName("img");
        for (var i = 0; i < imgDefer.length; i++) {
            if (imgDefer[i].getAttribute("data-src")) {
                imgDefer[i].setAttribute("src", imgDefer[i].getAttribute("data-src"));
            }
        }
        var $container = $(".masonry");
        $container.imagesLoaded(function () {
            $container.masonry({
                percentPosition: true
            });
        });
    };
</script>