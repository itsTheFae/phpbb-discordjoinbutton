<?php

if (!defined('IN_PHPBB'))
{
    exit;
}

if (empty($lang) || !is_array($lang))
{
    $lang = array();
}

$lang = array_merge($lang, array(
    'DISCORD_BUTTON_TEXT'               => 'Join Discord',
    'DISCORD_BUTTON_TEXT_COUNT_START'   => '(',
    'DISCORD_BUTTON_TEXT_COUNT_END'     => ')',
    'DISCORD_BUTTON_TITLE'              => 'Join Our Discord Server',
    'DISCORD_BUTTON_TITLE_COUNT_START'  => ' - ',
    'DISCORD_BUTTON_TITLE_COUNT_END'    => ' currently online',
                                        
    'ACP_DJB_TITLE'                     => 'Discord Join Button',
    'ACP_DJB_SETTINGS_TITLE'            => 'Settings',
    'ACP_DJB_SETTINGS_SAVED'            => 'Settings have been saved successfully!',
    
    'ACP_DJB_OPT_API_URL'               => 'Discord API URL',
    'ACP_DJB_OPT_INVITE_LINK'           => 'Discord Invite Link',
    'ACP_DJB_OPT_AUTO_REFRESH'          => 'Auto Refresh User Count?',
));
