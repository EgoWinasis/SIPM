<?php class Presensi extends CI_Controller
{

    public function index()
    {
        $data['title'] = "Dashboard";
        $data['presensi'] = $this->db->get('kehadiran')->num_rows();
        $data['mahasiswa'] = $this->db->get('user')->num_rows();
        $this->load->view('templates/v_header', $data);
        $this->load->view('templates/v_sidebar');
        $this->load->view('templates/v_navbar');
        $this->load->view('presensi/dashboard',$data);
        $this->load->view('templates/v_footer');
    }
    public function presensi()
    {
        $data['title'] = "Data Presensi Mahasiswa";
        $this->db->select('*');
        $this->db->from('user');
        $this->db->join('kehadiran', 'user.id = kehadiran.id_user', 'inner');
        $this->db->order_by("timestamp", "desc");
        $data['presensi'] = $this->db->get()->result_array();
        $this->load->view('templates/v_header', $data);
        $this->load->view('templates/v_sidebar');
        $this->load->view('templates/v_navbar');
        $this->load->view('presensi/v_presensi', $data);
        $this->load->view('templates/v_footer');
    }

    public function add()
    {
        $rfidData = $this->input->post('rfid');
        // $rfidData = '0A 69 A0 1B';

        // $timestamp = now();
        // $formattedTimestamp = date('Y/m/d H:i:s', $timestamp);

        $userExist = $this->db->select('*')->from('user')->where('id_card', $rfidData)->get()->result_array();

        // $presensiExist = $this->db->select('*')->from('kehadiran')->where('id_user', $userExist[0]['id'])->get()->result_array();

        // if (empty($presensiExist)) {
        //     $this->db->set('id_user', $userExist[0]['id']);
        //     $this->db->insert('kehadiran');
        //     echo "data disimpan";
        // }

        if (!empty($userExist)) {
            $this->db->set('id_user', $userExist[0]['id']);
            $this->db->insert('kehadiran');
            echo $rfidData;
        } else {
            echo "null";
        }
        // var_dump($userExist);
        // var_dump($presensiExist);

    }
}
