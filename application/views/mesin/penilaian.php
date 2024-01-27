<style>
    .silver{
        background-color:#ebeced;
    }
</style>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span></button>
    <h4 class="modal-title">Equipment Inspection Sheet</h4>
<div class="modal-body">
    <div class="row">
        <div class="col-md-6">
            <table class="table table-penilaian">
                <tbody>
                    <tr>
                        <td>Rank</td>
                        <td width="5px">:</td>
                        <td>A</td>
                    </tr>
                    <tr>
                        <td>Section</td>
                        <td width="5px">:</td>
                        <td>Mailling</td>
                    </tr>
                    <tr>
                        <td>Section</td>
                        <td width="5px">:</td>
                        <td>Banbury</td>
                        <td>Equip No</td>
                        <td width="5px">:</td>
                        <td>M10201-1</td>
                        <td>Cycle</td>
                        <td width="5px">:</td>
                        <td>6 Month</td>
                    </tr>
                    <tr>
                        <td>Part</td>
                        <td>:</td>
                        <td>
                            <select name="" id="" class="form-control">
                                    <option value="">-- Pilih Part --</option>
                                <?php foreach ($part as $row) : ?>
                                    <option value="<?=$row->id?>"><?=$row->part?></option>
                                <?php endforeach; ?>
                            </select>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="col-md-3"></div>
        <div class="col-md-3">
            <table class="table">
                <tbody>
                    <tr>
                        <td>Inspection Day</td>
                        <td width="5px">:</td>
                        <td><?=date('Y-m-d H:i:s')?></td>
                    </tr>
                    <tr>
                        <td>Inspector</td>
                        <td width="5px">:</td>
                        <td><?= $this->session->userdata("full_name");?></td>
                    </tr>
                    <tr>
                        <td>Judgement</td>
                        <td width="5px">:</td>
                        <td>
                            <i class="fa fa-circle-o"></i> No Abnormality <br>
                            <i class="fa fa-exclamation-triangle"></i> Cautious <br>
                            <i class="fa fa-close"></i> Abnormal
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="row">
        <table class="table table-bordered" id="table-penilaian">
            <thead>
                <tr>
                    <th style="vertical-align : middle;text-align:center;">Part</th>
                    <th style="vertical-align : middle;text-align:center;">Inspection Part</th>
                    <th style="vertical-align : middle;text-align:center;">Item</th>
                    <th style="vertical-align : middle;text-align:center;">Method</th>
                    <th style="vertical-align : middle;text-align:center;">Determation Standard</th>
                    <th style="vertical-align : middle;text-align:center;">Measurement Data</th>
                    <th style="vertical-align : middle;text-align:center;">Judgement</th>
                    <th style="vertical-align : middle;text-align:center;">Measure</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td rowspan="14" style="vertical-align : middle;text-align:center; ">
                        Hydrolic Unit
                    </td>
                </tr>
                <tr>
                    <td>Pompa oli</td>
                    <td>Pressure oli dan kebocoran</td>
                    <td>Lihat dan cek kebocoran</td>
                    <td>5 ~ 6 Mpa dan tidak ada kebocoran</td>
                    <td>
                        <input type="text" name="hydrolic_unit_pompa_oli_md" id="hydrolic_unit_pompa_oli_md" class="form-control">
                    </td>
                    <td>
                        <select name="hydrolic_unit_pompa_oli_j" id="hydrolic_unit_pompa_oli_j" class="form-control">
                            <option value="1">No Abnormality</option>
                            <option value="2">Cautious</option>
                            <option value="3">Abnormal</option>
                        </select>
                    </td>
                    <td>
                        <input type="text" name="hydrolic_unit_pompa_oli_m" id="hydrolic_unit_pompa_oli_m" class="form-control">
                    </td>
                </tr>
                <tr>
                    <td>Accumulator</td>
                    <td>Kerusakan karet koupling</td>
                    <td>Cek kerusakan karet koupling</td>
                    <td>Tidak ada kerusakan karet koupling</td>
                <td>
                        <input type="text" name="hydrolic_accumulator_md" id="hydrolic_accumulator_md" class="form-control">
                    </td>
                    <td>
                        <select name="hydrolic_accumulator_j" id="hydrolic_accumulator_j" class="form-control">
                            <option value="1">No Abnormality</option>
                            <option value="2">Cautious</option>
                            <option value="3">Abnormal</option>
                        </select>
                    </td>
                    <td>
                        <input type="text" name="hydrolic_accumulator_m" id="hydrolic_accumulator_m" class="form-control">
                    </td>
                </tr>
                <tr>
                    <td>Body tangki oli</td>
                    <td>Kerusakan dan kebocoran oli</td>
                    <td>Lihat dan cek</td>
                    <td>Tidak ada kebocoran dan kerusakan</td>
                <td>
                        <input type="text" name="hydrolic_body_tangki_oli_md" id="hydrolic_body_tangki_oli_md" class="form-control">
                    </td>
                    <td>
                        <select name="hydrolic_body_tangki_oli_j" id="hydrolic_body_tangki_oli_j" class="form-control">
                            <option value="1">No Abnormality</option>
                            <option value="2">Cautious</option>
                            <option value="3">Abnormal</option>
                        </select>
                    </td>
                    <td>
                        <input type="text" name="hydrolic_body_tangki_oli_m" id="hydrolic_body_tangki_oli_m" class="form-control">
                    </td>
                </tr>
                <tr>
                    <td>Level oli, temperature</td>
                    <td>Quantity oli, suhu oli</td>
                    <td>Lihat dan cek dengan termometer</td>
                    <td> Max 50 oC, batas level atas</td>
                <td>
                        <input type="text" name="hydrolic_level_oli_temperature_md" id="hydrolic_level_oli_temperature_md" class="form-control">
                    </td>
                    <td>
                        <select name="hydrolic_level_oli_temperature_j" id="hydrolic_level_oli_temperature_j" class="form-control">
                            <option value="1">No Abnormality</option>
                            <option value="2">Cautious</option>
                            <option value="3">Abnormal</option>
                        </select>
                    </td>
                    <td>
                        <input type="text" name="hydrolic_level_oli_temperature_m" id="hydrolic_level_oli_temperature_m" class="form-control">
                    </td>
                </tr>
                <tr>
                    <td>Pressure gauge</td>
                    <td>Kerusakan, kebocoran oli dan titik nol</td>
                    <td>Lihat kerusakan dan cek kebocoran</td>
                    <td>Tidak ada kerusakan, akurasi titik nol</td>
                <td>
                        <input type="text" name="hydrolic_level_pressure_gauge_md"  id="hydrolic_level_pressure_gauge_md" class="form-control">
                    </td>
                    <td>
                        <select name="hydrolic_level_pressure_gauge_j" id="hydrolic_level_pressure_gauge_j" class="form-control">
                            <option value="1">No Abnormality</option>
                            <option value="2">Cautious</option>
                            <option value="3">Abnormal</option>
                        </select>
                    </td>
                    <td>
                        <input type="text" name="hydrolic_level_pressure_gauge_m" id="hydrolic_level_pressure_gauge_m" class="form-control">
                    </td>
                </tr>
                <tr>
                    <td>Pressure switch</td>
                    <td>Kerusakan dan settingan</td>
                    <td>Lihat kerusakan dan settingan</td>
                    <td>Tidak ada kerusakan </td>
                <td>
                        <input type="text" name="hydrolic_level_pressure_switch_md" id="hydrolic_level_pressure_switch_md" class="form-control">
                    </td>
                    <td>
                        <select name="hydrolic_level_pressure_switch_j" id="hydrolic_level_pressure_switch_j" class="form-control">
                            <option value="1">No Abnormality</option>
                            <option value="2">Cautious</option>
                            <option value="3">Abnormal</option>
                        </select>
                    </td>
                    <td>
                        <input type="text" name="hydrolic_level_pressure_switch_m" id="hydrolic_level_pressure_switch_m" class="form-control">
                    </td>
                </tr>
                <tr>
                    <td>Solenoid valve latch</td>
                    <td>Kebocoran oli </td>
                    <td>Lihat kebocoran dan kerusakan </td>
                    <td>Tidak ada kebocoran dan kerusakan</td>
                    <td>
                        <input type="text" name="hydrolic_level_solenoid_valve_latch_md" id="hydrolic_level_solenoid_valve_latch_md" class="form-control">
                    </td>
                    <td>
                        <select name="hydrolic_level_solenoid_valve_latch_j" id="hydrolic_level_solenoid_valve_latch_j" class="form-control">
                            <option value="1">No Abnormality</option>
                            <option value="2">Cautious</option>
                            <option value="3">Abnormal</option>
                        </select>
                    </td>
                    <td>
                        <input type="text" name="hydrolic_level_solenoid_valve_latch_m" id="hydrolic_level_solenoid_valve_latch_m" class="form-control">
                    </td>
                </tr>
                <tr>
                    <td>Directional valve drop door</td>
                    <td>Kebocoran oli </td>
                    <td>Lihat kebocoran dan kerusakan </td>
                    <td>Tidak ada kebocoran dan kerusakan</td>
                <td>
                        <input type="text" name="hydrolic_level_directional_valve_drop_door_md" id="hydrolic_level_directional_valve_drop_door_md" class="form-control">
                    </td>
                    <td>
                        <select name="hydrolic_level_directional_valve_drop_door_j" id="hydrolic_level_directional_valve_drop_door_j" class="form-control">
                            <option value="1">No Abnormality</option>
                            <option value="2">Cautious</option>
                            <option value="3">Abnormal</option>
                        </select>
                    </td>
                    <td>
                        <input type="text" name="hydrolic_level_directional_valve_drop_door_m" 
                        id="hydrolic_level_directional_valve_drop_door_m"
                        class="form-control">
                    </td>
                </tr>
                <tr>
                    <td>Relief valve</td>
                    <td>Kerusakan dan tekanan oli</td>
                    <td>Cek kerusakan dan kebocoran oli</td>
                    <td>Tidak ada kerusakan, tekanan 6 Mpa</td>
                <td>
                        <input type="text" name="hydrolic_level_relief_valve_md" id="hydrolic_level_relief_valve_md" class="form-control">
                    </td>
                    <td>
                        <select name="hydrolic_level_relief_valve_j" id="hydrolic_level_relief_valve_j" class="form-control">
                            <option value="1">No Abnormality</option>
                            <option value="2">Cautious</option>
                            <option value="3">Abnormal</option>
                        </select>
                    </td>
                    <td>
                        <input type="text" name="hydrolic_level_relief_valve_m" id="hydrolic_level_relief_valve_m" class="form-control">
                    </td>
                </tr>
                <tr>
                    <td>Grease pump</td>
                    <td>Kerusakan dan quantity grease</td>
                    <td>Cek kerusakan dan quantity grease</td>
                    <td>Tidak ada kerusakan, 1/4 bagian tabung</td>
                <td>
                        <input type="text" name="hydrolic_level_grease_pump_md" id="hydrolic_level_grease_pump_md" class="form-control">
                    </td>
                    <td>
                        <select name="hydrolic_level_grease_pump_j" id="hydrolic_level_grease_pump_j" class="form-control">
                            <option value="1">No Abnormality</option>
                            <option value="2">Cautious</option>
                            <option value="3">Abnormal</option>
                        </select>
                    </td>
                    <td>
                        <input type="text" name="hydrolic_level_grease_pump_m" id="hydrolic_level_grease_pump_m" class="form-control">
                    </td>
                </tr>
                <tr>
                    <td>Piping, flexible hose grease</td>
                    <td>Kebocoran grease</td>
                    <td>Lihat dan cek kebocoran</td>
                    <td>Tidak ada kebocoran</td>
                <td>
                        <input type="text" name="hydrolic_level_piping_flexible_hose_grease_md" id="hydrolic_level_piping_flexible_hose_grease_md" class="form-control">
                    </td>
                    <td>
                        <select name="hydrolic_level_piping_flexible_hose_grease_j" id="hydrolic_level_piping_flexible_hose_grease_j" class="form-control">
                            <option value="1">No Abnormality</option>
                            <option value="2">Cautious</option>
                            <option value="3">Abnormal</option>
                        </select>
                    </td>
                    <td>
                        <input type="text" name="hydrolic_level_piping_flexible_hose_grease_m" id="hydrolic_level_piping_flexible_hose_grease_m" class="form-control">
                    </td>
                </tr>
                <tr>
                    <td>Piping, flexible hose oli</td>
                    <td>Kebocoran oli, keretakan, perubahan bentuk</td>
                    <td>Lihat dan cek kebocoran,keretakan dan deformasi</td>
                    <td>Tidak ada kebocoran,deformasi dan keretakan</td>
                <td>
                        <input type="text" name="hydrolic_level_piping_flexible_hose_oli_md" id="hydrolic_level_piping_flexible_hose_oli_md" class="form-control">
                    </td>
                    <td>
                        <select name="hydrolic_level_piping_flexible_hose_oli_j" id="hydrolic_level_piping_flexible_hose_oli_j" class="form-control">
                            <option value="1">No Abnormality</option>
                            <option value="2">Cautious</option>
                            <option value="3">Abnormal</option>
                        </select>
                    </td>
                    <td>
                        <input type="text" name="hydrolic_level_piping_flexible_hose_oli_m" 
                        id="hydrolic_level_piping_flexible_hose_oli_m" class="form-control">
                    </td>
                </tr>
                <tr>
                    <td>Suction filter</td>
                    <td>Kotoran dan kerusakan</td>
                    <td>Cek dan bersihkan 1 tahun sekali</td>
                    <td>Bersih dan tidak ada kerusakan</td>
                <td>
                        <input type="text" name="hydrolic_level_suction_filter_md" id="hydrolic_level_suction_filter_md" class="form-control">
                    </td>
                    <td>
                        <select name="hydrolic_level_suction_filter_j" id="hydrolic_level_suction_filter_j" class="form-control">
                            <option value="1">No Abnormality</option>
                            <option value="2">Cautious</option>
                            <option value="3">Abnormal</option>
                        </select>
                    </td>
                    <td>
                        <input type="text" name="hydrolic_level_suction_filter_m" id="hydrolic_level_suction_filter_m" class="form-control">
                    </td>
                </tr>

                <!-- Lubricating Circuit -->    
                <tr class="silver">
                    <td rowspan="9" style="vertical-align : middle;text-align:center;">Lubricating Circuit</td>
                </tr>

                <tr class="silver">
                    <td>Rantai dan sprocket</td>
                    <td>Tension , keausan, grease up</td>
                    <td>Cek kenduran, keausan dan lumasi</td>
                    <td>Tidak ada kekenduran, keausan dan terlumasi</td>
                <td>
                        <input type="text" name="lubricating_circuit_rantai_dan_sprocket_md" id="lubricating_circuit_rantai_dan_sprocket_md"  class="form-control">
                    </td>
                    <td>
                        <select name="lubricating_circuit_rantai_dan_sprocket_j" id="lubricating_circuit_rantai_dan_sprocket_j" class="form-control">
                            <option value="1">No Abnormality</option>
                            <option value="2">Cautious</option>
                            <option value="3">Abnormal</option>
                        </select>
                    </td>
                    <td>
                        <input type="text" name="lubricating_circuit_rantai_dan_sprocket_m"  id="lubricating_circuit_rantai_dan_sprocket_m" class="form-control">
                    </td>
                </tr>
                <tr class="silver">
                    <td>Tangki oli for dust stop </td>
                    <td>Kebocoran oli , kerusakan tangki</td>
                    <td>Cek kebocoran dan kerusakan tangki</td>
                    <td>Tidak ada kebocoran dan kerusakan</td>
                <td>
                        <input type="text" name="lubricating_circuit_tangki_oli_for_dust_stop_md"  id="lubricating_circuit_tangki_oli_for_dust_stop_md" class="form-control">
                    </td>
                    <td>
                        <select name="lubricating_circuit_tangki_oli_for_dust_stop_j" id="lubricating_circuit_tangki_oli_for_dust_stop_j" class="form-control">
                            <option value="1">No Abnormality</option>
                            <option value="2">Cautious</option>
                            <option value="3">Abnormal</option>
                        </select>
                    </td>
                    <td>
                        <input type="text" name="lubricating_circuit_tangki_oli_for_dust_stop_m" id="lubricating_circuit_tangki_oli_for_dust_stop_m" class="form-control">
                    </td>
                </tr>
                <tr class="silver">
                    <td>Oil lubricator for dust stop</td>
                    <td>Kebocoran dan level oil lubricator</td>
                    <td>Cek kebocoran dan cek level oli</td>
                    <td>Tidak ada kebocoran, batas atas level oli</td>
                <td>
                        <input type="text" name="lubricating_circuit_oil_lubricator_for_dust_stop_md" id="lubricating_circuit_oil_lubricator_for_dust_stop_md" class="form-control">
                    </td>
                    <td>
                        <select name="lubricating_circuit_oil_lubricator_for_dust_stop_j" id="lubricating_circuit_oil_lubricator_for_dust_stop_j" class="form-control">
                            <option value="1">No Abnormality</option>
                            <option value="2">Cautious</option>
                            <option value="3">Abnormal</option>
                        </select>
                    </td>
                    <td>
                        <input type="text" name="lubricating_circuit_oil_lubricator_for_dust_stop_m" 
                        id="lubricating_circuit_oil_lubricator_for_dust_stop_m" class="form-control">
                    </td>
                </tr>
                <tr class="silver">
                    <td>Tangki oli for process oil</td>
                    <td>Kebocoran oli , kerusakan tangki</td>
                    <td>Cek kebocoran dan kerusakan tangki</td>
                    <td>Tidak ada kebocoran dan kerusakan</td>
                <td>
                        <input type="text" name="lubricating_circuit_tangki_oli_for_process_oil_md" 
                        id="lubricating_circuit_tangki_oli_for_process_oil_md" class="form-control">
                    </td>
                    <td>
                        <select name="lubricating_circuit_tangki_oli_for_process_oil_j" id="lubricating_circuit_tangki_oli_for_process_oil_j" class="form-control">
                            <option value="1">No Abnormality</option>
                            <option value="2">Cautious</option>
                            <option value="3">Abnormal</option>
                        </select>
                    </td>
                    <td>
                        <input type="text" name="lubricating_circuit_tangki_oli_for_process_oil_m" id="lubricating_circuit_tangki_oli_for_process_oil_m" class="form-control">
                    </td>
                </tr>
                <tr class="silver">
                    <td>Oil lubricator for process oil</td>
                    <td>Kebocoran dan level oil lubricator</td>
                    <td>Cek kebocoran dan cek level oli</td>
                    <td>Tidak ada kebocoran, batas atas level oli</td>
                <td>
                        <input type="text" name="lubricating_circuit_oil_lubricator_for_process_oil_md"id="lubricating_circuit_oil_lubricator_for_process_oil_md" class="form-control">
                    </td>
                    <td>
                        <select name="lubricating_circuit_oil_lubricator_for_process_oil_j" id="lubricating_circuit_oil_lubricator_for_process_oil_j" class="form-control">
                            <option value="1">No Abnormality</option>
                            <option value="2">Cautious</option>
                            <option value="3">Abnormal</option>
                        </select>
                    </td>
                    <td>
                        <input type="text" name="lubricating_circuit_oil_lubricator_for_process_oil_m"
                        id="lubricating_circuit_oil_lubricator_for_process_oil_m" class="form-control">
                    </td>
                </tr>
                <tr class="silver">
                    <td>Supply pompa for dust stop</td>
                    <td>Suara abnormal, kebocoran oli</td>
                    <td>Dengar suara abnormal, cek kebocoran</td>
                    <td>Tidak ada suara abnormal, dan kebocoran</td>
                <td>
                        <input type="text" name="lubricating_circuit_supply_pompa_for_dust_stop_md" id="lubricating_circuit_supply_pompa_for_dust_stop_md" class="form-control">
                    </td>
                    <td>
                        <select name="lubricating_circuit_supply_pompa_for_dust_stop_j" id="lubricating_circuit_supply_pompa_for_dust_stop_j" class="form-control">
                            <option value="1">No Abnormality</option>
                            <option value="2">Cautious</option>
                            <option value="3">Abnormal</option>
                        </select>
                    </td>
                    <td>
                        <input type="text" name="lubricating_circuit_supply_pompa_for_dust_stop_m"
                        id="lubricating_circuit_supply_pompa_for_dust_stop_m" class="form-control">
                    </td>
                </tr>
                <tr class="silver">
                    <td>Supply pompa for process oil</td>
                    <td>Suara abnormal, kebocoran oli</td>
                    <td>Dengar suara abnormal, cek kebocoran</td>
                    <td>Tidak ada suara abnormal, dan kebocoran</td>
                <td>
                        <input type="text" name="lubricating_circuit_supply_pompa_for_process_oil_md"
                        id="lubricating_circuit_supply_pompa_for_process_oil_md" class="form-control">
                    </td>
                    <td>
                        <select name="lubricating_circuit_supply_pompa_for_process_oil_j" id="lubricating_circuit_supply_pompa_for_process_oil_j" class="form-control">
                            <option value="1">No Abnormality</option>
                            <option value="2">Cautious</option>
                            <option value="3">Abnormal</option>
                        </select>
                    </td>
                    <td>
                        <input type="text" name="lubricating_circuit_supply_pompa_for_process_oil_m"
                        id="lubricating_circuit_supply_pompa_for_process_oil_m" class="form-control">
                    </td>
                </tr>
                <tr class="silver">
                    <td>Piping, flexible hose oli</td>
                    <td>Kebocoran oli, keretakan, perubahan bentuk</td>
                    <td>Lihat dan cek kebocoran,keretakan dan deformasi</td>
                    <td>Tidak ada kebocoran,deformasi dan keretakan</td>
                <td>
                        <input type="text" name="lubricating_circuit_piping_flexible_hose_oli_md"
                        id="lubricating_circuit_piping_flexible_hose_oli_md" class="form-control">
                    </td>
                    <td>
                        <select name="lubricating_circuit_piping_flexible_hose_oli_j" id="lubricating_circuit_piping_flexible_hose_oli_j" class="form-control">
                            <option value="1">No Abnormality</option>
                            <option value="2">Cautious</option>
                            <option value="3">Abnormal</option>
                        </select>
                    </td>
                    <td>
                        <input type="text" name="lubricating_circuit_piping_flexible_hose_oli_m" id="lubricating_circuit_piping_flexible_hose_oli_m" class="form-control">
                    </td>
                </tr>

                <!-- Pneumatik circuit -->
                <tr>
                    <td rowspan="3" style="vertical-align : middle;text-align:center;">Pneumatik circuit</td>
                    <td>Regulator angin</td>
                    <td>Tekanan, kebocoran, kebersihan filter</td>
                    <td>Lihat, cek tekanan dan kebocoran </td>
                    <td> 0.4 ñ 0.05 Mpa dan tidak ada kebocoran</td>	
                <td>
                        <input type="text" name="pneumatik_circuit_regulator_angin_md" 
                        id="pneumatik_circuit_regulator_angin_md" class="form-control">
                    </td>
                    <td>
                        <select name="pneumatik_circuit_regulator_angin_j" id="pneumatik_circuit_regulator_angin_j" class="form-control">
                            <option value="1">No Abnormality</option>
                            <option value="2">Cautious</option>
                            <option value="3">Abnormal</option>
                        </select>
                    </td>
                    <td>
                        <input type="text" name="pneumatik_circuit_regulator_angin_m" 
                        id="pneumatik_circuit_regulator_angin_m" class="form-control">
                    </td>
                </tr>

                <tr>
                    <td>Regulator angin for AP Valve</td>
                    <td>Tekanan dan kebocoran angin</td>
                    <td>Cek tekanan dan kebocoran angin</td>
                    <td>0.5 ~ 0.7 Mpa dan tidak ada kebocoran</td>
                <td>
                        <input type="text" name="pneumatik_circuit_regulator_angin_for_ap_valve_md" 
                        id="pneumatik_circuit_regulator_angin_for_ap_valve_md" class="form-control">
                    </td>
                    <td>
                        <select name="pneumatik_circuit_regulator_angin_for_ap_valve_j" id="pneumatik_circuit_regulator_angin_for_ap_valve_j" class="form-control">
                            <option value="1">No Abnormality</option>
                            <option value="2">Cautious</option>
                            <option value="3">Abnormal</option>
                        </select>
                    </td>
                    <td>
                        <input type="text" name="pneumatik_circuit_regulator_angin_for_ap_valve_m" id="pneumatik_circuit_regulator_angin_for_ap_valve_m" class="form-control">
                    </td>
                </tr>

                <tr>
                    <td>Piping, flexible hose air</td>
                    <td>Kebocoran angin   </td>
                    <td>Lihat dan cek kebocoran</td>
                    <td>Tidak ada kebocoran</td>
                <td>
                        <input type="text" name="pneumatik_circuit_piping_flexible_hose_air_md" id="pneumatik_circuit_piping_flexible_hose_air_md"  class="form-control">
                    </td>
                    <td>
                        <select name="pneumatik_circuit_piping_flexible_hose_air_j" id="pneumatik_circuit_piping_flexible_hose_air_j" class="form-control">
                            <option value="1">No Abnormality</option>
                            <option value="2">Cautious</option>
                            <option value="3">Abnormal</option>
                        </select>
                    </td>
                    <td>
                        <input type="text" name="pneumatik_circuit_piping_flexible_hose_air_m"
                        id="pneumatik_circuit_piping_flexible_hose_air_m" class="form-control">
                    </td>
                </tr>

                <!-- Water circuit -->
                <tr class="silver">
                    <td rowspan="3" style="vertical-align : middle;text-align:center;">Water circuit</td>
                    <td>3 Way valve </td>
                    <td>Kebocoran dan proses kerja </td>
                    <td>Cek kebocoran dan proses kerja</td>
                    <td>Tidak ada kebocoran air, bekerja normal</td>
                <td>
                        <input type="text" name="water_circuit_3_way_valve_md" id="water_circuit_3_way_valve_md" class="form-control">
                    </td>
                    <td>
                        <select name="water_circuit_3_way_valve_j" id="water_circuit_3_way_valve_j" class="form-control">
                            <option value="1">No Abnormality</option>
                            <option value="2">Cautious</option>
                            <option value="3">Abnormal</option>
                        </select>
                    </td>
                    <td>
                        <input type="text" name="water_circuit_3_way_valve_m" id="water_circuit_3_way_valve_m" class="form-control">
                    </td>
                </tr>

                <tr class="silver">
                    <td>Tekanan air</td>
                    <td>Tekanan air pada saat bekerja</td>
                    <td>Lihat pressure gauge</td>
                    <td>Tekanan air 0.2 ~ 0.3 Mpa</td>
                <td>
                        <input type="text" name="water_circuit_tekanan_air_md" id="water_circuit_tekanan_air_md" class="form-control">
                    </td>
                    <td>
                        <select name="water_circuit_tekanan_air_j" id="water_circuit_tekanan_air_j" class="form-control">
                            <option value="1">No Abnormality</option>
                            <option value="2">Cautious</option>
                            <option value="3">Abnormal</option>
                        </select>
                    </td>
                    <td>
                        <input type="text" name="water_circuit_tekanan_air_m" 
                        id="water_circuit_tekanan_air_m" class="form-control">
                    </td>
                </tr>

                <tr class="silver">
                    <td>Piping, flexible hose air</td>
                    <td>Kebocoran air   </td>
                    <td>Lihat dan cek kebocoran</td>
                    <td>Tidak ada kebocoran</td>
                <td>
                        <input type="text" name="water_circuit_piping_flexible_hose_air_md" 
                        id="water_circuit_piping_flexible_hose_air_md" class="form-control">
                    </td>
                    <td>
                        <select name="water_circuit_piping_flexible_hose_air_j" id="water_circuit_piping_flexible_hose_air_j" class="form-control">
                            <option value="1">No Abnormality</option>
                            <option value="2">Cautious</option>
                            <option value="3">Abnormal</option>
                        </select>
                    </td>
                    <td>
                        <input type="text" name="water_circuit_piping_flexible_hose_air_m" 
                        id="water_circuit_piping_flexible_hose_air_m" class="form-control">
                    </td>
                </tr>
                                    
                <!-- Drive Unit -->
                <tr>
                    <td rowspan="3" style="vertical-align : middle;text-align:center;">Drive Unit</td>
                    <td>Koupling flange</td>
                    <td>Kekenduran baut, keausan lubang baut</td>
                    <td>Cek kekenduran dan keausan</td>
                    <td>Tidak ada kekenduran baut dan keausan</td>
                <td>
                        <input type="text" name="drive_unit_koupling_flange_md" id="drive_unit_koupling_flange_md" class="form-control">
                    </td>
                    <td>
                        <select name="drive_unit_koupling_flange_j" id="drive_unit_koupling_flange_j" class="form-control">
                            <option value="1">No Abnormality</option>
                            <option value="2">Cautious</option>
                            <option value="3">Abnormal</option>
                        </select>
                    </td>
                    <td>
                        <input type="text" name="drive_unit_koupling_flange_m" id="drive_unit_koupling_flange_m" class="form-control">
                    </td>
                </tr>

                <tr>
                    <td>Gear Reducer</td>
                    <td>Suara abnormal, level oli</td>
                    <td>Dengar suara abnormal, cek level oli</td>
                    <td>Tidak ada suara abnormal, batas atas level oli</td>
                <td>
                        <input type="text" name="drive_unit_gear_reducer_md" id="drive_unit_gear_reducer_md" class="form-control">
                    </td>
                    <td>
                        <select name="drive_unit_gear_reducer_j" id="drive_unit_gear_reducer_j" class="form-control">
                            <option value="1">No Abnormality</option>
                            <option value="2">Cautious</option>
                            <option value="3">Abnormal</option>
                        </select>
                    </td>
                    <td>
                        <input type="text" name="drive_unit_gear_reducer_m" id="drive_unit_gear_reducer_m" class="form-control">
                    </td>
                </tr>

                <tr>
                    <td>Connecting gear</td>
                    <td>Pengikisan dan pelumasan</td>
                    <td>Cek pengikisan dan lumasi</td>
                    <td>Max pengikisan 1 mm dan terlumasi</td>
                <td>
                        <input type="text" name="drive_unit_connecting_gear_md" id="drive_unit_connecting_gear_md" class="form-control">
                    </td>
                    <td>
                        <select name="drive_unit_connecting_gear_j" id="drive_unit_connecting_gear_j" class="form-control">
                            <option value="1">No Abnormality</option>
                            <option value="2">Cautious</option>
                            <option value="3">Abnormal</option>
                        </select>
                    </td>
                    <td>
                        <input type="text" name="drive_unit_connecting_gear_m" id="drive_unit_connecting_gear_m" class="form-control">
                    </td>
                </tr>

                <!-- Main body -->
                    <!-- Drop door -->
                <tr class="silver">
                    <td rowspan="16" style="vertical-align : middle;text-align:center;">Main body</td>
                    <td rowspan="6" style="vertical-align : middle;">Drop door</td>
                    <td>Rotary joint for droop door</td>
                    <td>Kebocoran air dan pelumasan</td>
                    <td>Lihat kebocoran air dan lumasi</td>
                <td>
                        <input type="text" name="main_body_drop_door_1_md" id="main_body_drop_door_1_md" class="form-control">
                    </td>
                    <td>
                        <select name="main_body_drop_door_1_j" id="main_body_drop_door_1_j" class="form-control">
                            <option value="1">No Abnormality</option>
                            <option value="2">Cautious</option>
                            <option value="3">Abnormal</option>
                        </select>
                    </td>
                    <td>
                        <input type="text" name="main_body_drop_door_1_m" id="main_body_drop_door_1_m" class="form-control">
                    </td>
                </tr>

                <tr class="silver">
                    <td>Hidrolik rotary actuator</td>
                    <td>Kebocoran oli, tekanan oli, open angle</td>
                    <td>Tidak ada kebocoran, max 0.65 Mpa, 135o</td>
                <td>
                        <input type="text" name="main_body_drop_door_2_md" id="main_body_drop_door_2_md"  class="form-control">
                    </td>
                    <td>
                        <select name="main_body_drop_door_2_j" id="main_body_drop_door_2_j" class="form-control">
                            <option value="1">No Abnormality</option>
                            <option value="2">Cautious</option>
                            <option value="3">Abnormal</option>
                        </select>
                    </td>
                    <td>
                        <input type="text" name="main_body_drop_door_2_m" id="main_body_drop_door_2_m" class="form-control">
                    </td>
                </tr>

                <tr class="silver">
                    <td>Hidrolik silinder latch, limit switch</td>
                    <td>Kebocoran oli, latch stroke</td>
                    <td>Tidak ada kebocoran, max 85 mm</td>
                <td>
                        <input type="text" name="main_body_drop_door_3_md" id="main_body_drop_door_3_md" class="form-control">
                    </td>
                    <td>
                        <select name="main_body_drop_door_3_j" id="main_body_drop_door_3_j" class="form-control">
                            <option value="1">No Abnormality</option>
                            <option value="2">Cautious</option>
                            <option value="3">Abnormal</option>
                        </select>
                    </td>
                    <td>
                        <input type="text" name="main_body_drop_door_3_m" id="main_body_drop_door_3_m" class="form-control">
                    </td>
                </tr>

                <tr class="silver">
                    <td>Piping, flexible hose oli</td>
                    <td>Lihat dan cek kebocoran</td>
                    <td>Tidak ada kebocoran</td>
                    <td>
                        <input type="text" name="main_body_drop_door_4_md" id="main_body_drop_door_4_md" class="form-control">
                    </td>
                    <td>
                        <select name="main_body_drop_door_4_j" id="main_body_drop_door_4_j" class="form-control">
                            <option value="1">No Abnormality</option>
                            <option value="2">Cautious</option>
                            <option value="3">Abnormal</option>
                        </select>
                    </td>
                    <td>
                        <input type="text" name="main_body_drop_door_4_m" id="main_body_drop_door_4_m" class="form-control">
                    </td>
                </tr>

                <tr class="silver">
                    <td>Ram weight silinder hidrolik</td>
                    <td>Cek kebocoran oli</td>
                    <td>Tidak ada kebocoran oli</td>
                <td>
                        <input type="text" name="main_body_drop_door_5_md" id="main_body_drop_door_5_md" class="form-control">
                    </td>
                    <td>
                        <select name="main_body_drop_door_5_j" id="main_body_drop_door_5_j" class="form-control">
                            <option value="1">No Abnormality</option>
                            <option value="2">Cautious</option>
                            <option value="3">Abnormal</option>
                        </select>
                    </td>
                    <td>
                        <input type="text" name="main_body_drop_door_5_m" id="main_body_drop_door_5_m"  class="form-control">
                    </td>
                </tr>

                <tr class="silver">
                    <td>Guide Shaft Ram Weight</td>
                    <td>Gerakan Guide shaft ram weight lumasi</td>
                    <td>Bergerak lancar, terlumasi</td>
                <td>
                        <input type="text" name="main_body_drop_door_6_md" id="main_body_drop_door_6_md" class="form-control">
                    </td>
                    <td>
                        <select name="main_body_drop_door_6_j" id="main_body_drop_door_6_j" class="form-control">
                            <option value="1">No Abnormality</option>
                            <option value="2">Cautious</option>
                            <option value="3">Abnormal</option>
                        </select>
                    </td>
                    <td>
                        <input type="text" name="main_body_drop_door_6_m" id="main_body_drop_door_6_m" class="form-control">
                    </td>
                </tr>

                <!-- Main body -->
                    <!-- Ram weight -->
                <tr class="silver">
                    <td rowspan="4" style="vertical-align : middle;">Ram weight</td>
                    <td>Weight body slide casing</td>
                    <td>Cek keausan dan cacat</td>
                    <td>Kedua sisi total jarak keausan max 12 mm</td>
                <td>
                        <input type="text" name="main_body_drop_door_7_md" id="main_body_drop_door_7_md" class="form-control">
                    </td>
                    <td>
                        <select name="main_body_drop_door_7_j" id="main_body_drop_door_7_j" class="form-control">
                            <option value="1">No Abnormality</option>
                            <option value="2">Cautious</option>
                            <option value="3">Abnormal</option>
                        </select>
                    </td>
                    <td>
                        <input type="text" name="main_body_drop_door_7_m" id="main_body_drop_door_7_m" class="form-control">
                    </td>
                </tr>

                <tr class="silver">
                    <td>Ram position drive</td>
                    <td>Cek ketebalan Karet (Poly Urethan)</td>
                    <td>15mm - 20mm</td>
                <td>
                        <input type="text" name="main_body_drop_door_8_md" id="main_body_drop_door_8_md" class="form-control">
                    </td>
                    <td>
                        <select name="main_body_drop_door_8_j" id="main_body_drop_door_8_j" class="form-control">
                            <option value="1">No Abnormality</option>
                            <option value="2">Cautious</option>
                            <option value="3">Abnormal</option>
                        </select>
                    </td>
                    <td>
                        <input type="text" name="main_body_drop_door_8_m" id="main_body_drop_door_8_m"  class="form-control">
                    </td>
                </tr>

                <tr class="silver">
                    <td>Pipe scraper, limit switch</td>
                    <td>Cek kekenduran baut limit dan pipa patah</td>
                    <td>Tidak ada kekenduran dan pipa patah</td>
                <td>
                        <input type="text" name="main_body_drop_door_9_md" id="main_body_drop_door_9_md" class="form-control">
                    </td>
                    <td>
                        <select name="main_body_drop_door_9_j" id="main_body_drop_door_9_j" class="form-control">
                            <option value="1">No Abnormality</option>
                            <option value="2">Cautious</option>
                            <option value="3">Abnormal</option>
                        </select>
                    </td>
                    <td>
                        <input type="text" name="main_body_drop_door_9_m" id="main_body_drop_door_9_m" class="form-control">
                    </td>
                </tr>

                <tr class="silver">
                    <td>Universal joint pemukul limit switch</td>
                    <td>Cek kekenduran joint dan pin pemukul</td>
                    <td>Tidak ada kekenduran dan pin yg keluar</td>
                <td>
                        <input type="text" name="main_body_drop_door_10_md" id="main_body_drop_door_10_md" class="form-control">
                    </td>
                    <td>
                        <select name="main_body_drop_door_10_j" id="main_body_drop_door_10_j" class="form-control">
                            <option value="1">No Abnormality</option>
                            <option value="2">Cautious</option>
                            <option value="3">Abnormal</option>
                        </select>
                    </td>
                    <td>
                        <input type="text" name="main_body_drop_door_10_m" id="main_body_drop_door_10_m" class="form-control">
                    </td>
                </tr>

                <!-- Main body -->
                    <!-- Hopper door -->
                <tr class="silver">
                    <td rowspan="4" style="vertical-align : middle;">Hopper door</td>
                    <td>Hopper door silinder angin</td>
                    <td>Cek kebocoran angin, gerakan kedua silinder</td>
                    <td>Tidak ada kebocoran, gerakan seimbang</td>
                <td>
                        <input type="text" name="main_body_drop_door_11_md" id="main_body_drop_door_11_md"  class="form-control">
                    </td>
                    <td>
                        <select name="main_body_drop_door_11_j" id="main_body_drop_door_11_j" class="form-control">
                            <option value="1">No Abnormality</option>
                            <option value="2">Cautious</option>
                            <option value="3">Abnormal</option>
                        </select>
                    </td>
                    <td>
                        <input type="text" name="main_body_drop_door_11_m"  id="main_body_drop_door_11_m" class="form-control">
                    </td>
                </tr>

                <tr class="silver">
                    <td>Hopper door shaft</td>
                    <td>Cek keausan shaft dan lumasi</td>
                    <td>Tidak ada keausan dan terlumasi</td>
                <td>
                        <input type="text" name="main_body_drop_door_12_md" id="main_body_drop_door_12_md" class="form-control">
                    </td>
                    <td>
                        <select name="main_body_drop_door_12_j" id="main_body_drop_door_12_j" class="form-control">
                            <option value="1">No Abnormality</option>
                            <option value="2">Cautious</option>
                            <option value="3">Abnormal</option>
                        </select>
                    </td>
                    <td>
                        <input type="text" name="main_body_drop_door_12_m" id="main_body_drop_door_12_m" class="form-control">
                    </td>
                </tr>

                <tr class="silver">
                    <td>Keausan metal seal dan keausan hopper door</td>
                    <td>Cek dengan mistar baja dan thickness gauge</td>
                    <td>Max keausan 3 mm</td>
                <td>
                        <input type="text" name="main_body_drop_door_13_md" id="main_body_drop_door_13_md" class="form-control">
                    </td>
                    <td>
                        <select name="main_body_drop_door_13_j" id="main_body_drop_door_13_j" class="form-control">
                            <option value="1">No Abnormality</option>
                            <option value="2">Cautious</option>
                            <option value="3">Abnormal</option>
                        </select>
                    </td>
                    <td>
                        <input type="text" name="main_body_drop_door_13_m" id="main_body_drop_door_13_m"  class="form-control">
                    </td>
                </tr>

                <tr class="silver">
                    <td>Hopper door kelonggaran Paralell key shaft</td>
                    <td>Cek dan lihat parelell key keluar atau tidak</td>
                    <td>Paralell key tidak keluar</td>
                <td>
                        <input type="text" name="main_body_drop_door_14_md" id="main_body_drop_door_14_md" class="form-control">
                    </td>
                    <td>
                        <select name="main_body_drop_door_14_j" id="main_body_drop_door_14_j" class="form-control">
                            <option value="1">No Abnormality</option>
                            <option value="2">Cautious</option>
                            <option value="3">Abnormal</option>
                        </select>
                    </td>
                    <td>
                        <input type="text" name="main_body_drop_door_14_m" id="main_body_drop_door_14_m" class="form-control">
                    </td>
                </tr>

                <!-- Main body -->
                    <!-- Dust stop ring -->
                <tr class="silver">
                    <td rowspan="2" style="vertical-align : middle;">Dust stop ring</td>
                    <td>Lubricator oil piping</td>
                    <td>Lihat kebocoran dan tersumbatnya piping</td>
                    <td>Tidak ada kebocoran dan sumbatan</td>
                <td>
                        <input type="text" name="" class="form-control">
                    </td>
                    <td>
                        <select name="" id="" class="form-control">
                            <option value="1">No Abnormality</option>
                            <option value="2">Cautious</option>
                            <option value="3">Abnormal</option>
                        </select>
                    </td>
                    <td>
                        <input type="text" name="" class="form-control">
                    </td>
                </tr>

                <tr class="silver">
                    <td>Process oil piping</td>
                    <td>Lihat kebocoran dan tersumbatnya piping</td>
                    <td>Tidak ada kebocoran dan sumbatan</td>
                <td>
                        <input type="text" name="" class="form-control">
                    </td>
                    <td>
                        <select name="" id="" class="form-control">
                            <option value="1">No Abnormality</option>
                            <option value="2">Cautious</option>
                            <option value="3">Abnormal</option>
                        </select>
                    </td>
                    <td>
                        <input type="text" name="" class="form-control">
                    </td>
                </tr>

                <!-- Weighing Conveyor -->
                <tr>
                    <td rowspan="6" style="vertical-align : middle; text-align:center;">Weighing Conveyor</td>
                    <td>Bearing roll conveyor</td>
                    <td>Suara abnormal, pelumasan</td>
                    <td>Dengar suara abnormal, lumasi</td>
                    <td>Tidak ada suara abnormal, terlumasi</td>
                <td>
                        <input type="text" name="" class="form-control">
                    </td>
                    <td>
                        <select name="" id="" class="form-control">
                            <option value="1">No Abnormality</option>
                            <option value="2">Cautious</option>
                            <option value="3">Abnormal</option>
                        </select>
                    </td>
                    <td>
                        <input type="text" name="" class="form-control">
                    </td>
                </tr>

                <tr>
                    <td rowspan="4" style="vertical-align : middle;">Swing conveyor </td>
                    <td>Kebocoran silinder angin</td>
                    <td>Cek kebocoran angin, gerakan kedua silinder</td>
                    <td>Tidak ada kebocoran, gerakan seimbang</td>
                <td>
                        <input type="text" name="" class="form-control">
                    </td>
                    <td>
                        <select name="" id="" class="form-control">
                            <option value="1">No Abnormality</option>
                            <option value="2">Cautious</option>
                            <option value="3">Abnormal</option>
                        </select>
                    </td>
                    <td>
                        <input type="text" name="" class="form-control">
                    </td>
                </tr>

                <tr>
                    <td>Tekanan regulator angin, kebersihan filter</td>
                    <td>Lihat, cek tekanan dan kebocoran </td>
                    <td> 0.4 ñ 0.05 Mpa dan tidak ada kebocoran</td>
                <td>
                        <input type="text" name="" class="form-control">
                    </td>
                    <td>
                        <select name="" id="" class="form-control">
                            <option value="1">No Abnormality</option>
                            <option value="2">Cautious</option>
                            <option value="3">Abnormal</option>
                        </select>
                    </td>
                    <td>
                        <input type="text" name="" class="form-control">
                    </td>
                </tr>

                <tr>
                    <td>Kebocoran</td>
                    <td>Lihat kebocoran dan kerusakan </td>
                    <td>Tidak ada kebocoran dan kerusakan</td>
                <td>
                        <input type="text" name="" class="form-control">
                    </td>
                    <td>
                        <select name="" id="" class="form-control">
                            <option value="1">No Abnormality</option>
                            <option value="2">Cautious</option>
                            <option value="3">Abnormal</option>
                        </select>
                    </td>
                    <td>
                        <input type="text" name="" class="form-control">
                    </td>
                </tr>

                <tr>
                    <td>Kerusakan, sobek pada bagian conveyor</td>
                    <td>Cek kerusakan dan sobek pada conveyor</td>
                    <td>Tidak ada kerusakan, sobek pada conveyor</td>
                <td>
                        <input type="text" name="" class="form-control">
                    </td>
                    <td>
                        <select name="" id="" class="form-control">
                            <option value="1">No Abnormality</option>
                            <option value="2">Cautious</option>
                            <option value="3">Abnormal</option>
                        </select>
                    </td>
                    <td>
                        <input type="text" name="" class="form-control">
                    </td>
                </tr>

                <tr>
                    <td>Weighing conveyor</td>
                    <td>Kerusakan, sobek pada bagian conveyor</td>
                    <td>Cek kerusakan dan sobek pada conveyor</td>
                    <td>Tidak ada kerusakan, sobek pada conveyor</td>
                <td>
                        <input type="text" name="" class="form-control">
                    </td>
                    <td>
                        <select name="" id="" class="form-control">
                            <option value="1">No Abnormality</option>
                            <option value="2">Cautious</option>
                            <option value="3">Abnormal</option>
                        </select>
                    </td>
                    <td>
                        <input type="text" name="" class="form-control">
                    </td>
                </tr>

                <!-- Preparation Conveyor -->
                <tr class="silver">
                    <td rowspan="4" style="vertical-align : middle; text-align:center;">Preparation Conveyor</td>
                    <td>Sprocket, rantai</td>
                    <td>Tension , keausan, grease up</td>
                    <td>Cek kenduran, keausan dan lumasi</td>
                    <td>Tidak ada kekenduran, keausan dan terlumasi</td>
                <td>
                        <input type="text" name="" class="form-control">
                    </td>
                    <td>
                        <select name="" id="" class="form-control">
                            <option value="1">No Abnormality</option>
                            <option value="2">Cautious</option>
                            <option value="3">Abnormal</option>
                        </select>
                    </td>
                    <td>
                        <input type="text" name="" class="form-control">
                    </td>
                </tr>

                <tr class="silver">
                    <td>Bearing roll conveyor</td>
                    <td>Suara abnormal, pelumasan</td>
                    <td>Dengar suara abnormal, lumasi</td>
                    <td>Tidak ada suara abnormal, terlumasi</td>
                <td>
                        <input type="text" name="" class="form-control">
                    </td>
                    <td>
                        <select name="" id="" class="form-control">
                            <option value="1">No Abnormality</option>
                            <option value="2">Cautious</option>
                            <option value="3">Abnormal</option>
                        </select>
                    </td>
                    <td>
                        <input type="text" name="" class="form-control">
                    </td>
                </tr>

                <tr class="silver">
                    <td>Tension roll</td>
                    <td>Kerusakan dan pelumasan</td>
                    <td>Lihat kerusakan dan lumasi</td>
                    <td>Tidak ada kerusakan dan terlumasi</td>
                <td>
                        <input type="text" name="" class="form-control">
                    </td>
                    <td>
                        <select name="" id="" class="form-control">
                            <option value="1">No Abnormality</option>
                            <option value="2">Cautious</option>
                            <option value="3">Abnormal</option>
                        </select>
                    </td>
                    <td>
                        <input type="text" name="" class="form-control">
                    </td>
                </tr>

                <tr class="silver">
                    <td>Conveyor body</td>
                    <td>Kerusakan, sobek pada bagian conveyor</td>
                    <td>Cek kerusakan dan sobek pada conveyor</td>
                    <td>Tidak ada kerusakan, sobek pada conveyor</td>
                <td>
                        <input type="text" name="" class="form-control">
                    </td>
                    <td>
                        <select name="" id="" class="form-control">
                            <option value="1">No Abnormality</option>
                            <option value="2">Cautious</option>
                            <option value="3">Abnormal</option>
                        </select>
                    </td>
                    <td>
                        <input type="text" name="" class="form-control">
                    </td>
                </tr>

                <!-- Pull Up Conveyor -->
                <tr>
                    <td rowspan="5" style="vertical-align : middle; text-align:center;">Pull Up Conveyor</td>
                    <td>Sprocket, rantai</td>
                    <td>Tension , keausan, grease up</td>
                    <td>Cek kenduran, keausan dan lumasi</td>
                    <td>Tidak ada kekenduran, keausan dan terlumasi</td>
                <td>
                        <input type="text" name="" class="form-control">
                    </td>
                    <td>
                        <select name="" id="" class="form-control">
                            <option value="1">No Abnormality</option>
                            <option value="2">Cautious</option>
                            <option value="3">Abnormal</option>
                        </select>
                    </td>
                    <td>
                        <input type="text" name="" class="form-control">
                    </td>
                </tr>

                <tr>
                    <td>Bearing roll conveyor</td>
                    <td>Suara abnormal, pelumasan</td>
                    <td>Dengar suara abnormal, lumasi</td>
                    <td>Tidak ada suara abnormal, terlumasi</td>
                <td>
                        <input type="text" name="" class="form-control">
                    </td>
                    <td>
                        <select name="" id="" class="form-control">
                            <option value="1">No Abnormality</option>
                            <option value="2">Cautious</option>
                            <option value="3">Abnormal</option>
                        </select>
                    </td>
                    <td>
                        <input type="text" name="" class="form-control">
                    </td>
                </tr>

                <tr>
                    <td>Tension roll</td>
                    <td>Kerusakan dan pelumasan</td>
                    <td>Lihat kerusakan dan lumasi</td>
                    <td>Tidak ada kerusakan dan terlumasi</td>
                <td>
                        <input type="text" name="" class="form-control">
                    </td>
                    <td>
                        <select name="" id="" class="form-control">
                            <option value="1">No Abnormality</option>
                            <option value="2">Cautious</option>
                            <option value="3">Abnormal</option>
                        </select>
                    </td>
                    <td>
                        <input type="text" name="" class="form-control">
                    </td>
                </tr>

                <tr>
                    <td>Conveyor body</td>
                    <td>Kerusakan, sobek pada bagian conveyor</td>
                    <td>Cek kerusakan dan sobek pada conveyor</td>
                    <td>Tidak ada kerusakan, sobek pada conveyor</td>
                <td>
                        <input type="text" name="" class="form-control">
                    </td>
                    <td>
                        <select name="" id="" class="form-control">
                            <option value="1">No Abnormality</option>
                            <option value="2">Cautious</option>
                            <option value="3">Abnormal</option>
                        </select>
                    </td>
                    <td>
                        <input type="text" name="" class="form-control">
                    </td>
                </tr>

                <tr>
                    <td>Silinder angin</td>
                    <td>Kebocoran angin</td>
                    <td>Cek kebocoran angin</td>
                    <td>Tidak ada kebocoran angin</td>
                <td>
                        <input type="text" name="" class="form-control">
                    </td>
                    <td>
                        <select name="" id="" class="form-control">
                            <option value="1">No Abnormality</option>
                            <option value="2">Cautious</option>
                            <option value="3">Abnormal</option>
                        </select>
                    </td>
                    <td>
                        <input type="text" name="" class="form-control">
                    </td>
                </tr>

                <!-- Check sheet -->
                <tr class="silver">
                    <td style="vertical-align : middle; text-align:center;">Check sheet</td>
                    <td>Check sheet produksi</td>
                    <td>Pengecekan hasil check sheet produksi</td>
                    <td>Lihat dan cek</td>
                    <td>Sudah dicek dengan aktual tanggalnya</td>
                <td>
                        <input type="text" name="" class="form-control">
                    </td>
                    <td>
                        <select name="" id="" class="form-control">
                            <option value="1">No Abnormality</option>
                            <option value="2">Cautious</option>
                            <option value="3">Abnormal</option>
                        </select>
                    </td>
                    <td>
                        <input type="text" name="" class="form-control">
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="row">
        <div class="col-md-8">
            <img src="<?=base_url()?>assets/upload/mesin/mesin1.jpg" alt="gambar-mesin" style="width:600px">
        </div>
        <div class="col-md-4">
            <table class="table">
                <tr>
                    <td colspan="2"><h4>Inspection 1 item of addition</h4></td>
                </tr>
                <tr>
                    <td style="width:10px"><i class="fa fa-circle"></i></td>
                    <td>
                        <input type="text" class="form-control" id="ins_add_1" name="ins_add_1">
                    </td>
                </tr>
                <tr>
                    <td style="width:10px"><i class="fa fa-circle"></i></td>
                    <td>
                        <input type="text" class="form-control" id="ins_add_2" name="ins_add_2">
                    </td>
                </tr>
                <tr>
                    <td style="width:10px"><i class="fa fa-circle"></i></td>
                    <td>
                        <input type="text" class="form-control" id="ins_add_3" name="ins_add_3">
                    </td>
                </tr>
                <tr>
                    <td style="width:10px"><i class="fa fa-circle"></i></td>
                    <td>
                        <input type="text" class="form-control" id="ins_add_4" name="ins_add_4">
                    </td>
                </tr>
                <tr>
                    <td style="width:10px"><i class="fa fa-circle"></i></td>
                    <td>
                        <input type="text" class="form-control" id="ins_add_5" name="ins_add_5">
                    </td>
                </tr>
                <tr>
                    <td style="width:10px"><i class="fa fa-circle"></i></td>
                    <td>
                        <input type="text" class="form-control" id="ins_add_6" name="ins_add_6">
                    </td>
                </tr>
                <tr>
                    <td style="width:10px"><i class="fa fa-circle"></i></td>
                    <td>
                        <input type="text" class="form-control" id="ins_add_7" name="ins_add_7">
                    </td>
                </tr>
            </table>
            <table class="table">
                <tr>
                    <td colspan="2"><h4>Puchase a necessary part</h4></td>
                </tr>
                <tr>
                    <td style="width:10px"><i class="fa fa-circle"></i></td>
                    <td>
                        <input type="text" class="form-control" id="pur_nec_part_1" name="pur_nec_part_1">
                    </td>
                </tr>
                <tr>
                    <td style="width:10px"><i class="fa fa-circle"></i></td>
                    <td>
                        <input type="text" class="form-control" id="pur_nec_part_2" name="pur_nec_part_2">
                    </td>
                </tr>
                <tr>
                    <td style="width:10px"><i class="fa fa-circle"></i></td>
                    <td>
                        <input type="text" class="form-control" id="pur_nec_part_3" name="pur_nec_part_3">
                    </td>
                </tr>
            </table>
        </div>
    </div>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Batal</button>
    <button type="button" class="btn btn-primary" onclick="">Update</button>
</div>