<?php

return [

    'error_data' => 'Error getting data',
    'test_mode' => 'Send test mode',
    'empty_text' => 'Message text not specified',

    'response_status' => [
        //0
        'OK' => 'Request processed successfully',

        //1
        'PONG' => 'Successful result of calling the ping method',

        //103
        'REQUIRED_TOKEN' => 'Missing authentication token',

        //104
        'REQUIRED_CONTENT' => 'Missing request data',

        //105
        'REQUIRED_AUTH' => 'Authentication failed, invalid token',

        //106
        'REQUIRED_ACTIVE_USER' => 'The user is blocked, working with the API is impossible until unblocked',

        //200
        'REQUIRED_MESSAGE_SENDER' => 'Missing or empty message sender parameter',

        //201
        'REQUIRED_MESSAGE_TEXT' => 'Missing or empty message text parameter',

        //202
        'REQUIRED_MESSAGE_RECIPIENT' => 'Missing or empty list of message recipients',

        //203
        'REQUIRED_BALANCE' => 'There are not enough credits on the balance to create a newsletter',

        //204
        'REQUIRED_MESSAGE_BUTTON' => 'Missing or empty button options in message when required',

        //205
        'REQUIRED_MESSAGE_BUTTON_CAPTION' => 'Missing or empty text option on button in message',

        //206
        'REQUIRED_MESSAGE_BUTTON_ACTION' => 'Missing or empty parameter URL address where the recipient of the message will go when clicking on the button',

        //300
        'INVALID_REQUEST' => 'Invalid request, check its structure and data correctness',

        //301
        'INVALID_TOKEN' => 'Invalid auth token',

        //302
        'INVALID_MESSAGE_SENDER' => 'Wrong message sender',

        //303
        'INVALID_START_TIME' => 'Invalid date for delayed message sending',

        //304
        'INVALID_MESSAGE_TEXT' => 'Invalid message text value. Returned if a non-string value is passed or the character encoding is not in the UTF-8 set',

        //305
        'INVALID_PHONE' => 'Invalid recipient number, the system could not recognize the country and operator of the recipient',

        //306
        'INVALID_TTL' => 'Invalid ttl parameter value, value must be an integer and not represented as a string',

        //306
        'INVALID_MESSAGE_ID' => 'Invalid message_id parameter value, invalid format',

        //400
        'NOT_ALLOWED_MESSAGE_SENDER' => 'Unauthorized sender for current user',

        //401
        'NOT_ALLOWED_MESSAGE_SENDER_NOT_ACTIVE' => 'The sender is allowed, but not activated at the moment (not paid for the use of the current month, registration is not completed, etc.)',

        //402
        'NOT_ALLOWED_MESSAGE_IMAGE' => 'Invalid image file type',

        //403
        'NOT_ALLOWED_START_TIME' => 'Invalid delayed message send date (out of limits)',

        //404
        'NOT_ALLOWED_NUMBER_STOPLIST' => 'The recipient\'s number is in the stop list (for sms) or in the ignore list (for Viber), sending is not possible',

        //405
        'NOT_ALLOWED_RECIPIENTS_LIMIT' => 'Invalid number of recipients',

        //406
        'NOT_ALLOWED_RECIPIENT_COUNTRY' => 'Invalid recipient country. The user is not enabled to send messages to recipients in this country. To activate this feature, please contact our customer support department.',

        //407
        'NOT_ALLOWED_RECIPIENT_DUPLICATE' => 'The recipient is already in the mailing list, duplicates are ignored',

        //408
        'NOT_ALLOWED_MESSAGE_BUTTON_TEXT_LENGTH' => 'The text on the button is too long, no more than 30 characters are allowed',

        //409
        'NOT_ALLOWED_MESSAGE_TTL' => 'Invalid ttl parameter value (out of limits)',

        //410
        'NOT_ALLOWED_MESSAGE_TRANSACTION_CONTENT' => 'Invalid content in a transactional message. In such messages, only text can be sent, and the button and images are prohibited',

        //411
        'NOT_ALLOWED_MESSAGE_DATA' => 'One of the parameters has an invalid value, please contact our customer support department for details',

        //412
        'NOT_ALLOWED_MESSAGE_TEXT' => 'The text contains prohibited fragments',

        //413
        'NOT_ALLOWED_MESSAGE_TEXT_LENGTH' => 'Message text length exceeded',

        //414
        'NOT_ALLOWED_MESSAGE_ID' => 'The message data with the passed message_id is not available for the current user',

        //415
        'NOT_ALLOWED_MESSAGE_TRANSACTION_SENDER' => 'Not allowed to send transactional messages from a common sender',

        //500
        'FAILED_CONVERT_RESULT2JSON' => 'Failed to convert result data to JSON format, please contact our customer support immediately for details',

        //501
        'FAILED_CONVERT_RESULT2XML' => 'Failed to convert result data to XML format, please contact our customer support immediately for details',

        //502
        'FAILED_PARSE_BODY' => 'Failed to parse request body (bad format)',

        //503
        'FAILED_SMS_SEND' => 'Failed to send SMS message',

        //504
        'FAILED_VIBER_SEND' => 'Failed to send Viber message',

        //505
        'FAILED_SAVE_IMAGE' => 'Failed to save image',

        //800
        'SUCCESS_MESSAGE_ACCEPTED' => 'Messages were successfully created and added to the send queue. Some posts may be subject to pre-moderation.',

        //801
        'SUCCESS_MESSAGE_SENT' => 'Messages sent successfully',

        //802
        'SUCCESS_MESSAGE_PARTIAL_ACCEPTED' => 'Messages were successfully created and added to the send queue, but some recipients were not included in the mailing list, see the answer for details',

        //803
        'SUCCESS_MESSAGE_PARTIAL_SENT' => 'Messages were successfully sent, but some recipients were not included in the mailing list, see the answer for details',

        //999
        'FATAL_ERROR' => 'Request execution error, contact support for details',
    ],

];
