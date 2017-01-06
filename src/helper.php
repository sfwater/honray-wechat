<?php
use think\wechat\WechatAuth;
use think\wechat\Jssdk;

/**
 * [get_wechat_url 获取微信授权跳转url]
 * @linchuangbin
 * @DateTime  2017-01-05T17:22:06+0800
 * @param     [string]       $appid     [微信配置]
 * @param     [string]       $appsecret [微信配置]
 * @param     [string]       $url       [回调url]
 * @param     [string]       $type      [授权方式]
 * @return    [string]                  [跳转url]
 */
function get_wechat_url($appId, $appSecret, $url, $type = 'snsapi_userinfo')
{
    $auth = new WechatAuth($appId, $appSecret);
    $url = $auth->getRequestCodeURL($url, 'snsapi_base', $type);
    return $url;
}

/**
 * [get_wechat_token 通过code换取网页授权access_token]
 * @linchuangbin
 * @DateTime  2017-01-05T17:22:06+0800
 * @param     [string]       $appid     [微信配置]
 * @param     [string]       $appsecret [微信配置]
 * @param     [string]       $code      [通过授权获取的code参数]
 * @return    [array]                   [token，openid等信息]
 */
function get_wechat_token($appId, $appSecret, $code)
{
    $auth = new WechatAuth($appId, $appSecret);
    $ret = $auth->getAccessToken('code', $code);
    return $ret;
}


/**
 * [get_wechat_userInfo 获取微信授权用户基本信息]
 * @linchuangbin
 * @DateTime  2017-01-05T17:28:11+0800
 * @param     [string]                   $appid     [微信配置]
 * @param     [string]                   $appsecret [微信配置]
 * @param     [string]                   $token     [token]
 * @param     [string]                   $openid    [用户openid]
 * @return    [array]                               [用户信息]
 */
function get_wechat_userInfo($appid, $appsecret, $token, $openid)
{
    $auth = new WechatAuth($appid, $appsecret, $token);
    $userInfo = $auth->getUserInfo($openid);

    return $userInfo;
}

/**
 * [get_wechat_signPackage 获取jssdk配置]
 * @linchuangbin
 * @DateTime  2017-01-05T21:07:21+0800
 * @param     [type]                   $appId     [微信配置]
 * @param     [type]                   $appSecret [微信配置]
 * @return    [array]                             [配置数组]
 */
function get_wechat_signPackage($appId, $appSecret)
{
    $jssdk = new Jssdk($appId,$appSecret);
    $signPackage = $jssdk->GetSignPackage();

    return $signPackage;
}

?>