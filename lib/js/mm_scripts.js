jQuery(document).ready(function($){

	//Init load modal
	jQuery('body').append('<div class="modal" id="mm_modal" aria-hidden="false"><div class="modal-dialog"> <div class="modal-content"><div class="modal-header"><button type="button" class="close" data-dismiss="modal">×</button><h4 class="modal-title">Media Modal</h4></div><div class="modal-body"></div></div></div></div>');

	//Vars
	var mm_modal =  $('#mm_modal');
	var modalBody = mm_modal.find('.modal-body');

	$(document).on('click', '.mm-btn', function(e){
		e.preventDefault();
		var dis = $(this);
		var target = dis.attr('data-src');
		configModal();
		
		if (target == '' || target == '#') {
			alert('Video or Image source is not provided');
		} else {
			toggleBackdrop('show');
			var src = '';
			if (target.indexOf('youtube') > 0) {
				var stripSrc = target.substr(target.indexOf("=") + 1);
				src = '<iframe src="http://www.youtube.com/embed/'+stripSrc+'?rel=1&amp;autoplay=1" width="560" height="345" frameborder="no"></iframe>'
			} else if (target.indexOf('vimeo') > 0) {
				var stripSrc = target.substr(target.lastIndexOf("/") + 1);
				src = '<iframe src="//player.vimeo.com/video/'+stripSrc+'" width="605" height="325" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>';
			} else if (target.indexOf('metacafe') > 0) {
				var lastString = target.substr(target.lastIndexOf("/") + 1);
				var stripSrc = target.substr(target.indexOf("watch") + 6);
				var strippedNa = stripSrc.replace(lastString, '');
				var strippedTalaga = strippedNa.replace('/', '');
				src = '<iframe src="http://www.metacafe.com/embed/'+strippedTalaga+'" width="605" height="345" allowFullScreen frameborder=0></iframe>'
			} else if (target.indexOf('dailymotion') > 0) {
				var lastString = target.substr(target.lastIndexOf("/") + 1);
				var stripSrc = lastString.substr(lastString.indexOf("_"));
				var strippedNa = lastString.replace(stripSrc, '');
				var strippedTalaga = strippedNa.replace('/', '');
				src = '<iframe frameborder="0" width="605" height="345" src="//www.dailymotion.com/embed/video/'+strippedTalaga+'" allowfullscreen></iframe>'
			} else {
				src = '<h3 style="text-align:center;">This video link is not supported. This version only support links from youtube, vimeo, metacafe and dailymotion. Try MediaModal Pro.</h3>'
			}

			$(modalBody).append(src);
			mm_modal.addClass('in').fadeIn();			

		}
		
	});

	configModal = function() {

		var mmod = $(document).find('#mm_modal');
		var modSetup = $('#mediamodal_setup');

		var modColor = modSetup.attr('data-mm-color');
		var modTxt = modSetup.attr('data-mm-text-color');
		var modH = modSetup.attr('data-mm-height');
		var modW = modSetup.attr('data-mm-width');
		var modPad = modSetup.attr('data-padding');

		if (mmod.hasClass('configDone') == false) {
			if (modColor != '') {
				mmod.find('.modal-content').attr('style', 'background-color:'+modColor+';');	
			}
			if (modTxt != '') {
				mmod.find('.modal-title').attr('style','color:'+modTxt+';');
			}
			if (modH != '') {
				mmod.find('.modal-dialog').attr('style', 'width: '+modW+'px');	
			}
			if (modW != '') {
				mmod.find('.modal-body').attr('style', 'height: '+modH+'px;');	
			}
			if (modPad == 1) {
				mmod.find('.modal-body').addClass('nopad');
			} 		
			mmod.addClass('configDone');
		}

	};

	toggleBackdrop = function(t) {
			
		if(t == 'show') {
			if(jQuery(document).find('.modal-backdrop').html() == undefined) {
				jQuery('body').append('<div class="modal-backdrop in"></div>');
			}
		}
		else {
			jQuery('body .modal-backdrop').remove();
		}
	};
	
	closeAll = function(){
		var target = jQuery(document).find('.modal');
		if(target.hasClass('in')){			
			toggleBackdrop('hide');
		}	
	}

	jQuery('[data-toggle="modal"]').click(function(e){
		
		e.preventDefault();
		var dis = jQuery(this);
		var target = dis.attr('href');
		
		jQuery(document).find(''+target+'').addClass('in').fadeIn();
		toggleBackdrop('show');
		
	});
	
	jQuery('[data-dismiss="modal"]').click(function(e){
	
		e.preventDefault();
		closeAll();
		jQuery(this).closest('.modal').find('.modal-body').html('');
		
	});
	
});


