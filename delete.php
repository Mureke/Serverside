<!DOCTYPE html>

<?php 
    // Starts session with userID and password which user used to log in
    session_start();
	include("loggedInHeader.php"); 

    // Adds Post -class from posts.php so the form can use it's variables and functions
	$post = new Post;

       // Checks if user pressed "Delete"-button
	if(!empty($_POST['deletesubmit'])){
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	
		$post->postNumber = $_POST['postid'];

		echo '<p class="accountCreated">Post deleted! Redirecting back to forum...';
        $post->deletePost();
        ?>
        <!-- Hides everything except the redirecting message after deleting a post -->
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
}

?>
<!-- Prints the old post to a textarea -->
<div id="newPost">
    <form action="delete.php"method="post"> 
        <p class="new-post">
            <!-- Prints the old post -->
            <div class="postrender" id="post" type="text" name="post" size="2500" maxlength="2500" value=""><?php if(!empty($_GET['oldpost'])){echo ($_GET['oldpost']);}?></div>
        </p>
        <!-- PostID for the sql queries -->
        <input type="hidden" name="postid" value="<?php echo $_GET['postid']; ?>"/>
        <!-- Confirmation text and "Delete"/"Back" -buttons -->
        <p class="new-post"><label class="label" for="post">Are you sure you want to delete the post?</label><button class="delete" id="submit" type="submit" name="back" value="back"><a href="private.php">Back to forum</a></button><button class="delete" id="submit" type="submit" name="deletesubmit" value="delete">Delete post</button></p>
    </form>
</div>

<?php include("footer.php"); ?>