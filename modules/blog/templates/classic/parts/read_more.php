<?php if ( ! defined( 'ABSPATH' ) ) { exit; } ?>

<?php
	if( $archive_readmore_text != '' ) :
		echo '<!-- Entry Button --><div class="entry-button wdt-core-button">';
			echo '<a href="'.get_permalink().'" title="'.the_title_attribute('echo=0').'" class="wdt-button">'.$archive_readmore_text.'<span><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 20.1 20.1" style="enable-background:new 0 0 20.1 20.1;" xml:space="preserve"><g><polygon points="3.1,0 3.1,2 18.1,2 18.1,17 20.1,17 20.1,0"/><rect x="-1.7" y="12.5" transform="matrix(0.7071 -0.7071 0.7071 0.7071 -7.5819 8.6341)" width="16.8" height="2"/></g></svg></span></a>';
		echo '</div><!-- Entry Button -->';
	endif; ?>