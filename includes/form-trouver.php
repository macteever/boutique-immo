<div class="form">
      <ul class="tab-group">
        <li class="tab active uppercase"><a href="#trouverAcheter">Acheter</a></li>
        <li class="tab uppercase"><a href="#trouverLouer">Louer</a></li>
      </ul>
      <div class="tab-content">
        <div id="trouverAcheter">
          <form action="/" method="post">
            <div class="top-row">
              <div class="field-wrap">
                <input type="number" placeholder="Surface" required autocomplete="off" />
              </div>
              <div class="field-wrap">
                <input type="number" placeholder="Nombre de chambres" required autocomplete="off"/>
              </div>
            </div>
            <div class="field-wrap">
              <input type="number" placeholder="Pièces" required autocomplete="off"/>
            </div>
            <div class="field-wrap">
              <input type="text" placeholder="Ville"/>
            </div>
            <div class="field-wrap">
              <input type="text" placeholder="Quartier"/>
            </div>
            <div class="field-wrap">
              <input type="text" placeholder="Adresse ( si Bordeaux )"/>
            </div>
            <div class="field-wrap">
              <input type="file" placeholder="Importer photos" name="annonceFile">
            </div>
            <button class="btn-immo fs-18 w-100" type="submit" class="button button-block"/>Trouver un bien</button>
          </form>
        </div>
        <div id="trouverLouer">
          <form action="/" method="post">
            <div class="top-row">
              <div class="field-wrap">
                <input type="number" placeholder="Surface" required autocomplete="off" />
              </div>
              <div class="field-wrap">
                <input type="number" placeholder="Nombre de chambres" required autocomplete="off"/>
              </div>
            </div>
            <div class="field-wrap">
              <input type="number" placeholder="Pièces" required autocomplete="off"/>
            </div>
            <div class="field-wrap">
              <input type="text" placeholder="Ville"/>
            </div>
            <div class="field-wrap">
              <input type="text" placeholder="Quartier"/>
            </div>
            <div class="field-wrap">
              <input type="text" placeholder="Adresse ( si Bordeaux )"/>
            </div>
            <div class="field-wrap">
              <input type="file" placeholder="Importer photos" name="annonceFile">
            </div>
            <button class="btn-immo fs-18 w-100" type="submit" class="button button-block"/>Trouver un bien</button>
          </form>
        </div>
      </div><!-- tab-content -->
</div> <!-- /form -->
<div id="close-form">
  <img src="<?php echo get_template_directory_uri(); ?>/assets/img/close-form.svg" alt=""/>
</div>