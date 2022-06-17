<div class="container comments-container my-5">
	<div class="row row-head mb-3 d-flex justify-content-between">
		<h4>Comments</h4>
		<?php if (isset($_SESSION["login"]))
		{ ?>
			<!-- Button trigger add comment modal -->
			<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addCommentPopup">
				Add Comment+
			</button>

			<!-- Add comment modal -->
			<div class="modal fade" id="addCommentPopup" data-bs-backdrop="static" data-bs-keyboard="false"
			     tabindex="-1" aria-labelledby="addCommentPopupLabel" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="addCommentPopupLabel">Modal title</h5>
							<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
						<div class="modal-body">
							<form onsubmit="return false">
								<textarea class="form-control" rows="5" name="login"
								          placeholder="Write a comment here..." id="add-comment-textarea" required></textarea>
								<button type="submit" id="submit-comment-btn" class="btn btn-primary mt-3"
								        style="float: right">Add
								</button>

							</form>
						</div>
					</div>
				</div>
			</div>
			<?php
		} ?>
	</div>
	<div id="comments-list-home">
		<?php foreach ($comments as $comment)
		{ ?>
			<div class="card mb-4">
				<div class="card-body">
					<div class="d-flex justify-content-between">
						<div class="d-flex flex-row align-items-center">
							<p class="small fw-bold" id="card-login-home-btm"><?= $comment["login"]; ?></p>
						</div>
						<div class="d-flex flex-row align-items-center">
							<p class="small text-muted mb-0" id="card-date-home-btm"><?= $comment["date"]; ?></p>
						</div>
					</div>
					<p id="card-body-home-btm"><?= $comment["body"]; ?></p>
				</div>
			</div>
			<?php
		} ?>
	</div>

</div>
