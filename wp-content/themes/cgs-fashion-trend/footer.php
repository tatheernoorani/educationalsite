<div class="footer-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-xl-8">
                <div class="leftalign">
                    <?php
                    $footer_copyright = get_option('footer_copyright');
                    if(!empty($footer_copyright)){
                        echo $footer_copyright;
                    } else {
	                    echo wp_kses_post(cgs_fashion_trend_footer_copyright());
                    }
                    ?>
                </div>
            </div>
            <div class="col-xl-4">
                <div class="rightalign"></div>
            </div>
        </div>
    </div>
</div>
<?php wp_footer(); ?>
</body>
</html>
