<?php
defined('BASEPATH') || exit('No direct script access allowed');

class M_recruitment extends CI_Model {

	public function __construct(){
		parent::__construct();
		$this->load->database();
	}

    // qualification
	public function get_data_qualification(){
		return $this->db->query("select m.nama_member, c.jml_usecase, a.jml_pelatihan, b.jml_sertifikasi
        from member_dsc m
        left join 
            (SELECT member_dsc.nama_member as nama_member, COUNT(trained_member.nama_pelatihan) AS jml_pelatihan
            FROM member_dsc
            INNER JOIN trained_member ON member_dsc.nik = trained_member.nik
            GROUP BY member_dsc.nama_member) as a 
            on a.nama_member = m.nama_member
        left join 
            (SELECT member_dsc.nama_member as nama_member, COUNT(certified_member.nama_sertifikasi) AS jml_sertifikasi
            FROM member_dsc
            INNER JOIN certified_member ON member_dsc.nik = certified_member.nik
            GROUP BY member_dsc.nama_member) as b 
            on b.nama_member = m.nama_member 
        left join 
            (SELECT member_dsc.nama_member nama_member, COUNT(member_usecase.id_usecase) as jml_usecase
            FROM member_dsc
            INNER JOIN member_usecase ON member_dsc.nik = member_usecase.nik
            GROUP BY member_dsc.nama_member
            ORDER BY jml_usecase DESC) as c
            on c.nama_member = m.nama_member
        where a.jml_pelatihan is not null or b.jml_sertifikasi is not null or c.jml_usecase is not null
        order by c.jml_usecase desc")->result();
	}
	// End of qualification

    // qualification
	public function get_data_qualification_2(){
		return $this->db->query("select m.nama_member, c.jml_usecase, a.nama_pelatihan, b.nama_sertifikasi
        from member_dsc m
        left join 
            (SELECT member_dsc.nama_member as nama_member, GROUP_CONCAT(trained_member.nama_pelatihan) AS nama_pelatihan
            FROM member_dsc
            INNER JOIN trained_member ON member_dsc.nik = trained_member.nik
            GROUP BY member_dsc.nama_member) as a 
            on a.nama_member = m.nama_member
        left join 
            (SELECT member_dsc.nama_member as nama_member, GROUP_CONCAT(certified_member.nama_sertifikasi) AS nama_sertifikasi
            FROM member_dsc
            INNER JOIN certified_member ON member_dsc.nik = certified_member.nik
            GROUP BY member_dsc.nama_member) as b 
            on b.nama_member = m.nama_member 
        left join 
            (SELECT member_dsc.nama_member nama_member, COUNT(member_usecase.id_usecase) as jml_usecase
            FROM member_dsc
            INNER JOIN member_usecase ON member_dsc.nik = member_usecase.nik
            GROUP BY member_dsc.nama_member
            ORDER BY jml_usecase DESC) as c
            on c.nama_member = m.nama_member
        where a.nama_pelatihan is not null or b.nama_sertifikasi is not null or c.jml_usecase is not null
        order by c.jml_usecase desc")->result();
	}
	// End of qualification
}	


?>