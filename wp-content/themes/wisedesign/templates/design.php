<?php
/*
Template Name: Page design
*/

get_header();
?>
 
<?php 

// Récupère les produits WooCommerce
$products = wc_get_products(array(
    'limit' => 2, // combien de produits afficher
));
$product_categories = get_terms(array(
    'taxonomy'   => 'product_cat', 
    'hide_empty' => true,          
));


 

 
 
 
?>
 
 <div class="container bg-light py-5">
  <div class="row align-items-center">
    
    <div class="col-md-6 ps-5"> 
      <h1>
        Picked Every Item With Care, 
        <span class="text-dark fw-bold">You Must Try.</span>
      </h1>
      <a href="#" class="btn btn-dark mt-3">See Collection</a>
    </div>

    
    <div class="col-md-6 pe-5 text-end">
      <img src="wp-content/themes/wisedesign/174458320f70c88d11f38a4ab39e30db-removebg-preview.png" alt="Produit" class="img-fluid rounded">
    </div>
  </div>
</div>


        

  
<div class="container my-5">
  <div class="row g-4 text-center">
   
    
   
    <div class="col-md-4">
      <div class="d-flex align-items-center justify-content-between p-4 text-white bg-warning rounded h-100 flex-row-reverse">
       
        <div class="text-start">
          <h3>40% OFF</h3>
          <p>Mens Collection</p>
          <a href="#" class="btn btn-light btn-sm">Shop Now</a>
        </div>
   
        <img src="wp-content/themes/wisedesign/dc12aea3596fc735c236134eb7d23b37-removebg-preview.png" alt="Produit" class="img-fluid rounded">
      </div>
    </div>
 

  
    <div class="col-md-4">
      <div class="d-flex align-items-center justify-content-between p-4 text-white bg-info rounded h-100">
        <div class="text-start">
          <h3>60% OFF</h3>
          <p>Womens Collection</p>
          <a href="#" class="btn btn-light btn-sm">Shop Now</a>
        </div>
         <img src="wp-content/themes/wisedesign/2e007c098124a64c2fbf93ea81565b7f-removebg-preview.png" alt="Produit" class="img-fluid rounded">
      </div>
      
    </div> 

    
    <div class="col-md-4">
      <div class="d-flex align-items-center justify-content-between p-4 text-white bg-danger rounded h-100">
        <div class="text-start">
          <h3>30% OFF</h3>
          <p>Kids Collection</p>
          <a href="#" class="btn btn-light btn-sm">Shop Now</a>
        </div>
         <img src="wp-content/themes/wisedesign/174458320f70c88d11f38a4ab39e30db-removebg-preview.png" alt="Produit" class="img-fluid rounded">
      </div>
    </div> 

  </div>
</div>
 

<div class="container my-5">
    <h2 class="mb-4">Shop By Category</h2>
    <div class="d-flex overflow-auto flex-nowrap text-center py-3">

        <?php
        // Récupérer toutes les catégories de produits
        $product_categories = get_terms(array(
            'taxonomy'   => 'product_cat',
            'hide_empty' => true,
        ));

        if ( ! empty( $product_categories ) && ! is_wp_error( $product_categories ) ) {
            foreach ( $product_categories as $category ) {

                // Récupérer l'URL de l'image de la catégorie
                $thumbnail_id = get_term_meta( $category->term_id, 'thumbnail_id', true );
                $image_url = $thumbnail_id ? wp_get_attachment_url( $thumbnail_id ) : wc_placeholder_img_src(); // image par défaut si pas d'image
                ?>

                <div class="me-3">
                    <a href="<?php echo esc_url( get_term_link( $category ) ); ?>">
                        <img src="<?php echo esc_url( $image_url ); ?>" 
                             class="img-fluid rounded-circle mb-2" 
                             style="width:120px;height:120px;object-fit:cover;" 
                             alt="<?php echo esc_attr( $category->name ); ?>">
                        <p><?php echo esc_html( $category->name ); ?></p>
                    </a>
                </div>

                <?php
            }
        }
        ?>

    </div>
</div>

<!-- <div class="container my-5">
     <h2 class="mb-4">Shop By Category</h2>
  <div class="d-flex overflow-auto flex-nowrap text-center py-3">
    
    <div class="me-3">
      <img src="wp-content/themes/wisedesign/2b4134886f833a570ba52e06ae8207e8.jpg" class="img-fluid rounded-circle mb-2" style="width:120px;height:120px;object-fit:cover;" alt="Sunglass">
      <p>Sunglass</p>
    </div>
    
    <div class="me-3">
      <img src="wp-content/themes/wisedesign/d83808ee0fd62b6170d036efd2ba0184.jpg" class="img-fluid rounded-circle mb-2" style="width:120px;height:120px;object-fit:cover;" alt="Watch">
      <p>Watch</p>
    </div>
    
    <div class="me-3">
      <img src="wp-content/themes/wisedesign/a818f674dfd47f5955319fbbb50d534c.jpg" class="img-fluid rounded-circle mb-2" style="width:120px;height:120px;object-fit:cover;" alt="Shoes">
      <p>Shoes</p>
    </div>
    
    <div class="me-3">
      <img src="wp-content/themes/wisedesign/87305e85395c4f219f9e5065ca93b7b8-removebg-preview.png" class="img-fluid rounded-circle mb-2" style="width:120px;height:120px;object-fit:cover;" alt="Bag">
      <p>Bag</p>
    </div>
    
    <div class="me-3">
      <img src="wp-content/themes/wisedesign/61570ce9eac0be3407e965251583c6e8.jpg "class="img-fluid rounded-circle mb-2" style="width:120px;height:120px;object-fit:cover;" alt="Kids">
      <p>Kids</p>
    </div>
    
    <div class="me-3">
      <img src="wp-content/themes/wisedesign/d5fdc62ac1f310a037d3bd46b1be155e.jpg"" class="img-fluid rounded-circle mb-2" style="width:120px;height:120px;object-fit:cover;" alt="Sports">
      <p>Sports</p>
    </div>
    
    <div class="me-3">
      <img src="wp-content/themes/wisedesign/0288fcd87ed6e588f0d249a53e3405dc.jpg" class="img-fluid rounded-circle mb-2" style="width:120px;height:120px;object-fit:cover;" alt="Men">
      <p>Men</p>
    </div>
    
    <div class="me-3">
      <img src="wp-content/themes/wisedesign/9097871411754391bf39cfb9d417f92f.jpg" class="img-fluid rounded-circle mb-2" style="width:120px;height:120px;object-fit:cover;" alt="Women">
      <p>Women</p>
    </div>

  </div>
</div> -->
 
<div class="container my-5">
  <div class="row g-4">

    
    <div class="col-md-2 col-sm-6">
      <?php foreach ($products as $product) :?>

      <div class="card h-100 text-center border-0 shadow-sm">
        <!-- <img src="wp-content/themes/wisedesign/9097871411754391bf39cfb9d417f92f.jpg" 
             class="card-img-top img-fluid" 
             alt="Produit 1"
             style="height:200px; object-fit:cover; width:100%;">
        <div class="card-body"> -->
   <?php echo $product->get_image('medium', [
            'class' => 'card-img-top img-fluid product-img',
            'style' => 'height:200px; object-fit:cover; width:100%;'
        ]); ?>
          <h6 class="card-title"><?php echo $product->get_name();?></h6>
          <p><?php echo $product->get_description();  ?> </p>
          <p class="text-muted"><?php echo $product->get_price();?></p>
        </div>
      </div>
      <?php endforeach ;?>
    </div>

  
    <!-- <div class="col-md-2 col-sm-6">
      <div class="card h-100 text-center border-0 shadow-sm">
        <img src="wp-content/themes/wisedesign/2e007c098124a64c2fbf93ea81565b7f.jpg" 
             class="card-img-top img-fluid" 
             alt="Produit 2"
             style="height:200px; object-fit:cover; width:100%;">
        <div class="card-body">
          <h6 class="card-title">body mach long</h6>
          <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. </p>
          <p class="text-muted">€69.99</p>
        </div>
      </div>
    </div>

   
    <div class="col-md-2 col-sm-6">
      <div class="card h-100 text-center border-0 shadow-sm">
        <img src="wp-content/themes/wisedesign/d83808ee0fd62b6170d036efd2ba0184.jpg" 
             class="card-img-top img-fluid" 
             alt="Produit 3"
             style="height:200px; object-fit:cover; width:100%;">
        <div class="card-body">
          <h6 class="card-title">bretelle</h6>
          <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. </p>
          <p class="text-muted">€79.99</p>
        </div>
      </div>
    </div>

   
    <div class="col-md-2 col-sm-6">
      <div class="card h-100 text-center border-0 shadow-sm">
        <img src="wp-content/themes/wisedesign/d5fdc62ac1f310a037d3bd46b1be155e.jpg" 
             class="card-img-top img-fluid" 
             alt="Produit 4"
             style="height:200px; object-fit:cover; width:100%;">
        <div class="card-body">
          <h6 class="card-title">sac à main</h6>
          <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. </p>
          <p class="text-muted">€89.99</p>
        </div>
      </div>
    </div>

  
    <div class="col-md-2 col-sm-6">
      <div class="card h-100 text-center border-0 shadow-sm">
        <img src="wp-content/themes/wisedesign/61570ce9eac0be3407e965251583c6e8.jpg" 
             class="card-img-top img-fluid" 
             alt="Produit 5"
             style="height:200px; object-fit:cover; width:100%;">
        <div class="card-body">
          <h6 class="card-title">bouson</h6>
          <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. </p>
          <p class="text-muted">€99.99</p>
        </div>
      </div>
    </div> -->

   
    <!-- <div class="col-md-2 col-sm-6">
      <div class="card h-100 text-center border-0 shadow-sm">
        <img src="wp-content/themes/wisedesign/2b4134886f833a570ba52e06ae8207e8.jpg" 
             class="card-img-top img-fluid" 
             alt="Produit 6"
             style="height:200px; object-fit:cover; width:100%;">
        <div class="card-body">
          <h6 class="card-title">pul</h6>
          <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. </p>
          <p class="text-muted">€109.99</p>
        </div>
      </div>
    </div> -->

  </div>
</div>

<!-- <div class="container my-5">
  <div class="row g-4">
    
   <div class="container my-5">
  <div class="row g-4">

   
    <div class="col-md-2 col-sm-6">
      <div class="card h-100 text-center border-0 shadow-sm">
        <img src="wp-content/themes/wisedesign/9097871411754391bf39cfb9d417f92f.jpg" 
             class="card-img-top img-fluid" 
             alt="Produit 1"
             style="height:200px; object-fit:cover; width:100%;">
        <div class="card-body">
          <h6 class="card-title">survetemment</h6>
          <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. </p>
          <p class="text-muted">€59.99</p>
        </div>
      </div>
    </div>

   
    <div class="col-md-2 col-sm-6">
      <div class="card h-100 text-center border-0 shadow-sm">
        <img src="wp-content/themes/wisedesign/2e007c098124a64c2fbf93ea81565b7f.jpg" 
             class="card-img-top img-fluid" 
             alt="Produit 2"
             style="height:200px; object-fit:cover; width:100%;">
        <div class="card-body">
          <h6 class="card-title">tri-schort</h6>
          <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. </p>
          <p class="text-muted">€69.99</p>
        </div>
      </div>
    </div>

   
    <div class="col-md-2 col-sm-6">
      <div class="card h-100 text-center border-0 shadow-sm">
        <img src="wp-content/themes/wisedesign/d83808ee0fd62b6170d036efd2ba0184.jpg" 
             class="card-img-top img-fluid" 
             alt="Produit 3"
             style="height:200px; object-fit:cover; width:100%;">
        <div class="card-body">
          <h6 class="card-title">sac au dos</h6>
          <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. </p>
          <p class="text-muted">€79.99</p>
        </div>
      </div>
    </div>

   
    <div class="col-md-2 col-sm-6">
      <div class="card h-100 text-center border-0 shadow-sm">
        <img src="wp-content/themes/wisedesign/99ed564b88b56d85ebda749a9466ade1.jpg" 
             class="card-img-top img-fluid" 
             alt="Produit 4"
             style="height:200px; object-fit:cover; width:100%;">
        <div class="card-body">
          <h6 class="card-title">Produit 4</h6>
          <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. </p>
          <p class="text-muted">€89.99</p>
        </div>
      </div>
    </div>

   
    <div class="col-md-2 col-sm-6">
      <div class="card h-100 text-center border-0 shadow-sm">
        <img src="wp-content/themes/wisedesign/61570ce9eac0be3407e965251583c6e8.jpg" 
             class="card-img-top img-fluid" 
             alt="Produit 5"
             style="height:200px; object-fit:cover; width:100%;">
        <div class="card-body">
          <h6 class="card-title">Montre</h6>
          <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. </p>
          <p class="text-muted">€99.99</p>
        </div>
      </div>
    </div>

   
    <div class="col-md-2 col-sm-6">
      <div class="card h-100 text-center border-0 shadow-sm">
        <img src="wp-content/themes/wisedesign/a818f674dfd47f5955319fbbb50d534c.jpg" 
             class="card-img-top img-fluid" 
             alt="Produit 6"
             style="height:200px; object-fit:cover; width:100%;">
        <div class="card-body">
          <h6 class="card-title">lunette</h6>
          <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. </p>
          <p class="text-muted">€109.99</p>
        </div>
      </div>
    </div>

  </div>
</div> -->


<div class="container my-5">
  <div class="row">
    <div class="col-12">
      <div class="p-5 text-center text-white rounded" style="background: linear-gradient(135deg, #f39c12, #e74c3c);">
        <h2 class="fw-bold">Up To <span class="text-dark">60% Off</span> Holiday Bit</h2>
      </div>
    </div>
  </div>
</div>




<?php

get_footer();//fonction php qui ajoute le code du footer contenu dans footer.php	

