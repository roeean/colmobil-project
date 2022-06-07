<?php


namespace MoRestAPI;

use MoRestAPI\Config\ConfigInterface;
class Config implements ConfigInterface
{
    private $config;
    public function __construct($fx = array())
    {
        global $bC;
        $this->config = array_merge(array("\163\145\x6c\145\x63\164\x65\x64\137\x61\x75\164\x68\145\x6e\164\151\x63\141\164\x69\x6f\x6e\137\x6d\145\x74\x68\x6f\144" => $bC->mo_rest_api_authentication_get_option("\155\157\137\141\x70\x69\137\x61\165\x74\150\x65\156\164\x69\x63\141\x74\151\x6f\x6e\x5f\163\x65\154\x65\x63\x74\145\144\x5f\x61\x75\164\x68\x65\x6e\x74\x69\x63\141\164\x69\x6f\x6e\137\155\145\164\x68\157\144"), "\155\x65\x74\150\x6f\144\137\145\x78\164\162\x61\x73" => $bC->mo_rest_api_authentication_get_option("\155\x6f\x5f\x61\x70\x69\137\x61\165\x74\150\x65\156\164\x69\x63\x61\164\x69\x6f\156\137\155\145\x74\x68\x6f\144\137\145\170\164\x72\141\163")), $fx);
        $this->save_settings($fx);
    }
    public function save_settings($fx = array())
    {
        if (!(count($fx) === 0)) {
            goto ef;
        }
        return;
        ef:
        global $bC;
        foreach ($fx as $Ox => $pj) {
            $bC->mo_rest_api_authentication_update_option("\x6d\x6f\x5f\141\160\x69\x5f\x61\x75\x74\x68\145\x6e\164\151\143\141\164\x69\157\x6e\x5f" . $Ox, $pj);
            l8:
        }
        nv:
        $this->config = $bC->array_overwrite($this->config, $fx, true);
    }
    public function add_config($O8, $pj)
    {
        $this->config[$O8] = $pj;
    }
    public function get_current_config()
    {
        return $this->config;
    }
}
