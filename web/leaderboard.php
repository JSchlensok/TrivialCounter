<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <title>Trivial - Leaderboard</title>

        <!-- Bootstrap CSS CDN -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
        <!-- Our Custom CSS -->
        <link rel="stylesheet" href="style.css">
        <!-- Scrollbar Custom CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">

        <!-- Font Awesome JS -->
        <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
        <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>

    </head>

    <body>

        <div class="wrapper">
            <!-- Sidebar  -->
            <nav id="sidebar">
                <div class="sidebar-header">
                    <h3>TUM Trivial</h3>
                </div>

                <ul class="list-unstyled components" id="sidebar_content">
                    <li>
                        <a href="leaderboard.php">Leaderboard</a>
                    </li>
                    <hr>
                </ul>
            </nav>

            <!-- Page Content  -->
            <div id="content">
                <nav>
                    <div class="container-fluid">

                        <button type="button" id="sidebarCollapse" class="btn btn-info">
                            <i class="fas fa-align-left"></i>
                        </button>
                    </div>
                </nav>
                <br>
                <br>
                <div id="leaderboard_page">
                    <h1 id="Leaderboard">Leaderboard</h1>
                    <br>

                </div>
            </div>
        </div>

        <!-- jQuery CDN - Slim version (=without AJAX) -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <!-- Popper.JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
        <!-- Bootstrap JS -->
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
        <!-- jQuery Custom Scroller CDN -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>

        <script type="text/javascript">
            $(document).ready(function () {
                $("#sidebar").mCustomScrollbar({
                    theme: "minimal"
                });

                $('#sidebarCollapse').on('click', function () {
                    $('#sidebar, #content').toggleClass('active');
                    $('.collapse.in').toggleClass('in');
                    $('a[aria-expanded=true]').attr('aria-expanded', 'false');
                });
            });

            $(document).ready(function () {
                var url = new URL(window.location.href);
                var query_string = url.search;
                var search_params = new URLSearchParams(query_string);
                var id = search_params.get('id');

                $(document).ready(function () {
                    var url = new URL(window.location.href);
                    var query_string = url.search;
                    var search_params = new URLSearchParams(query_string);
                    var id = search_params.get('id');


                    var lecturers = "<?php
                        include "getData.php";
                        $all = getAll();
                        echo $all;
                        ?>";
                    lecturers = lecturers.substring(0, lecturers.length - 1);
                    lecturers = lecturers.substring(1, lecturers.length);
                    lecturers = lecturers.split(";");

                    for(var i = 0; i < lecturers.length; i++){
                        document.getElementById("sidebar_content").innerHTML = document.getElementById("sidebar_content").innerHTML + "<li><a href='index.php?id="+lecturers[i]+"'>"+lecturers[i]+"</a> </li>"
                    }

                    var data = '<?php
                        echo getLeaderboard()
                    ?>';
                    data = data.substring(0, data.length - 1);
                    data = data.replace(/"/g, '');
                    data = data.split(";");
                    for(var z = 0; z < data.length; z++){
                        data[z] = data[z].split("|");
                        data[z][1] = parseInt(data[z][1]);
                    }
                    data.sort(function(a,b){return a[1] < b[2]});

                    var page = document.getElementById("leaderboard_page").innerHTML;

                    for(var y = 0; y < data.length; y++) {
                        document.getElementById("leaderboard_page").innerHTML = page + "<div class=\"card bg-light text-dark\" id=\""+data[y][0]+"\"> <div class=\"card-body\" style=\"text-align: start\"> <span class=\"place\">"+(y+1)+"</span> <div style=\"width:100%;text-align: center;display: inline-block\"><a href=\"index.php?id="+data[y][0]+"\" id=\""+data[y][0]+"\">"+data[y][0]+"</a></div> </div> </div>";
                        if(y === 0){
                            document.getElementById(data[y][0]).classList.add("first");
                        }else if(y === 1){
                            document.getElementById(data[y][0]).classList.add("second");
                        }else if(y === 2){
                            document.getElementById(data[y][0]).classList.add("third");
                        }
                        page = document.getElementById("leaderboard_page").innerHTML;

                    }



                });

            });


        </script>
    </body>

</html>