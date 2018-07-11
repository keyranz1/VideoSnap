{% extends 'templates/default.php' %}
{% block content %}




<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main" style="background-color:deepskyblue;">
    <div class="main-grids" style="margin:10em 0 10em 0;">

        <div id="small-dialog" class="dialog-change">
            <h3>Send Us an Email</h3><hr/>
            <div class="signup">

                <form action="{{ urlFor('contactUs.post') }}" method="post">
                    {% if auth %}

                    {% else %}
                    <input type="email" name="email"  id="email" placeholder="Email" required="required" pattern=".{6,}" title="Minimum 6 characters required" autocomplete="off" />



                    {% endif %}
                    <input type="text" name="subject"  id="subject" placeholder="Subject" required="required" pattern=".{6,}" title="Minimum 6 characters required" autocomplete="off" />

                    <input type="text" name ="messages" id="messages" placeholder="Messages" required="required" pattern=".{6,}" title="Minimum 6 characters required" autocomplete="off" />
                    <div class="text-center" style="width:90%; padding-bottom:10px;">
                        <input type="submit"  value="Send Email"/>
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











