<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>MGM Hospitals</title>
  <link
    rel="stylesheet"
    href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
  />
  <style>
    body {
      margin: 0;
      font-family: Arial, sans-serif;
      background-color: #f8f9fa;
    }

    nav {
      background-color: white;
      padding: 10px 20px;
      box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    }

    nav ul {
      list-style: none;
      display: flex;
      align-items: center;
      margin: 0;
      padding: 0;
      flex-wrap: wrap;
    }

    nav ul li.nav-item {
      margin-right: 20px;
    }

    nav ul li img {
      height: 40px;
      margin-right: 10px;
    }

    nav ul li:first-child {
      font-weight: bold;
      font-size: 1.2rem;
      display: flex;
      align-items: center;
    }

    nav a.nav-link {
      text-decoration: none;
      color: #333;
      transition: 0.2s;
    }

    nav a.nav-link:hover {
      color: #007bff;
    }

    .hospital-hero {
      position: relative;
      width: 100%;
      overflow: hidden;
    }

    .hospital-hero img {
      width: 100%;
      height: 400px;
      object-fit: cover;
      display: block;
    }

    .hospital-hero .caption {
      position: absolute;
      bottom: 15px;
      width: 100%;
      text-align: center;
      color: white;
      font-size: 1.5rem;
      font-weight: 600;
      background: rgba(0, 0, 0, 0.4);
      padding: 10px 0;
    }

    .footer {
      background-color: #2f3338;
      color: #ccc;
      padding: 40px 20px 20px;
      display: flex;
      flex-wrap: wrap;
      justify-content: space-around;
    }

    .footer h5 {
      color: white;
      font-weight: bold;
    }

    .footer p, .footer a {
      color: #ccc;
      margin: 0;
      text-decoration: none;
    }

    .footer a:hover {
      text-decoration: underline;
    }

    .footer iframe {
      border: 0;
      width: 100%;
      max-width: 400px;
      height: 250px;
    }

    .footer-bottom {
      background-color: #222;
      text-align: center;
      color: #ccc;
      padding: 10px;
      font-size: 14px;
    }

    @media (max-width: 768px) {
      .footer {
        flex-direction: column;
        align-items: center;
      }

      .footer iframe {
        margin-top: 20px;
      }
    }
  </style>
</head>

<body>

<nav>
  <ul style="width: 100%;">
    <li class="nav-item">
      <img src="MGM.jpeg" alt="MGM">MGM HOSPITALS
    </li>
    
    <!-- Left-aligned menu items -->
    <li class="nav-item"><a class="nav-link" href="Admissions.php" target="_blank">Admissions</a></li>
    <li class="nav-item"><a class="nav-link" href="Billings.php" target="_blank">Billings</a></li>
    <li class="nav-item"><a class="nav-link" href="Departments.php" target="_blank">Departments</a></li>
    <li class="nav-item"><a class="nav-link" href="Doctors.php" target="_blank">Doctors</a></li>
    <li class="nav-item"><a class="nav-link" href="MedicalRecords.php" target="_blank">Medical Records</a></li>
    <li class="nav-item"><a class="nav-link" href="Patients.php" target="_blank">Patients</a></li>
    <li class="nav-item"><a class="nav-link" href="Prescriptions.php" target="_blank">Prescriptions</a></li>
    <li class="nav-item"><a class="nav-link" href="Wards.php" target="_blank">Wards</a></li>
    
    <!-- Spacer -->
    <li class="nav-item ml-auto">
      <a class="nav-link btn btn-danger btn-sm text-white" href="index.html" style="margin-left:auto;">Sign Out</a>
    </li>
  </ul>
</nav>

  <!-- Full-width Hospital Image -->
  <div class="hospital-hero">
    <img src="hospital-building.jpg" alt="MGM Hospital Building" />
    <div class="caption">Our Main Hospital Building</div>
  </div>

  <!-- Footer with Contact & Map -->
  <footer>
    <div class="footer">
      <div>
        <h5>Contact Us</h5>
        <p>MGM Hospitals</p>
        <p>123 Health Street, Wellness City, IN 500001</p>
        <p>Phone: +91 98765 43210</p>
        <p>Email: <a href="mailto:info@mgmhospitals.in">info@mgmhospitals.in</a></p>
        <br/>
        <h5>Follow Us</h5>
        <p><a href="https://www.facebook.com/" target="_blank">Facebook</a> | <a href="https://x.com/?lang=en" target="_blank">Twitter</a> | <a href="https://www.instagram.com/" target="_blank" >Instagram</a></p>
      </div>
      <div>
        <h5>Find Us on the Map</h5>
        <iframe
          src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3806.4342673946884!2d78.39154717516962!3d17.439929901287755!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bcb9399a4e9e9cb%3A0x72ebbf34d2412a9e!2sCognizant%20Technology%20Solutions!5e0!3m2!1sen!2sin!4v1685774737975!5m2!1sen!2sin"
          allowfullscreen=""
          loading="lazy"
          referrerpolicy="no-referrer-when-downgrade">
        </iframe>
      </div>
    </div>
    <div class="footer-bottom">
      © 2025 MGM Hospitals. All rights reserved.
    </div>
  </footer>

</body>
</html>

