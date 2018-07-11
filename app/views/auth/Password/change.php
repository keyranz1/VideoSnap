{% extends 'templates/default.php' %}

{% block title %} Change password {% endblock %}

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

        <div id="small-dialog" class="dialog-change">
            <h3>Change Password</h3><hr/>
            <div class="signup">

                <form action="{{ urlFor ('passwordChangePost') }}" method ="post" autocomplete="off">
                    <input type="password" name="previouspassword"  id="previouspassword" placeholder="Previous Password" required="required" pattern=".{6,}" title="Minimum 6 characters required" autocomplete="off" />

                    <input type="password" name ="password" id="password" placeholder="New Password" required="required" pattern=".{6,}" title="Minimum 6 characters required" autocomplete="off" />

                    <input type="password" name="ConfirmPassword" id="ConfirmPassword" placeholder="Confirm Password" required="required" pattern=".{6,}" title="Minimum 6 characters required" autocomplete="off" />
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











