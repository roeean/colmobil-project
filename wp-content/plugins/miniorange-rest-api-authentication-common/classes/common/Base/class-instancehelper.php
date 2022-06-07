<?php


namespace MoRestAPI\Base;

class InstanceHelper
{
    private $current_version = "\106\122\105\105";
    private $utils;
    public function __construct()
    {
        $this->utils = new \MoRestAPI\MRAUtils();
        $this->current_version = $this->utils->get_versi_str();
    }
    public function get_configured_method_instance()
    {
        global $bC;
        $Gs = $bC->mo_rest_api_authentication_get_option("\155\157\x5f\141\x70\151\137\141\x75\x74\150\145\x6e\164\x69\x63\141\x74\x69\x6f\156\x5f\x73\x65\x6c\145\143\164\x65\144\x5f\141\165\164\150\145\x6e\x74\151\143\141\x74\x69\x6f\156\x5f\x6d\x65\164\150\157\144");
        $sL = $this->get_all_method_instances();
        foreach ($sL as $W_) {
            $uZ = new $W_();
            if (!($Gs === $uZ->get_method_slug())) {
                goto JZ;
            }
            return new $W_();
            JZ:
            xz:
        }
        Fm:
    }
    public function get_accounts_instance()
    {
        return new \MoRESTAPI\Accounts();
    }
    public function get_all_method_instances()
    {
        if (!class_exists("\x4d\x6f\122\145\x73\164\x41\x50\x49\x5c\x4d\x65\x74\x68\157\x64\163")) {
            goto yo;
        }
        $Rd = get_declared_classes();
        $t7 = array_filter($Rd, function ($dd) {
            return stripos($dd, "\115\x6f\122\145\163\x74\x41\x50\111\x5c\x4d\145\164\x68\157\x64\163") !== false;
        });
        unset($t7[array_search("\115\x6f\x52\x65\163\164\101\x50\111\134\x4d\x65\164\150\x6f\x64\163", $t7)]);
        return $t7;
        yo:
    }
    public function get_registered_method_views()
    {
        if (!class_exists("\x4d\x6f\122\x65\163\x74\101\120\x49\x5c\115\x65\164\x68\x6f\144\126\x69\145\x77\x48\141\156\x64\x6c\145\162")) {
            goto Aa;
        }
        $Rd = get_declared_classes();
        $u4 = array_filter($Rd, function ($dd) {
            return stripos($dd, "\115\x6f\x52\145\x73\164\x41\x50\x49\x5c\115\145\164\150\157\144\126\151\x65\x77\110\x61\156\x64\154\145\162") !== false;
        });
        unset($u4[array_search("\115\x6f\x52\x65\x73\x74\101\x50\111\x5c\x4d\x65\x74\x68\157\144\126\151\x65\x77\x48\x61\x6e\144\154\145\162", $u4)]);
        return $u4;
        Aa:
    }
    public function get_config_instance()
    {
        if (!class_exists("\x4d\157\x52\x65\163\x74\x41\x50\111\134\115\x65\164\x68\x6f\x64\x56\x69\x65\167\x48\141\x6e\144\154\x65\162")) {
            goto Z_;
        }
        return new \MoRestAPI\MethodViewHandler();
        Z_:
    }
    public function get_protected_rest_apis_instance()
    {
        if (!class_exists("\115\x6f\x52\x65\163\x74\x41\x50\111\134\120\162\157\164\145\x63\164\x65\144\122\x45\x53\x54\101\x50\x49\163")) {
            goto Nz;
        }
        return new \MoRestAPI\ProtectedRESTAPIs();
        Nz:
    }
    public function get_multisite_settings_instance()
    {
        if (!class_exists("\115\157\122\145\163\164\x41\120\111\x5c\115\x75\x6c\164\x69\x73\x69\x74\145\123\145\x74\x74\x69\x6e\x67\x73")) {
            goto ZB;
        }
        return new \MoRestAPI\MultisiteSettings();
        ZB:
    }
    public function get_advance_settings_instance()
    {
        if (!class_exists("\115\157\x52\145\x73\x74\101\120\x49\134\101\144\166\141\156\x63\x65\123\145\x74\164\151\x6e\x67\163")) {
            goto oX;
        }
        return new \MoRestAPI\AdvanceSettings();
        oX:
    }
    public function get_utils_instance()
    {
        return $this->utils;
    }
}
