{% extends 'templates/default.php' %}

{% block title %} Update Profile {% endblock %}

{% block content %}
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <div class="main-grids">


{% if auth.isAdmin %}
<h2> The list of all Admin are: </h2>


        <form action="{{ urlFor('deleteadmin') }}" method="post">

        <div class="row" id="namecol">
            <div class="col-sm-12">
                <table class="table table-hover" >
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Firstname</th>
                        <th>Lastname</th>
                        <th>Username</th>
                    </tr>
                    </thead>
                    <tbody>
                    {% set numb = 1 %}
                    {% for allAdmin in allAdmin.get %}
                    <tr class="info">

                        <td>    <input type="checkbox" name="{{ allAdmin.id }}"  id= "{{ allAdmin.id }}"> {{ AllAdmin.firstname }}<br>
                        </td>
                        <td>{{ allAdmin.firstname }}</td>
                        <td>{{ allAdmin.lastname }}</td>
                        <td>
                            <a href = "{{ urlFor('videos', { username: allAdmin.username }) }}">
                                {{ allAdmin.username }}
                            </a>
                        </td>
                    </tr>
                    {% set numb = numb + 1 %}
                    {% endfor %}
                    </tbody>

                </table>
            </div>
        </div>
            <button class="btn btn-danger" type="submit" value="Delete Admin"> Delete Admin </button>

            <input type ="hidden" name="{{ csrf_key}}" value="{{ csrf_token }}">

        </form>


<h2> The list of non Admin are: </h2>



        <form action="{{ urlFor('makeadmin') }}" method="post">

            <div class="row" id="namecol">
                <div class="col-sm-12">
                    <table class="table table-hover" >
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Firstname</th>
                            <th>Lastname</th>
                            <th>Username</th>
                        </tr>
                        </thead>
                        <tbody>
                        {% set numb = 1 %}
                        {% for allUser in allUser.get %}
                        <tr class="info">

                            <td>    <input type="checkbox" name="{{ allUser.id }}"  id= "{{ allUser.id }}"> {{ allUser.firstname }}<br>
                            </td>
                            <td>{{ allUser.firstname }}</td>
                            <td>{{ allUser.lastname }}</td>
                            <td>
                                <a href = "{{ urlFor('videos', { username: allUser.username }) }}">
                                    {{ allUser.username }}
                                </a>
                            </td>
                        </tr>
                        {% set numb = numb + 1 %}
                        {% endfor %}
                        </tbody>

                    </table>
                </div>
            </div>
            <button class="btn btn-success" type="submit" value="Make Admin"> Make Admin</button>

            <input type ="hidden" name="{{ csrf_key}}" value="{{ csrf_token }}">

        </form>


{% else %}

<form action="{{ urlFor('admin') }}" method="post">
    <input type ="hidden" name="{{ csrf_key}}" value="{{ csrf_token }}">


</form>
{% endif %}


    </div>
    {% include 'templates/partials/footer.php' %}
</div>
{% endblock %}