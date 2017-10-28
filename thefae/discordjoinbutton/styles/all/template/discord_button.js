$( document ).ready(function() {
    var discordBtnFetch = function() {
        if( djbConfDiscordAPI == "" || !djbConfCountEnabled ) {
            return false;
        }
        
        $.get(djbConfDiscordAPI, {}, function(data, stat){
            var membersOnline = 0;
            var inviteLink = djbConfInviteLink;
            if( stat == 'success' ) {
                if( typeof(data.instant_invite) == 'string' && data.instant_invite ) {
                    inviteLink = data.instant_invite;
                }
                if( typeof(data.members) == 'object' ) {
                    membersOnline = data.members.length;
                }
            } 
            
            var $dBtn = $(".discord-btn");
            var $dBtnLink = $dBtn.find("a");
            var $dBtnText = $dBtn.find("a > span");
            var btnText = djbLangLinkText; 
            var btnTitle = djbLangLinkTitle;
            var memStr = membersOnline.toString();
            
            if( membersOnline > 0 ) {
                btnText = btnText + "<span>" + djbLangLinkTextCntS + memStr + djbLangLinkTextCntE + "</span>";
                btnTitle = djbLangLinkTitle + djbLangLinkTitleCntS + memStr + djbLangLinkTitleCntE;
            }
            
            if( inviteLink && djbConfFetchInviteLink ) {
                $dBtnLink.attr('href', inviteLink);
            }
            $dBtnLink.attr('title', btnTitle);
            $dBtnText.html( btnText );
            
            if( djbConfAutoRefresh ) { 
                setTimeout( discordBtnFetch, 300000 );
            }
        });
    }
    discordBtnFetch();
});