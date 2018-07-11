<!DOCTYPE html>
    <html lang = "en">
        <head>
            <meta charset = "UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <title> VideoSnapTest | {% block title %}{% endblock %}</title>
            <meta name="keywords" content="VideoSnap things." />


            <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>

            <link href="{{ baseUrl() }}/resources/css/bootstrap.min.css" rel='stylesheet' type='text/css' media="all" />
            <!-- //bootstrap -->
            <link href="{{ baseUrl() }}/resources/css/dashboard.css" rel="stylesheet">
            <!-- Custom Theme files -->
            <link href="{{ baseUrl() }}/resources/css/style.css" rel='stylesheet' type='text/css' media="all" />

            <link href="{{ baseUrl() }}/resources/css/slider.css" rel="stylesheet">

            <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

            <link href="{{ baseUrl() }}/resources/library/notify/notify.css" rel="stylesheet">
            <!-- Magnific Popup core JS file -->
            <script src="{{ baseUrl() }}/resources/js/jquery.magnific-popup.js"></script>
            <script src="{{ baseUrl() }}/resources/library/notify/notify.js"></script>
            <!-- fonts -->
            <link href='//fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
            <link href='//fonts.googleapis.com/css?family=Poiret+One' rel='stylesheet' type='text/css'>
            <!-- //fonts -->

            {% block style %}
                <!-- For extra pair of styling-->
            {% endblock %}
        </head>


        <body>
            <div class="page-content">
                {% include 'templates/partials/navigation.php' %}
                {% include 'templates/partials/sidebar.php' %}
                {% include 'templates/partials/messages.php' %}
                {% block content %}
                {% endblock %}
            </div>

            <script type="text/javascript" src="{{ baseUrl() }}/resources/js/bootstrap.min.js"></script>
            <!-- bootstrap script -->
            {% block script %}
            <!-- For Extra Set of Scripting on child page -->
            {% endblock %}
        </body>
    </html>