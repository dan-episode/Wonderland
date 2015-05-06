<?php
$swfentries = get_post_meta( get_the_ID(), '_cmbdigitalswf_digitalswf', true );

foreach ( (array) $swfentries as $key => $swfentry ) {

	$swftitle = $swfdescription = $swfwidth = $swfheight = $swf = '';

	if ( isset( $swfentry['swftitle'] ) )
		$swftitle = esc_html( $swfentry['swftitle'] );

	if ( isset( $swfentry['swfdescription'] ) )
		$swfdescription = esc_html( $swfentry['swfdescription'] );

	if ( isset( $swfentry['swfwidth'] ) )
		$swfwidth = esc_html( $swfentry['swfwidth'] );

	if ( isset( $swfentry['swfheight'] ) )
		$swfheight = esc_html( $swfentry['swfheight'] );

	if ( isset( $swfentry['swf'] ) )
		$swf = esc_html( $swfentry['swf']);

	if ($key == 0) {
		if($swf == '') {} else {
?>

					<div class="dg">

						<div class="line-break"></div>

						<div class="flashPlay">

							<div class="flashBanner">

								<?php
								$swfentries = get_post_meta( get_the_ID(), '_cmbdigitalswf_digitalswf', true );

								foreach ( (array) $swfentries as $key => $swfentry ) {

									$swftitle = $swfdescription = $swfwidth = $swfheight = $swf = '';

									if ( isset( $swfentry['swftitle'] ) )
										$swftitle = esc_html( $swfentry['swftitle'] );

									if ( isset( $swfentry['swfdescription'] ) )
										$swfdescription = esc_html( $swfentry['swfdescription'] );

									if ( isset( $swfentry['swfwidth'] ) )
										$swfwidth = esc_html( $swfentry['swfwidth'] );

									if ( isset( $swfentry['swfheight'] ) )
										$swfheight = esc_html( $swfentry['swfheight'] );

									if ( isset( $swfentry['swf'] ) )
										$swf = esc_html( $swfentry['swf']);

									if ($key == 0) {
										if($swf == '') {} else {
								?>

								<div id="flashBanner" itemprop="video" itemscope itemtype="http://schema.org/VideoObject">

									<div id="flashFail">

										<p>Sorry, this content needs the <a href="http://get.adobe.com/flashplayer/" target="_blank">Flash plugin</a> to be viewed.</p>

										<p>If viewing this on a mobile or tablet device please visit the site on desktop to see this content in full.</p>

									</div>

								</div>
								<span id="videoTitle" itemprop="name"><?php echo $swfTitle; ?></span>
								<meta itemprop="thumbnailUrl" content="" />
								<p class="desc" itemprop="description"><?php echo $swfdescription; ?></p>
								<script>
								$(function() {
									$('#flashBanner').flash({
										swf: '<?php echo $swf; ?>',
										width: '<?php echo $swfwidth; ?>',
										height: '<?php echo $swfheight; ?>'
									});
								});
								</script>
								<?php
										}
									}
								}
								?>
							</div>

							<?php
								$swfentries = get_post_meta( get_the_ID(), '_cmbdigitalswf_digitalswf', true );
								$count++;
								foreach ( (array) $swfentries as $swfentry ) {
									if ($count++ > 1)   {
							?>

							<div class="additional flashbanner">

								<h2>Additional formats</h2>
								<p>
							<?php
									break;
									}
								}
							?>
								<?php
									$swfentries = get_post_meta( get_the_ID(), '_cmbdigitalswf_digitalswf', true );

									foreach ( (array) $swfentries as $key => $swfentry ) {

										$swftitle = $swfdescription = $swfwidth = $swfheight = $swf = '';

										if ( isset( $swfentry['swftitle'] ) )
											$swftitle = esc_html( $swfentry['swftitle'] );

										if ( isset( $swfentry['swfdescription'] ) )
											$swfdescription = esc_html( $swfentry['swfdescription'] );

										if ( isset( $swfentry['swfwidth'] ) )
											$swfwidth = esc_html( $swfentry['swfwidth'] );

										if ( isset( $swfentry['swfheight'] ) )
											$swfheight = esc_html( $swfentry['swfheight'] );

										if ( isset( $swfentry['swf'] ) )
											$swf = esc_html( $swfentry['swf']);

								?>

									<a class="selector" data-title="<?php echo $swftitle; ?>" data-swf="<?php echo $swf; ?>" data-description="<?php echo $swfdescription; ?>" data-width="<?php echo $swfwidth; ?>" data-height="<?php echo $swfheight; ?>"><?php echo $swftitle; ?></a>

								<?php
									}
								?>
							<?php
								$swfentries = get_post_meta( get_the_ID(), '_cmbdigitalswf_digitalswf', true );
								$count++;
								foreach ( (array) $swfentries as $swfentry ) {
									if ($count++ > 1)   {
							?>
								</p>
							</div>
							<?php
									break;
									}
								}
							?>

						</div>

					</div>

					<script>
					$(function() {
						$('.selector').first().addClass('selected');
						$('.dg').on('click', '.selector', function(e){
							e.preventDefault();
							$('.selector').removeClass('selected');
							$('#flashObject').empty();
							$(this).addClass('selected');
						var $swfTitle 	= $(this).data('title'),
							$swf		= $(this).data('swf'),
							$desc		= $(this).data('description'),
							$width		= $(this).data('width'),
							$height		= $(this).data('height');
						if($(this).data('swf$=".html')){
							window.open($swf, '_blank');
						} else {
							$('#flashBanner').flash({
								swf: $swf,
								width: $width,
								height: $height
							});
						}
						$('.flashBanner .desc').html($desc);
						});
					});
					</script>

<?php
		}
	}
}
?>