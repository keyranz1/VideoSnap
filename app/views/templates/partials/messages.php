        {%  if flash.global %}
        <script>
                Notify({
                    title : "Awesome!",
                    message: "<strong>You are logged in.</strong>",
                    type: "success",
                    length: "short"
                });
        </script>
        {% endif %}

        {%  if flash.ErrorRegistering %}
        <script>
            Notify({
                title : "Error!, Couldn't register. ",
                message: "<strong>Please hit sign up to see errors.</strong>",
                type: "success",
                length: "short"
            });
        </script>
        {% endif %}
        {%  if flash.register %}
        <script>
            Notify({
                title : "Congrats",
                message: "<strong>Your Have Been <i style="color:darkgreen;">Registerd</i></strong>. Check your email.",
                type: "success",
                length: "short"
            });
        </script>
        {% endif %}

        {%  if flash.passwordchange %}
        <script>
            Notify({
                title : "Congrats",
                message: "<strong>Your password has been changed.</strong>",
                type: "success",
                length: "short"
            });
        </script>
        {% endif %}



        {%  if flash.activate %}
        <script>
            Notify({
                title : "Congrats",
                message: "<strong>Your Account Has Been <i style="color:darkgreen;">Activated.</i></strong>",
                type: "success",
                length: "short"
            });
        </script>
        {% endif %}

        {%  if flash.ContactUs %}
        <script>
            Notify({
                title : "Thank You.",
                message: "<strong>Your Request Has Been Submitted.</strong>",
                type: "success",
                length: "short"
            });
        </script>
        {% endif %}


        {%  if flash.upload %}
        <script>
            Notify({
                title : "Awesome!",
                message: "<strong>You have successfully uploaded a video.</strong>",
                type: "success",
                length: "short"
            });
        </script>
        {% endif %}
        {%  if flash.register %}
        <script>
            Notify({
                title : "Awesome!",
                message: "<strong>Please check your email.</strong>",
                type: "success",
                length: "short"
            });
        </script>
        {% endif %}


        {%  if flash.neutral %}
        <script>
            Notify({
                title : "Alert!",
                message: "<strong>You just logged out.</strong>",
                type: "warning",
                length: "short"
            });
        </script>
        {% endif %}

        {%  if flash.notSuccess %}
        <script>
                Notify({
                    title: "Ooops..",
                    message: "<Strong>I guess something is wrong with login info.<br/>Please try again.</strong>",
                    type: "danger",
                    length: "short"
                });
        </script>
        {% endif %}


