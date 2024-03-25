<?php
class QuestionnaireMedicalCustomCheckout extends Module
{

    public function __construct()
    {
        $this->name = 'QuestionnaireMedicalCustomCheckout';
        $this->tab = 'others';
        $this->version = '0.1.0';
        $this->author = 'Maxime BRUNETEAU';
        $this->bootstrap = true;
        parent::__construct();

        $this->displayName = $this->l('Questionnaire santé tunnel de commande');
        $this->description = $this->l('Module pour rajouter un questionnaire de santé dans le tunnel de commande');
    }

    public function install()
    {
        // Appeler le fichier SQL pour créer la table
        $sql_file = dirname(__FILE__) . '/install/questionnaire_sante.sql';
        if (!$this->loadSQLFile($sql_file)) {
            return false;
        }

        // Autres actions d'installation si nécessaire
        return parent::install();
    }

    public function uninstall()
    {
        return parent::uninstall();
    }

    private function loadSQLFile($file)
    {
        // Vérifier si le fichier existe
        if (!file_exists($file)) {
            $this->_errors[] = $this->l('Le fichier SQL n\'existe pas.');
            return false;
        }

        // Lire le contenu du fichier SQL
        $sql_content = file_get_contents($file);

        // Exécuter les requêtes SQL
        if (!Db::getInstance()->execute($sql_content)) {
            $this->_errors[] = $this->l('Erreur lors de l\'exécution des requêtes SQL.');
            return false;
        }

        return true;
    }

}