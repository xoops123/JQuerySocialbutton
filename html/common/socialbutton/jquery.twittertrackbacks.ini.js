jQuery(document).ready(function(){
	var this_url = location.href;

   jQuery('div.my-trackbacks').twitterTrackbacks({
      url: this_url
      ,n:8
      ,show_n:0
      ,inf_tip:1
   });
});
