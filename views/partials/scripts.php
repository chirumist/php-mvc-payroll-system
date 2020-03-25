
<script src="<?php assets('/static/js/core/jquery.min.js');?>"></script>
<script src="<?php assets('/static/js/core/popper.min.js');?>"></script>
<script src="<?php assets('/static/js/core/bootstrap.min.js');?>"></script>
<script src="<?php assets('/static/js/paper-dashboard.min.js');?>"></script>
<script src="<?php assets('/static/js/plugins/bootstrap-notify.js');?>"></script>
<script src="<?php assets('/static/plugins/select2/js/select2.js');?>"></script>
<?php if(isset($data['assets']) && in_array('datatable', $data['assets'])) {?>
    <script src="<?php assets('/static/plugins/DataTables/datatables.js'); ?>"></script>
<?php }?>

<script>
    $(document).ready(function () {
        var table;
        if ($('#datatable').length > 0){
            table = $('#datatable').DataTable();

            $('#datatable').on("click", '[data-delete="true"]', function(e){
                e.preventDefault();
                let url = $(this).attr('href')
                var confirm = window.confirm('Are You want to delete?');
                if (confirm) {
                    $.get(url).then(response => {
                        if(response.status){
                            if (response.message !== undefined){
                                $.notify({
                                    icon: "fas fa-info-circle",
                                    message: response.message
                                }, {
                                    type: 'danger',
                                    timer: 3000,
                                    placement: {
                                        from: 'top',
                                        align: 'right'
                                    }
                                });
                            }
                            table.row($(this).parents('tr')).remove().draw(false);
                        }
                    })
                }
            });
        }

        $('.select2js').select2();

        $('.select2js').on('select2:select',function (data) {
            let select = data.params.data
            if($('#basic_salary').length > 0){
                $('#basic_salary').html(select.basic_salary)
                $('.basic_salary-hidden').val(select.basic_salary)
            }
        })

        $('.exp').on('keyup',function () {
            let travl = parseFloat($('.sal-exp').val()) || 0;
            let ful = parseFloat($('.ful-exp').val()) || 0;
            let tl = parseFloat($('.tl-exp').val()) || 0;
            let expTotal = travl+ful+tl;
            $('.exp-total-hidden').val(expTotal)
            $('#total_exp').html(expTotal)
        })
    })
</script>