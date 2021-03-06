<?php
$entries = get_post_meta( get_the_ID(), '_cmbdigitalimg_digitalimage', true );

foreach ( (array) $entries as $key => $entry ) {

    $imgtitle = $imgdescription = $image = '';

    if ( isset( $entry['imgtitle'] ) )
        $imgtitle = esc_html( $entry['imgtitle'] );

    if ( isset( $entry['imgdescription'] ) )
        $imgdescription = esc_html( $entry['imgdescription'] );

    if ( isset( $entry['image'] ) )
        $image = esc_html( $entry['image']);

	if ($key == 0) {
		if($image == '') {} else {
?>

					<div class="dg">

						<?php
						$entries = get_post_meta( get_the_ID(), '_cmbdigitalimg_digitalimage', true );

						foreach ( (array) $entries as $key => $entry ) {

						    $imgtitle = $imgdescription = $image = '';

						    if ( isset( $entry['imgtitle'] ) )
						        $imgtitle = esc_html( $entry['imgtitle'] );

						    if ( isset( $entry['imgdescription'] ) )
						        $imgdescription = $entry['imgdescription'];

						    if ( isset( $entry['image'] ) )
						        $image = esc_html( $entry['image']);

						?>

						<div class="image" itemscope itemtype="http://schema.org/ImageObject">

							<span id="imageTitle" itemprop="name"><?php echo $imgtitle; ?></span>

							<img src="<?php echo $image; ?>"  class="scale-with-grid" alt="<?php echo $imgtitle; ?>" itemprop="contentURL" />

							<p class="desc" itemprop="description"><?php echo $imgdescription; ?></p>

						</div>

						<?php } ?>

					</div>

<?php
		}
	}
}
?>