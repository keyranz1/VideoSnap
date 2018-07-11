{% extends 'templates/default.php' %}

{% block title %} Password Recover {% endblock %}

{% block content %}


<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main" style="background-color:deepskyblue;">
    <div class="main-grids" style="margin:10em 0 10em 0;">

<div class="container" style="bottom:-35px;" >
    <div class="row" style="padding:5px;">

        <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3" id="form" style="padding:15px; border: 2px solid rgba(241, 241, 241,241); border-radius:5px;">
            <form  action="{{ urlFor('about.post') }}" method ="post" autocomplete="off">
                <div class="well well-sm"><strong>Thank you all for attending !! <BR> We greatly appreciate your questions and suggestions !! <br> <BR>
                        <span > Team Video Snap.</span>           </strong></div>

                <div class="text-center">
                    <input type="submit" value="Back to home" class="btn btn-primary pull-center">
                </div>


                <input type ="hidden" name="{{ csrf_key}}" value="{{ csrf_token }}">

            </form>
        </div>

    </div>
</div>

    </div>
    {% include 'templates/partials/footer.php' %}
</div>
{% endblock %}