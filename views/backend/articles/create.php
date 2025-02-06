<?php
include '../../../header.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/functions/redirec.php';

// Récupération des thématiques et mots-clés disponibles
$thematiques = sql_select("THEMATIQUE", "*");
$keywords = sql_select("MOTCLE", "*");
$keywordsart = sql_select("MOTCLEARTICLE", "*");
?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Création Nouvel Article</h1>
        </div>
        <div class="col-md-12">
            <form action="<?php echo ROOT_URL . '/api/articles/create.php'; ?>" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="libTitrArt">Titre</label>
                    <input id="libTitrArt" name="libTitrArt" class="form-control" type="text" placeholder="100 caractères max" maxlength="100" required />
                </div>

                <div class="form-group">
                    <label for="dtCreaArt">Date de création</label>
                    <input id="dtCreaArt" name="dtCreaArt" class="form-control" type="datetime-local" required />
                </div>

                <div class="form-group">
                    <label for="libChapoArt">Chapeau</label>
                    <textarea id="libChapoArt" name="libChapoArt" class="form-control" maxlength="500" placeholder="500 caractères max" style='height: 70px;'  required></textarea>
                </div>

                <div class="form-group">
                    <label for="libAccrochArt">Accroche</label>
                    <input id="libAccrochArt" name="libAccrochArt" class="form-control" type="text" placeholder="100 caractères max" maxlength="100" required />
                </div>

                <div class="form-group">
                    <label for="parag1Art">Paragraphe 1</label>
                    <textarea id="parag1Art" name="parag1Art" class="form-control" placeholder="1200 caractères max" style='height: 300px;' maxlength="1200" required></textarea>
                </div>

                <div class="form-group">
                    <label for="libSsTitr1Art">Sous-titre 1</label>
                    <input id="libSsTitr1Art" name="libSsTitr1Art" class="form-control" type="text" placeholder="100 caractères max"  maxlength="100" required />
                </div>

                <div class="form-group">
                    <label for="parag2Art">Paragraphe 2</label>
                    <textarea id="parag2Art" name="parag2Art" class="form-control" placeholder="1200 caractères max" style='height: 300px;' maxlength="1200" required></textarea>
                </div>

                <div class="form-group">
                    <label for="libSsTitr2Art">Sous-titre 2 </label>
                    <input id="libSsTitr2Art" name="libSsTitr2Art" class="form-control" type="text" placeholder="100 caractères max" maxlength="100" required />
                </div>

                <div class="form-group">
                    <label for="parag3Art">Paragraphe 3</label>
                    <textarea id="parag3Art" name="parag3Art" class="form-control" placeholder="1200 caractères max" style='height: 300px;' maxlength="1200" required></textarea>
                </div>

                <div class="form-group">
                    <label for="libConclArt">Conclusion</label>
                    <textarea id="libConclArt" name="libConclArt" class="form-control" placeholder="800 caractères max" style='height: 200px;' maxlength="800" required></textarea>
                </div>

                <div class="form-group">
                <label for="urlPhotArt">Choisir une image :</label>
                    <input type="file" id="urlPhotArt" name="urlPhotArt" class="form-control" accept=".jpg, .jpeg, .png, .gif" maxlength="80000" width="80000" height="80000" size="200000000000">

                    <p>>> Extension des images acceptées : .jpg, .gif, .png, .jpeg (lageur, hauteur, taille max : 80000px, 80000px, 200 000 Go)</p>
                </div>

                <div class="form-group">
                    <label for="numThem">Thématique</label>
                    <select id="numThem" name="numThem" class="form-control" required>
                        <option value="">-- Choisissez une thématique --</option>
                        <?php foreach ($thematiques as $thematique) { ?>
                            <option value="<?= $thematique['numThem'] ?>"><?= $thematique['libThem'] ?></option>
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
                    </select>
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
                <br>
                <div class="form-group mt-2" style="margin: 32px auto 128px;">
                    <button type="submit" class="btn btn-primary ">Confirmer create ?</button>
                </div>
            </form>
        </div>
    </div>
</div>

