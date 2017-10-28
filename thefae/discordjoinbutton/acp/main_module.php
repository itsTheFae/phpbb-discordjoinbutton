<?php

namespace thefae\discordjoinbutton\acp;

class main_module
{
    public $u_action;
    public $tpl_name;
    public $page_title;

    public function main($id, $mode)
    {
        global $config, $request, $template, $user;
        
		$user->add_lang('acp/common');
        
        $this->tpl_name = 'djb_body';
        $this->page_title = $user->lang('ACP_DJB_TITLE');

        add_form_key('thefae_djb_settings');

        if ($request->is_set_post('submit'))
        {
            if (!check_form_key('thefae_djb_settings'))
            {
                 trigger_error('FORM_INVALID');
            }

            $config->set('thefae_djb_api_url', $request->variable('thefae_djb_api_url', ""));
            $config->set('thefae_djb_invite_link', $request->variable('thefae_djb_invite_link', ""));
            $config->set('thefae_djb_count_enabled', $request->variable('thefae_djb_count_enabled', 1));
            $config->set('thefae_djb_auto_refresh', $request->variable('thefae_djb_auto_refresh', 1));
            $config->set('thefae_djb_auto_fetch_link', $request->variable('thefae_djb_auto_fetch_link', 1));
            
            trigger_error($user->lang('ACP_DJB_SETTINGS_SAVED') . adm_back_link($this->u_action));
        }

        $template->assign_vars(array(
            'THEFAE_DJB_API_URL' => $config['thefae_djb_api_url'],
            'THEFAE_DJB_INVITE_LINK' => $config['thefae_djb_invite_link'],
            'THEFAE_DJB_COUNT_ENABLED' => $config['thefae_djb_count_enabled'],
            'THEFAE_DJB_AUTO_REFRESH' => $config['thefae_djb_auto_refresh'],
            'THEFAE_DJB_AUTO_FETCH_LINK' => $config['thefae_djb_auto_fetch_link'],
            'U_ACTION'          => $this->u_action,
        ));
    }
}

