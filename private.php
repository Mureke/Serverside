<?php 
	include("loggedInHeader.php"); 

	$post = new Post;

	// Checks if the user typed anything into the textarea 

	if(!empty($_POST['postsubmit'])){
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$errors = array(); 
	if (empty($_POST['post'])) {
		$errors[] = 'You need to post something before publishing.';
	} else {
		$post->postContent = trim($_POST['post']);
		$post->userId = $_SESSION['id'];
	}

	if (empty($errors)) { 
	echo '<p class="accountCreated">New post created!';
         $post->createPost();
         
         /*
          * This is added so user can refresh the page without resubmitting the form.
          */
         echo "<script> window.location.assign('private.php'); </script>";
	}
        else { 
		echo '<p class="error">The following error(s) occurred:<br>';
		foreach ($errors as $msg) { 
			echo " - $msg<br>\n";
                }
		}
	}
}
        
	
?>

<div id="newPost">
	<form action="private.php" method="post">
			<p class="new-post"><label class="label" for="post">New post:</label><textarea id="post" type="text" name="post" size="2500" maxlength="2500" value="<?php if (isset($_POST['post'])) echo $_POST['post']; ?>"></textarea></p>
            <p class="new-post"><button id="submit" type="submit" name="postsubmit" value="post">Publish post</button></p>
	</form>
</div>
        
<?php
//Rendering all posts, poster names and avatars
    $postarray = $post->showPosts();
    foreach($postarray as $item): ?>
       <div class="renderpostbox">
           <img class ="avatar" src="<?php echo 'images/'. $item['avatar'] . '.jpg' ?>"/>
           <p class="postername"> <?php echo $item['name']; ?> </p>
           <p class="postrender"> <?php echo $item['post']; ?> </p>
       </div> 
    <?php endforeach; ?>