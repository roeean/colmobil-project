<?php


namespace MoRESTAPI\ApiKeyAuth;

use MoRESTAPI\ConfigurationSettings as CommonConfigurationSettings;
use MoRestAPI\MethodViewHandler\ApiKeyView;
class ConfigurationSettings extends CommonConfigurationSettings
{
    public function change_current_config($post, $fx)
    {
        parent::change_current_config($post, $fx);
        $CI = new ApiKeyView();
        global $bC;
        if (!(isset($post["\x6d\157\137\x61\160\151\137\141\165\164\150\145\156\x74\x69\143\141\164\x69\157\x6e\x5f\x73\x65\154\145\x63\x74\x65\x64\x5f\x61\165\164\x68\145\x6e\x74\151\x63\141\x74\x69\157\156\x5f\x6d\145\164\150\x6f\144"]) && stripslashes(wp_unslash($post["\155\157\137\141\160\x69\x5f\x61\165\164\150\x65\156\x74\x69\x63\141\x74\x69\157\156\x5f\163\145\x6c\x65\143\x74\x65\144\x5f\x61\x75\164\x68\x65\156\x74\151\143\141\164\151\157\156\137\x6d\x65\x74\x68\x6f\144"])) === $CI->get_method_slug() && !$this->check_if_api_key_exists($fx->get_current_config(), $CI->get_method_slug()))) {
            goto cp;
        }
        $qQ = $bC->gen_rand_str(40);
        $rD = array();
        $vl = $bC->mo_rest_api_authentication_get_option("\155\157\x5f\x61\160\151\x5f\x61\165\164\x68\x65\x6e\164\151\x63\141\164\x69\157\156\137\x6d\x65\164\x68\157\144\137\145\170\164\x72\141\x73") ? $bC->mo_rest_api_authentication_get_option("\155\x6f\x5f\141\x70\151\x5f\x61\x75\164\x68\145\156\x74\x69\143\141\x74\151\157\x6e\137\155\145\x74\150\x6f\144\137\x65\x78\164\162\141\163") : array();
        $rD["\141\x70\x69\137\x6b\x65\x79"] = $qQ;
        $vl[$CI->get_method_slug()] = $rD;
        $bC->mo_rest_api_authentication_update_option("\155\x6f\x5f\x61\160\x69\137\x61\165\164\150\x65\156\x74\x69\143\141\164\151\157\156\137\x6d\x65\x74\x68\x6f\x64\x5f\145\170\164\x72\x61\x73", $vl);
        cp:
    }
    private function check_if_api_key_exists($fx = false, $Yh = '')
    {
        return isset($fx["\x6d\x65\164\x68\x6f\x64\x5f\x65\170\x74\162\141\163"][$Yh]["\141\160\151\x5f\x6b\145\171"]);
    }
}
