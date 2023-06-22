<?php class Mahasiswa extends CI_Controller
{

    public function index()
    {
        $data['title'] = "Data Mahasiswa";
        $data['siswa'] = $this->db->get('user')->result_array();
        $this->load->view('templates/v_header', $data);
        $this->load->view('templates/v_sidebar');
        $this->load->view('templates/v_navbar');
        $this->load->view('siswa/v_siswa', $data);
        $this->load->view('templates/v_footer');
    }
    public function add()
    {
        $data['title'] = "Tambah Data Mahasiswa";
        $this->load->view('templates/v_header', $data);
        $this->load->view('templates/v_sidebar');
        $this->load->view('templates/v_navbar');
        $this->load->view('siswa/v_add_siswa', $data);
        $this->load->view('templates/v_footer');
    }

    public function store()
    {


        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('nim', 'NIM', 'required');
        $this->form_validation->set_rules('id_card', 'ID Card', 'required');
        if ($this->form_validation->run() == FALSE) {
            if ($this->$_SESSION['pesan'] == null) {
                $this->session->set_flashdata('pesan', '<div id="notifikasi"><div class="alert alert-danger">
				<p>' . validation_errors() . '</p>
				</div></div>');
            }
            redirect('mahasiswa/add');
        } else {
            $user = [
                'nama' => htmlspecialchars($this->input->post('nama', true)),
                'nim' => htmlspecialchars($this->input->post('nim', true)),
                'id_card' => htmlspecialchars($this->input->post('id_card', true)),

            ];

            $this->db->insert('user', $user);
            if ($this->$_SESSION['pesan'] == null) {
                $this->session->set_flashdata('pesan', '<div id="notifikasi"><div class="alert alert-success">
				<p> Tambah Data Sukses !</p>
				</div></div>');
            }
            redirect('mahasiswa');
        }
    }

    public function edit()
    {
        $id_user = $this->uri->segment(3);
        $data['user'] = $this->db->select('*')->from('user')->where('id', $id_user)->get()->result_array();
        $data['title'] = "Edit Data Mahasiswa";
        $this->load->view('templates/v_header', $data);
        $this->load->view('templates/v_sidebar');
        $this->load->view('templates/v_navbar');
        $this->load->view('siswa/v_edit_siswa', $data);
        $this->load->view('templates/v_footer');
    }

    public function update()
    {

        $id = htmlspecialchars($this->input->post('id', true));

        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('nim', 'NIM', 'required');
        $this->form_validation->set_rules('id_card', 'ID Card', 'required');
        if ($this->form_validation->run() == FALSE) {
            if ($this->$_SESSION['pesan'] == null) {
                $this->session->set_flashdata('pesan', '<div id="notifikasi"><div class="alert alert-danger">
				<p>' . validation_errors() . '</p>
				</div></div>');
            }
            redirect(base_url('mahasiswa/edit/'.$id));
        } else {
            $user = [
                'nama' => htmlspecialchars($this->input->post('nama', true)),
                'nim' => htmlspecialchars($this->input->post('nim', true)),
                'id_card' => htmlspecialchars($this->input->post('id_card', true)),

            ];

            $this->db->where('id', $id);
            $this->db->update('user', $user);
            if ($this->$_SESSION['pesan'] == null) {
                $this->session->set_flashdata('pesan', '<div id="notifikasi"><div class="alert alert-success">
				<p> Update Data Sukses !</p>
				</div></div>');
            }
            redirect('mahasiswa');
        }
    }
    public function delete() {
       $id_user = $this->uri->segment(3);

       
        // Perform the deletion logic here, e.g., delete the item from the database
        $this->db->where('id', $id_user);
        $this->db->delete('user');
        // Send a response back to the client
        if ($this->$_SESSION['pesan'] == null) {
            $this->session->set_flashdata('pesan', '<div id="notifikasi"><div class="alert alert-success">
            <p> Hapus Data Sukses !</p>
            </div></div>');
        }
        redirect('mahasiswa');
      }
}
