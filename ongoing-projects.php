<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ongoing Projects - LaDVEN</title>
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/css/style.css" rel="stylesheet">
</head>
<body>

  <!-- ======= Topbar + Header ======= -->

  <!-- Copie ton header ici -->

<?php include 'header.html'; ?>

<!--  header  -->


  <main class="container my-5">
    <h2 class="section-title mb-4 text-center">Ongoing Projects</h2>

    <!-- Filtres -->
    <div class="filters d-flex flex-wrap gap-3 justify-content-center mb-4">
      <select id="filter-domain" class="form-select w-auto">
        <option value="">All Domains</option>
        <option value="water-treatment">Water Treatment</option>
        <option value="microplastics">Microplastics</option>
        <option value="desalination">Desalination</option>
      </select>

      <select id="filter-year" class="form-select w-auto">
        <option value="">All Years</option>
        <option value="2025">2025</option>
        <option value="2024">2024</option>
        <option value="2023">2023</option>
      </select>
    </div>

    <!-- Liste des projets -->
    <div class="row g-4" id="projects-list">

      <div class="col-md-4 project-card" data-domain="water-treatment" data-year="2025" data-aos="fade-up">
        <div class="card h-100 shadow-sm">
          <img src="assets/img/project1.png" class="card-img-top" alt="Project 1">
          <div class="card-body">
            <h5 class="card-title">Advanced Water Filtration</h5>
            <p class="card-text">Developing next-gen filtration systems to improve water quality in rural areas.</p>
            <div class="progress mb-2">
              <div class="progress-bar bg-primary" style="width: 60%">60%</div>
            </div>
            <a href="#" class="btn btn-primary btn-sm">Learn More</a>
          </div>
        </div>
      </div>

      <div class="col-md-4 project-card" data-domain="microplastics" data-year="2024" data-aos="fade-up" data-aos-delay="100">
        <div class="card h-100 shadow-sm">
          <img src="assets/img/project2.png" class="card-img-top" alt="Project 2">
          <div class="card-body">
            <h5 class="card-title">Microplastics Detection</h5>
            <p class="card-text">Monitoring microplastics in urban water systems using AI-based sensors.</p>
            <div class="progress mb-2">
              <div class="progress-bar bg-success" style="width: 45%">45%</div>
            </div>
            <a href="#" class="btn btn-primary btn-sm">Learn More</a>
          </div>
        </div>
      </div>

      <div class="col-md-4 project-card" data-domain="desalination" data-year="2023" data-aos="fade-up" data-aos-delay="200">
        <div class="card h-100 shadow-sm">
          <img src="assets/img/project3.png" class="card-img-top" alt="Project 3">
          <div class="card-body">
            <h5 class="card-title">Solar-Powered Desalination</h5>
            <p class="card-text">Utilizing renewable energy for sustainable desalination processes.</p>
            <div class="progress mb-2">
              <div class="progress-bar bg-warning" style="width: 80%">80%</div>
            </div>
            <a href="#" class="btn btn-primary btn-sm">Learn More</a>
          </div>
        </div>
      </div>

    </div>
  </main>

  <!-- ======= Footer ======= -->
  <!-- Copie ton footer ici -->

  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script>
    AOS.init();

    // Filtrage
    const domainFilter = document.getElementById('filter-domain');
    const yearFilter = document.getElementById('filter-year');
    const projects = document.querySelectorAll('.project-card');

    function filterProjects() {
      const domain = domainFilter.value;
      const year = yearFilter.value;

      projects.forEach(project => {
        const matchDomain = !domain || project.dataset.domain === domain;
        const matchYear = !year || project.dataset.year === year;
        project.style.display = (matchDomain && matchYear) ? '' : 'none';
      });
    }

    domainFilter.addEventListener('change', filterProjects);
    yearFilter.addEventListener('change', filterProjects);
  </script>
</body>
</html>
