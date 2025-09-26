<?php
/*
Template Name: Page design
*/
get_header();

// Récupérer catégorie active depuis l’URL (?cat=slug)
$active_cat = isset($_GET['cat']) ? sanitize_text_field($_GET['cat']) : '';
?>

<!-- Bannière -->
<div class="container bg-light py-5">
  <div class="row align-items-center">
    <div class="col-md-6 ps-5"> 
      <h1>
        Picked Every Item With Care, 
        <span class="text-dark fw-bold">You Must Try.</span>
      </h1>
      <a href="<?php echo get_permalink( wc_get_page_id( 'shop' ) ); ?>" class="btn btn-dark mt-3">See Collection</a>
    </div>
    <div class="col-md-6 pe-5 text-end">
      <img src="<?php echo get_template_directory_uri(); ?>/174458320f70c88d11f38a4ab39e30db-removebg-preview.png" 
           alt="Produit" class="img-fluid rounded">
    </div>
  </div>
</div>

<!-- Promotions (statique, tu peux lier aux catégories plus tard) -->
<div class="container my-5">
  <div class="row g-4 text-center">
    <div class="col-md-4">
      <div class="d-flex align-items-center justify-content-between p-4 text-white bg-warning rounded h-100 flex-row-reverse">
        <div class="text-start">
          <h3>40% OFF</h3>
          <p>Mens Collection</p>
          <a href="?cat=men" class="btn btn-light btn-sm">Shop Now</a>
        </div>
        <img src="<?php echo get_template_directory_uri(); ?>/dc12aea3596fc735c236134eb7d23b37-removebg-preview.png" class="img-fluid rounded">
      </div>
    </div>
    <div class="col-md-4">
      <div class="d-flex align-items-center justify-content-between p-4 text-white bg-info rounded h-100">
        <div class="text-start">
          <h3>60% OFF</h3>
          <p>Womens Collection</p>
          <a href="?cat=women" class="btn btn-light btn-sm">Shop Now</a>
        </div>
        <img src="<?php echo get_template_directory_uri(); ?>/2e007c098124a64c2fbf93ea81565b7f-removebg-preview.png" class="img-fluid rounded">
      </div>
    </div> 
    <div class="col-md-4">
      <div class="d-flex align-items-center justify-content-between p-4 text-white bg-danger rounded h-100">
        <div class="text-start">
          <h3>30% OFF</h3>
          <p>Kids Collection</p>
          <a href="?cat=kids" class="btn btn-light btn-sm">Shop Now</a>
        </div>
        <img src="<?php echo get_template_directory_uri(); ?>/174458320f70c88d11f38a4ab39e30db-removebg-preview.png" class="img-fluid rounded">
      </div>
    </div> 
  </div>
</div>

<!-- Catégories dynamiques -->
<div class="container my-5">
  <h2 class="mb-4">Shop By Category</h2>
  <div class="d-flex overflow-auto flex-nowrap text-center py-3">
    <?php
    $categories = get_terms(array(
      'taxonomy'   => 'product_cat',
      'hide_empty' => false,
    ));
    if (!empty($categories) && !is_wp_error($categories)) {
      foreach ($categories as $category) {
        $thumbnail_id = get_term_meta($category->term_id, 'thumbnail_id', true);
        $image = wp_get_attachment_url($thumbnail_id);
        $is_active = ($active_cat === $category->slug) ? 'border border-3 border-primary' : '';
        ?>
        <div class="me-3">
          <a href="?cat=<?php echo esc_attr($category->slug); ?>" class="text-decoration-none">
            <img src="<?php echo esc_url($image); ?>" 
                 class="img-fluid rounded-circle mb-2 <?php echo $is_active; ?>" 
                 style="width:120px;height:120px;object-fit:cover;" 
                 alt="<?php echo esc_attr($category->name); ?>">
            <p><?php echo esc_html($category->name); ?></p>
          </a>
        </div>
      <?php }
    } ?>
  </div>
</div>

<!-- Produits dynamiques -->
<div class="container my-5">
  <h2 class="mb-4">
    <?php echo $active_cat ? 'Produits de la catégorie : ' . esc_html($active_cat) : 'Best Sellers'; ?>
  </h2>
  <div class="row g-4">
    <?php
    $args = array(
      'limit' => 12,
    );
    if ($active_cat) {
      $args['category'] = array($active_cat);
    }
    $products = wc_get_products($args);

    if (!empty($products)) {
      foreach ($products as $product) { ?>
        <div class="col-md-2 col-sm-6">
          <div class="card h-100 text-center border-0 shadow-sm">
            <?php echo $product->get_image('medium', [
              'class' => 'card-img-top img-fluid',
              'style' => 'height:200px;object-fit:cover;width:100%;'
            ]); ?>
            <div class="card-body">
              <h6 class="card-title"><?php echo $product->get_name(); ?></h6>
              <p>
                <?php 
                // Description complète limitée à 15 mots
                echo wp_trim_words($product->get_description(), 15); 
                ?>
              </p>
              <p class="text-muted"><?php echo wc_price($product->get_price()); ?></p>
              
            </div>
          </div>
        </div>
      <?php }
    } else {
      echo "<p>Aucun produit trouvé.</p>";
    }
    ?>
  </div>
</div>


<!-- Bannière promo -->
<div class="container my-5">
  <div class="row">
    <div class="col-12">
      <div class="p-5 text-center text-white rounded" style="background: linear-gradient(135deg, #f39c12, #e74c3c);">
        <h2 class="fw-bold">Up To <span class="text-dark">60% Off</span> Holiday Bit</h2>
      </div>
    </div>
  </div>
</div>

<?php get_footer(); ?>
