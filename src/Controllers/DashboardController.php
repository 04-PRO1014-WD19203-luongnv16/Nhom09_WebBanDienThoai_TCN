<?php 
namespace MVC\Controllers;

use MVC\Controller;

class DashboardController extends Controller {
    
    public function index() {
        $this->renderAdmin('');
    }
}
?>