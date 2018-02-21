<?php

$menu = Router::getMenu("menu_acl");
$language = new Language();

?>

<div class="container-fluid wrapper">
	<header class="website-header main-header">
		<div class="header-top">
			<nav class="navbar">
				<div class="menu-clear">
					<div class="navbar-container">
						<div class="menu-logo">
							<a class="menu-logo-a" href="<?= DEFAULT_URL; ?>"><?= DEFAULT_APP_NAME; ?></a>
						</div>
						
						<div class="collapse">
							<ul class="navbar-nav">

								<?php foreach ($menu as $item => $value) : ?>

									<?php if (!is_array($value)) : ?>

										<li class="nav-item">
											<a class="nav-link" href="<?= $value; ?>"><?= $language->get($item); ?></a>
										</li>

									<?php endif; ?>

								<?php endforeach; ?>

							</ul>
						</div>
					</div>
				</div>
			</nav>
		</div>
	</header>
</div>