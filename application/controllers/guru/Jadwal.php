<?php
class Jadwal extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('jadwal_model');
        if (!isset($this->session->userdata['id_guru'])) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger d-flex align-items-center" role="alert">
			<svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
			<div>
			  Anda Belum Login!
			</div>
		  </div>');
            redirect('guru/auth');
        }
    }
    public function index()
    {
        $id_guru = ['id_guru' => $this->session->userdata('id_guru')];
        $data['jadwal'] = $this->jadwal_model->edit_data($id_guru, 'vjadwal')->result();
        $this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebar');
        $this->load->view('guru/jadwal', $data);
        $this->load->view('templates_administrator/footer');
    }
}
?>