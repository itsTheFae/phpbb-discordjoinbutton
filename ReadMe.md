# PHPBB Discord Join Button 

This is an extension for PHPBB 3.2.x which adds a "Join Discord" instant-invite button to the header navigation area of the forum.  

The extension is compatible primarilly with **Prosilver**-based styles and provides a few options to make use of the Discord JSON API for fetching online member counts as well as updating the Instant Invite link using information provided via the API if configured to do so.  

Language availability is currently just English, but others may be added if translations are provided.  All contributions are welcome! 

**Current Version:** _0.3.2_  

## How To

This extension installs easily using the standard steps for PHPBB Extensions (since 3.1 forward)  
Copy this repository and upload the extension folder to your `/ext` directory, then visit your ACP to enable the extension. Once enabled you'll need to configure it in the "Extensions" tab.  

The minimum required configuration is an **Instant Invite** link. Using the extension *without* the JSON API will disable member counts and Javascript options wont be used.  

If the Discord **JSON API** URL is provided the extension will be able to get online member counts as well as updating the Instant Invite link if there is one set in your Server's API.

