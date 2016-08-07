<!DOCTYPE html>
<html>
<head>
    <title>Update Item</title>
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/list_opp.css" type="text/css" media="screen" charset="utf-8">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Acme">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Josefin Sans">
</head>
<body
    <div id="box">
        <h1>Update the item</h1>
        <form action="<?php  echo base_url() . 'index.php/pcdb/update_item/' . $this->uri->segment(3); ?>" enctype="multipart/form-data" method="post">
             <div class="form-group">
                <label for="cover">Cover (upload)</label>
                <input type="file" id="cover" name="cover"  />
            </div>
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control input" value="<?php echo $item_info->item_title; ?>" id="title" name="title" placeholder="Add your title ..." />
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control input" id="description" name="description" placeholder="Add your description ..."><?php echo $item_info->item_description; ?></textarea>
            </div>
            <div class="form-group">
                <label for="director">Director</label>
                <input type="text" class="form-control input" value="<?php echo $item_info->item_director; ?>" id="director" name="director" placeholder="Add director's name ..." />
            </div>
            <div class="form-group">
                <label for="writer">Writer</label>
                <input type="text" class="form-control input" value="<?php echo $item_info->item_writer; ?>" id="writer" name="writer" placeholder="Add writer's name ..." />
            </div>
            <div class="form-group">
                <label for="genre">Genre</label>
                <input type="text" class="form-control input" value="<?php echo $item_info->item_genre; ?>" id="genre" name="genre" placeholder="Add the genre ..." />
            </div>
            <div class="form-group">
                <label for="imdb">IMDb Link</label>
                <input type="text" class="form-control input" value="<?php echo $item_info->item_imdb; ?>" id="imdb" name="imdb" placeholder="Add the imdb link ..." />
            </div>
            <div class="form-group">
                <label for="ryear">Release Year</label>
                <input type="text" class="form-control input" value="<?php echo $item_info->item_release_year; ?>" id="ryear" name="ryear" placeholder="Add the release year ..." /> 
            </div>
            <div class="form-group">
                <label for="eyear">Ending Year</label>
                <input type="text" class="form-control input" value="<?php echo $item_info->item_end_year; ?>" id="eyear" name="eyear" placeholder="Add the ending year ..." />
            </div>
            <div class="form-group" id="submit-container">             
                <input type="submit" value="Add Item" name="addItem" id="addItem" />
            </div>
            <?php echo validation_errors('<p class="error">'); ?>
        </form>
    </div>
</body>
