$( document ).ready(function() {
    var DiscordAPI = '';
    var DefaultInviteLink = "";
    var DefaultLinkTitle = "Join our Discord Server";
    var DefaultLinkText = "Join Discord";
    
    var discordBtnFetch = function() {
        $.get(DiscordAPI, {}, function(data, stat){
            var membersOnline = 0;
            var inviteLink = DefaultInviteLink;
            if( stat == 'success' ) {
                if( typeof(data.instant_invite) == 'string' ) {
                    inviteLink = data.instant_invite;
                }
                if( typeof(data.members) == 'object' ) {
                    membersOnline = data.members.length;
                }
            } 
            
            var $dBtn = $(".discord-btn");
            var $dBtnLink = $dBtn.find("a");
            var $dBtnText = $dBtn.find("a > span");
            var btnText = DefaultLinkText; //$dBtnText.text();
            var btnTitle = DefaultLinkTitle;
            var memStr = membersOnline.toString();
            
            if( membersOnline > 0 ) {
                btnText = btnText + "<span>(" + memStr + ")</span>";
                
                if( membersOnline == 1 ) {
                    btnTitle = DefaultLinkTitle + " - " + memStr + " member currently online"
                } else {
                    btnTitle = DefaultLinkTitle + " - " + memStr + " members currently online"
                }
            }
            
            $dBtnLink.attr('href', inviteLink);
            $dBtnLink.attr('title', btnTitle);
            $dBtnText.html( btnText );
            
            $dBtn.removeClass('discord-btn-hide');
            
            setTimeout( discordBtnFetch, 300000 );
        });
    }
    discordBtnFetch();
});