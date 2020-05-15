<?php

require_once 'Framework/Vue.php';
$vue = new Vue("Erreur");
$vue->generer(['msgErreur' => '*** Message d\'erreur test ***'], null);

