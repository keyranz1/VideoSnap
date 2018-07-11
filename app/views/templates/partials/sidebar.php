<!--/*-->
<!--*-->
<!--* Created by PhpStorm.-->
<!--* User: kiran -->
<!--* Date: 4/28/2016 -->
<!--* Time: 2:32 AM -->
<!--*/-->
<!--- sidebar-nav --->

{% block style %}
<style>
    .copyright .abt:hover{
        color:deepskyblue;
    }
</style>
{% endblock %}

<div class="col-sm-3 col-md-2 sidebar primary">
    <div class="top-navigation">
        <div class="t-menu">MENU</div>
        <div class="t-img">
            <img src="{{ baseUrl() }}/resources/img/lines.png" alt="" />
        </div>
        <div class="clearfix"> </div>
    </div>
    <div class="drop-navigation drop-navigation">
        <ul class="nav nav-sidebar">
            {% if auth %}
            <li class="active"><a href="{{ urlFor('myvideos', { username: auth.username }) }}" class="home-icon"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>My Videos</a></li>
            {% else %}
            <li class="active"><a href="{{ urlFor('introduction') }}" class="home-icon"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
            {% endif %}
            <li><a href="{{ urlFor('tags', { name: 'funny' }) }}" class="user-icon"><span class="glyphicon glyphicon-home glyphicon-piggy-bank" aria-hidden="true"></span>Funny</a></li>
            <li><a href="{{ urlFor('tags', { name: 'educational' }) }}" class="sub-icon"><span class="glyphicon glyphicon-home glyphicon-education" aria-hidden="true"></span>Educational</a></li>
            <li><a href="{{ urlFor('tags', { name: 'sports' }) }}" class="song-icon"><span class="glyphicon glyphicon-home glyphicon-record" aria-hidden="true"></span>Sports</a></li>
            <li><a href="{{ urlFor('tags', { name: 'others' }) }}" class="news-icon"><span class="glyphicon glyphicon-home glyphicon-random" aria-hidden="true"></span>Other</a></li>
        </ul>
        <!-- script-for-menu-->
        <div class="side-bottom">
            <div class="side-bottom-icons">
                <ul class="nav2">
                    <li><a href="#" class="facebook primary"> </a></li>
                    <li><a href="#" class="facebook twitter primary"> </a></li>
                </ul>
            </div>
            <div class="copyright">
                <p>Copyright © 2016 CMPS 285 | Design by <strong><a class="abt" href="#">Vide<span><img src="{{ baseUrl() }}/resources/img/log.png" height="20" width="20" alt="" /></span>Snap Team</a></strong></p>
            </div>
        </div>
    </div>
</div>
<!---sidebar-nav end--->

{% block script %}

<script>
    jQuery( ".top-navigation" ).click(function() {
        $( ".drop-navigation" ).slideToggle( 300, function() {
            // Animation complete.
        });
    });
</script>

{% endblock %}


