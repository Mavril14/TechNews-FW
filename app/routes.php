<?php

	$w_routes = array(
	    # Accueil
		['GET', '/', 'Default#home', 'default_home'],
		['GET', '/accueil.html', 'Default#home', 'default_accueil'],

	    # Route pour Afficher les Articles d'une Cat�gorie
		['GET', '/news/[:categorie]', 'Default#categorie', 'default_categorie'],

	    # Route pour Afficher un Article
		['GET', '/article/[i:id]-[:slug].html', 'Default#article', 'default_article'],
		['GET', '/article/edit', 'Article#editArticle', 'default_editArticle'],
		['POST', '/article/add', 'Article#addArticle', 'default_addArticle'],
		['POST', '/newsletter/add', 'Newsletter#addToNewsletter', 'default_addToNewsletter'],
		['POST', '/admin/connexion', 'Admin#connexion', 'admin_connexion']



	);
