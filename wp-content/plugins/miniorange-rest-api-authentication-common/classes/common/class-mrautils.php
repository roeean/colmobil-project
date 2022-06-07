<?php


namespace MoRestAPI;

use MoRESTAPI\AdvanceSettings;
use MoRESTAPI\ProtectedRESTAPIs;
class MRAUtils
{
    const API_KEY_AUTH = 0;
    const BASIC_AUTH = 1;
    const JWT_AUTH = 2;
    const OAUTH_AUTH = 3;
    const EXTERNAL_OAUTH_AUTH = 4;
    const THIRD_PLUGIN_AUTH = 5;
    const ALL_INCLUSIVE = 6;
    const API_KEY_AUTH_MULTISITE = 7;
    const BASIC_AUTH_MULTISITE = 8;
    const JWT_AUTH_MULTISITE = 9;
    const OAUTH_AUTH_MULTISITE = 10;
    const THIRD_PLUGIN_AUTH_MULTISITE = 11;
    const ALL_INCLUSIVE_MULTISITE = 12;
    private $is_rest_multisite = false;
    public function __construct()
    {
        remove_action("\141\x64\x6d\x69\156\137\x6e\x6f\164\x69\143\x65\163", array($this, "\x6d\157\x5f\162\145\x73\164\137\x61\160\x69\137\x73\x75\x63\x63\145\163\163\137\x6d\x65\163\x73\141\147\x65"));
        remove_action("\x61\144\x6d\151\x6e\x5f\x6e\x6f\x74\151\x63\145\x73", array($this, "\155\157\137\x72\x65\x73\164\x5f\x61\x70\151\137\145\162\x72\x6f\162\x5f\x6d\x65\163\x73\141\x67\145"));
        add_action("\x61\x64\x6d\x69\156\137\x69\156\x69\x74", array($this, "\155\x6f\137\162\x65\163\164\x5f\141\x70\x69\x5f\x63\x6f\x6e\146\151\147\137\163\145\164\x74\151\x6e\x67\x73"));
        add_action("\x6d\157\137\x63\154\145\141\x72\x5f\160\154\165\x67\x5f\143\141\x63\x68\145", array($this, "\155\141\x6e\x61\x67\x65\x5f\144\145\x61\143\164\x69\x76\141\x74\x65\137\143\141\x63\x68\x65"));
        $this->is_multisite = boolval(get_site_option("\x6d\157\x5f\x72\145\x73\164\137\x61\x70\151\x5f\151\x73\x4d\x75\154\164\x69\x53\x69\164\x65\x50\x6c\165\x67\151\156\x52\x65\x71\165\145\163\x74\145\x64")) ? true : ($this->is_multisite_versi() ? true : false);
    }
    public function manage_deactivate_cache()
    {
        $p7 = new \MoRESTAPI\Customer();
        $p7->manage_deactivate_cache();
    }
    public function is_multisite_plan()
    {
        return $this->is_multisite;
    }
    public function is_multisite_versi()
    {
        return $this->get_versi() >= 3;
    }
    public function mo_rest_api_config_settings()
    {
        $r7 = new AdvanceSettings();
        $r7->mo_rest_api_save_settings();
        $vQ = new ProtectedRESTAPIs();
        $vQ->mo_rest_api_save_settings();
    }
    public function mo_rest_api_success_message()
    {
        $c7 = "\x75\x70\x64\x61\x74\x65\144";
        $V6 = $this->mo_rest_api_authentication_get_option(\MoRestAPIConstants::PANEL_MESSAGE_OPTION);
        echo "\74\x64\x69\166\40\143\154\141\163\163\75\47" . $c7 . "\x27\x3e\x20\74\160\76" . $V6 . "\74\57\160\76\74\57\144\151\x76\76";
    }
    public function mo_rest_api_error_message()
    {
        $c7 = "\145\162\162\x6f\162";
        $V6 = $this->mo_rest_api_authentication_get_option(\MoRestAPIConstants::PANEL_MESSAGE_OPTION);
        echo "\x3c\x64\151\x76\40\x63\154\x61\163\x73\x3d\47" . $c7 . "\47\76\74\x70\x3e" . $V6 . "\x3c\x2f\x70\76\74\x2f\144\151\x76\x3e";
    }
    public function mo_rest_api_show_success_message()
    {
        remove_action("\x61\144\x6d\x69\x6e\x5f\x6e\157\x74\151\x63\x65\163", array($this, "\x6d\157\137\162\x65\163\x74\x5f\x61\160\151\137\x65\x72\x72\157\x72\x5f\155\145\x73\x73\x61\147\145"));
        add_action("\x61\144\x6d\151\156\137\156\157\164\151\x63\145\x73", array($this, "\155\x6f\x5f\x72\x65\163\164\x5f\x61\x70\x69\137\163\165\x63\x63\145\163\163\137\155\x65\x73\163\x61\147\145"));
    }
    public function isJson($Ux)
    {
        return json_decode($Ux) == null ? false : true;
    }
    public function send_json_response($MH)
    {
        $ga = isset($MH["\x63\157\144\x65"]) ? $MH["\x63\x6f\144\145"] : 200;
        wp_send_json($MH, $ga);
    }
    public function mo_rest_api_show_error_message()
    {
        remove_action("\141\x64\x6d\x69\156\137\x6e\x6f\x74\x69\x63\145\163", array($this, "\155\x6f\x5f\x72\145\163\164\x5f\x61\160\x69\x5f\x73\165\143\143\x65\x73\163\137\155\145\163\163\141\x67\x65"));
        add_action("\141\x64\x6d\151\x6e\x5f\156\157\x74\151\x63\x65\163", array($this, "\x6d\157\137\x72\x65\x73\x74\x5f\141\160\151\x5f\x65\162\162\x6f\x72\x5f\155\145\x73\163\141\147\x65"));
    }
    public function mo_rest_api_is_customer_registered()
    {
        $Gf = $this->mo_rest_api_authentication_get_option("\155\x6f\137\141\x70\151\137\x61\165\x74\x68\145\156\x74\151\x63\x61\x74\x69\157\x6e\x5f\x61\x64\155\151\x6e\137\145\x6d\141\151\154");
        $Xu = $this->mo_rest_api_authentication_get_option("\155\157\x5f\x61\x70\x69\x5f\x61\x75\164\x68\x65\156\x74\151\143\x61\x74\151\x6f\156\137\141\144\155\151\x6e\x5f\x63\165\x73\164\x6f\x6d\145\162\137\153\x65\171");
        if (!$Gf || !$Xu || !is_numeric(trim($Xu))) {
            goto cE;
        }
        return 1;
        goto Jr;
        cE:
        return 0;
        Jr:
    }
    public function morestapiencrypt($W0)
    {
        $vo = $this->mo_rest_api_authentication_get_option("\155\x6f\137\x61\160\x69\x5f\x61\x75\164\x68\145\156\x74\151\x63\x61\164\x69\x6f\156\137\x63\165\x73\x74\157\x6d\x65\x72\x5f\x74\x6f\x6b\x65\x6e");
        if ($vo) {
            goto OH;
        }
        return "\146\x61\154\163\145";
        OH:
        $vo = str_split(str_pad('', strlen($W0), $vo, STR_PAD_RIGHT));
        $B2 = str_split($W0);
        foreach ($B2 as $rY => $sM) {
            $mn = ord($sM) + ord($vo[$rY]);
            $B2[$rY] = chr($mn > 255 ? $mn - 256 : $mn);
            n2:
        }
        Gn:
        return base64_encode(join('', $B2));
    }
    public function morestapidecrypt($W0)
    {
        $W0 = base64_decode($W0);
        $vo = $this->mo_rest_api_authentication_get_option("\155\x6f\137\141\160\x69\x5f\141\165\x74\150\145\156\x74\151\143\x61\164\x69\x6f\156\x5f\143\165\163\164\x6f\155\145\x72\137\x74\157\x6b\x65\x6e");
        if ($vo) {
            goto dY;
        }
        return "\146\x61\154\x73\x65";
        dY:
        $vo = str_split(str_pad('', strlen($W0), $vo, STR_PAD_RIGHT));
        $B2 = str_split($W0);
        foreach ($B2 as $rY => $sM) {
            $mn = ord($sM) - ord($vo[$rY]);
            $B2[$rY] = chr($mn < 0 ? $mn + 256 : $mn);
            fa:
        }
        Yk:
        return join('', $B2);
    }
    public function mo_rest_api_check_empty_or_null($pj)
    {
        if (!(!isset($pj) || empty($pj))) {
            goto rD;
        }
        return true;
        rD:
        return false;
    }
    public function mo_rest_api_is_curl_installed()
    {
        if (in_array("\x63\165\162\154", get_loaded_extensions())) {
            goto E0;
        }
        return 0;
        goto dw;
        E0:
        return 1;
        dw:
    }
    public function mo_rest_api_show_curl_error()
    {
        if (!($this->mo_rest_api_is_curl_installed() === 0)) {
            goto bB;
        }
        $this->mo_rest_api_authentication_update_option(\MoRestAPIConstants::PANEL_MESSAGE_OPTION, "\x3c\x61\x20\x68\162\145\x66\x3d\x22\x68\x74\164\160\x3a\x2f\57\160\x68\160\56\156\145\x74\x2f\155\141\156\x75\x61\154\x2f\145\156\57\x63\165\x72\x6c\56\151\156\163\164\x61\x6c\x6c\141\164\x69\x6f\x6e\56\x70\150\x70\x22\40\164\141\162\x67\145\164\75\42\x5f\142\154\141\156\153\42\x3e\x50\x48\120\40\x43\125\122\114\40\145\x78\x74\x65\x6e\163\x69\157\156\x3c\57\141\x3e\40\x69\x73\40\x6e\157\164\40\x69\x6e\163\x74\x61\x6c\154\x65\144\x20\157\162\x20\144\151\x73\x61\142\154\145\144\56\40\x50\154\145\141\163\145\x20\x65\156\141\142\154\x65\x20\151\x74\40\164\x6f\40\x63\157\x6e\164\151\x6e\x75\x65\x2e");
        $this->mo_rest_api_show_error_message();
        return;
        bB:
    }
    public function mo_rest_api_is_clv()
    {
        $Mu = $this->mo_rest_api_authentication_get_option("\x6d\157\137\141\160\x69\x5f\141\x75\x74\150\145\x6e\x74\x69\143\141\x74\151\x6f\156\137\x6c\166");
        $Mu = boolval($Mu) ? $this->morestapidecrypt($Mu) : "\146\141\154\163\x65";
        $Mu = !empty($this->mo_rest_api_authentication_get_option("\x6d\x6f\x5f\141\160\151\x5f\x61\165\164\x68\x65\x6e\164\151\143\141\164\x69\x6f\x6e\x5f\x6c\153")) && "\x74\162\165\x65" === $Mu ? 1 : 0;
        if (!(0 === $Mu)) {
            goto Zw;
        }
        return $this->verify_lk();
        Zw:
        return $Mu;
    }
    public function check_versi($eW)
    {
        return $this->get_versi() >= $eW;
    }
    public function get_versi()
    {
        switch (MRA_VERSION) {
            case "\155\157\x5f\162\x65\163\x74\137\141\160\151\137\x6b\x65\171\137\141\x75\164\150":
                return self::API_KEY_AUTH;
            case "\155\157\x5f\162\145\x73\164\137\142\x61\163\151\x63\x5f\141\165\164\150":
                return self::BASIC_AUTH;
            case "\x6d\157\137\x72\145\x73\164\137\x6a\x77\x74\137\141\165\164\150":
                return self::JWT_AUTH;
            case "\155\157\x5f\x72\x65\163\x74\137\x6f\x61\x75\x74\150\137\141\165\x74\150":
                return self::OAUTH_AUTH;
            case "\155\157\137\x72\145\163\164\x5f\145\170\x74\x65\x72\156\141\154\x5f\x6f\141\165\164\150\137\141\165\164\x68":
                return self::EXTERNAL_OAUTH_AUTH;
            case "\x6d\157\137\162\x65\x73\164\137\164\150\151\x72\x64\x5f\x70\x6c\x75\147\151\156\137\x61\x75\164\150":
                return self::THIRD_PLUGIN_AUTH;
            case "\x6d\157\x5f\162\145\x73\164\137\x61\x6c\154\137\x69\x6e\x63\154\x75\x73\x69\166\x65":
                return self::ALL_INCLUSIVE;
            case "\x6d\x6f\137\x72\x65\x73\x74\x5f\141\160\151\137\x6b\x65\x79\x5f\x6d\165\154\164\151\163\151\164\145":
                return self::API_KEY_AUTH_MULTISITE;
            case "\x6d\157\x5f\162\x65\163\164\137\x62\x61\x73\151\143\137\x61\x75\164\x68\x5f\155\x75\154\164\x69\x73\x69\x74\145":
                return self::BASIC_AUTH_MULTISITE;
            case "\155\157\137\162\x65\163\164\x5f\152\167\164\x5f\141\x75\164\150\x5f\x6d\x75\154\x74\x69\163\151\164\x65":
                return self::JWT_AUTH_MULTISITE;
            case "\155\x6f\137\x72\145\163\x74\137\x6f\141\x75\x74\150\137\x61\165\164\150\137\x6d\x75\x6c\x74\x69\163\151\x74\x65":
                return self::OAUTH_AUTH_MULTISITE;
            case "\155\x6f\137\162\x65\163\x74\137\145\170\x74\x65\x72\x6e\141\154\x5f\157\x61\165\164\x68\x5f\141\165\164\150\x5f\155\x75\154\x74\x69\x73\x69\164\145":
                return self::EXTERNAL_OAUTH_AUTH_MULTISITE;
            case "\x6d\x6f\x5f\162\145\x73\164\137\x74\x68\151\162\x64\x5f\x70\154\x75\147\x69\156\137\141\165\x74\x68\137\155\165\154\x74\x69\163\x69\x74\145":
                return self::THIRD_PLUGIN_AUTH_MULTISITE;
            case "\x6d\157\x5f\x72\x65\x73\x74\x5f\141\154\x6c\x5f\x69\156\143\154\165\x73\151\x76\145\x5f\155\x75\x6c\164\151\x73\x69\164\x65":
                return self::ALL_INCLUSIVE_MULTISITE;
            default:
                return self::API_KEY_AUTH;
        }
        Fb:
        Dv:
    }
    public function get_versi_str()
    {
        switch ($this->get_versi()) {
            case self::API_KEY_AUTH:
                return "\143\x75\x73\164\157\155\137\x61\160\x69\x5f\153\145\x79";
            case self::BASIC_AUTH:
                return "\x63\165\x73\x74\157\155\x5f\x62\x61\163\x69\x63\137\141\165\x74\150";
            case self::JWT_AUTH:
                return "\x63\x75\x73\164\157\155\137\x6a\x77\164";
            case self::OAUTH_AUTH:
                return "\x63\165\x73\164\x6f\155\137\x6f\141\x75\164\x68\137\141\165\x74\150";
            case self::EXTERNAL_OAUTH_AUTH:
                return "\146\x72\157\155\x5f\x65\170\164\145\162\x6e\141\x6c\x5f\x6f\x61\x75\x74\150\137\160\x72\x6f\x76\151\144\x65\162";
            case self::THIRD_PLUGIN_AUTH:
                return "\143\165\x73\164\x6f\x6d\x5f\x61\x70\x69\x73";
            case self::ALL_INCLUSIVE:
                return "\x65\x6e\x74\x65\x72\x70\x72\151\x73\145";
            case self::API_KEY_AUTH_MULTISITE:
                return "\x63\165\163\164\x6f\x6d\x5f\x61\160\x69\137\x6b\x65\x79\x5f\155\x75\154\164\x69\x73\151\x74\x65";
            case self::BASIC_AUTH_MULTISITE:
                return "\143\165\x73\x74\157\x6d\137\x62\141\x73\x69\143\x5f\x61\x75\164\150\x5f\155\x75\154\x74\151\x73\151\x74\x65";
            case self::JWT_AUTH_MULTISITE:
                return "\x63\165\163\x74\157\155\137\x6a\167\x74\x5f\155\165\x6c\x74\x69\x73\x69\x74\x65";
            case self::OAUTH_AUTH_MULTISITE:
                return "\143\x75\x73\164\x6f\155\137\157\x61\x75\x74\150\x5f\x61\165\x74\150\x5f\x6d\165\x6c\x74\x69\163\151\x74\x65";
            case self::EXTERNAL_OAUTH_AUTH_MULTISITE:
                return "\146\162\x6f\155\137\x65\x78\164\x65\162\x6e\141\154\x5f\x6f\x61\x75\x74\x68\x5f\160\x72\x6f\166\151\x64\x65\x72\137\x6d\x75\154\x74\151\163\x69\x74\x65";
            case self::THIRD_PLUGIN_AUTH_MULTISITE:
                return "\143\x75\163\x74\x6f\155\x5f\x61\160\151\163\x5f\x6d\x75\x6c\x74\x69\x73\x69\164\145";
            case self::ALL_INCLUSIVE_MULTISITE:
                return "\x65\x6e\164\x65\x72\x70\x72\151\163\x65\137\x6d\x75\154\164\x69\x73\151\164\x65";
            default:
                return "\143\x75\163\x74\x6f\x6d\137\x61\160\151\x5f\x6b\x65\x79";
        }
        JA:
        vG:
    }
    public function get_plan_type_str()
    {
        switch ($this->get_versi()) {
            case self::API_KEY_AUTH:
                return "\x41\120\x49\137\x4b\105\131\137\x43\125\123\x54\117\x4d\137\120\114\x55\107\111\116";
            case self::BASIC_AUTH:
                return "\x42\101\123\111\103\137\101\x55\124\x48\137\x43\x55\x53\x54\x4f\x4d\x5f\x50\114\x55\107\x49\116";
            case self::JWT_AUTH:
                return "\x4a\127\x54\x5f\x43\x55\123\x54\117\115\137\x50\x4c\x55\107\111\116";
            case self::OAUTH_AUTH:
                return "\103\x55\123\x54\x4f\115\137\117\x41\x55\x54\110\x5f\101\x55\124\110\137\x50\114\x41\116";
            case self::EXTERNAL_OAUTH_AUTH:
                return "\106\122\x4f\115\x5f\105\x58\x54\105\x52\116\101\x4c\137\117\x41\125\x54\110\x5f\x50\122\117\x56\x49\x44\x45\122\137\120\x4c\x41\x4e";
            case self::THIRD_PLUGIN_AUTH:
                return "\x43\x55\123\x54\117\115\x5f\x41\x50\111\123\x5f\x50\114\x41\x4e";
            case self::ALL_INCLUSIVE:
                return "\x45\116\124\x45\122\x50\122\x49\x53\x45\x5f\x50\x4c\x55\x47\x49\116";
            case self::API_KEY_AUTH_MULTISITE:
                return "\101\x50\x49\x5f\113\x45\131\x5f\x43\x55\123\x54\x4f\x4d\x5f\x4d\125\x4c\x54\x49\123\111\x54\x45\x5f\120\x4c\125\107\x49\x4e";
            case self::BASIC_AUTH_MULTISITE:
                return "\102\101\x53\x49\x43\137\101\x55\124\x48\x5f\x43\x55\123\124\117\x4d\x5f\x4d\125\114\124\111\123\x49\x54\105\x5f\x50\114\x55\107\111\116";
            case self::JWT_AUTH_MULTISITE:
                return "\112\127\x54\x5f\103\125\123\x54\x4f\x4d\x5f\x4d\x55\x4c\124\111\x53\111\124\x45\137\x50\x4c\125\x47\111\116";
            case self::OAUTH_AUTH_MULTISITE:
                return "\103\125\123\x54\x4f\115\137\x4f\x41\x55\124\x48\137\101\125\x54\x48\137\x4d\x55\114\x54\111\x53\x49\x54\x45\x5f\x50\x4c\x41\x4e";
            case self::EXTERNAL_OAUTH_AUTH_MULTISITE:
                return "\106\122\117\115\x5f\105\x58\124\x45\x52\116\101\x4c\137\x4f\101\125\124\110\x5f\120\x52\x4f\126\x49\x44\x45\122\137\115\x55\x4c\x54\x49\x53\x49\x54\105\137\x50\x4c\x41\x4e";
            case self::THIRD_PLUGIN_AUTH_MULTISITE:
                return "\x43\x55\x53\124\117\x4d\137\x41\120\111\x53\137\x4d\125\114\124\111\123\x49\124\x45\137\120\x4c\x41\116";
            case self::ALL_INCLUSIVE_MULTISITE:
                return "\105\x4e\124\105\x52\120\122\111\x53\105\137\115\125\x4c\124\x49\123\111\124\x45\x5f\120\114\125\x47\111\116";
            default:
                return "\x41\x50\111\x5f\x4b\x45\x59\137\x43\125\123\x54\117\115\x5f\115\x55\x4c\x54\111\x53\111\x54\x45\x5f\120\114\x55\x47\x49\x4e";
        }
        sc:
        xR:
    }
    public function get_versi_str_support()
    {
        switch ($this->get_versi()) {
            case self::API_KEY_AUTH:
                return "\103\165\x73\164\157\155\40\101\x50\111\40\x4b\x65\171";
            case self::BASIC_AUTH:
                return "\103\165\x73\x74\157\x6d\40\102\141\x73\151\143\x20\101\x75\x74\x68";
            case self::JWT_AUTH:
                return "\103\x75\x73\164\x6f\x6d\40\112\127\x54\40\101\x75\164\150";
            case self::OAUTH_AUTH:
                return "\103\165\163\x74\157\x6d\x20\x4f\101\165\x74\x68\x20\x41\x75\x74\150";
            case self::EXTERNAL_OAUTH_AUTH:
                return "\124\150\151\x72\x64\40\120\x61\162\164\171\40\x4f\x41\165\164\x68\x20\120\x72\x6f\x76\151\x64\x65\162";
            case self::THIRD_PLUGIN_AUTH:
                return "\103\x75\163\x74\x6f\x6d\x20\120\154\x75\x67\x69\156";
            case self::ALL_INCLUSIVE:
                return "\101\x6c\154\x20\x49\156\x63\x6c\x75\x73\151\x76\x65";
            case self::API_KEY_AUTH_MULTISITE:
                return "\101\x6c\154\40\x49\x6e\143\154\x75\163\151\x76\x65";
            case self::BASIC_AUTH_MULTISITE:
                return "\x41\x6c\154\x20\x49\x6e\x63\x6c\x75\x73\151\166\145";
            case self::JWT_AUTH_MULTISITE:
                return "\x41\154\x6c\x20\x49\x6e\143\x6c\165\163\151\166\145";
            case self::OAUTH_AUTH_MULTISITE:
                return "\x41\154\x6c\x20\x49\156\143\x6c\165\x73\x69\x76\145";
            case self::EXTERNAL_OAUTH_AUTH_MULTISITE:
                return "\x41\x6c\x6c\40\x49\x6e\143\x6c\165\163\x69\x76\145";
            case self::THIRD_PLUGIN_AUTH_MULTISITE:
                return "\x41\154\154\40\x49\x6e\143\x6c\165\163\151\166\145";
            case self::ALL_INCLUSIVE_MULTISITE:
                return "\101\x6c\x6c\x20\x49\x6e\x63\154\165\163\151\166\x65";
            default:
                return "\143\165\x73\x74\157\155\x5f\x61\160\151\137\153\145\171";
        }
        XY:
        YK:
    }
    public function mo_rest_api_authentication_get_option($O8, $hi = false)
    {
        $pj = is_multisite() && $this->is_multisite ? get_site_option($O8, $hi) : get_option($O8, $hi);
        if (!(!$pj || $hi === $pj)) {
            goto O2;
        }
        return $hi;
        O2:
        return $pj;
    }
    public function mo_rest_api_authentication_update_option($O8, $pj)
    {
        return is_multisite() && $this->is_multisite ? update_site_option($O8, $pj) : update_option($O8, $pj);
    }
    public function mo_rest_api_authentication_set_transient($O8, $pj, $iM)
    {
        return set_transient($O8, $pj, $iM);
    }
    public function mo_rest_api_authentication_get_transient($O8)
    {
        return get_transient($O8);
    }
    public function mo_rest_api_authentication_delete_option($O8)
    {
        return is_multisite() && $this->is_multisite ? delete_site_option($O8) : delete_option($O8);
    }
    public function array_overwrite($Pd, $r5, $fm)
    {
        if ($fm) {
            goto rc;
        }
        array_push($Pd, $r5);
        return array_unique($Pd);
        rc:
        foreach ($r5 as $O8 => $pj) {
            $Pd[$O8] = $pj;
            H7:
        }
        fd:
        return $Pd;
    }
    public function gen_rand_str($iI = 10)
    {
        $dt = "\141\x62\143\x64\145\x66\x67\150\151\x6a\x6b\154\x6d\x6e\x6f\x70\161\162\163\164\x75\x76\167\x78\x79\x7a\x41\102\103\104\105\106\107\x48\x49\112\x4b\114\115\x4e\x4f\x50\121\x52\123\124\x55\126\127\130\131\x5a";
        $dY = strlen($dt);
        $qQ = '';
        $uZ = 0;
        Vo:
        if (!($uZ < $iI)) {
            goto QP;
        }
        $qQ .= $dt[rand(0, $dY - 1)];
        cg:
        $uZ++;
        goto Vo;
        QP:
        return $qQ;
    }
    public function parse_url($gg)
    {
        $h_ = array();
        $rO = explode("\x3f", $gg);
        $h_["\150\157\x73\164"] = $rO[0];
        $h_["\161\x75\x65\162\171"] = isset($rO[1]) && '' !== $rO[1] ? $rO[1] : '';
        if (!(empty($h_["\161\x75\x65\x72\171"]) || '' === $h_["\161\165\145\x72\171"])) {
            goto SK;
        }
        return $h_;
        SK:
        $Sv = [];
        foreach (explode("\46", $h_["\161\165\145\x72\x79"]) as $Nf) {
            $rO = explode("\x3d", $Nf);
            if (!(is_array($rO) && count($rO) === 2)) {
                goto Jv;
            }
            $Sv[str_replace("\x61\155\160\73", '', $rO[0])] = $rO[1];
            Jv:
            if (!(is_array($rO) && "\x73\x74\141\164\145" === $rO[0])) {
                goto Gc;
            }
            $rO = explode("\163\164\141\x74\145\x3d", $Nf);
            $Sv["\x73\x74\141\164\145"] = $rO[1];
            Gc:
            FG:
        }
        jp:
        $h_["\161\x75\x65\162\x79"] = is_array($Sv) && !empty($Sv) ? $Sv : [];
        return $h_;
    }
    public function generate_url($Q2)
    {
        if (!(!is_array($Q2) || empty($Q2))) {
            goto Pq;
        }
        return '';
        Pq:
        if (isset($Q2["\150\x6f\163\164"])) {
            goto gL;
        }
        return '';
        gL:
        $gg = $Q2["\x68\x6f\x73\x74"];
        $Lf = '';
        $uZ = 0;
        foreach ($Q2["\x71\165\145\x72\171"] as $Se => $pj) {
            if (!(0 !== $uZ)) {
                goto uL;
            }
            $Lf .= "\x26";
            uL:
            $Lf .= "{$Se}\75{$pj}";
            ++$uZ;
            Pe:
        }
        dV:
        return $gg . "\77" . $Lf;
    }
    public function get_client_ip()
    {
        $Nd = '';
        if (getenv("\x48\124\x54\120\137\103\x4c\111\105\116\124\137\x49\x50")) {
            goto A4;
        }
        if (getenv("\x48\x54\x54\120\x5f\x58\x5f\106\117\x52\x57\101\x52\104\x45\104\137\x46\x4f\122")) {
            goto ph;
        }
        if (getenv("\x48\x54\124\x50\137\x58\137\106\x4f\122\127\101\122\104\105\x44")) {
            goto g9;
        }
        if (getenv("\x48\124\x54\x50\137\106\x4f\x52\x57\101\122\x44\x45\104\x5f\106\117\x52")) {
            goto Lx;
        }
        if (getenv("\x48\124\x54\x50\x5f\106\x4f\122\x57\x41\122\x44\x45\104")) {
            goto YZ;
        }
        if (getenv("\x52\105\115\117\124\105\137\101\104\x44\x52")) {
            goto Y2;
        }
        $Nd = "\125\x4e\x4b\x4e\117\127\116";
        goto nn;
        A4:
        $Nd = getenv("\110\x54\x54\120\x5f\x43\x4c\x49\x45\116\x54\x5f\111\x50");
        goto nn;
        ph:
        $Nd = getenv("\x48\x54\124\120\x5f\130\x5f\x46\x4f\x52\127\101\x52\x44\x45\104\137\x46\x4f\122");
        goto nn;
        g9:
        $Nd = getenv("\110\x54\124\x50\137\x58\137\x46\x4f\122\127\x41\122\104\105\104");
        goto nn;
        Lx:
        $Nd = getenv("\x48\124\x54\x50\x5f\106\x4f\122\x57\101\x52\104\105\x44\137\106\x4f\x52");
        goto nn;
        YZ:
        $Nd = getenv("\x48\124\x54\120\x5f\x46\x4f\122\x57\x41\122\x44\x45\x44");
        goto nn;
        Y2:
        $Nd = getenv("\x52\105\x4d\117\124\x45\137\101\x44\x44\122");
        nn:
        return $Nd;
    }
    public function get_current_url()
    {
        return (isset($_SERVER["\x48\x54\124\120\123"]) ? "\150\x74\x74\160\x73" : "\150\x74\x74\160") . "\x3a\57\x2f{$_SERVER["\110\x54\x54\x50\137\110\x4f\x53\124"]}{$_SERVER["\x52\x45\x51\x55\105\x53\x54\x5f\x55\x52\x49"]}";
    }
    public function get_current_rest_url()
    {
        $qZ = isset($GLOBALS["\167\x70"]->query_vars["\162\145\x73\x74\x5f\162\157\165\x74\x65"]) ? $GLOBALS["\167\160"]->query_vars["\162\145\163\x74\137\162\157\x75\164\x65"] : $this->get_current_url();
        return empty($qZ) || "\x2f" == $qZ ? $qZ : untrailingslashit($qZ);
    }
    public function get_all_headers()
    {
        $x3 = [];
        foreach ($_SERVER as $zV => $pj) {
            if (!(substr($zV, 0, 5) == "\x48\124\124\120\137")) {
                goto an;
            }
            $x3[str_replace("\x20", "\x2d", ucwords(strtolower(str_replace("\137", "\x20", substr($zV, 5)))))] = $pj;
            an:
            fP:
        }
        Bm:
        $x3 = array_change_key_case($x3, CASE_UPPER);
        return $x3;
    }
    public function store_info($dJ = '', $pj = false)
    {
        if (!('' === $dJ || !$pj)) {
            goto Ml;
        }
        return;
        Ml:
        setcookie($dJ, $pj);
    }
    public function deactivate_plugin()
    {
        $this->mo_rest_api_authentication_delete_option("\150\x6f\x73\164\x5f\156\x61\155\145");
        $this->mo_rest_api_authentication_delete_option("\x6e\x65\167\x5f\x72\145\147\151\163\x74\x72\x61\164\x69\157\156");
        $this->mo_rest_api_authentication_delete_option("\155\x6f\x5f\x61\x70\151\x5f\141\165\164\x68\x65\x6e\164\x69\143\x61\164\x69\x6f\x6e\x5f\141\x64\x6d\151\156\x5f\145\x6d\141\x69\x6c");
        $this->mo_rest_api_authentication_delete_option("\155\157\137\x61\160\151\x5f\x61\165\x74\x68\145\156\x74\151\x63\x61\164\x69\x6f\156\137\x61\144\155\151\156\137\160\150\x6f\156\x65");
        $this->mo_rest_api_authentication_delete_option("\155\157\x5f\141\x70\x69\x5f\141\x75\x74\x68\x65\156\164\151\143\141\x74\x69\x6f\x6e\137\141\144\x6d\151\x6e\x5f\x66\156\x61\x6d\145");
        $this->mo_rest_api_authentication_delete_option("\155\x6f\x5f\141\x70\151\137\x61\x75\x74\150\x65\x6e\164\151\x63\x61\164\151\x6f\x6e\137\x61\144\155\x69\x6e\137\154\x6e\141\x6d\x65");
        $this->mo_rest_api_authentication_delete_option("\x6d\x6f\137\x61\160\151\137\141\165\164\x68\145\156\x74\x69\143\x61\x74\x69\x6f\x6e\x5f\141\x64\155\x69\x6e\137\143\x6f\x6d\x70\141\x6e\171");
        $this->mo_rest_api_authentication_delete_option(\MoRestAPIConstants::PANEL_MESSAGE_OPTION);
        $this->mo_rest_api_authentication_delete_option("\155\157\x5f\x61\160\x69\137\x61\165\164\150\145\x6e\164\x69\143\141\x74\x69\157\x6e\x5f\x61\x64\x6d\x69\x6e\x5f\143\x75\163\164\x6f\x6d\x65\162\x5f\x6b\145\171");
        $this->mo_rest_api_authentication_delete_option("\x6d\157\x5f\141\x70\x69\137\x61\165\164\150\145\x6e\x74\151\x63\141\164\x69\157\156\x5f\141\144\155\151\x6e\137\x61\x70\151\x5f\x6b\x65\x79");
        $this->mo_rest_api_authentication_delete_option("\x6d\x6f\137\141\160\x69\137\x61\x75\x74\150\x65\156\x74\151\x63\x61\164\151\x6f\156\x5f\156\x65\167\137\x63\x75\x73\x74\x6f\x6d\x65\x72");
        $this->mo_rest_api_authentication_delete_option("\x6d\157\x5f\x61\x70\x69\x5f\x61\x75\164\150\145\156\164\x69\x63\141\x74\x69\x6f\x6e\137\x72\145\x67\x69\x73\164\x72\141\164\151\x6f\156\x5f\x73\x74\141\x74\165\163");
        $this->mo_rest_api_authentication_delete_option("\x6d\157\137\141\160\x69\x5f\x61\165\x74\150\145\x6e\x74\151\x63\141\164\151\x6f\156\137\143\x75\x73\164\157\x6d\145\162\137\x74\157\x6b\x65\156");
        $this->mo_rest_api_authentication_delete_option("\x6d\157\x5f\141\x70\x69\x5f\x61\x75\x74\x68\x65\x6e\x74\x69\x63\141\x74\x69\x6f\x6e\137\154\x6b");
        $this->mo_rest_api_authentication_delete_option("\155\157\x5f\x61\x70\151\x5f\141\165\164\x68\x65\x6e\x74\x69\143\141\x74\x69\x6f\156\x5f\x6c\166");
    }
    public function base64url_encode($Ea)
    {
        return rtrim(strtr(base64_encode($Ea), "\x2b\57", "\55\x5f"), "\x3d");
    }
    public function base64url_decode($Ea)
    {
        return base64_decode(str_pad(strtr($Ea, "\x2d\137", "\x2b\57"), strlen($Ea) % 4, "\x3d", STR_PAD_RIGHT));
    }
    private function verify_lk()
    {
        $GN = new \MoRestAPI\Customer();
        $ga = $this->mo_rest_api_authentication_get_option("\x6d\x6f\137\141\x70\151\x5f\x61\x75\164\x68\x65\156\x74\151\x63\141\164\151\157\x6e\x5f\x6c\x69\x63\x65\x6e\x73\145\137\x6b\145\171");
        if (!empty($ga)) {
            goto Ld;
        }
        return 0;
        Ld:
        $G1 = $GN->XfskodsfhHJ($ga);
        $G1 = json_decode($G1, true);
        return isset($G1["\163\164\x61\164\x75\x73"]) && "\x53\x55\x43\103\x45\123\123" === $G1["\163\x74\x61\x74\x75\163"];
    }
}
