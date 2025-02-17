<?php echo '&nbsp;&nbsp;&nbsp;'; ?>
<div class="melu_app_shell">
    <div class="melu_app">
        <div class="logo_container">
            <div class="logo_inner">
                <img src="<?php echo plugins_url( 'data/melu-logo.png', dirname(__FILE__ )); ?>">
            </div>
        </div>
        <br>

        <?php
        $active = '';
        if (empty($this->getOption("key"))) {
            $active = 'Melu is inactive';
        } else {
            $active = $this->verifyConnection();
        }
        ?>
        <div class="melu_active">
            <h1><?= $active; ?></h1>
        </div>
        <br>
        <?php
        if ($active !== 'Congratulations! Melu is active!' xor $active === 'We could not validate your activation key, please check frontend for functionality'):
            ?>
            <form method="POST" action="">
                <?php settings_fields($settingsGroup); ?>
                <table class="plugin-options-table">
                    <tbody>
                    <?php
                    if ($optionMetaData != null) {
                        foreach ($optionMetaData as $aOptionKey => $aOptionMeta) {
                            $displayText = is_array($aOptionMeta) ? $aOptionMeta[0] : $aOptionMeta;
                            ?>
                            <tr valign="top">
                                <th scope="row"><p><label
                                            for="<?php echo $aOptionKey ?>"><?php echo $displayText ?></label></p>
                                </th>
                                <td>
                                    <?php $this->createFormControl($aOptionKey, $aOptionMeta, '');
                                    wp_nonce_field( 'update_key', 'melu_update_key' );
                                    ?>
                                    <p class="orange"><a href="https://meluchat.com/try-melu" target="_blank"><b>Don't have a product key?</b> Get one here and try Melu free!</a></p>
                                    <p class="thin">Your product key is sent via email once your account is ready.</p>
                                </td>
                            </tr>
                            <?php
                        }
                    }
                    ?>
                    </tbody>
                </table>
                <p class="submit">
                    <input type="submit" class="button-primary"
                           value="<?php _e('Activate Melu', 'melu-live-chat') ?>"/>
                </p>
            </form>
        <?php else: ?>
            <form method="POST" id="deactivate_form">
                <h3 class="activation_label">Activation: </h3>
                <input class="tgl tgl-ios melu-hidden" id="cb2" type="checkbox" checked/>
                <label class="tgl-btn" for="cb2"></label>
                <input type="hidden" name="deactivate" value="deactivate"/>
            </form>
            <?php
            if (isset($_POST['deactivate'])) {
                echo ' <div id="refresh">Deactivating....</div>';
                $this->deleteOption("key");
            }
        endif;
        ?>
    </div>
    <?php if ($active !== 'Congratulations! Melu is active!' xor $active === 'We could not validate your activation key, please check frontend for functionality'): ?>
        <div class="row clearfix pricing-tables">
            <div class="col-md-12 col-sm-12 no-pad-right no-pad-left">
                <div class="pricing-table emphasis">
                    <ul class="features">
                        <li>Provide better online customer service</li>
                        <li>Turn more visitors into paying customers</li>
						<li>Live chat software included</li>
                        <li>Professionally operated <br><strong>24/7</strong><br>by real people
                        </li>
						<li><strong>UK-based</strong>, native English-speaking operators</li>
                        <li><strong>No</strong> long contracts</li>
                        <li><strong>No</strong> hidden fees</li>
                    </ul>
                    <a target="_blank" href="https://meluchat.com/try-melu" class="btn btn-primary btn-white">Start free trial</a>
                </div>
            </div>
        </div>
    <?php else: ?>
        <div class="login_container">
            <!--<h1>Login to Melu</h1>-->
            <h1 class="login_txt">Login to your Melu Client Portal</h1>
            <div class="login-btn-wrap">
                <a target="_blank" href="https://meluchat.com/login" class="btn btn-primary btn-filled">Login</a>
            </div>
            <p class="login_label">Your client portal allows you to view chat transcripts and reports</p>
        </div>
    <?php endif; ?>
</div>
<script defer type="text/javascript" src="<?php echo plugins_url('js/melu_plugin.js', dirname(__FILE__)) ?>"></script>
