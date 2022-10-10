<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    var container = document.querySelector("#container");

    var active = false;
    var currentX;
    var currentY;
    var initialX;
    var initialY;
    var xOffset = 0;
    var yOffset = 0;

    container.addEventListener("touchstart", dragStart, false);
    container.addEventListener("touchend", dragEnd, false);
    container.addEventListener("touchmove", drag, false);

    container.addEventListener("mousedown", dragStart, false);
    container.addEventListener("mouseup", dragEnd, false);
    container.addEventListener("mousemove", drag, false);

    container.addEventListener("mouseover", getData, false);

    function getData(e) {
        table = e.target.id.split("-")[1];
        ajaxRequest(null, null, table);
    }

    function showData(data) {
        var table = document.getElementById('table');
        var time = document.getElementById('time');
        var menus = document.getElementById('menus');
        var htmlTime = '';
        var htmlMenus = '';

        table.innerHTML = data.unique_target;

        for (let i = 0; i < data.reservations.length; i++) {
            htmlTime += data.reservations[i].from + ' / ' + data.reservations[i].to + '<br/>';
        }

        for (let i = 0; i < data.menus.length; i++) {
            htmlMenus += data.menus[i].name + '<br/>';
        }

        table.innerHTML = data.unique_target;
        time.innerHTML = htmlTime;
        menus.innerHTML = htmlMenus;
    }

    function dragStart(e) {
        if (e.type === "touchstart") {
            initialX = e.touches[0].clientX - xOffset;
            initialY = e.touches[0].clientY - yOffset;
        } else {
            initialX = e.clientX - xOffset;
            initialY = e.clientY - yOffset;
        }

        var dragItem = document.querySelector("#" + e.target.id);

        if (e.target === dragItem) {
            active = true;
        }
    }

    function dragEnd(e) {
        initialX = currentX;
        initialY = currentY;
        table = e.target.id.split("-")[1];

        ajaxRequest(initialX, initialY, table);

        active = false;
    }

    function drag(e) {
        if (active) {
            if (e.target.id !== "container") {
                e.preventDefault();

                if (e.type === "touchmove") {
                    currentX = e.touches[0].clientX - initialX;
                    currentY = e.touches[0].clientY - initialY;
                } else {
                    currentX = e.clientX - initialX;
                    currentY = e.clientY - initialY;
                }

                var dragItem = document.querySelector("#" + e.target.id);

                setTranslate(currentX, currentY, dragItem);
            }
        }
    }

    function ajaxRequest(initialX, initialY, table) {
        var route = '{{ route('tables.location') }}';

        $.ajax({
            url: route,
            type: "GET",
            data: {
                table: table,
                initialY: initialY,
                initialX: initialX,
            },
            success: function(data) {
                return showData(data);
            }
        });
    }

    function setTranslate(xPos, yPos, el) {
        el.style.transform = "translate3d(" + xPos + "px, " + yPos + "px, 0)";
    }
</script>
