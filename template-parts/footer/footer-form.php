<button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#footerForm" aria-controls="footerForm">Toggle top offcanvas</button>

<div class="offcanvas offcanvas-bottom background-accent" tabindex="-1" id="footerForm" aria-labelledby="footerFormLabel">
    <div class="offcanvas-body">
        <div class="form-wrapper mx-auto">
            <div class="row align-items-center">
                <div class="col-lg-1">
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="col-lg-6">
                    <h3 class="offcanvas-title" id="footerFormLabel">Get our <span class="underline">Money Matters</span> magazine</h3>
                    <p>
                        Sign up to receive our <strong>FREE</strong> quarterly financial advice magazine.
                    </p>
                </div>
                <div class="col-lg-5">
                    <?= do_shortcode('[contact-form-7 id="0987dbf" title="Footer Form"]') ?>
                </div>
            </div>
        </div>
    </div>
</div>