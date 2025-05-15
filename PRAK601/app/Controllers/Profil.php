<?php 
    namespace App\Controllers;
    use App\Models\Praktikan;

    class Profil extends BaseController {
        public function index() {
            $model = new Praktikan();
            $data = $model->getData();
            return view('layout/navbar').
            view('profil', $data);
        }
    }
?>