@php
use App\Models\Table;
@endphp

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <div class="row justify-content-between">
                    <div class="col-auto">
                        <div class="card-title">
                            Tafel overzicht
                        </div>
                    </div>
                    <div class="col-auto">
                        <a href="" class="btn btn-success">
                            <i class="fas fa-plus"></i>
                            Tafel
                        </a>
                    </div>
                </div>
            </div>

            <div class="card-body" style="height: 80vh;" id="container">
                {{ Table::render() }}
            </div>
        </div>
    </div>
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
            });
        }

        function drag(e) {
            if (active) {

                e.preventDefault();

                if (e.type === "touchmove") {
                    currentX = e.touches[0].clientX - initialX;
                    currentY = e.touches[0].clientY - initialY;
                } else {
                    currentX = e.clientX - initialX;
                    currentY = e.clientY - initialY;
                }

                xOffset = currentX;
                yOffset = currentY;

                var dragItem = document.querySelector("#" + e.target.id);

                setTranslate(currentX, currentY, dragItem);
            }
        }

        function setTranslate(xPos, yPos, el) {
            el.style.transform = "translate3d(" + xPos + "px, " + yPos + "px, 0)";
        }
    </script>
@endsection
