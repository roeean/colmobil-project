<?php


if (defined("\x41\x42\123\x50\x41\124\110")) {
    goto rm;
}
exit;
rm:
define("\115\122\101\x5f\x44\111\x52", plugin_dir_path(__FILE__));
define("\x4d\x52\x41\x5f\x55\122\114", plugin_dir_url(__FILE__));
define("\x4d\122\x41\137\x55\x49\104", "\x44\x46\x38\x56\113\x4a\117\x35\x46\x44\110\132\x41\x52\x42\122\x35\132\104\x53\x32\126\65\112\x36\66\x55\x32\116\x44\x52");
define("\115\x52\x41\137\x56\x45\122\x53\111\x4f\116", "\x6d\x6f\x5f\162\x65\x73\x74\137\x61\160\151\137\x6b\145\171\x5f\x61\165\164\x68");
mo_rest_include_file(MRA_DIR . "\57\x63\x6c\x61\163\163\145\163\57\x63\x6f\x6d\x6d\157\156");
mo_rest_include_file(MRA_DIR . "\x2f\143\x6c\x61\x73\163\x65\x73\57\101\160\151\113\x65\171\x41\165\164\x68");
function mo_rest_get_dir_contents($mi, &$c3 = array())
{
    foreach (new RecursiveIteratorIterator(new RecursiveDirectoryIterator($mi, RecursiveDirectoryIterator::KEY_AS_PATHNAME), RecursiveIteratorIterator::CHILD_FIRST) as $Sa => $a1) {
        if (!($a1->isFile() && $a1->isReadable())) {
            goto nZ;
        }
        $c3[$Sa] = realpath($a1->getPathname());
        nZ:
        yA:
    }
    Qv:
    return $c3;
}
function mo_rest_get_sorted_files($mi)
{
    $ws = mo_rest_get_dir_contents($mi);
    $my = array();
    $AE = array();
    foreach ($ws as $Sa => $qI) {
        if (!(strpos($qI, "\56\x70\x68\x70") !== false)) {
            goto A2;
        }
        if (strpos($qI, "\x49\x6e\164\x65\x72\x66\141\143\145") !== false) {
            goto rF;
        }
        $AE[$Sa] = $qI;
        goto ly;
        rF:
        $my[$Sa] = $qI;
        ly:
        A2:
        mo:
    }
    N6:
    return array("\x69\156\164\x65\162\146\141\x63\145\x73" => $my, "\143\154\x61\163\x73\145\163" => $AE);
}
function mo_rest_include_file($mi)
{
    if (is_dir($mi)) {
        goto jX;
    }
    return;
    jX:
    $mi = mo_rest_sane_dir_path($mi);
    $Zg = realpath($mi);
    if (!(false !== $Zg && !is_dir($mi))) {
        goto BW;
    }
    return;
    BW:
    $cS = mo_rest_get_sorted_files($mi);
    mo_rest_require_all($cS["\151\156\164\145\x72\x66\x61\143\145\x73"]);
    mo_rest_require_all($cS["\143\x6c\x61\163\x73\x65\163"]);
}
function mo_rest_require_all($ws)
{
    foreach ($ws as $Sa => $qI) {
        require_once $qI;
        Xy:
    }
    HN:
}
function mo_rest_is_valid_file($ZO)
{
    return '' !== $ZO && "\x2e" !== $ZO && "\x2e\56" !== $ZO;
}
function mo_rest_get_valid_html($WC = array())
{
    $h_ = array("\x73\164\x72\x6f\x6e\x67" => array(), "\x65\x6d" => array(), "\142" => array(), "\x69" => array(), "\x61" => array("\150\x72\x65\x66" => array(), "\x74\141\x72\x67\145\x74" => array()));
    if (empty($WC)) {
        goto i_;
    }
    return array_merge($WC, $h_);
    i_:
    return $h_;
}
function mo_rest_get_version_number()
{
    $cp = get_file_data(MRA_DIR . "\x2f\155\157\137\162\145\x73\164\x5f\x61\160\x69\x5f\141\x75\164\x68\145\x6e\x74\x69\143\141\x74\x69\157\x6e\x5f\163\x65\x74\164\x69\x6e\x67\x73\x2e\160\150\160", ["\x56\x65\162\x73\x69\157\156"], "\160\x6c\x75\x67\151\156");
    $Qh = isset($cp[0]) ? $cp[0] : '';
    return $Qh;
}
function mo_rest_sane_dir_path($mi)
{
    return str_replace("\57", DIRECTORY_SEPARATOR, $mi);
}
function mo_rest_load_all_methods($VO)
{
    foreach ($VO as $Cj) {
        new $Cj();
        NA:
    }
    ZU:
}
