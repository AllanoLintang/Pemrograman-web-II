<?php 
    namespace App\Controllers;
    use App\Models\UserModel;

    class User extends BaseController {
        protected $userModel;

        public function __construct(){
            $this->userModel = new UserModel();
        }

        public function index(){
            $login = $this->request->getPost('login');
            if($login){
                $username = $this->request->getPost('username');
                $password = $this->request->getPost('password');

                if($username == '' || $password == ''){
                    $err = 'Username dan Password Harus Diisi';
                }
                if(empty($err)){
                    $dataUser = $this->userModel->where('username', $username)->first();
                    if($dataUser['password'] != md5($password)){
                        $err = 'Password Salah';
                    }
                }
                if(empty($err)){
                    $dataSession = [
                        'id' => $dataUser['id'],
                        'username' => $dataUser['username'],
                        'password' => $dataUser['password']
                    ];
                    session()->set($dataSession);
                    return redirect()->to('/');
                }
                if($err){
                    session()->setFlashdata('username', $username);
                    session()->setFlashdata('error', $err);
                    return redirect()->to('user/login');
                }
            }
            return view('user/login');
        }

        public function logout(){
            session()->destroy();
            return redirect()->to('user/login');
        }
    }

?>