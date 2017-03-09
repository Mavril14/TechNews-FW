<?php
    $this->start('contenu');
?>
    <!-- Make sure the path to CKEditor is correct. -->
    <script src="https://cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
    <div>
        <form method="post">
            <label>Titre Article</label>
            <br>
            <input name="TITREARTICLE" type="text" />
            <br>
            <label>Categorie</label>
            <br>
            <select>
                <?php foreach($categories4form as $categorie) : ?>
                    <option value="<?= $categorie['LIBELLECATEGORIE'] ?>">
                        <?= $categorie['LIBELLECATEGORIE'] ?>
                    </option>
                    <?php endforeach; ?>
            </select>
            <br>
            <label>Article spéciale ?</label>
            <br>
            <input type="radio" name="SPECIALARTICLE" value="1" checked> Oui
            <br>
            <input type="radio" name="SPECIALARTICLE" value="0"> Non
            <br>
            <label>Article en spotlight ?</label>
            <br>
            <input type="radio" name="SPOTLIGHTARTICLE" value="1" checked> Oui
            <br>
            <input type="radio" name="SPOTLIGHTARTICLE" value="0"> Non
            <br>
            <label>Votre nom :</label>
            <br>
            <input type="hidden" name="IDAUTEUR" value="2" />
            <br>
            <input type="file" name="FEATUREDIMAGEARTICLE" /> <span>Uploader Photo</span>
            <br>
            <button type="submit"> Envoyer </button>
        </form>
    </div>
    <?php $this->stop('contenu'); ?>