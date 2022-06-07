<?php


namespace MoRestAPI;

class Customer
{
    public $email;
    public $phone;
    private $default_customer_key = "\x31\66\x35\x35\65";
    private $default_api_key = "\x66\106\144\62\x58\x63\166\x54\x47\x44\x65\155\132\x76\x62\167\x31\142\x63\125\145\163\116\112\x57\x45\161\x4b\x62\142\x55\161";
    private $host_name = '';
    private $host_key = '';
    public function __construct()
    {
        global $bC;
        $this->host_name = $bC->mo_rest_api_authentication_get_option("\x6d\x6f\137\141\160\x69\137\x61\165\x74\x68\145\x6e\164\151\x63\141\x74\151\157\156\x5f\150\x6f\x73\x74\137\156\x61\155\145");
        $this->email = $bC->mo_rest_api_authentication_get_option("\x6d\157\137\x61\x70\151\137\x61\165\164\150\x65\x6e\164\151\143\x61\x74\151\157\156\137\x61\x64\155\151\156\137\145\155\141\x69\x6c");
        $this->phone = $bC->mo_rest_api_authentication_get_option("\155\x6f\137\141\x70\151\137\141\165\x74\x68\x65\156\x74\151\143\141\164\x69\x6f\x6e\x5f\141\144\155\x69\x6e\137\160\x68\x6f\156\x65");
        $this->host_key = $bC->mo_rest_api_authentication_get_option("\x70\x61\163\163\167\x6f\162\x64");
    }
    public function create_customer()
    {
        global $bC;
        $gg = $this->host_name . "\x2f\155\157\x61\163\x2f\162\x65\163\x74\x2f\143\x75\163\x74\157\x6d\145\x72\57\x61\144\x64";
        $r2 = $this->host_key;
        $pH = $bC->mo_rest_api_authentication_get_option("\x6d\x6f\137\141\160\x69\137\141\165\164\150\x65\156\164\x69\143\x61\x74\151\x6f\156\x5f\141\x64\155\151\156\137\146\156\141\155\x65");
        $uA = $bC->mo_rest_api_authentication_get_option("\x6d\157\x5f\141\x70\151\137\x61\x75\x74\x68\x65\156\x74\x69\143\x61\164\x69\157\x6e\x5f\141\x64\x6d\151\156\137\x6c\156\141\155\x65");
        $fV = $bC->mo_rest_api_authentication_get_option("\155\157\x5f\141\160\x69\137\x61\x75\164\150\x65\156\x74\151\x63\x61\164\151\x6f\156\137\x61\144\155\151\156\x5f\143\x6f\155\160\x61\x6e\171");
        $Tl = array("\143\x6f\x6d\160\141\x6e\171\x4e\x61\x6d\145" => $fV, "\141\x72\x65\141\117\146\x49\156\x74\145\x72\x65\163\164" => "\x57\120\40\122\x45\x53\124\40\x41\x50\x49\x20\x41\165\x74\150\x65\x6e\x74\x69\143\x61\x74\151\x6f\x6e", "\146\x69\x72\x73\164\x6e\141\x6d\x65" => $pH, "\154\141\163\x74\156\x61\x6d\x65" => $uA, \MoRestAPIConstants::EMAIL => $this->email, "\160\150\x6f\x6e\x65" => $this->phone, "\x70\141\x73\163\167\x6f\x72\x64" => $r2);
        $pg = wp_json_encode($Tl);
        return $this->send_request([], false, $pg, [], false, $gg);
    }
    public function get_customer_key()
    {
        global $bC;
        $gg = $this->host_name . "\x2f\155\157\141\x73\57\162\145\163\x74\x2f\143\x75\x73\164\157\x6d\x65\162\57\153\x65\x79";
        $Gf = $this->email;
        $r2 = $this->host_key;
        $Tl = array(\MoRestAPIConstants::EMAIL => $Gf, "\160\x61\x73\163\x77\157\162\x64" => $r2);
        $pg = wp_json_encode($Tl);
        return $this->send_request([], false, $pg, [], false, $gg);
    }
    public function add_oauth_application($zV, $vF)
    {
        global $bC;
        $gg = $this->host_name . "\x2f\155\x6f\141\163\x2f\162\145\163\164\x2f\141\160\160\154\x69\143\x61\164\151\x6f\156\x2f\x61\144\x64\x6f\141\x75\164\150";
        $Xu = $bC->mo_rest_api_authentication_get_option("\155\157\x5f\x61\x70\x69\137\x61\165\164\x68\145\156\x74\x69\x63\x61\x74\151\157\156\137\141\144\155\x69\156\137\143\x75\x73\164\x6f\x6d\x65\162\x5f\153\x65\171");
        $I1 = $bC->mo_rest_api_authentication_get_option("\155\x6f\137\x61\160\151\137\x61\x75\x74\150\x65\x6e\x74\x69\x63\141\164\x69\157\x6e\x5f" . $zV . "\x5f\x73\x63\157\x70\x65");
        $xq = $bC->mo_rest_api_authentication_get_option("\155\x6f\x5f\141\x70\151\137\x61\165\x74\150\x65\156\164\151\x63\141\x74\151\157\x6e\137" . $zV . "\x5f\143\x6c\151\x65\156\x74\137\151\x64");
        $wR = $bC->mo_rest_api_authentication_get_option("\155\x6f\137\x61\x70\151\x5f\141\165\164\150\x65\x6e\164\151\x63\141\x74\151\x6f\x6e\x5f" . $zV . "\137\143\x6c\151\x65\x6e\x74\x5f\163\145\x63\x72\145\x74");
        if (false !== $I1) {
            goto xy;
        }
        $Tl = array("\x61\x70\160\x6c\x69\143\x61\164\x69\x6f\x6e\x4e\x61\x6d\x65" => $vF, "\143\165\x73\x74\x6f\155\x65\x72\111\x64" => $Xu, "\143\x6c\151\x65\x6e\x74\x49\144" => $xq, "\x63\154\151\x65\156\164\123\145\143\x72\145\164" => $wR);
        goto Nk;
        xy:
        $Tl = array("\x61\x70\x70\154\151\x63\x61\x74\151\157\x6e\x4e\141\155\145" => $vF, "\163\x63\157\160\x65" => $I1, "\x63\165\163\164\x6f\155\145\162\111\144" => $Xu, "\143\x6c\151\145\156\x74\111\144" => $xq, "\143\154\x69\x65\x6e\x74\x53\145\143\162\x65\164" => $wR);
        Nk:
        $pg = wp_json_encode($Tl);
        return $this->send_request([], false, $pg, [], false, $gg);
    }
    public function submit_contact_us($Gf, $lW, $zQ)
    {
        global $current_user;
        global $bC;
        wp_get_current_user();
        $Xu = $this->default_customer_key;
        $vw = $this->default_api_key;
        $eP = time();
        $gg = $this->host_name . "\57\x6d\x6f\141\x73\57\141\x70\151\57\156\x6f\x74\151\x66\x79\57\x73\x65\x6e\144";
        $iT = $Xu . $eP . $vw;
        $UT = hash("\163\x68\x61\65\61\x32", $iT);
        $zD = $Gf;
        $NS = \ucwords(\strtolower($bC->get_versi_str_support())) . "\x20\55\40" . \mo_rest_get_version_number();
        $ux = "\121\165\145\162\x79\72\x20\127\157\162\144\x50\162\x65\163\163\40\x52\x45\123\x54\40\x41\x50\111\40\101\165\164\x68\145\x6e\164\151\x63\x61\x74\151\x6f\x6e\x20\55\40" . $NS . "\x20\x50\x6c\x75\147\x69\156";
        $zQ = "\133\127\x50\x20\122\105\x53\x54\40\x41\120\x49\x20\x41\x75\164\x68\145\x6e\x74\x69\143\141\x74\x69\157\x6e\x20\x3a\x20" . $NS . "\135\x20" . $zQ;
        $Qf = isset($_SERVER["\123\x45\122\x56\x45\122\x5f\x4e\101\115\x45"]) ? sanitize_text_field(wp_unslash($_SERVER["\x53\105\122\x56\x45\x52\x5f\x4e\x41\x4d\105"])) : '';
        $OK = "\x3c\x64\x69\166\x20\x3e\x48\145\x6c\x6c\157\x2c\40\x3c\142\162\76\x3c\x62\x72\x3e\106\x69\162\x73\x74\x20\x4e\x61\x6d\145\x20\72" . $current_user->user_firstname . "\x3c\x62\162\76\74\x62\162\76\114\141\x73\x74\x20\x20\116\x61\155\x65\x20\x3a" . $current_user->user_lastname . "\40\x20\40\74\142\x72\76\74\x62\162\x3e\x43\x6f\155\x70\141\156\171\40\x3a\74\x61\40\x68\162\x65\x66\75\x22" . $Qf . "\42\40\164\x61\162\147\145\164\x3d\42\x5f\142\154\x61\x6e\x6b\x22\x20\x3e" . $Qf . "\x3c\57\x61\x3e\x3c\x62\162\x3e\74\142\162\x3e\120\x68\x6f\156\145\40\116\165\x6d\142\x65\x72\x20\72" . $lW . "\74\x62\162\x3e\x3c\x62\x72\76\x45\155\141\151\154\x20\x3a\x3c\141\x20\x68\x72\145\146\x3d\42\155\x61\x69\x6c\164\157\x3a" . $zD . "\x22\x20\x74\141\162\x67\x65\164\75\42\x5f\x62\x6c\141\156\x6b\x22\76" . $zD . "\x3c\57\141\76\x3c\x62\x72\x3e\x3c\142\x72\x3e\121\x75\x65\x72\x79\x20\72" . $zQ . "\x3c\x2f\144\151\166\76";
        $Tl = array("\143\x75\x73\164\157\x6d\x65\162\113\x65\x79" => $Xu, "\x73\x65\156\x64\105\155\x61\x69\154" => true, \MoRestAPIConstants::EMAIL => array("\x63\165\x73\x74\157\x6d\x65\x72\x4b\145\171" => $Xu, "\146\x72\x6f\155\105\155\141\x69\x6c" => $zD, "\x62\x63\x63\x45\155\x61\x69\154" => "\x69\x6e\x66\157\x40\x78\145\x63\165\x72\151\146\x79\56\143\157\155", "\146\162\157\x6d\x4e\141\155\x65" => "\155\151\x6e\151\117\x72\x61\x6e\x67\x65", "\164\157\x45\155\x61\x69\154" => "\141\160\151\163\165\x70\x70\x6f\162\164\x40\x78\x65\143\x75\x72\151\x66\171\56\143\x6f\155", "\164\x6f\116\141\x6d\x65" => "\141\160\151\163\x75\x70\160\x6f\x72\x74\x40\x78\145\x63\x75\x72\x69\146\x79\56\143\x6f\155", "\x73\165\142\x6a\x65\143\164" => $ux, "\143\x6f\x6e\164\x65\156\164" => $OK));
        $pg = json_encode($Tl, JSON_UNESCAPED_SLASHES);
        $x3 = array("\x43\157\x6e\x74\145\x6e\x74\55\x54\171\x70\x65" => "\141\160\160\154\151\143\x61\164\151\x6f\x6e\57\x6a\163\x6f\x6e");
        $x3["\103\x75\x73\x74\157\155\x65\162\55\x4b\x65\x79"] = $Xu;
        $x3["\x54\151\155\145\x73\164\x61\x6d\160"] = $eP;
        $x3["\x41\165\x74\x68\x6f\x72\151\172\141\164\151\157\x6e"] = $UT;
        return $this->send_request($x3, true, $pg, [], false, $gg);
    }
    public function send_otp_token($Gf = '', $lW = '', $G2 = true, $nF = false)
    {
        global $bC;
        $gg = $this->host_name . "\57\155\x6f\x61\x73\x2f\141\x70\x69\57\x61\x75\164\x68\57\143\150\x61\154\154\145\x6e\x67\145";
        $Xu = $this->default_customer_key;
        $vw = $this->default_api_key;
        $Lm = $this->email;
        $lW = $bC->mo_rest_api_authentication_get_option("\155\x6f\137\141\x70\x69\137\x61\x75\x74\x68\145\x6e\x74\x69\143\x61\x74\x69\157\x6e\137\141\x64\155\151\156\x5f\160\150\157\156\x65");
        $eP = self::get_timestamp();
        $iT = $Xu . $eP . $vw;
        $UT = hash("\x73\150\x61\x35\61\x32", $iT);
        $pz = "\x43\x75\163\164\157\155\145\162\x2d\x4b\145\x79\x3a\x20" . $Xu;
        $Z5 = "\124\151\155\x65\163\164\x61\x6d\x70\x3a\40" . $eP;
        $La = "\x41\165\164\x68\x6f\x72\x69\172\x61\164\x69\157\x6e\72\40" . $UT;
        if ($G2) {
            goto MF;
        }
        $Tl = array("\143\165\x73\164\x6f\x6d\145\x72\113\145\x79" => $Xu, "\160\150\157\x6e\x65" => $lW, "\141\165\x74\150\124\x79\x70\145" => "\x53\115\123");
        goto zH;
        MF:
        $Tl = array("\x63\x75\x73\164\157\x6d\145\162\113\x65\x79" => $Xu, \MoRestAPIConstants::EMAIL => $Lm, "\141\x75\x74\150\124\x79\160\145" => "\105\115\x41\x49\x4c");
        zH:
        $pg = wp_json_encode($Tl);
        $x3 = array("\103\x6f\156\x74\x65\156\x74\55\x54\171\x70\x65" => "\x61\160\160\154\151\x63\x61\164\x69\x6f\x6e\57\x6a\x73\157\156");
        $x3["\x43\x75\x73\164\x6f\155\x65\x72\55\x4b\x65\x79"] = $Xu;
        $x3["\x54\151\155\x65\163\164\141\155\x70"] = $eP;
        $x3["\101\165\164\150\x6f\162\151\x7a\x61\x74\x69\x6f\156"] = $UT;
        return $this->send_request($x3, true, $pg, [], false, $gg);
    }
    public function get_timestamp()
    {
        global $bC;
        $gg = $this->host_name . "\57\155\x6f\x61\x73\57\162\145\x73\164\57\155\x6f\x62\x69\x6c\145\57\x67\145\x74\55\164\151\x6d\145\163\x74\141\x6d\160";
        return $this->send_request([], false, '', [], false, $gg);
    }
    public function validate_otp_token($uT, $Nc)
    {
        global $bC;
        $gg = $this->host_name . "\57\x6d\x6f\141\x73\57\x61\x70\151\57\x61\x75\164\150\57\x76\x61\154\x69\144\141\164\145";
        $Xu = $this->default_customer_key;
        $vw = $this->default_api_key;
        $Lm = $this->email;
        $eP = self::get_timestamp();
        $iT = $Xu . $eP . $vw;
        $UT = hash("\x73\x68\x61\x35\x31\62", $iT);
        $pz = "\x43\165\163\164\157\x6d\145\x72\55\113\145\171\x3a\40" . $Xu;
        $Z5 = "\x54\151\x6d\x65\163\164\141\155\x70\72\40" . $eP;
        $La = "\x41\165\x74\x68\157\162\151\x7a\x61\164\151\157\x6e\x3a\x20" . $UT;
        $pg = '';
        $Tl = array("\x74\x78\x49\144" => $uT, "\x74\x6f\153\145\x6e" => $Nc);
        $pg = wp_json_encode($Tl);
        $x3 = array("\x43\157\x6e\x74\x65\156\164\55\124\x79\160\x65" => "\141\160\x70\154\x69\x63\x61\x74\x69\157\x6e\x2f\152\x73\x6f\x6e");
        $x3["\x43\165\x73\164\x6f\155\x65\162\x2d\113\x65\171"] = $Xu;
        $x3["\x54\x69\155\x65\163\164\141\x6d\160"] = $eP;
        $x3["\101\x75\164\150\x6f\162\151\x7a\141\164\x69\x6f\x6e"] = $UT;
        return $this->send_request($x3, true, $pg, [], false, $gg);
    }
    public function check_customer()
    {
        global $bC;
        $gg = $this->host_name . "\x2f\155\157\x61\x73\x2f\162\x65\163\x74\57\143\x75\x73\x74\157\x6d\x65\162\x2f\143\x68\x65\143\153\55\x69\146\55\145\170\151\163\x74\x73";
        $Gf = $this->email;
        $Tl = array(\MoRestAPIConstants::EMAIL => $Gf);
        $pg = wp_json_encode($Tl);
        return $this->send_request([], false, $pg, [], false, $gg);
    }
    public function mo_api_authentication_send_email_alert($Gf, $lW, $V6)
    {
        global $bC;
        if ($this->check_internet_connection()) {
            goto nR;
        }
        return;
        nR:
        $gg = $this->host_name . "\x2f\155\157\x61\x73\57\x61\x70\151\x2f\156\x6f\x74\x69\146\171\x2f\163\x65\x6e\x64";
        global $user;
        $Xu = $this->default_customer_key;
        $vw = $this->default_api_key;
        $eP = self::get_timestamp();
        $iT = $Xu . $eP . $vw;
        $UT = hash("\x73\150\141\x35\x31\x32", $iT);
        $zD = $Gf;
        $ux = "\x46\x65\145\144\x62\141\143\153\x3a\x20\x57\x6f\162\144\x50\x72\145\163\163\x20\x52\105\x53\124\x20\101\x50\111\40\x41\165\164\x68\145\156\164\x69\x63\x61\x74\151\x6f\156\40\120\154\x75\x67\151\156";
        $Lx = site_url();
        $user = wp_get_current_user();
        $NS = \ucwords(\strtolower($bC->get_versi_str())) . "\40\55\x20" . \mo_rest_get_version_number();
        $zQ = "\x5b\127\120\40\117\x41\x75\164\x68\x20\x32\x2e\60\40\103\x6c\x69\145\156\x74\40" . $NS . "\135\40\x3a\40" . $V6;
        $Qf = isset($_SERVER["\123\x45\122\x56\105\122\x5f\x4e\101\x4d\x45"]) ? sanitize_text_field(wp_unslash($_SERVER["\123\105\122\x56\105\x52\137\x4e\x41\115\x45"])) : '';
        $OK = "\x3c\x64\151\166\40\x3e\110\145\x6c\154\x6f\54\x20\74\142\x72\x3e\74\142\162\x3e\x46\x69\x72\x73\164\40\x4e\x61\x6d\145\x20\72" . $user->user_firstname . "\74\142\162\x3e\x3c\142\162\x3e\114\141\x73\x74\x20\40\116\141\x6d\x65\x20\x3a" . $user->user_lastname . "\x20\40\x20\x3c\x62\x72\76\x3c\142\x72\x3e\x43\157\155\160\141\x6e\x79\x20\72\x3c\141\x20\150\x72\145\x66\75\x22" . $Qf . "\42\40\x74\141\x72\147\145\x74\x3d\42\137\142\154\141\156\x6b\x22\x20\x3e" . $Qf . "\x3c\57\x61\x3e\74\142\x72\x3e\74\142\162\76\120\150\157\156\x65\x20\x4e\165\x6d\x62\145\x72\x20\x3a" . $lW . "\x3c\x62\162\76\74\x62\x72\76\x45\155\141\151\x6c\x20\x3a\74\x61\40\150\162\x65\x66\75\42\x6d\141\x69\154\164\x6f\x3a" . $zD . "\x22\40\x74\x61\x72\147\145\164\75\x22\137\x62\x6c\x61\156\x6b\42\76" . $zD . "\x3c\57\x61\x3e\x3c\142\x72\x3e\74\142\x72\x3e\x51\x75\x65\162\x79\x20\72" . $zQ . "\x3c\x2f\x64\151\166\76";
        $Tl = array("\143\165\x73\164\x6f\155\x65\x72\113\145\171" => $Xu, "\x73\145\x6e\144\x45\155\141\151\x6c" => true, \MoRestAPIConstants::EMAIL => array("\x63\x75\x73\x74\157\155\145\x72\113\145\x79" => $Xu, "\146\x72\157\x6d\105\x6d\x61\x69\x6c" => $zD, "\142\143\x63\x45\155\141\151\154" => "\141\160\151\x73\x75\160\160\x6f\x72\x74\x40\170\x65\x63\x75\162\151\x66\x79\x2e\x63\157\x6d", "\146\x72\x6f\x6d\116\x61\x6d\145" => "\x6d\151\x6e\x69\117\162\141\156\x67\145", "\x74\x6f\105\155\x61\x69\154" => "\141\x70\151\163\165\160\160\x6f\x72\x74\100\x78\x65\x63\x75\162\x69\146\171\x2e\x63\x6f\155", "\x74\157\116\141\155\x65" => "\x61\160\151\x73\x75\160\x70\157\162\164\x40\170\x65\143\165\162\151\146\171\x2e\x63\x6f\x6d", "\163\165\142\152\145\143\x74" => $ux, "\143\x6f\156\x74\145\x6e\x74" => $OK));
        $pg = wp_json_encode($Tl);
        $x3 = array("\103\x6f\x6e\164\145\156\x74\x2d\x54\171\x70\x65" => "\141\x70\160\154\x69\x63\x61\x74\151\x6f\x6e\57\152\163\x6f\156");
        $x3["\x43\x75\x73\x74\157\155\145\162\x2d\113\145\171"] = $Xu;
        $x3["\x54\x69\x6d\x65\163\x74\141\155\x70"] = $eP;
        $x3["\101\165\x74\x68\x6f\162\151\x7a\141\x74\151\x6f\x6e"] = $UT;
        return $this->send_request($x3, true, $pg, [], false, $gg);
    }
    public function mo_api_authentication_send_demo_alert($Gf, $iV, $V6, $ux)
    {
        if ($this->check_internet_connection()) {
            goto Rr;
        }
        return;
        Rr:
        $gg = $this->host_name . "\x2f\x6d\x6f\x61\163\57\x61\160\x69\x2f\156\157\x74\x69\x66\171\57\163\145\x6e\144";
        $Xu = $this->default_customer_key;
        $vw = $this->default_api_key;
        $eP = self::get_timestamp();
        $iT = $Xu . $eP . $vw;
        $UT = hash("\x73\x68\x61\65\61\x32", $iT);
        $zD = $Gf;
        global $user;
        $user = wp_get_current_user();
        $OK = "\x3c\144\151\x76\x20\76\x48\x65\x6c\x6c\x6f\x2c\40\x3c\x2f\141\76\74\142\162\x3e\x3c\142\x72\x3e\x45\155\x61\x69\x6c\x20\x3a\74\x61\x20\150\x72\x65\146\x3d\42\155\141\x69\x6c\164\157\x3a" . $zD . "\42\x20\164\141\162\147\145\x74\x3d\42\x5f\142\x6c\141\x6e\x6b\x22\76" . $zD . "\x3c\57\x61\x3e\x3c\142\162\76\x3c\142\x72\x3e\122\145\161\165\x65\163\x74\145\x64\x20\104\145\x6d\157\x20\x66\157\x72\x20\x20\x20\40\40\72\x20" . $iV . "\x3c\142\162\x3e\74\x62\x72\76\x52\145\x71\x75\x69\x72\145\155\145\156\164\163\x20\40\40\x20\40\x20\x20\x20\40\x20\x20\x3a\40" . $V6 . "\x3c\x2f\144\151\x76\x3e";
        $Tl = array("\143\165\x73\164\157\155\145\x72\x4b\145\x79" => $Xu, "\163\145\x6e\x64\x45\155\x61\151\154" => true, \MoRestAPIConstants::EMAIL => array("\x63\165\163\x74\157\x6d\145\x72\x4b\x65\171" => $Xu, "\146\162\157\155\105\155\141\x69\x6c" => $zD, "\142\143\x63\x45\x6d\x61\151\154" => "\x61\160\x69\x73\165\160\x70\x6f\x72\x74\x40\x78\145\x63\x75\x72\151\146\171\x2e\143\x6f\x6d", "\146\x72\157\x6d\x4e\x61\155\x65" => "\155\151\156\151\x4f\x72\141\x6e\x67\x65", "\x74\x6f\105\x6d\x61\x69\154" => "\141\160\x69\x73\x75\x70\x70\x6f\162\164\x40\170\x65\143\x75\162\151\x66\x79\56\x63\157\x6d", "\164\157\116\x61\x6d\145" => "\x61\x70\151\163\x75\x70\160\157\x72\164\100\170\x65\143\165\x72\x69\x66\x79\56\143\x6f\x6d", "\163\x75\x62\152\145\x63\164" => $ux, "\143\x6f\156\x74\x65\156\x74" => $OK));
        $pg = json_encode($Tl);
        $x3 = array("\x43\157\156\164\145\x6e\164\55\x54\171\160\x65" => "\x61\160\x70\154\151\143\141\164\151\x6f\156\x2f\152\163\x6f\x6e");
        $x3["\103\165\x73\x74\x6f\x6d\145\x72\x2d\113\x65\171"] = $Xu;
        $x3["\x54\151\155\x65\163\164\x61\x6d\160"] = $eP;
        $x3["\101\165\x74\x68\157\x72\151\x7a\141\164\151\x6f\x6e"] = $UT;
        $MH = $this->send_request($x3, true, $pg, [], false, $gg);
    }
    public function mo_api_authentication_forgot_password($Gf)
    {
        global $bC;
        $gg = $this->host_name . "\57\x6d\x6f\141\x73\x2f\162\145\163\x74\57\x63\165\x73\x74\x6f\155\x65\162\57\x70\141\163\163\x77\x6f\162\x64\x2d\162\x65\163\x65\164";
        $Xu = $bC->mo_rest_api_authentication_get_option("\155\157\137\141\x70\151\137\x61\x75\164\x68\145\156\x74\151\143\x61\x74\151\157\156\x5f\x61\x64\x6d\x69\x6e\x5f\x63\165\x73\164\157\x6d\x65\x72\x5f\x6b\x65\171");
        $vw = $bC->mo_rest_api_authentication_get_option("\x6d\x6f\137\x61\x70\x69\x5f\141\x75\x74\150\145\156\x74\151\x63\x61\x74\151\x6f\156\x5f\141\x64\x6d\151\x6e\137\141\160\151\137\153\x65\171");
        $eP = self::get_timestamp();
        $iT = $Xu . $eP . $vw;
        $UT = hash("\163\150\141\x35\61\62", $iT);
        $pz = "\103\x75\x73\x74\157\155\145\162\55\113\x65\x79\72\40" . $Xu;
        $Z5 = "\124\151\155\145\163\x74\x61\x6d\x70\72\40" . number_format($eP, 0, '', '');
        $La = "\x41\x75\x74\150\x6f\162\151\172\141\x74\151\157\156\72\40" . $UT;
        $pg = '';
        $Tl = array(\MoRestAPIConstants::EMAIL => $Gf);
        $pg = wp_json_encode($Tl);
        $x3 = array("\103\x6f\156\164\x65\x6e\164\55\x54\x79\x70\x65" => "\x61\160\x70\154\x69\143\141\x74\151\157\156\57\152\x73\x6f\x6e");
        $x3["\103\165\163\164\x6f\x6d\145\x72\x2d\x4b\145\x79"] = $Xu;
        $x3["\124\x69\155\145\163\x74\141\155\x70"] = $eP;
        $x3["\x41\x75\164\150\x6f\162\151\x7a\141\x74\151\x6f\x6e"] = $UT;
        return $this->send_request($x3, true, $pg, [], false, $gg);
    }
    public function check_internet_connection()
    {
        return (bool) @fsockopen("\154\157\147\x69\156\x2e\170\145\x63\x75\x72\x69\x66\171\x2e\x63\157\155", 443, $nk, $sR, 5);
    }
    private function send_request($j2 = false, $jb = false, $pg = '', $Gl = false, $j6 = false, $gg = '')
    {
        $x3 = array("\103\157\x6e\164\145\x6e\164\x2d\x54\171\x70\x65" => "\141\160\160\x6c\x69\143\141\x74\151\157\x6e\57\x6a\x73\x6f\156", "\x63\150\141\x72\163\x65\x74" => "\x55\x54\x46\x20\55\40\x38", "\x41\x75\x74\x68\x6f\162\x69\x7a\141\164\x69\157\156" => "\x42\x61\x73\151\x63");
        $x3 = $jb && $j2 ? $j2 : array_unique(array_merge($x3, $j2));
        $WC = array("\155\145\x74\150\x6f\x64" => "\120\117\123\124", "\142\157\x64\171" => $pg, "\x74\151\x6d\x65\x6f\x75\164" => "\x35", "\x72\145\144\x69\162\x65\x63\164\x69\x6f\x6e" => "\65", "\x68\x74\x74\160\166\145\162\x73\151\157\x6e" => "\61\x2e\x30", "\142\154\157\x63\153\151\x6e\147" => true, "\150\145\141\144\145\162\163" => $x3, "\163\x73\x6c\166\145\x72\x69\x66\171" => true);
        $WC = $j6 ? $Gl : array_unique(array_merge($WC, $Gl), SORT_REGULAR);
        $MH = wp_remote_post($gg, $WC);
        if (!is_wp_error($MH)) {
            goto R2;
        }
        $EZ = $MH->get_error_message();
        echo wp_kses("\123\157\155\145\164\150\151\x6e\x67\x20\x77\145\x6e\164\x20\x77\162\x6f\156\x67\x3a\x20{$EZ}", \mo_rest_get_valid_html());
        exit;
        R2:
        return wp_remote_retrieve_body($MH);
    }
    public function check_customer_ln()
    {
        global $bC;
        $gg = $this->host_name . "\x2f\155\157\141\x73\57\162\x65\163\x74\x2f\143\x75\163\x74\x6f\155\x65\x72\x2f\x6c\151\143\145\x6e\163\145";
        $Xu = $bC->mo_rest_api_authentication_get_option("\155\x6f\137\x61\160\151\137\x61\165\x74\150\x65\x6e\164\151\x63\x61\x74\151\157\x6e\137\141\144\x6d\x69\x6e\137\x63\165\x73\164\x6f\x6d\x65\x72\x5f\153\145\x79");
        $vw = $bC->mo_rest_api_authentication_get_option("\x6d\x6f\137\141\160\151\x5f\141\x75\164\150\145\156\x74\151\x63\141\x74\x69\157\156\137\141\144\155\151\156\x5f\141\x70\x69\137\153\x65\x79");
        $Lm = $bC->mo_rest_api_authentication_get_option("\155\157\137\x61\160\151\137\141\165\x74\150\x65\x6e\164\151\143\141\x74\x69\157\156\137\141\144\x6d\x69\156\137\145\155\141\151\x6c");
        $lW = $bC->mo_rest_api_authentication_get_option("\x6d\157\x5f\x61\160\151\137\x61\x75\164\x68\145\x6e\x74\151\x63\x61\x74\151\157\x6e\x5f\x61\x64\155\x69\156\x5f\160\150\x6f\156\x65");
        $eP = self::get_timestamp();
        $iT = $Xu . $eP . $vw;
        $UT = hash("\x73\x68\x61\65\x31\x32", $iT);
        $pz = "\x43\x75\x73\164\x6f\x6d\x65\x72\x2d\113\x65\171\x3a\x20" . $Xu;
        $Z5 = "\x54\151\x6d\x65\163\x74\141\x6d\x70\x3a\40" . $eP;
        $La = "\101\x75\x74\x68\157\x72\151\x7a\x61\x74\151\x6f\x6e\72\40" . $UT;
        $Tl = '';
        $Tl = array("\143\x75\x73\x74\157\155\145\x72\111\x64" => $Xu, "\x61\x70\x70\x6c\151\143\141\x74\x69\157\156\116\x61\x6d\145" => "\167\x70\137\162\145\x73\164\x5f\141\x70\151\137\x61\x75\x74\x68\x65\156\x74\151\143\x61\x74\151\157\x6e\x5f" . \strtolower($bC->get_versi_str()) . "\x5f\160\154\x61\156");
        $pg = wp_json_encode($Tl);
        $x3 = array("\103\x6f\x6e\164\145\x6e\164\x2d\x54\x79\x70\145" => "\x61\x70\x70\154\151\x63\x61\164\151\157\156\x2f\152\163\157\156");
        $x3["\x43\165\x73\164\157\x6d\x65\x72\x2d\x4b\145\x79"] = $Xu;
        $x3["\124\151\155\x65\163\x74\x61\x6d\x70"] = $eP;
        $x3["\x41\165\x74\150\157\162\x69\x7a\x61\x74\x69\157\x6e"] = $UT;
        $WC = array("\x6d\145\164\150\157\x64" => "\x50\x4f\123\x54", "\x62\157\144\x79" => $pg, "\x74\151\x6d\145\x6f\165\x74" => "\x35", "\x72\145\144\151\x72\x65\x63\164\x69\x6f\x6e" => "\x35", "\150\x74\x74\x70\166\145\162\x73\x69\157\x6e" => "\61\x2e\x30", "\142\154\x6f\143\153\151\156\147" => true, "\150\x65\141\x64\145\162\163" => $x3);
        $MH = wp_remote_post($gg, $WC);
        if (!is_wp_error($MH)) {
            goto am;
        }
        $EZ = $MH->get_error_message();
        echo "\123\x6f\x6d\x65\x74\150\x69\156\147\40\x77\145\x6e\164\x20\x77\162\x6f\156\147\72\x20{$EZ}";
        exit;
        am:
        return wp_remote_retrieve_body($MH);
    }
    public function XfskodsfhHJ($ga)
    {
        global $bC;
        $gg = $this->host_name . "\x2f\x6d\157\141\163\57\x61\160\151\x2f\142\x61\x63\153\x75\x70\143\157\x64\x65\x2f\166\x65\162\151\x66\x79";
        $Xu = $bC->mo_rest_api_authentication_get_option("\x6d\157\x5f\x61\x70\151\137\x61\x75\x74\x68\x65\156\x74\151\x63\141\164\151\157\x6e\137\141\144\155\151\x6e\x5f\143\165\163\x74\157\155\145\x72\x5f\x6b\x65\x79");
        $vw = $bC->mo_rest_api_authentication_get_option("\155\x6f\x5f\x61\x70\x69\137\141\165\x74\x68\145\x6e\164\x69\143\x61\x74\151\157\x6e\x5f\x61\144\x6d\x69\x6e\137\141\x70\151\x5f\153\145\x79");
        $Lm = $bC->mo_rest_api_authentication_get_option("\x6d\157\x5f\x61\160\x69\x5f\x61\165\x74\150\x65\156\164\151\x63\x61\x74\x69\157\x6e\x5f\x61\x64\x6d\151\156\137\145\x6d\x61\151\154");
        $lW = $bC->mo_rest_api_authentication_get_option("\x6d\157\x5f\141\160\151\137\141\x75\164\150\145\x6e\164\151\143\x61\164\x69\x6f\x6e\137\x61\144\155\151\156\137\160\x68\157\156\x65");
        $eP = self::get_timestamp();
        $iT = $Xu . $eP . $vw;
        $UT = hash("\163\x68\141\65\x31\62", $iT);
        $pz = "\x43\165\163\x74\157\x6d\145\x72\x2d\113\145\171\x3a\x20" . $Xu;
        $Z5 = "\x54\x69\155\x65\x73\x74\141\155\160\x3a\40" . $eP;
        $La = "\101\x75\x74\x68\157\x72\151\x7a\x61\164\151\x6f\156\x3a\x20" . $UT;
        $Tl = '';
        $Tl = array("\143\x6f\144\x65" => $ga, "\x63\x75\163\x74\x6f\155\x65\162\x4b\x65\171" => $Xu, "\x61\144\144\151\x74\x69\157\x6e\x61\154\x46\x69\x65\154\144\x73" => array("\x66\x69\145\x6c\144\x31" => site_url()));
        $pg = wp_json_encode($Tl);
        $x3 = array("\x43\x6f\x6e\x74\145\x6e\x74\x2d\x54\x79\160\x65" => "\x61\160\x70\154\151\x63\141\x74\x69\x6f\x6e\57\152\163\157\156");
        $x3["\103\165\x73\x74\x6f\x6d\x65\x72\x2d\113\x65\171"] = $Xu;
        $x3["\x54\x69\x6d\x65\163\x74\141\x6d\160"] = $eP;
        $x3["\x41\165\164\150\157\x72\151\172\141\164\151\x6f\156"] = $UT;
        $WC = array("\x6d\x65\x74\150\157\144" => "\x50\117\123\124", "\142\x6f\144\171" => $pg, "\164\x69\x6d\x65\157\x75\x74" => "\65", "\x72\x65\x64\x69\x72\145\x63\164\151\157\156" => "\x35", "\x68\x74\x74\x70\x76\x65\x72\163\151\x6f\156" => "\x31\x2e\60", "\142\x6c\157\x63\x6b\x69\156\x67" => true, "\150\145\x61\x64\x65\162\x73" => $x3);
        $MH = wp_remote_post($gg, $WC);
        if (!is_wp_error($MH)) {
            goto vV;
        }
        $EZ = $MH->get_error_message();
        echo "\123\157\155\x65\x74\150\x69\x6e\x67\40\x77\145\156\164\40\167\162\157\x6e\147\72\x20{$EZ}";
        exit;
        vV:
        return wp_remote_retrieve_body($MH);
    }
    public function manage_deactivate_cache()
    {
        global $bC;
        $H2 = $bC->mo_rest_api_authentication_get_option("\155\157\137\x61\160\x69\x5f\141\x75\164\150\145\x6e\x74\151\143\141\x74\151\157\x6e\137\154\153");
        if (!(!$bC->mo_rest_api_is_customer_registered() || false === $H2 || empty($H2))) {
            goto Ce;
        }
        return;
        Ce:
        $gg = $this->host_name . "\x2f\155\157\x61\x73\57\141\x70\151\57\142\141\143\x6b\x75\x70\x63\x6f\144\145\57\165\160\x64\141\x74\145\163\164\141\x74\x75\x73";
        $Xu = $bC->mo_rest_api_authentication_get_option("\x6d\157\x5f\x61\160\151\137\141\165\x74\x68\145\x6e\x74\151\143\x61\164\x69\x6f\156\137\141\144\x6d\x69\x6e\x5f\x63\165\x73\x74\157\155\145\162\x5f\153\145\171");
        $vw = $bC->mo_rest_api_authentication_get_option("\x6d\157\137\141\x70\x69\x5f\141\x75\164\x68\x65\x6e\164\x69\x63\x61\164\151\157\156\x5f\x61\144\x6d\x69\x6e\x5f\141\160\x69\x5f\x6b\145\x79");
        $ga = $bC->morestapidecrypt($H2);
        $eP = round(microtime(true) * 1000);
        $eP = number_format($eP, 0, '', '');
        $iT = $Xu . $eP . $vw;
        $UT = hash("\163\150\x61\65\x31\x32", $iT);
        $pz = "\103\x75\x73\x74\x6f\155\145\162\x2d\113\145\171\72\40" . $Xu;
        $Z5 = "\124\x69\x6d\145\163\164\141\x6d\160\x3a\x20" . $eP;
        $La = "\101\x75\164\x68\x6f\x72\151\x7a\x61\x74\151\x6f\x6e\72\40" . $UT;
        $Tl = '';
        $Tl = array("\143\x6f\144\x65" => $ga, "\143\x75\163\164\157\155\145\162\113\145\171" => $Xu, "\141\x64\x64\x69\164\151\x6f\x6e\x61\x6c\106\x69\145\154\144\163" => array("\146\151\x65\154\144\x31" => site_url()));
        $pg = wp_json_encode($Tl);
        $x3 = array("\x43\157\x6e\x74\x65\x6e\164\x2d\124\x79\160\x65" => "\x61\x70\160\x6c\151\143\x61\x74\151\x6f\x6e\57\x6a\x73\157\156");
        $x3["\x43\x75\x73\x74\157\155\x65\162\x2d\x4b\145\171"] = $Xu;
        $x3["\x54\x69\155\145\x73\164\x61\155\160"] = $eP;
        $x3["\101\x75\164\150\157\162\x69\x7a\x61\164\151\x6f\x6e"] = $UT;
        $WC = array("\x6d\x65\164\150\157\144" => "\x50\117\x53\x54", "\142\157\144\171" => $pg, "\164\x69\x6d\x65\x6f\x75\x74" => "\x35", "\x72\x65\144\151\x72\145\x63\164\151\x6f\x6e" => "\x35", "\150\x74\x74\160\x76\x65\162\163\151\x6f\156" => "\61\x2e\x30", "\142\x6c\x6f\143\x6b\151\156\x67" => true, "\150\145\x61\144\145\x72\163" => $x3);
        $MH = wp_remote_post($gg, $WC);
        if (!is_wp_error($MH)) {
            goto pM;
        }
        $EZ = $MH->get_error_message();
        echo "\123\157\155\x65\x74\150\151\x6e\x67\x20\167\145\x6e\x74\x20\x77\x72\157\x6e\147\x3a\x20{$EZ}";
        exit;
        pM:
        return wp_remote_retrieve_body($MH);
    }
}
