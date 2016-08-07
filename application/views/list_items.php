<!DOCTYPE html>
<html>
<head>
    <title>Lists</title>
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/list.css" type="text/css" media="screen" charset="utf-8" >
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/list_opp.css" type="text/css" media="screen" charset="utf-8">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Chewy">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Josefin Sans">
    <link rel="stylesheet" href="<?php echo base_url(); ?>font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
    <div id="main-box">
        <?php include "forms/delete_list.php"; ?>
        <div id="items-box">
            <h1 id="total-list-items">
                <?php echo $list_items['list_name'] . '(' . $list_items['total_items'] . ')'; ?>
            </h1>
            <a class="update-delete" href="<?php echo base_url() . 'index.php/pcdb/load_update_list_form/' . $this->uri->segment(3); ?>"><i class="fa fa-pencil" aria-hidden="true"></i></a>
            <a class="update-delete" href="" data-toggle="modal" data-target="#delete-list-modal"><i class="fa fa-trash" aria-hidden="true"></i></a>
            <br>
            <a id="link_to_index" href="<?php echo base_url(); ?>index.php/pcdb/index">Go back to your lists</a>
            <a id="add-item" href="<?php echo base_url() . 'index.php/pcdb/load_add_item_form/' . $this->uri->segment(3); ?>">Add item</a>
            <div id="list_items">
                <?php 
                    if($list_items['total_items'] === 0) {
                        echo "Your list is empty.";
                    } else {
                        foreach($list_items['items'] as $list_item) {
                ?>
                <?php
                            echo '<div class="list_item_d">
                                    <a class="list_item_a" href="' . base_url() . 'index.php/pcdb/item/' .  $list_item->item_token . '"> 
                                        <img class="list_item_img" src="' . base_url() . 'img/' . $list_item->item_cover . '" alt="" />
                                    </a>
                                    <a class="view" href="' . base_url() . 'index.php/pcdb/item/' . $list_item->item_token . '">View</a>
                                  </div>';
                        }
                    }
                ?>
            </div>
        </div>
    </div>
    
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js'></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>
