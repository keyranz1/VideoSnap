{% extends 'templates/default.php' %}

{% block title %} {{ user.getFullNameOrUsername }} {% endblock %}

{% block content %}



<div class="container" style="bottom:-35px;" >
    <div class="row" style="padding:5px;">

        {{ user.username }} <br>
        {{ user.firstname}} <br>
        {{ user.lastname }}

</div>


{% endblock %}