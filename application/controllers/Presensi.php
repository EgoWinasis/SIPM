<?php class Presensi extends CI_Controller
{

    public function index()
    {
        $data['title'] = "Dashboard";
        $this->load->view('templates/v_header',$data);
        $this->load->view('templates/v_sidebar');
        $this->load->view('templates/v_navbar');
        $this->load->view('presensi/dashboard');
        $this->load->view('templates/v_footer');
    }
    public function presensi()
    {
        $id = 1;
        $data['title'] = "Data Presensi Mahasiswa";
        $this->db->select('*');
        $this->db->from('user as u');
        $this->db->join('kehadiran', 'kehadiran.id_user = u.id');
        $this->db->where('u.id', $id);
        $data['presensi'] = $this->db->get()->result_array();
        $this->load->view('templates/v_header',$data);
        $this->load->view('templates/v_sidebar');
        $this->load->view('templates/v_navbar');
        $this->load->view('presensi/v_presensi',$data);
        $this->load->view('templates/v_footer');
    }

    public function add(){
       $id_card = $this->uri->segment(3);

       var_dump($id_card);
       die();
    }
}
