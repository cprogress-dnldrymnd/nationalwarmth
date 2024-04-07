<div class="offcanvas offcanvas-bottom background-secondary" tabindex="-1" id="footerForm" aria-labelledby="footerFormLabel">
    <div class="offcanvas-body">
        <div class="form-wrapper mx-auto">
            <div class="row align-items-center">
                <div class="col-lg-1">
                    <button type="button" class="footer-form-close" data-bs-dismiss="offcanvas" aria-label="Close">&#x2715;</button>
                </div>
                <div class="col-lg-6">
                    <div class="row g-3 align-items-center">
                        <div class="col-auto">
                            <img src="https://nationalwarmth.co.uk/wp-content/uploads/2024/04/OCPhoto.734182818.162821.jpeg" alt="">
                        </div>
                        <div class="col">
                            <h3 class="offcanvas-title" id="footerFormLabel">Get our <span class="underline">Energy Matters</span> magazine</h3>
                            <p>
                                Sign up to receive our <strong>FREE</strong> quarterly energy reduction advice magazine
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <?= do_shortcode('[contact-form-7 id="0987dbf" title="Footer Form"]') ?>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    var myOffcanvas = document.getElementById('footerForm')
    var bsOffcanvas = new bootstrap.Offcanvas(myOffcanvas)
    bsOffcanvas.show();
    jQuery(document).ready(function() {

        if (!getCookie('energy_matters_display')) {

            setCookie('energy_matters_display', 'false', 1);
        }
    });



    function setCookie(cname, cvalue, exdays) {
        const d = new Date();
        d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
        let expires = "expires=" + d.toUTCString();
        document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
    }

    function getCookie(cname) {
        let name = cname + "=";
        let ca = document.cookie.split(';');
        for (let i = 0; i < ca.length; i++) {
            let c = ca[i];
            while (c.charAt(0) == ' ') {
                c = c.substring(1);
            }
            if (c.indexOf(name) == 0) {
                return c.substring(name.length, c.length);
            }
        }
        return "";
    }
</script>