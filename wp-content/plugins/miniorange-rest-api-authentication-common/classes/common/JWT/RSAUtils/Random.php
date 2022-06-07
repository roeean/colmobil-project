<?php


namespace MoRESTAPI;

if (!function_exists("\143\x72\x79\x70\x74\x5f\x72\141\156\x64\157\155\137\x73\164\x72\151\x6e\147")) {
    if (defined("\103\122\131\120\x54\x5f\x52\x41\x4e\104\117\115\137\x49\x53\137\127\x49\116\x44\117\x57\x53")) {
        goto mt;
    }
    define("\103\122\131\x50\x54\x5f\x52\x41\x4e\x44\117\115\137\x49\123\137\x57\111\116\x44\117\x57\123", strtoupper(substr(PHP_OS, 0, 3)) === "\127\111\x4e");
    mt:
    function crypt_random_string($iI)
    {
        if ($iI) {
            goto M3;
        }
        return '';
        M3:
        if (CRYPT_RANDOM_IS_WINDOWS) {
            goto vW;
        }
        if (!(extension_loaded("\157\160\145\x6e\163\163\x6c") && version_compare(PHP_VERSION, "\x35\x2e\63\x2e\60", "\76\x3d"))) {
            goto vT;
        }
        return openssl_random_pseudo_bytes($iI);
        vT:
        static $IU = true;
        if (!($IU === true)) {
            goto bz;
        }
        $IU = @fopen("\x2f\144\x65\x76\57\165\162\141\x6e\144\157\x6d", "\162\142");
        bz:
        if (!($IU !== true && $IU !== false)) {
            goto bh;
        }
        return fread($IU, $iI);
        bh:
        if (!extension_loaded("\155\x63\x72\171\160\x74")) {
            goto La;
        }
        return @mcrypt_create_iv($iI, MCRYPT_DEV_URANDOM);
        La:
        goto ro;
        vW:
        if (!(extension_loaded("\x6d\x63\x72\x79\x70\x74") && version_compare(PHP_VERSION, "\65\56\63\x2e\60", "\76\x3d"))) {
            goto dz;
        }
        return @mcrypt_create_iv($iI);
        dz:
        if (!(extension_loaded("\157\x70\x65\156\x73\x73\154") && version_compare(PHP_VERSION, "\65\x2e\x33\x2e\x34", "\76\x3d"))) {
            goto vP;
        }
        return openssl_random_pseudo_bytes($iI);
        vP:
        ro:
        static $aG = false, $sM;
        if (!($aG === false)) {
            goto U3;
        }
        $A8 = session_id();
        $Sp = ini_get("\163\x65\x73\x73\x69\x6f\x6e\x2e\165\163\145\137\x63\x6f\x6f\153\x69\145\x73");
        $K_ = session_cache_limiter();
        $qw = isset($_SESSION) ? $_SESSION : false;
        if (!($A8 != '')) {
            goto bg;
        }
        session_write_close();
        bg:
        session_id(1);
        ini_set("\x73\x65\x73\163\151\157\x6e\x2e\165\163\145\x5f\x63\x6f\x6f\x6b\151\x65\x73", 0);
        session_cache_limiter('');
        session_start(["\x72\145\141\x64\x5f\141\156\x64\137\x63\154\x6f\163\145" => true]);
        $sM = $Y6 = $_SESSION["\163\145\145\x64"] = pack("\x48\52", sha1((isset($_SERVER) ? phpseclib_safe_serialize($_SERVER) : '') . (isset($_POST) ? phpseclib_safe_serialize($_POST) : '') . (isset($_GET) ? phpseclib_safe_serialize($_GET) : '') . (isset($_COOKIE) ? phpseclib_safe_serialize($_COOKIE) : '') . phpseclib_safe_serialize($GLOBALS) . phpseclib_safe_serialize($_SESSION) . phpseclib_safe_serialize($qw)));
        if (isset($_SESSION["\x63\157\165\x6e\x74"])) {
            goto i1;
        }
        $_SESSION["\143\157\x75\x6e\164"] = 0;
        i1:
        $_SESSION["\x63\157\165\x6e\164"]++;
        session_write_close();
        if ($A8 != '') {
            goto Je;
        }
        if ($qw !== false) {
            goto Oa;
        }
        unset($_SESSION);
        goto A1;
        Oa:
        $_SESSION = $qw;
        unset($qw);
        A1:
        goto uD;
        Je:
        session_id($A8);
        session_start(["\x72\145\141\x64\137\141\156\x64\137\143\x6c\x6f\x73\x65" => true]);
        ini_set("\163\x65\163\163\151\x6f\156\x2e\165\163\x65\x5f\x63\x6f\157\x6b\151\145\163", $Sp);
        session_cache_limiter($K_);
        uD:
        $O8 = pack("\x48\x2a", sha1($Y6 . "\x41"));
        $Bc = pack("\110\52", sha1($Y6 . "\103"));
        switch (true) {
            case phpseclib_resolve_include_path("\x43\x72\x79\160\164\x2f\101\105\x53\x2e\x70\x68\x70"):
                if (class_exists("\x43\x72\x79\160\x74\137\101\105\x53")) {
                    goto v4;
                }
                include_once "\x41\x45\x53\x2e\160\150\160";
                v4:
                $aG = new Crypt_AES(CRYPT_AES_MODE_CTR);
                goto Zz;
            case phpseclib_resolve_include_path("\103\x72\x79\160\x74\57\x54\x77\x6f\146\151\163\x68\x2e\x70\x68\x70"):
                if (class_exists("\x43\x72\x79\x70\164\x5f\124\x77\x6f\146\151\x73\150")) {
                    goto os;
                }
                include_once "\x54\167\x6f\x66\151\163\150\x2e\x70\x68\160";
                os:
                $aG = new Crypt_Twofish(CRYPT_TWOFISH_MODE_CTR);
                goto Zz;
            case phpseclib_resolve_include_path("\x43\162\171\160\x74\57\x42\x6c\x6f\167\146\151\163\x68\56\x70\x68\160"):
                if (class_exists("\103\x72\x79\160\x74\137\x42\x6c\x6f\167\146\151\x73\150")) {
                    goto aJ;
                }
                include_once "\x42\154\157\167\146\151\x73\x68\56\160\150\x70";
                aJ:
                $aG = new Crypt_Blowfish(CRYPT_BLOWFISH_MODE_CTR);
                goto Zz;
            case phpseclib_resolve_include_path("\103\162\x79\x70\164\x2f\124\x72\151\160\154\145\x44\105\x53\x2e\160\x68\x70"):
                if (class_exists("\x43\x72\x79\160\x74\137\x54\162\x69\160\154\145\104\x45\123")) {
                    goto Rv;
                }
                include_once "\124\x72\x69\160\x6c\145\x44\105\x53\56\160\150\160";
                Rv:
                $aG = new Crypt_TripleDES(CRYPT_DES_MODE_CTR);
                goto Zz;
            case phpseclib_resolve_include_path("\x43\x72\x79\160\x74\57\104\105\123\x2e\x70\150\160"):
                if (class_exists("\x43\x72\171\160\x74\137\x44\x45\123")) {
                    goto rr;
                }
                include_once "\104\105\123\56\x70\150\x70";
                rr:
                $aG = new Crypt_DES(CRYPT_DES_MODE_CTR);
                goto Zz;
            case phpseclib_resolve_include_path("\x43\x72\171\160\164\57\122\x43\x34\56\160\x68\x70"):
                if (class_exists("\x43\x72\171\160\x74\x5f\122\x43\64")) {
                    goto wx;
                }
                include_once "\x52\103\x34\x2e\160\x68\160";
                wx:
                $aG = new Crypt_RC4();
                goto Zz;
            default:
                user_error("\143\x72\171\x70\164\x5f\162\x61\x6e\x64\x6f\155\x5f\x73\x74\162\x69\156\x67\x20\162\x65\161\165\x69\x72\x65\x73\40\141\x74\x20\154\145\141\163\164\x20\157\156\x65\40\163\171\x6d\x6d\x65\x74\x72\x69\x63\x20\143\151\x70\x68\x65\x72\x20\x62\x65\x20\x6c\x6f\x61\x64\x65\x64");
                return false;
        }
        jr:
        Zz:
        $aG->setKey($O8);
        $aG->setIV($Bc);
        $aG->enableContinuousBuffer();
        U3:
        $al = '';
        V9:
        if (!(strlen($al) < $iI)) {
            goto DA;
        }
        $uZ = $aG->encrypt(microtime());
        $g5 = $aG->encrypt($uZ ^ $sM);
        $sM = $aG->encrypt($g5 ^ $uZ);
        $al .= $g5;
        goto V9;
        DA:
        return substr($al, 0, $iI);
    }
}
if (!function_exists("\x70\x68\x70\163\x65\143\154\151\142\x5f\163\141\146\145\137\163\145\162\x69\x61\154\151\172\x65")) {
    function phpseclib_safe_serialize(&$lg)
    {
        if (!is_object($lg)) {
            goto zV;
        }
        return '';
        zV:
        if (is_array($lg)) {
            goto JB;
        }
        return serialize($lg);
        JB:
        if (!isset($lg["\x5f\x5f\160\150\160\163\x65\x63\154\x69\142\x5f\155\x61\x72\x6b\x65\x72"])) {
            goto nt;
        }
        return '';
        nt:
        $fn = array();
        $lg["\137\x5f\160\x68\x70\x73\x65\x63\154\151\x62\x5f\155\x61\x72\x6b\145\x72"] = true;
        foreach (array_keys($lg) as $O8) {
            if (!($O8 !== "\x5f\137\160\150\x70\x73\x65\x63\x6c\x69\x62\x5f\155\141\162\153\x65\x72")) {
                goto z5;
            }
            $fn[$O8] = phpseclib_safe_serialize($lg[$O8]);
            z5:
            le:
        }
        UR:
        unset($lg["\x5f\x5f\x70\x68\160\x73\145\x63\154\x69\x62\137\155\141\162\153\145\x72"]);
        return serialize($fn);
    }
}
if (!function_exists("\160\150\160\x73\x65\x63\154\x69\x62\x5f\162\145\x73\157\x6c\x76\x65\137\x69\x6e\x63\154\165\x64\145\x5f\x70\141\x74\x68")) {
    function phpseclib_resolve_include_path($ZO)
    {
        if (!function_exists("\x73\164\162\145\x61\155\x5f\162\x65\163\x6f\154\x76\145\137\x69\156\x63\154\x75\144\145\137\x70\x61\164\150")) {
            goto TF;
        }
        return stream_resolve_include_path($ZO);
        TF:
        if (!file_exists($ZO)) {
            goto SF;
        }
        return realpath($ZO);
        SF:
        $FN = PATH_SEPARATOR == "\72" ? preg_split("\43\x28\x3f\x3c\41\160\150\141\162\51\72\43", get_include_path()) : explode(PATH_SEPARATOR, get_include_path());
        foreach ($FN as $ss) {
            $Kt = substr($ss, -1) == DIRECTORY_SEPARATOR ? '' : DIRECTORY_SEPARATOR;
            $Sa = $ss . $Kt . $ZO;
            if (!file_exists($Sa)) {
                goto U0;
            }
            return realpath($Sa);
            U0:
            x7:
        }
        kp:
        return false;
    }
}
