<?php
return array(
    // set your paypal credential
    'client_id' => 'AfzqeqSEl2qjFCoo9oyqrGax7RvFzCizkbv-P5yypA8ShTa1ySs5PkxVWM82iZHHfCnjegm-UGSm6QJy',
    'secret' => 'EGp7Akhxtb4POCssUY2VBEtsuisK9rGEUdP3Ou0I6yGz7YXSsk1nHSzWhFvcUy2vdJj3U1XYpSH4Aa4q',
    /**
     * SDK configuration 
     */
    'settings' => array(
        /**
         * Available option 'sandbox' or 'live'
         */
        'mode' => 'live',
 
        /**
         * Specify the max request time in seconds
         */
        'http.ConnectionTimeOut' => 30,
 
        /**
         * Whether want to log to a file
         */
        'log.LogEnabled' => true,
 
        /**
         * Specify the file that want to write on
         */
        'log.FileName' => storage_path() . '/logs/paypal.log',
 
        /**
         * Available option 'FINE', 'INFO', 'WARN' or 'ERROR'
         *
         * Logging is most verbose in the 'FINE' level and decreases as you
         * proceed towards ERROR
         */
        'log.LogLevel' => 'FINE'
    ),
);