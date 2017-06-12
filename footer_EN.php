<div class="map">
    <div class="map__wrap">
        <div class="map__relative">
            <div class="map__design_top"></div>
            <div class="map__design_left"></div>
            <div class="map__design_right"></div>
            <script src="https://maps.googleapis.com/maps/api/js?key=&extension=.js"></script>
            <div id="mapkit-4515"></div>
        </div>
    </div>
</div>

</div>
<!--bg-middle-->

<div class="modal-window" id="consult">
    <span class="modal-title">Have questions? Write!</span>
    <form action="js">
      <div class="modal-form">

        <div class="modal-form__wrap">
            <span class="rn-label">Your name</span>
            <input type="text" requitred class="rn-field">
        </div>

        <div class="modal-form__wrap">
            <span class="rn-label">Message</span>
            <textarea requitred class="rn-textarea"></textarea>
        </div>

        <div class="modal-form__wrap modal-form__wrap_double">
            <div class="modal-form__captcha">
                <div class="captcha">
                    <div class="captcha__left">
                        <span class="captcha__label">Protection from SPAM</span>
                        <img src="<?php echo get_template_directory_uri() ?> /img/demo/rectangle-1.jpg" alt="" class="captcha__image">
                    </div>
                    <div class="captcha__right">
                        <span class="captcha__label">Enter the code from the image</span>
                        <input type="text" requitred class="captcha__field">
                    </div>
                </div>
            </div>
            <div class="modal-form__button-wrap">
                <button type="submit" class="nr-button">Send</button>
            </div>
        </div>

    </div>
    </form>
</div>

</div>
<?php wp_footer(); ?>
</body>

</html>
