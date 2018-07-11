{% block style %}
<link href="{{ baseUrl() }}/resources/css/popuo-box.css" rel="stylesheet" type="text/css" media="all" />
<style>
.signin .dropdown-menu li a{
    background-color: #fff;
}
.signin .dropdown-menu li.li3 a span:hover{
   color:red;
}
.signin .dropdown-menu li.li2 a span:hover{
    color:saddlebrown;
}
.signin .dropdown-menu li.li1 a span:hover{
    color:blueviolet;
}
.signin .dropdown-menu li a:hover{
    background-color: #2aabd2;
}
.errormsg{
    border:0.1px grey;
    border-top:3px solid red;
    background-color:#F2DEDE;
    color:red;
    width:90%;
    border-radius:2px;
    height:auto;
    padding:0.5px 2px;
    text-align:center;
    font-size:1em;
}
.dropdown-menu-right{
    right:12px;
    left:auto;
    margin-top:15px;
}
</style>
{% endblock %}

<!---top-navbar--->
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ urlFor('introduction') }}"><h1><img src="{{ baseUrl() }}/resources/img/logo2.PNG" alt="" /></h1></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <div class="top-search">
                <form class="navbar-form navbar-right" role="search" method="post" autocomplete="off" action="{{ urlFor('search') }}">
                    <input type="text" name="search" id = "search" class="form-control" placeholder="Search">
                    <input type="submit" value=" ">
                    <input type ="hidden" name="{{ csrf_key}}" value="{{ csrf_token }}">
                </form>
            </div>
            <div class="header-top-right">
                <!---if authorised should show on navbar--->
                {% if auth %}
                <div class="file">
                    <a href="{{ urlFor('upload') }}"><span class="glyphicon glyphicon-open" style="margin-right:5px;color:blue; font-size:15px;"></span>Upload</a>
                </div>
                <div class="signin btn-group" style="width:150px;">
                    <a href="" type="button" class="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" ><span class="glyphicon glyphicon-user"> </span>   {{ auth.firstname }}  <span class="caret"></span></a>
                    <ul class="dropdown-menu dropdown-menu-right">
                        <li class="li1"><a href = "{{ urlFor('videos', { username: auth.username }) }}"><span class="glyphicon glyphicon-facetime-video" style="margin-right:5px;"></span>  My Videos</a></li>
                        <li class="li2"><a href="{{ urlFor('passwordChange') }}"><span class="glyphicon glyphicon-wrench" style="margin-right:5px;"></span>  Account Settings</a></li>
                        {% if auth.isAdmin %}
                        <li class="li2"><a href="{{ urlFor('admin') }}"><span class="glyphicon glyphicon-cog" style="font-size: 1em; color: black;margin-right:5px;"></span>  Administrator</a></li>
                        {% endif %}
                        <li role="separator" class="divider"></li>
                        <li class="li3"><a href="{{ urlFor('logout') }}"><span class="glyphicon glyphicon-off" style="margin-right:5px;"></span>  Log out</a></li>
                    </ul>
                </div>

                {% else %}
                <div class="file">
                    <a href="#small-dialog10" class="play-icon popup-with-zoom-anim">Upload</a>
                    <div id="small-dialog10" class="mfp-hide">
                        <h3>Login</h3><hr/>
                        <div class="signup">
                            <div class="errormsg">
                                <h2 style="margin-top:-5px;">Sorry :(</h2>
                                <p>You need to be logged in to upload file.</p>
                            </div>
                            <form role="form" method="post" action="{{ urlFor('login.post') }}" accept-charset="UTF-8" id="login-nav">
                                <input type="text" class="email" name ="identifier" id="identifier" placeholder="Enter Username" required="required" />
                                <input type="password" name ="password" id="password" placeholder="Password" required="required" pattern=".{6,}" title="Minimum 6 characters required" autocomplete="off" />
                                <div class="text-center" style="width:90%; padding-bottom:10px;">
                                    <input type="submit"  value="LOGIN"/>
                                </div>
                                <input type ="hidden" name="{{ csrf_key}}" value="{{ csrf_token }}">
                            </form>
                            <div class="forgot text-center" style="width:90%; padding:5px; border-bottom:1px solid lightgrey;">
                                <a href="#small-dialog8" class="play-icon popup-with-zoom-anim">Forgot password ?</a>
                                <!----recover Password--->
                                <div id="small-dialog8" class="mfp-hide">
                                    <h3>Reset Your Password</h3>
                                    <h5 class="text-center text-warning">To reset your password, just enter the email address you use to log into your VideoSnap account.</h5>
                                    <div class="signup subscribe-grid">
                                        <form action="{{ urlFor('PasswordRecoverPost') }}" method ="post" autocomplete="off">
                                            <input type="text" name="email" id="email" class="email" placeholder="Email" required="required" pattern="([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?" title="Enter a valid email"/>
                                            {% if errors.has('previousPassword')%} {{ errors.first( 'previousPassword' )}} {% endif %}
                                            <input type="submit" value="Send Email"/>
                                            <input type ="hidden" name="{{ csrf_key}}" value="{{ csrf_token }}">
                                        </form>
                                    </div>
                                </div>
                                <!--recoverpassword ends--->
                            </div>
                            <div class="button-bottom text-center" style="width:90%;margin-top:5px;">
                                <p>Do not have an account? <a href="#small-dialog3" class="play-icon popup-with-zoom-anim">Signup!</a></p>
                            </div>
                        </div>
                        <div class="clearfix"> </div>
                    </div>
                </div>

                <!---Sign up --->
                <div class="signin">
                    <a href="#small-dialog3" class="play-icon popup-with-zoom-anim">Sign Up</a>
                    <div id="small-dialog3" class="mfp-hide">
                        <h3>Create an Account</h3><hr/>
                        <div class="signup">
                            <form method ="post" action="{{ urlFor('register.post') }}" style="padding:10px;">
                                <input type="text" name="username" id="username" placeholder="Username" required="required" title="Minimum 5 characters required" autocomplete="off" />
                                {% if errors.first('username') %} { errors.first('username') } {% endif %}
                                <input type="text" name="firstname" id="firstname" placeholder="First name" required="required" autocomplete="off" />

                                <input type="text" name="lastname" id="lastname" placeholder="Last name" required="required" autocomplete="off" />

                                <input type="email" name="email" class="email" placeholder="Email" required="required" title="Enter a valid email"/>
                                {% if errors.first('email') %} { errors.first('email') } {% endif %}

                                <input type="password" name="password" id="password" placeholder="Password" required="required" pattern=".{6,}" title="Minimum 6 characters required" autocomplete="off" />
                                {% if errors.first('password') %} { errors.first('password') } {% endif %}

                                <input type="password" name="confirmpassword" id="confirmpassword" placeholder="Password" required="required" pattern=".{6,}" title="Minimum 6 characters required" autocomplete="off" />
                                {% if errors.first('confirmPassword') %} { errors.first('confirmPassword') } {% endif %}

                                <input type="hidden" name="{{ csrf_key }}" value="{{ csrf_token }}">
                                <div class="text-center" style="width:90%;">
                                    <input  type="submit"  value="Sign Up"/>
                                </div>

                                <div class="button-bottom text-center" style="width:90%;border-top:1px solid lightgrey;">
                                    <p>Already have an account? <a href="#small-dialog" class="play-icon popup-with-zoom-anim">Login</a></p>
                                </div>

                            </form>
                        </div>
                        <div class="clearfix"> </div>
                    </div>
                </div>

                <div class="signin">
                    <a href="#small-dialog" class="play-icon popup-with-zoom-anim">Sign In</a>
                    <div id="small-dialog" class="mfp-hide">
                        <h3>Login</h3><hr/>
                        <div class="signup">

                            <form role="form" method="post" action="{{ urlFor('login.post') }}" accept-charset="UTF-8" id="login-nav">
                                <input type="text" class="email" name ="identifier" id="identifier" placeholder="Enter Username" required="required" />
                                <input type="password" name ="password" id="password" placeholder="Password" required="required" pattern=".{6,}" title="Minimum 6 characters required" autocomplete="off" />
                                <div class="text-center">
                                    <input type="checkbox" name="remember" id="remember">Remember me
                                </div>
                                <div class="text-center" style="width:90%; padding-bottom:10px;">
                                    <input type="submit"  value="LOGIN"/>
                                </div>
                                <input type ="hidden" name="{{ csrf_key}}" value="{{ csrf_token }}">
                            </form>
                            <div class="forgot text-center" style="width:90%; padding:5px; border-bottom:1px solid lightgrey;">
                                <a href="#small-dialog8" class="play-icon popup-with-zoom-anim">Forgot password ?</a>
                                <!----recover Password--->

                                <!--recoverpassword ends--->
                            </div>
                            <div class="button-bottom text-center" style="width:90%;margin-top:5px;">
                                <p>Do not have an account? <a href="#small-dialog3" class="play-icon popup-with-zoom-anim">Signup!</a></p>
                            </div>

                        </div>
                        <div class="clearfix"> </div>
                    </div>
                </div>
                <div class="clearfix"> </div>
                {% endif %}
            </div>
            <div class="clearfix"> </div>
        </div>
        <div class="clearfix"> </div>
    </div>
</nav>


{% block script %}
<script>
    $(document).ready(function() {
        $('.popup-with-zoom-anim').magnificPopup({
            type: 'inline',
            fixedContentPos: true,
            fixedBgPos: true,
            overflowY: 'auto',
            closeBtnInside: true,
            preloader: false,
            midClick: true,
            removalDelay: 300,
            mainClass: 'my-mfp-zoom-in'
        });

    });
</script>
{% endblock %}