<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class Dashboard extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		if (isset($this->session->logged)==FALSE)
		{
			$this->session->set_flashdata('hak','Silahkan login terlebih dahulu!');
			redirect ("Login");
		}
		$this->load->library('session');
	}

	public function index()
	{
		//ROW 1
		$cntanggota = $this->db->count_all_results('anggota');
		$cntlaki = $this->db->where('jeniskelamin', 1)->count_all_results('anggota');
		$cntwanita = $this->db->where('jeniskelamin', 2)->count_all_results('anggota');
		$cntcaleg = $this->db->count_all_results('caleg');
		//ROW 2
		$cntjktpst = $this->db->where('kodewilayah', '0901')->count_all_results('anggota');
		$cntjktsltn = $this->db->where('kodewilayah', '0902')->count_all_results('anggota');
		$cntjkttmr = $this->db->where('kodewilayah', '0903')->count_all_results('anggota');
		$cntjktbrt = $this->db->where('kodewilayah', '0904')->count_all_results('anggota');
		$cntjktutr = $this->db->where('kodewilayah', '0905')->count_all_results('anggota');
		$cntjktkep = $this->db->where('kodewilayah', '0906')->count_all_results('anggota');
		$cntclgdpri = $this->db->where('lembaga_negara', 'DPR RI')->count_all_results('caleg');
		$cntclgdprd = $this->db->where('lembaga_negara', 'DPRD')->count_all_results('caleg');
		//ROW 3
		$cntlakipusat = $this->db->where(['kodewilayah'=>'0901','jeniskelamin'=>1])->count_all_results('anggota');
		$cntlakiselatan = $this->db->where(['kodewilayah'=>'0902','jeniskelamin'=>1])->count_all_results('anggota');
		$cntlakitimur = $this->db->where(['kodewilayah'=>'0903','jeniskelamin'=>1])->count_all_results('anggota');
		$cntlakibarat = $this->db->where(['kodewilayah'=>'0904','jeniskelamin'=>1])->count_all_results('anggota');
		$cntlakiutara = $this->db->where(['kodewilayah'=>'0905','jeniskelamin'=>1])->count_all_results('anggota');
		$cntlakiseribu = $this->db->where(['kodewilayah'=>'0906','jeniskelamin'=>1])->count_all_results('anggota');
		$cntperempuanpusat = $this->db->where(['kodewilayah'=>'0901','jeniskelamin'=>2])->count_all_results('anggota');
		$cntperempuanselatan = $this->db->where(['kodewilayah'=>'0902','jeniskelamin'=>2])->count_all_results('anggota');
		$cntperempuantimur = $this->db->where(['kodewilayah'=>'0903','jeniskelamin'=>2])->count_all_results('anggota');
		$cntperempuanbarat = $this->db->where(['kodewilayah'=>'0904','jeniskelamin'=>2])->count_all_results('anggota');
		$cntperempuanutara = $this->db->where(['kodewilayah'=>'0905','jeniskelamin'=>2])->count_all_results('anggota');
		$cntperempuanseribu = $this->db->where(['kodewilayah'=>'0906','jeniskelamin'=>2])->count_all_results('anggota');

		//ROW 4
		//PUSAT	
		$sqlpusat = "SELECT kecamatan.id_kab, kecamatan.nama,
				SUM(case when anggota.jeniskelamin = 1 then 1 else 0 end ) as laki,
				SUM(case when anggota.jeniskelamin = 2 then 1 else 0 end ) as wanita,
				count(anggota.jeniskelamin) as total
				from kecamatan
				left join anggota
				on anggota.kecamatan = kecamatan.id_kec
				where kecamatan.id_kab = '3171'
				group by kecamatan.nama";
		$datapusat = $this->db->query($sqlpusat)->result_array();
		//SELATAN
		$sqlselatan = "SELECT kecamatan.id_kab, kecamatan.nama,
				SUM(case when anggota.jeniskelamin = 1 then 1 else 0 end ) as laki,
				SUM(case when anggota.jeniskelamin = 2 then 1 else 0 end ) as wanita,
				count(anggota.jeniskelamin) as total
				from kecamatan
				left join anggota
				on anggota.kecamatan = kecamatan.id_kec
				where kecamatan.id_kab = '3174'
				group by kecamatan.nama";
		$dataselatan = $this->db->query($sqlselatan)->result_array();
		//TIMUR	
		$sqltimur = "SELECT kecamatan.id_kab, kecamatan.nama,
				SUM(case when anggota.jeniskelamin = 1 then 1 else 0 end ) as laki,
				SUM(case when anggota.jeniskelamin = 2 then 1 else 0 end ) as wanita,
				count(anggota.jeniskelamin) as total
				from kecamatan
				left join anggota
				on anggota.kecamatan = kecamatan.id_kec
				where kecamatan.id_kab = '3175'
				group by kecamatan.nama";
		$datatimur = $this->db->query($sqltimur)->result_array();
		//BARAT
		$sqlbarat = "SELECT kecamatan.id_kab, kecamatan.nama,
				SUM(case when anggota.jeniskelamin = 1 then 1 else 0 end ) as laki,
				SUM(case when anggota.jeniskelamin = 2 then 1 else 0 end ) as wanita,
				count(anggota.jeniskelamin) as total
				from kecamatan
				left join anggota
				on anggota.kecamatan = kecamatan.id_kec
				where kecamatan.id_kab = '3173'
				group by kecamatan.nama";
		$databarat = $this->db->query($sqlbarat)->result_array();
		//UTARA	
		$sqlutara = "SELECT kecamatan.id_kab, kecamatan.nama,
				SUM(case when anggota.jeniskelamin = 1 then 1 else 0 end ) as laki,
				SUM(case when anggota.jeniskelamin = 2 then 1 else 0 end ) as wanita,
				count(anggota.jeniskelamin) as total
				from kecamatan
				left join anggota
				on anggota.kecamatan = kecamatan.id_kec
				where kecamatan.id_kab = '3172'
				group by kecamatan.nama";
		$datautara = $this->db->query($sqlutara)->result_array();
		//KEP SERIBU	
		$sqlseribu = "SELECT kecamatan.id_kab, kecamatan.nama,
				SUM(case when anggota.jeniskelamin = 1 then 1 else 0 end ) as laki,
				SUM(case when anggota.jeniskelamin = 2 then 1 else 0 end ) as wanita,
				count(anggota.jeniskelamin) as total
				from kecamatan
				left join anggota
				on anggota.kecamatan = kecamatan.id_kec
				where kecamatan.id_kab = '3101'
				group by kecamatan.nama";
		$dataseribu = $this->db->query($sqlseribu)->result_array();

		$data = array(
			'cntanggota' => $cntanggota,
			'cntlaki' => $cntlaki,
			'cntwanita' => $cntwanita,
			'cntcaleg' => $cntcaleg,
			'cntjktpst' => $cntjktpst,
			'cntjktsltn' => $cntjktsltn,
			'cntjkttmr' => $cntjkttmr,
			'cntjktbrt' => $cntjktbrt,
			'cntjktutr' => $cntjktutr,
			'cntjktkep' => $cntjktkep,
			'cntclgdpri' => $cntclgdpri,
			'cntclgdprd' => $cntclgdprd,
			'cntlakipusat' => $cntlakipusat,
			'cntlakiselatan' => $cntlakiselatan,
			'cntlakitimur' => $cntlakitimur,
			'cntlakibarat' => $cntlakibarat,
			'cntlakiutara' => $cntlakiutara,
			'cntlakiseribu' => $cntlakiseribu,
			'cntperempuanpusat' => $cntperempuanpusat,
			'cntperempuanselatan' => $cntperempuanselatan,
			'cntperempuantimur' => $cntperempuantimur,
			'cntperempuanbarat' => $cntperempuanbarat,
			'cntperempuanutara' => $cntperempuanutara,
			'cntperempuanseribu' => $cntperempuanseribu,
			'datapusat' => $datapusat,
			'dataselatan' => $dataselatan,
			'datatimur' => $datatimur,
			'databarat' => $databarat,
			'datautara' => $datautara,
			'dataseribu' => $dataseribu,
		);

		$this->load->view("dash/index", $data);
	}

	public function cabang()
	{
		//ROW 1
		$wilayah = $this->session->kode_wilayah;

		$cntanggota = $this->db->where('kodewilayah', $wilayah)->count_all_results('anggota');
		$cntlaki = $this->db->where(['kodewilayah' => $wilayah ,'jeniskelamin' => 1])->count_all_results('anggota');
		$cntwanita = $this->db->where(['kodewilayah' => $wilayah ,'jeniskelamin' => 2])->count_all_results('anggota');
		$cntcaleg = $this->db->where('kode_wilayah', $wilayah)->count_all_results('caleg');
		//ROW 2
		if ($wilayah == '0901') {
			$id_kab = '3171';
		} elseif ($wilayah == '0902') {
			$id_kab = '3174';
		} elseif ($wilayah == '0903') {
			$id_kab = '3175';
		} elseif ($wilayah == '0904') {
			$id_kab = '3173';
		} elseif ($wilayah == '0905') {
			$id_kab = '3172';
		} else {
			$id_kab = '3101';
		}

		$sql = "SELECT kecamatan.id_kab, kecamatan.nama,
				SUM(case when anggota.jeniskelamin = 1 then 1 else 0 end ) as laki,
				SUM(case when anggota.jeniskelamin = 2 then 1 else 0 end ) as wanita,
				count(anggota.jeniskelamin) as total
				from kecamatan
				left join anggota
				on anggota.kecamatan = kecamatan.id_kec
				where kecamatan.id_kab = '$id_kab'
				group by kecamatan.nama";
		$datapercabang = $this->db->query($sql)->result_array();
		// var_dump($datapercabang);die;

		$data = array(
			'cntanggota' => $cntanggota,
			'cntlaki' => $cntlaki,
			'cntwanita' => $cntwanita,
			'cntcaleg' => $cntcaleg,
			'datapercabang' => $datapercabang,
		);
		$this->load->view("dash/indexcabang", $data);
	}
}

?>