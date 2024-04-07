<section class="sorting-product mt-5">
	<div class="container">
		<div class="product-category-infinite">
			<div id="category-infinite" data-slug='<?php echo $this->uri->segment(3) ?>'></div>
			<div id="subcategory-infinite" data-slug='<?php echo $this->uri->segment(4) ?>'></div>
			<div id="sort-infinite" data-slug='<?php if (!empty($this->input->get('sort'))) { echo $this->input->get('sort'); } ?>'></div>
		</div>
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
		    <div class="container-fluid">
	            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
	                <li class="nav-item dropdown">
	                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false"> Sorting </a>
	                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
	                        <li>
	                            <a class="dropdown-item" href="?sort=newstock">NEW IN STOCK</a>
	                        </li>
	                        <li>
	                            <a class="dropdown-item" href="?sort=popular">POPULAR</a>
	                        </li>
	                        <li>
	                            <a class="dropdown-item" href="?sort=highest">HIGHEST PRICE <i class="bi bi-arrow-up"></i></a>
	                        </li>
	                        <li>
	                            <a class="dropdown-item" href="?sort=lowest">LOWEST PRICE <i class="bi bi-arrow-down"></i></a>
	                        </li>
	                    </ul>
	                </li>
	            </ul>
		    </div>
		</nav>
	</div>
</section>