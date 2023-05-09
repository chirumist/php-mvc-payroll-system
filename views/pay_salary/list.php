<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <?php if ($this->auth()->type == 'admin') {?>
                    <a href="<?php route('salary-form');?>" class="btn btn-primary float-right"><i class="fas fa-plus mr-2"></i>Add New</a>
                <?php } ?>
                <h4 class="card-title">Salary</h4>
            </div>
            <div class="card-body">
                <?php $this->alertFlash('error','danger','alert')?>
                <?php $this->alertFlash('success','success','alert')?>
                 <div class="table-responsive">
                <table class="table table-hover" id="datatable">
                    <thead class=" text-primary">
                        <th>
                            ID
                        </th>
                        <th class="text-center">
                            EMPLOYEE
                        </th>
                        <th class="text-center">
                            LEAVE DAYS
                        </th>
                        <th class="text-center">
                            ISSUE DATE
                        </th>
                        <th class="text-center">
                            TOTAL AMOUNT
                        </th>
                    </thead>
                    <tbody>
                        <?php foreach ($data['salary'] as $key => $value) {?>
                            <tr>
                                <td>
                                    <?php echo $value->id ?>
                                </td>
                                <td class="text-center">
                                    <?php echo $value->emp_name ?>
                                </td>
                                <td class="text-center">
                                    <?php echo $value->leave_days  ?? 0 ?>
                                </td>
                                <td class="text-center">
                                    <?php echo isset($value->issue_date) ? date('d M Y',strtotime($value->issue_date)) : '-' ?>
                                </td>
                                <td class="text-center">
                                    <?php echo $value->total  ?? 0 ?>
                                </td>
                            </tr>
                        <?php } ?>
                        </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>
</div>