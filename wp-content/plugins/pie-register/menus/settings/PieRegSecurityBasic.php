<?php if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly ?>
<style>
.captcha_in_login_attempts {
	width:25% !important;
}
</style>
<?php $piereg = PieReg_Base::get_pr_global_options(); 

	$_disable 			= "disabled";
	$_available_in_pro 	= ' - <span style="color:red;">'. __("Available in premium version","pie-register") . '</span>';

?>
<div class="forms_max_label">
<form method="post" action="" id="piereg_form_general_settings_page" onsubmit="return validateSettingsSecurity();">
  <?php if( function_exists( 'wp_nonce_field' )) wp_nonce_field( 'piereg_wp_settings_security_b','piereg_settings_security_b'); ?>
  <h3>
    <?php _e("Login Form",'pie-register'); ?>
  </h3>
  <div class="fields">
    <label for="capthca_in_login_form">
      <?php _e("Show Captcha on login form?",'pie-register') ?>
    </label>
    <div class="radio_fields">
      <input type="radio" name="captcha_in_login_value" id="captcha_in_login_value_0" class="captcha_in_login_value" value="0" checked="checked" <?php echo (isset($piereg['captcha_in_login_value']) && $piereg['captcha_in_login_value'] == '0')?'checked="checked"':''; ?> />
      <label for="captcha_in_login_value_0">No</label>
      <input type="radio" name="captcha_in_login_value" id="captcha_in_login_value_1" class="captcha_in_login_value" value="1" <?php echo (isset($piereg['captcha_in_login_value']) && $piereg['captcha_in_login_value'] == '1')?'checked="checked"':''; ?> />
      <label for="captcha_in_login_value_1">Yes</label>
    </div>
  </div>
  <div class="fields piereg_captcha_label_show" <?php echo ((!isset($piereg['captcha_in_login_value']) || isset($piereg['captcha_in_login_value']) && $piereg['captcha_in_login_value'] == 0 )?'style="display:none;"':'') ?>>
    <label for="capthca_in_login_label">
      <?php _e("Captcha Label",'pie-register') ?>
    </label>
    <input type="text" name="capthca_in_login_label" id="capthca_in_login_label" value="<?php echo $piereg['capthca_in_login_label']; ?>" class="input_fields" />
  </div>
  <div class="fields piereg_captcha_type_show" <?php echo ((!isset($piereg['captcha_in_login_value']) || isset($piereg['captcha_in_login_value']) && $piereg['captcha_in_login_value'] == 0 )?'style="display:none;"':'') ?>>
  	<div class="flt_lft width_full">
    <label for="piereg_capthca_in_login">
      <?php _e("Captcha Type",'pie-register') ?>
    </label>
    <select name="capthca_in_login" id="piereg_capthca_in_login">
      <option value="3" <?php echo ((isset($piereg['capthca_in_login']) && $piereg['capthca_in_login'] == 3 )?'selected="selected"':'') ?>>
      <?php _e("No Captcha ReCaptcha",'pie-register') ?>
      </option>
      
      <!--<option value="1" <?php //echo ((isset($piereg['capthca_in_login']) && $piereg['capthca_in_login'] == 1 )?'selected="selected"':'') ?>>
      <?php //_e("Classic ReCaptcha",'pie-register') ?>
      </option>-->
      
      <option value="2" <?php echo ((isset($piereg['capthca_in_login']) && $piereg['capthca_in_login'] == 2 )?'selected="selected"':'') ?>>
      <?php _e("Math Captcha",'pie-register') ?>
      </option>
    </select>
    </div>
    <span class="quotation">
    <?php _e("Select Captcha type to show on the login form.",'pie-register') ?>
    </span>
    <span class="quotation" id="note_quotation" <?php echo ((isset($piereg['captcha_in_login_value']) && $piereg['captcha_in_login_value'] == 0 || isset($piereg['capthca_in_login']) && $piereg['capthca_in_login'] != 1 )?'style="display:none;"':'') ?>>
    <?php _e("<strong>Note:</strong> Classic ReCaptcha will not show multiple times on a single page.",'pie-register') ?>
    </span>
    </div>
  
      <div class="fields">
        <div class="container_attemps">
        <input <?php echo $_disable; ?> type="checkbox" name="piereg_security_attempts_login_value" value="1" <?php echo (isset($piereg['piereg_security_attempts_login_value']) && $piereg['piereg_security_attempts_login_value'] == '1')?'checked="checked"':''; ?> />
         <?php _e("Lockout user for",'pie-register') ?>
        <select <?php echo $_disable; ?> class="security_attempts_drop" name="security_attempts_login_time" id="piereg_security_attempts_login_time">
          <option value="1" <?php echo ((isset($piereg['security_attempts_login_time']) && $piereg['security_attempts_login_time'] == 1 )?'selected="selected"':'') ?>>
          <?php _e("1","pie-register"); ?>
          </option>
          <option value="2" <?php echo ((isset($piereg['security_attempts_login_time']) && $piereg['security_attempts_login_time'] == 2 )?'selected="selected"':'') ?>>
          <?php _e("2","pie-register"); ?>
          </option>
          <option value="3" <?php echo ((isset($piereg['security_attempts_login_time']) && $piereg['security_attempts_login_time'] == 3 )?'selected="selected"':'') ?>>
          <?php _e("3","pie-register"); ?>
          </option>
          <option value="4" <?php echo ((isset($piereg['security_attempts_login_time']) && $piereg['security_attempts_login_time'] == 4 )?'selected="selected"':'') ?>>
          <?php _e("4","pie-register"); ?>
          </option>
          <option value="5" <?php echo ((isset($piereg['security_attempts_login_time']) && $piereg['security_attempts_login_time'] == 5 )?'selected="selected"':'') ?>>
          <?php _e("5","pie-register"); ?>
          </option>
          <option value="7" <?php echo ((isset($piereg['security_attempts_login_time']) && $piereg['security_attempts_login_time'] == 7 )?'selected="selected"':'') ?>>
          <?php _e("7","pie-register"); ?>
          </option>
          <option value="10" <?php echo ((isset($piereg['security_attempts_login_time']) && $piereg['security_attempts_login_time'] == 10 )?'selected="selected"':'') ?>>
          <?php _e("10","pie-register"); ?>
          </option>
          <option value="30" <?php echo ((isset($piereg['security_attempts_login_time']) && $piereg['security_attempts_login_time'] == 30 )?'selected="selected"':'') ?>>
          <?php _e("30","pie-register"); ?>
          </option>
          <option value="60" <?php echo ((isset($piereg['security_attempts_login_time']) && $piereg['security_attempts_login_time'] == 60 )?'selected="selected"':'') ?>>
          <?php _e("60","pie-register"); ?>
          </option>
          <option value="90" <?php echo ((isset($piereg['security_attempts_login_time']) && $piereg['security_attempts_login_time'] == 90 )?'selected="selected"':'') ?>>
          <?php _e("90","pie-register"); ?>
          </option>
          <option value="120" <?php echo ((isset($piereg['security_attempts_login_time']) && $piereg['security_attempts_login_time'] == 120 )?'selected="selected"':'') ?>>
          <?php _e("120","pie-register"); ?>
          </option>
        </select>
        <?php _e("minutes after",'pie-register') ?>
        <select <?php echo $_disable; ?> class="security_attempts_drop" name="security_attempts_login" id="piereg_security_attempts_login">
          <option value="2" <?php echo ((isset($piereg['security_attempts_login']) && $piereg['security_attempts_login'] == 2 )?'selected="selected"':'') ?>>
          <?php _e("2","pie-register"); ?>
          </option>
          <option value="3" <?php echo ((isset($piereg['security_attempts_login']) && $piereg['security_attempts_login'] == 3 )?'selected="selected"':'') ?>>
          <?php _e("3","pie-register"); ?>
          </option>
          <option value="4" <?php echo ((isset($piereg['security_attempts_login']) && $piereg['security_attempts_login'] == 4 )?'selected="selected"':'') ?>>
          <?php _e("4","pie-register"); ?>
          </option>
          <option value="5" <?php echo ((isset($piereg['security_attempts_login']) && $piereg['security_attempts_login'] == 5 )?'selected="selected"':'') ?>>
          <?php _e("5","pie-register"); ?>
          </option>
          <option value="7" <?php echo ((isset($piereg['security_attempts_login']) && $piereg['security_attempts_login'] == 7 )?'selected="selected"':'') ?>>
          <?php _e("7","pie-register"); ?>
          </option>
          <option value="10" <?php echo ((isset($piereg['security_attempts_login']) && $piereg['security_attempts_login'] == 10 )?'selected="selected"':'') ?>>
          <?php _e("10","pie-register"); ?>
          </option>
          <option value="15" <?php echo ((isset($piereg['security_attempts_login']) && $piereg['security_attempts_login'] == 15 )?'selected="selected"':'') ?>>
          <?php _e("15","pie-register"); ?>
          </option>
        </select>
        <?php _e("invalid login attempts",'pie-register') ?>. <?php echo $_available_in_pro; ?></div> </div>
   
    <hr class="seperator" />
  <h3>
    <?php _e("Forgot Password Form",'pie-register'); ?>
  </h3>
  <div class="fields">
    <label for="capthca_in_forgot_form" class="limit_width">
      <?php _e("Show Captcha on forgot password form?",'pie-register') ?>
    </label>
    <div class="radio_fields">
      <input type="radio" name="captcha_in_forgot_value" id="captcha_in_forgot_value_0" class="captcha_in_forgot_value" value="0" checked="checked" <?php echo (isset($piereg['captcha_in_forgot_value']) && $piereg['captcha_in_forgot_value'] == '0')?'checked="checked"':''; ?> />
      <label for="captcha_in_forgot_value_0">No</label>
      <input type="radio" name="captcha_in_forgot_value" id="captcha_in_forgot_value_1" class="captcha_in_forgot_value" value="1" <?php echo (isset($piereg['captcha_in_forgot_value']) && $piereg['captcha_in_forgot_value'] == '1')?'checked="checked"':''; ?> />
      <label for="captcha_in_forgot_value_1">Yes</label>
    </div>
  </div>
  <div class="fields piereg_capthca_forgot_pass_label_show" <?php echo (!isset($piereg['captcha_in_forgot_value']) || (isset($piereg['captcha_in_forgot_value']) && $piereg['captcha_in_forgot_value'] == 0 )?'style="display:none;"':'') ?>>
    <label for="capthca_in_forgot_pass_label">
      <?php _e("Captcha Label",'pie-register') ?>
    </label>
    <input type="text" name="capthca_in_forgot_pass_label" id="capthca_in_forgot_pass_label" value="<?php echo $piereg['capthca_in_forgot_pass_label']; ?>" class="input_fields" />
  </div>
  <div class="fields piereg_captcha_forgot_pass_type_show" <?php echo (!isset($piereg['captcha_in_forgot_value']) || (isset($piereg['captcha_in_forgot_value']) && $piereg['captcha_in_forgot_value'] == 0 )?'style="display:none;"':'') ?>>
  	<div class="flt_lft width_full">
    <label for="piereg_capthca_in_forgot_pass">
      <?php _e("Captcha Type",'pie-register') ?>
    </label>
    <select name="capthca_in_forgot_pass" id="piereg_capthca_in_forgot_pass">
      <option value="3" <?php echo ((isset($piereg['capthca_in_forgot_pass']) && $piereg['capthca_in_forgot_pass'] == 3 )?'selected="selected"':'') ?>>
      <?php _e("No Catpcha ReCaptcha",'pie-register') ?>
      </option>
      <!--
      <option value="1" <?php //echo ((isset($piereg['capthca_in_forgot_pass']) && $piereg['capthca_in_forgot_pass'] == 1 )?'selected="selected"':'') ?>>
      <?php //_e("Classic ReCaptcha",'pie-register') ?>
      </option>-->
      <option value="2" <?php echo ((isset($piereg['capthca_in_forgot_pass']) && $piereg['capthca_in_forgot_pass'] == 2 )?'selected="selected"':'') ?>>
      <?php _e("Math Captcha",'pie-register') ?>
      </option>
    </select>
    </div>
    <span class="quotation">
    <?php _e("Select Captcha type to show on the Password Reset form.",'pie-register') ?>
    </span>
    <span class="quotation" id="for_note_quotation" <?php echo ((isset($piereg['captcha_in_forgot_value']) && $piereg['captcha_in_forgot_value'] == 0 || isset($piereg['capthca_in_forgot_pass']) && $piereg['capthca_in_forgot_pass'] != 1 )?'style="display:none;"':'') ?>>
    <?php _e("<strong>Note:</strong> Classic ReCaptcha will not show multiple times on a single page.",'pie-register') ?>
    </span>
    </div>
  
      <div class="fields">
        <div class="container_attemps">
        <input <?php echo $_disable; ?> type="checkbox" name="piereg_security_attempts_forgot_value" value="1" <?php echo (isset($piereg['piereg_security_attempts_forgot_value']) && $piereg['piereg_security_attempts_forgot_value'] == '1')?'checked="checked"':''; ?> />
        <?php _e("Lockout user for",'pie-register') ?>
        <select <?php echo $_disable; ?> class="security_attempts_drop" name="security_attempts_forgot_time" id="piereg_security_attempts_forgot_time">
          <option value="1" <?php echo ((isset($piereg['security_attempts_forgot_time']) && $piereg['security_attempts_forgot_time'] == 1 )?'selected="selected"':'') ?>>
          <?php _e("1","pie-register"); ?>
          </option>
          <option value="2" <?php echo ((isset($piereg['security_attempts_forgot_time']) && $piereg['security_attempts_forgot_time'] == 2 )?'selected="selected"':'') ?>>
          <?php _e("2","pie-register"); ?>
          </option>
          <option value="3" <?php echo ((isset($piereg['security_attempts_forgot_time']) && $piereg['security_attempts_forgot_time'] == 3 )?'selected="selected"':'') ?>>
          <?php _e("3","pie-register"); ?>
          </option>
          <option value="4" <?php echo ((isset($piereg['security_attempts_forgot_time']) && $piereg['security_attempts_forgot_time'] == 4 )?'selected="selected"':'') ?>>
          <?php _e("4","pie-register"); ?>
          </option>
          <option value="5" <?php echo ((isset($piereg['security_attempts_forgot_time']) && $piereg['security_attempts_forgot_time'] == 5 )?'selected="selected"':'') ?>>
          <?php _e("5","pie-register"); ?>
          </option>
          <option value="7" <?php echo ((isset($piereg['security_attempts_forgot_time']) && $piereg['security_attempts_forgot_time'] == 7 )?'selected="selected"':'') ?>>
          <?php _e("7","pie-register"); ?>
          </option>
          <option value="10" <?php echo ((isset($piereg['security_attempts_forgot_time']) && $piereg['security_attempts_forgot_time'] == 10 )?'selected="selected"':'') ?>>
          <?php _e("10","pie-register"); ?>
          </option>
          <option value="30" <?php echo ((isset($piereg['security_attempts_forgot_time']) && $piereg['security_attempts_forgot_time'] == 30 )?'selected="selected"':'') ?>>
          <?php _e("30","pie-register"); ?>
          </option>
          <option value="60" <?php echo ((isset($piereg['security_attempts_forgot_time']) && $piereg['security_attempts_forgot_time'] == 60 )?'selected="selected"':'') ?>>
          <?php _e("60","pie-register"); ?>
          </option>
          <option value="90" <?php echo ((isset($piereg['security_attempts_forgot_time']) && $piereg['security_attempts_forgot_time'] == 90 )?'selected="selected"':'') ?>>
          <?php _e("90","pie-register"); ?>
          </option>
          <option value="120" <?php echo ((isset($piereg['security_attempts_forgot_time']) && $piereg['security_attempts_forgot_time'] == 120 )?'selected="selected"':'') ?>>
          <?php _e("120","pie-register"); ?>
          </option>
        </select>
        <?php _e("minutes after",'pie-register') ?>
        <select <?php echo $_disable; ?> class="security_attempts_drop" name="security_attempts_forgot" id="piereg_security_attempts_forgot">
          <option value="2" <?php echo ((isset($piereg['security_attempts_forgot']) && $piereg['security_attempts_forgot'] == 2 )?'selected="selected"':'') ?>>
          <?php _e("2","pie-register"); ?>
          </option>
          <option value="3" <?php echo ((isset($piereg['security_attempts_forgot']) && $piereg['security_attempts_forgot'] == 3 )?'selected="selected"':'') ?>>
          <?php _e("3","pie-register"); ?>
          </option>
          <option value="4" <?php echo ((isset($piereg['security_attempts_forgot']) && $piereg['security_attempts_forgot'] == 4 )?'selected="selected"':'') ?>>
          <?php _e("4","pie-register"); ?>
          </option>
          <option value="5" <?php echo ((isset($piereg['security_attempts_forgot']) && $piereg['security_attempts_forgot'] == 5 )?'selected="selected"':'') ?>>
          <?php _e("5","pie-register"); ?>
          </option>
          <option value="7" <?php echo ((isset($piereg['security_attempts_forgot']) && $piereg['security_attempts_forgot'] == 7 )?'selected="selected"':'') ?>>
          <?php _e("7","pie-register"); ?>
          </option>
          <option value="10" <?php echo ((isset($piereg['security_attempts_forgot']) && $piereg['security_attempts_forgot'] == 10 )?'selected="selected"':'') ?>>
          <?php _e("10","pie-register"); ?>
          </option>
          <option value="15" <?php echo ((isset($piereg['security_attempts_forgot']) && $piereg['security_attempts_forgot'] == 15 )?'selected="selected"':'') ?>>
          <?php _e("15","pie-register"); ?>
          </option>
        </select>
        <?php _e("invalid login attempts",'pie-register') ?> . <?php echo $_available_in_pro; ?></div>
        </div>
   
    <hr class="seperator" />
  <h3>
    <?php _e("reCAPTCHA Settings",'pie-register'); ?>
  </h3>
  <div class="fields">
    <p>
      <?php _e("Click <a href='https://www.google.com/recaptcha/admin' target='_blank'>here</a> to get reCAPTCHA keys for your site.",'pie-register') ?>
    </p>
    <p id="piereg_reCAPTCHA_Public_Key_error" style="display:none;color:#F00;"><strong>
      <?php _e("Error : Invalid Re-Captcha keys",'pie-register') ?>
      </strong></p>
  </div>
  <div class="fields">
  	<div class="flt_lft width_full">
    <label for="piereg_reCAPTCHA_Public_Key">
      <?php _e("reCAPTCHA Site Key",'pie-register') ?>
    </label>
    <input type="text" id="piereg_reCAPTCHA_Public_Key" name="captcha_publc" class="input_fields" value="<?php echo $piereg['captcha_publc']?>" />
    </div>
    <span class="quotation">
    <?php _e("Required only if you decide to use the reCAPTCHA field. Sign up for a free account to get the key.",'pie-register') ?>
    </span> </div>
  <div class="fields">
  	<div class="flt_lft width_full">
    <label for="piereg_reCAPTCHA_Private_Key">
      <?php _e("reCAPTCHA Secret Key",'pie-register') ?>
    </label>
    <input type="text" id="piereg_reCAPTCHA_Private_Key" name="captcha_private" class="input_fields" value="<?php echo $piereg['captcha_private']?>" />
    </div>
    <span class="quotation">
    <?php _e("Required only if you decide to use the reCAPTCHA field. Sign up for a free account to get the key.",'pie-register') ?>
    </span> </div>
   <div class="fields">
  	<div class="flt_lft width_full">
    		<label for="piereg_recaptcha_language">
      		<?php _e("reCAPTCHA Language",'pie-register') ?>
    		</label>
    		<div>
              <select name="piereg_recaptcha_language" id="piereg_recaptcha_language">
              <option value="ar" <?php echo (($piereg['piereg_recaptcha_language']=="ar")?'selected="selected"':"");?> >
                <?php _e("Arabic","pie-register"); ?>
                </option>
              <option value="zh-HK" <?php echo (($piereg['piereg_recaptcha_language']=="zh-HK")?'selected="selected"':"");?> >
                <?php _e("Chinese (Hong Kong)","pie-register"); ?>
                </option>
              <option value="zh-CN" <?php echo (($piereg['piereg_recaptcha_language']=="zh-CN")?'selected="selected"':"");?> >
                <?php _e("Chinese (Simplified)","pie-register"); ?>
                </option>
              <option value="zh-TW" <?php echo (($piereg['piereg_recaptcha_language']=="zh-TW")?'selected="selected"':"");?> >
                <?php _e("Chinese (Traditional)","pie-register"); ?>
                </option>
                <option value="en" <?php echo (($piereg['piereg_recaptcha_language']=="en")?'selected="selected"':"");?> >
                <?php _e("English (US)","pie-register"); ?>
                </option>
                <option value="fr" <?php echo (($piereg['piereg_recaptcha_language']=="fr")?'selected="selected"':"");?> >
                <?php _e("French","pie-register"); ?>
                </option>
                <option value="fr-CA" <?php echo (($piereg['piereg_recaptcha_language']=="fr-CA")?'selected="selected"':"");?> >
                <?php _e("French (Canadian)","pie-register"); ?>
                </option>
                <option value="de" <?php echo (($piereg['piereg_recaptcha_language']=="de")?'selected="selected"':"");?> >
                <?php _e("German","pie-register"); ?>
                </option>
                <option value="de-AT" <?php echo (($piereg['piereg_recaptcha_language']=="de-AT")?'selected="selected"':"");?> >
                <?php _e("German (Austria)","pie-register"); ?>
                </option>
                <option value="de-CH" <?php echo (($piereg['piereg_recaptcha_language']=="de-CH")?'selected="selected"':"");?> >
                <?php _e("German (Switzerland)","pie-register"); ?>
                </option>
                <option value="pl" <?php echo (($piereg['piereg_recaptcha_language']=="pl")?'selected="selected"':"");?> >
                <?php _e("Polish","pie-register"); ?>
                </option>
                <option value="pt" <?php echo (($piereg['piereg_recaptcha_language']=="pt")?'selected="selected"':"");?> >
                <?php _e("Portuguese","pie-register"); ?>
                </option>
                <option value="pt-BR" <?php echo (($piereg['piereg_recaptcha_language']=="pt-BR")?'selected="selected"':"");?> >
                <?php _e("Portuguese (Brazil)","pie-register"); ?>
                </option>
                <option value="pt-PT" <?php echo (($piereg['piereg_recaptcha_language']=="pt-PT")?'selected="selected"':"");?> >
                <?php _e("Portuguese (Portugal)","pie-register"); ?>
                </option>
                <option value="ru" <?php echo (($piereg['piereg_recaptcha_language']=="ru")?'selected="selected"':"");?> >
                <?php _e("Russian","pie-register"); ?>
                </option>
                <option value="es" <?php echo (($piereg['piereg_recaptcha_language']=="es")?'selected="selected"':"");?> >
                <?php _e("Spanish","pie-register"); ?>
                </option>
                <option value="es-419" <?php echo (($piereg['piereg_recaptcha_language']=="es-419")?'selected="selected"':"");?> >
                <?php _e("Spanish (Latin America)","pie-register"); ?>
                </option>
                <option value="tr" <?php echo (($piereg['piereg_recaptcha_language']=="tr")?'selected="selected"':"");?> >
                <?php _e("Turkish","pie-register"); ?>
                </option>
              </select>
            </div>
    	</div> 
    </div> 
    <hr class="seperator" />
  <h3>
    <?php _e("User Verification",'pie-register'); ?>
  </h3>
  <div class="fields">
   <p>
      <?php _e("Note: Admin and Email verifications will not work when the payment gateway is enabled.",'pie-register') ?>
    </p>
  </div>
  <div class="fields">
    <label>
      <?php _e("New User Verification",'pie-register') ?>
    </label>
    <div>
      <select name="verification" id="verification_2" >
        <option value="0" <?php echo (($piereg['verification']=="0")?'selected="selected"':"");?> >
        <?php _e("Disable","pie-register"); ?>
        </option>
        <option value="1" <?php echo (($piereg['verification']=="1")?'selected="selected"':"");?> >
        <?php _e("Admin Approval","pie-register"); ?>
        </option>
        <option value="2" <?php echo (($piereg['verification']=="2")?'selected="selected"':"");?> >
        <?php _e("Verify Email Address","pie-register"); ?>
        </option>
        <option <?php echo $_disable; ?> value="3" <?php echo (($piereg['verification']=="3")?'selected="selected"':"");?> >
        <?php _e("Admin Approval AND Verify Email Address - [PRO]","pie-register"); ?>
        </option>
      </select>
    </div>
    <div class="verification_data"> <span>
      <?php _e("<strong>Admin Approval</strong> - Site admin has to approve each new user.",'pie-register') ?>
      </span> <br />
      <span>
      <?php _e("<strong>Verify Email Address</strong> - Require new users to click on a link sent to their email to activate their account.",'pie-register') ?>
      </span>
      <p><strong>
        <?php _e("Grace Period (days)",'pie-register') ?>
        :
        <input type="text" name="grace_period" class="input_fields2" value="<?php echo $piereg['grace_period']?>" />
        </strong></p>
      <p>
        <?php _e("User Ids that are not verified within the grace period are deleted at the next logon attempt. 0 (Zero) means unlimited, no grace period.",'pie-register') ?>
      </p>
    </div>
  </div>
  <div class="fields">
    <label>
      <?php _e("Verify Email Address Change",'pie-register') ?>
    </label>
    <div class="radio_fields max_label_300">
      <input type="radio" value="1" name="email_edit_verification_step" id="email_edit_verification_1" <?php echo ($piereg['email_edit_verification_step']=="1")?'checked="checked"':''?> class="step_email_edit_verif" />
      <label for="email_edit_verification_1">
        <?php _e("<strong>1-Step:</strong> Verify new email address.",'pie-register') ?>
      </label>
      <input type="radio" value="2" name="email_edit_verification_step" id="email_edit_verification_2" <?php echo ($piereg['email_edit_verification_step']=="2")?'checked="checked"':''?> class="step_email_edit_verif" />
      <label for="email_edit_verification_2">
        <?php _e("<strong>2-Step:</strong> Authenticate the change request by sending an email to the old email address + verify the new email address.",'pie-register') ?>
      </label>
      <input type="radio" value="0" name="email_edit_verification_step" id="email_edit_verification_0" <?php echo ($piereg['email_edit_verification_step']=="0")?'checked="checked"':''?> class="step_email_edit_verif" />
      <label for="email_edit_verification_0">
        <?php _e("Off",'pie-register') ?>
      </label>
    </div>
    
  <hr class="seperator" />
  <h3>
    <?php _e("Restrict Website Content From Search Engine(s) / Bot",'pie-register'); ?><?php echo $_available_in_pro; ?>
  </h3>
  <div class="fields">
    <div class="radio_fields">
      <input <?php echo $_disable; ?> type="checkbox" value="1" name="restrict_bot_enabel" id="captcha_publc" <?php echo (isset($piereg['restrict_bot_enabel']) && $piereg['restrict_bot_enabel']=="1")?'checked="checked"':''?> />
    </div>
    <label for="captcha_publc" class="label_mar_top">
      <?php _e("Restrict search engines and bots from crawling page content.",'pie-register') ?>
    </label>
  </div>
  <div class="fields">
    <label for="restrict_bot_content" class="label_textarea">
      <?php _e("User Agents to Reject",'pie-register') ?>
    </label>
    <?php global $PR_Bot_List; ?>
    <textarea <?php echo $_disable; ?> name="restrict_bot_content"><?php echo ($piereg['restrict_bot_content']!="")?$piereg['restrict_bot_content']:$PR_Bot_List;?></textarea>
  </div>
  <div class="fields">
    <label for="restrict_bot_content_message" class="label_textarea">
      <?php _e("Text to send bots when blocking access",'pie-register') ?>
    </label>
    <textarea <?php echo $_disable; ?> name="restrict_bot_content_message"><?php echo ($piereg['restrict_bot_content_message']!="")?$piereg['restrict_bot_content_message']:"Restricted Post: You are not allowed to view the content of this post";?></textarea>
  </div>
  <input name="action" value="pie_reg_settings" type="hidden" />
  <div class="fields fields_submitbtn">
    <input type="submit" class="submit_btn" value=" <?php _e("Save Changes","pie-register");?> " />
  </div>
</form>
</div>