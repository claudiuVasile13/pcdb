<!DOCTYPE html>
<html>
<head>
    <title>Update List</title>
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/list_opp.css" type="text/css" media="screen" charset="utf-8">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Acme">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Josefin Sans">
</head>
<body
    <div id="box">
        <h1>Update the list</h1>
        <form action="<?php  echo base_url() . 'index.php/pcdb/update_list/' .$this->uri->segment(3); ?>" enctype="multipart/form-data" method="post">
            <div class="form-group">
                <label for="lists-name">List's Name</label>
                <input type="text" class="form-control input" value="<?php echo $list_info->list_name ?>" id="lists-name" name="lists-name" placeholder="Add your lists's name ...">
            </div>
            <div class="form-group" id="submit-container">             
                <input type="submit" value="Update List" name="updateList" id="updateList" />
            </div>
            <?php echo validation_errors('<p class="error">'); ?>
        </form>
    </div>
</body>
