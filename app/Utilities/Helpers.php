<?php

use Illuminate\Http\RedirectResponse;

/**
 * @param $size
 * @param $precision
 * @return string
 */
function humanFilesize($size, $precision = 2) {
    $units = array('B','kB','MB','GB','TB','PB','EB','ZB','YB');
    $step = 1024;
    $i = 0;

    while (($size / $step) > 0.9) {
        $size = $size / $step;
        $i++;
    }

    return round($size, $precision).$units[$i];
}

/**
 * @param $route
 * @param array $parameters
 * @return RedirectResponse
 */
function returnOrRoute($route, array $parameters = []): RedirectResponse
{
    if($return = request('return', false)){
        return redirect()->to($return);
    }

    return redirect()->route($route, $parameters);
}

/**
 * @param $email
 * @return array|string|string[]|null
 */
function hideEmail($email)
{
    return preg_replace_callback('/(\w)(.*?)(\w)(@.*?)$/s', function ($matches){
        return $matches[1].preg_replace("/\w/", "*", $matches[2]).$matches[3].$matches[4];
    }, $email);
}

/**
 * @param $phone
 * @return array|string|string[]|null
 */
function hidePhone($phone)
{
    if(strlen($phone) < 5){
        return '';
    }

    $pre = substr($phone, 0, 3);
    $post = substr($phone, -2);
    $rest = substr($phone, 3, strlen($phone) - 2);

    return $pre . str_repeat('*', strlen($rest)) . $post;
}


function statusToColour($status){
    return match ($status) {
        'pending' => 'warning',
        'outstanding' => 'danger',
        'paid' => 'success',
    };
}


function paymentTypeToName($type)
{
    return match ($type) {
        \App\Invoice::PAYMENT_TYPE_BANK_TRANSFER => 'Bank Transfer',
        \App\Invoice::PAYMENT_TYPE_CREDIT_CARD => 'Credit Card',
        \App\Invoice::PAYMENT_TYPE_CHEQUE => 'Cheque',
        \App\Invoice::PAYMENT_TYPE_CASH => 'Cash',
        default => false,
    };
}


function currentUrlWithoutHost(): string
{
    $request = request();

    $query = $request->getQueryString();

    $question = $request->getBaseUrl().$request->getPathInfo() === '/' ? '/?' : '?';

    return $query ? $request->getPathInfo() . $question . $query : $request->getPathInfo();
}


/**
 * @param $slug
 *
 * @return string
 */
function console_page_name($slug): string
{
    $steps = config('console.listings.wizard-steps');

    foreach($steps as $step){
        if($step['step'] == $slug){
            return $step['name'];
        }
    }

    return ucwords(str_replace('-', ' ', $slug));
}


function console_stripslashes_deep($value): array|string
{
    return is_array($value) ?
        array_map('console_stripslashes_deep', $value) :
        stripslashes($value);
}




