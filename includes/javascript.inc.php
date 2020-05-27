<script src="js/vendor/modernizr-3.8.0.min.js"></script>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
    integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
    integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
</script>
<script src="js/plugins.js"></script>
<script src="js/main.js"></script>

<!-- Google Analytics: change UA-XXXXX-Y to be your site's ID. -->
<script>
    window.ga = function() {
        ga.q.push(arguments);
    };
    ga.q = [];
    ga.l = +new Date;
    ga('create', 'UA-XXXXX-Y', 'auto');
    ga('set', 'transport', 'beacon');
    ga('send', 'pageview');
</script>
<script src="https://www.google-analytics.com/analytics.js" async></script>

<!-- Validation en couleur côté client du formulaire -->
<script>
    /*
    Pris sur la documentation de Bootstrap : https://getbootstrap.com/docs/4.4/components/forms/?#validation
    Utilisé pour ajouté des couleurs et des message d'erreurs lorsque le formulaire est mal rempli.
    */
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function() {
        "use strict";
        window.addEventListener(
            "load",
            function() {
                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                var forms = document.getElementsByClassName("needs-validation");
                // Loop over them and prevent submission
                var validation = Array.prototype.filter.call(forms, function(form) {
                    form.addEventListener(
                        "submit",
                        function(event) {
                            if (form.checkValidity() === false) {
                                event.preventDefault();
                                event.stopPropagation();
                            }
                            form.classList.add("was-validated");
                        },
                        false,
                    );
                });
            },
            false,
        );
    })();

    $(function() {
        $('[data-toggle="popover"]').popover()
    })
</script>

<!-- Script de validation de la confirmation du mot de passe | Bootstrap-->
<script>
    function verifyPasswords() {
        let password = document.getElementById("password");
        let passwordConfirm = document.getElementById("passwordConfirm");
        let message = document.getElementById("passwordConfirmation-message");

        if (password.value == passwordConfirm.value) {
            return true;
        } else {
            // Change la couleur en rouge et affiche un message d'erreur différent de celui de base.
            passwordConfirm.setCustomValidity('Invalid');
            message.innerHTML = "Le mot de passe doit être le même."
            return false;
        }
    }
</script>