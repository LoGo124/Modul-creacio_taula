<?php

//Posarem la ruta de la carpeta del formulari, per el nom d'espai on treballem.
namespace Drupal\creacio_taula\Formulari;

//Utilitzarem les següents llibreries per poder realitzar la nostre tasca.
use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Messenger\MessengerTrait;


//Crearem una classe per la creacio del formulari.
class CreacioTaulaFormulari extends FormBase {


    //Crearem una funcio per Obtenir el ID del nostre formulari.
    public function getFormId() {
        return 'crear_taula_simple_form';
      }
 


    //Crearem una funcio per la construccio del nostre Formulari.
    public function buildForm(array $form, FormStateInterface $form_state) {

        $form['Numero'] = [
            '#type' => 'number',
            '#title' => $this->t('Introdueix el Numero de files'),
        ];
        

        
        //Obtindrem el valor 'Numero' que nosaltres hem introduït quan ens demana un numero.
        //Crearem una variable per guardar el valor 'Numero'
        $Numero_de_Files = $form_state->getValue(['Numero']);

        $form_state->setValue(['Numero'], $Numero_de_Files);
        
        
 
        //Crearem una Taula i afegirem el encapçalament.
        $form['Taula'] = [
            '#type' => 'table',
            '#title' => 'La meva Taula',
            '#header' => array('Linia'),
        ];
 


        //Utilitzarem un bucle for amb la variable que te el 'Numero' guardat.
        //D'aquesta manera crearem les files per la taula amb el numero que vam introduïr.
        //Es creara les files per cada encapçalament que hem posat.
        //echo generar_tabla_html($Numero_de_Files)

        for ($i=1; $i<=$Numero_de_Files; $i++) {

            $form['Taula'][$i]['per linia'] = [
                '#type' => 'textfield',
                '#title' => t('per linia'),
                '#title_display' => 'invisible',
                '#default_value' => 'per linia'.$i,
            ];  

        }
/* function generar_tabla_html($Numero_de_Files) {
    $html = '<table>';
    $html .= '<thead><tr>';
    $html .= '<th>Linia</th>';
    $html .= '</tr></thead>';
    $html .= '<tbody>';
    for ($i=1; $i<=$Numero_de_Files; $i++) {
        $html .= '<tr>';
        $html .= '<td>per linia</td>';
        $html .= '</tr>';
    }
    $html .= '</tbody></table>';
    
    return $html;
}
*/

        //Crearem un boto de 'Generar'.
        $form['submit'] = [
            '#type' => 'submit',
            '#value' => $this->t('Generar'),
        ];
        
        return $form;
    }
    
    
    
    //Funcio executada quan utilitzem el boto de "Generar".
    public function submitForm(array &$form, FormStateInterface $form_state) {

        //Crearem una variable per obtenir els valors del formulari quan li donem al boto de "Generar".
        $values = $form_state->getValues();

        //Cada vegada que li donem al boto de "Generar", el formulari es reconstrueix en base al numero que nosaltres
        //posem per les files de la creacio taula
        $form_state->setRebuild();
    }
 
}