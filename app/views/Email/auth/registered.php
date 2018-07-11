{% extends 'email/template/default.php' %}

{% block content %}
  <p> Congratulations!! You have registered. </p>

    <p> You have one last thing to do before accessing awesome website. </p>
    <p> Click the link to activate: </p>
    <p>{{ baseUrl }}{{ urlFor('activate') }}?email={{ user.email }}&identifier={{ identifier|url_encode }}</p>

{% endblock %}