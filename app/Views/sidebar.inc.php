<?php
    use Model\Shortcut; ?>
<!--colright-->
<div class="col-md-4 col-sm-12">
	<!--tab popular-->
	<ul role="tablist" class="tab-popular">
		<li class="active">
			<a href="#tab1" role="tab" data-toggle="tab">
				DERNI&Egrave;RE PUBLICATIONS
			</a>
		</li>
	</ul>
	<div class="tab-content">
		<div role="tabpanel" class="tab-pane active" id="tab1">
			<ul class="list-news-popular">
				<?php foreach ($lastFiveArticles as $lastFiveArticle) : ?>
				<li>
					<a href="<?= $this->url('default_article', ['id' => $lastFiveArticle->IDARTICLE, 'slug' => Shortcut::generateSlug($lastFiveArticle->TITREARTICLE)]); ?>">
						<img alt="" src="<?= $this->assetUrl('/images/product/'.$lastFiveArticle->FEATUREDIMAGEARTICLE); ?>">
					</a>
					<h3><a href="<?= $this->url('default_article', ['id' => $lastFiveArticle->IDARTICLE, 'slug' => Shortcut::generateSlug($lastFiveArticle->TITREARTICLE)]); ?>"><?= $lastFiveArticle->TITREARTICLE; ?></a></h3>
					<div class="meta-post">
						<a href="#">
							<?= $lastFiveArticle->PRENOMAUTEUR; ?> <?= $lastFiveArticle->NOMAUTEUR; ?>
						</a>
						<em></em>
						<span>
							<?= $lastFiveArticle->DATECREATIONARTICLE; ?>
						</span>
					</div>
				</li>
				<?php endforeach; ?>
			</ul>

		</div>
	</div>

	<!-- subcribe box-->
	<div class="subcribe-box">
		<h3>NEWSLETTER</h3>
		<p id="subscription">Inscrivez-vous pour recevoir nos dernières publications.</p>
      <input type="email" id="email" placeholder="Votre Email..." />
      <button class="my-btn" id="addToNewsletter">Je m'inscris</button>

	</div>
	<!-- connect us-->
	<div class="connect-us">
		<div class="widget-title">
			<span>
				SUIVEZ-NOUS
			</span>
		</div>
		<ul class="list-social-icon">
			<li>
				<a href="#" class="facebook">
					<i class="fa fa-facebook"></i>
				</a>
			</li>
			<li>
				<a href="#" class="twitter">
					<i class="fa fa-twitter"></i>
				</a>
			</li>
			<li>
				<a href="#" class="google">
					<i class="fa fa-google"></i>
				</a>
			</li>
			<li>
				<a href="#" class="youtube">
					<i class="fa fa-youtube-play"></i>
				</a>
			</li>
			<li>
				<a href="#" class="pinterest">
					<i class="fa fa-pinterest-p"></i>
				</a>
			</li>
			<li>
				<a href="#" class="rss">
					<i class="fa fa-rss"></i>
				</a>
			</li>
		</ul>
	</div>

	<!-- special post-->
	<div class="connect-us">
		<div class="widget-title">
			<span>
				En Avant
			</span>
		</div>
		<div class="list-special">
		<?php foreach ($specialArticles as $article) : ?>
			<article class="news-two-large">
				<a href="<?= $this->url('default_article', ['id' => $article->IDARTICLE, 'slug' => Shortcut::generateSlug($article->TITREARTICLE)]); ?>">
					<img alt="" src="<?= $this->assetUrl('/images/product/'.$article->FEATUREDIMAGEARTICLE); ?>">
				</a>
				<h3><a href="<?= $this->url('default_article', ['id' => $article->IDARTICLE, 'slug' => Shortcut::generateSlug($article->TITREARTICLE)]); ?>"><?= $article->TITREARTICLE; ?></a></h3>
				<div class="meta-post">
					<a href="#">
						<?= $article->PRENOMAUTEUR; ?> <?= $article->NOMAUTEUR; ?>
					</a>
					<em></em>
					<span>
						<?= $article->DATECREATIONARTICLE; ?>
					</span>
				</div>
			</article>
		<?php endforeach; ?>
		</div>
	</div>
</div>
