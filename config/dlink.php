<?php

return [
    'firebase_domain_uri_prefix' => env('FIREBASE_DOMAIN', 'https://dcare.enzaime.com'),
    'firebase_url' => env('FIREBASE_URL', 'https://firebasedynamiclinks.googleapis.com/v1/shortLinks'),
    'firebase_api_key' => env('FIREBASE_API_KEY', null),
    'firebase_android_package_name' => env('FIREBASE_ANDROID_PACKAGE_NAME', 'com.enzaime.care'),
    'firebase_ios_bundle_id' => env('FIREBASE_IOS_BUNDLE_ID', 'com.enzaime.care'),
    'disable_dynamic_link_generation' => env('DISABLE_DYNAMIC_LINK_GENERATION'),
];