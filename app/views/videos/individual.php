{% extends 'templates/default.php' %}

{% block style %}
    <style>
        .media-body p{
            float:left;
        }
        .media-body .del{
            position:relative;
            right:0;
            top:0;
            display:inline-block;
            float:right;
        }
        .media-body.del button span:hover{
            color:red;
        }
    </style>
{% endblock %}
{% block content %}
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <div class="show-top-grids">
        <div class="col-sm-8 single-left">
            <div class="col-sm-8 song">
                <div class="video-grid">
                    <video controls class="ind-vid">
                        <source src="/{{ everything.currentPath }}" allowfullscreen typeof="video/mp4">
                    </video>
                </div>
            </div>
            <div class="clearfix"> </div>
            <div class="published">
                <script>
                                                $(document).ready(function () {
                                                    size_li = $("#myList li").size();
                                                    x=1;
                                                    $('#myList li:lt('+x+')').show();
                                                    $('#loadMore').click(function () {
                                                        x= (x+1 <= size_li) ? x+1 : size_li;
                                                        $('#myList li:lt('+x+')').show();
                                                    });
                                                    $('#showLess').click(function () {
                                                        x=(x-1<0) ? 1 : x-1;
                                                        $('#myList li').not(':lt('+x+')').hide();
                                                    });
                                                });
                                            </script>
                <div class="load_more">
                    <ul id="myList">
                        <li>
                            <h3>{{ everything.currentName }}</h3>

                            <p>{{ everything.details }}</p>

                            <h4>Published by:<a href="{{ urlFor('videos', { username : everything.username } ) }}" <strong> {{ everything.username }}</strong> </a></h4>
                            <h4>Uploaded On: <strong> {{ everything.created_at }}</strong></h4>
                            <h5><strong>Category</strong><span style="margin-left:10px"></span>{% if everything.funny %}<a href="{{ urlFor('tags', { name: 'funny' }) }}">Funny</a>{% endif %}{% if everything.educational %} <a href="{{ urlFor('tags', { name: 'educational' }) }}">Educational</a>{% endif %}{% if everything.sports %} <a href="{{ urlFor('tags', { name: 'sports' }) }}">Sports</a>{% endif %}{% if everything.others %} <a href="{{ urlFor('tags', { name: 'others' }) }}">Others</a>{% endif %}.</h5>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="all-comments">
                <div class="all-comments-info">
                    <a href="#">Comments * <span class="badge">{% if  com.count  == 0 %}No comments{% else %} {{ com.count }} {% endif %}</span></a>

                    <div class="box">
                        {% if auth %}
                        <form action="{{ urlFor('individual.post', { video_id : everything.currentId }) }}" method="post" placeholder ="Comment here" autocomplete="off">
                            <textarea name="comments" id="comments" placeholder="Comment here.." required=" "></textarea>
                            <input type="submit" value="Comment">
                            <input type ="hidden" name="{{ csrf_key}}" value="{{ csrf_token }}">
                            <div class="clearfix"> </div>
                        </form>
                        {% else %}
                        <h3> You have to be logged in.. </h3>
                        <script>

                            notify({
                                title:"Oops",
                                message: "Sorry need to be logged in.",
                                type: "danger"

                            });
                        </script>
                        {% endif %}

                    </div>
                    <hr/>
                </div>
                {% for com in com %}
                <div class="media-grids">
                    <div class="media">
                        <h5>{{ com.username }}</h5>
                        <div class="media-left">
                            <a href="#">

                            </a>
                        </div>
                        <div class="media-body">
                            <p style="margin-top:20px;">{{ com.comments }}</p>
                           {% if auth.isAdmin or auth.id == com.users_id %}
                            {% if auth.isAdmin %}
                            <div class="del">
                              <a href="{{ urlFor('deletecomment', { id: com.id } ) }}">  <button   class="btn-default" data-toggle="tooltip" data-placement="left" title="Delete" style="padding:0.5px; border:none;"><span class="glyphicon glyphicon-remove" style="color:red" ></span></button></a>
                            </div>
                            {% elseif auth.id == com.users_id %}
                            <div class="del">
                              <a href="{{ urlFor('deletecommentifuser', { id: com.id } ) }}"> <button   class="btn-default" data-toggle="tooltip" data-placement="left" title="Delete" style="padding:0.5px; border:none;"><span class="glyphicon glyphicon-remove" style="color:red" ></span></button></a>
                            </div>
                            {% endif %}
                            {% endif %}


                        </div>
                    </div>
                </div>
                {% endfor %}
            </div>
        </div>

        <div class="col-md-4 single-right">

            <h3>Something Similar</h3>

            <div class="single-grid-right">

                {% for all in all.get %}
                {% if everything.funny == all.funny or everything.educational == all.educational or everything.sports == all.sports %}
                {% if all.funny == 1 or all.educational == 1 or all.sports == 1 %}

                {% if all.funny == null and all.educational == null and all.sports == null %}

                {% else %}
                <div class="single-right-grids">
                    <div class="col-md-4 single-right-grid-left">
                        <a href="{{ urlFor ('individual', { video_id :all.video_id } ) }}">
                            <video  class="ind-vid" style="max-width:100px; max-height:60px; object-fit: fill;">
                                <source src="/{{ all.path }}" />
                            </video>
                        </a>
                    </div>
                    <div class="col-md-8 single-right-grid-right">
                        <a href="#" class="title">{{ all.name }}</a>
                        <p class="author">{% if all.funny %}<a href="{{ urlFor('tags', { name: 'funny' }) }}">Fun</a>{% endif %}{% if all.educational %} <a href="{{ urlFor('tags', { name: 'educational' }) }}">Edu</a>{% endif %}{% if all.sports %} <a href="{{ urlFor('tags', { name: 'sports' }) }}">Spo</a>{% endif %}.</h5></p>
                    </div>
                    <div class="clearfix"> </div>
                </div>
                {% endif %}
                {% endif %}

                {% endif %}
               {% endfor %}
            </div>
        </div>
        <div class="clearfix"> </div>
    </div>
    {% include 'templates/partials/footer.php' %}
</div>
<div class="clearfix"> </div>


<!---<div class="content" style="" align="center">
    <h1 style="color:red"> {{ everything.currentName }} </h1>

    <div class="container-fluid" style="margin: 20px;padding:0;">
        <div class="row">


            <div class="center col-md-4">
                <video height="320" width="320" controls>
                    <source src="/{{ everything.currentPath }}" type="video/mp4" />

                </video>

            </div>

        </div>
        {% for com in com %}
      <div style="color:red position: relative;
width: 200px;
height: 100px;
text-align: center;
line-height: 100px;
background-color: #fff;
border: 8px solid #666;
-webkit-border-radius: 30px;
-moz-border-radius: 30px;
border-radius: 30px;
-webkit-box-shadow: 2px 2px 4px #888;
-moz-box-shadow: 2px 2px 4px #888;
box-shadow: 2px 2px 4px #888;">
         {{ com.comments }}

      </div>
        {{ com.created_at }}
        {{ com.username }}

        {% endfor %}

        <br>

        {% if auth %}


        <form action="{{ urlFor('individual.post', { name: everything.currentName }) }}" method="post" placeholder ="Comment here" autocomplete="off">
            <div>
            <textarea name="comments" id="comments" style="font-family:sans-serif;font-size:1.2em;">
Post your comments here!!!
            </textarea>
            </div>
            <input type="submit" value="Submit">
            <input type ="hidden" name="{{ csrf_key}}" value="{{ csrf_token }}">

        </form>

        {% else %}

        <h1> You should be logged in to comment. </h1>

        {% endif %}

    </div>


</div>--->
{% endblock %}
