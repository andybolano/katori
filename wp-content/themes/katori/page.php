<style>
	.wrapper-page{
		margin: 40px 0;
	}
	.wrapper-page p{
		font-family: var(--secondary-font-regular) !important;
		font-size: 1.1em;
		font-weight: 400;
	}

	.wrapper-page strong{
		font-family: var(--secondary-font-bold) !important;
	}

	.wrapper-page h3{
		font-size: 2em !important;
		margin-bottom: 20px;
	}


</style>

<?php get_header(); ?>

<div class="wrapper-container">
	<div class="container">
				<h2>
					<?php 
					$title = get_post_meta( get_the_ID(), 'titulo', true );
					echo $title;
				?>
				</h2>
			<div class="container wrapper-page" style="margin-left:0;width:100%">
					<div class="row">
						<?php
							while(have_posts()): the_post();
								the_content();
							endwhile;
						?>
					</div>
			</div>
	</div>
</div>

<?php get_footer(); ?>