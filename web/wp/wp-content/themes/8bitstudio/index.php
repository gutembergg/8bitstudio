<?php
/*
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @see https://developer.wordpress.org/themes/basics/template-hierarchy/
 * @since Twenty Nineteen 1.0
 */

 get_header();
?>

<div>Home</div>

 <?php echo do_shortcode('[external_data]'); ?>
<?php $list = do_shortcode('[external_data]');
 ?>
<?php $value = 10; ?>

<!--  <?php if (isset($_POST['btn_amout'])) {
     var_dump($list);
     fetch_api_8b($value);
 }

 ?> -->


 <form  method="post">
    <input type="submit" value="Update" name="btn_amout">
</form>

<!-- <form action="<?php echo plugin_dir_path(); ?>/process.php" method="post">
    <input type="text" name="keyName">
    <input type="submit" value="Update">
</form> -->




