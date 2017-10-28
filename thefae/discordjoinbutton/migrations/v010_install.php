<?php

namespace thefae\discordjoinbutton\migrations;

class v010_install extends \phpbb\db\migration\migration
{
    /**
     * If our config variable already exists in the db
     * skip this migration.
     */
    public function effectively_installed()
    {
        return isset($this->config['thefae_djb_auto_refresh']) && 
                isset($this->config['thefae_djb_api_url']) && 
                isset($this->config['thefae_djb_invite_link']);
    }

    /**
     * This migration depends on phpBB's v314 migration
     * already being installed.
     */
    static public function depends_on()
    {
        return array('\phpbb\db\migration\data\v310\alpha2');
    }

    public function update_data()
    {
        return array(

            // Add the config variable we want to be able to set
            array('config.add', array('thefae_djb_auto_refresh', 1)),
            array('config.add', array('thefae_djb_api_url', "")),
            array('config.add', array('thefae_djb_invite_link', "")),

            // Add a parent module (ACP_DJB_TITLE) to the Extensions tab (ACP_CAT_DOT_MODS)
            array('module.add', array(
                'acp',
                'ACP_CAT_DOT_MODS',
                'ACP_DJB_TITLE'
            )),

            // Add our main_module to the parent module (ACP_DJB_TITLE)
            array('module.add', array(
                'acp',
                'ACP_DJB_TITLE',
                array(
                    'module_basename'       => '\thefae\discordjoinbutton\acp\main_module',
                    'modes'                 => array('settings'),
                ),
            )),
        );
    }
}