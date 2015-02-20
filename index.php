<?php

/**
Skype redirector
https://github.com/stain/s/
http://s11.no/s/

The BSD 2-Clause License
http://www.opensource.org/licenses/BSD-2-Clause

Copyright (c) 2012, Stian Soiland-Reyes <stian@soiland-reyes.com>
All rights reserved.

Redistribution and use in source and binary forms, with or without
modification, are permitted provided that the following conditions are
met:

Redistributions of source code must retain the above copyright notice,
this list of conditions and the following disclaimer.
Redistributions in binary form must reproduce the above copyright
notice, this list of conditions and the following disclaimer in the
documentation and/or other materials provided with the distribution.
THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS
IS" AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED
TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A
PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT
HOLDER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL,
SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED
TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES; LOSS OF USE, DATA, OR
PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY THEORY OF
LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING
NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS
SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.

**/



$skype = substr($_SERVER["REQUEST_URI"], 3);
if (strpos($skype, "skype:") !== 0 && ! empty($skype)) {
    $skype = "skype:" . $skype ;
}

if ($skype) {
    header('HTTP/1.1 303 See Other');
    header('Location: ' . $skype);
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
  <title>Skype redirection</title>
    <meta charset="utf-8"/>

    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <title>s11.no</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.css" rel="stylesheet" type="text/css" />
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.css" rel="stylesheet" type="text/css" /> 

    <style type="text/css">
    <!--
    .footer {
              width: 100%;
              margin-top: 2em;
              padding-top: 1em;
              padding-bottom: 1em;
              background-color: #f5f5f5;
              font-size: smaller;
    }
    -->
    </style>
  
  </head>
  <body>
 <div class="container" id="page">
  <?php
  if ($skype) { ?>

<p>
This is a HTTP URI for <code><?php echo $skype; ?></code>.
</p>
<p><em>
If the link below does not work, you might have to install
<a href="http://www.skype.com/">Skype</a>.
</em>
</p>

<!--
Skype 'Skype Me™!' button
http://www.skype.com/go/skypebuttons
-->
<script type="text/javascript" src="http://download.skype.com/share/skypebuttons/js/skypeCheck.js"></script>
<a href="<?php echo $skype; ?>"><img src="http://download.skype.com/share/skypebuttons/buttons/call_blue_white_124x52.png" style="border: none;" width="124" height="52" alt="Skype Me™!" /></a>

<p><a href="http://s11.no/s/">About this redirection service</a></p>

<?php } else {
    ?>
    <h1>Skype redirection</h1>
    <p>
    This page can be used to get a 303 See Other HTTP redirect to a
    Skype resource.  For instance, if you are using a wiki that only
    accepts <code>http://</code> hyperlinks, but you wanted to link to
    <code>skype:echo123</code> to call the user <code>echo123</code>,
    you can instead link to <a
    href="http://s11.no/s/skype:echo123">http://s11.no/s/skype:echo123</a>.
    This page will also provide a link to download Skype if it has not
    been installed or the <code>skype:</code> protocol is not registered in the
    browser.
    </p>
    <p>
    The URIs minted below <code>http://s11.no/s/skype:</code> can also
    be used for statements about Skype contacts in RDF if the
    unregistered <code>skype:</code> protocol is not desireable.
    </p>
    <h2>Examples:</h2>
    <p><em>Replace <code>echo123</code> with your Skype name</em></p>
    <ul>
      <li> <a
          href="http://s11.no/s/echo123">http://s11.no/s/echo123</a></li>
      <li> <a
          href="http://s11.no/s/skype:echo123">http://s11.no/s/skype:echo123</a></li>
      <li> <a
          href="http://s11.no/s/skype:echo123?chat">http://s11.no/s/skype:echo123?chat</a></li>
      <li> <a
          href="http://s11.no/s/skype:echo123?userinfo">http://s11.no/s/skype:echo123?userinfo</a></li>
      <li> <a
href="http://s11.no/s/skype:?chat&blob=vWcspqbJZRTzxKXx051UMs6vlXxZWYVObsHSXxUkJLSErG9cKA4">http://s11.no/s/skype:?chat&blob=vWcspqbJZRTzxKXx051UMs6vlXxZWYVObsHSXxUkJLSErG9cKA4</a></li>
    </ul>
    <h2>Tips</h2>
    <p>To find your own Skype name, click "Profile" in Skype.</p>
    <p>To find the Skype name of a contact, right click on the contact
    within Skype and click "View contact"</p>
    <p>To find the URI for a group chat in Skype, type <code>/get
    uri</code> into the chat window. Append that to
    <code>http://s11.no/s/</code></p>
    <p>For persistent Skype telcons, click "Create a group" and then use
    <code>/topic Something something</code> to give it a name.
    Participants who followed the links can click "Join call", lurk in
    the text chat, or leave the chat.
    (Note: the Linux Skype client and older OS X clients are currently
    not able to initiate a group call in this way, and will instead
    create a duplicate call which can't
    be joined by URI.)
    </p>
<h2>Source code</h2>
    <p>This service is made using Apache 2 redirection and PHP. See
       <a
       href="https://github.com/stain/s/">https://github.com/stain/s/</a>
       for source code and to suggest improvements/pull requests.
       </p>

    <?php } 
    ?>

</div>
<footer class="footer"><div class="container">
<p>By <a href="http://soiland-reyes.com/stian/">Stian Soiland-Reyes</a>.
This service is not affiliated with <a
href="http://www.skype.com/">Skype</a> but is complying with the <a
href="http://www.skype.com/intl/en-us/legal/terms/trademark-guidelines/">Skype
trademark guidelines</a>.
<p>For support, <a href="https://github.com/stain/s/pulls">raise an
issue</a>. </p>.

</div></footer>
  </body>
</html>
