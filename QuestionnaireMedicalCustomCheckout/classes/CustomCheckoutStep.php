<?php

use Symfony\Component\Translation\TranslatorInterface;

class CustomCheckoutStep extends AbstractCheckoutStep
{

    /** @var QuestionnaireMedicalCustomCheckout */
    protected $module;

    /** @var int $ageName */
    protected $ageName;

    /** @var int $tailleName */
    protected $tailleName;

    /** @var int $poidsName */
    protected $poidsName;

    /** @var string $tabacName */
    protected $tabacName;

    /** @var string $alcoolName */
    protected $alcoolName;

    /** @var string $traitementName */
    protected $traitementName;

    /** @var string $handicapName */
    protected $handicapName;

    /** @var string $maladieName */
    protected $maladieName;

    /** @var string $hospitalisationName*/
    protected $hospitalisationName;

    public function __construct(
        Context $context,
        TranslatorInterface $translator,
        QuestionnaireMedicalCustomCheckout $module
    )
    {
        parent::__construct($context, $translator);
        $this->module = $module;
        $this->setTitle('Questionnaire de santé');
    }


    /**
     * Récupération des données à persister
     *
     * @return array
     */
    public function getDataToPersist()
    {
        return array(
            'questionnaire_sante_age' => $this->ageName,
            'questionnaire_sante_taille' => $this->tailleName,
            'questionnaire_sante_poids' => $this->poidsName,
            'questionnaire_sante_tabac' => $this->tabacName,
            'questionnaire_sante_alcool' => $this->alcoolName,
            'questionnaire_sante_traitement' => $this->traitementName,
            'questionnaire_sante_handicap' => $this->handicapName,
            'questionnaire_sante_maladie' => $this->maladieName,
            'questionnaire_sante_hospitalisation' => $this->hospitalisationName,
        );
    }

    /**
     * Restoration des données persistées
     *
     * @param array $data
     * @return $this|AbstractCheckoutStep
     */
    public function restorePersistedData(array $data)
    {
        if (array_key_exists('questionnaire_sante_age', $data)) {
            $this->ageName = $data['questionnaire_sante_age'];
        }

        if (array_key_exists('questionnaire_sante_taille', $data)) {
            $this->tailleName = $data['questionnaire_sante_taille'];
        }
        
        if (array_key_exists('questionnaire_sante_poids', $data)) {
            $this->poidsName = $data['questionnaire_sante_poids'];
        }
        
        if (array_key_exists('questionnaire_sante_tabac', $data)) {
            $this->tabacName = $data['questionnaire_sante_tabac'];
        }
        
        if (array_key_exists('questionnaire_sante_alcool', $data)) {
            $this->alcoolName = $data['questionnaire_sante_alcool'];
        }
        
        if (array_key_exists('questionnaire_sante_traitement', $data)) {
            $this->traitementName = $data['questionnaire_sante_traitement'];
        }
        
        if (array_key_exists('questionnaire_sante_handicap', $data)) {
            $this->handicapName = $data['questionnaire_sante_handicap'];
        }
        
        if (array_key_exists('questionnaire_sante_maladie', $data)) {
            $this->maladieName = $data['questionnaire_sante_maladie'];
        }
        
        if (array_key_exists('questionnaire_sante_hospitalisation', $data)) {
            $this->hospitalisationName = $data['questionnaire_sante_hospitalisation'];
        }

        return $this;
    }

    /**
     * Traitement de la requête ( ie = Variables Posts du checkout
     * @param array $requestParameters
     * @return $this
     */
    public function handleRequest(array $requestParameters = array())
    {
        //Si les informations sont postées assignation des valeurs
        if (isset($requestParameters['submitCustomStep'])) {
            $this->ageName = isset($requestParameters['questionnaire_sante_age']) ? $requestParameters['questionnaire_sante_age'] : null;
            $this->tailleName = isset($requestParameters['questionnaire_sante_taille']) ? $requestParameters['questionnaire_sante_taille'] : null;
            $this->poidsName = isset($requestParameters['questionnaire_sante_poids']) ? $requestParameters['questionnaire_sante_poids'] : null;
            $this->tabacName = isset($requestParameters['questionnaire_sante_tabac']) ? $requestParameters['questionnaire_sante_tabac'] : null;
            $this->alcoolName = isset($requestParameters['questionnaire_sante_alcool']) ? $requestParameters['questionnaire_sante_alcool'] : null;
            $this->traitementName = isset($requestParameters['questionnaire_sante_traitement']) ? $requestParameters['questionnaire_sante_traitement'] : null;
            $this->handicapName = isset($requestParameters['questionnaire_sante_handicap']) ? $requestParameters['questionnaire_sante_handicap'] : null;
            $this->maladieName = isset($requestParameters['questionnaire_sante_maladie']) ? $requestParameters['questionnaire_sante_maladie'] : null;
            $this->hospitalisationName = isset($requestParameters['questionnaire_sante_hospitalisation']) ? $requestParameters['questionnaire_sante_hospitalisation'] : null;


            // Insérer des données dans la table personnalisée
            $data = array(
                'age' => $this->ageName,
                'taille' => $this->tailleName,
                'poids' => $this->poidsName,
                'tabac' => $this->tabacName,
                'alcool' => $this->alcoolName,
                'traitement' => $this->traitementName,
                'handicap' => $this->handicapName,
                'maladie' => $this->maladieName,
                'hospitalisation' => $this->hospitalisationName
            );

            //Appel de la fonction insertData pour insert dans la table ps_questionnaire_sante
            $this->insertData($data);

            //Passage à l'étape suivante
            $this->setComplete(true);
        }

        return $this;
    }

    /**
     * Affichage de la step
     *
     * @param array $extraParams
     * @return string
     */
    public function render(array $extraParams = [])
    {

        //Assignation des informations d'affichage
        $defaultParams = array(
            //Informations nécessaires
            'identifier' => 'test',
            'position' => 3, //La position n'est qu'indicative ...
            'title' => $this->getTitle(),
            'step_is_complete' => (int)$this->isComplete(),
            'step_is_reachable' => (int)$this->isReachable(),
            'step_is_current' => (int)$this->isCurrent(),
            //Variables custom
            'questionnaire_sante_age' => $this->ageName,
            'questionnaire_sante_taille' => $this->tailleName,
            'questionnaire_sante_poids' => $this->poidsName,
            'questionnaire_sante_tabac' => $this->tabacName,
            'questionnaire_sante_alcool' => $this->alcoolName,
            'questionnaire_sante_traitement' => $this->traitementName,
            'questionnaire_sante_handicap' => $this->handicapName,
            'questionnaire_sante_maladie' => $this->maladieName,
            'questionnaire_sante_hospitalisation' => $this->hospitalisationName,
            // Ajout de $data pour le rendre accessible dans le template
            'data' => $this->getDataToPersist()
        );

        $this->context->smarty->assign($defaultParams);
        return $this->module->display(
            _PS_MODULE_DIR_ . $this->module->name,
            'views/templates/front/customCheckoutStep.tpl'
        );
    }

    public function insertData($data)
    {
       
        if (!Db::getInstance()->insert('questionnaire_sante', $data)) {
            // Gérer l'erreur si l'insertion échoue
            $error = Db::getInstance()->getMsgError();
            // Afficher l'erreur pour le débogage
            error_log('Erreur lors de l\'insertion des données : ' . $error);
            echo "<p>Erreur lors de l'insertion des données : $error</p>";
            return false;
        }

        return true;
    }

}