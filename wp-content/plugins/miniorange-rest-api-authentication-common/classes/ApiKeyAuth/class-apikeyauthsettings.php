<?php


namespace MoRESTAPI\Methods;

use MoRESTAPI\ApiKeyAuth\ConfigurationSettings;
use MoRESTAPI\JWTUtils;
use MoRESTAPI\RESTAPIHandler;
class ApiKeyAuth
{
    private $method_slug;
    public function __construct()
    {
        add_action("\141\x64\x6d\x69\x6e\x5f\x69\156\151\x74", array($this, "\155\x6f\137\162\x65\163\164\137\x61\160\151\137\x6b\x65\171\137\163\x65\x74\x74\x69\x6e\x67\x73"));
        add_action("\167\x70\137\141\152\141\170\137\x72\145\147\x65\x6e\x65\162\x61\164\x65\x5f\164\157\x6b\145\x6e", array($this, "\162\x65\x67\145\x6e\145\x72\x61\164\145\x5f\164\x6f\153\x65\156"));
        add_action("\167\x70\137\141\152\141\170\137\155\x6f\x5f\x61\160\151\137\x61\165\x74\150\137\143\162\145\x61\164\145\137\x61\x70\x69\137\x6b\x65\171", array($this, "\x6d\157\137\141\x70\x69\x5f\x61\165\x74\150\x5f\x63\162\145\141\x74\x65\137\141\x70\x69\137\x6b\x65\x79"));
        $this->method_slug = "\164\x6f\x6b\145\x6e\x61\x70\x69";
    }
    public function mo_api_auth_create_api_key()
    {
        global $bC;
        if (!current_user_can("\141\144\155\151\156\151\x73\164\x72\141\164\x6f\x72")) {
            goto RS;
        }
        error_log("\x55\163\145\x72\x20\x49\x44\x3a\40" . print_r($_POST, true));
        $user = get_user_by("\111\x44", $_POST["\x75\163\145\162"]);
        $wR = stripslashes($bC->gen_rand_str(24));
        update_usermeta($user->ID, "\x6d\157\137\x75\163\143\x73", $wR);
        $Na = array("\x73\x75\x62" => $user->ID, "\156\x61\x6d\x65" => $user->user_login, "\145\155\141\151\x6c" => $user->user_email);
        $ef = new JWTUtils();
        $fk = $ef->create_jwt_token($Na, $wR, "\110\x53\x32\x35\x36", 3600);
        $Xn = $bC->base64url_encode($fk["\152\x77\164\137\164\x6f\153\x65\x6e"] . "\x3a" . $user->ID);
        echo $Xn;
        wp_die();
        RS:
    }
    public function regenerate_token()
    {
        if (!($_SERVER["\122\x45\121\x55\105\123\124\137\115\x45\124\x48\x4f\x44"] === "\x50\117\123\x54" && current_user_can("\141\144\155\x69\156\x69\x73\164\x72\141\x74\157\x72"))) {
            goto BK;
        }
        global $bC;
        $vl = $bC->mo_rest_api_authentication_get_option("\x6d\157\x5f\x61\160\151\137\x61\x75\x74\150\145\156\x74\x69\143\141\164\x69\x6f\156\137\x6d\145\164\x68\x6f\144\137\x65\x78\164\162\x61\x73") ? $bC->mo_rest_api_authentication_get_option("\x6d\x6f\x5f\x61\x70\151\x5f\x61\x75\x74\150\145\156\x74\151\x63\x61\164\x69\157\x6e\137\155\145\x74\150\x6f\x64\137\145\x78\x74\x72\x61\x73") : array();
        $lc = isset($vl[$this->method_slug]) ? $vl[$this->method_slug] : false;
        $Xn = stripslashes($bC->gen_rand_str(32));
        $lc["\141\160\151\x5f\153\145\171"] = $Xn;
        $vl[$this->method_slug] = $lc;
        $bC->mo_rest_api_authentication_update_option("\155\157\x5f\141\x70\151\137\141\165\164\x68\145\156\164\x69\143\141\x74\x69\x6f\156\x5f\x6d\x65\x74\x68\157\x64\137\x65\170\x74\x72\141\163", $vl);
        echo $Xn;
        wp_die();
        BK:
    }
    public function get_method_slug()
    {
        return $this->method_slug;
    }
    public function mo_rest_api_key_settings()
    {
        $sH = new ConfigurationSettings();
        $sH->mo_rest_api_save_settings();
    }
    public function handle_rest_flow($ks, $La)
    {
        global $bC;
        $La = explode("\40", $La);
        $MH = false;
        if (isset($La[0]) && strcasecmp($La[0], "\x42\145\x61\x72\x65\162") == 0 && isset($La[1]) && $La[1] !== '') {
            goto C_;
        }
        $MH = array("\163\x74\141\x74\x75\x73" => "\145\162\162\157\162", "\143\157\144\x65" => 401, "\145\162\162\x6f\162" => "\111\x4e\126\101\x4c\x49\104\137\x41\x55\124\x48\x4f\122\x49\x5a\x41\124\111\117\116\x5f\x48\x45\101\x44\x45\x52\x5f\x54\x4f\x4b\x45\x4e\x5f\124\131\120\105", "\145\162\162\x6f\x72\x5f\x64\145\x73\x63\162\151\x70\164\x69\x6f\x6e" => "\x41\x75\164\150\x6f\162\x69\172\141\164\151\157\x6e\x20\150\145\x61\x64\x65\x72\40\x6d\x75\163\164\x20\x62\x65\40\164\171\160\x65\40\x6f\146\x20\102\145\141\162\145\x72\x20\x54\x6f\x6b\x65\156\x2e");
        goto PA;
        C_:
        $vl = $bC->mo_rest_api_authentication_get_option("\155\x6f\137\141\160\151\137\141\165\x74\x68\145\156\x74\x69\x63\141\x74\x69\157\156\x5f\155\x65\164\150\x6f\144\137\145\170\164\162\x61\x73") ? $bC->mo_rest_api_authentication_get_option("\x6d\157\x5f\141\160\x69\x5f\141\165\x74\x68\145\x6e\164\151\x63\x61\164\151\x6f\156\x5f\x6d\x65\x74\x68\x6f\x64\137\145\x78\164\162\x61\x73") : array();
        $lc = isset($vl[$this->method_slug]) ? $vl[$this->method_slug] : false;
        $vw = isset($lc["\141\x70\x69\x5f\153\x65\171"]) ? $lc["\x61\160\x69\137\x6b\x65\x79"] : false;
        if ($vw === $La[1]) {
            goto w5;
        }
        if (!$bC->base64url_decode($La[1])) {
            goto Oz;
        }
        $hW = $bC->base64url_decode($La[1]);
        $vw = explode("\x3a", $hW);
        if (array_key_exists(1, $vw)) {
            goto hF;
        }
        $MH = array("\x73\x74\141\x74\165\x73" => "\145\x72\162\157\x72", "\x65\x72\162\157\x72" => "\111\116\x56\x41\x4c\x49\104\137\113\105\131", "\x65\162\x72\157\162\137\x64\x65\163\143\x72\x69\x70\x74\x69\x6f\156" => "\x49\x6e\166\141\154\151\144\x20\101\120\x49\40\x4b\145\x79");
        $bC->send_json_response($MH, 401);
        hF:
        $user = (int) $vw[1];
        $Vo = $vw[0];
        $ef = new JWTUtils($Vo);
        $ji = get_usermeta($user, "\155\x6f\137\x75\163\x63\163") ? get_usermeta($user, "\155\x6f\x5f\165\163\143\163") : '';
        if ($ef->jwt_token_segment_validation()) {
            goto ud;
        }
        $MH = array("\163\x74\x61\164\165\163" => "\145\162\x72\157\x72", "\143\157\x64\145" => 401, "\145\162\x72\x6f\x72" => "\x53\x45\x47\x4d\x45\x4e\124\x5f\106\x41\x55\x4c\124", "\145\162\162\x6f\x72\x5f\x64\145\x73\x63\x72\151\x70\164\151\157\156" => "\x49\156\x63\x6f\x72\162\x65\x63\164\x20\x41\120\x49\x20\113\x65\171\x20\106\157\x72\155\x61\164\x2e");
        $bC->send_json_response($MH);
        goto hV;
        ud:
        if ($ef->verify($ji, false)) {
            goto HM;
        }
        $MH = array("\163\164\141\x74\x75\x73" => "\x65\x72\x72\x6f\x72", "\x63\x6f\144\145" => 401, "\x65\x72\x72\157\162" => "\x49\116\x56\101\114\x49\x44\137\101\x50\111\x5f\x4b\x45\x59", "\145\162\162\157\162\x5f\144\145\163\x63\x72\151\160\x74\x69\157\156" => "\x41\x50\x49\40\x4b\145\x79\40\151\163\x20\x69\x6e\166\141\154\x69\x64\x2e");
        $bC->send_json_response($MH);
        goto nD;
        HM:
        $sb = $ef->get_decoded_payload();
        $user = get_user_by("\154\157\147\x69\156", $sb["\156\x61\x6d\145"]);
        wp_set_current_user($user->ID);
        if (!class_exists("\115\157\x5f\x57\x63\x5f\x43\157\155\160\154\x69\141\156\x63\145")) {
            goto F0;
        }
        $GK = new \Mo_Wc_Compliance();
        $GK->set_user_id($user->ID, "\141\x73\x64");
        F0:
        $og = new RESTAPIHandler();
        return $og->mo_api_auth_check_user_access_permission($user);
        nD:
        hV:
        Oz:
        goto ci;
        w5:
        $MH = true;
        ci:
        PA:
        return $MH;
    }
}
