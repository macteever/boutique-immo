<div class="row align-items-center justify-content-between menu-section anim-700 ml-15 mr-15">
    <!-- <div id="menu-btn" class="ml-15">
        <button>
            <span></span>
            <span></span>
            <span></span>
        </button>
    </div> -->
    <div class="col-auto anim-700 container-logo-menu">
      <div>
        <a class="anim-300 d-flex flex-column justify-content-center align-items-center" href="<?php echo home_url(); ?>">
          <?php include 'logo.php'; ?>
        </a>
      </div>
    </div>
    <div class="col-auto ml-auto anim-300 large-menu anim-300">
      <nav class="d-flex">
        <!-- <div class="col-auto pr-0 d-flex align-items-center justify-content-end text-right">
          <div class="">
            <a class="menu-find-home fs-15 fw-600" href="#">Trouver votre bien</a>
          </div>
        </div> -->
         <?php  customTheme_nav(); ?>
      </nav>
        <!-- /nav -->
    </div>
    <div class="col-auto d-flex text-right">
      <div class="p-relative">
        <?php
          if ( is_user_logged_in() ) {?>
            <a class="btn-immo user-connect d-flex alig-items-center" href="<?php echo home_url() . '/mon-profil'; ?>  "><i class="material-icons mr-10 fs-24 text-white">account_box</i><span>Mon espace personnel</span></a>
              <div class="dropdown-parent user-connected pt-10">
                <div class="menu-dropdown anim-300">
                  <h4 class="uppercase fw-600 ls-3 fs-15 mb-15 text-grey text-center">Mon compte</h4>
                  <?php wp_nav_menu( array( 'theme_location' => 'extra-menu' ) ); ?>
                  <div class="w-100 ml-0 mt-20"><a class="btn-brd-immo" href="<?php echo wp_logout_url( home_url() ); ?>">Déconnexion</a></div>
                </div>
              </div>
          <?php }
           else 
            { ?>
              <button class="btn-immo d-flex align-items-center user-connect-btn fs-17"><i class="material-icons mr-10 fs-24 text-white">account_box</i><span>Connexion</span></button>
              <div class="dropdown-parent user-login">
                <div class="menu-dropdown anim-300">
                  <?php 
                  
                  ?>
                  <?php get_template_part("includes/user-forms"); ?>
                </div>
              </div>
            <?php
          }
        ?>
      </div>
    </div>
</div>
