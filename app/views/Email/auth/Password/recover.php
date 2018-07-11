{% extends 'email/template/default.php' %}

{% block content %}

    <p> Click the following link to change your password. </p>

    <p> {{ baseUrl }}{{urlFor('password.reset')}}?email={{user.email}}&identifier={{ identifier|url_encode }}</p>

{% endblock %}