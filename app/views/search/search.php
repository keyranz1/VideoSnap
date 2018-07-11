

{% extends 'templates/default.php' %}

{% block title %} Results {% endblock %}
{% block style %}
<style>
    .row#namecol{
        margin-right:0 !important;

    }
    .resent-grid{
        padding-left: 1.5em;
    }
</style>
{% endblock %}

{% block content %}
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main" xmlns="http://www.w3.org/1999/html">
    <div class="main-grids">

        {% if userSearch.count == 0 and videoSearch.count == 0 %}
        <h3> No results found for <strong> <i> {{ results }}</i> </strong>. </h3>

        {% else %}

        <h3> Search Results for: <strong>{{results }}</strong></h3>
        {% if userSearch.count == 0 %}
        {% else %}
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
            {% for userSearch in userSearch.get %}
            <tr class="info">
                <td>{{ numb }}</td>
                <td>{{ userSearch.firstname }}</td>
                <td>{{ userSearch.lastname }}</td>
                <td>
                    <a href = "{{ urlFor('videos', { username: userSearch.username }) }}">
                        {{ userSearch.username }}
                    </a>
                </td>
            </tr>
            {% set numb = numb + 1 %}
            {% endfor %}
            </tbody>
        </table>
            </div>
        </div>
        {% endif %}

        <div class="row">


            {% for videoSearch in videoSearch.get %}
            <div class="col-md-2 resent-grid recommended-grid sports-recommended-grid">
                <div class="resent-grid-img recommended-grid-img">
                    <a href="{{ urlFor('individual', { video_id : videoSearch.video_id } )}}">
                        <video>
                            <source src="/{{ videoSearch.path }}" type="video/mp4"/>
                        </video>
                    </a>
                </div>
                <div class="resent-grid-info recommended-grid-info">
                    <h5><a href="{{ urlFor('individual', { video_id : videoSearch.video_id } )}}" class="title">{{ videoSearch.name }}</a></h5>
                </div>
            </div>
            {% endfor %}


        </div>
        {% endif %}
    </div>
    {% include 'templates/partials/footer.php' %}
</div>
{% endblock%}





