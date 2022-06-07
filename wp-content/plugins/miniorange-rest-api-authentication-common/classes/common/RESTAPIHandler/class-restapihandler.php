<?php


namespace MoRESTAPI;

use MoRestAPI\ProtectedRESTAPIs;
use MoRESTAPI\AdvanceSettings;
use MoRESTAPI\Base\InstanceHelper;
class RESTAPIHandler
{
    private $selected_method;
    public function __construct()
    {
        global $bC;
        if ($bC->mo_rest_api_authentication_get_option("\x6d\157\x5f\141\x70\x69\137\155\x69\x67\x72\x61\164\x65")) {
            goto uR;
        }
        $this->mo_api_authentication_migration();
        $bC->mo_rest_api_authentication_update_option("\x6d\157\137\x61\160\x69\x5f\155\151\147\x72\141\x74\145", 1);
        uR:
        add_action("\x72\145\163\x74\137\141\x70\151\137\x69\x6e\x69\164", array($this, "\155\x6f\137\151\156\x69\x74\x69\x61\x6c\x69\x7a\x65\x5f\x61\x70\151\137\146\154\157\167"), 10, 1);
    }
    function strpos_arr($SD, $WZ)
    {
        foreach ($WZ as $O8 => $pj) {
            if (!(stripos($SD, $pj) !== false)) {
                goto kN;
            }
            return true;
            kN:
            UA:
        }
        Tg:
        return false;
    }
    function mo_api_authentication_migration()
    {
        global $bC;
        if (!$bC->mo_rest_api_authentication_get_option("\155\x6f\137\x61\x70\151\137\x61\x75\164\150\x65\x6e\x74\x69\x63\x61\164\x69\x6f\x6e\137\163\145\154\145\x63\x74\x65\x64\137\141\165\x74\150\x65\x6e\164\x69\x63\141\x74\x69\x6f\156\x5f\x6d\x65\x74\150\157\x64")) {
            goto vQ;
        }
        $Vs = new AdvanceSettings();
        $f4 = $Vs->get_adv_settings();
        $yf = $bC->mo_rest_api_authentication_get_option("\155\x6f\137\x61\160\151\x5f\x63\165\x73\x74\x6f\x6d\x5f\150\x65\x61\x64\145\162") ? $bC->mo_rest_api_authentication_get_option("\x6d\157\x5f\141\160\151\137\143\x75\x73\164\157\x6d\x5f\x68\x65\x61\x64\145\162") : "\x41\165\x74\150\157\x72\151\172\x61\164\x69\157\x6e";
        $M1 = $bC->mo_rest_api_authentication_get_option("\155\x6f\137\141\x70\x69\137\x74\157\x6b\x65\x6e\137\145\170\x70\151\162\171") ? $bC->mo_rest_api_authentication_get_option("\155\x6f\137\x61\160\x69\137\x74\x6f\153\x65\156\137\x65\170\160\x69\x72\x79") : 60;
        $s1 = $bC->mo_rest_api_authentication_get_option("\x6d\x6f\137\x61\x70\x69\137\162\145\146\x72\x65\x73\150\137\164\x6f\153\145\x6e\137\145\170\x70\151\162\x79\137\157\x70\x74\x69\x6f\156") ? $bC->mo_rest_api_authentication_get_option("\155\157\x5f\141\160\151\x5f\162\145\x66\x72\145\x73\x68\137\x74\157\x6b\x65\156\x5f\x65\170\x70\151\162\171\x5f\x6f\x70\164\151\x6f\x6e") : "\x64\141\x79\163";
        $mB = $bC->mo_rest_api_authentication_get_option("\155\157\x5f\141\x70\151\137\x72\145\146\x72\x65\x73\150\x5f\x74\157\153\145\x6e\x5f\x65\170\x70\x69\162\x79") ? $bC->mo_rest_api_authentication_get_option("\x6d\157\137\x61\160\151\x5f\162\145\x66\162\145\x73\150\137\x74\157\x6b\145\156\x5f\145\x78\x70\151\162\171") : 14;
        $l0 = $bC->mo_rest_api_authentication_get_option("\x6d\157\x5f\141\x70\x69\x5f\x61\x75\164\150\137\164\x70\160\x5f\x75\163\145\162\137\163\145\x74\x74\151\156\147\163\x5f\143\162\145\141\x74\151\x6f\x6e") ? $bC->mo_rest_api_authentication_get_option("\x6d\x6f\137\x61\160\x69\137\x61\x75\164\x68\137\x74\160\160\137\165\163\x65\x72\137\163\145\x74\164\x69\156\x67\163\x5f\x63\162\145\141\x74\151\157\156") : false;
        $Cv = $bC->mo_rest_api_authentication_get_option("\155\x6f\x5f\x61\x70\x69\x5f\x61\165\x74\150\x5f\164\x70\x70\x5f\165\x73\x65\x72\137\x73\145\164\164\151\x6e\147\x73\x5f\141\143\x63\145\163\x73") ? $bC->mo_rest_api_authentication_get_option("\x6d\x6f\137\x61\x70\151\x5f\141\165\164\150\137\164\160\160\x5f\x75\x73\x65\x72\137\x73\145\164\164\x69\x6e\147\x73\x5f\x61\x63\x63\x65\x73\x73") : false;
        $fo = array();
        if (!$bC->mo_rest_api_authentication_get_option("\x6d\x6f\x5f\141\160\151\137\x65\x78\x63\x6c\x75\144\145\x5f\x61\x70\151\163")) {
            goto BF;
        }
        $qg = $bC->mo_rest_api_authentication_get_option("\x6d\157\137\x61\160\151\x5f\145\x78\143\x6c\165\144\x65\137\x61\x70\151\x73");
        foreach ($qg as $a7) {
            $TN = substr($a7, 8);
            array_push($fo, $TN);
            qd:
        }
        Fi:
        BF:
        $f4["\143\x75\163\164\157\155\137\x68\x65\x61\x64\145\x72"] = $yf;
        $f4["\164\157\153\x65\x6e\137\145\170\160\x69\x72\171"] = $M1;
        $f4["\162\145\146\x72\145\163\x68\137\164\x6f\x6b\145\x6e\137\x65\170\160\x69\162\171\137\x6f\x70\x74\151\157\156"] = $s1;
        $f4["\162\145\x66\x72\x65\163\x68\137\x74\157\153\x65\x6e\x5f\145\x78\x70\x69\162\171"] = $mB;
        $f4["\164\160\160\137\x75\163\145\x72\x5f\x73\x65\164\164\x69\x6e\147\163\x5f\x63\162\145\141\164\151\x6f\x6e"] = $l0;
        $f4["\x74\160\x70\x5f\x75\163\145\162\x5f\x73\x65\164\x74\x69\156\x67\x73\x5f\x61\x63\143\x65\x73\x73"] = $Cv;
        $f4["\145\x78\x63\x6c\165\144\145\137\x72\x65\163\164\137\141\160\x69\x73"] = $fo;
        $bC->mo_rest_api_authentication_update_option("\x6d\x6f\137\141\160\151\x5f\141\165\x74\x68\145\156\164\x69\143\141\x74\151\157\x6e\137\141\144\x76\141\x6e\143\x65\137\x73\x65\x74\x74\151\156\147\163", $f4);
        if (!$bC->mo_rest_api_authentication_get_option("\155\x6f\137\141\160\x69\x5f\x61\165\164\x68\x5f\141\x6c\154\x6f\167\x65\x64\x5f\165\x73\145\162\x5f\x72\157\x6c\145\x73")) {
            goto BE;
        }
        $xc = $bC->mo_rest_api_authentication_get_option("\155\157\x5f\x61\x70\x69\137\x61\165\x74\150\x5f\x61\x6c\154\157\167\x65\x64\137\165\163\x65\x72\x5f\x72\157\154\145\163");
        $m1 = array("\x61\165\164\150\x6f\x72" => 0, "\145\x64\x69\x74\x6f\x72" => 0, "\x63\157\x6e\164\x72\x69\x62\165\x74\x6f\162" => 0, "\163\165\142\163\143\162\151\142\145\x72" => 0, "\x61\x64\155\151\156\151\163\x74\162\x61\x74\x6f\x72" => 1);
        foreach ($xc as $O8) {
            $m1[$O8] = 1;
            Rp:
        }
        rt:
        $bC->mo_rest_api_authentication_update_option("\155\157\137\141\160\x69\x5f\141\x75\x74\150\137\141\154\154\157\167\x65\x64\137\165\163\145\162\137\x72\x6f\154\145\163", $m1);
        BE:
        $gE = $bC->mo_rest_api_authentication_get_option("\155\157\137\141\160\x69\137\141\x75\x74\x68\145\x6e\x74\x69\143\x61\164\x69\157\x6e\137\x73\x65\154\x65\143\164\145\144\137\x61\165\x74\x68\x65\x6e\164\151\143\141\164\x69\x6f\x6e\137\x6d\145\164\x68\x6f\x64");
        $vl = array();
        $lc = isset($vl[$gE]) ? $vl[$gE] : false;
        if ($gE == "\164\x6f\x6b\145\156\141\160\x69") {
            goto MB;
        }
        if ($gE == "\x62\141\x73\151\x63\x5f\x61\165\x74\x68") {
            goto nu;
        }
        if ($gE == "\152\x77\x74\x5f\141\x75\x74\150") {
            goto HY;
        }
        if ($gE == "\157\141\165\x74\150\x5f\143\x6c\x69\145\156\164") {
            goto jg;
        }
        if (!($gE == "\164\x68\x69\x72\x64\160\141\x72\164\171\160\162\157\x76\x69\144\145\x72")) {
            goto c3;
        }
        $mD = $bC->mo_rest_api_authentication_get_option("\x6d\x6f\x5f\x61\160\151\137\x61\x75\164\150\145\x6e\164\151\x63\141\164\x69\x6f\156\x5f\164\160\x70\x5f\x69\x6e\164\x72\x6f\163\x70\x65\x63\x74\151\x6f\x6e\137\145\156\x64\160\157\151\156\x74") ? $bC->mo_rest_api_authentication_get_option("\155\x6f\x5f\141\x70\x69\137\141\165\x74\x68\145\x6e\x74\151\x63\141\x74\151\x6f\156\x5f\x74\x70\160\x5f\x69\x6e\164\162\x6f\x73\x70\145\x63\x74\151\157\x6e\137\145\x6e\x64\160\157\x69\156\x74") : '';
        $lc["\x69\156\164\x72\157\163\x70\145\143\x74\x69\x6f\156\x5f\145\x6e\x64\160\x6f\151\156\164"] = $mD;
        $lc["\x63\x6c\151\145\156\164\137\151\x64"] = '';
        $lc["\143\x6c\151\x65\156\x74\137\x73\x65\143\x72\145\164"] = '';
        c3:
        goto UL;
        jg:
        $j_ = $bC->mo_rest_api_authentication_get_option("\155\157\137\x61\160\x69\x5f\x61\x75\164\150\145\x6e\x74\151\143\141\164\151\x6f\x6e\x5f\147\x72\x61\x6e\x74\x5f\164\x79\160\145") ? $bC->mo_rest_api_authentication_get_option("\155\157\137\141\160\151\x5f\141\x75\164\x68\x65\x6e\164\x69\143\x61\x74\x69\x6f\x6e\x5f\147\x72\141\x6e\164\x5f\164\171\160\x65") : '';
        $eH = $bC->mo_rest_api_authentication_get_option("\155\157\137\141\160\151\x5f\141\165\164\150\145\x6e\x74\x69\143\141\x74\x69\x6f\x6e\137\x74\x6f\153\x65\x6e\137\x74\171\160\145") ? $bC->mo_rest_api_authentication_get_option("\155\157\x5f\x61\x70\x69\137\x61\x75\x74\x68\145\x6e\x74\x69\143\x61\164\151\157\x6e\x5f\164\157\153\x65\x6e\x5f\164\171\160\145") : '';
        $s3 = $bC->mo_rest_api_authentication_get_option("\x6d\157\137\141\160\151\137\141\x75\164\x68\137\143\x6c\151\x65\x6e\164\x69\144") ? $bC->mo_rest_api_authentication_get_option("\x6d\157\x5f\x61\x70\151\x5f\x61\x75\x74\150\x5f\x63\x6c\x69\145\156\164\151\x64") : '';
        $OD = $bC->mo_rest_api_authentication_get_option("\155\x6f\137\141\x70\x69\137\x61\165\164\150\137\x63\154\x69\x65\x6e\164\x73\x65\x63\162\145\164") ? $bC->mo_rest_api_authentication_get_option("\x6d\x6f\x5f\141\x70\x69\x5f\141\165\164\150\137\143\x6c\151\145\156\x74\163\x65\x63\162\145\164") : '';
        $lc["\x61\165\x74\150\x65\156\164\151\143\141\x74\x69\x6f\x6e\137\x67\x72\141\x6e\x74\137\164\x79\160\145"] = $j_;
        $lc["\x61\x75\x74\150\145\156\164\x69\143\141\164\151\157\156\x5f\x74\157\x6b\145\x6e\x5f\x74\x79\160\145"] = $eH;
        $lc["\x65\x6e\141\x62\x6c\x65\137\x72\145\x66\x72\145\x73\150\x5f\x74\x6f\153\x65\156"] = 0;
        $lc["\x65\156\x61\142\154\145\137\162\145\166\x6f\153\x65\x5f\x74\157\x6b\x65\156"] = 0;
        $lc["\x63\154\x69\145\x6e\164\137\x69\x64"] = $s3;
        $lc["\x63\154\x69\x65\x6e\x74\x5f\x73\145\x63\162\145\164"] = $OD;
        UL:
        goto zX;
        HY:
        $p8 = $bC->mo_rest_api_authentication_get_option("\x6d\x6f\x5f\141\x70\151\x5f\141\165\x74\150\145\156\x74\x69\x63\141\x74\151\157\156\x5f\x6a\x77\x74\x5f\x63\154\x69\145\156\x74\x5f\x73\x65\143\x72\145\164") ? $bC->mo_rest_api_authentication_get_option("\155\157\137\x61\160\151\137\141\165\164\150\145\x6e\164\x69\143\141\x74\151\x6f\x6e\x5f\x6a\x77\x74\137\x63\154\151\x65\x6e\164\x5f\x73\145\x63\x72\x65\x74") : '';
        $hm = $bC->mo_rest_api_authentication_get_option("\x6d\157\137\x61\160\151\137\141\165\x74\150\145\156\x74\151\x63\x61\x74\x69\x6f\x6e\137\152\x77\164\x5f\x73\x69\x67\x6e\151\156\147\x5f\141\154\x67\157\x72\x69\x74\150\x6d") ? $bC->mo_rest_api_authentication_get_option("\x6d\x6f\137\141\160\x69\137\141\x75\164\150\145\x6e\x74\x69\143\x61\164\x69\x6f\156\137\x6a\x77\164\137\163\151\x67\x6e\151\156\x67\137\x61\154\147\157\162\x69\x74\150\x6d") : '';
        $da = $bC->mo_rest_api_authentication_get_option("\155\x6f\137\x61\x70\x69\x5f\x61\165\x74\x68\145\156\164\151\x63\141\x74\151\x6f\x6e\137\160\165\142\x6c\x69\x63\x5f\x63\145\162\x74") ? $bC->mo_rest_api_authentication_get_option("\x6d\x6f\x5f\141\160\x69\137\x61\x75\x74\150\x65\156\164\x69\143\x61\x74\151\157\x6e\x5f\x70\165\x62\x6c\151\x63\137\143\x65\x72\x74") : '';
        $kl = $bC->mo_rest_api_authentication_get_option("\x6d\x6f\x5f\x61\x70\151\x5f\141\x75\164\150\x65\156\164\151\x63\x61\x74\x69\x6f\x6e\x5f\x70\162\151\x76\141\x74\145\137\x63\x65\162\x74") ? $bC->mo_rest_api_authentication_get_option("\155\157\x5f\141\160\x69\137\141\165\164\150\145\156\164\x69\x63\141\x74\x69\157\x6e\x5f\x70\162\151\166\141\164\x65\x5f\x63\145\x72\164") : '';
        $lc["\x6a\x77\164\137\x61\x6c\147\157"] = $hm;
        $lc["\x6a\x77\164\137\163\x65\143\162\x65\164"] = $p8;
        $lc["\160\x72\x69\166\x61\164\145\153\x65\171"] = $kl;
        $lc["\160\x75\x62\154\x69\143\153\145\x79"] = $da;
        zX:
        goto Eo;
        nu:
        $nR = $bC->mo_rest_api_authentication_get_option("\x6d\157\x5f\x61\160\151\x5f\141\165\x74\x68\145\156\x74\151\143\x61\164\x69\157\x6e\137\x61\165\164\x68\145\156\164\151\143\x61\164\151\157\x6e\x5f\153\x65\x79") ? $bC->mo_rest_api_authentication_get_option("\x6d\157\137\141\x70\151\x5f\x61\165\x74\150\x65\156\164\151\143\141\x74\x69\x6f\x6e\x5f\x61\x75\164\150\x65\156\164\x69\x63\141\164\x69\157\x6e\137\x6b\145\171") : '';
        $I7 = $bC->mo_rest_api_authentication_get_option("\155\157\137\141\x70\x69\x5f\141\x75\x74\150\145\x6e\x74\x69\x63\x61\x74\x69\157\x6e\x5f\x61\165\x74\150\x65\x6e\164\x69\x63\x61\x74\x69\x6f\156\x5f\153\x65\171") ? $bC->mo_rest_api_authentication_get_option("\x6d\x6f\137\141\x70\151\x5f\141\165\164\x68\145\156\x74\x69\143\x61\164\x69\x6f\156\137\141\165\x74\150\x65\x6e\164\151\x63\141\164\x69\157\156\x5f\153\x65\x79") : '';
        $lc["\x61\165\x74\x68\x65\x6e\164\151\143\x61\164\151\x6f\x6e\137\153\x65\x79\x5f\164\171\160\x65"] = $nR;
        $lc["\141\x75\164\150\145\156\164\x69\143\141\164\151\x6f\x6e\137\153\x65\x79\137\x65\x6e\x63\x72\x79\x70\164\x69\x6f\156"] = $I7;
        if (!($lc["\141\x75\x74\x68\145\156\164\x69\143\141\164\x69\157\x6e\137\x6b\x65\171\137\164\171\x70\x65"] == "\143\x69\x64\137\163\x65\x63\162\x65\164")) {
            goto Mz;
        }
        $Hq = $bC->mo_rest_api_authentication_get_option("\x6d\157\x5f\x61\160\x69\x5f\141\x75\164\x68\137\143\x6c\x69\x65\x6e\164\x69\144") ? $bC->mo_rest_api_authentication_get_option("\x6d\157\137\x61\160\x69\x5f\141\165\164\150\137\x63\x6c\151\145\156\164\x69\x64") : '';
        $Pb = $bC->mo_rest_api_authentication_get_option("\155\157\x5f\141\x70\x69\x5f\x61\x75\x74\x68\x5f\143\154\151\x65\156\x74\163\x65\x63\x72\145\x74") ? $bC->mo_rest_api_authentication_get_option("\155\157\137\x61\160\x69\x5f\x61\165\164\150\x5f\x63\154\151\x65\x6e\x74\x73\x65\x63\x72\x65\164") : '';
        $lc["\143\x6c\x69\145\x6e\164\x5f\151\144"] = $Hq;
        $lc["\x63\x6c\x69\x65\156\x74\137\163\x65\x63\x72\145\164"] = $Pb;
        Mz:
        Eo:
        goto kR;
        MB:
        $vw = $bC->mo_rest_api_authentication_get_option("\x6d\157\x5f\x61\x70\151\x5f\141\x75\x74\x68\x5f\x62\x65\141\162\x65\162\x5f\x74\x6f\153\x65\x6e") ? $bC->mo_rest_api_authentication_get_option("\155\157\137\141\160\x69\137\x61\165\164\150\137\x62\x65\x61\x72\145\162\137\164\x6f\x6b\x65\x6e") : '';
        $lc["\x61\x70\151\137\x6b\x65\171"] = $vw;
        kR:
        $vl[$gE] = $lc;
        $bC->mo_rest_api_authentication_update_option("\x6d\x6f\137\x61\160\x69\x5f\141\165\x74\x68\x65\156\x74\x69\x63\141\x74\x69\x6f\156\137\155\x65\x74\x68\x6f\144\x5f\145\x78\164\162\141\163", $vl);
        vQ:
    }
    public function mo_initialize_api_flow()
    {
        global $bC;
        if (!is_user_logged_in()) {
            goto YQ;
        }
        return true;
        YQ:
        $fa = new InstanceHelper();
        $W_ = $fa->get_configured_method_instance();
        $ks = new AdvanceSettings();
        if (!is_multisite()) {
            goto ou;
        }
        $blog_id = get_current_blog_id();
        $Xt = $bC->mo_rest_api_authentication_get_option("\155\157\x5f\x72\x65\163\x74\x5f\143\x33\x56\x69\x63\62\x6c\60\132\130\x4e\172\x5a\x57\170\x6c\131\x33\x52\154\x5a\101");
        $yU = array();
        if (!isset($Xt)) {
            goto BD;
        }
        $yU = json_decode($bC->morestapidecrypt($Xt), true);
        BD:
        $L9 = false;
        $tI = $bC->mo_rest_api_authentication_get_option("\x6d\157\137\162\x65\163\x74\137\141\160\x69\137\x69\163\x4d\x75\x6c\164\151\x53\x69\164\145\120\x6c\x75\x67\151\156\122\145\161\x75\145\163\x74\x65\144");
        if (!(is_array($yU) && in_array($blog_id, $yU))) {
            goto ld;
        }
        $L9 = true;
        ld:
        if (!(is_multisite() && $tI && ($tI && !$L9) && $bC->mo_rest_api_authentication_get_option("\155\157\x5f\162\145\x73\164\x5f\141\x70\x69\137\x6e\157\117\146\123\165\x62\123\151\164\x65\163") < 1000)) {
            goto H6;
        }
        return true;
        H6:
        ou:
        if (!(strpos($_SERVER["\122\x45\121\125\x45\x53\124\137\125\122\x49"], "\x2f\141\x70\151\57\x76\61\57\x74\157\x6b\145\x6e") !== false && method_exists($W_, "\x67\145\x74\x5f\164\x6f\x6b\145\156\x5f\x72\x65\163\x70\157\156\163\145"))) {
            goto yb;
        }
        $e1 = file_get_contents("\x70\150\160\x3a\x2f\57\x69\156\x70\x75\x74");
        $e1 = json_decode($e1, true);
        if (!(json_last_error() !== JSON_ERROR_NONE)) {
            goto N2;
        }
        $e1 = $_POST;
        N2:
        $MH = $W_->get_token_response($e1, $ks);
        $bC->send_json_response($MH);
        yb:
        if (!has_filter("\155\x6f\x5f\x72\145\x73\x74\137\x65\x78\x74\145\x6e\x64\137\x74\x6f\x6b\145\156\x65\x6e\144\x70\157\x69\x6e\x74")) {
            goto ux;
        }
        $MH = apply_filters("\x6d\x6f\137\162\x65\163\164\137\x65\x78\164\x65\x6e\x64\x5f\x74\x6f\x6b\145\x6e\x65\156\x64\x70\157\x69\x6e\164", "\x74\145\x73\x74");
        ux:
        $sZ = $bC->get_current_rest_url();
        $SO = new ProtectedRESTAPIs(true);
        $gp = $ks->get_exclude_rest_apis();
        if (!($gp !== false && $gp !== '')) {
            goto Ri;
        }
        if (!($this->strpos_arr($sZ, $gp) === true)) {
            goto c0;
        }
        return true;
        c0:
        Ri:
        if (!$bC->mo_rest_api_authentication_get_option("\x6d\x6f\x5f\x61\160\x69\x5f\141\x75\164\150\145\156\x74\x69\x63\x61\164\151\x6f\156\x5f\x70\162\157\x74\x65\143\x74\145\x64\x72\x65\163\164\141\x70\x69\137\162\157\165\164\145\137\167\150\x69\164\145\154\151\163\164")) {
            goto ZH;
        }
        if (!$SO->check_if_route_is_whitelisted($sZ)) {
            goto ZS;
        }
        return true;
        ZS:
        ZH:
        $yf = $ks->get_custom_header();
        $Uv = $bC->get_all_headers();
        $MH = false;
        $x3 = \MoRestAPIConstants::HEADERS;
        array_push($x3, $yf);
        $L9 = false;
        $La = false;
        foreach ($x3 as $O8 => $pj) {
            if (!(isset($Uv[strtoupper($pj)]) && '' !== $Uv[strtoupper($pj)])) {
                goto ua;
            }
            $L9 = true;
            $La = $Uv[strtoupper($pj)];
            goto J7;
            ua:
            Xp:
        }
        J7:
        if ($L9) {
            goto Lq;
        }
        $MH = array("\x73\x74\141\x74\x75\163" => "\145\162\162\157\162", "\x63\x6f\144\x65" => 401, "\145\x72\162\157\x72" => "\115\111\x53\123\111\116\107\x5f\101\125\124\x48\x4f\122\x49\x5a\101\124\111\x4f\116\137\110\105\x41\x44\x45\122", "\x65\x72\x72\x6f\162\x5f\144\145\163\x63\x72\x69\x70\164\151\157\156" => "\x41\165\164\150\x6f\x72\x69\172\141\164\x69\x6f\156\x20\150\145\141\144\145\x72\40\156\157\x74\40\x72\145\x63\145\151\166\x65\144\56\x20\105\x69\164\150\145\162\x20\141\165\164\150\x6f\x72\x69\x7a\141\x74\x69\157\156\40\150\x65\x61\x64\145\x72\40\167\x61\x73\40\156\x6f\x74\x20\163\145\156\164\40\157\162\x20\x69\164\40\x77\x61\x73\40\162\145\155\157\x76\145\144\x20\x62\x79\40\171\157\165\x72\40\163\x65\x72\x76\145\162\x20\x64\x75\145\x20\164\x6f\x20\163\145\x63\165\x72\x69\164\171\x20\x72\145\141\163\x6f\156\x73\56");
        goto S8;
        Lq:
        if (!is_null($W_)) {
            goto v2;
        }
        $MH = array("\163\x74\141\x74\165\163" => "\145\162\162\157\162", "\143\157\144\x65" => 403, "\145\x72\162\157\162" => "\x4d\105\124\110\x4f\x44\137\116\x4f\x54\x5f\x41\103\103\x45\x53\x53\x49\x42\x4c\105", "\145\x72\162\157\162\137\144\x65\x73\143\162\x69\160\x74\151\x6f\x6e" => "\x59\157\x75\x20\141\162\145\x20\x6e\157\164\40\141\x6c\154\157\x77\x65\144\x20\164\157\40\141\143\143\x65\x73\163\40\164\x68\x69\163\40\101\x50\111\x20\101\x75\x74\150\x65\x6e\164\151\x63\x61\x74\151\157\156\x20\x6d\145\164\x68\x6f\144\56\x20\120\154\x65\x61\163\x65\40\143\x6f\156\x74\x61\x63\x74\40\164\157\x20\171\x6f\x75\162\40\141\x64\x6d\x69\x6e\x69\163\164\x72\141\x74\157\x72\x2e");
        $bC->send_json_response($MH);
        v2:
        $MH = $W_->handle_rest_flow($ks, $La);
        if (!(true !== $MH && has_filter("\155\x6f\x5f\162\x65\x73\x74\137\145\170\x74\x65\156\144\137\x61\x75\x74\x68\x65\156\164\x69\x63\141\x74\x69\x6f\156"))) {
            goto qp;
        }
        $MH = apply_filters("\x6d\x6f\x5f\162\x65\163\164\137\x65\170\164\145\x6e\x64\137\x61\x75\x74\150\x65\x6e\x74\151\143\141\x74\x69\157\x6e", $Uv);
        qp:
        S8:
        if (true === $MH) {
            goto Qp;
        }
        if (!(false === $MH)) {
            goto k8;
        }
        $MH = array("\x73\x74\x61\x74\x75\163" => "\x65\162\162\x6f\x72", "\143\x6f\x64\145" => 401, "\x65\162\x72\x6f\162" => "\x55\x4e\x41\125\x54\110\x4f\x52\x49\x5a\x45\x44", "\x65\x72\x72\157\x72\137\144\145\163\143\162\x69\x70\164\x69\157\x6e" => "\x53\x6f\162\162\171\54\40\x79\x6f\x75\x20\x61\x72\x65\40\x6e\x6f\164\40\141\154\x6c\157\167\x65\x64\40\x74\x6f\x20\141\x63\x63\x65\x73\163\x20\x52\x45\x53\124\x20\x41\x50\111\56");
        k8:
        goto sb;
        Qp:
        return true;
        sb:
        $bC->send_json_response($MH);
    }
    public function mo_api_auth_check_user_access_permission($user)
    {
        global $bC;
        if (!function_exists("\x67\145\x74\137\x65\144\x69\x74\141\x62\x6c\145\137\162\157\x6c\145\163")) {
            require_once ABSPATH . "\x2f\167\160\x2d\141\x64\155\x69\x6e\x2f\151\x6e\x63\x6c\165\144\145\x73\57\165\163\145\162\x2e\x70\150\160";
        }
        if ($bC->mo_rest_api_authentication_get_option("\155\x6f\137\x61\160\x69\137\x61\165\164\150\137\x61\x6c\x6c\157\x77\x65\x64\137\x75\163\x65\162\x5f\x72\157\154\145\x73")) {
            goto FZ;
        }
        $iQ = array();
        $nP = array_keys(get_editable_roles());
        foreach ($nP as $XW) {
            $iQ[$XW] = 1;
            fY:
        }
        zr:
        $qr = $iQ;
        goto YG;
        FZ:
        $U4 = array_keys(get_editable_roles());
        $qr = $bC->mo_rest_api_authentication_get_option("\155\157\x5f\x61\160\151\x5f\x61\x75\164\x68\x5f\x61\x6c\154\x6f\167\x65\x64\137\165\x73\x65\162\x5f\162\x6f\154\145\x73");
        if (!(sizeof($U4) != sizeof($qr))) {
            goto oH;
        }
        $aj = array_diff($U4, array_keys($qr));
        foreach ($aj as $O8) {
            $qr[$O8] = 1;
            YM:
        }
        gx:
        $bC->mo_rest_api_authentication_update_option("\155\157\137\141\160\151\137\141\165\164\x68\x5f\x61\x6c\154\157\167\x65\144\x5f\165\163\x65\x72\137\162\157\154\x65\x73", $qr);
        oH:
        YG:
        $Lr = array_keys($user->caps)[0];
        if (!($qr[$Lr] == 0)) {
            goto fG;
        }
        $MH = array("\x73\164\x61\164\165\163" => "\145\x72\x72\157\x72", "\145\x72\162\157\162" => "\125\x4e\x41\x55\124\110\117\x52\111\132\105\104", "\x65\162\x72\157\x72\x5f\x64\145\163\143\162\151\x70\x74\x69\x6f\156" => "\122\145\163\x74\x72\151\x63\164\145\144\40\x61\x63\143\145\163\x73\40\164\157\x20\x74\x68\151\x73\x20\x55\x73\145\x72\x20\x52\x6f\x6c\x65\56", "\x63\157\x64\x65" => 401);
        $bC->send_json_response($MH);
        fG:
        return true;
    }
}
