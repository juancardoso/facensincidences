<?php

class ControleAcesso {
    
    protected $CI;

    // We'll use a constructor, as you can't directly call a function
    // from a property definition.
    public function __construct()
    {
            // Assign the CodeIgniter super-object
            $this->CI =& get_instance();
    }

    public function controleAcesso(){
        $class =$this->CI->router->class;
        $directory =$this->CI->router->directory;
        $method =$this->CI->router->method;

        if($directory === 'usuarios/' && $class !== 'Login'){
             $this->controleUsuario(); 
        }else if($directory === 'admin/' && $class !== 'Login'){
            $this->controleAdmin();
        }
    }

    private function controleAdmin(){
        $hash = $this->CI->session->userdata('login_admin');
        $id = $this->CI->session->userdata('login_idAdmin');
            
        $this->CI->db->where('adm_id',$id);
        $result = $this->CI->db->get('admin');
        if($result && $result->result_id->num_rows > 0){
            $result = $result->row();
            $hashUser = base64_encode("$result->admin_id:$result->admin_user:$result->admin_password");
            
            if($hash !== $hashUser){
                redirect('admin/Login');
            }
        }else{
            redirect('admin/Login');
        }
    }

    private function controleUsuario(){
        $hash = $this->CI->session->userdata('login_user');
        $id = $this->CI->session->userdata('login_id');
            
        $this->CI->db->where('usu_id',$id);
        $result = $this->CI->db->get('usarios');

        if($result && $result->result_id->num_rows > 0){
            $result = $result->row();
            $hashUser = base64_encode("$result->user_ra:$result->user_password");

            if($hash !== $hashUser){
                redirect('usuarios/Login');
            }
        }else{
            redirect('usuarios/Login');
        }
    }
}

