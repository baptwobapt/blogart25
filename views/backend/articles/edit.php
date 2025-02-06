<?php
include '../../../header.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/functions/redirec.php';

if(isset($_GET['numArt'])){
    $numArt = (int)$_GET['numArt'];
    $article = sql_select("ARTICLE", "*", "numArt = $numArt")[0];
    $thematiques = sql_select("THEMATIQUE", "*");
    $keywords = sql_select("MOTCLE", "*");
    $selectedKeywords = sql_select("MOTCLEARTICLE", "*", "numArt = $numArt");
    $numArt = $_GET['numArt'];
    $urlPhotArt = $article['urlPhotArt'];
}
?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Editer un Article</h1>
        </div>
        <div class="col-md-12">
            <!-- Formulaire pour éditer un article -->
            <form action="<?php echo ROOT_URL . '/api/articles/update.php' ?>" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="libTitrArt">Titre</label>
                    <input id="numArt" name="numArt" class="form-control" style="display: none" type="text" value="<?php echo $article['numArt']; ?>" readonly="readonly" />
                    <input id="libTitrArt" name="libTitrArt" class="form-control" type="text" value="<?php echo $article['libTitrArt']; ?>" maxlength="100" required />
                </div>
                
                <div class="form-group">
                    <label for="dtCreaArt">Date de création</label>
                    <input id="dtCreaArt" name="dtCreaArt" class="form-control" type="datetime-local" value="<?php echo $article['dtCreaArt']; ?>" required />
                </div>
                
                <div class="form-group">
                    <label for="libChapoArt">Chapeau</label>
                    <textarea id="libChapoArt" name="libChapoArt" class="form-control" maxlength="500" required><?php echo $article['libChapoArt']; ?></textarea>
                </div>
                
                <div class="form-group">
                    <label for="libAccrochArt">Accroche</label>
                    <input id="libAccrochArt" name="libAccrochArt" class="form-control" type="text" value="<?php echo $article['libAccrochArt']; ?>" maxlength="1000" required />
                </div>
                
                <div class="form-group">
                    <label for="parag1Art">Paragraphe 1</label>
                    <textarea id="parag1Art" name="parag1Art" class="form-control" maxlength="2000" required><?php echo $article['parag1Art']; ?></textarea>
                </div>
                
                <div class="form-group">
                    <label for="libSsTitr1Art">Sous-titre 1</label>
                    <input id="libSsTitr1Art" name="libSsTitr1Art" class="form-control" type="text" value="<?php echo $article['libSsTitr1Art']; ?>" maxlength="1000" required />
                </div>
                
                <div class="form-group">
                    <label for="parag2Art">Paragraphe 2</label>
                    <textarea id="parag2Art" name="parag2Art" class="form-control" maxlength="2000" required><?php echo $article['parag2Art']; ?></textarea>
                </div>
                
                <div class="form-group">
                    <label for="libSsTitr2Art">Sous-titre 2</label>
                    <input id="libSsTitr2Art" name="libSsTitr2Art" class="form-control" type="text" value="<?php echo $article['libSsTitr2Art']; ?>" maxlength="1000" required />
                </div>
                
                <div class="form-group">
                    <label for="parag3Art">Paragraphe 3</label>
                    <textarea id="parag3Art" name="parag3Art" class="form-control" maxlength="2000" required><?php echo $article['parag3Art']; ?></textarea>
                </div>
                
                <div class="form-group">
                    <label for="libConclArt">Conclusion</label>
                    <textarea id="libConclArt" name="libConclArt" class="form-control" maxlength="800" required><?php echo $article['libConclArt']; ?></textarea>
                </div>
                
                <div class="form-group">
                    <label for="image">Image actuelle :</label><br>
                    <img src="<?php echo ROOT_URL . '/src/uploads/' . htmlspecialchars($article['urlPhotArt']); ?>" 
                        alt="Image de l'article" 
                        style="max-width: 200px;">

                    <label for="urlPhotArt"></label>
                    <input type="file" id="urlPhotArt" name="urlPhotArt" class="form-control" 
                        accept=".jpg, .jpeg, .png, .gif" maxlength="80000">

                    <p>>> Extensions acceptées : .jpg, .jpeg, .png, .gif (Taille max : 5 Mo)</p>

                </div>
                
                <div class="form-group">
                    <label for="numThem">Thématique</label>
                    <select id="numThem" name="numThem" class="form-control" required>
                        <option value="">-- Choisissez une thématique --</option>
                        <?php foreach ($thematiques as $thematique) { ?>
                            <option value="<?= $thematique['numThem'] ?>" <?php echo $thematique['numThem'] == $article['numThem'] ? 'selected' : ''; ?>><?= $thematique['libThem'] ?></option>
                        <?php } ?>
                    </select>
                </div>
                
                <div class="form-group">
                    <label>Choisissez les mots-clés liés à l'article :</label>
                    <div class="row">
                        <div class="col-md-5">
                            <select name="addMotCle" id="addMotCle" class="form-control" size="5">
                                <?php
                                $result = sql_select('MOTCLE');
                                foreach ($result as $req) {
                                    echo '<option id="mot" value="' . $req['numMotCle'] . '">' . $req['libMotCle'] . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col-md-5">
                            <select id="newMotCle" name="motCle[]" class="form-control"  size="5" multiple>
                            </select>
                        </div>
                    </div>
                </div>
                
                    <script>
                        const addMotCle = document.getElementById('addMotCle');
                        const newMotCle = document.getElementById('newMotCle');
                        const options = addMotCle.options;
                        const newOptions = newMotCle.options;

                        addMotCle.addEventListener('click', (e) => {
                            if (e.target.tagName !== "OPTION") {
                                return;
                            }
                            e.target.setAttribute('selected', true);+
                            
                            newMotCle.appendChild(e.target);
                        })
                        newMotCle.addEventListener('click', (e) => {
                            console.log(newOptions);
                            if (e.target.tagName !== "OPTION") {
                                return;
                            }
                            e.stopPropagation();
                            e.preventDefault();
                            e.stopImmediatePropagation();
                            e.target.setAttribute('selected', false);
                            addMotCle.appendChild(e.target);
                            for (let option of newMotCle.children){
                                option.setAttribute('selected',true);
                                console.log(option);
                            }
                        });
                    </script>
                </div>
                <div class="form-group mt-2" style="margin: 32px auto 128px;">
                    <button type="submit" class="btn btn-primary ">Confirmer update ?</button>
                </div>
            </form>
        </div>
    </div>
</div>
