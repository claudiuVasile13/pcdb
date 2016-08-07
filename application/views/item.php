<!DOCTYPE html>
<html>
<head>
    <title>Item</title>
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/item.css" type="text/css" media="screen" charset="utf-8" >
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/list_opp.css" type="text/css" media="screen" charset="utf-8">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Righteous">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Josefin Sans">
    <link rel="stylesheet" href="<?php echo base_url(); ?>font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
    <div id="main-box">
        <?php include "forms/delete_item.php"; ?>
        <div id="item">
            <?php 
//            var_dump($item);die();
                foreach($item['item_info'] as $info) {
//                    var_dump($info);die();
                    echo    '<div id="cover_box">
                                <div id="cover_d">
                                    <img id="cover" src="' . base_url() . 'img/' . $info->item_cover . '" alt="" />
                                </div>
                                <br>
                                <a href="' . base_url() . 'index.php/pcdb/load_update_item_form/' . $this->uri->segment(3) . '"><i id="update" class="fa fa-pencil" aria-hidden="true"></i></a>
                                <a href="" data-toggle="modal" data-target="#delete-item-modal"><i id="delete" class="fa fa-trash" aria-hidden="true"></i></a>
                            </div>
                            <div id="info-box">
                                <p id="item_title">' . $info->item_title . '</p>
                                <p id="item_year">' . $info->item_release_year . ' - ' . $info->item_end_year . '</p>
                                <p id="item_genre">' . $info->item_genre . '</p>
                                <p id="item_description">' . $info->item_description . '</p>
                                <p id="item_director"><span>Director:</span> ' . $info->item_director . '</p>
                                <p id="item_writer"><span>Writer:</span> ' . $info->item_writer . '</p>
                                <div id="imdb_box">
                                    <img id="imdb_logo" src="http://icons.iconarchive.com/icons/chrisbanks2/cold-fusion-hd/128/imdb-2-icon.png" alt="" />
                                    <a id="item_imdb" target="_blank" href="' . $info->item_imdb . '">Read more on IMDb</a>
                                </div>';
                }
            ?>
            <?php   foreach($item['list_info'] as $info) {
                        echo '<a id="item_list" href="' . base_url() . 'index.php/pcdb/list_items/' . $info->list_token . '"><span>List:</span> ' . $info->list_name . '</a>
                            </div>';
                }
            ?>
        </div>
    </div>
    
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js'></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>

