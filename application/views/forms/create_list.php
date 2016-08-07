<!DOCTYPE html>
<html>
<head>
    <title>Create List</title>
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/list_opp.css" type="text/css" media="screen" charset="utf-8">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Acme">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Josefin Sans">
</head>
<body
    <div id="box">
        <h1>Create a new list</h1>
        <form action="<?php echo base_url(); ?>index.php/pcdb/create_list" enctype="multipart/form-data" method="post">
            <div class="form-group">
                <label for="lists-name">List's Name</label>
                <input type="text" class="form-control input" value="<?php echo set_value('lists-name'); ?>" id="lists-name" name="lists-name" placeholder="Add your lists's name ...">
            </div>
            <div class="form-group" id="submit-container">             
                <input type="submit" value="Create List" name="createList" id="createList" />
            </div>
            <?php echo validation_errors('<p class="error">'); ?>
        </form>
    </div>
</body>
