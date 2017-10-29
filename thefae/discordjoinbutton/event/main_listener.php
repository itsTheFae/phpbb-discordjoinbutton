<?php

namespace thefae\discordjoinbutton\event;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class main_listener implements EventSubscriberInterface
{
    protected $config;
    protected $helper;
    protected $template;
    protected $user;
    
    public function __construct(\phpbb\config\config $config, \phpbb\controller\helper $helper, \phpbb\template\template $template, \phpbb\user $user)
    {
        $this->config = $config;
        $this->helper = $helper;
        $this->template = $template;
        $this->user = $user;
    }
    
    /**
     * Assign functions defined in this class to event listeners in the core
     *
     * @return array
     */
    static public function getSubscribedEvents()
    {
        return array(
            'core.user_setup'   => 'load_language_on_setup',
            'core.page_header'  => 'add_page_header_data',
            'core.page_footer'  => 'add_page_footer_data'
        );
    }

    /**
     * Load the language file
     *
     * @param \phpbb\event\data $event The event object
     */
    public function load_language_on_setup($event)
    {
        $lang_set_ext = $event['lang_set_ext'];
        $lang_set_ext[] = array(
            'ext_name' => 'thefae/discordjoinbutton',
            'lang_set' => 'discordjoinbutton',
        );
        $event['lang_set_ext'] = $lang_set_ext;
    }
    
    public function add_page_header_data($event)
    {
        $invite_link = (!empty($this->config['thefae_djb_invite_link'])) ? $this->config['thefae_djb_invite_link'] : "#";
        $has_invite_link = (!empty($this->config['thefae_djb_invite_link'])) ? true : false ;
        
        // We might get an invite link from the API, so if it is set we can display the link.
        $has_invite_link = (!empty($this->config['thefae_djb_api_url'])) ? true : $has_invite_link ;
        
        $vars = array(
            'U_DJB_INVITE_LINK'     => $invite_link,
            'T_DJB_HAS_INVITE_LINK' => $has_invite_link
        );
        
        $this->template->assign_vars( $vars );
    }
    
    public function add_page_footer_data($event)
    {
        $invite_link = (!empty($this->config['thefae_djb_invite_link'])) ? $this->config['thefae_djb_invite_link'] : "#";
        $api_url = !$this->config['thefae_djb_api_url'] ? "" : $this->config['thefae_djb_api_url'];
        $count_enabled = !$this->config['thefae_djb_count_enabled'] ? false : true;
        $auto_refresh = !$this->config['thefae_djb_auto_refresh'] ? false : true;
        $auto_fetch = !$this->config['thefae_djb_auto_fetch_link'] ? false : true;
        
        $vars = array(
            'DJB_API_URL'           => $api_url,
            'DJB_INVITE_LINK'       => $invite_link,
            'DJB_COUNT_ENABLED'     => $count_enabled,
            'DJB_AUTO_REFRESH'      => $auto_refresh,
            'DJB_AUTO_FETCH'        => $auto_fetch
        );
        
        $this->template->assign_vars( $vars );
    }
}

