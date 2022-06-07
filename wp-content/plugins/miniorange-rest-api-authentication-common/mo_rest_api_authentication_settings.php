<?php
/**
 * Plugin Name: WordPress REST API Authentication
 * Plugin URI: http://miniorange.com
 * Description: WordPress REST API Authentication secures rest API access for unauthorized users using OAuth 2.0, Basic Auth, JWT, API Key. Also reduces potential attack factors to the respective site.
 * Version: 12.1.0
 * Author: miniOrange
 * Author URI: https://www.miniorange.com
 * License: MIT/Expat
 */


if (defined("\x57\120\111\x4e\x43")) {
    goto vp;
}
die;
vp:
require "\x5f\x61\x75\x74\157\x6c\x6f\x61\144\x2e\160\x68\x70";
require_once "\x6d\x6f\55\x72\145\x73\x74\55\141\x70\x69\x2d\x70\154\165\147\151\x6e\x2d\x76\x65\162\163\151\157\156\55\x75\x70\144\x61\164\145\56\x70\150\x70";
use MoRestAPI\Base\BaseStructure;
use MoRestAPI\Base\InstanceHelper;
use MoRESTAPI\RESTAPIHandler;
global $bC;
$fa = new InstanceHelper();
$bC = $fa->get_utils_instance();
$q9 = new BaseStructure();
$OI = new RESTAPIHandler();
$By = $fa->get_all_method_instances();
mo_rest_load_all_methods($By);
function mo_rest_api_authentication_deactivate()
{
    global $bC;
    do_action("\x6d\157\x5f\x63\x6c\x65\141\162\x5f\160\x6c\x75\x67\x5f\x63\141\143\150\x65");
    $bC->deactivate_plugin();
}
register_deactivation_hook(__FILE__, "\x6d\x6f\x5f\162\145\x73\164\x5f\141\x70\x69\137\x61\165\x74\x68\145\x6e\x74\151\143\x61\x74\151\157\x6e\x5f\x64\x65\141\143\x74\x69\x76\141\x74\x65");
