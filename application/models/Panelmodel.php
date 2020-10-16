<?php 

class PanelModel extends CI_Model {
// module kepegawaian
    public function getpegawai(){
        $this->db->select('*');
        $this->db->from('kepegawaian');
        $this->db->join('jabatan_pegawai', 'jabatan_pegawai.id_jabatan_pegawai = kepegawaian.id_jabatan_pegawai');
        $this->db->join('jabatan', 'jabatan.id_jabatan = kepegawaian.id_jabatan');
        $this->db->join('masa_kerja', 'masa_kerja.id_masa_kerja = kepegawaian.id_masa_kerja');
        $this->db->join('jenjang', 'jenjang.id_jenjang = kepegawaian.id_jenjang');
        $this->db->join('setting_gaji', 'setting_gaji.id_setting_gaji = kepegawaian.id_setting_gaji');
        $data = $this->db->get();
        return $data;
    }

    public function addpegawai($nip,$mas,$nama,$sks,$nom,$gapok,$tunjangan,$trans){
        $uniqid = uniqid();
        $this->db->trans_start();
            $data1 = array(
                'id_jabatan_pegawai' => $uniqid, 
                'nip_pegawai' => $nip);
            $this->db->insert('jabatan_pegawai', $data1);

            $data2 = array(
                'id_jabatan' => $uniqid,
                'nama' => $nama,
                'sks_wajib' => $sks);
            $this->db->insert('jabatan', $data2);

            $data3 = array(
                'id_masa_kerja' => $uniqid,
                'masa_kerja' => $mas);
            $this->db->insert('masa_kerja', $data3);

            $data4 = array(
                'id_jenjang' => $uniqid,
                'nominal' => $nom);
            $this->db->insert('jenjang', $data4);

            $data5 = array(
                'id_setting_gaji' => $uniqid,
                'gapok' => $gapok,
                'tunjangan' => $tunjangan,
                'transport' => $trans);
            $this->db->insert('setting_gaji', $data5);

            $res = array(
            'id_jabatan_pegawai' => $uniqid,
            'id_jabatan' => $uniqid, 
            'id_masa_kerja' => $uniqid,
            'id_jenjang' => $uniqid,
            'id_setting_gaji' => $uniqid);
            $this->db->insert('kepegawaian', $res);
        $this->db->trans_complete();
    }

    public function pegawaiedit($id){
        $this->db->select('*');
        $this->db->from('kepegawaian');
        $this->db->join('jabatan_pegawai', 'jabatan_pegawai.id_jabatan_pegawai = kepegawaian.id_jabatan_pegawai');
        $this->db->join('jabatan', 'jabatan.id_jabatan = kepegawaian.id_jabatan');
        $this->db->join('masa_kerja', 'masa_kerja.id_masa_kerja = kepegawaian.id_masa_kerja');
        $this->db->join('jenjang', 'jenjang.id_jenjang = kepegawaian.id_jenjang');
        $this->db->join('setting_gaji', 'setting_gaji.id_setting_gaji = kepegawaian.id_setting_gaji');
        $this->db->where('id_kepegawaian', $id); 
        $result = $this->db->get()->row(); 
        return $result;
    }

    public function pegawaiupdate($nip,$mas,$nama,$sks,$nom,$gapok,$tunjangan,$trans,$idall){
        $this->db->trans_start();
            $data1 = array(
                'nip_pegawai' => $nip
            );
            $this->db->where('id_jabatan_pegawai',$idall);
            $this->db->update('jabatan_pegawai',$data1);

            $data2 = array(
                'nama' => $nama,
                'sks_wajib' => $sks
            );
            $this->db->where('id_jabatan',$idall);
            $this->db->update('jabatan',$data2);

            $data3 = array(
                'masa_kerja' => $mas
            );
            $this->db->where('id_masa_kerja',$idall);
            $this->db->update('masa_kerja',$data3);

            $data4 = array(
                'nominal' => $nom
            );
            $this->db->where('id_jenjang',$idall);
            $this->db->update('jenjang',$data4);

            $data5 = array(
                'gapok' => $gapok,
                'tunjangan' => $tunjangan,
                'transport' => $trans
            );
            $this->db->where('id_setting_gaji',$idall);
            $this->db->update('setting_gaji',$data5);
        $this->db->trans_complete();
    }

     public function hapuspegawai($idind,$idall){
        $this->db->trans_start();
            $this->db->where('id_jabatan_pegawai',$idall);
            $this->db->delete('jabatan_pegawai');

            $this->db->where('id_jabatan',$idall);
            $this->db->delete('jabatan');

            $this->db->where('id_masa_kerja',$idall);
            $this->db->delete('masa_kerja');

            $this->db->where('id_jenjang',$idall);
            $this->db->delete('jenjang');

            $this->db->where('id_setting_gaji',$idall);
            $this->db->delete('setting_gaji');

            $this->db->where('id_kepegawaian',$idind);
            $this->db->delete('kepegawaian');
        $this->db->trans_complete();
    }
    // batas akhir module kepegawaian

    // module menu izin
    public function getizin(){
        $this->db->select('*');
        $this->db->from('izin');
        $this->db->join('detail_izin', 'detail_izin.id_detail_izin = izin.id_detail_izin');
        $data = $this->db->get();
        return $data;
    }

    public function addizin($nip,$tgl,$jenis,$kep,$ren,$lama,$ket,$status){
        $uniqid = uniqid();
        $this->db->trans_start();
            $detail = array(
                'id_detail_izin' => $uniqid, 
                'lama' => $lama,
                'keperluan' => $kep,
                'rentang_tanggal' => $ren,
                'keterangan' => $ket,
                'status' => $status,
            );
            $this->db->insert('detail_izin', $detail);

            $izin = array(
                'id_detail_izin' => $uniqid,
                'nip_pegawai' => $nip,
                'tgl_izin' => $tgl,
                'jenis' => $jenis
            );
            $this->db->insert('izin', $izin);
        $this->db->trans_complete();
    }

    public function izinedit($id){
        $this->db->select('*');
        $this->db->from('izin');
        $this->db->join('detail_izin', 'detail_izin.id_detail_izin = izin.id_detail_izin');
        $this->db->where('id_izin', $id); 
        $result = $this->db->get()->row(); 
        return $result;
    }

    public function izinupdate($nip,$tgl,$jenis,$kep,$ren,$lama,$ket,$status,$idind,$idall){
        $this->db->trans_start();
            $detail = array(
                'lama' => $lama,
                'keperluan' => $kep,
                'rentang_tanggal' => $ren,
                'keterangan' => $ket,
                'status' => $status
            );
            $this->db->where('id_detail_izin',$idall);
            $this->db->update('detail_izin',$detail);

            $izin = array(
                'nip_pegawai' => $nip,
                'tgl_izin' => $tgl,
                'jenis' => $jenis
            );

            $this->db->where('id_izin',$idind);
            $this->db->update('izin',$izin);

        $this->db->trans_complete();
    }

    public function hapusizin($idind,$idall){
        $this->db->trans_start();
            $this->db->where('id_detail_izin',$idall);
            $this->db->delete('detail_izin');

            $this->db->where('id_izin',$idind);
            $this->db->delete('izin');
        $this->db->trans_complete();
    }
    // btas akhir module izin


    // module menu panitia
    public function getpanitia(){
        $this->db->select('*');
        $this->db->from('kepanitiaan');
        $this->db->join('detail_kepanitiaan', 'detail_kepanitiaan.id_detail_kepanitiaan = kepanitiaan.id_detail_kepanitiaan');
        $this->db->join('peran_kepanitiaan', 'peran_kepanitiaan.id_peran_kepanitiaan = kepanitiaan.id_peran_kepanitiaan');
        $data = $this->db->get();
        return $data;
    }

    public function addkepanitiaan($nip,$tgl,$nama,$lokasi,$honor,$ket){
        $uniqid = uniqid();
        $this->db->trans_start();
            $detail = array(
                'id_detail_kepanitiaan' => $uniqid, 
                'nip_pegawai' => $nip,
                'honor' => $honor
            );
            $this->db->insert('detail_kepanitiaan', $detail);

            $peran = array(
                'id_peran_kepanitiaan' => $uniqid,
                'nama' => $nama
            );
            $this->db->insert('peran_kepanitiaan', $peran);

            $panitia = array(
                'id_detail_kepanitiaan' => $uniqid,
                'id_peran_kepanitiaan' => $uniqid,
                'tanggal' => $tgl,
                'lokasi' => $lokasi,
                'keterangan' => $ket
            );
            $this->db->insert('kepanitiaan', $panitia);
        $this->db->trans_complete();
    }

    public function panitiaedit($id){
        $this->db->select('*');
        $this->db->from('kepanitiaan');
        $this->db->join('detail_kepanitiaan', 'detail_kepanitiaan.id_detail_kepanitiaan = kepanitiaan.id_detail_kepanitiaan');
        $this->db->join('peran_kepanitiaan', 'peran_kepanitiaan.id_peran_kepanitiaan = kepanitiaan.id_peran_kepanitiaan');
        $this->db->where('id_kepanitiaan', $id); 
        $result = $this->db->get()->row(); 
        return $result;
    }

    public function panitiaupdate($nip,$tgl,$nama,$lokasi,$honor,$ket,$idpanitia,$idall){
        $this->db->trans_start();
            $detail = array(
                'nip_pegawai' => $nip,
                'honor' => $honor
            );
            $this->db->where('id_detail_kepanitiaan',$idall);
            $this->db->update('detail_kepanitiaan',$detail);

            $peran = array(
                'nama' => $nama
            );
            $this->db->where('id_peran_kepanitiaan',$idall);
            $this->db->update('peran_kepanitiaan',$peran);

            $panitia = array(
                'tanggal' => $tgl,
                'lokasi' => $lokasi,
                'keterangan' => $ket
            );
            $this->db->where('id_kepanitiaan',$idpanitia);
            $this->db->update('kepanitiaan',$panitia);
        $this->db->trans_complete();
    }
    public function hapuspanitia($panitia,$idall){
        $this->db->trans_start();
            $this->db->where('id_detail_kepanitiaan',$idall);
            $this->db->delete('detail_kepanitiaan');

            $this->db->where('id_peran_kepanitiaan',$idall);
            $this->db->delete('peran_kepanitiaan');

            $this->db->where('id_kepanitiaan',$panitia);
            $this->db->delete('kepanitiaan');
        $this->db->trans_complete();
    }
    // batas akhir module menu panitia

}
?>