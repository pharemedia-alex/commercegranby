<section class="module-newsletter {!! ( $show_images_module!==true ) ? 'top-wave' : '' !!}">
    <div class="o-container u-pt-md u-pb-md -t-animate">
        <div class="row justify-content-center">
            <div class="col-12 u-text-center">
                <h3 class="module-newsletter__title">{!! get_field('newsletter_title', 'option') !!}</h3>
            </div>
            <div class="col-12 u-text-center">
                <?php /* if(ICL_LANGUAGE_CODE == "fr"){ ?>

                    {!! do_shortcode( '[yikes-mailchimp form="2"]' ) !!}
                <?php } else{ ?>
                    {!! do_shortcode( '[yikes-mailchimp form="3"]' ) !!}
                <?php }  */ ?>

                <form action="https://app.cyberimpact.com/optin" method="post" accept-charset="utf-8" class="newsletter-form">
                    <?php //if(ICL_LANGUAGE_CODE == "fr"){ ?>
                    <fieldset style="border: none;">
                        <input type="text" placeholder="NOM & PRÉNOM" id="ci_lastname" name="ci_lastname" maxlength="255" />
                        <input type="text" placeholder="COURRIEL" id="ci_email" name="ci_email" maxlength="255" />
                        <span class="yikes-easy-mc-submit-button"><input style="border: none; font-size: 12px;" type="submit" value="M'abonner à l'infolettre" /></span>
                        <div style="display:block; visibility:hidden; height:1px;">
                        <input style="display:none;" type="text" id="ci_verification" name="ci_verification" />
                        <input type="hidden" id="ci_groups" name="ci_groups" value="4" />
                        <input type="hidden" id="ci_account" name="ci_account" value="05eb494d-3bd4-4ec6-51d0-c62d590468ab" />
                        <input type="hidden" id="ci_language" name="ci_language" value="fr_ca" />
                        <input type="hidden" id="ci_sent_url" name="ci_sent_url" value="" />
                        <input type="hidden" id="ci_error_url" name="ci_error_url" value="" />
                        <input type="hidden" id="ci_confirm_url" name="ci_confirm_url" value="" />
                        </div>
                    </fieldset>
                    <?php /*
                    } else{ ?>
                        <fieldset style="border: none;">
                        <input type="text" placeholder="FIRST & LAST NAME" id="ci_lastname" name="ci_lastname" maxlength="255" />
                        <input type="text" placeholder="EMAIL" id="ci_email" name="ci_email" maxlength="255" />
                        <span class="yikes-easy-mc-submit-button"><input style="border: none; font-size: 12px;" type="submit" value="Subscribe to newsletter" /></span>
                        <div style="display:block; visibility:hidden; height:1px;">
                        <input style="display:none;" type="text" id="ci_verification" name="ci_verification" />
                        <input type="hidden" id="ci_groups" name="ci_groups" value="6" />
                        <input type="hidden" id="ci_account" name="ci_account" value="05eb494d-3bd4-4ec6-51d0-c62d590468ab" />
                        <input type="hidden" id="ci_language" name="ci_language" value="en_ca" />
                        <input type="hidden" id="ci_sent_url" name="ci_sent_url" value="" />
                        <input type="hidden" id="ci_error_url" name="ci_error_url" value="" />
                        <input type="hidden" id="ci_confirm_url" name="ci_confirm_url" value="" />
                        </div>
                    </fieldset>
                    <?php } 
                    */
                    ?>
                </form>


                {{-- <a href="#" class="link link--bigger link--relative-icon c-white js-submit-form">{{ t( 'common.newsletter.button' ) }} {!! icon( 'small-right-arrow' ) !!}</a> --}}
                {{-- <form action="#" method="post" class="js-newsletter-form">
                    <input class="m-infolettre__inputName" type="text" name="name" placeholder="{{ t( 'common.newsletter.name' ) }}">
                    <input class="m-infolettre__inputEmail" type="email" name="email" placeholder="{{ t( 'common.newsletter.email' ) }}">
                    <input type="submit" class="invisible" />


                    <div class="m-newsletter__error js-error"><div class="m-newsletter__error__exclamation">!</div>L'entrée du nom & prénom est oibligatoire.</div>
                    <div class="m-newsletter__success hide js-success"></div>
                </form> --}}
            </div>
        </div>
    </div>
</div>
