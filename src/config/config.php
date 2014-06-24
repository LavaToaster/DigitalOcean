<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Digital Ocean Access Token
    |--------------------------------------------------------------------------
    |
    | This token is used to access the api on behalf of the user it is assigned to.
    | You can generate one in the Apps & API are of the control panel.
    | https://cloud.digitalocean.com/settings/applications
    |
    */

    'access_token' => 'd90111c319d93a0880eddb38706ec2e73e05be0efb1ecee164c06b2f77ddfbe2',
    /*
    |--------------------------------------------------------------------------
    | Digital Ocean API Url
    |--------------------------------------------------------------------------
    |
    | The url to use when communicating with the api
    |
    */

    'url' => 'https://api.digitalocean.com/{version}/',
    /*
    |--------------------------------------------------------------------------
    | Digital Ocean API Version
    |--------------------------------------------------------------------------
    |
    | The version of the api to use
    |
    | NOTE: This package only works with v2
    |
    */

    'version' => 'v2',
    /*
    |--------------------------------------------------------------------------
    | Adapter
    |--------------------------------------------------------------------------
    |
    | The adapter to use when making requests to the api
    |
	| Supported: "guzzle"
    |
    */

    'adapter' => 'guzzle',
];