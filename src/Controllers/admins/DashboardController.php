<?php 
namespace MVC\Controllers\admins;

use MVC\Controller;

class DashboardController extends Controller {
    
    public function index() {
        $this->renderAdmin('thongke');
    }
}
?>