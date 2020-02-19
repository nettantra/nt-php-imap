# NetTantra PHP IMAP Library
This is an attempt to create pure PHP based IMAP library and a dropin replacement for the `php-imap` extension.

## IMAP Functions Implemented
* None Yet

## IMAP Functions to Implement
*   [imap\_8bit](https://www.php.net/manual/en/function.imap-8bit.php) — Convert an 8bit string to a quoted-printable string
*   [imap\_alerts](https://www.php.net/manual/en/function.imap-alerts.php) — Returns all IMAP alert messages that have occurred
*   [imap\_append](https://www.php.net/manual/en/function.imap-append.php) — Append a string message to a specified mailbox
*   [imap\_base64](https://www.php.net/manual/en/function.imap-base64.php) — Decode BASE64 encoded text
*   [imap\_binary](https://www.php.net/manual/en/function.imap-binary.php) — Convert an 8bit string to a base64 string
*   [imap\_body](https://www.php.net/manual/en/function.imap-body.php) — Read the message body
*   [imap\_bodystruct](https://www.php.net/manual/en/function.imap-bodystruct.php) — Read the structure of a specified body section of a specific message
*   [imap\_check](https://www.php.net/manual/en/function.imap-check.php) — Check current mailbox
*   [imap\_clearflag\_full](https://www.php.net/manual/en/function.imap-clearflag-full.php) — Clears flags on messages
*   [imap\_close](https://www.php.net/manual/en/function.imap-close.php) — Close an IMAP stream
*   [imap\_create](https://www.php.net/manual/en/function.imap-create.php) — Alias of imap\_createmailbox
*   [imap\_createmailbox](https://www.php.net/manual/en/function.imap-createmailbox.php) — Create a new mailbox
*   [imap\_delete](https://www.php.net/manual/en/function.imap-delete.php) — Mark a message for deletion from current mailbox
*   [imap\_deletemailbox](https://www.php.net/manual/en/function.imap-deletemailbox.php) — Delete a mailbox
*   [imap\_errors](https://www.php.net/manual/en/function.imap-errors.php) — Returns all of the IMAP errors that have occurred
*   [imap\_expunge](https://www.php.net/manual/en/function.imap-expunge.php) — Delete all messages marked for deletion
*   [imap\_fetch\_overview](https://www.php.net/manual/en/function.imap-fetch-overview.php) — Read an overview of the information in the headers of the given message
*   [imap\_fetchbody](https://www.php.net/manual/en/function.imap-fetchbody.php) — Fetch a particular section of the body of the message
*   [imap\_fetchheader](https://www.php.net/manual/en/function.imap-fetchheader.php) — Returns header for a message
*   [imap\_fetchmime](https://www.php.net/manual/en/function.imap-fetchmime.php) — Fetch MIME headers for a particular section of the message
*   [imap\_fetchstructure](https://www.php.net/manual/en/function.imap-fetchstructure.php) — Read the structure of a particular message
*   [imap\_fetchtext](https://www.php.net/manual/en/function.imap-fetchtext.php) — Alias of imap\_body
*   [imap\_gc](https://www.php.net/manual/en/function.imap-gc.php) — Clears IMAP cache
*   [imap\_get\_quota](https://www.php.net/manual/en/function.imap-get-quota.php) — Retrieve the quota level settings, and usage statics per mailbox
*   [imap\_get\_quotaroot](https://www.php.net/manual/en/function.imap-get-quotaroot.php) — Retrieve the quota settings per user
*   [imap\_getacl](https://www.php.net/manual/en/function.imap-getacl.php) — Gets the ACL for a given mailbox
*   [imap\_getmailboxes](https://www.php.net/manual/en/function.imap-getmailboxes.php) — Read the list of mailboxes, returning detailed information on each one
*   [imap\_getsubscribed](https://www.php.net/manual/en/function.imap-getsubscribed.php) — List all the subscribed mailboxes
*   [imap\_header](https://www.php.net/manual/en/function.imap-header.php) — Alias of imap\_headerinfo
*   [imap\_headerinfo](https://www.php.net/manual/en/function.imap-headerinfo.php) — Read the header of the message
*   [imap\_headers](https://www.php.net/manual/en/function.imap-headers.php) — Returns headers for all messages in a mailbox
*   [imap\_last\_error](https://www.php.net/manual/en/function.imap-last-error.php) — Gets the last IMAP error that occurred during this page request
*   [imap\_list](https://www.php.net/manual/en/function.imap-list.php) — Read the list of mailboxes
*   [imap\_listmailbox](https://www.php.net/manual/en/function.imap-listmailbox.php) — Alias of imap\_list
*   [imap\_listscan](https://www.php.net/manual/en/function.imap-listscan.php) — Returns the list of mailboxes that matches the given text
*   [imap\_listsubscribed](https://www.php.net/manual/en/function.imap-listsubscribed.php) — Alias of imap\_lsub
*   [imap\_lsub](https://www.php.net/manual/en/function.imap-lsub.php) — List all the subscribed mailboxes
*   [imap\_mail\_compose](https://www.php.net/manual/en/function.imap-mail-compose.php) — Create a MIME message based on given envelope and body sections
*   [imap\_mail\_copy](https://www.php.net/manual/en/function.imap-mail-copy.php) — Copy specified messages to a mailbox
*   [imap\_mail\_move](https://www.php.net/manual/en/function.imap-mail-move.php) — Move specified messages to a mailbox
*   [imap\_mail](https://www.php.net/manual/en/function.imap-mail.php) — Send an email message
*   [imap\_mailboxmsginfo](https://www.php.net/manual/en/function.imap-mailboxmsginfo.php) — Get information about the current mailbox
*   [imap\_mime\_header\_decode](https://www.php.net/manual/en/function.imap-mime-header-decode.php) — Decode MIME header elements
*   [imap\_msgno](https://www.php.net/manual/en/function.imap-msgno.php) — Gets the message sequence number for the given UID
*   [imap\_mutf7\_to\_utf8](https://www.php.net/manual/en/function.imap-mutf7-to-utf8.php) — Decode a modified UTF-7 string to UTF-8
*   [imap\_num\_msg](https://www.php.net/manual/en/function.imap-num-msg.php) — Gets the number of messages in the current mailbox
*   [imap\_num\_recent](https://www.php.net/manual/en/function.imap-num-recent.php) — Gets the number of recent messages in current mailbox
*   [imap\_open](https://www.php.net/manual/en/function.imap-open.php) — Open an IMAP stream to a mailbox
*   [imap\_ping](https://www.php.net/manual/en/function.imap-ping.php) — Check if the IMAP stream is still active
*   [imap\_qprint](https://www.php.net/manual/en/function.imap-qprint.php) — Convert a quoted-printable string to an 8 bit string
*   [imap\_rename](https://www.php.net/manual/en/function.imap-rename.php) — Alias of imap\_renamemailbox
*   [imap\_renamemailbox](https://www.php.net/manual/en/function.imap-renamemailbox.php) — Rename an old mailbox to new mailbox
*   [imap\_reopen](https://www.php.net/manual/en/function.imap-reopen.php) — Reopen IMAP stream to new mailbox
*   [imap\_rfc822\_parse\_adrlist](https://www.php.net/manual/en/function.imap-rfc822-parse-adrlist.php) — Parses an address string
*   [imap\_rfc822\_parse\_headers](https://www.php.net/manual/en/function.imap-rfc822-parse-headers.php) — Parse mail headers from a string
*   [imap\_rfc822\_write\_address](https://www.php.net/manual/en/function.imap-rfc822-write-address.php) — Returns a properly formatted email address given the mailbox, host, and personal info
*   [imap\_savebody](https://www.php.net/manual/en/function.imap-savebody.php) — Save a specific body section to a file
*   [imap\_scan](https://www.php.net/manual/en/function.imap-scan.php) — Alias of imap\_listscan
*   [imap\_scanmailbox](https://www.php.net/manual/en/function.imap-scanmailbox.php) — Alias of imap\_listscan
*   [imap\_search](https://www.php.net/manual/en/function.imap-search.php) — This function returns an array of messages matching the given search criteria
*   [imap\_set\_quota](https://www.php.net/manual/en/function.imap-set-quota.php) — Sets a quota for a given mailbox
*   [imap\_setacl](https://www.php.net/manual/en/function.imap-setacl.php) — Sets the ACL for a given mailbox
*   [imap\_setflag\_full](https://www.php.net/manual/en/function.imap-setflag-full.php) — Sets flags on messages
*   [imap\_sort](https://www.php.net/manual/en/function.imap-sort.php) — Gets and sort messages
*   [imap\_status](https://www.php.net/manual/en/function.imap-status.php) — Returns status information on a mailbox
*   [imap\_subscribe](https://www.php.net/manual/en/function.imap-subscribe.php) — Subscribe to a mailbox
*   [imap\_thread](https://www.php.net/manual/en/function.imap-thread.php) — Returns a tree of threaded message
*   [imap\_timeout](https://www.php.net/manual/en/function.imap-timeout.php) — Set or fetch imap timeout
*   [imap\_uid](https://www.php.net/manual/en/function.imap-uid.php) — This function returns the UID for the given message sequence number
*   [imap\_undelete](https://www.php.net/manual/en/function.imap-undelete.php) — Unmark the message which is marked deleted
*   [imap\_unsubscribe](https://www.php.net/manual/en/function.imap-unsubscribe.php) — Unsubscribe from a mailbox
*   [imap\_utf7\_decode](https://www.php.net/manual/en/function.imap-utf7-decode.php) — Decodes a modified UTF-7 encoded string
*   [imap\_utf7\_encode](https://www.php.net/manual/en/function.imap-utf7-encode.php) — Converts ISO-8859-1 string to modified UTF-7 text
*   [imap\_utf8\_to\_mutf7](https://www.php.net/manual/en/function.imap-utf8-to-mutf7.php) — Encode a UTF-8 string to modified UTF-7
*   [imap\_utf8](https://www.php.net/manual/en/function.imap-utf8.php) — Converts MIME-encoded text to UTF-8
