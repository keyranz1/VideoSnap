{% extends 'templates/default.php' %}

{% block title %} Password Recover {% endblock %}

{% block content %}



            <form  action="{{ urlFor('PasswordRecoverPost') }}" method ="post" autocomplete="off">
                <div class="well well-sm"><strong>*Required Field</strong></div>

                <div class="form-group">
                    <label class="col-sm-4" for="email">*Email</label>
                    <div class="col-sm-8" style="margin-bottom:10px;">
                        <input type="email" name="email" id="email" class="form-control input-sm" placeholder="Email">
                        {% if errors.has('previousPassword')%} {{ errors.first( 'previousPassword' )}} {% endif %}
                    </div><div class="space"></div>
                </div>

                <div class="text-center">
                    <input type="submit" value="Send Email" class="btn btn-primary pull-center">
                </div>
                <input type ="hidden" name="{{ csrf_key}}" value="{{ csrf_token }}">
            </form>



{% endblock %}