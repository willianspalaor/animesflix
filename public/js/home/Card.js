let Card = new (function () {

	function _bindEvents(){

		let _timerCardTrailer;

		$(".card").hover(function(){

			window.clearTimeout(_timerCardTrailer);

			_timerCardTrailer = window.setTimeout(function(){
				_showTrailer();
				_playTrailer();
			}, 2000);

			$(this).addClass("active");
		});

		$(".card").mouseleave(function(){

			window.clearTimeout(_timerCardTrailer);

			_hideTrailer();
			_pauseTrailer();
			_resetCards();

			$(this).removeClass("active");
		});

		$(".card-info").click(function(){
			_extendCard();
		});

		$(".volume-control").click(function(){
			_controlVolume($(this).parent());
		});
	}

	function _extendCard(element){
		$(".card.active").addClass("extended");
	}

	function _showTrailer(){
		$(".card.active").find(".card-img").hide();
		$(".card.active").find(".card-video").show();
	}

	function _hideTrailer(){
		$(".card").find(".card-video").hide();
		$(".card").find(".card-img").show();
	}

	function _playTrailer(){

		let card = $(".card.active").find(".card-video");
		let video = $(".card.active").find(".card-video").find("video");

		if(video[0] != undefined){

			video[0].muted = true;
			video[0].play();

			/*var promise = video[0].play();

			if (promise !== undefined) {
			    promise.then(_ => {
			        video[0].muted = false; _showVolumeUpIcon(card);
			    }).catch(error => {
			        video[0].muted = true;
					video[0].play();
			    });
			}*/
		}
	}

	function _pauseTrailer(){

		let videos = $(".card").find(".card-video").find("video");

		videos.each(function(index, video){
			video.pause();
		});
	}

	function _controlVolume(element){

		let video = $(element).find("video")

		if(video[0] == undefined){
			return;
		}

		if(video[0].paused){
			return;
		}

		if(video[0].muted){
			video[0].muted = false; _showVolumeUpIcon(element);
		}else{
			video[0].muted = true; _showVolumeMuteIcon(element);
		}
	}

	function _showVolumeUpIcon(element){
		$(element).find(".volume-up").show();
		$(element).find(".volume-mute").hide();
	}

	function _showVolumeMuteIcon(element){
		$(element).find(".volume-mute").show();
		$(element).find(".volume-up").hide();
	}

	function _resetCards(){

		$(".volume-mute").show();
		$(".volume-up").hide();
		$(".card").removeClass("active");
		$(".card").removeClass("extended");
	}

    return {
    	bindEvents : _bindEvents,
    	showTrailer : _showTrailer,
        hideTrailer : _hideTrailer,
        playTrailer : _playTrailer,
        pauseTrailer : _pauseTrailer,
        controlVolume : _controlVolume,
        showVolumeUpIcon : _showVolumeUpIcon,
        showVolumeMuteIcon : _showVolumeMuteIcon,
        resetCards : _resetCards
    }

});