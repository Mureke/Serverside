<!DOCTYPE html>

<?php 

    session_start();
	include("loggedInHeader.php"); 

	$post = new Post;
       
	if(!empty($_POST['deletesubmit'])){
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	
		$post->postNumber = $_POST['postid'];

		echo '<p class="accountCreated">Post deleted! Redirecting back to forum...';
        $post->deletePost();
         
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
            <label class="label" for="post">Delete post:</label>
            <textarea disabled class="postrender" id="post" type="text" name="post" size="2500" maxlength="2500" value=""><?php if(!empty($_GET['oldpost'])){echo ($_GET['oldpost']);}?></textarea>
        </p>
        <input type="hidden" name="postid" value="<?php echo $_GET['postid']; ?>"/>
        <p class="new-post"><button class="delete" id="submit" type="submit" name="back" value="back"><a href="private.php">Back to forum</a></button><button class="delete" id="submit" type="submit" name="deletesubmit" value="delete">Delete post</button></p>
    </form>
</div>