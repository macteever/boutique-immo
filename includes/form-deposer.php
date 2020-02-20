
  <section id="post-estate">
      <div class="d-flex justify-content-end mb-30">
          <button class="modal-close btn-immo">Fermer</button>
      </div>
      <form enctype="multipart/form-data" action="<?= get_site_url() ?>/annonce-confirmee" method="post">
          <div class="d-flex justify-content-between post-estate-cat-parent">
              <div class="d-flex flex-column">
                  <h3 class="fs-18 fw-600 mb-20">Choisissez la catégorie :</h3>
                  <label for="rent" class="text-grey fs-15">Catégorie</label>
                  <select name="rent">
                      <option value="rent">Location</option>
                      <option value="sale">Vente</option>
                  </select>
              </div>
              <div class="d-flex w-100 justify-content-end post-estate-cat">
                  <div class="form-radio p-relative user-post-cat d-flex flex-column justify-content-center">
                      <input type="radio" name="type" value="flat" checked>
                      <label class="d-flex flex-column justify-content-center fs-18 text-center text-grey mb-0" for="huey"><i class="material-icons fs-28">apartment</i>Appartement</label>
                  </div>
                  <div class="form-radio p-relative user-post-cat d-flex flex-column justify-content-center">
                      <input type="radio" name="type" value="home">
                      <label class="d-flex flex-column justify-content-center fs-18 text-center text-grey mb-0" for=""><i class="material-icons fs-28">house</i>Maison</label>
                  </div>
                  <div class="form-radio p-relative user-post-cat d-flex flex-column justify-content-center">
                      <input type="radio" name="type" value="other">
                      <label class="d-flex flex-column justify-content-center fs-18 text-center text-grey mb-0" for=""><i class="material-icons fs-28">more_horiz</i>Autres</label>
                  </div>
              </div>
          </div>
          <div class="mt-30">
              <div class="d-flex flex-column justify-content-between">
                  <h3 class="fs-18 fw-600 mb-20">Plus d'infos :</h3>
                  <div class="d-flex post-estate-more-infos mt-15">
                      <div class="d-flex flex-column mr-15">
                          <label for="" class="text-grey fs-15">Surface habitable</label>
                          <input required type="number" name="surface" placeholder="60" value="60">
                      </div>
                      <div class="d-flex flex-column mr-15">
                          <label for="" class="text-grey fs-15">Nombres de pièces</label>
                          <input required type="number" name="rooms" placeholder="4" value="4">
                      </div>
                      <div class="d-flex flex-column mr-15">
                          <label for="" class="text-grey fs-15">Chauffage</label>
                          <select name="heat">
                              <option value="Gaz">Gaz</option>
                              <option value="electricite">Électricité</option>
                              <option value="bois">Bois</option>
                          </select>
                      </div>
                      <div class="d-flex flex-column mr-15">
                          <label for="" class="text-grey fs-15">État général</label>
                          <select name="global_state">
                              <option value="Excellent">Excellent</option>
                              <option value="bon-etat">Bon état</option>
                              <option value="refresh">À rafraichir</option>
                              <option value="works">Travaux à prévoir</option>
                          </select>
                      </div>
                  </div>
                  <div class="d-flex mt-15">
                      <div class="d-flex flex-column mr-15">
                          <label for="" class="text-grey fs-15">Adresse ou rue</label>
                          <input required type="text" name="adress">
                      </div>
                      <div class="d-flex flex-column mr-15">
                          <label for="" class="text-grey fs-15">Ville</label>
                          <input required type="text" name="city">
                      </div>
                      <div class="d-flex flex-column mr-15">
                          <label for="" class="text-grey fs-15">Téléphone</label>
                          <input required type="tel" name="phone">
                      </div>
                  </div>
              </div>
              <div class="d-flex justify-content-between mt-30 post-estate-energy">
                  <div>
                      <h4 for="" class="text-grey fs-15">Classe énergie</h4>
                      <div class="d-flex w-100 justify-content-end">
                          <div class="form-radio p-relative user-post-infos d-flex flex-column justify-content-center">
                              <input type="radio" name="DPE" id="huey" value="A" checked>
                              <label class="d-flex flex-column justify-content-center fs-18 text-center text-grey mb-0" for="">A</label>
                          </div>
                          <div class="form-radio p-relative user-post-infos d-flex flex-column justify-content-center">
                              <input type="radio" name="DPE" value="B">
                              <label class="d-flex flex-column justify-content-center fs-18 text-center text-grey mb-0" for="">B</label>
                          </div>
                          <div class="form-radio p-relative user-post-infos d-flex flex-column justify-content-center">
                              <input type="radio" name="DPE" value="C">
                              <label class="d-flex flex-column justify-content-center fs-18 text-center text-grey mb-0" for="">C</label>
                          </div>
                          <div class="form-radio p-relative user-post-infos d-flex flex-column justify-content-center">
                              <input type="radio" name="DPE" value="D">
                              <label class="d-flex flex-column justify-content-center fs-18 text-center text-grey mb-0" for="">D</label>
                          </div>
                          <div class="form-radio p-relative user-post-infos d-flex flex-column justify-content-center">
                              <input type="radio" name="DPE" value="E">
                              <label class="d-flex flex-column justify-content-center fs-18 text-center text-grey mb-0" for="">E</label>
                          </div>
                          <div class="form-radio p-relative user-post-infos d-flex flex-column justify-content-center">
                              <input type="radio" name="DPE" value="F">
                              <label class="d-flex flex-column justify-content-center fs-18 text-center text-grey mb-0" for="">F</label>
                          </div>
                          <div class="form-radio p-relative user-post-infos d-flex flex-column justify-content-center">
                              <input type="radio" name="DPE" value="G">
                              <label class="d-flex flex-column justify-content-center fs-18 text-center text-grey mb-0" for="">G</label>
                          </div>
                      </div>
                  </div>
                  <div>
                      <h4 for="" class="text-grey fs-15">GES</h4>
                      <div class="d-flex w-100 justify-content-end">
                          <div class="form-radio p-relative user-post-infos d-flex flex-column justify-content-center">
                              <input type="radio" name="GES" id="huey" value="A" checked>
                              <label class="d-flex flex-column justify-content-center fs-18 text-center text-grey mb-0" for="">A</label>
                          </div>
                          <div class="form-radio p-relative user-post-infos d-flex flex-column justify-content-center">
                              <input type="radio" name="GES" value="B">
                              <label class="d-flex flex-column justify-content-center fs-18 text-center text-grey mb-0" for="">B</label>
                          </div>
                          <div class="form-radio p-relative user-post-infos d-flex flex-column justify-content-center">
                              <input type="radio" name="GES" value="C">
                              <label class="d-flex flex-column justify-content-center fs-18 text-center text-grey mb-0" for="">C</label>
                          </div>
                          <div class="form-radio p-relative user-post-infos d-flex flex-column justify-content-center">
                              <input type="radio" name="GES" value="D">
                              <label class="d-flex flex-column justify-content-center fs-18 text-center text-grey mb-0" for="">D</label>
                          </div>
                          <div class="form-radio p-relative user-post-infos d-flex flex-column justify-content-center">
                              <input type="radio" name="GES" value="E">
                              <label class="d-flex flex-column justify-content-center fs-18 text-center text-grey mb-0" for="">E</label>
                          </div>
                          <div class="form-radio p-relative user-post-infos d-flex flex-column justify-content-center">
                              <input type="radio" name="GES" value="F">
                              <label class="d-flex flex-column justify-content-center fs-18 text-center text-grey mb-0" for="">F</label>
                          </div>
                          <div class="form-radio p-relative user-post-infos d-flex flex-column justify-content-center">
                              <input type="radio" name="GES" value="G">
                              <label class="d-flex flex-column justify-content-center fs-18 text-center text-grey mb-0" for="">G</label>
                          </div>
                      </div>
                  </div>
              </div>
              <div class="d-flex flex-column w-100 mt-30">
                  <h4 for="" class="text-grey fs-15">Titre de l'annonce</h4>
                  <input required name="title" cols="30" rows="10" ></input>
              </div>
              <div class="d-flex flex-column w-100 mt-30">
                  <h4 for="" class="text-grey fs-15">Description</h4>
                  <textarea required name="description" cols="30" rows="10" placeholder="Veuillez décrire précisément votre bien"></textarea>
              </div>
              <div class="d-flex flex-column w-100 mt-30">
                  <h4 for="" class="text-grey fs-15">Photos</h4>
                  <div class="d-flex justify-content-between align-items-end post-estate-photos">
                      <div id="vue-target" class="d-flex post-estate-photos-child">
                        <image-field v-for="i in list" :key="i" :number="i" :required="i === 1"></image-field>
                      </div>
                      <div class="d-flex flex-column">
                          <h3 class="fs-18 fw-600 mb-20">Prix :</h3>
                          <input required class="fw-600 fs-18" type="number" name="price">
                      </div>
                  </div>
              </div>
              <div class="d-flex w-100 mt-20">
                  <div class="col-12">
                      <p class="fs-15 mb-0">"  En validant la diffusion de mon annonce, j’accepte <strong><a target="_blank" class="text-immo" href="<?php echo home_url() . '/conditions-generales-de-vente'; ?>">les conditions générales d’utilisation</a></strong> <br>du site Agence Twist et j’autorise l’agence twist à diffuser mon annonce. "</p>
                  </div>
              </div>
              <div class="d-flex w-100 mt-20">
                  <input class="btn-immo button button-block fs-18 w-100" name="submit" type="submit" value="Poster mon annonce">
              </div>
          </div>
      </form>
  </section>

<!-- <div id="close-form2">
  <img src="<?php echo get_template_directory_uri(); ?>/assets/img/close-form.svg" alt=""/>
</div> -->
