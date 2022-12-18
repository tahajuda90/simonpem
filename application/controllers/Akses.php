<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Akses extends CI_Controller {
    var $group = '';
    public function __construct() {
        parent::__construct();
        $this->load->library(['ion_auth', 'form_validation']);
        $this->load->helper(['url', 'language']);
        $this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));
        $this->lang->load('auth');
    }

    public function index() {
        $this->group = $this->ion_auth->get_users_groups()->row()->name;
        $data['users'] = $this->ion_auth->users()->result();
        foreach ($data['users'] as $k => $user) {
            $data['users'][$k]->groups = $this->ion_auth->get_users_groups($user->id)->result();
        }
        $data['page'] = 'page/akses';
        $this->load->view('main', $data);
    }

    public function login() {
        $this->form_validation->set_rules('identity', str_replace(':', '', $this->lang->line('login_identity_label')), 'required');
        $this->form_validation->set_rules('password', str_replace(':', '', $this->lang->line('login_password_label')), 'required');
        if ($this->form_validation->run() === TRUE) {
            $remember = (bool) $this->input->post('remember');
            if ($this->ion_auth->login($this->input->post('identity'), $this->input->post('password'), $remember)) {
                redirect('home');
            } else {
                $this->session->set_flashdata('message', $this->ion_auth->errors());
                redirect('login');
            }
        } else {
            $this->load->view('login');
        }
    }

    public function logout() {
        $this->ion_auth->logout();
        redirect('login', 'refresh');
    }
    
    public function create_user() {
        $this->group = $this->ion_auth->get_users_groups()->row()->name;
        if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin()) {
            redirect('Akses/logout', 'refresh');
        }
        $tables = $this->config->item('tables', 'ion_auth');
        $identity_column = $this->config->item('identity', 'ion_auth');
        if ($identity_column !== 'email') {
            $this->form_validation->set_rules('identity', $this->lang->line('create_user_validation_identity_label'), 'trim|required|is_unique[' . $tables['users'] . '.' . $identity_column . ']');
            $this->form_validation->set_rules('email', $this->lang->line('create_user_validation_email_label'), 'trim|required|valid_email');
        } else {
            $this->form_validation->set_rules('email', $this->lang->line('create_user_validation_email_label'), 'trim|required|valid_email|is_unique[' . $tables['users'] . '.email]');
        }
        $this->form_validation->set_rules('password', $this->lang->line('create_user_validation_password_label'), 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']');
        if ($this->form_validation->run() === TRUE){
            $email = strtolower($this->input->post('email'));
            $identity = ($identity_column === 'email') ? $email : $this->input->post('identity');
            $password = $this->input->post('password');
            $additional_data = [
                'company' => 'Pemerintah Kota Kediri'
            ];
            $groupData = $this->input->post('groups');
        } 
        if ($this->form_validation->run() === TRUE && $this->ion_auth->register($identity, $password, $email, $additional_data,$groupData)) {
            $this->session->set_flashdata('message', $this->ion_auth->messages());
            redirect('user', 'refresh');
        }
        else {
            $data['groups'] = $this->ion_auth->groups()->result_array();
            $data['page'] = 'page/akses';
            $data['pattern'] = '^.{' .$this->config->item('min_password_length', 'ion_auth'). '}.*$';
            $data['email'] = $this->form_validation->set_value('email');
            $data['identity'] = $this->form_validation->set_value('identity');
            $data['button'] = 'Tambah';
            $data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));
            $this->load->view('main', $data);
            
        }
    }
    
    public function edit_user($id) {
        $this->group = $this->ion_auth->get_users_groups()->row()->name;
        if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin()) {
            redirect('Akses/logout', 'refresh');
        }
        $user = $this->ion_auth->user($id)->row();
        $this->form_validation->set_rules('id','id required','required');
        if ($this->input->post('password')) {
            $this->form_validation->set_rules('password', $this->lang->line('edit_user_validation_password_label'), 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|matches[password_confirm]');
            $this->form_validation->set_rules('password_confirm', $this->lang->line('edit_user_validation_password_confirm_label'), 'required');
            
        }
        
        if ($this->form_validation->run() === TRUE){
            $this->ion_auth->remove_from_group('', $id);
            $groupData = $this->input->post('groups');
            if (isset($groupData) && !empty($groupData)) {
                foreach ($groupData as $grp) {
                    $this->ion_auth->add_to_group($grp, $id);
                }
            }
            if ($this->input->post('password')) {
                $insert['password'] = $this->input->post('password');
                if ($this->ion_auth->update($user->id, $insert)) {
                    $this->session->set_flashdata('message', $this->ion_auth->messages());
                    redirect('user', 'refresh');
                }
            }else{
                $this->session->set_flashdata('message', $this->ion_auth->messages());
                redirect('user', 'refresh');
            }
        }else{
            $data['currentGroups'] = $this->ion_auth->get_users_groups($id)->result();
            $data['groups'] = $this->ion_auth->groups()->result_array();
            $data['page'] = 'page/akses';
            $data['id_user'] = $user->id;
            $data['pattern'] = '^.{' .$this->config->item('min_password_length', 'ion_auth'). '}.*$';
            $data['email'] = $user->email;
            $data['identity'] = $user->username;
            $data['button'] = 'Edit';
            $data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));
            $this->load->view('main', $data);
        }
    }
    
        public function change_password(){
        $this->group = $this->ion_auth->get_users_groups()->row()->name;
        $this->form_validation->set_rules('old', $this->lang->line('change_password_validation_old_password_label'), 'required');
        $this->form_validation->set_rules('new', $this->lang->line('change_password_validation_new_password_label'), 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|matches[new_confirm]');
	$this->form_validation->set_rules('new_confirm', $this->lang->line('change_password_validation_new_password_confirm_label'), 'required');
    
        if (!$this->ion_auth->logged_in()) {
            redirect('logout', 'refresh');
        }
        $user = $this->ion_auth->user()->row();
        if ($this->form_validation->run() === FALSE) {
            $data['page'] = 'page/akses';
            $data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));
            $data['button'] = 'Ubah';
            $data['id_user'] = $user->id;
            $this->load->view('main',$data);
        }else{
             $identity = $this->session->userdata('identity');
             $change = $this->ion_auth->change_password($identity, $this->input->post('old'), $this->input->post('new'));
             if ($change) {
                //if the password was successfully changed
                $this->session->set_flashdata('message', $this->ion_auth->messages());
                $this->logout();
            } else {
                $this->session->set_flashdata('message', $this->ion_auth->errors());
                redirect('user/passwd', 'refresh');
            }
        }
    }
    
    public function activate($id, $code = FALSE) {
        $activation = FALSE;

        if ($code !== FALSE) {
            $activation = $this->ion_auth->activate($id, $code);
        } else if ($this->ion_auth->is_admin()) {
            $activation = $this->ion_auth->activate($id);
        }

        if ($activation) {
            // redirect them to the auth page
            $this->session->set_flashdata('message', $this->ion_auth->messages());
            redirect('user', 'refresh');
        }
    }

    public function deactivate($id = NULL) {
        if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin()) {
            // redirect them to the home page because they must be an administrator to view this
            show_error('You must be an administrator to view this page.');
        }
        $id = (int) $id;
        if ($this->ion_auth->logged_in() && $this->ion_auth->is_admin()) {
            $this->ion_auth->deactivate($id);
        }
        redirect('user', 'refresh');
    }

}
