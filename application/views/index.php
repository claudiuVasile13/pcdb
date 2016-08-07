<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/index.css" type="text/css" media="screen" charset="utf-8">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Acme">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Josefin Sans">
    <link rel="stylesheet" href="<?php echo base_url(); ?>font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
    <div id="row-box">
        <div id="bar">
            <div id="lists-box">
                <div id="create_list_box">
                    <a id="create_list" href="<?php echo base_url() . 'index.php/pcdb/load_create_list_form' ?>">
                        Create list
                    </a>
                </div>
                   <h3 id="total_lists">
                    Lists(<?php echo $lists['total_lists']; ?>)
                </h3>
                <ul id="lists">
                    <?php 
                        if($lists['total_lists'] === 0) {
                            echo "You don't have any list created.";
                        } else {
                            unset($lists['total_lists']);
                            foreach($lists as $list) {
                    ?>
                    <?php
                                echo '<li class="list_p">
                                        <a class="list_a" href="' . base_url() . 'index.php/pcdb/list_items/' . $list->list_token . '">' .
                                           $list->list_name . 
                                        '</a>
                                      </li>';
                            }
                        }
                    ?>
                </ul>
            </div>
        </div>
        <div id="main-box">
            <?php
                if($items != null) {
                    foreach($items as $item) {
                        echo '<div class="list_item_d">
                                <a class="list_item_a" href="' . base_url() . 'index.php/pcdb/item/' . $item->item_token . '"> 
                                    <img class="list_item_img" src="' . base_url() . 'img/' . $item->item_cover . '" alt="" />
                                </a>
                                <a class="view" href="' . base_url() . 'index.php/pcdb/item/' . $item->item_token . '">View</a>
                              </div>';
                    }
                } else {
                    echo "Your list is empty.";
                }
            ?>
        </div>
    </div>
    
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js'></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>
