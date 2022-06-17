<div class="container mt-5 mb-2">
	<div class="slider-container">
		<?php foreach ($sliderComments as $sliderComment)
		{ ?>
			<div>
				<div class="card mb-4">
					<div class="card-body">
						<div class="d-flex justify-content-between">
							<div class="d-flex flex-row align-items-center">
								<p class="small fw-bold"><?= $sliderComment["login"]; ?></p>
							</div>
							<div class="d-flex flex-row align-items-center">
								<p class="small text-muted mb-0"><?= $sliderComment["date"]; ?></p>
							</div>
						</div>
						<p><?= $sliderComment["body"]; ?></p>
					</div>
				</div>
			</div>
			<?php
		} ?>
	</div>
</div>