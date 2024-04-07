<div class="offcanvas offcanvas-bottom background-accent" tabindex="-1" id="footerForm" aria-labelledby="footerFormLabel">
    <div class="offcanvas-body">
        <div class="form-wrapper mx-auto">
            <div class="row align-items-center">
                <div class="col-lg-1">
                    <button type="button" class="footer-form-close" data-bs-dismiss="offcanvas" aria-label="Close">&#x2715;</button>
                </div>
                <div class="col-lg-6">
                    <h3 class="offcanvas-title" id="footerFormLabel">Get our <span class="underline">Energy Matters</span> magazine</h3>
                    <p>
                        Sign up to receive our <strong>FREE</strong> quarterly energy reduction advice magazine
                    </p>
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
</script>