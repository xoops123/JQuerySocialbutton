(function($) {
	jQuery.fn.twitterTrackbackList = function(options){
		var topsyOtterapi = 'http://otter.topsy.com/trackbacks.js';
		var self = this;
		var tweetHtml = '';

		function renderHtml(n) {
			return (
				'<li class="tweet' + n + '">' +
					'<a href="' + this.author.url + '"><img src="' + this.author.photo_url + '" alt="' + this.author.name + '" width="48" /></a>' +
					'<ul class="section">' +
						'<li class="nick"><a href="' + this.author.url + '">' + this.author.nick + '</a></li>' +
						'<li class="content">' + this.content.replace(/((http:|https:)\/\/[\x21-\x7e]+)/gi, "<a href='$1'>$1</a>") + '</li>' +
						'<li class="date"><a href="' + this.permalink_url + '">' + this.date_alpha + '</a></li>' +
					'</ul>' +
				'</li>'
			);
		}

		options = $.extend({
			url: window.location.href,
			wrapperTag: 'ul',
			removeHash: true,
			callback: renderHtml,
			noTrackback: '<p>Twitterからのトラックバックはありません。</p>',
			exclude: []
		}, options);

		if (options.removeHash) {
			options.url = options.url.replace(/#.+/, '');
		}

		jQuery.ajax({
			type: 'GET',
			url: topsyOtterapi,
			cache: false,
			dataType: 'jsonp',
			data: {
				perpage: '100',
				order: 'date',
				url: options.url
			},
			success: function(trackbackData) {
				if(trackbackData.response.list.length == 0) {
					tweetHtml += options.noTrackback;

				} else {
					jQuery.each(trackbackData.response.list, function(n) {
						for (var i = 0; i < options.exclude.length; i++) {
							if (options.exclude[i] != this.author.nick) {
								tweetHtml += options.callback.call(this, n);
							}
						}
					});

					if (!tweetHtml) {
						tweetHtml = options.noTrackback;

					} else if (options.wrapperTag) {
						tweetHtml = '<' + options.wrapperTag + '>' + tweetHtml + '</' + options.wrapperTag + '>';
					}
				}
				jQuery(self).append(tweetHtml);
			},
			complete: function() {}
		});
	};
})(jQuery);