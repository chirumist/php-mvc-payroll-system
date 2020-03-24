<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <a href="<?php route('leave-form');?>" class="btn btn-primary float-right"><i class="fas fa-plus mr-2"></i>Add New</a>
                <h4 class="card-title">Leave List</h4>
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
                            EMPLOYEE NAME
                        </th>
                        <th class="text-center">
                            START DATE
                        </th>
                        <th class="text-center">
                            END DATE
                        </th>
                        <th class="text-right">
                            Action
                        </th>
                    </thead>
                    <tbody>
                        <?php foreach ($data['leave'] as $key => $value) {?>
                            <tr>
                                <td>
                                    <?php echo $value->id ?>
                                </td>
                                <td class="text-capitalize text-center">
                                    <?php echo $value->first_name.' '.$value->last_name ?>
                                </td>
                                <td class="text-capitalize text-center">
                                    <?php echo isset($value->start_date) ? date('d M Y',strtotime($value->start_date)) : '-' ?>
                                </td>
                                <td class="text-capitalize text-center">
                                    <?php echo isset($value->end_date) ? date('d M Y',strtotime($value->end_date)) : '-' ?>
                                </td>
                                <td class="text-right">
                                    <a href="<?php route('leave-form?id='.$value->id);?>" class="btn btn-success btn-sm">Edit</a>
                                    <a href="<?php route('leave-delete?id='.$value->id);?>" data-delete="true" class="btn btn-danger btn-sm">Delete</a>
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