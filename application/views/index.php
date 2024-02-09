<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="/assets/bookmark.css">
        <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
        <title>Document</title>
    </head>
    <body>
       <h1>Add a Bookmark</h1>
       <form action="/bookmarks/add" method="post">
            <label for="name">Name: </label>
            <input type="text" name="name" placeholder="Hacker Hero" required>
            <label for="url">URL: </label>
            <input type="text" name="url" placeholder="https://www.hackerhero.com/" required>
            <label for="folder">Folder: </label>
            <select name="folder" id="folder">
                <option value="favorites">Favorites</option>
                <option value="others">Others</option>
            </select>
            <input type="submit" name="add" value="Add">
        </form>

        <!-- Display error message if exists -->
<?php   if (!empty($error_message)) 
        {   ?>
            <p style="color: red"><?= $error_message ?></p>
<?php   }   ?>

        <h1>Bookmarks</h1>
        <table style="border-collapse: collapse", border=1>
            <tr>
                <th>Folder</th>
                <th>Name</th>
                <th>URL</th>
                <th>Action</th>
            </tr>
<?php       foreach($bookmarks as $bookmark)
            {   ?>
            <tr>
                <td><?= $bookmark['folder'] ?></td>
                <td><?= $bookmark['name'] ?></td>
                <td><?= $bookmark['url'] ?></td>
                <td>
                    <form action="/bookmarks/add" method="post">
                        <input type="hidden" name="name" value="<?= $bookmark['name'] ?>">
                        <input type="hidden" name="url" value="<?= $bookmark['url'] ?>">
                        <input type="hidden" name="delete" value="1">
                        <input type="submit" value="Delete">
                    </form>
                </td>
            </tr>            
<?php       }   ?>
        </table>
    </body>
</html>





<!-- <td> -->

<!-- $bookmark['action']  -->
    
<!-- </td> -->