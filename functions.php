<?php
function checkCurrentPassword(string $mailBox, string $password)
{
    $user_id = explode('@', $mailBox)[0];
    $mbox = imap_open ("{imap.beget.com:993/imap/ssl}INBOX", $user_id, $password);
    imap_close($mbox);
    return !($mbox === FALSE);
}

function setNewPassword($mailBox, $password)
{
    $mailBox = explode('@', $mailBox);
    return file_get_contents(
        urlencode(
            sprintf("https://api.beget.com/api/mail/changeMailboxPassword?login=%s&passwd=%s&input_format=json&output_format=json&input_data={\"domain\":\"{$mailBox[1]}\",\"mailbox\":\"{$mailBox[0]}\",\"mailbox_password\":\"$password\"}", API_LOGIN, API_PASSWORD)
        )
    );
}