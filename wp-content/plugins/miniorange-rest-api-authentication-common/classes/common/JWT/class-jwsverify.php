<?php


namespace MoRESTAPI;

class JWSVerify
{
    public $algo;
    public function __construct($UO = '')
    {
        if (!empty($UO)) {
            goto uN;
        }
        return;
        uN:
        $UO = explode("\123", $UO);
        if (!(!is_array($UO) || 2 !== count($UO))) {
            goto Ms;
        }
        return WP_Error("\151\x6e\166\x61\x6c\x69\x64\x5f\x73\151\147\156\x61\x74\x75\162\x65", __("\x54\x68\145\40\123\x69\x67\156\x61\x74\x75\162\145\40\x73\x65\145\x6d\x73\40\164\x6f\40\142\145\40\151\x6e\166\141\x6c\151\144\40\x6f\x72\40\165\156\x73\x75\160\160\x6f\x72\164\x65\x64\x2e"));
        Ms:
        if ("\x48" === $UO[0]) {
            goto D3;
        }
        if ("\122" === $UO[0]) {
            goto EW;
        }
        return WP_Error("\151\156\x76\x61\x6c\x69\144\x5f\163\x69\147\x6e\x61\x74\x75\x72\145", __("\x54\150\x65\x20\163\x69\147\156\141\x74\165\x72\x65\40\x61\x6c\147\x6f\162\151\x74\150\155\x20\163\x65\145\x6d\x73\x20\164\157\x20\x62\x65\x20\x75\156\x73\x75\160\x70\x6f\162\164\x65\x64\x20\x6f\162\40\x69\156\166\x61\x6c\151\x64\x2e"));
        goto Zx;
        D3:
        $this->algo["\x61\x6c\147"] = "\110\x53\101";
        goto Zx;
        EW:
        $this->algo["\141\154\x67"] = "\122\x53\101";
        Zx:
        $this->algo["\163\x68\x61"] = $UO[1];
    }
    private function validate_hmac($Jc = '', $ji = '', $VH = '')
    {
        if (!(empty($Jc) || empty($VH))) {
            goto Mq;
        }
        return false;
        Mq:
        $ja = $this->algo["\163\x68\x61"];
        $ja = "\163\x68\141" . $ja;
        $NM = \hash_hmac($ja, $Jc, $ji, true);
        return hash_equals($NM, $VH);
    }
    private function validate_rsa($Jc = '', $n1 = '', $VH = '')
    {
        if (!(empty($Jc) || empty($VH))) {
            goto IO;
        }
        return false;
        IO:
        $ja = $this->algo["\x73\x68\141"];
        $Nj = '';
        $rO = explode("\x2d\x2d\55\x2d\x2d", $n1);
        if (preg_match("\57\x5c\162\134\x6e\x7c\x5c\x72\x7c\x5c\x6e\x2f", $rO[2])) {
            goto nd;
        }
        $FH = "\55\x2d\55\55\55" . $rO[1] . "\55\x2d\x2d\55\x2d\12";
        $I2 = 0;
        YB:
        if (!($pD = substr($rO[2], $I2, 64))) {
            goto kY;
        }
        $FH .= $pD . "\12";
        $I2 += 64;
        goto YB;
        kY:
        $FH .= "\x2d\x2d\55\55\x2d" . $rO[3] . "\55\x2d\x2d\55\55\12";
        $Nj = $FH;
        goto oQ;
        nd:
        $Nj = $n1;
        oQ:
        $WN = false;
        switch ($ja) {
            case "\x32\65\x36":
                $WN = openssl_verify($Jc, $VH, $Nj, OPENSSL_ALGO_SHA256);
                goto DD;
            case "\x33\x38\64":
                $WN = openssl_verify($Jc, $VH, $Nj, OPENSSL_ALGO_SHA384);
                goto DD;
            case "\x35\x31\62":
                $WN = openssl_verify($Jc, $VH, $Nj, OPENSSL_ALGO_SHA512);
                goto DD;
            default:
                $WN = false;
                goto DD;
        }
        Qm:
        DD:
        return $WN;
    }
    public function verify($Jc = '', $ji = '', $VH = '', $Oi = true)
    {
        if (!(empty($Jc) || empty($VH))) {
            goto CV;
        }
        return false;
        CV:
        $UO = $this->algo["\x61\154\x67"];
        switch ($UO) {
            case "\110\x53\x41":
                return $this->validate_hmac($Jc, $ji, $VH);
            case "\x52\x53\101":
                return @$this->validate_rsa($Jc, $ji, $VH);
            default:
                return false;
        }
        cY:
        En:
    }
}
