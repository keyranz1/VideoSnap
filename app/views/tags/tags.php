

{% extends 'templates/default.php' %}

{% block title %}  {% endblock %}
{% block style %}

{% endblock %}

{% block content %}
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <div class="main-grids">
        <div class="recommended">
            <div class="recommended-grids english-grid">
                <div class="recommended-info">
                    <div class="heading">
                        <h3>{{ type }}</h3>
                    </div>
                    <div class="clearfix"> </div>
                </div>
                {% for tag in tag.get %}
                <div class="col-md-2 resent-grid recommended-grid sports-recommended-grid">
                    <div class="resent-grid-img recommended-grid-img">
                        <a href="{{ urlFor('individual', { video_id : tag.video_id } )}}">
                            <video>
                                <source src="/{{ tag.path }}" type="video/mp4"/>
                            </video>
                        </a>
                    </div>
                    <div class="resent-grid-info recommended-grid-info">
                        <h5><a href="{{ urlFor('individual', { video_id : tag.video_id } )}}" class="title">{{ tag.name }}</a></h5>
                    </div>
                </div>
                {% endfor %}
                <div class="clearfix"> </div>
            </div>
        </div>
        <div class="clearfix"> </div>
    </div>

    {% include 'templates/partials/footer.php' %}
    <div class="clearfix"> </div>
</div>


{% endblock%}
