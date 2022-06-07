<?php


namespace MoRESTAPI;

use MoRESTAPI\JWSVerify;
use MoRESTAPI\Crypt_RSA;
use MoRESTAPI\Math_BigInteger;
class JWTUtils
{
    const HEADER = "\110\105\101\x44\105\122";
    const PAYLOAD = "\120\x41\x59\114\x4f\101\x44";
    const SIGN = "\123\111\x47\116";
    private $jwt;
    private $decoded_jwt;
    public function __construct($mu = '')
    {
        $mu = \explode("\x2e", $mu);
        if (!(3 > count($mu))) {
            goto rp;
        }
        return new \WP_Error("\x69\156\166\141\x6c\x69\144\137\x6a\x77\x74", __("\112\127\124\x20\x52\x65\143\145\151\x76\145\144\x20\x69\x73\x20\x6e\157\164\40\141\40\x76\x61\x6c\151\144\x20\112\x57\x54"));
        rp:
        $this->jwt = $mu;
        $yg = $this->get_jwt_claim('', self::HEADER);
        $mH = $this->get_jwt_claim('', self::PAYLOAD);
        $this->decoded_jwt = array("\150\145\141\x64\x65\162" => $yg, "\x70\x61\171\x6c\157\x61\144" => $mH);
    }
    private function get_jwt_claim($QO = '', $wM = '')
    {
        $Mg = '';
        switch ($wM) {
            case self::HEADER:
                $Mg = $this->jwt[0];
                goto CX;
            case self::PAYLOAD:
                $Mg = $this->jwt[1];
                goto CX;
            case self::SIGN:
                return $this->jwt[2];
        }
        p4:
        CX:
        $Mg = json_decode(base64_decode($Mg), true);
        if (!(!$Mg || empty($Mg))) {
            goto A0;
        }
        return null;
        A0:
        return empty($QO) ? $Mg : (isset($Mg[$QO]) ? $Mg[$QO] : null);
    }
    public function jwt_token_segment_validation()
    {
        global $bC;
        $Vo = $this->jwt;
        return $bC->isJson($bC->base64url_decode($Vo[0])) && $bC->isJson($bC->base64url_decode($Vo[1]));
    }
    public function check_algo($lZ = '')
    {
        $MA = $this->get_jwt_claim("\141\x6c\147", self::HEADER);
        $MA = explode("\123", $MA);
        if (isset($MA[0])) {
            goto wn;
        }
        return false;
        wn:
        switch ($MA[0]) {
            case "\110":
                return "\110\123\x32\x35\x36" === $lZ;
            case "\122":
                return "\122\123\x32\65\66" === $lZ;
            default:
                return false;
        }
        jF:
        mm:
    }
    public function verify($ji = '', $fS = true)
    {
        if (!empty($ji)) {
            goto P2;
        }
        return false;
        P2:
        $AG = $this->get_jwt_claim("\x65\x78\160", self::PAYLOAD);
        if (!$fS) {
            goto R0;
        }
        if (!(is_null($AG) || time() > $AG)) {
            goto zW;
        }
        return false;
        zW:
        R0:
        $x0 = new JWSVerify($this->get_jwt_claim("\141\x6c\147", self::HEADER));
        $Jc = $this->get_header() . "\x2e" . $this->get_payload();
        return $x0->verify(\utf8_decode($Jc), $ji, base64_decode(strtr($this->get_jwt_claim(false, self::SIGN), "\x2d\x5f", "\53\57")));
    }
    public function verify_from_jwks($Bv = '', $MA = "\x52\x53\x32\x35\66")
    {
        global $bC;
        $gC = wp_remote_get($Bv);
        if (!is_wp_error($gC)) {
            goto qE;
        }
        return false;
        qE:
        $gC = json_decode($gC["\x62\x6f\144\171"], true);
        $WN = false;
        if (!(json_last_error() !== JSON_ERROR_NONE)) {
            goto BM;
        }
        return $WN;
        BM:
        if (isset($gC["\153\x65\x79\163"])) {
            goto xT;
        }
        return $WN;
        xT:
        foreach ($gC["\153\145\x79\x73"] as $O8 => $pj) {
            if (!(!isset($pj["\x6b\164\171"]) || "\x52\123\101" !== $pj["\153\164\x79"] || !isset($pj["\x65"]) || !isset($pj["\156"]))) {
                goto Bo;
            }
            goto wy;
            Bo:
            $WN = $WN || $this->verify($this->jwks_to_pem(["\156" => new Math_BigInteger($bC->base64url_decode($pj["\156"]), 256), "\145" => new Math_BigInteger($bC->base64url_decode($pj["\145"]), 256)]));
            if (!(true === $WN)) {
                goto pa;
            }
            goto Bq;
            pa:
            wy:
        }
        Bq:
        return $WN;
    }
    private function jwks_to_pem($sl = array())
    {
        $T1 = new Crypt_RSA();
        $T1->loadKey($sl);
        return $T1->getPublicKey();
    }
    public function get_decoded_header()
    {
        return $this->decoded_jwt["\x68\145\141\x64\x65\x72"];
    }
    public function get_decoded_payload()
    {
        return $this->decoded_jwt["\160\x61\x79\154\x6f\141\144"];
    }
    public function get_header()
    {
        return $this->jwt[0];
    }
    public function get_payload()
    {
        return $this->jwt[1];
    }
    public function create_jwt_token($Na, $XA, $dI, $AG, $hx = '')
    {
        global $bC;
        $Mn = 60 * intval($AG);
        $CG = time();
        $vm = time() + $Mn;
        $yg = json_encode(["\141\x6c\147" => $dI, "\x74\171\160" => "\x4a\127\x54"]);
        $mH = json_encode(array_merge($Na, ["\151\x61\x74" => $CG, "\145\170\160" => $vm]));
        $pT = $bC->base64url_encode($yg);
        $Oz = $bC->base64url_encode($mH);
        $mu = '';
        if ("\110\x53\62\65\x36" === $dI) {
            goto yW;
        }
        if (!("\122\123\62\x35\66" === $dI)) {
            goto Yd;
        }
        $vJ = $pT . "\x2e" . $Oz;
        openssl_sign($vJ, $SK, $hx, OPENSSL_ALGO_SHA256);
        $du = $bC->base64url_encode($SK);
        $mu = $vJ . "\x2e" . $du;
        Yd:
        goto cd;
        yW:
        $SK = hash_hmac("\x73\150\x61\x32\x35\x36", $pT . "\x2e" . $Oz, $XA, true);
        $du = $bC->base64url_encode($SK);
        $mu = $pT . "\56" . $Oz . "\x2e" . $du;
        cd:
        $k2 = array("\164\157\153\x65\x6e\137\x74\x79\x70\x65" => "\x42\x65\x61\162\x65\162", "\x69\x61\164" => $CG, "\145\170\x70\x69\162\x65\163\137\151\x6e" => $vm, "\152\x77\164\x5f\164\x6f\153\x65\156" => $mu, "\143\157\x64\145" => 200);
        return $k2;
    }
}
