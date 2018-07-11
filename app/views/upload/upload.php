{% extends 'templates/default.php' %}

{% block title %} Upload Videos {% endblock %}
{% block style %}
<style>
    .square1{
        padding:3px;
        padding-bottom:3px !important;
        border:1px solid black;
        width:70%;
        margin-left:14%;
        height:60%;
        object-fit: fill;
        background-color:white;
        text-align:center;

    }
    .golo{

        display: inline-block;
        border-radius:50%;
        height:200px;
        width:200px;
        background-image: url("{{ baseUrl() }}/resources/img/upload.jpg");
        background-size: contain;
    }
    .charpate{
        padding:3px;
        margin-top: 1.5%;
        width:60%;
        display:inline-block;
        border-left: 1.5px solid grey;
    }
    .linematrai{
        display:inline-block;
    }
</style>
{% endblock %}

{% block content %}
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main" style="background-color:#2aabd2;">
   <div class="main-grids" style="background-color:#2aabd2;">
        <div class="square1">
            <div class="golo" style="object-fit: fill;">
            </div>
            <div class="linematrai"></div>
            <div class="charpate">
                <form method = "post" action="{{ urlFor('upload.post') }}" enctype="multipart/form-data">

                    <div class="form-group text-center" style="margin-bottom:5px;">
                        <label class="col-sm-4" for="exampleInputFile">Browse</label>
                        <div class="col-sm-8" style="margin-bottom:5px;">
                        <input type="file" value="Browse" id="video" name="video" accept="video/*" >
                        </div>
                        <label class="col-sm-4" >Name</label>
                        <div class="col-sm-8" style="margin-bottom:5px;">
                            <input type="text" class="form-control input-sm" id = "name" name="name" placeholder="Choose the name for your file.." required>
                        </div>
                        <div class="space"></div>
                        <label class="col-sm-4" >Description</label>
                        <div class="col-sm-8" style="margin-bottom:5px;">
                            <input type="text" height="50" class="form-control input-sm" id = "description" name="description" placeholder="Write something about video.." required>
                        </div>
                    </div>
                    <div><h5>Tag as..</h5></div>

                    <div class="row">
                        <div class="col-md-6 col-md-offset-3">

                            <input type="checkbox" name="funny" value="funny"> Funny <br>
                            <input type="checkbox" name="educational" value="educational"> Educational <br>
                            <input type="checkbox" name="sports" value="sports"> Sports <br>
                            <input type="checkbox" name="others" value="others"> Other <br>

                        </div>

                    </div>

                    <div class="text-center">
                        <input type="submit" value="Upload" class="btn btn-primary pull-center">
                    </div>

                    <input type ="hidden" name="{{ csrf_key}}" value="{{ csrf_token }}">
                </form>
            </div>
            <div class="clearfix"></div>
        </div>
   </div>
    {% include 'templates/partials/footer.php' %}
</div>
{% endblock %}

