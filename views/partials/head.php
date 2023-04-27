<link rel="stylesheet" href="<?php assets('/static/css/font.css');?>" />
<link rel="stylesheet" href="<?php assets('/static/plugins/fontawesome/css/all.min.css');?>">
<link rel="stylesheet" href="<?php assets('/static/css/bootstrap.min.css');?>">
<link rel="stylesheet" href="<?php assets('/static/css/paper-dashboard.css');?>">
<link rel="stylesheet" href="<?php assets('/static/plugins/select2/css/select2.css');?>">

<?php if(isset($data['assets']) && in_array('datatable', $data['assets'])) {?>
    <link rel="stylesheet" href="<?php assets('/static/plugins/DataTables/datatables.css');?>">
<?php } ?>

<style>
    * {
        transition: color 200ms ease !important;
    }
    .page-item.active .page-link{
        background-color: #57cbcf;
        border-color: #57cbcf;
    }
    .select2-container .select2-selection--single{
     height: 38px;
    }
    .select2-container--default .select2-selection--single{
        border: 1px solid #ddd;
    }
    [type="search"]:focus{
        outline: none;
        border: 1px solid #ddd;
    }
</style>