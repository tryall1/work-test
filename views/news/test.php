<?php

function sendMessage($title){
    $content = array(
        "en" => 'Add news: '.$title
    );

    $fields = array(
        'app_id' => "cedc900f-eee9-4702-89b4-868adb421890",
        'included_segments' => array('Engaged Users', 'Inactive Users', 'Active Users'),
        'data' => array("foo" => "bar"),
        'contents' => $content
    );

    $fields = json_encode($fields);
    print("\nJSON sent:\n");
    print($fields);

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "https://onesignal.com/api/v1/notifications");
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json',
        'Authorization: Basic NGYzZmE1N2YtM2U4ZC00MjJlLTg0NzItNTY4YTE2ZWZmZWZi'));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($ch, CURLOPT_HEADER, FALSE);
    curl_setopt($ch, CURLOPT_POST, TRUE);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);

    $response = curl_exec($ch);
    curl_close($ch);

    return $response;
}

$title = $model->title;

$response = sendMessage($title);

