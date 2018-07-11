{% extends 'templates/default.php' %}

{% block title %} Update Profile {% endblock %}

{% block content %}



<div class="container" style="bottom:-35px;" >
    <div class="row" style="padding:5px;">

        <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3" id="form" style="padding:15px; border: 2px solid rgba(241, 241, 241,241); border-radius:5px;">
            <form  action="{{ urlFor('account.post') }}" method ="post" autocomplete="off">
                <div class="well well-sm"><strong>*Required Field</strong></div>

                <div class="form-group">
                    <label class="col-sm-4" >*First Name</label>
                    <div class="col-sm-8" style="margin-bottom:10px;" >
                        <input type="text" class="form-control input-sm" name="firstname"  placeholder="Enter Name" required>
                    </div><div class="space"></div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4" >*Last Name</label>
                    <div class="col-sm-8" style="margin-bottom:10px;">
                        <input type="text" class="form-control input-sm" name="lastname" placeholder="Enter Name" required>
                    </div><div class="space"></div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4">*Enter Email</label>
                    <div class="col-sm-8" style="margin-bottom:10px;">
                        <input type="email" class="form-control input-sm" name="email" placeholder="Enter Email" required>
                    </div><div class="space"></div>
                </div>



                <div class="text-center">
                    <input type="submit" value="Register" class="btn btn-primary pull-center">
                </div>
                <input type ="hidden" name="{{ csrf_key}}" value="{{ csrf_token }}">

            </form>
        </div>

    </div>
</div>
<div id="footer">
    <div class="container text-center" style="width:100%; border: 2px solid rgba(241, 241, 241,241);background-color:#F9F9F9;">
        <h4>Project VideoSnap @ CMPS 285, 2016 <a href="{{ urlFor('about') }}"><b><font color="black">About</font></b></a></h4>

    </div>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="js/bootstrap.js"></script>


{% endblock %}