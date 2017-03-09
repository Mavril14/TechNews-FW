<?php

    $this->layout('layout', ['title' => 'TechNews | '.ucfirst($categorie), 'current' => ""]);
    use Model\Shortcut;
    $this->start('contenu');
?>
    <!-- Make sure the path to CKEditor is correct. -->
    <div class="row">
        <!--colleft-->
        <div class="col-md-8 col-sm-12">
        <form method="post" action="<?=$this->url("default_addArticle")?>" enctype="multipart/form-data">
            <label>Titre Article</label>
            <br>
            <input name="title" type="text" />
            <br>
            <label>Categorie</label>
            <br>
            <?php //debug($categories4form)?>
            <select name="categorie">
                <?php foreach($categories4form as $categorie) : ?>

                    <option value="<?= $categorie->IDCATEGORIE ?>">
                        <?= $categorie->LIBELLECATEGORIE ?>
                    </option>
                    <?php endforeach; ?>
            </select>
            <br>
            <label>Article spéciale ?</label>
            <br>
            <input type="radio" name="special" value="1" checked> Oui
            <br>
            <input type="radio" name="special" value="0"> Non
            <br>
            <label>Article en spotlight ?</label>
            <br>
            <input type="radio" name="spotlight" value="1" checked> Oui
            <br>
            <input type="radio" name="spotlight" value="0"> Non
            <br>
            <input type="hidden" name="auteur" value="2" />
            <br>
            <span>Uploader Photo</span>
            <input type="file" name="image" />
            <br>
            <textarea name="message" rows="25" cols="80" id="ckeditor"></textarea>
            <script>
                // Replace the <textarea id="editor1"> with a CKEditor
                // instance, using default configuration.
                CKEDITOR.replace( 'ckeditor' );
            </script>
            <button type="submit"> Envoyer </button>

        </form>
      </div>

    <?php $this->stop('contenu'); ?>
