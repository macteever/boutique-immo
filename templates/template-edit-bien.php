<?php /* Template Name: edit */
   get_header(); ?>

<?php

require get_template_directory().'/biens/Biens_controller.php';

if(!isset($_GET['id']) || !is_numeric($_GET['id'])){
    echo "FATAL ERROR";
    exit();
}

$id = htmlspecialchars($_GET['id']);

$controller = new BiensController();
$bien = $controller->get_by_id($id);

?>
<div class="form">
  <h2 class="pl-40 mt-30 fs-28 mb-20 fw-600">Modifiez votre annonce</h2>
      <form action="<?= get_site_url() ?>/bien-edite?id=<?= $id ?>" method="post">
            <div class="field-wrap">
              <input type="text" name="title" placeholder="Donnez un titre à votre annonce" value="<?= $bien->getTitle() ?>"/>
            </div>
            <div class="d-flex">
              <div class="field-wrap">
                <input type="number" name="surface" placeholder="Surface" required autocomplete="off" value="<?= $bien->getSize() ?>" />
              </div>
              <div class="field-wrap">
                <input type="number" name="bedrooms" placeholder="Nb de chambres" required autocomplete="off" value="<?= $bien->getBedrooms() ?>"/>
              </div>
              <div class="field-wrap">
                <input type="number" name="rooms" placeholder="Pièces" required autocomplete="off"  value="<?= $bien->getRooms() ?>"/>
              </div>
            </div>
            <div class="top-row">
              <div class="field-wrap w-100">
                <input type="text" name="heat" placeholder="Chauffage" value="<?= $bien->getHeat() ?>"/>
              </div>
            </div>
            <div class="top-row">
              <div class="field-wrap">
                <input type="text" name="city" placeholder="Ville"/>
              </div>
              <div class="field-wrap">
                <input type="text" name="place" placeholder="Quartier"/>
              </div>
            </div>
            <div class="field-wrap">
              <input type="text" name="adress" placeholder="Adresse ( si Bordeaux )" value="<?= $bien->getAdress() ?>"/>
            </div>
            <div class="field-wrap">
              <input type="file" name="pictures" placeholder="Importer photos" name="annonceFile">
            </div>
            <div class="field-wrap">
              <input type="number" name="price" placeholder="Prix" required autocomplete="off" value="<?= $bien->getPrice() ?>"/>
            </div>
            <div class="field-wrap">
              <input type="email" name="email" placeholder="Votre mail"/>
            </div>
            <button class="btn-immo fs-18 w-100" name="submit" type="submit" class="button button-block"/>Publier votre bien</button>
          </form>
        </div>
      </div>
<!-- <div id="close-form2">
  <img src="<?php echo get_template_directory_uri(); ?>/assets/img/close-form.svg" alt=""/>
</div> -->

<style>
.form input {
  color: #000;
  border: 1px solid #000;
}
</style>
