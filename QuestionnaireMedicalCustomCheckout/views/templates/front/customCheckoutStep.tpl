<!-- Le template doit ếtendre le template parent des étapes du tunnel de commande -->
{extends file='checkout/_partials/steps/checkout-step.tpl'}

<!-- Le contenu doit doit être dans le block step content -->
{block name='step_content'}
    <div class="custom-checkout-step">
        <h2>Afin de confirmer votre commande merci de répondre à ce bref questionnaire de santé</h2>
        <!-- Le formulaire doit envoyer les données sur la page de commande en post -->



        <form
                method="POST"
                action="{$urls.pages.order}"
                data-refresh-url="{url entity='order' params=['ajax' => 1, 'action' => 'customStep']}"
        >

            <!-- Les Champs spécifiques de la step avec assignation de la variable si elle existe -->
            <section class="form-fields">
                <div class="form-group row">
                    <label class="col-md-3 form-control-label required">Votre ag</label>
                    <div class="col-md-6">
                        <input type="number" name="questionnaire_sante_age" value="0"/>
                    </div>
                </div>
               <div class="form-group row">
                    <label class="col-md-3 form-control-label required">Votre taille</label>
                    <div class="col-md-6">
                        <input type="number" name="questionnaire_sante_taille" value="0"/>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3 form-control-label required">Votre poids</label>
                    <div class="col-md-6">
                        <input type="number" name="questionnaire_sante_poids" value="0"/>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3 form-control-label required">Fumez-vous?</label>
                    <div class="col-md-6">
                        <select name="questionnaire_sante_tabac" >
                            <option value="1">Oui</option>
                            <option value="0" selected>Non</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3 form-control-label required">Consommez-vous de l'alcool?</label>
                    <div class="col-md-6">
                        <select name="questionnaire_sante_alcool" >
                            <option value="1">Oui</option>
                            <option value="0" selected>Non</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3 form-control-label required">Suivez-vous des traitements?</label>
                    <div class="col-md-6">
                        <select name="questionnaire_sante_traitement" >
                            <option value="1">Oui</option>
                            <option value="0" selected>Non</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3 form-control-label required">Souffrez-vous d'un handicap?</label>
                    <div class="col-md-6">
                        <select name="questionnaire_sante_handicap" >
                            <option value="1">Oui</option>
                            <option value="0" selected>Non</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3 form-control-label required">Souffrez-vous d'une maladie?</label>
                    <div class="col-md-6">
                        <select name="questionnaire_sante_maladie" >
                            <option value="1">Oui</option>
                            <option value="0" selected>Non</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3 form-control-label required">Avez/Serez-vous hospitalisé?</label>
                    <div class="col-md-6">
                        <select name="questionnaire_sante_hospitalisation" >
                            <option value="1">Oui</option>
                            <option value="0" selected>Non</option>
                        </select>
                    </div>
                </div>
            </section>
            <footer class="form-footer clearfix">
                <input type="submit" name="submitCustomStep" value="Envoyer"
                       class="btn btn-primary continue float-xs-right"/>
            </footer>
        </form>
    </div>
{/block}