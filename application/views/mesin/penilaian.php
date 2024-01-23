
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span></button>
    <h4 class="modal-title">Equipment Inspection Sheet</h4>
<div class="modal-body">
    <div class="row">
        <div class="col-md-6">
            <table class="table">
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
                        <td>2024-01-23</td>
                    </tr>
                    <tr>
                        <td>Inspector</td>
                        <td width="5px">:</td>
                        <td>Jaja</td>
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
        <table class="table table-bordered">
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
            <tbody>
                <?php foreach ($penilaian as $row) : ?>
                    <tr>
                        <td><?=$row->part;?></td>
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
            </tbody>
        </table>
    </div>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Batal</button>
    <button type="button" class="btn btn-primary" onclick="">Update</button>
</div>
