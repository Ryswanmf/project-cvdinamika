/**
 * Products Navigation & Filter System
 * Implements drill-down navigation: Category > Brand > Collection > Products
 */

// Global state
let currentState = {
  category: "semua",
  brand: null,
  collection: null,
  currentPage: 1,
  itemsPerPage: 12,
};

// Product catalog data (loaded from JSON)
let productCatalog = {};

// Initialize on page load
document.addEventListener("DOMContentLoaded", function () {
  loadProductData();
});

/**
 * Load product data from JSON file
 */
async function loadProductData() {
  try {
    const response = await fetch("/data/products.json");
    const data = await response.json();

    // Transform JSON structure to our catalog format
    productCatalog = {};
    data.categories.forEach((category) => {
      const categoryData = {
        name: category.name,
        description_file: category.description_file,
        brands: {},
      };

      category.brands.forEach((brand) => {
        if (brand.has_subfolders) {
          // Brand with subfolders (collections)
          categoryData.brands[brand.id] = {
            name: brand.name,
            hasSubfolders: true,
            collections: {},
          };

          brand.subfolders.forEach((subfolder) => {
            categoryData.brands[brand.id].collections[subfolder.id] = {
              name: subfolder.name,
              downloadUrl: subfolder.description_file
                ? `/uploads/brochures/${subfolder.description_file}`
                : null,
              products: subfolder.items.map((item) => ({
                id: item.id,
                name: item.name,
                image: `/${item.image}`,
                description: item.description,
              })),
            };
          });
        } else {
          // Brand without subfolders (direct products)
          categoryData.brands[brand.id] = {
            name: brand.name,
            hasSubfolders: false,
            products: brand.items.map((item) => ({
              id: item.id,
              name: item.name,
              image: `/${item.image}`,
              description: item.description,
            })),
          };
        }
      });

      productCatalog[category.id] = categoryData;
    });

    // Initialize navigation after data is loaded
    initializeNavigation();
    loadAllProducts();
  } catch (error) {
    console.error("Error loading product data:", error);
    showError("Gagal memuat data produk. Silakan refresh halaman.");
  }
}

/**
 * Show error message
 */
function showError(message) {
  const grid = document.getElementById("products-grid");
  grid.innerHTML = `
        <div class="col-12 text-center py-5">
            <i class="fas fa-exclamation-triangle fa-4x text-danger mb-3"></i>
            <h5>${message}</h5>
            <button class="btn btn-primary mt-3" onclick="location.reload()">
                <i class="fas fa-redo me-2"></i>Reload Halaman
            </button>
        </div>
    `;
}

/**
 * Initialize navigation event listeners
 */
function initializeNavigation() {
  // Render dynamic categories
  renderCategories();

  // Category buttons
  document.querySelectorAll(".category-btn").forEach((btn) => {
    btn.addEventListener("click", function () {
      const category = this.dataset.category;
      selectCategory(category);
    });
  });

  // Reset filter button
  document
    .getElementById("reset-filter")
    .addEventListener("click", function () {
      resetFilters();
    });

  // Lightbox modal events
  const lightboxModal = document.getElementById("productLightbox");
  if (lightboxModal) {
    lightboxModal.addEventListener("hidden.bs.modal", function () {
      document.getElementById("lightbox-image").src = "";
    });
  }
}

/**
 * Render category buttons dynamically
 */
function renderCategories() {
  const categoryList = document.getElementById("category-list");

  // Get icon mapping
  const iconMap = {
    "homogeneous-sheet": "layer-group",
    "heterogeneous-sheet": "grip-horizontal",
    "heterogeneous-speciality": "star",
    "plank-tile": "border-all",
    aksesoris: "tools",
  };

  // Clear existing categories (except "Semua Produk")
  const semuaBtn = categoryList.querySelector('[data-category="semua"]');
  categoryList.innerHTML = "";
  categoryList.appendChild(semuaBtn);

  // Add categories from catalog
  Object.keys(productCatalog).forEach((categoryId) => {
    const category = productCatalog[categoryId];
    const icon = iconMap[categoryId] || "folder";

    const btn = document.createElement("button");
    btn.className = "btn btn-outline-primary w-100 mb-2 category-btn";
    btn.dataset.category = categoryId;
    btn.innerHTML = `<i class="fas fa-${icon} me-2"></i>${category.name}`;

    btn.addEventListener("click", function () {
      selectCategory(categoryId);
    });

    categoryList.appendChild(btn);
  });
}

/**
 * Select category and update navigation
 */
function selectCategory(category) {
  currentState.category = category;
  currentState.brand = null;
  currentState.collection = null;
  currentState.currentPage = 1;

  // Update active button
  document.querySelectorAll(".category-btn").forEach((btn) => {
    btn.classList.remove("active");
    if (btn.dataset.category === category) {
      btn.classList.add("active");
    }
  });

  // Update breadcrumb
  updateBreadcrumb();

  if (category === "semua") {
    // Show all products
    loadAllProducts();
    hideBrandFilter();
    hideCollectionFilter();
    hideDownloadSection();
  } else {
    // Check if category has description file and it's not empty
    const categoryData = productCatalog[category];
    if (
      categoryData &&
      categoryData.description_file &&
      categoryData.description_file.trim() !== ""
    ) {
      // Verify file exists by checking if it can be accessed
      checkFileExists(categoryData.description_file, categoryData.name);
    } else {
      hideDownloadSection();
    }

    // Show brands for selected category
    loadBrandsForCategory(category);
  }
}

/**
 * Load all products from all categories
 */
function loadAllProducts() {
  const allProducts = [];

  Object.keys(productCatalog).forEach((categoryKey) => {
    const category = productCatalog[categoryKey];
    Object.keys(category.brands).forEach((brandKey) => {
      const brand = category.brands[brandKey];

      if (brand.hasSubfolders && brand.collections) {
        // Has collections
        Object.keys(brand.collections).forEach((collectionKey) => {
          const collection = brand.collections[collectionKey];
          allProducts.push(...collection.products);
        });
      } else {
        // Direct products
        allProducts.push(...brand.products);
      }
    });
  });

  renderProducts(allProducts);
  updateSectionTitle("Semua Produk", allProducts.length + " produk tersedia");
}

/**
 * Load brands for selected category
 */
function loadBrandsForCategory(categoryKey) {
  const category = productCatalog[categoryKey];
  if (!category) return;

  const brandListHtml = Object.keys(category.brands)
    .map((brandKey) => {
      const brand = category.brands[brandKey];
      return `
            <button class="btn btn-outline-secondary w-100 mb-2 brand-btn" data-brand="${brandKey}">
                ${brand.name}
            </button>
        `;
    })
    .join("");

  document.getElementById("brand-list").innerHTML = brandListHtml;
  showBrandFilter();
  hideCollectionFilter();

  // Add event listeners to brand buttons
  document.querySelectorAll(".brand-btn").forEach((btn) => {
    btn.addEventListener("click", function () {
      selectBrand(this.dataset.brand);
    });
  });

  // Load all products from this category
  const categoryProducts = [];
  Object.keys(category.brands).forEach((brandKey) => {
    const brand = category.brands[brandKey];
    if (brand.hasSubfolders && brand.collections) {
      Object.keys(brand.collections).forEach((collectionKey) => {
        const collection = brand.collections[collectionKey];
        categoryProducts.push(...collection.products);
      });
    } else {
      categoryProducts.push(...brand.products);
    }
  });

  renderProducts(categoryProducts);
  updateSectionTitle(
    category.name,
    categoryProducts.length + " produk tersedia",
  );
}

/**
 * Select brand and show collections or products
 */
function selectBrand(brandKey) {
  currentState.brand = brandKey;
  currentState.collection = null;

  // Update active brand button
  document.querySelectorAll(".brand-btn").forEach((btn) => {
    btn.classList.remove("active");
    if (btn.dataset.brand === brandKey) {
      btn.classList.add("active");
    }
  });

  const category = productCatalog[currentState.category];
  const brand = category.brands[brandKey];

  updateBreadcrumb();

  if (brand.hasSubfolders && brand.collections) {
    // Show collections
    loadCollectionsForBrand(brand);
  } else {
    // Show products directly
    renderProducts(brand.products);
    updateSectionTitle(brand.name, brand.products.length + " produk tersedia");
    hideCollectionFilter();
  }
}

/**
 * Load collections for selected brand
 */
function loadCollectionsForBrand(brand) {
  const collectionListHtml = Object.keys(brand.collections)
    .map((collectionKey) => {
      const collection = brand.collections[collectionKey];
      return `
            <button class="btn btn-outline-info w-100 mb-2 collection-btn" data-collection="${collectionKey}">
                <i class="fas fa-folder me-2"></i>${collection.name}
            </button>
        `;
    })
    .join("");

  document.getElementById("collection-list").innerHTML = collectionListHtml;
  showCollectionFilter();

  // Add event listeners to collection buttons
  document.querySelectorAll(".collection-btn").forEach((btn) => {
    btn.addEventListener("click", function () {
      selectCollection(this.dataset.collection);
    });
  });

  // Show all products from all collections
  const allBrandProducts = [];
  Object.keys(brand.collections).forEach((collectionKey) => {
    const collection = brand.collections[collectionKey];
    allBrandProducts.push(...collection.products);
  });

  renderProducts(allBrandProducts);
  updateSectionTitle(brand.name, allBrandProducts.length + " produk tersedia");
}

/**
 * Select collection and show products
 */
function selectCollection(collectionKey) {
  currentState.collection = collectionKey;

  // Update active collection button
  document.querySelectorAll(".collection-btn").forEach((btn) => {
    btn.classList.remove("active");
    if (btn.dataset.collection === collectionKey) {
      btn.classList.add("active");
    }
  });

  const category = productCatalog[currentState.category];
  const brand = category.brands[currentState.brand];
  const collection = brand.collections[collectionKey];

  updateBreadcrumb();
  renderProducts(collection.products);
  updateSectionTitle(
    collection.name,
    collection.products.length + " produk tersedia",
  );
}

/**
 * Render products grid
 */
function renderProducts(products) {
  const grid = document.getElementById("products-grid");

  if (products.length === 0) {
    grid.innerHTML = `
            <div class="col-12 text-center py-5">
                <i class="fas fa-box-open fa-4x text-muted mb-3"></i>
                <h5>Tidak ada produk ditemukan</h5>
                <p class="text-muted">Coba filter kategori lain</p>
            </div>
        `;
    return;
  }

  // Pagination
  const startIndex = (currentState.currentPage - 1) * currentState.itemsPerPage;
  const endIndex = startIndex + currentState.itemsPerPage;
  const paginatedProducts = products.slice(startIndex, endIndex);

  const productsHtml = paginatedProducts
    .map(
      (product) => `
        <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
            <div class="product-card h-100">
                <div class="product-image-wrapper">
                    <img src="${product.image}" alt="${product.name}" class="product-image">
                    <div class="product-overlay">
                        <button class="btn btn-primary btn-sm" onclick="openLightbox('${product.name}', '${product.image}', '${product.description}')">
                            <i class="fas fa-search-plus"></i> Lihat Detail
                        </button>
                    </div>
                </div>
                <div class="product-info p-3">
                    <h6 class="product-title mb-2">${product.name}</h6>
                    <p class="product-description text-muted small mb-0">${product.description}</p>
                </div>
            </div>
        </div>
    `,
    )
    .join("");

  grid.innerHTML = productsHtml;

  // Update pagination
  if (products.length > currentState.itemsPerPage) {
    renderPagination(products.length);
  } else {
    hidePagination();
  }
}

/**
 * Render pagination
 */
function renderPagination(totalProducts) {
  const totalPages = Math.ceil(totalProducts / currentState.itemsPerPage);
  const pagination = document.getElementById("pagination");

  let paginationHtml = "";

  // Previous button
  paginationHtml += `
        <li class="page-item ${currentState.currentPage === 1 ? "disabled" : ""}">
            <a class="page-link" href="#" onclick="changePage(${currentState.currentPage - 1}); return false;">
                <i class="fas fa-chevron-left"></i>
            </a>
        </li>
    `;

  // Page numbers
  for (let i = 1; i <= totalPages; i++) {
    if (
      i === 1 ||
      i === totalPages ||
      (i >= currentState.currentPage - 1 && i <= currentState.currentPage + 1)
    ) {
      paginationHtml += `
                <li class="page-item ${i === currentState.currentPage ? "active" : ""}">
                    <a class="page-link" href="#" onclick="changePage(${i}); return false;">${i}</a>
                </li>
            `;
    } else if (
      i === currentState.currentPage - 2 ||
      i === currentState.currentPage + 2
    ) {
      paginationHtml += `<li class="page-item disabled"><span class="page-link">...</span></li>`;
    }
  }

  // Next button
  paginationHtml += `
        <li class="page-item ${currentState.currentPage === totalPages ? "disabled" : ""}">
            <a class="page-link" href="#" onclick="changePage(${currentState.currentPage + 1}); return false;">
                <i class="fas fa-chevron-right"></i>
            </a>
        </li>
    `;

  pagination.innerHTML = paginationHtml;
  document.getElementById("pagination-nav").style.display = "block";
}

/**
 * Change page
 */
function changePage(page) {
  currentState.currentPage = page;

  // Reload current view
  if (currentState.collection) {
    const category = productCatalog[currentState.category];
    const brand = category.brands[currentState.brand];
    const collection = brand.collections[currentState.collection];
    renderProducts(collection.products);
  } else if (currentState.brand) {
    const category = productCatalog[currentState.category];
    const brand = category.brands[currentState.brand];
    renderProducts(brand.products);
  } else if (currentState.category !== "semua") {
    loadBrandsForCategory(currentState.category);
  } else {
    loadAllProducts();
  }

  // Scroll to top
  window.scrollTo({ top: 0, behavior: "smooth" });
}

/**
 * Update breadcrumb navigation
 */
function updateBreadcrumb() {
  const breadcrumb = document.getElementById("breadcrumb-current");
  let breadcrumbText = "Semua";

  if (currentState.category !== "semua") {
    const category = productCatalog[currentState.category];
    breadcrumbText = category.name;

    if (currentState.brand) {
      const brand = category.brands[currentState.brand];
      breadcrumbText += " > " + brand.name;

      if (currentState.collection) {
        const collection = brand.collections[currentState.collection];
        breadcrumbText += " > " + collection.name;
      }
    }
  }

  breadcrumb.textContent = breadcrumbText;
}

/**
 * Update section title
 */
function updateSectionTitle(title, subtitle) {
  document.getElementById("section-title").textContent = title;
  document.getElementById("product-count").textContent = subtitle;
}

/**
 * Open lightbox modal
 */
function openLightbox(name, image, description) {
  document.getElementById("lightbox-title").textContent = name;
  document.getElementById("lightbox-image").src = image;
  document.getElementById("lightbox-description").textContent = description;

  const modal = new bootstrap.Modal(document.getElementById("productLightbox"));
  modal.show();
}

/**
 * Show/Hide filters
 */
function showBrandFilter() {
  document.getElementById("brand-filter").style.display = "block";
}

function hideBrandFilter() {
  document.getElementById("brand-filter").style.display = "none";
}

function showCollectionFilter() {
  document.getElementById("collection-filter").style.display = "block";
}

function hideCollectionFilter() {
  document.getElementById("collection-filter").style.display = "none";
}

/**
 * Hide pagination
 */
function hidePagination() {
  document.getElementById("pagination-nav").style.display = "none";
}

/**
 * Check if file exists before showing download section
 */
async function checkFileExists(fileName, categoryName) {
  try {
    const response = await fetch(`/uploads/brochures/${fileName}`, {
      method: "HEAD",
    });
    if (response.ok) {
      showDownloadSection(fileName, categoryName);
    } else {
      hideDownloadSection();
    }
  } catch (error) {
    // If error, assume file doesn't exist
    hideDownloadSection();
  }
}

/**
 * Show download section with file info
 */
function showDownloadSection(fileName, categoryName) {
  const section = document.getElementById("download-section");
  const downloadBtn = document.getElementById("download-btn");

  if (section && downloadBtn) {
    downloadBtn.href = `/uploads/brochures/${fileName}`;
    downloadBtn.setAttribute("download", fileName);

    // Add click handler to verify file before download
    downloadBtn.onclick = async function (e) {
      e.preventDefault();

      try {
        const response = await fetch(`/uploads/brochures/${fileName}`, {
          method: "HEAD",
        });
        if (response.ok) {
          // File exists, proceed with download
          window.location.href = `/uploads/brochures/${fileName}`;
        } else {
          // File not found
          alert(
            "⚠️ File deskripsi belum tersedia.\n\nSilakan hubungi admin untuk mengunggah file deskripsi produk.",
          );
        }
      } catch (error) {
        alert(
          "⚠️ Gagal mengakses file deskripsi.\n\nPastikan file sudah diunggah oleh admin.",
        );
      }
    };

    section.style.display = "block";
  }
}

/**
 * Hide download section
 */
function hideDownloadSection() {
  const section = document.getElementById("download-section");
  if (section) {
    section.style.display = "none";
  }
}

/**
 * Reset all filters
 */
function resetFilters() {
  currentState = {
    category: "semua",
    brand: null,
    collection: null,
    currentPage: 1,
    itemsPerPage: 12,
  };

  // Reset all active buttons
  document.querySelectorAll(".category-btn").forEach((btn) => {
    btn.classList.remove("active");
    if (btn.dataset.category === "semua") {
      btn.classList.add("active");
    }
  });

  document.querySelectorAll(".brand-btn").forEach((btn) => {
    btn.classList.remove("active");
  });

  document.querySelectorAll(".collection-btn").forEach((btn) => {
    btn.classList.remove("active");
  });

  hideBrandFilter();
  hideCollectionFilter();
  hideDownloadSection();
  loadAllProducts();
  updateBreadcrumb();
}
