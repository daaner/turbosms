<?php

return [

    'error_data' => 'Received data error',
    'test_mode' => 'Send test mode',
    'empty_text' => 'No message text specified',

    'response_status' => [
        //0
        'OK' => 'Request was processed successfully',

        //1
        'PONG' => 'Successful result of ping method call',

        //103
        'REQUIRED_TOKEN' => 'No authentication token',

        //104
        'REQUIRED_CONTENT' => 'No request data',

        //105
        'REQUIRED_AUTH' => 'Authentication failed, wrong token',

        //106
        'REQUIRED_ACTIVE_USER' => 'User is blocked, it is not possible to work with the API until unblocked',

        //200
        'REQUIRED_MESSAGE_SENDER' => 'Missing or empty message sender parameter',

        //201
        'REQUIRED_MESSAGE_TEXT' => 'No or empty message text parameter',

        //202
        'REQUIRED_MESSAGE_RECIPIENT' => 'No or empty list of recipients of this message',

        //203
        'REQUIRED_BALANCE' => 'Not enough credits on balance to create a mailing',

        //204
        'REQUIRED_MESSAGE_BUTTON' => 'Missing or empty options for a button in a message when it is required',

        //205
        'REQUIRED_MESSAGE_BUTTON_CAPTION' => 'Missing or empty text parameter on button in message',

        //206
        'REQUIRED_MESSAGE_BUTTON_ACTION' => 'No or empty URL parameter of the address the message recipient will go to when the button is clicked.',

        //300
        'INVALID_REQUEST' => 'Invalid request, check its structure and data correctness',

        //301
        'INVALID_TOKEN' => 'Invalid authentication token',

        //302
        'INVALID_MESSAGE_SENDER' => 'Invalid sender of the message',

        //303
        'INVALID_START_TIME' => 'Invalid date of pending message sending',

        //304
        'INVALID_MESSAGE_TEXT' => 'Invalid value of message text. Returns if non string value is passed or character encoding is not in UTF-8 set',

        //305
        'INVALID_PHONE' => "Invalid recipient number, system failed to recognize recipient's country and operator",

        //306
        'INVALID_TTL' => 'Invalid ttl parameter value, value must be integer and not represented as a string',

        //306
        'INVALID_MESSAGE_ID' => 'Invalid value of message_id parameter, wrong format',

        //400
        'NOT_ALLOWED_MESSAGE_SENDER' => 'Not allowed to send message to current user',

        //401
        'NOT_ALLOWED_MESSAGE_SENDER_NOT_ACTIVE' => "The sender is allowed, but is not currently activated (current month's usage is not paid, registration is not completed, etc.)",

        //402
        'NOT_ALLOWED_MESSAGE_IMAGE' => 'Invalid image file type',

        //403
        'NOT_ALLOWED_START_TIME' => 'Invalid delayed message date (out of limit)',

        //404
        'NOT_ALLOWED_NUMBER_STOPLIST' => "Recipient's number is on stoplist (for sms) or ignored list (for Viber), no sending possible",

        //405
        'NOT_ALLOWED_RECIPIENTS_LIMIT' => 'Not allowed number of recipients',

        //406
        'NOT_ALLOWED_RECIPIENT_COUNTRY' => 'Invalid recipient country. The user does not have the ability to send messages to recipients of this country activated. Please contact our Customer Service Department to activate this feature',

        //407
        'NOT_ALLOWED_RECIPIENT_DUPLICATE' => 'Recipient already present in the mailing, duplicates are ignored',

        //408
        'NOT_ALLOWED_MESSAGE_BUTTON_TEXT_LENGTH' => 'The text on the button is too long, no more than 30 characters are allowed',

        //409
        'NOT_ALLOWED_MESSAGE_TTL' => 'Invalid value of ttl parameter (exceeds defined limits)',

        //410
        'NOT_ALLOWED_MESSAGE_TRANSACTION_CONTENT' => 'Invalid content in transactional message. Only text can be sent in such messages, but buttons and images are not allowed.',

        //411
        'NOT_ALLOWED_MESSAGE_DATA' => 'Some parameter has an invalid value, contact our customer support department for details',

        //412
        'NOT_ALLOWED_MESSAGE_TEXT' => 'Text contains illegal fragments',

        //413
        'NOT_ALLOWED_MESSAGE_TEXT_LENGTH' => 'Message text length exceeded',

        //414
        'NOT_ALLOWED_MESSAGE_ID' => 'Message data with the passed message_id is not available to the current user',

        //415
        'NOT_ALLOWED_MESSAGE_TRANSACTION_SENDER' => 'Transactional messages from shared sender are not allowed to be sent',

        //500
        'FAILED_CONVERT_RESULT2JSON' => 'Failed to convert result data into JSON format, contact our customer support department immediately for details',

        //501
        'FAILED_CONVERT_RESULT2XML' => 'Failed to convert result data into XML format, contact our customer support department for details immediately',

        //502
        'FAILED_PARSE_BODY' => 'Failed to recognize request body (invalid format)',

        //503
        'FAILED_SMS_SEND' => 'Unable to send SMS message',

        //504
        'FAILED_VIBER_SEND' => 'Failed to send Viber message',

        //505
        'FAILED_SAVE_IMAGE' => 'Failed to save image',

        //800
        'SUCCESS_MESSAGE_ACCEPTED' => 'Messages have been successfully created and added to the sending queue. Some messages may be pre-moderated',

        //801
        'SUCCESS_MESSAGE_SENT' => 'Messages have been successfully sent',

        //802
        'SUCCESS_MESSAGE_PARTIAL_ACCEPTED' => 'Messages were successfully created and added to the submission queue, but some recipients were not on the mailing list, see reply for details',

        //803
        'SUCCESS_MESSAGE_PARTIAL_SENT' => 'Messages have been successfully sent, but some recipients are not on the mailing list, see reply for details',

        //999
        'FATAL_ERROR' => 'Request execution error, please contact support for details',
    ],

];

