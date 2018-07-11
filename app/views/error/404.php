{% extends 'templates/default.php' %}

{% block title %} Page Not Found {% endblock %}
{% block style %}
   <style>
       .main-grids{
           height:819px;
           width:100%;
       }
       #really{
           margin-top:30px;
       }
   </style>

{% endblock %}
{% block content %}
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <div class="main-grids text-center">
        <h1> Come on. It is <strong>404..</strong></h1>
        <h3>I guess you need to enter correct Url..Please Gosh !!! <Strong>Page Not Found !!!</Strong></h3>
        <img id="really" src="{{ baseUrl() }}/resources/img/really.jpg" width="400" height="400" alt=" " />
    </div>
    {% include 'templates/partials/footer.php' %}
</div>
{% endblock %}