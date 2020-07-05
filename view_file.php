<?php
 $storeuploadfile = array_diff(scandir('storeupload'), array('.','..'));

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php 
        define('TITLE', 'View Upload File');
        include('templates/headerlogin.html');
    ?>
</head>

<body>
    <!-- Main jumbotron for a primary marketing message or call to action -->
    <h1>View Upload Files</h1>
    <table class="table">
        <thead>
            <th>Name</th>
            <th>Type</th>
            <th>Size</th>
            <th>Action</th>
        </thead>
        <tbody>
            <?php foreach($storeuploadfile as $file):?>
            <?php $f = pathinfo($file); ?>
            <tr>
                <td><?php echo $f['filename'];?></td>
                <td><?php echo $f['extension'];?></td>
                <td><?php echo round(filesize(__DIR__.'/storeupload/'.$file)/1024,2)?>KB</td>
                <td><a href="<?php echo 'storeupload/' . $f['basename'] ?>" target="_blank">View or Download</a></td>
             </tr>
             <?php endforeach ?>
        </tbody>
    </table>

</body>
<footer>
    <?php
        include('templates/footer1.html'); // Need the footer.
    ?>
</footer>

</html>