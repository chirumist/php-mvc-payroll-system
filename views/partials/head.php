<link rel="stylesheet" href="<?php assets('/static/css/font.css');?>" />
<link rel="stylesheet" href="<?php assets('/static/plugins/fontawesome/css/all.min.css');?>">
<link rel="stylesheet" href="<?php assets('/static/css/bootstrap.min.css');?>">
<link rel="stylesheet" href="<?php assets('/static/css/paper-dashboard.css');?>">

<?php if(isset($data['assets']) && in_array('datatable', $data['assets'])) {?>
    <link rel="stylesheet" href="<?php assets('/static/plugins/DataTables/datatables.css');?>">
<?php } ?>

<style>
    .page-item.active .page-link{
        background-color: #57cbcf;
        border-color: #57cbcf;
    }
</style>