<!DOCTYPE html>

<?php 
  // Starts session with userID and password which user used to log in
  session_start();
	include("loggedInHeader.php"); 
  // Adds Post -class from posts.php so the form can use it's variables and functions
	$post = new Post;
   
  // Checks if user pressed "Edit"-button     
	if(!empty($_POST['editsubmit'])){
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$errors = array(); 
  // Checks if the textarea contains a value
	if (empty($_POST['post'])) {
		$errors[] = 'You need to post something before publishing.';
	} else {
		$post->postContent = trim($_POST['post']);
		$post->postNumber = $_POST['postid'];
	}

	if (empty($errors)) { 
	echo '<p class="accountCreated">Post updated! Redirecting back to forum...';
         $post->editPost();
         ?>
         <!-- Hides everything except the redirecting message after editing a post -->
         <style>
        	#newPost{
        		display:none;
        	}
        </style>
        <?php
         
         /*
          * This is added so user is redirected back to forum page after modifying the post.
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
<!-- Prints the old post to a textarea -->
<div id="newPost">
    <form action="edit.php"method="post"> 
        <p class="new-post">
            <label class="label" for="post">Edit post:</label>
            <!-- Prints the old post -->
            <textarea id="post" type="text" name="post" size="2500" maxlength="2500" value=""><?php if(!empty($_GET['oldpost'])){echo ($_GET['oldpost']);}?></textarea>
        </p>
        <!-- PostID for the sql queries -->
        <input type="hidden" name="postid" value="<?php echo $_GET['postid']; ?>"/>
        <!-- "Edit"/"Back" -buttons -->
        <p class="new-post"><button id="submit" type="submit" name="back" value="back"><a href="private.php">Back to forum</a></button><button id="submit" type="submit" name="editsubmit" value="post">Update post</button></p>
    </form>
</div>

<?php include("footer.php"); ?>