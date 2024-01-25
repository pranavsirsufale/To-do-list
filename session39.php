<?php
// What is a session

/*
Sessions ¶
Session support in PHP consists of a way to preserve certain data across subsequent accesses. This enables you to build more customized applications and increase the appeal of your web site. All information is in the Session reference section.






ntroduction ¶
Session support in PHP consists of a way to preserve certain data across subsequent accesses.

A visitor accessing your web site is assigned a unique id, the so-called session id. This is either stored in a cookie on the user side or is propagated in the URL.

The session support allows you to store data between requests in the $_SESSION superglobal array. When a visitor accesses your site, PHP will check automatically (if session.auto_start is set to 1) or on your request (explicitly through session_start()) whether a specific session id has been sent with the request. If this is the case, the prior saved environment is recreated.

Caution
If you turn on session.auto_start then the only way to put objects into your sessions is to load its class definition using auto_prepend_file in which you load the class definition else you will have to serialize() your object and unserialize() it afterwards.

$_SESSION (and all registered variables) are serialized internally by PHP using the serialization handler specified by the session.serialize_handler ini setting, after the request finishes. Registered variables which are undefined are marked as being not defined. On subsequent accesses, these are not defined by the session module unless the user defines them later.

Warning
Because session data is serialized, resource variables cannot be stored in the session.

Serialize handlers (php and php_binary) inherit register_globals limitations. Therefore, numeric index or string index contains special characters (| and !) cannot be used. Using these will end up with errors at script shutdown. php_serialize does not have such limitations.

Note:

Please note when working with sessions that a record of a session is not created until a variable has been registered by adding a new key to the $_SESSION superglobal array. This holds true regardless of if a session has been started using the session_start() function.

*/


// what is a session?
// used to manage information across difference apges 


// verify the user login info
session_start();

$_SESSION['username'] = "Pranav";
$_SESSION['favCat'] = "books";
echo "We have saved your session";

?>