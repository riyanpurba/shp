<?php
class Template
{
    protected $_CI;
    function __construct()
    {
        $this->_CI=&get_instance();
    }

    function display($template,$data=null)
    {
        $this->_CI->load->model('SidebarModel');
        // $this->_CI->load->model('ModelUserProfile');
        $loginID = $this->_CI->session->userdata('userid');
        // $data['_getProfil'] = $this->_CI->ModelUserProfile->getProfile($loginID);
        $data['_getMenu1'] = $this->_CI->SidebarModel->selectMenu1();
        $data['_getMenu2'] = $this->_CI->SidebarModel->selectMenu2();

        $data['_content'] = $this->_CI->load->view($template,$data,true);
        $data['_navbar'] = $this->_CI->load->view('template/navbar',$data,true);
        $data['_sidebar'] = $this->_CI->load->view('template/sidebar',$data,true);
        $data['_footer'] = $this->_CI->load->view('template/footer',$data,true);
        $this->_CI->load->view('/template.php',$data);
    }
}