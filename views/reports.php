<div class="row justify-content-center align-items-center">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="card-title m-0">
                    <h4 class="m-0">Department Base Reports</h4>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover" id="datatable">
                        <thead class=" text-primary">
                            <tr>
                                <th>ID</th>
                                <th>Department Name</th>
                                <th>Total Employee</th>
                                <th>Total Salary</th>
                                <th>Total Salary Paid</th>
                                <th>Total Leaves</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($data['reportsData'] as $key => $value) {?>
                            <tr>
                                <td>
                                    <?php echo $value->dept_id ?>
                                </td>
                                <td>
                                    <?php echo $value->dept_name ?>
                                </td>
                                <td>
                                    <?php echo $value->total_employee ?? 0 ?>
                                </td>
                                <td>
                                    <?php echo $value->avg_salary_per_employee ?? 0 ?>
                                </td>
                                <td>
                                    <?php echo $value->total_salary_paid ?? 0 ?>
                                </td>
                                <td>
                                    <?php echo $value->total_leaves ?>
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