{% extends 'templates/default.php' %}

{% block title %} Reset {% endblock %}
{% block style %}
<style>
    .signup{
    padding: 1em 0 0 3em !important;
    }
</style>
{% endblock %}
{% block content %}


<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main" style="background-color:deepskyblue;">
    <div class="main-grids" style="margin:10em 0 10em 0;">

        <div id="small-dialog" class="">
            <h3>Reset Your Password</h3><hr/>
            <div class="signup">

                <form action="{{ urlFor('password.reset.post') }}?email={{ email}}&identifier={{ identifier|url_encode }}" method ="post" autocomplete="off">
                    <input type="password" name ="password" id="password" placeholder="New Password" required="required" pattern=".{6,}" title="Minimum 6 characters required" autocomplete="off" />
                    <input type="password" name="confirmpassword" id="confirmpassword" placeholder="Confirm Password" required="required" pattern=".{6,}" title="Minimum 6 characters required" autocomplete="off" />
                    <div class="text-center" style="width:90%; padding-bottom:10px;">
                        <input type="submit"  value="CHANGE"/>
                    </div>
                    <input type ="hidden" name="{{ csrf_key}}" value="{{ csrf_token }}">
                </form>


            </div>
            <div class="clearfix"> </div>
        </div>
        </div>
    {% include 'templates/partials/footer.php' %}
</div>

{% endblock %}