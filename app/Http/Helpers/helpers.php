<?php

use App\Lib\ClientInfo;
use App\Models\Contestant;
use App\Models\Setting;

function slug($string)
{
    return Str::slug($string);
}

function verificationcode($length)
{
    if ($length == 0) {
        return 0;
    }

    $min = 10 ** ($length - 1);
    $max = (10 ** $length) - 1;
    return random_int($min, $max);
}

function getnumber($length = 8)
{
    $characters = '1234567890';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[random_int(0, $charactersLength - 1)];
    }
    return $randomString;
}

use Carbon\Carbon;
use Illuminate\Support\Str;

/**
 * Retrieve the site logo URL based on the type.
 *
 * @param string|null $type
 * @return string
 */
function siteLogo($logoType = 'dark_logo')
{
    return Setting::getLogo($logoType);
}

/**
 * Retrieve the site favicon URL.
 *
 * @return string
 */
function siteFavicon()
{
    return Setting::getLogo('favicon');
}

/**
 * Retrieve the site name with the optional page name.
 *
 * @param string|null $pageName
 * @return string
 */
function siteName($pageName = null)
{
    // Retrieve the site name from the settings or use the default Laravel app name
    $siteName = Setting::getValue('site_name', config('app.name', 'Finding Her'));

    return $pageName ? "{$siteName} - {$pageName}" : $siteName;
}

if (!function_exists('getDefaultDomains')) {
    function getDefaultDomains()
    {
        return 'gmail.com,yahoo.com,outlook.com,hotmail.com,icloud.com';
    }
}


/**
 * Retrieve the settings object.
 *
 * @return object
 */
function getSettings()
{
    return Setting::getSettingsObject();
}
function getSetting($key, $default = null)
{
    return Setting::getValue($key, $default);
}

if (!function_exists('isVotingEnabled')) {
    function isVotingEnabled()
    {
        return Setting::isVotingEnabled();
    }
}

if (!function_exists('isDeclareWinnerEnabled')) {
    function isDeclareWinnerEnabled()
    {
        return Setting::isDeclareWinnerEnabled();
    }
}

if (!function_exists('getWinner')) {
    function getWinner()
    {
        if (isDeclareWinnerEnabled()) {
            return Contestant::withCount('votes')
                ->orderBy('votes_count', 'desc')
                ->first();
        }
        return null;
    }
}

if (!function_exists('checkAndDisableVoting')) {
    function checkAndDisableVoting()
    {
        $enableVoting = Setting::where('key', 'enable_voting')->value('value');
        $votingEndDate = Setting::where('key', 'voting_enddate')->value('value');

        if ($enableVoting && Carbon::parse($votingEndDate)->isPast()) {
            Setting::updateOrCreate(['key' => 'enable_voting'], ['value' => 0]);
        }
    }
}

if (!function_exists('convertYoutubeLink')) {
    function convertYoutubeLink($url)
    {
        // Check if the URL is from YouTube
        if (preg_match('/youtu\.be\/([^\?&]+)/', $url, $matches) ||
            preg_match('/youtube\.com\/watch\?v=([^\?&]+)/', $url, $matches)) {
            $videoId = $matches[1];
            $queryParams = parse_url($url, PHP_URL_QUERY);
            return "https://www.youtube.com/embed/{$videoId}" . ($queryParams ? "?{$queryParams}" : '');
        }

        // Return the original URL if it's not a YouTube link
        return $url;
    }
}
function removeElement($array, $value)
{
    return array_diff($array, (array) $value);
}

function cryptoQR($wallet)
{
    return "https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl=$wallet&choe=UTF-8";
}

function keyToTitle($text)
{
    return ucfirst(preg_replace("/[^A-Za-z0-9 ]/", ' ', $text));
}

function titleToKey($text)
{
    return Str::snake($text);
}

function strLimit($title = null, $length = 10)
{
    return Str::limit($title, $length);
}

function getIpInfo()
{
    $ipInfo = ClientInfo::ipInfo();
    return $ipInfo;
}

function osBrowser()
{
    $osBrowser = ClientInfo::osBrowser();
    return $osBrowser;
}

function getImage($image, $size = null)
{
    $clean = '';
    if (file_exists($image) && is_file($image)) {
        return asset($image) . $clean;
    }
    if ($size) {
        return route('placeholder.image', $size);
    }
    return asset('assets/global/images/default.png');
}

function notify($user, $templateName, $shortCodes = null, $sendVia = null, $createLog = true)
{
    $general = getGeneralSettings();
    $globalShortCodes = [
        'site_name' => $general->site_name,
        'site_currency' => $general->cur_text,
        'currency_symbol' => $general->cur_sym,
    ];

    if (gettype($user) == 'array') {
        $user = (object) $user;
    }

    $shortCodes = array_merge($shortCodes ?? [], $globalShortCodes);

    // $notify = new Notify($sendVia);
    // $notify->templateName = $templateName;
    // $notify->shortCodes = $shortCodes;
    // $notify->user = $user;
    // $notify->createLog = $createLog;
    // $notify->userColumn = isset($user->id) ? $user->getForeignKey() : 'user_id';
    // $notify->send();
}

function getPaginate($paginate = 20)
{
    return $paginate;
}

function paginateLinks($data)
{
    return $data->appends(request()->all())->links();
}

function menuActive($routeName, $type = null, $param = null)
{

    if ($type == 3) {
        $class = 'side-menu--open';
    } elseif ($type == 2) {
        $class = 'sidebar-submenu__open';
    } else {
        $class = 'active';
    }

    if (is_array($routeName)) {
        foreach ($routeName as $key => $value) {
            if (request()->routeIs($value)) {
                return $class;
            }

        }
    } elseif (request()->routeIs($routeName)) {
        if ($param) {
            $routeParam = array_values(@request()->route()->parameters ?? []);
            if (strtolower(@$routeParam[0]) == strtolower($param)) {
                return $class;
            } else {
                return;
            }

        }
        return $class;
    }
}

function showDateTime($date, $format = 'Y-m-d h:i A')
{
    $lang = session()->get('lang');
    Carbon::setlocale($lang);
    return Carbon::parse($date)->translatedFormat($format);
}

function urlPath($routeName, $routeParam = null)
{
    if ($routeParam == null) {
        $url = route($routeName);
    } else {
        $url = route($routeName, $routeParam);
    }
    $basePath = route('home');
    $path = str_replace($basePath, '', $url);
    return $path;
}

function showMobileNumber($number)
{
    $length = strlen($number);
    return substr_replace($number, '***', 2, $length - 4);
}

function showEmailAddress($email)
{
    $endPosition = strpos($email, '@') - 1;
    return substr_replace($email, '***', 1, $endPosition);
}

function getRealIP()
{
    $ip = $_SERVER["REMOTE_ADDR"];
    //Deep detect ip
    if (filter_var(@$_SERVER['HTTP_FORWARDED'], FILTER_VALIDATE_IP)) {
        $ip = $_SERVER['HTTP_FORWARDED'];
    }
    if (filter_var(@$_SERVER['HTTP_FORWARDED_FOR'], FILTER_VALIDATE_IP)) {
        $ip = $_SERVER['HTTP_FORWARDED_FOR'];
    }
    if (filter_var(@$_SERVER['HTTP_X_FORWARDED_FOR'], FILTER_VALIDATE_IP)) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    if (filter_var(@$_SERVER['HTTP_CLIENT_IP'], FILTER_VALIDATE_IP)) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    }
    if (filter_var(@$_SERVER['HTTP_X_REAL_IP'], FILTER_VALIDATE_IP)) {
        $ip = $_SERVER['HTTP_X_REAL_IP'];
    }
    if (filter_var(@$_SERVER['HTTP_CF_CONNECTING_IP'], FILTER_VALIDATE_IP)) {
        $ip = $_SERVER['HTTP_CF_CONNECTING_IP'];
    }
    if ($ip == '::1') {
        $ip = '127.0.0.1';
    }

    return $ip;
}

function appendQuery($key, $value)
{
    return request()->fullUrlWithQuery([$key => $value]);
}

function dateSort($a, $b)
{
    return strtotime($a) - strtotime($b);
}

function dateSorting($arr)
{
    usort($arr, "dateSort");
    return $arr;
}

function formateScope($scope)
{
    return ucwords(str_replace('-', ' ', strtolower($scope) == 'list' ? 'All' : $scope));
}

function jsonResponse(string $remark, array $message, string $status = 'error', array $data = [])
{
    $response = [
        'remark' => $remark,
        'status' => $status,
        'message' => [
            $status => $message,
        ],
    ];
    if (count($data)) {
        $response['data'] = $data;
    }

    return response()->json($response);
}
