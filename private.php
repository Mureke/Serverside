<?php 
        session_start();
	include("loggedInHeader.php"); 

	$post = new Post;

	// Checks if the user typed anything post into the textarea 

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
	echo '<p class="accountCreated">New post created! Refreshing page..';
         $post->createPost();
         
         /*
          * This is added so user can refresh the page without resubmitting the form.
          */
          echo '<script type="text/javascript">setTimeout(function(){window.top.location="private.php"} , 1000);</script>';
	}
        else { 
		echo '<p class="error">The following error(s) occurred:<br>';
		foreach ($errors as $msg) { 
			echo " - $msg<br>\n";
                }
		}
	}
}

    $comment = new Comment;
    if(!empty($_POST['commentsubmit'])){
     if ($_SERVER['REQUEST_METHOD'] == 'POST') {
         $errors = array();
         
         if (empty($_POST['comment'])) {
		$errors[] = "You can't submit an empty comment.";
	} else {
		$comment->comment = trim($_POST['comment']);
		$comment->userId = $_SESSION['id'];
                $comment->postId = $_POST['commentsubmit'];
	}
        
            if (empty($errors)) { 
             echo '<p class="accountCreated">New comment created! Refreshing page..';
             echo $comment->postId;
             $comment->create();
              /*
               * This is added so user can refresh the page without resubmitting the form.
               */
               echo '<script type="text/javascript">setTimeout(function(){window.top.location="private.php"} , 1000);</script>';
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
       <div class="postwrapper">
           <img class ="avatar" src="<?php echo 'images/'. $item['avatar'] . '.jpg' ?>"/>
           <p class="postername"> <?php echo $item['name']; ?> </p>


           <?php // Shows Edit and Delete post buttons if the current user is the same as poster
           if ($item['name'] == $_SESSION['name']) {

           		?><button class="deletePost" id="submit" type="submit" name="postdelete" value="delete"><?php echo "<a href=\"delete.php?postid=" . $item['postid'] .  "&oldpost=" . trim($item['post']) ."\">Delete</a>"; ?></button>

           		<button class="editPost" id="submit" type="submit" name="postedit" value="edit"><?php echo "<a href=\"edit.php?postid=" . $item['postid'] . "&oldpost=" . trim($item['post']) ."\">Edit</a>"; ?></button>
           		<?php
           	} ?>
           	
           <div class="postrender"><?php echo $item['post']; ?></div>
       </div>
           
           <!-- Comment section -->
           <div class="commentsection">
            <form class="commentform" method="post" action="private.php">
                <p class="addcomment">Add comment:</p><input class="commentarea" type="text" name="comment"></input>
                <button class="postcomment" id="submit" type="submit" name="commentsubmit" value=" <?php echo $item['postid']; ?> ">Comment</button>
            </form>
           </div>
       </div> 
    <?php endforeach; ?>