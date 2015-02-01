<?php

/*****************************

* Display Functions

*****************************/

//[foobar]
function modal_media_func( $atts, $content = null ) {
    global $mediamodal_options;
    $image = plugin_dir_url( __FILE__ ) . 'img/mm-placeholder-730x456.jpg';
    $a = shortcode_atts( array(
        'mediatype' => 'video',
        'audioplayer' => 'plain',
        'audiotitle' => '',
        'audiofull' => 'no',        
        'mm_title' => '',
        'button_text' => 'Click Here',
        'img_src' => '',
        'src' => '#',
        'button_color' => '',
        'text_color' => '',
        'modal' => 'enable',
        'modal_btn' => 'enable',
        'image_as_btn' => 'disabled',
        'autoplay' => 'disabled',
    ), $atts );
	ob_start();
	?>
        <?php if($a['modal_btn'] == 'disable'): ?>
            <?php if($a['src'] == '#' || $a['src'] == ''): ?>
                <div class="mm-clearfix"></div><p>Media source (src) is empty. Please provide a valid path.</p>
            <?php else: ?>
                <div class="mm-clearfix"></div>
                <?php if($a['image_as_btn'] == 'enable'): ?>
                    <?php if($a['img_src'] == ''): ?>
                        <a href="#" data-src="<?php echo $a['src']; ?>" class="mm-btn" title="<?php echo ($a['mm_title'] != '' ? substr($a['mm_title'], 0, 30) : 'Media Modal' ); ?>">
                            <img src="<?php echo $image; ?>" title="<?php echo ($a['mm_title'] != '' ? substr($a['mm_title'], 0, 30) : 'media-modal-image' ); ?>">
                        </a>
                    <?php else: ?>
                        <a href="#" data-src="<?php echo $a['src']; ?>" class="mm-btn" title="<?php echo ($a['mm_title'] != '' ? substr($a['mm_title'], 0, 30) : 'Media Modal' ); ?>">
                            <img src="<?php echo $a['img_src']; ?>" title="<?php echo ($a['mm_title'] != '' ? substr($a['mm_title'], 0, 30) : 'media-modal-image' ); ?>">
                        </a>                
                    <?php endif; ?>
                <?php else: ?>
                    <?php
                        if ($a['mediatype'] == 'mp3') {
                            filterAudio($a);
                        } else {
                            filterVid($a['src']);
                        }
                    ?>
                <?php endif; ?>

            <?php endif; ?>
        <?php else: ?>
		<div class="mm-clearfix"></div>
		<a href="#" data-src="<?php echo $a['src']; ?>" style="background-color: <?php echo ($a['button_color'] == '' ? $mediamodal_options['modalButtonColor'] : $a['button_color']); ?> !important;color: <?php echo ($a['text_color'] == '' ? $mediamodal_options['modalButtonTextColor'] : $a['text_color']); ?> !important;" class="btn mm-btn <?php echo ($a['mediatype'] == 'audio' ? 'media-audio' : 'media-video' ); ?>" title="<?php echo ($a['mm_title'] != '' ? substr($a['mm_title'], 0, 30) : 'Media Modal' ); ?>"><?php echo $a['button_text']; ?></a>
        <?php endif; ?> <?PHP
	return ob_get_clean();
}

add_shortcode( 'mediamodal', 'modal_media_func' );

function filterVid($vidSrc){

    $url = $vidSrc;
    $parse = parse_url($url);
    $i = $parse['host'];

    switch ($i) {
        case 'www.youtube.com':
            $stripSrc = explode('=', $url);
            $goPlay = 0;
            if ($a['autoplay'] == 'enable') {
                $goPlay = 1;
            }
            echo '<iframe src="http://www.youtube.com/embed/'.$stripSrc[1].'?rel=1&amp;autoplay='.$goPlay.'" width="560" height="345" frameborder="no"></iframe>';
            break;
        case 'vimeo.com':
            $stripSrc = explode('/', $url);;
            echo '<iframe src="//player.vimeo.com/video/'.$stripSrc[3].'" width="605" height="325" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>';
            break;
        case 'www.metacafe.com':
            $stripSrc = explode('/', $url);
            echo '<iframe src="http://www.metacafe.com/embed/'.$stripSrc[4].'" width="605" height="345" allowFullScreen frameborder=0></iframe>';
            break; 
        case 'www.dailymotion.com':
            $stripSrc = explode('/', $url);
            $strippedMore = explode('_', $stripSrc[4]);
            echo '<iframe frameborder="0" width="605" height="345" src="//www.dailymotion.com/embed/video/'.$strippedMore[0].'" allowfullscreen></iframe>';
            break;
        default:
            echo 'This video link is not supported. This version only support links from youtube, vimeo, metacafe and dailymotion. See <a href="http://mediamodal.jumpstartcreatives.com/">Docs.';
            break;
    }  
}

function filterAudio($audioSrc){

    $url = $audioSrc['src'];
    $mp3 = strpos($url, '.mp3');
    $wav = strpos($url, '.wav');

    if ($mp3 || $wav) {
        if ($audioSrc['audioplayer'] == 'plain') {
            echo '<div class="plain-audio-player">'.($audioSrc['audiotitle'] != "" ? "<p class='audio-title'>".$audioSrc['audiotitle']."</p>" : "").'<audio controls="controls" '.($audioSrc['audiofull'] == "yes" ? "style='width:100%;'" : "").'><source src="'.$url.'" type="audio/'.($mp3 == true ? "mpeg" : "wav" ) .'">Your browser does not support the audio element.</audio></div>';
        } else {

        }
    } else {
        echo 'This audio link is not supported. This version only supports mp3 and wav formats. See <a href="http://mediamodal.jumpstartcreatives.com/">Docs.';
    }
    
}

function mm_modal($content){
    
    global $mediamodal_options;
    if(is_singular()) {
        $content .= '<div id="mediamodal_setup" data-mm-color="'.$mediamodal_options['modalColor'].'" data-mm-text-color="'.$mediamodal_options['modalTextColor'].'" data-mm-height="'.$mediamodal_options['modalHeight'].'" data-mm-width="'.$mediamodal_options['modalWidth'].'" data-padding="'.$mediamodal_options['disablePadding'].'"></div>';
    }
    return $content;
}

add_filter('the_content', 'mm_modal');