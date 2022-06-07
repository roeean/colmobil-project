<?php


namespace MoRestAPI\Base;

use MoRestAPI\Licensing;
use MoRestAPI\Base\InstanceHelper;
use MoRestAPI\JWTUtils;
class Loader
{
    private $instance_helper;
    public function __construct()
    {
        add_action("\x61\x64\x6d\x69\x6e\137\x65\156\161\165\145\165\145\x5f\x73\143\x72\x69\x70\164\x73", array($this, "\x70\154\x75\147\151\x6e\137\x73\145\164\164\151\x6e\147\x73\137\163\x74\x79\x6c\x65"));
        add_action("\141\144\155\x69\156\137\145\156\161\165\145\x75\x65\137\163\143\x72\x69\160\x74\x73", array($this, "\x70\x6c\165\x67\151\156\137\163\145\164\164\151\x6e\147\163\137\163\143\x72\151\160\x74"));
        $this->instance_helper = new InstanceHelper();
    }
    public function plugin_settings_style()
    {
        wp_enqueue_style("\155\157\x5f\x72\x65\x73\x74\137\x61\160\x69\137\x61\x64\x6d\x69\x6e\x5f\163\145\164\x74\x69\156\x67\163\137\163\x74\x79\x6c\x65", MRA_URL . "\x72\145\163\157\165\x72\x63\x65\x73\57\143\163\163\57\163\164\171\154\145\x5f\x73\145\x74\164\151\x6e\147\x73\x2e\143\163\x73", array(), $l9 = null, $Rn = false);
        wp_enqueue_style("\155\x6f\137\x72\145\x73\x74\x5f\141\x70\x69\x5f\x61\144\155\x69\x6e\137\x73\145\164\164\151\x6e\x67\x73\x5f\160\x68\157\x6e\x65\x5f\163\164\171\x6c\x65", MRA_URL . "\x72\145\x73\157\x75\x72\x63\145\x73\x2f\143\163\x73\x2f\x70\x68\x6f\156\x65\56\x63\163\x73", array(), $l9 = null, $Rn = false);
        wp_enqueue_style("\155\x6f\137\x72\145\163\164\x5f\141\160\x69\x5f\141\144\155\151\x6e\x5f\x73\x65\164\164\151\156\147\x73\x5f\144\x61\164\x61\164\141\x62\154\145", MRA_URL . "\x72\145\x73\157\x75\162\143\145\163\x2f\143\x73\163\x2f\152\161\165\x65\162\171\x2e\144\141\164\x61\124\x61\142\154\x65\x73\x2e\x6d\151\x6e\x2e\x63\x73\163", array(), $l9 = null, $Rn = false);
        wp_enqueue_style("\155\x6f\55\167\x70\x2d\146\157\x6e\164\x2d\141\167\145\x73\x6f\x6d\x65", MRA_URL . "\x72\x65\163\157\x75\x72\x63\145\163\x2f\x63\x73\x73\57\146\x6f\x6e\x74\55\x61\x77\145\x73\x6f\x6d\145\56\x6d\x69\156\56\143\163\163\77\x76\x65\162\x73\x69\157\156\x3d\64\56\70", array(), $l9 = null, $Rn = false);
        if (!(isset($_REQUEST["\164\141\x62"]) && "\x6c\151\x63\x65\x6e\x73\x69\x6e\x67" === $_REQUEST["\164\141\142"])) {
            goto t6;
        }
        wp_enqueue_style("\155\x6f\x5f\162\145\163\164\x5f\x61\x70\151\x5f\142\157\157\x74\x73\x74\162\x61\160\x5f\x63\x73\163", MRA_URL . "\162\x65\x73\157\x75\162\x63\x65\163\x2f\143\x73\163\x2f\142\157\157\164\x73\164\x72\x61\x70\x2f\142\x6f\x6f\164\x73\164\x72\x61\x70\x2e\155\x69\x6e\56\143\x73\x73", array(), $l9 = null, $Rn = false);
        t6:
    }
    public function plugin_settings_script()
    {
        wp_enqueue_script("\155\x6f\x5f\162\x65\x73\164\x5f\x61\160\151\137\141\144\x6d\151\156\x5f\163\145\164\x74\151\156\x67\x73\x5f\163\143\x72\x69\x70\x74", MRA_URL . "\x72\x65\163\157\x75\162\x63\145\163\x2f\x6a\163\x2f\x73\x65\x74\164\151\x6e\x67\x73\56\152\163", array(), $l9 = null, $Rn = false);
        wp_enqueue_script("\x6d\157\x5f\162\x65\x73\164\x5f\x61\x70\x69\x5f\x61\144\x6d\x69\156\137\163\145\164\164\151\x6e\147\163\137\160\150\x6f\156\145\137\x73\x63\162\x69\160\x74", MRA_URL . "\162\x65\x73\x6f\x75\x72\x63\145\x73\57\152\163\57\160\150\157\156\x65\x2e\x6a\163", array(), $l9 = null, $Rn = false);
        wp_enqueue_script("\x6d\157\137\162\x65\x73\164\x5f\x61\x70\x69\137\x61\x64\x6d\x69\x6e\x5f\163\145\164\164\x69\156\147\163\x5f\144\x61\x74\141\x74\141\x62\154\x65", MRA_URL . "\x72\x65\163\x6f\x75\162\143\x65\x73\57\x6a\x73\57\x6a\161\x75\x65\162\171\x2e\144\x61\164\x61\124\141\x62\x6c\x65\x73\x2e\x6d\x69\x6e\56\x6a\x73", array(), $l9 = null, $Rn = false);
        if (!(isset($_REQUEST["\164\141\x62"]) && "\154\151\x63\145\x6e\x73\x69\156\147" === $_REQUEST["\x74\141\x62"])) {
            goto tM;
        }
        wp_enqueue_script("\x6d\157\137\162\145\x73\164\137\x61\x70\x69\137\x6d\x6f\144\145\x72\156\x69\172\162\x5f\x73\143\162\151\x70\164", MRA_URL . "\162\x65\163\157\x75\162\x63\145\x73\57\x6a\x73\x2f\155\x6f\144\x65\162\156\x69\x7a\162\56\x6a\x73", array(), $l9 = null, $Rn = true);
        wp_enqueue_script("\x6d\157\x5f\x72\x65\163\164\137\x61\160\151\137\160\x6f\x70\x6f\x76\x65\162\137\163\x63\162\151\160\x74", MRA_URL . "\x72\145\163\x6f\165\162\x63\145\x73\x2f\152\163\x2f\142\157\x6f\x74\x73\x74\x72\141\160\57\x70\x6f\160\x70\x65\x72\x2e\x6d\x69\156\x2e\x6a\x73", array(), $l9 = null, $Rn = true);
        wp_enqueue_script("\155\x6f\137\162\145\163\164\137\x61\160\151\137\142\157\157\164\x73\164\x72\141\x70\x5f\163\x63\162\x69\160\164", MRA_URL . "\162\x65\163\x6f\x75\162\143\145\x73\x2f\152\x73\x2f\x62\157\x6f\164\163\x74\162\x61\x70\57\142\157\157\164\x73\164\x72\141\x70\56\x6d\x69\156\56\x6a\x73", array(), $l9 = null, $Rn = true);
        tM:
    }
    public function load_current_tab($wZ)
    {
        global $bC;
        $o6 = $bC->mo_rest_api_is_clv();
        if ("\141\x63\x63\x6f\165\156\x74" === $wZ || !$o6) {
            goto Ll;
        }
        if ("\x63\157\x6e\x66\151\x67" === $wZ || '' === $wZ) {
            goto MS;
        }
        if ("\160\162\157\x74\x65\x63\164\145\x64\162\x65\x73\164\141\x70\x69\x73" === $wZ) {
            goto t_;
        }
        if ("\x73\165\142\163\x69\x74\145\x73\x65\164\x74\151\156\147\x73" === $wZ) {
            goto Ym;
        }
        if ("\x6c\151\143\x65\156\163\x69\156\x67" === $wZ) {
            goto BQ;
        }
        if (!("\x61\144\166\141\156\143\145\144\163\x65\x74\x74\x69\156\147\163" === $wZ)) {
            goto R_;
        }
        $this->instance_helper->get_advance_settings_instance()->render_ui();
        R_:
        goto Et;
        t_:
        $this->instance_helper->get_protected_rest_apis_instance()->render_ui();
        goto Et;
        Ym:
        $this->instance_helper->get_multisite_settings_instance()->render_ui();
        goto Et;
        BQ:
        (new Licensing())->show_licensing_page();
        Et:
        goto wm;
        MS:
        $this->instance_helper->get_config_instance()->render_ui();
        wm:
        goto Jo;
        Ll:
        $uP = $this->instance_helper->get_accounts_instance();
        if (!$bC->mo_rest_api_is_customer_registered()) {
            goto nK;
        }
        if (!$o6) {
            goto Dn;
        }
        $uP->show_customer_info();
        goto Qz;
        nK:
        $uP->verify_password_ui();
        goto Qz;
        Dn:
        $uP->mo_api_auth_lp();
        Qz:
        Jo:
    }
}
