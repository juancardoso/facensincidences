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
            $hash = $this->CI->session->userdata('login_user');
            $id = $this->CI->session->userdata('login_id');
            
            $this->CI->db->where('user_id',$id);
            $result = $this->CI->db->get('user');

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
}

