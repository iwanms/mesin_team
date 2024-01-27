
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
                    <th>Part</th>
                    <th>Inspection Part</th>
                    <th>Item</th>
                    <th>Method</th>
                    <th>Determation Standard</th>
                    <th>Measurement Data</th>
                    <th>Judgement</th>
                    <th>Measure</th>
                </tr>
            </thead>
                <tr>
                <td rowspan="<?=$count_part1;?>" style="vertical-align : middle;text-align:center;"><?=$pen_part1[0]->part?></td>
            
                <td rowspan="3">TEST</td>
                <?php foreach ($pen_part1 as $row) : ?>
                <td><?=$row->item;?></td>
                <td><?=$row->method;?></td>
                <td><?=$row->determation_standard;?></td>
                <td>
                    <input type="text" name="<?=$row->inspect_part_name.'measurement_data'?>" class="form-control">
                </td>
                <td>
                    <select name="<?=$row->inspect_part_name.'judgement'?>" id="" class="form-control">
                        <option value="1">No Abnormality</option>
                        <option value="2">Cautious</option>
                        <option value="3">Abnormal</option>
                    </select>
                </td>
                <td>
                    <input type="text" name="<?=$row->inspect_part_name.'measure'?>" class="form-control">
                </td>
            
            </tr>
            <?php endforeach; ?>

            <tr>
                <td rowspan="<?=$count_part2;?>" style="vertical-align : middle;text-align:center;"><?=$pen_part2[0]->part?></td>
            <?php foreach ($pen_part2 as $row) : ?>
                <td><?=$row->inspection_part;?></td>
                <td><?=$row->item;?></td>
                <td><?=$row->method;?></td>
                <td><?=$row->determation_standard;?></td>
                <td>
                    <input type="text" name="<?=$row->inspect_part_name.'measurement_data'?>" class="form-control">
                </td>
                <td>
                    <select name="<?=$row->inspect_part_name.'judgement'?>" id="" class="form-control">
                        <option value="1">No Abnormality</option>
                        <option value="2">Cautious</option>
                        <option value="3">Abnormal</option>
                    </select>
                </td>
                <td>
                    <input type="text" name="<?=$row->inspect_part_name.'measure'?>" class="form-control">
                </td>
            </tr>
            <?php endforeach; ?>

            <tr>
                <td rowspan="<?=$count_part3;?>" style="vertical-align : middle;text-align:center;"><?=$pen_part3[0]->part?></td>
            <?php foreach ($pen_part3 as $row) : ?>
                <td><?=$row->inspection_part;?></td>
                <td><?=$row->item;?></td>
                <td><?=$row->method;?></td>
                <td><?=$row->determation_standard;?></td>
                <td>
                    <input type="text" name="<?=$row->inspect_part_name.'measurement_data'?>" class="form-control">
                </td>
                <td>
                    <select name="<?=$row->inspect_part_name.'judgement'?>" id="" class="form-control">
                        <option value="1">No Abnormality</option>
                        <option value="2">Cautious</option>
                        <option value="3">Abnormal</option>
                    </select>
                </td>
                <td>
                    <input type="text" name="<?=$row->inspect_part_name.'measure'?>" class="form-control">
                </td>
            </tr>
            <?php endforeach; ?>

            <tr>
                <td rowspan="<?=$count_part4;?>" style="vertical-align : middle;text-align:center;"><?=$pen_part4[0]->part?></td>
            <?php foreach ($pen_part4 as $row) : ?>
                <td><?=$row->inspection_part;?></td>
                <td><?=$row->item;?></td>
                <td><?=$row->method;?></td>
                <td><?=$row->determation_standard;?></td>
                <td>
                    <input type="text" name="<?=$row->inspect_part_name.'measurement_data'?>" class="form-control">
                </td>
                <td>
                    <select name="<?=$row->inspect_part_name.'judgement'?>" id="" class="form-control">
                        <option value="1">No Abnormality</option>
                        <option value="2">Cautious</option>
                        <option value="3">Abnormal</option>
                    </select>
                </td>
                <td>
                    <input type="text" name="<?=$row->inspect_part_name.'measure'?>" class="form-control">
                </td>
            </tr>
            <?php endforeach; ?>

            <tr>
                <td rowspan="<?=$count_part5;?>" style="vertical-align : middle;text-align:center;"><?=$pen_part5[0]->part?></td>
            <?php foreach ($pen_part5 as $row) : ?>
                <td><?=$row->inspection_part;?></td>
                <td><?=$row->item;?></td>
                <td><?=$row->method;?></td>
                <td><?=$row->determation_standard;?></td>
                <td>
                    <input type="text" name="<?=$row->inspect_part_name.'measurement_data'?>" class="form-control">
                </td>
                <td>
                    <select name="<?=$row->inspect_part_name.'judgement'?>" id="" class="form-control">
                        <option value="1">No Abnormality</option>
                        <option value="2">Cautious</option>
                        <option value="3">Abnormal</option>
                    </select>
                </td>
                <td>
                    <input type="text" name="<?=$row->inspect_part_name.'measure'?>" class="form-control">
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    </div>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Batal</button>
    <button type="button" class="btn btn-primary" onclick="">Update</button>
</div>

<!-- <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>

<script>
    const table = document.querySelector('.table-penilaian');

    let headerCell = null;

    for (let row of table.rows) {
    const firstCell = row.cells[0];
    
    if (headerCell === null || firstCell.innerText !== headerCell.innerText) {
        headerCell = firstCell;
    } else {
        headerCell.rowSpan++;
        firstCell.remove();
    }
    }
</script> -->