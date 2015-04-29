					<div class="dg">

						<div class="line-break"></div>

						<h3>Digital</h3><a class="anchor" id="digital"></a>

						<?php
						$entries = get_post_meta( get_the_ID(), '_cmbdigitalimg_digital', true );

						foreach ( (array) $entries as $key => $entry ) {

						    $imgtitle = $imgdescription = $image = '';

						    if ( isset( $entry['imgtitle'] ) )
						        $imgtitle = esc_html( $entry['imgtitle'] );

						    if ( isset( $entry['imgdescription'] ) )
						        $imgdescription = esc_html( $entry['imgdescription'] );

						    if ( isset( $entry['image'] ) )
						        $image = esc_html( $entry['image']);

						?>

						<div class="image">

							<img src="<?php echo $image; ?>" class="scale-with-grid" alt="<?php echo $imgtitle; ?>"/>

							<p class="desc"><?php echo $imgdescription; ?></p>

						</div>

						<?php } ?>

					</div>