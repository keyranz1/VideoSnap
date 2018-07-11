{% extends 'templates/default.php' %}
{% block content %}
{% if everything.count == 0 %}
{% else %}
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <!--video content--->
    <div class="main-grids">
        <div class="recommended">
            <div class="recommended-grids english-grid">
                <div class="recommended-info">
                    <div class="heading">
                        <h3>Trending</h3>
                    </div>
                    <div class="heading-right">
                        <a  href="{{ urlFor('tags', { name: 'all' }) }}" class="">Load more..</a>
                    </div>
                    <div class="clearfix"> </div>
                </div>

                <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                    <!-- Indicators -->

                    <!-- Wrapper for slides -->
                    <div class="carousel-inner" role="listbox">
                        {% set num = 0 %}


                        <div class="item active">
                            <!--this makes rows-->
                            {% for everything in everything.get %}
                                    {% if num <6 %}
                                    <div class="col-md-2 resent-grid recommended-grid sports-recommended-grid" id="whole-box">
                                        <div class="resent-grid-img recommended-grid-img">
                                            <a href="{{ urlFor ('individual', { video_id :everything.video_id } ) }} "><video ><source  src="/{{everything.path }}" /></video></a>

                                        </div>
                                        <div class="resent-grid-info recommended-grid-info">
                                            <h5><a href="#" class="title">{{ everything.name }}</a></h5>
                                            <p class="author">Views: {{ everything.views }}</p>

                                            <p class="author"><a href="{{ urlFor('videos',{ username: everything.username }) }} " class="author">{{ everything.username }}</a></p>
                                        </div>
                                    </div>
                                    {% set num = num + 1 %}
                                    {% endif %}
                            {% endfor %}

                            <div class="carousel-caption">

                            </div>
                            <div class="clearfix"> </div>
                        </div>
                        <div class="item">
                            <!--                            this makes rows-->
                            {% set num = 0 %}
                            {% for everything in everything.get %}

                            {% if num <12 and num > 5%}

                            <div class="col-md-2 resent-grid recommended-grid sports-recommended-grid">
                                <div class="resent-grid-img recommended-grid-img">
                                    <a href="{{ urlFor ('individual', { video_id :everything.video_id } ) }} "><video ><source  src="/{{everything.path }}" /></video></a>

                                </div>
                                <div class="resent-grid-info recommended-grid-info">
                                    <h5><a href="#" class="title">{{ everything.name }}</a></h5>
                                    <p class="author">Views: {{ everything.views }}</p>

                                    <p class="author"><a href="#" class="author">{{ everything.username }}</a></p>
                                </div>
                            </div>

                            {% endif %}
                            {% set num = num + 1 %}
                            {% endfor %}
                            <div class="carousel-caption">

                            </div>
                            <div class="clearfix"> </div>
                        </div>


                        <!-- Controls -->
                        <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="recommended">
            <div class="recommended-grids english-grid">
                <div class="recommended-info">
                    <div class="heading">
                        <h3>Sports</h3>
                    </div>
                    <div class="heading-right">
                        <a  href="{{ urlFor('tags', { name: 'sports' }) }}" class="">Load more..</a>
                    </div>
                    <div class="clearfix"> </div>
                </div>

                <div id="carousel-example-generic1" class="carousel slide" data-ride="carousel">
                    <!-- Indicators -->

                    <!-- Wrapper for slides -->
                    <div class="carousel-inner" role="listbox">
                        {% set num = 0 %}


                        <div class="item active">
                            <!--                            this makes rows-->

                            {% for everything in everything.get %}
                            {% if everything.sports %}
                            {% if num < 6 %}
                            <div class="col-md-2 resent-grid recommended-grid sports-recommended-grid">
                                <div class="resent-grid-img recommended-grid-img">
                                    <a href="{{ urlFor ('individual', { video_id :everything.video_id } ) }} "><video ><source  src="/{{everything.path }}" /></video></a>

                                </div>
                                <div class="resent-grid-info recommended-grid-info">
                                    <h5><a href="#" class="title">{{ everything.name }}</a></h5>
                                    <p class="author">Views: {{ everything.views }}</p>

                                    <p class="author"><a href="{{ urlFor('videos',{ username: everything.username }) }} " class="author">{{ everything.username }}</a></p>
                                </div>
                            </div>
                            {% set num = num + 1 %}
                            {% endif %}
                            {% endif %}
                            {% endfor %}

                            <div class="carousel-caption">

                            </div>
                            <div class="clearfix"> </div>
                        </div>
                        <div class="item">

                            <!--                            this makes rows-->
                            {% set num = 0 %}
                            {% for everything in everything.get %}
                            {% if everything.sports %}

                            {% if num <12 and num > 5%}

                            <div class="col-md-2 resent-grid recommended-grid sports-recommended-grid">
                                <div class="resent-grid-img recommended-grid-img">
                                    <a href="{{ urlFor ('individual', { video_id :everything.video_id } ) }} "><video ><source  src="/{{everything.path }}" /></video></a>
                                    <div class="time small-time sports-tome">
                                        <p>2:85</p>
                                    </div>
                                    <div class="clck sports-clock">
                                        <span class="glyphicon glyphicon-time" aria-hidden="true"></span>
                                    </div>
                                </div>
                                <div class="resent-grid-info recommended-grid-info">
                                    <h5><a href="#" class="title">{{ everything.name }}</a></h5>
                                    <p class="author">Views: {{ everything.views }}</p>

                                    <p class="author"><a href="#" class="author">{{ everything.username }}</a></p>
                                </div>
                            </div>

                            {% endif %}
                            {% set num = num + 1 %}
                            {% endif %}
                            {% endfor %}
                            <div class="carousel-caption">

                            </div>
                            <div class="clearfix"> </div>
                        </div>


                        <!-- Controls -->
                        <a class="left carousel-control" href="#carousel-example-generic1" role="button" data-slide="prev">
                            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="right carousel-control" href="#carousel-example-generic1" role="button" data-slide="next">
                            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="recommended">
            <div class="recommended-grids english-grid">
                <div class="recommended-info">
                    <div class="heading">
                        <h3>Educational</h3>
                    </div>
                    <div class="heading-right">
                        <a  href="{{ urlFor('tags', { name: 'educational' }) }}" class="">Load more..</a>
                    </div>
                    <div class="clearfix"> </div>
                </div>

                <div id="carousel-example-generic2" class="carousel slide" data-ride="carousel">
                    <!-- Indicators -->

                    <!-- Wrapper for slides -->
                    <div class="carousel-inner" role="listbox">
                        {% set num = 0 %}


                        <div class="item active">
                            <!--                            this makes rows-->

                            {% for everything in everything.get %}
                            {% if everything.educational %}
                            {% if num <6 %}
                            <div class="col-md-2 resent-grid recommended-grid sports-recommended-grid">
                                <div class="resent-grid-img recommended-grid-img">
                                    <a href="{{ urlFor ('individual', { video_id :everything.video_id } ) }} "><video ><source  src="/{{everything.path }}" /></video></a>

                                </div>
                                <div class="resent-grid-info recommended-grid-info">
                                    <h5><a href="#" class="title">{{ everything.name }}</a></h5>
                                    <p class="author">Views: {{ everything.views }}</p>

                                    <p class="author"><a href="{{ urlFor('videos',{ username: everything.username }) }} " class="author">{{ everything.username }}</a></p>
                                </div>
                            </div>
                            {% set num = num + 1 %}
                            {% endif %}
                            {% endif %}
                            {% endfor %}

                            <div class="carousel-caption">

                            </div>
                            <div class="clearfix"> </div>
                        </div>
                        <div class="item">

                            <!--                            this makes rows-->
                            {% set num = 0 %}
                            {% for everything in everything.get %}
                            {% if everything.educational %}

                            {% if num <12 and num > 5 %}

                            <div class="col-md-2 resent-grid recommended-grid sports-recommended-grid">
                                <div class="resent-grid-img recommended-grid-img">
                                    <a href="{{ urlFor ('individual', { video_id :everything.video_id } ) }} "><video ><source  src="/{{everything.path }}" /></video></a>

                                </div>
                                <div class="resent-grid-info recommended-grid-info">
                                    <h5><a href="#" class="title">{{ everything.name }}</a></h5>
                                    <p class="author">Views: {{ everything.views }}</p>

                                    <p class="author"><a href="#" class="author">{{ everything.username }}</a></p>
                                </div>
                            </div>

                            {% endif %}
                            {% set num = num + 1 %}
                            {% endif %}
                            {% endfor %}
                            <div class="carousel-caption">

                            </div>
                            <div class="clearfix"> </div>
                        </div>


                        <!-- Controls -->
                        <a class="left carousel-control" href="#carousel-example-generic2" role="button" data-slide="prev">
                            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="right carousel-control" href="#carousel-example-generic2" role="button" data-slide="next">
                            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="recommended">
            <div class="recommended-grids english-grid">
                <div class="recommended-info">
                    <div class="heading">
                        <h3>Funny</h3>
                    </div>
                    <div class="heading-right">
                        <a  href="{{ urlFor('tags', { name: 'funny' }) }}" class="">Load more..</a>
                    </div>
                    <div class="clearfix"> </div>
                </div>

                <div id="carousel-example-generic3" class="carousel slide" data-ride="carousel">
                    <!-- Indicators -->

                    <!-- Wrapper for slides -->
                    <div class="carousel-inner" role="listbox">
                        {% set num = 0 %}


                        <div class="item active">
                            <!--                            this makes rows-->

                            {% for everything in everything.get %}
                            {% if everything.funny %}
                            {% if num <6 %}
                            <div class="col-md-2 resent-grid recommended-grid sports-recommended-grid">
                                <div class="resent-grid-img recommended-grid-img">
                                    <a href="{{ urlFor ('individual', { video_id :everything.video_id } ) }} "><video ><source  src="/{{everything.path }}" /></video></a>

                                </div>
                                <div class="resent-grid-info recommended-grid-info">
                                    <h5><a href="#" class="title">{{ everything.name }}</a></h5>
                                    <p class="author">Views: {{ everything.views }}</p>

                                    <p class="author"><a href="{{ urlFor('videos',{ username: everything.username }) }} " class="author">{{ everything.username }}</a></p>
                                </div>
                            </div>
                            {% set num = num + 1 %}
                            {% endif %}
                            {% endif %}
                            {% endfor %}

                            <div class="carousel-caption">

                            </div>
                            <div class="clearfix"> </div>
                        </div>
                        <div class="item">

                            <!--                            this makes rows-->
                            {% set num = 0 %}
                            {% for everything in everything.get %}
                            {% if everything.funny %}

                            {% if num <12 and num > 5 %}

                            <div class="col-md-2 resent-grid recommended-grid sports-recommended-grid">
                                <div class="resent-grid-img recommended-grid-img">
                                    <a href="{{ urlFor ('individual', { video_id :everything.video_id } ) }} "><video ><source  src="/{{everything.path }}" /></video></a>

                                </div>
                                <div class="resent-grid-info recommended-grid-info">
                                    <h5><a href="#" class="title">{{ everything.name }}</a></h5>
                                    <p class="author">Views: {{ everything.views }}</p>

                                    <p class="author"><a href="#" class="author">{{ everything.username }}</a></p>
                                </div>
                            </div>

                            {% endif %}
                            {% set num = num + 1 %}
                            {% endif %}
                            {% endfor %}
                            <div class="carousel-caption">

                            </div>
                            <div class="clearfix"> </div>
                        </div>


                        <!-- Controls -->
                        <a class="left carousel-control" href="#carousel-example-generic3" role="button" data-slide="prev">
                            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="right carousel-control" href="#carousel-example-generic3" role="button" data-slide="next">
                            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>


        <div class="recommended">
            <div class="recommended-grids english-grid">
                <div class="recommended-info">
                    <div class="heading">
                        <h3>Others</h3>
                    </div>
                    <div class="heading-right">
                        <a  href="{{ urlFor('tags', { name: 'others' }) }}" class="">Load more..</a>
                    </div>
                    <div class="clearfix"> </div>
                </div>

                <div id="carousel-example-generic3" class="carousel slide" data-ride="carousel">
                    <!-- Indicators -->

                    <!-- Wrapper for slides -->
                    <div class="carousel-inner" role="listbox">
                        {% set num = 0 %}


                        <div class="item active">
                            <!--                            this makes rows-->

                            {% for everything in everything.get %}
                            {% if everything.others %}
                            {% if num <6 %}
                            <div class="col-md-2 resent-grid recommended-grid sports-recommended-grid">
                                <div class="resent-grid-img recommended-grid-img">
                                    <a href="{{ urlFor ('individual', { video_id :everything.video_id } ) }} "><video ><source  src="/{{everything.path }}" /></video></a>

                                </div>
                                <div class="resent-grid-info recommended-grid-info">
                                    <h5><a href="#" class="title">{{ everything.name }}</a></h5>
                                    <p class="author">Views: {{ everything.views }}</p>
                                    <p class="author"><a href="{{ urlFor('videos',{ username: everything.username }) }} " class="author">{{ everything.username }}</a></p>
                                </div>
                            </div>
                            {% set num = num + 1 %}
                            {% endif %}
                            {% endif %}
                            {% endfor %}

                            <div class="carousel-caption">

                            </div>
                            <div class="clearfix"> </div>
                        </div>
                        <div class="item">

                            <!--                            this makes rows-->
                            {% set num = 0 %}
                            {% for everything in everything.get %}
                            {% if everything.others %}

                            {% if num <12 and num > 5 %}

                            <div class="col-md-2 resent-grid recommended-grid sports-recommended-grid">
                                <div class="resent-grid-img recommended-grid-img">
                                    <a href="{{ urlFor ('individual', { video_id :everything.video_id } ) }} "><video ><source  src="/{{everything.path }}" /></video></a>

                                </div>
                                <div class="resent-grid-info recommended-grid-info">
                                    <h5><a href="#" class="title">{{ everything.name }}</a></h5>
                                    <p class="author">Views: {{ everything.views }}</p>

                                    <p class="author"><a href="#" class="author">{{ everything.username }}</a></p>
                                </div>
                            </div>

                            {% endif %}
                            {% set num = num + 1 %}
                            {% endif %}
                            {% endfor %}
                            <div class="carousel-caption">

                            </div>
                            <div class="clearfix"> </div>
                        </div>


                        <!-- Controls -->
                        <a class="left carousel-control" href="#carousel-example-generic3" role="button" data-slide="prev">
                            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="right carousel-control" href="#carousel-example-generic3" role="button" data-slide="next">
                            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>


        <!--video content ends here--->


    </div>

    <!-- footer -->
    {% include 'templates/partials/footer.php' %}

    <!-- //footer end-->
</div><!--- page end--->

<div class="clearfix"> </div>


























<!--    <div class="container-fluid" style="margin: 20px;padding:0;">-->
<!--        {% for everything in everything.get %}-->
<!---->
<!--    <a href="{{ urlFor('individual', { name : everything.name } )}}" >-->
<!---->
<!---->
<!--        <div class="center col-md-4">-->
<!--            <video height="320" width="320" controls>-->
<!--                <source src="/{{ everything.path }}" type="video/mp4" />-->
<!---->
<!--            </video>-->
<!---->
<!--        </div>-->
<!---->
<!--        </a>-->
<!--    </div>-->
<!---->
<!--    {% endfor %}-->
<!--    </div>-->
{% endif %}
{% endblock %}
