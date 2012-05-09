<?php

$skype = substr($_SERVER["REQUEST_URI"], 3);
if (strpos($skype, "skype:") !== 0 && ! empty($skype)) {
    $skype = "skype:" . $skype ;
}

if ($skype) {
    header('HTTP/1.1 303 See Other');
    header('Location: ' . $skype);
}

?>
<html>
  <head>
  <title>Skype redirection</title>
  </head>
  <body>
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

    <?php } 
    ?>

<hr>
<p>By <a href="http://soiland-reyes.com/stian/">Stian Soiland-Reyes</a>.
This service is not affiliated with <a
href="http://www.skype.com/">Skype</a> but is applying with the <a
href="http://www.skype.com/intl/en-us/legal/terms/trademark-guidelines/">Skype
trademark guidelines</a>.
<p>For support, try <a
href="http://s11.no/s/skype:?chat&blob=vWcspqbJZRTzxKXx051UMs6vlXxZWYVObsHSXxUkJLSErG9cKA4">skype:?chat&blob=vWcspqbJZRTzxKXx051UMs6vlXxZWYVObsHSXxUkJLSErG9cKA4</a>
or contact <a href="https://twitter.com/soilandreyes">@soilandreyes</a>. </p>.

  </body>
</html>
