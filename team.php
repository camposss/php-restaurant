<?php 
define("TITLE", "Team | Franklin's Fine Dining");
include('includes/header.php');

?>
<div id="team-members" class="cf">
    <h1>Our Team at Franklins</h1>
    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Eligendi sapiente eos, iusto corrupti sunt deserunt assumenda in tempora eum blanditiis.</p>
    <hr>
    <?php
    if($teamMembers){
        foreach($teamMembers as $member){
            ?>
            <div class="member">
                <img src="img/<?php echo $member['img']; ?>.png" alt="<?php echo $member['name']; ?>">
                <h2><?php echo $member['name'] ?></h2>
                <p><?php echo $member['bio']?></p>
            </div>
            <?php
        } 
    }
    ?>
</div> 
<?php include('includes/footer.php'); ?>