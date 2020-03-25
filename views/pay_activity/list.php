<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Activity List</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover" id="datatable">
                        <thead class=" text-primary">
                        <th>
                            ID
                        </th>
                        <th class="text-center">
                            TYPE
                        </th>
                        <?php if ($this->auth()->type == 'admin') {?>
                            <th class="text-center">
                                NAME
                            </th>
                        <?php } ?>
                        <th class="text-center">
                            DATE TIME
                        </th>
                        <th class="text-right">
                            Action
                        </th>
                        </thead>
                        <tbody>
                        <?php foreach ($data['activityList'] as $key => $value) {?>
                            <tr>
                                <td>
                                    <?php echo $value->id ?>
                                </td>
                                <td class="text-center">
                                    <?php echo $value->type ?>
                                </td>
                                <?php if ($this->auth()->type == 'admin') {?>
                                    <td class="text-center">
                                        <?php echo $value->name ?>
                                    </td>
                                <?php } ?>
                                <td class="text-center">
                                    <?php echo date('d M Y H:i:s',strtotime($value->created_at)) ?>
                                </td>
                                <td class="text-right">
                                    <a href="<?php route('department-form?id='.$value->id);?>" class="btn btn-success btn-sm">Edit</a>
                                    <a href="<?php route('department-delete?id='.$value->id);?>" data-delete="true" class="btn btn-danger btn-sm">Delete</a>
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