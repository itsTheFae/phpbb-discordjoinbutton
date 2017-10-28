<?php

namespace thefae\discordjoinbutton\acp;

class main_info
{
    public function module()
    {
        return array(
            'filename'  => '\thefae\discordjoinbutton\acp\main_module',
            'title'     => 'ACP_DJB_TITLE',
            'modes'    => array(
                'settings'  => array(
                    'title' => 'ACP_DJB_SETTINGS_TITLE',
                    'auth'  => 'ext_thefae/discordjoinbutton && acl_a_board',
                    'cat'   => array('ACP_DJB_TITLE')
                ),
            ),
        );
    }
}
