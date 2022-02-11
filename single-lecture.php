<?php acf_form_head(); ?>
<?php 
  get_header(); 
  $details = get_fields();
?>

<div id="content" class="site-content container">
  <div id="primary" class="content-area">
    
    <div class = "row">
      <div class = "col">
        
        <?php if ( have_posts() ) :  while ( have_posts() ) : the_post(); ?>
          <div class="">
            
            <h1 class="fw-bold bg-secondary text-white py-4 px-2 my-2 rounded" >
              <?php the_title(); ?> 
            </h1>
            
            <div class="bg-light py-2 my-2 rounded">
              <?php 
                if ( $details['handout_files']['link'] ) {
                  echo $details['handout_files']['link'];
                }
              ?> 
            </div> 
            
            <div class="bg-light py-2 my-2 rounded">
              <?php the_content(); ?> 
            </div>
            
            <div class="bg-light py-2 my-2 rounded">
              <?php
              
                if( stripos($details['url'],'youtu') === false){
                  //not YouTube video ?>
                  <p>
                    للاستاع للمحاضرة ،  هذا هو
                    <a href ="<?php echo $details['url'] ?>">
                       رابط محاضرة 
                       ( <?php the_title(); ?> ) 
                       كمقطع صوتي علي تلجرام
                    </a>
                  </p>
                 
                 <?php
                } else {
                  //is youtube
                  preg_match(
                    '/[\\?\\&]v=([^\\?\\&]+)/',
                    $details['url'] ,
                    $youtube_video_id
                  );
                  
                  ?>
                  <iframe width="560" height="315" src="http://www.youtube.com/v/<?php echo $youtube_video_id  ?>" title="<?php the_title(); ?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                  <?php
                }
              ?>
            </div>
            
          </div>
        <?php endwhile; endif; ?>
    
      </div>
    </div>
    
    <div class = "d-none row">
      <div class = "col border-tob">
        <?php comments_template(); ?>
      </div>
    </div> 

  </div><!-- #primary -->
</div><!-- #content -->

<?php get_footer(); ?>