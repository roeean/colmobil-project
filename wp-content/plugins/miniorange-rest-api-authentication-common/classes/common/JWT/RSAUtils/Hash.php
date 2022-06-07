<?php


namespace MoRESTAPI;

if (defined("\x43\122\x59\x50\124\137\110\x41\123\x48\137\115\x4f\104\x45\x5f\x49\116\x54\105\122\116\x41\x4c")) {
    goto ri;
}
define("\103\x52\131\120\124\137\x48\x41\123\x48\x5f\115\x4f\104\105\x5f\111\116\x54\x45\x52\x4e\x41\x4c", 1);
ri:
if (defined("\x43\x52\x59\120\x54\x5f\x48\101\x53\110\x5f\115\117\104\105\137\x4d\110\101\x53\x48")) {
    goto pW;
}
define("\x43\x52\131\120\x54\x5f\110\x41\123\x48\x5f\x4d\x4f\104\105\137\115\x48\101\x53\x48", 2);
pW:
if (defined("\x43\x52\131\120\x54\x5f\110\x41\123\x48\137\x4d\117\x44\x45\x5f\110\x41\123\110")) {
    goto iS;
}
define("\103\122\131\x50\124\x5f\x48\x41\x53\110\x5f\115\x4f\104\105\x5f\110\101\123\110", 3);
iS:
class Crypt_Hash
{
    var $hashParam;
    var $b;
    var $l = false;
    var $hash;
    var $key = false;
    var $opad;
    var $ipad;
    function __construct($Y9 = "\x73\150\x61\61")
    {
        if (defined("\x43\122\131\120\124\137\x48\101\123\x48\x5f\115\x4f\104\x45")) {
            goto ES;
        }
        switch (true) {
            case extension_loaded("\x68\141\163\150"):
                define("\x43\122\131\x50\x54\x5f\110\x41\x53\110\x5f\x4d\117\x44\x45", CRYPT_HASH_MODE_HASH);
                goto ii;
            case extension_loaded("\x6d\150\141\x73\x68"):
                define("\103\x52\x59\120\124\137\110\101\123\x48\x5f\115\117\104\105", CRYPT_HASH_MODE_MHASH);
                goto ii;
            default:
                define("\103\x52\x59\x50\124\x5f\x48\x41\123\x48\x5f\x4d\117\104\x45", CRYPT_HASH_MODE_INTERNAL);
        }
        I9:
        ii:
        ES:
        $this->setHash($Y9);
    }
    function Crypt_Hash($Y9 = "\x73\150\141\x31")
    {
        $this->__construct($Y9);
    }
    function setKey($O8 = false)
    {
        $this->key = $O8;
    }
    function getHash()
    {
        return $this->hashParam;
    }
    function setHash($Y9)
    {
        $this->hashParam = $Y9 = strtolower($Y9);
        switch ($Y9) {
            case "\x6d\x64\x35\x2d\71\x36":
            case "\x73\150\141\61\x2d\71\x36":
            case "\163\x68\141\62\65\x36\55\71\66":
            case "\x73\x68\x61\x35\61\x32\x2d\71\x36":
                $Y9 = substr($Y9, 0, -3);
                $this->l = 12;
                goto ee;
            case "\155\144\x32":
            case "\155\144\65":
                $this->l = 16;
                goto ee;
            case "\x73\150\x61\x31":
                $this->l = 20;
                goto ee;
            case "\163\150\x61\62\65\x36":
                $this->l = 32;
                goto ee;
            case "\163\150\141\63\70\x34":
                $this->l = 48;
                goto ee;
            case "\x73\150\141\65\x31\62":
                $this->l = 64;
        }
        Gi:
        ee:
        switch ($Y9) {
            case "\x6d\144\62":
                $qp = CRYPT_HASH_MODE == CRYPT_HASH_MODE_HASH && in_array("\155\144\62", hash_algos()) ? CRYPT_HASH_MODE_HASH : CRYPT_HASH_MODE_INTERNAL;
                goto RJ;
            case "\x73\150\141\x33\x38\64":
            case "\x73\150\x61\65\x31\62":
                $qp = CRYPT_HASH_MODE == CRYPT_HASH_MODE_MHASH ? CRYPT_HASH_MODE_INTERNAL : CRYPT_HASH_MODE;
                goto RJ;
            default:
                $qp = CRYPT_HASH_MODE;
        }
        Cm:
        RJ:
        switch ($qp) {
            case CRYPT_HASH_MODE_MHASH:
                switch ($Y9) {
                    case "\155\144\x35":
                        $this->hash = MHASH_MD5;
                        goto er;
                    case "\x73\150\141\62\65\x36":
                        $this->hash = MHASH_SHA256;
                        goto er;
                    case "\163\150\x61\61":
                    default:
                        $this->hash = MHASH_SHA1;
                }
                gR:
                er:
                return;
            case CRYPT_HASH_MODE_HASH:
                switch ($Y9) {
                    case "\x6d\x64\x35":
                        $this->hash = "\155\x64\65";
                        return;
                    case "\x6d\x64\x32":
                    case "\x73\150\x61\x32\65\x36":
                    case "\x73\x68\x61\63\x38\x34":
                    case "\163\150\x61\65\61\x32":
                        $this->hash = $Y9;
                        return;
                    case "\x73\x68\x61\x31":
                    default:
                        $this->hash = "\x73\x68\141\x31";
                }
                xd:
                L1:
                return;
        }
        M4:
        bR:
        switch ($Y9) {
            case "\x6d\144\x32":
                $this->b = 16;
                $this->hash = array($this, "\137\x6d\x64\62");
                goto oY;
            case "\x6d\144\65":
                $this->b = 64;
                $this->hash = array($this, "\x5f\155\144\65");
                goto oY;
            case "\163\x68\x61\62\x35\x36":
                $this->b = 64;
                $this->hash = array($this, "\137\x73\x68\141\62\x35\66");
                goto oY;
            case "\163\x68\x61\63\x38\64":
            case "\x73\150\141\65\x31\x32":
                $this->b = 128;
                $this->hash = array($this, "\x5f\163\150\141\65\x31\62");
                goto oY;
            case "\x73\x68\141\x31":
            default:
                $this->b = 64;
                $this->hash = array($this, "\137\x73\150\141\x31");
        }
        Du:
        oY:
        $this->ipad = str_repeat(chr(0x36), $this->b);
        $this->opad = str_repeat(chr(0x5c), $this->b);
    }
    function hash($Op)
    {
        $qp = is_array($this->hash) ? CRYPT_HASH_MODE_INTERNAL : CRYPT_HASH_MODE;
        if (!empty($this->key) || is_string($this->key)) {
            goto ka;
        }
        switch ($qp) {
            case CRYPT_HASH_MODE_MHASH:
                $tD = mhash($this->hash, $Op);
                goto no;
            case CRYPT_HASH_MODE_HASH:
                $tD = hash($this->hash, $Op, true);
                goto no;
            case CRYPT_HASH_MODE_INTERNAL:
                $tD = call_user_func($this->hash, $Op);
        }
        RC:
        no:
        goto Dd;
        ka:
        switch ($qp) {
            case CRYPT_HASH_MODE_MHASH:
                $tD = mhash($this->hash, $Op, $this->key);
                goto LQ;
            case CRYPT_HASH_MODE_HASH:
                $tD = hash_hmac($this->hash, $Op, $this->key, true);
                goto LQ;
            case CRYPT_HASH_MODE_INTERNAL:
                $O8 = strlen($this->key) > $this->b ? call_user_func($this->hash, $this->key) : $this->key;
                $O8 = str_pad($O8, $this->b, chr(0));
                $Ml = $this->ipad ^ $O8;
                $Ml .= $Op;
                $Ml = call_user_func($this->hash, $Ml);
                $tD = $this->opad ^ $O8;
                $tD .= $Ml;
                $tD = call_user_func($this->hash, $tD);
        }
        aL:
        LQ:
        Dd:
        return substr($tD, 0, $this->l);
    }
    function getLength()
    {
        return $this->l;
    }
    function _md5($cA)
    {
        return pack("\110\52", md5($cA));
    }
    function _sha1($cA)
    {
        return pack("\110\52", sha1($cA));
    }
    function _md2($cA)
    {
        static $rM = array(41, 46, 67, 201, 162, 216, 124, 1, 61, 54, 84, 161, 236, 240, 6, 19, 98, 167, 5, 243, 192, 199, 115, 140, 152, 147, 43, 217, 188, 76, 130, 202, 30, 155, 87, 60, 253, 212, 224, 22, 103, 66, 111, 24, 138, 23, 229, 18, 190, 78, 196, 214, 218, 158, 222, 73, 160, 251, 245, 142, 187, 47, 238, 122, 169, 104, 121, 145, 21, 178, 7, 63, 148, 194, 16, 137, 11, 34, 95, 33, 128, 127, 93, 154, 90, 144, 50, 39, 53, 62, 204, 231, 191, 247, 151, 3, 255, 25, 48, 179, 72, 165, 181, 209, 215, 94, 146, 42, 172, 86, 170, 198, 79, 184, 56, 210, 150, 164, 125, 182, 118, 252, 107, 226, 156, 116, 4, 241, 69, 157, 112, 89, 100, 113, 135, 32, 134, 91, 207, 101, 230, 45, 168, 2, 27, 96, 37, 173, 174, 176, 185, 246, 28, 70, 97, 105, 52, 64, 126, 15, 85, 71, 163, 35, 221, 81, 175, 58, 195, 92, 249, 206, 186, 197, 234, 38, 44, 83, 13, 110, 133, 40, 132, 9, 211, 223, 205, 244, 65, 129, 77, 82, 106, 220, 55, 200, 108, 193, 171, 250, 36, 225, 123, 8, 12, 189, 177, 74, 120, 136, 149, 139, 227, 99, 232, 109, 233, 203, 213, 254, 59, 0, 29, 57, 242, 239, 183, 14, 102, 88, 208, 228, 166, 119, 114, 248, 235, 117, 75, 10, 49, 68, 80, 180, 143, 237, 31, 26, 219, 153, 141, 51, 159, 17, 131, 20);
        $ck = 16 - (strlen($cA) & 0xf);
        $cA .= str_repeat(chr($ck), $ck);
        $iI = strlen($cA);
        $GB = str_repeat(chr(0), 16);
        $XF = chr(0);
        $uZ = 0;
        B1:
        if (!($uZ < $iI)) {
            goto dp;
        }
        $qP = 0;
        b0:
        if (!($qP < 16)) {
            goto Wk;
        }
        $GB[$qP] = chr($rM[ord($cA[$uZ + $qP] ^ $XF)] ^ ord($GB[$qP]));
        $XF = $GB[$qP];
        fi:
        $qP++;
        goto b0;
        Wk:
        RH:
        $uZ += 16;
        goto B1;
        dp:
        $cA .= $GB;
        $iI += 16;
        $Rb = str_repeat(chr(0), 48);
        $uZ = 0;
        YO:
        if (!($uZ < $iI)) {
            goto Gw;
        }
        $qP = 0;
        lZ:
        if (!($qP < 16)) {
            goto to;
        }
        $Rb[$qP + 16] = $cA[$uZ + $qP];
        $Rb[$qP + 32] = $Rb[$qP + 16] ^ $Rb[$qP];
        DH:
        $qP++;
        goto lZ;
        to:
        $I0 = chr(0);
        $qP = 0;
        oo:
        if (!($qP < 18)) {
            goto eT;
        }
        $rY = 0;
        Sg:
        if (!($rY < 48)) {
            goto Zm;
        }
        $Rb[$rY] = $I0 = $Rb[$rY] ^ chr($rM[ord($I0)]);
        WV:
        $rY++;
        goto Sg;
        Zm:
        $I0 = chr(ord($I0) + $qP);
        lK:
        $qP++;
        goto oo;
        eT:
        X2:
        $uZ += 16;
        goto YO;
        Gw:
        return substr($Rb, 0, 16);
    }
    function _sha256($cA)
    {
        if (!extension_loaded("\163\165\150\157\x73\151\x6e")) {
            goto RP;
        }
        return pack("\110\x2a", sha256($cA));
        RP:
        $Y9 = array(0x6a09e667, 0xbb67ae85, 0x3c6ef372, 0xa54ff53a, 0x510e527f, 0x9b05688c, 0x1f83d9ab, 0x5be0cd19);
        static $rY = array(0x428a2f98, 0x71374491, 0xb5c0fbcf, 0xe9b5dba5, 0x3956c25b, 0x59f111f1, 0x923f82a4, 0xab1c5ed5, 0xd807aa98, 0x12835b01, 0x243185be, 0x550c7dc3, 0x72be5d74, 0x80deb1fe, 0x9bdc06a7, 0xc19bf174, 0xe49b69c1, 0xefbe4786, 0xfc19dc6, 0x240ca1cc, 0x2de92c6f, 0x4a7484aa, 0x5cb0a9dc, 0x76f988da, 0x983e5152, 0xa831c66d, 0xb00327c8, 0xbf597fc7, 0xc6e00bf3, 0xd5a79147, 0x6ca6351, 0x14292967, 0x27b70a85, 0x2e1b2138, 0x4d2c6dfc, 0x53380d13, 0x650a7354, 0x766a0abb, 0x81c2c92e, 0x92722c85, 0xa2bfe8a1, 0xa81a664b, 0xc24b8b70, 0xc76c51a3, 0xd192e819, 0xd6990624, 0xf40e3585, 0x106aa070, 0x19a4c116, 0x1e376c08, 0x2748774c, 0x34b0bcb5, 0x391c0cb3, 0x4ed8aa4a, 0x5b9cca4f, 0x682e6ff3, 0x748f82ee, 0x78a5636f, 0x84c87814, 0x8cc70208, 0x90befffa, 0xa4506ceb, 0xbef9a3f7, 0xc67178f2);
        $iI = strlen($cA);
        $cA .= str_repeat(chr(0), 64 - ($iI + 8 & 0x3f));
        $cA[$iI] = chr(0x80);
        $cA .= pack("\x4e\x32", 0, $iI << 3);
        $jO = str_split($cA, 64);
        foreach ($jO as $in) {
            $hP = array();
            $uZ = 0;
            k6:
            if (!($uZ < 16)) {
                goto B0;
            }
            extract(unpack("\116\x74\145\155\x70", $this->_string_shift($in, 4)));
            $hP[] = $Ml;
            EA:
            $uZ++;
            goto k6;
            B0:
            $uZ = 16;
            Q8:
            if (!($uZ < 64)) {
                goto fO;
            }
            $jq = $this->_rightRotate($hP[$uZ - 15], 7) ^ $this->_rightRotate($hP[$uZ - 15], 18) ^ $this->_rightShift($hP[$uZ - 15], 3);
            $u7 = $this->_rightRotate($hP[$uZ - 2], 17) ^ $this->_rightRotate($hP[$uZ - 2], 19) ^ $this->_rightShift($hP[$uZ - 2], 10);
            $hP[$uZ] = $this->_add($hP[$uZ - 16], $jq, $hP[$uZ - 7], $u7);
            Si:
            $uZ++;
            goto Q8;
            fO:
            list($OZ, $Je, $GB, $pi, $fW, $Jj, $FZ, $Lz) = $Y9;
            $uZ = 0;
            zO:
            if (!($uZ < 64)) {
                goto gV;
            }
            $jq = $this->_rightRotate($OZ, 2) ^ $this->_rightRotate($OZ, 13) ^ $this->_rightRotate($OZ, 22);
            $mj = $OZ & $Je ^ $OZ & $GB ^ $Je & $GB;
            $oo = $this->_add($jq, $mj);
            $u7 = $this->_rightRotate($fW, 6) ^ $this->_rightRotate($fW, 11) ^ $this->_rightRotate($fW, 25);
            $SP = $fW & $Jj ^ $this->_not($fW) & $FZ;
            $bs = $this->_add($Lz, $u7, $SP, $rY[$uZ], $hP[$uZ]);
            $Lz = $FZ;
            $FZ = $Jj;
            $Jj = $fW;
            $fW = $this->_add($pi, $bs);
            $pi = $GB;
            $GB = $Je;
            $Je = $OZ;
            $OZ = $this->_add($bs, $oo);
            K0:
            $uZ++;
            goto zO;
            gV:
            $Y9 = array($this->_add($Y9[0], $OZ), $this->_add($Y9[1], $Je), $this->_add($Y9[2], $GB), $this->_add($Y9[3], $pi), $this->_add($Y9[4], $fW), $this->_add($Y9[5], $Jj), $this->_add($Y9[6], $FZ), $this->_add($Y9[7], $Lz));
            d1:
        }
        z4:
        return pack("\116\x38", $Y9[0], $Y9[1], $Y9[2], $Y9[3], $Y9[4], $Y9[5], $Y9[6], $Y9[7]);
    }
    function _sha512($cA)
    {
        if (class_exists("\115\x61\x74\150\137\x42\151\x67\111\156\x74\145\x67\145\x72")) {
            goto i6;
        }
        include_once "\x4d\141\164\x68\x2f\x42\x69\x67\x49\x6e\164\x65\x67\x65\x72\56\x70\x68\x70";
        i6:
        static $OG, $uO, $rY;
        if (isset($rY)) {
            goto xP;
        }
        $OG = array("\143\142\142\142\71\x64\x35\x64\x63\61\x30\65\71\145\x64\x38", "\x36\62\71\141\62\x39\62\141\x33\x36\67\143\x64\65\60\67", "\x39\x31\65\x39\60\x31\65\x61\63\60\67\60\144\144\x31\67", "\61\65\62\x66\x65\143\144\70\146\x37\x30\145\65\x39\63\71", "\66\x37\63\63\x32\x36\66\x37\x66\x66\x63\x30\60\x62\x33\61", "\x38\145\142\x34\64\x61\x38\67\66\x38\x35\70\61\65\x31\61", "\x64\x62\60\143\x32\145\x30\144\66\x34\146\x39\x38\146\141\67", "\64\x37\142\65\x34\x38\61\144\142\x65\146\141\x34\146\x61\x34");
        $uO = array("\66\141\60\71\x65\x36\x36\x37\146\x33\x62\143\x63\x39\x30\70", "\142\142\66\x37\141\x65\70\65\x38\x34\x63\141\141\67\x33\142", "\x33\143\x36\x65\146\63\67\x32\x66\x65\71\64\x66\70\x32\142", "\x61\x35\64\146\146\65\x33\141\65\x66\61\x64\x33\x36\146\61", "\x35\x31\60\145\x35\62\x37\146\x61\x64\x65\66\70\x32\144\x31", "\71\142\60\65\66\x38\x38\x63\62\x62\63\145\66\143\x31\146", "\x31\146\x38\x33\x64\x39\141\x62\x66\x62\64\x31\142\x64\x36\142", "\x35\142\145\60\x63\144\61\71\x31\63\67\145\62\61\67\x39");
        $uZ = 0;
        He:
        if (!($uZ < 8)) {
            goto GE;
        }
        $OG[$uZ] = new Math_BigInteger($OG[$uZ], 16);
        $OG[$uZ]->setPrecision(64);
        $uO[$uZ] = new Math_BigInteger($uO[$uZ], 16);
        $uO[$uZ]->setPrecision(64);
        GD:
        $uZ++;
        goto He;
        GE:
        $rY = array("\x34\x32\x38\x61\x32\146\71\x38\144\x37\x32\x38\x61\x65\62\x32", "\x37\61\63\x37\64\x34\x39\61\62\x33\145\146\66\65\143\x64", "\x62\x35\143\60\x66\142\x63\x66\x65\143\64\x64\63\x62\x32\146", "\145\71\x62\65\144\x62\141\x35\70\x31\70\71\x64\142\x62\x63", "\x33\71\65\66\x63\x32\x35\142\x66\x33\64\70\x62\65\x33\70", "\x35\x39\x66\x31\x31\x31\146\x31\142\x36\x30\x35\x64\x30\61\x39", "\71\x32\x33\146\x38\x32\141\x34\x61\x66\61\71\x34\146\71\142", "\141\142\61\x63\65\x65\x64\65\144\x61\66\x64\70\61\x31\70", "\x64\70\x30\x37\x61\141\x39\70\x61\63\x30\x33\x30\62\x34\62", "\61\x32\70\x33\x35\142\x30\x31\x34\x35\x37\60\66\146\x62\x65", "\x32\x34\63\61\x38\65\142\145\64\x65\145\64\x62\62\70\x63", "\65\x35\x30\143\x37\x64\143\x33\x64\x35\146\x66\142\x34\145\62", "\x37\62\142\145\x35\x64\67\x34\146\62\67\142\70\x39\66\146", "\70\60\x64\145\142\x31\146\x65\x33\142\x31\66\71\x36\142\61", "\x39\x62\144\143\x30\66\141\67\62\65\143\67\61\62\x33\x35", "\143\61\x39\x62\x66\61\67\x34\x63\146\x36\x39\x32\x36\x39\64", "\145\x34\x39\x62\x36\x39\143\x31\x39\145\146\61\64\141\x64\62", "\145\146\x62\x65\64\67\70\66\x33\x38\64\146\x32\65\145\x33", "\60\x66\x63\x31\x39\144\143\66\x38\x62\x38\143\x64\x35\x62\x35", "\62\x34\x30\143\141\x31\x63\x63\67\x37\x61\x63\71\x63\66\x35", "\x32\x64\x65\x39\62\143\66\x66\65\x39\62\142\60\62\67\65", "\64\141\67\64\x38\64\x61\x61\66\145\141\x36\145\x34\x38\x33", "\x35\143\142\x30\141\71\x64\x63\x62\x64\64\61\146\x62\x64\x34", "\x37\x36\146\71\70\70\x64\141\x38\63\x31\61\x35\63\x62\65", "\x39\70\x33\145\65\x31\x35\62\x65\x65\66\x36\x64\146\141\x62", "\141\70\63\x31\143\66\66\144\x32\x64\x62\64\63\x32\61\x30", "\142\60\x30\63\x32\x37\x63\70\71\70\x66\x62\62\61\x33\x66", "\142\x66\x35\71\x37\x66\143\67\x62\x65\x65\x66\x30\145\x65\x34", "\143\x36\x65\x30\x30\x62\146\x33\63\x64\141\x38\x38\146\x63\x32", "\144\x35\141\67\71\x31\x34\x37\71\x33\x30\x61\x61\67\62\x35", "\60\x36\143\x61\x36\63\65\61\145\x30\x30\63\70\62\66\x66", "\x31\x34\62\71\x32\71\x36\67\x30\x61\x30\x65\x36\x65\x37\60", "\62\67\142\x37\60\141\x38\65\64\x36\144\62\x32\146\146\143", "\x32\145\x31\x62\x32\x31\63\70\x35\143\x32\66\x63\71\x32\x36", "\x34\x64\x32\x63\66\144\146\x63\65\141\x63\64\62\x61\x65\x64", "\x35\63\x33\70\60\144\x31\x33\71\x64\71\65\x62\63\x64\146", "\x36\65\x30\141\x37\63\x35\x34\70\142\x61\x66\66\63\144\145", "\x37\x36\x36\141\x30\x61\142\x62\63\x63\x37\67\x62\x32\x61\70", "\x38\x31\x63\62\x63\x39\62\x65\64\x37\x65\x64\x61\x65\x65\66", "\71\x32\x37\x32\62\x63\x38\x35\61\x34\70\x32\63\65\63\x62", "\x61\62\x62\x66\145\x38\x61\x31\x34\143\146\x31\60\63\66\x34", "\x61\x38\61\141\x36\x36\x34\x62\142\143\x34\62\63\60\x30\x31", "\143\x32\x34\x62\x38\142\67\x30\x64\x30\146\70\x39\67\71\x31", "\143\67\66\143\65\61\x61\x33\60\66\x35\x34\x62\145\63\60", "\x64\61\71\62\x65\70\x31\71\144\x36\x65\146\x35\62\61\x38", "\144\66\x39\71\x30\x36\x32\x34\x35\x35\66\65\x61\71\x31\x30", "\146\x34\60\x65\x33\x35\70\x35\x35\x37\67\x31\x32\60\62\141", "\x31\60\66\x61\141\60\67\x30\63\x32\142\142\x64\61\142\x38", "\x31\x39\141\x34\x63\61\61\66\x62\70\144\x32\144\x30\143\70", "\x31\x65\63\67\66\x63\x30\x38\65\x31\x34\61\x61\x62\65\x33", "\x32\67\64\70\x37\x37\x34\143\x64\x66\70\x65\x65\142\x39\x39", "\x33\x34\x62\60\142\x63\x62\65\x65\61\x39\142\x34\70\141\70", "\63\71\61\143\x30\x63\142\x33\x63\65\x63\71\65\x61\x36\63", "\x34\x65\144\70\x61\141\x34\141\x65\63\64\61\70\141\x63\142", "\65\x62\71\x63\143\141\x34\146\67\x37\66\x33\x65\x33\x37\63", "\x36\70\x32\x65\66\x66\146\x33\x64\66\142\62\142\70\141\x33", "\x37\x34\70\146\x38\x32\x65\x65\x35\x64\145\x66\142\x32\x66\x63", "\67\x38\x61\65\x36\x33\66\146\x34\x33\x31\x37\62\x66\x36\60", "\x38\64\143\70\67\70\x31\x34\141\x31\146\x30\141\142\x37\62", "\70\143\x63\x37\x30\62\x30\x38\61\x61\x36\64\x33\71\x65\143", "\71\60\142\145\146\x66\x66\141\x32\63\x36\63\61\145\x32\70", "\x61\64\65\60\66\143\145\x62\144\145\70\62\142\144\145\71", "\142\x65\146\71\141\63\146\x37\142\62\x63\x36\x37\71\x31\x35", "\x63\x36\67\x31\67\x38\x66\x32\x65\63\x37\62\x35\63\x32\142", "\x63\x61\62\67\63\x65\x63\x65\x65\x61\x32\66\66\x31\71\143", "\x64\61\70\66\x62\x38\x63\x37\62\61\143\x30\x63\62\60\x37", "\x65\x61\144\141\67\x64\x64\x36\x63\144\145\60\145\x62\x31\145", "\x66\x35\x37\x64\x34\x66\x37\x66\x65\x65\66\145\x64\61\x37\70", "\60\x36\146\60\66\67\x61\x61\x37\62\x31\67\66\146\x62\x61", "\60\x61\66\x33\67\144\143\65\141\x32\143\70\x39\70\x61\66", "\61\61\63\146\x39\x38\60\64\x62\x65\146\x39\x30\144\x61\x65", "\61\x62\67\x31\x30\x62\x33\65\61\x33\61\143\64\x37\x31\x62", "\62\x38\144\x62\67\67\146\65\x32\63\x30\x34\67\x64\70\64", "\x33\62\x63\x61\x61\142\67\x62\64\x30\143\67\62\x34\71\63", "\x33\143\x39\145\142\x65\x30\x61\61\65\x63\x39\x62\x65\142\x63", "\64\x33\61\144\x36\67\143\x34\71\143\61\x30\x30\x64\x34\x63", "\64\x63\x63\65\x64\x34\142\x65\143\142\x33\x65\x34\x32\142\x36", "\x35\x39\67\x66\x32\71\x39\143\x66\143\x36\65\67\145\x32\141", "\x35\x66\143\x62\x36\146\x61\x62\x33\141\144\x36\x66\x61\x65\143", "\66\143\64\64\61\x39\x38\143\64\x61\x34\x37\x35\70\x31\x37");
        $uZ = 0;
        Na:
        if (!($uZ < 80)) {
            goto mw;
        }
        $rY[$uZ] = new Math_BigInteger($rY[$uZ], 16);
        JM:
        $uZ++;
        goto Na;
        mw:
        xP:
        $Y9 = $this->l == 48 ? $OG : $uO;
        $iI = strlen($cA);
        $cA .= str_repeat(chr(0), 128 - ($iI + 16 & 0x7f));
        $cA[$iI] = chr(0x80);
        $cA .= pack("\116\64", 0, 0, 0, $iI << 3);
        $jO = str_split($cA, 128);
        foreach ($jO as $in) {
            $hP = array();
            $uZ = 0;
            NH:
            if (!($uZ < 16)) {
                goto c6;
            }
            $Ml = new Math_BigInteger($this->_string_shift($in, 8), 256);
            $Ml->setPrecision(64);
            $hP[] = $Ml;
            xY:
            $uZ++;
            goto NH;
            c6:
            $uZ = 16;
            lG:
            if (!($uZ < 80)) {
                goto xk;
            }
            $Ml = array($hP[$uZ - 15]->bitwise_rightRotate(1), $hP[$uZ - 15]->bitwise_rightRotate(8), $hP[$uZ - 15]->bitwise_rightShift(7));
            $jq = $Ml[0]->bitwise_xor($Ml[1]);
            $jq = $jq->bitwise_xor($Ml[2]);
            $Ml = array($hP[$uZ - 2]->bitwise_rightRotate(19), $hP[$uZ - 2]->bitwise_rightRotate(61), $hP[$uZ - 2]->bitwise_rightShift(6));
            $u7 = $Ml[0]->bitwise_xor($Ml[1]);
            $u7 = $u7->bitwise_xor($Ml[2]);
            $hP[$uZ] = $hP[$uZ - 16]->copy();
            $hP[$uZ] = $hP[$uZ]->add($jq);
            $hP[$uZ] = $hP[$uZ]->add($hP[$uZ - 7]);
            $hP[$uZ] = $hP[$uZ]->add($u7);
            On:
            $uZ++;
            goto lG;
            xk:
            $OZ = $Y9[0]->copy();
            $Je = $Y9[1]->copy();
            $GB = $Y9[2]->copy();
            $pi = $Y9[3]->copy();
            $fW = $Y9[4]->copy();
            $Jj = $Y9[5]->copy();
            $FZ = $Y9[6]->copy();
            $Lz = $Y9[7]->copy();
            $uZ = 0;
            X8:
            if (!($uZ < 80)) {
                goto Rm;
            }
            $Ml = array($OZ->bitwise_rightRotate(28), $OZ->bitwise_rightRotate(34), $OZ->bitwise_rightRotate(39));
            $jq = $Ml[0]->bitwise_xor($Ml[1]);
            $jq = $jq->bitwise_xor($Ml[2]);
            $Ml = array($OZ->bitwise_and($Je), $OZ->bitwise_and($GB), $Je->bitwise_and($GB));
            $mj = $Ml[0]->bitwise_xor($Ml[1]);
            $mj = $mj->bitwise_xor($Ml[2]);
            $oo = $jq->add($mj);
            $Ml = array($fW->bitwise_rightRotate(14), $fW->bitwise_rightRotate(18), $fW->bitwise_rightRotate(41));
            $u7 = $Ml[0]->bitwise_xor($Ml[1]);
            $u7 = $u7->bitwise_xor($Ml[2]);
            $Ml = array($fW->bitwise_and($Jj), $FZ->bitwise_and($fW->bitwise_not()));
            $SP = $Ml[0]->bitwise_xor($Ml[1]);
            $bs = $Lz->add($u7);
            $bs = $bs->add($SP);
            $bs = $bs->add($rY[$uZ]);
            $bs = $bs->add($hP[$uZ]);
            $Lz = $FZ->copy();
            $FZ = $Jj->copy();
            $Jj = $fW->copy();
            $fW = $pi->add($bs);
            $pi = $GB->copy();
            $GB = $Je->copy();
            $Je = $OZ->copy();
            $OZ = $bs->add($oo);
            pj:
            $uZ++;
            goto X8;
            Rm:
            $Y9 = array($Y9[0]->add($OZ), $Y9[1]->add($Je), $Y9[2]->add($GB), $Y9[3]->add($pi), $Y9[4]->add($fW), $Y9[5]->add($Jj), $Y9[6]->add($FZ), $Y9[7]->add($Lz));
            Jn:
        }
        Xj:
        $Ml = $Y9[0]->toBytes() . $Y9[1]->toBytes() . $Y9[2]->toBytes() . $Y9[3]->toBytes() . $Y9[4]->toBytes() . $Y9[5]->toBytes();
        if (!($this->l != 48)) {
            goto ub;
        }
        $Ml .= $Y9[6]->toBytes() . $Y9[7]->toBytes();
        ub:
        return $Ml;
    }
    function _rightRotate($Pf, $pL)
    {
        $Dy = 32 - $pL;
        $Qq = (1 << $Dy) - 1;
        return $Pf << $Dy & 0xffffffff | $Pf >> $pL & $Qq;
    }
    function _rightShift($Pf, $pL)
    {
        $Qq = (1 << 32 - $pL) - 1;
        return $Pf >> $pL & $Qq;
    }
    function _not($Pf)
    {
        return ~$Pf & 0xffffffff;
    }
    function _add()
    {
        static $xj;
        if (isset($xj)) {
            goto X6;
        }
        $xj = pow(2, 32);
        X6:
        $al = 0;
        $Mp = func_get_args();
        foreach ($Mp as $Vr) {
            $al += $Vr < 0 ? ($Vr & 0x7fffffff) + 0x80000000 : $Vr;
            r2:
        }
        Sa:
        switch (true) {
            case is_int($al):
            case version_compare(PHP_VERSION, "\65\56\x33\x2e\60") >= 0 && (php_uname("\x6d") & "\337\xdf\xdf") != "\x41\122\115":
            case (PHP_OS & "\xdf\xdf\337") === "\x57\x49\x4e":
                return fmod($al, $xj);
        }
        pP:
        s6:
        return fmod($al, 0x80000000) & 0x7fffffff | (fmod(floor($al / 0x80000000), 2) & 1) << 31;
    }
    function _string_shift(&$Ux, $OE = 1)
    {
        $PA = substr($Ux, 0, $OE);
        $Ux = substr($Ux, $OE);
        return $PA;
    }
}
