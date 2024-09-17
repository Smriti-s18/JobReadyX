<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ATS Resume Checker</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" href="css/responsive.css">
    <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8f0e3;
            color: #333;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
        }

        h1, h2, h3 {
            color: #fbb03b;
        }

        .content-section {
            width: 100%;
            max-width: 900px;
            background-color: #fff;
            color: #333;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            margin: 50px 0;
            align-items: center;
        }

        .submit-button {
            background-color: #fbb03b;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            text-align: center;
            display: inline-block;
        }

        .submit-button:hover {
            background-color: #c06060;
        }

        .suggestions {
            white-space: pre-wrap;
            border: 1px solid #666;
            padding: 10px;
            border-radius: 5px;
            margin-top: 20px;
            background-color: #f1f1f1;
        }

        .error-message {
            color: #ff6f6f;
            font-weight: bold;
        }

        .footer_section {
            background-color: #333;
            color: #fff;
            padding: 30px 0;
        }

        .address_text {
            font-size: 24px;
            color: #fff;
            margin-bottom: 20px;
        }

        .footer_text {
            font-size: 16px;
            color: #ddd;
        }

        .location_text ul {
            list-style: none;
            padding: 0;
        }

        .location_text ul li {
            margin-bottom: 10px;
        }

        .location_text a {
            color: #fff;
            text-decoration: none;
        }

        .location_text a:hover {
            text-decoration: underline;
        }

        .update_mail {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .subscribe_bt a img {
            width: 30px;
        }

        .copyright_section {
            background-color: #222;
            color: #ccc;
            padding: 10px 0;
        }

        .copyright_text {
            margin: 0;
        }

        .footer_social_icon ul {
            list-style: none;
            padding: 0;
        }

        .footer_social_icon ul li {
            display: inline;
            margin-right: 10px;
        }

        .footer_social_icon a {
            color: #ccc;
            font-size: 18px;
            text-decoration: none;
        }

        .footer_social_icon a:hover {
            color: #fff;
        }
    
        html, body {
            height: 100%;
            margin: 0;
            font-family: 'Poppins', sans-serif;
            background-color: #f8f9fa;
        }
        .container-fluid {
            padding: 0;
        }
        .header_section {
            background-color: #343a40;
            padding: 20px 0;
            position: fixed;
            width: 100%;
            top: 0;
            left: 0;
            z-index: 1000;
        }
        .header_section .navbar-nav .nav-link {
            color: #fff !important;
        }
        .header_section .navbar-brand {
            color: #fff;
            font-weight: 800;
        }
        .container {
            margin-top: 80px; /* Adjusted for fixed header */
            padding: 20px;
        }
        .dropdown-section {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }
        .dropdown-section .category {
            flex: 1;
            margin: 0 10px;
        }
        .category label {
            font-weight: 600;
        }
        .links {
            display: none;
            margin-top: 20px;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 8px;
            background-color: #ffffff;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        .links h3 {
            margin-bottom: 10px;
            font-weight: 600;
            font-size: 1.2rem;
        }
        .links h4 {
            margin-top: 10px;
            font-weight: 600;
        }
        .links a {
            display: block;
            margin: 5px 0;
            text-decoration: none;
            color: #007bff;
        }
        footer {
            background-color: #343a40;
            color: #fff;
            padding: 30px 0;
            margin-top: 0px;
        }
        footer .footer_social_icon a {
            color: #fff;
            margin-right: 10px;
        }
        .copyright_section {
            background-color: #212529;
            color: #fff;
            padding: 10px 0;
            text-align: center;
            font-size: 0.9rem;
        }
        body {
            font-family: 'Poppins', sans-serif; /* Change to your preferred font */
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Header, Footer, and Main Styling */
        .header_section, .footer_section {
            background-color: #f8f9fa; /* Light background for header and footer */
            padding: 20px 0;
        }

        .footer_section {
            background-color: #343a40; /* Dark background for footer */
            color: #fff;
        }

        .footer_section .footer_social_icon ul li a {
            color: #fff;
        }

        /* Main Content */
        main {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            padding: 20px;
        }

        .content-section {
            padding: 20px;
        }

        /* Split Container Layout */
        .split-container {
            display: flex;
            justify-content: space-between;
            margin: 0 auto;
            max-width: 1200px;
            padding: 20px;
        }

        .left-container, .right-container {
            background-color: #fff;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2); /* 3D effect */
            width: 48%;
            flex: 1;
        }

        .left-container h2, .right-container h2 {
            color: #fbb03b;
        }

        .left-container p, .right-container p {
            font-size: 18px;
            line-height: 1.6;
        }

        .left-container ul, .right-container ul {
            list-style-type: disc;
            margin-left: 20px;
        }

        .left-container ul li, .right-container ul li {
            margin-bottom: 10px;
        }
        

        @media (max-width: 768px) {
            .split-container {
                flex-direction: column;
            }

            .left-container, .right-container {
                width: 100%;
                max-width: 100%;
            }
        }
        .footer_social_icon ul {
            list-style: none;
            padding: 0;
        }

        .footer_social_icon ul li {
            display: inline;
            margin-right: 10px;
            color:#a0172f;
        }

        .footer_social_icon a {
            color: #ccc;
            font-size: 18px;
            text-decoration: none;
        }

        .footer_social_icon a:hover {
            color: #fff;
        }
        .fa {
    display: inline-block;
    font-family: FontAwesome;
    font-style: normal;
    font-weight: normal;
    line-height: 1;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
    color: #8f192d;
}
footer {
    background-color: #343a40;
    color: #fff;
    padding: 15px 0; /* Reduced padding */
    margin-top: 20px; /* Adjust margin as needed */
}

.footer_section {
    padding: 15px 0; /* Reduced padding for footer section */
}

.footer_social_icon ul {
    margin: 0;
    padding: 0;
}

.footer_social_icon ul li {
    display: inline;
    margin-right: 8px; /* Reduced margin between icons */
}

.footer_social_icon a {
    color: #ccc;
    font-size: 16px; /* Adjusted font size */
}

.footer_social_icon a:hover {
    color: #fff;
}

.copyright_section {
    padding: 5px 0; /* Reduced padding */
    font-size: 0.8rem; /* Adjusted font size for better fit */
}

    </style>
</head>
<body>
    <header class="header_section">
        <div class="container-fluid">
            <nav class="navbar navbar-expand-lg navbar-dark">
                <!-- <a class="navbar-brand" href="index.html">ATS Checker</a> -->
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item"><a class="nav-link" href="index.html">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="about.html">About</a></li>
                        <li class="nav-item"><a class="nav-link" href="coffees.html">News</a></li>
                        <li class="nav-item"><a class="nav-link" href="shop.html">Mock Tests</a></li>
                        <li class="nav-item active"><a class="nav-link" href="blog.html">ATS Checker</a></li>
                        <li class="nav-item"><a class="nav-link" href="contact.html">Company Listing</a></li>
                    </ul>
                    <form class="form-inline my-2 my-lg-0">
                        <div class="login_bt">
                            <ul style="color:#fff">
                                <li><a href="#" style="color:#fff"><span class="user_icon"><i class="fa fa-user" aria-hidden="true" style="color:#fff"></i></span>Login</a></li>
                                <li><a href="#"><i class="fa fa-search" aria-hidden="true" style="color:#fff"></i></a></li>
                            </ul>
                        </div>
                    </form>
                </div>
            </nav>
        </div>
    </header>
    <div class="container">
        <h1 class="text-center mb-4">Job Listings</h1>
        <div class="dropdown-section">
            <!-- Commerce Dropdown -->
            <div class="category">
                <label for="commerce">Commerce:</label>
                <select id="commerce" class="form-control" onchange="showLinks('commerceLinks', this.value)">
                    <option value="">Select a program</option>
                    <option value="bcom_mm">B.Com Marketing Management</option>
                    <option value="bcom_af">B.Com Accounting & Finance</option>
                    <option value="bcom_ft">B.Com Finance & Taxation</option>
                    <option value="bba">BBA</option>
                    <option value="mba">MBA</option>
                </select>
            </div>

            <!-- Science Dropdown -->
            <div class="category">
                <label for="science">Sciences:</label>
                <select id="science" class="form-control" onchange="showLinks('scienceLinks', this.value)">
                    <option value="">Select a program</option>
                    <option value="bsc_cs">B.Sc Computer Science</option>
                    <option value="bsc_ds">B.Sc Data Science</option>
                    <option value="bca">BCA</option>
                    <option value="msc_it">M.Sc IT</option>
                    <option value="fsm">Food Science & Management</option>
                </select>
            </div>

            <!-- Humanities Dropdown -->
            <div class="category">
                <label for="humanities">Humanities:</label>
                <select id="humanities" class="form-control" onchange="showLinks('humanitiesLinks', this.value)">
                    <option value="">Select a program</option>
                    <option value="sociology">Sociology</option>
                    <option value="psychology">Psychology</option>
                    <option value="journalism">Journalism</option>
                </select>
            </div>
        </div>

        <!-- Links Sections -->
        <div id="commerceLinks" class="links">
            <h3>Commerce Job Listings</h3>
            <div id="bcom_mm" class="links">
                <h4>B.Com Marketing Management:</h4>
                <a href="https://www.cognizant.com/">Cognizant</a>
                <a href="https://www2.deloitte.com/">Deloitte</a>
                <a href="https://www.wipro.com/">Wipro</a>
            </div>
            <div id="bcom_af" class="links">
                <h4>B.Com Accounting & Finance:</h4>
                <a href="https://home.kpmg/">KPMG</a>
                <a href="https://www.ey.com/">Ernst & Young (EY)</a>
                <a href="https://www.grantthornton.global/">Grant Thornton</a>
            </div>
            <div id="bcom_ft" class="links">
                <h4>B.Com Finance & Taxation:</h4>
                <a href="https://www.pwc.com/">PricewaterhouseCoopers (PwC)</a>
                <a href="https://www.bdo.global/">BDO</a>
                <a href="https://www.rsm.global/">RSM International</a>
            </div>
            <div id="bba" class="links">
                <h4>BBA:</h4>
                <a href="https://www.hcltech.com/">HCL Technologies</a>
                <a href="https://www.infosys.com/">Infosys</a>
                <a href="https://www.techmahindra.com/">Tech Mahindra</a>
            </div>
            <div id="mba" class="links">
                <h4>MBA:</h4>
                <a href="https://www.accenture.com/">Accenture</a>
                <a href="https://www.capgemini.com/">Capgemini</a>
                <a href="https://www.ibm.com/">IBM</a>
            </div>
        </div>

        <div id="scienceLinks" class="links">
            <h3>Sciences Job Listings</h3>
            <div id="bsc_cs" class="links">
                <h4>B.Sc Computer Science:</h4>
                <a href="https://www.google.com/">Google</a>
                <a href="https://www.microsoft.com/">Microsoft</a>
                <a href="https://www.amazon.com/">Amazon</a>
            </div>
            <div id="bsc_ds" class="links">
                <h4>B.Sc Data Science:</h4>
                <a href="https://www.ibm.com/">IBM</a>
                <a href="https://www.datarobot.com/">DataRobot</a>
                <a href="https://www.palantir.com/">Palantir</a>
            </div>
            <div id="bca" class="links">
                <h4>BCA:</h4>
                <a href="https://www.oracle.com/">Oracle</a>
                <a href="https://www.sap.com/">SAP</a>
                <a href="https://www.adobe.com/">Adobe</a>
            </div>
            <div id="msc_it" class="links">
                <h4>M.Sc IT:</h4>
                <a href="https://www.cisco.com/">Cisco</a>
                <a href="https://www.vmware.com/">VMware</a>
                <a href="https://www.salesforce.com/">Salesforce</a>
            </div>
            <div id="fsm" class="links">
                <h4>Food Science & Management:</h4>
                <a href="https://www.nestle.com/">Nestlé</a>
                <a href="https://www.pepsico.com/">PepsiCo</a>
                <a href="https://www.unilever.com/">Unilever</a>
            </div>
        </div>

        <div id="humanitiesLinks" class="links">
            <h3>Humanities Job Listings</h3>
            <div id="sociology" class="links">
                <h4>Sociology:</h4>
                <a href="https://www.pewresearch.org/">Pew Research Center</a>
                <a href="https://www.asanet.org/">American Sociological Association (ASA)</a>
                <a href="https://www.brookings.edu/">The Brookings Institution</a>
            </div>
            <div id="psychology" class="links">
                <h4>Psychology:</h4>
                <a href="https://www.apa.org/">American Psychological Association (APA)</a>
                <a href="https://www.nimh.nih.gov/">National Institute of Mental Health (NIMH)</a>
                <a href="https://www.mayoclinic.org/">Mayo Clinic</a>
            </div>
            <div id="journalism" class="links">
                <h4>Journalism:</h4>
                <a href="https://www.nytimes.com/">The New York Times</a>
                <a href="https://www.bbc.com/news">BBC News</a>
                <a href="https://www.theguardian.com/international">The Guardian</a>
            </div>
        </div>
    </div>

    <footer class="footer_section">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="address_text">Address</div>
                    <div class="location_text">
                        <ul>
                            <li><a href="#">123 Main Street, Suite 100</a></li>
                            <li><a href="#">Anytown, USA 12345</a></li>
                            <li><a href="#">Phone: (123) 456-7890</a></li>
                            <li><a href="#">Email: info@example.com</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="footer_text">
                        <p>&copy; 2024 ATS Checker. All Rights Reserved.</p>
                        <div class="footer_social_icon">
                            <ul>
                                <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <div class="copyright_section">
        <p class="copyright_text">&copy; 2024 ATS Checker. Designed by Your Company. All Rights Reserved.</p>
    </div>

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
    <script>
        function showLinks(sectionId, value) {
            document.getElementById('commerceLinks').style.display = 'none';
            document.getElementById('scienceLinks').style.display = 'none';
            document.getElementById('humanitiesLinks').style.display = 'none';
            if (sectionId === 'commerceLinks') {
                document.getElementById('commerceLinks').querySelectorAll('.links').forEach(link => link.style.display = 'none');
                document.getElementById(value).style.display = 'block';
            } else if (sectionId === 'scienceLinks') {
                document.getElementById('scienceLinks').querySelectorAll('.links').forEach(link => link.style.display = 'none');
                document.getElementById(value).style.display = 'block';
            } else if (sectionId === 'humanitiesLinks') {
                document.getElementById('humanitiesLinks').querySelectorAll('.links').forEach(link => link.style.display = 'none');
                document.getElementById(value).style.display = 'block';
            }
            document.getElementById(sectionId).style.display = 'block';
        }
    </script>
</body>
</html>

