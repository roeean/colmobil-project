<?php


namespace MoRESTAPI;

use MoRESTAPI\Config;
class ConfigurationSettings
{
    private $plugin_config;
    public function __construct()
    {
        $this->plugin_config = new Config();
    }
    public function mo_rest_api_save_settings()
    {
        if (!(isset($_POST["\155\x6f\137\162\145\163\164\x5f\141\160\151\137\143\x6f\x6e\146\151\147\x5f\156\157\x6e\143\145"]) && wp_verify_nonce(sanitize_text_field(wp_unslash($_POST["\x6d\x6f\x5f\x72\145\163\x74\x5f\141\160\x69\x5f\143\157\156\x66\151\x67\x5f\x6e\157\x6e\143\145"])), "\155\x6f\137\162\x65\163\x74\137\141\x70\x69\x5f\x63\157\x6e\146\x69\147\137\163\145\164\164\151\x6e\x67\x73") && (isset($_POST[\MoRestAPIConstants::OPTION]) && "\x6d\157\x5f\x72\145\x73\x74\137\141\x70\151\x5f\x63\x6f\x6e\x66\x69\x67\x5f\163\145\164\164\151\156\147\163" === $_POST[\MoRestAPIConstants::OPTION]))) {
            goto CI;
        }
        global $bC;
        if (isset($_POST["\x61\x63\x74\x69\x6f\156"]) && "\x53\141\166\145\40\x43\x6f\x6e\x66\151\147\165\162\x61\x74\151\x6f\156" === $_POST["\x61\143\x74\x69\157\x6e"]) {
            goto eM;
        }
        if (!(isset($_POST["\x61\x63\x74\x69\x6f\x6e"]) && "\x52\x65\163\x65\x74" === $_POST["\141\143\164\x69\x6f\x6e"])) {
            goto hn;
        }
        $bC->mo_rest_api_authentication_delete_option("\x6d\157\137\141\x70\151\x5f\141\x75\x74\150\x65\156\x74\x69\143\x61\x74\151\x6f\156\137\x73\145\154\145\143\164\145\x64\x5f\141\165\164\x68\x65\x6e\x74\151\x63\141\164\x69\x6f\156\137\x6d\x65\164\150\x6f\144");
        $bC->mo_rest_api_authentication_delete_option("\x6d\157\137\141\160\x69\x5f\x61\165\164\x68\x65\x6e\x74\151\143\141\164\x69\x6f\156\137\155\x65\164\150\157\144\x5f\145\x78\x74\162\141\x73");
        hn:
        goto cr;
        eM:
        $fx = $this->plugin_config;
        $this->change_current_config($_POST, $fx);
        cr:
        CI:
    }
    public function change_current_config($post, $fx)
    {
        global $bC;
        $bC->mo_rest_api_authentication_update_option("\155\x6f\x5f\x61\160\151\x5f\141\x75\164\x68\x65\156\x74\151\143\141\164\151\157\x6e\x5f\163\145\154\145\x63\x74\145\144\x5f\x61\165\164\x68\145\x6e\x74\x69\143\x61\164\x69\x6f\156\137\x6d\145\164\150\x6f\144", isset($post["\155\x6f\137\x61\160\x69\x5f\x61\x75\164\x68\145\x6e\x74\151\x63\141\164\151\x6f\x6e\137\x73\145\x6c\145\143\164\x65\144\137\141\165\x74\150\x65\x6e\164\151\x63\141\x74\x69\157\x6e\137\x6d\x65\164\x68\157\144"]) ? stripslashes(wp_unslash($post["\155\x6f\137\x61\x70\x69\137\141\165\x74\150\x65\x6e\164\x69\x63\x61\164\x69\x6f\156\x5f\163\x65\x6c\145\143\164\145\x64\x5f\141\165\164\x68\145\x6e\164\151\x63\x61\164\x69\x6f\156\x5f\155\x65\x74\150\x6f\144"])) : '');
    }
}
