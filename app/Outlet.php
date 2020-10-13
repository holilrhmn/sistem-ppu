<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Outlet extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $keyType = 'string';
    protected $primaryKey = 'nib';
    protected $fillable = [
        'nib', 'name', 'address', 'nama_pendaftar', 'telepon_pendaftar', 'email_pendaftar', 'nik', 'propinsi', 'kab_kota', 'kecamatan', 'kelurahan', 'jumlah_tki_l', 'jumlah_tki_p', 'kbli', 'bangunan', 'mesin_peralatan', 'peralatan_impor', 'pembelian_dan_pematangan_tanah', 'investasi_lain_lain', 'pembelian_pematangan_lain_lain', 'modal_kerja_3_bulanan', 'jumlah_investasisin_p', 'tanggal_pengajuan_pemohonan_berusaha', 'tanggal_terbit_oss', 'jenis_perseroan', 'status_penanaman_modal', 'nama_pemegang_saham', 'total_modal', 'jabatan', 'negara_asal', 'penanggung_jawab', 'gambar', 'latitude', 'longitude', 'creator_id'
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    public $appends = [
        'coordinate', 'map_popup_content',
    ];

    /**
     * Get outlet name_link attribute.
     *
     * @return string
     */
    public function getNameLinkAttribute()
    {
        $title = __('app.show_detail_title', [
            'name' => $this->name, 'type' => __('outlet.outlet'),
        ]);
        $link = '<a href="' . route('outlets.show', $this) . '"';
        $link .= ' title="' . $title . '">';
        $link .= $this->name;
        $link .= '</a>';

        return $link;
    }

    /**
     * Outlet belongs to User model relation.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function creator()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get outlet coordinate attribute.
     *
     * @return string|null
     */
    public function getCoordinateAttribute()
    {
        if ($this->latitude && $this->longitude) {
            return $this->latitude . ', ' . $this->longitude;
        }
    }

    /**
     * Get outlet map_popup_content attribute.
     *
     * @return string
     */
    // public function getMapPopupContentAttribute()
    // {
    //     $mapPopupContent = '';
    //     $mapPopupContent .= '<div class="my-2"><strong>'.__('outlet.name').':</strong><br>'.$this->address.'</div>';
    //     $mapPopupContent .= '<div class="my-2">yyy<strong>'.__('outlet.coordinate').':</strong><br>'.$this->coordinate.'</div>';

    //     return $mapPopupContent;
    // }


    public function getMapPopupContentAttribute()
    {
        $popupContent = "<table>
                            <tr><td align='center' colspan=3><img src=" . asset('images/'.$this->gambar) . " width='200' height='150'></td></tr>
                            <tr><td>Nama Sekolah</td><td>:</td><td>" . $this->name . "</td></tr>
                            <tr><td>No</td><td>:</td><td>" . $this->nib . "</td></tr>
                            <tr><td>Alamat Sekolah</td><td>:</td><td>" . $this->address . "</td></tr>
                            <tr><td>Kode KBLI</td><td>:</td><td>" . $this->kbli . "</td></tr>
                            <tr><td>Kelurahan</td><td>:</td><td>" . $this->kelurahan . "</td></tr>
                            <tr><td>Kecamatan</td><td>:</td><td>" . $this->kecamatan . "</td></tr>
                            <tr><td>No Izin</td><td>:</td><td>" . $this->NOMOR_IZIN . "</td></tr>
                            <tr><td>Tanggal Izin</td><td>:</td><td>" . $this->TANGGAL_IZ . "</td></tr>
                            </tr></table>";

        return $popupContent;
    }

    public function getMapPopupContentFullAttribute()
    {
        //$mapPopupContent = '';
        $mapPopupContent = '<div class="my-2">
                                <center><h5>Data Sekolah</h5></center>
                                <table border=1>
                                    <tr>
                                        <td>
                                            NIB
                                        </td>
                                        <td>
                                            :
                                        </td>
                                        <td>
                                         ' . $this->id . '
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Nama Perseroan
                                        </td>
                                        <td>
                                            :
                                        </td>
                                        <td>
                                         ' . $this->name . '
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Alamat Perseroan
                                        </td>
                                        <td>
                                            :
                                        </td>
                                        <td>
                                         ' . $this->address . '
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Nama Pendaftar
                                        </td>
                                        <td>
                                            :
                                        </td>
                                        <td>
                                         ' . $this->nama_pendaftar . '
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Telepon Pendaftar
                                        </td>
                                        <td>
                                            :
                                        </td>
                                        <td>
                                         ' . $this->telepon_pendaftar . '
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Email Pendaftar
                                        </td>
                                        <td>
                                            :
                                        </td>
                                        <td>
                                         ' . $this->email_pendaftar . '
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            NIK
                                        </td>
                                        <td>
                                            :
                                        </td>
                                        <td>
                                         ' . $this->nik . '
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Kecamatan
                                        </td>
                                        <td>
                                            :
                                        </td>
                                        <td>
                                         ' . $this->kecamatan . '
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Kelurahan
                                        </td>
                                        <td>
                                            :
                                        </td>
                                        <td>
                                         ' . $this->kelurahan . '
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Jumlah TKI Laki-Laki
                                        </td>
                                        <td>
                                            :
                                        </td>
                                        <td>
                                         ' . $this->jumlah_tki_l . '
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Jumlah TKI Perempuan
                                        </td>
                                        <td>
                                            :
                                        </td>
                                        <td>
                                         ' . $this->njumlah_tki_pame . '
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            KBLI
                                        </td>
                                        <td>
                                            :
                                        </td>
                                        <td>
                                         ' . $this->kbli . '
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Bangunan
                                        </td>
                                        <td>
                                            :
                                        </td>
                                        <td>
                                         ' . $this->bangunan . '
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Mesin Peralatan
                                        </td>
                                        <td>
                                            :
                                        </td>
                                        <td>
                                         ' . $this->mesin_peralatan . '
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Mesin Peralatan Impor
                                        </td>
                                        <td>
                                            :
                                        </td>
                                        <td>
                                         ' . $this->peralatan_impor . '
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Pembelian dan Pematangan Tanah
                                        </td>
                                        <td>
                                            :
                                        </td>
                                        <td>
                                         ' . $this->pembelian_dan_pematangan_tanah . '
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Investasi Lain-lain
                                        </td>
                                        <td>
                                            :
                                        </td>
                                        <td>
                                         ' . $this->investasi_lain_lain . '
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Pembelian dan Pematangan Lain-lain
                                        </td>
                                        <td>
                                            :
                                        </td>
                                        <td>
                                         ' . $this->pembelian_pematangan_lain_lain . '
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Modal Kerja 3 Bulanan
                                        </td>
                                        <td>
                                            :
                                        </td>
                                        <td>
                                         ' . $this->modal_kerja_3_bulanan . '
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Jumlah Investasi
                                        </td>
                                        <td>
                                            :
                                        </td>
                                        <td>
                                         ' . $this->jumlah_investasisin_p . '
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Tanggal Pengajuan dan Permohonan Berusaha
                                        </td>
                                        <td>
                                            :
                                        </td>
                                        <td>
                                         ' . $this->tanggal_pengajuan_pemohonan_berusaha . '
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Tanggal Terbit OSS
                                        </td>
                                        <td>
                                            :
                                        </td>
                                        <td>
                                         ' . $this->tanggal_terbit_oss . '
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Jenis Perseroan
                                        </td>
                                        <td>
                                            :
                                        </td>
                                        <td>
                                         ' . $this->jenis_perseroan . '
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Status Penanaman Modal
                                        </td>
                                        <td>
                                            :
                                        </td>
                                        <td>
                                         ' . $this->status_penanaman_modal . '
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Nama Pemegang Saham
                                        </td>
                                        <td>
                                            :
                                        </td>
                                        <td>
                                         ' . $this->nama_pemegang_saham . '
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Total Modal
                                        </td>
                                        <td>
                                            :
                                        </td>
                                        <td>
                                         ' . $this->total_modal . '
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Jabatan
                                        </td>
                                        <td>
                                            :
                                        </td>
                                        <td>
                                         ' . $this->jabatan . '
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Negara Asal
                                        </td>
                                        <td>
                                            :
                                        </td>
                                        <td>
                                         ' . $this->negara_asal . '
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Penanggung Jawab
                                        </td>
                                        <td>
                                            :
                                        </td>
                                        <td>
                                         ' . $this->penanggung_jawab . '
                                        </td>
                                    </tr>
                                </table>
                            </div>';
        //$mapPopupContent .= '<div class="my-2">yyy<strong>'.__('outlet.coordinate').':</strong><br>'.$this->coordinate.'</div>';

        return $mapPopupContent;
    }
}
