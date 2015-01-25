<?php
namespace view;
/**
 * Description of AdminVue
 *
 * @author lganne
 */
class AdminVue
{
    
    public function home()
    {
        ob_start();
         $html= '<br><br><br><div class="container">';
      $html.= 'admin</div>';
        echo $html;
        $content= ob_get_clean();
          include 'layout.php';
    }
}
