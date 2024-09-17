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
        }

        .header_section {
            background-color: #343a40;
            padding: 10px 0;
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

        .container1 {
            margin-top: 40px; /* Adjusted for fixed header */
            padding: 20px;
        }
        .container {
            margin-top: 200px; /* Adjusted for fixed header */
            padding: 20px;
        }


        .dropdown-section {
            display: flex;
            justify-content: space-between;
            margin-bottom: 30px;
        }

        .dropdown-section .category {
            flex: 1;
            margin: 0 10px;
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
            padding: 10px 0; /* Reduced padding */
        }

        .footer_section {
            padding: 10px 0; /* Reduced padding */
        }
        .footer_section {
            background-color: #333;
            color: #fff;
            padding: 40px 0;
            text-align: center;
        }

        .footer_social_icon ul {
            margin: 0;
            padding: 0;
        }

        .footer_social_icon ul li {
            display: inline;
            margin-right: 8px; /* Reduced margin */
        }

        .footer_social_icon a {
            color: #ccc;
            font-size: 16px;
        }

        .footer_social_icon a:hover {
            color: #fff;
        }

        .copyright_section {
            padding: 5px 0; /* Reduced padding */
            font-size: 0.8rem;
            text-align: center;
            color: #ccc;
        }

        @media (max-width: 768px) {
            .dropdown-section {
                flex-direction: column;
            }

            .dropdown-section .category {
                margin-bottom: 15px;
            }
        }
        .footer_section {
    background-color: #333;
    color: #fff;
    padding: 20px 0; /* Adjusted padding for better spacing */
    text-align: center;
}

.container1 {
    width: 90%; /* Ensures some space on the sides */
    margin: 0 auto; /* Centers the container */
}

.address_text, .footer_text {
    font-weight: 600;
    margin-bottom: 10px;
}

.location_text ul {
    list-style: none;
    padding: 0;
}

.location_text ul li {
    margin-bottom: 8px;
}

.location_text a {
    color: #fff;
    text-decoration: none;
}

.location_text a:hover {
    text-decoration: underline;
}

.footer_social_icon ul {
    list-style: none;
    padding: 0;
    margin: 0;
}

.footer_social_icon ul li {
    display: inline-block;
    margin: 0 10px;
}

.footer_social_icon a {
    color: #ccc;
    font-size: 24px; /* Increased size for better visibility */
}

.footer_social_icon a:hover {
    color: #fff;
}

.copyright_section {
    background-color: #333;
    color: #ccc;
    padding: 10px 0; /* Adjusted padding for consistency */
    font-size: 0.8rem;
    text-align: center;
}
body {
            font-family: 'Poppins', sans-serif;
            background-color: #f4f4f9;
            color: #333;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        h1, h2, h3 {
            color: #fbb03b;
        }

        .header_section {
            width: 100%;
            background-color: #ffffff;
            padding: 15px 0;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .navbar-brand {
            font-size: 1.5rem;
            font-weight: 600;
        }

        .navbar-nav .nav-link {
            font-size: 1rem;
            color: #333;
        }

        .navbar-nav .nav-link.active {
            color: #4a90e2;
        }

        .navbar-nav .nav-link:hover {
            color: #4a90e2;
        }

    </style>
</head>
<body>
<header class="header_section header_bg">
        <div class="container-fluid">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <a class="navbar-brand" href="index.html"></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item"><a class="nav-link" href="about.html">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="news.html">News</a></li>
                        <li class="nav-item active"><a class="nav-link" href="mock.php">Mock Tests</a></li>
                        <li class="nav-item"><a class="nav-link" href="ats.php">ATS Checker</a></li>
                        <li class="nav-item"><a class="nav-link" href="company.php">Company Listing</a></li>
                    </ul>
                    <form class="form-inline my-2 my-lg-0">
                        <div class="login_bt">
                            <ul style="color:#222">
                                <li><a href="login.html" style="color:#222"><span class="user_icon"><i class="fa fa-user" aria-hidden="true" style="color:#222"></i></span>Login</a></li>
                                <!-- <li><a href="#"><i class="fa fa-search" aria-hidden="true" style="color:#222"></i></a></li> -->
                            </ul>
                        </div>
                    </form>
                </div>
            </nav>
        </div>
    </header>

    <main class="container">
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
            <div id="bcom_mm">
                <h4>B.Com Marketing Management:</h4>
                <a href="https://www.cognizant.com/">Cognizant</a>
                <a href="https://www2.deloitte.com/">Deloitte</a>
                <a href="https://www.wipro.com/">Wipro</a>
            </div>
            <div id="bcom_af">
                <h4>B.Com Accounting & Finance:</h4>
                <a href="https://home.kpmg/">KPMG</a>
                <a href="https://www.ey.com/">Ernst & Young (EY)</a>
                <a href="https://www.grantthornton.global/">Grant Thornton</a>
            </div>
            <div id="bcom_ft">
                <h4>B.Com Finance & Taxation:</h4>
                <a href="https://www.pwc.com/">PricewaterhouseCoopers (PwC)</a>
                <a href="https://www.bdo.global/">BDO</a>
                <a href="https://www.rsm.global/">RSM International</a>
            </div>
            <div id="bba">
                <h4>BBA:</h4>
                <a href="https://www.hcltech.com/">HCL Technologies</a>
                <a href="https://www.infosys.com/">Infosys</a>
                <a href="https://www.techmahindra.com/">Tech Mahindra</a>
            </div>
            <div id="mba">
                <h4>MBA:</h4>
                <a href="https://www.accenture.com/">Accenture</a>
                <a href="https://www.ibm.com/">IBM</a>
                <a href="https://www.capgemini.com/">Capgemini</a>
            </div>
        </div>

        <div id="scienceLinks" class="links">
            <h3>Science Job Listings</h3>
            <div id="bsc_cs">
                <h4>B.Sc Computer Science:</h4>
                <a href="https://www.google.com/">Google</a>
                <a href="https://www.microsoft.com/">Microsoft</a>
                <a href="https://www.amazon.in/">Amazon</a>
            </div>
            <div id="bsc_ds">
                <h4>B.Sc Data Science:</h4>
                <a href="https://www.ibm.com/">IBM</a>
                <a href="https://www.oracle.com/">Oracle</a>
                <a href="https://www.sas.com/">SAS</a>
            </div>
            <div id="bca">
                <h4>BCA:</h4>
                <a href="https://www.tcs.com/">Tata Consultancy Services (TCS)</a>
                <a href="https://www.hcltech.com/">HCL Technologies</a>
                <a href="https://www.capgemini.com/">Capgemini</a>
            </div>
            <div id="msc_it">
                <h4>M.Sc IT:</h4>
                <a href="https://www.ibm.com/">IBM</a>
                <a href="https://www.dell.com/">Dell</a>
                <a href="https://www.hp.com/">HP</a>
            </div>
            <div id="fsm">
                <h4>Food Science & Management:</h4>
                <a href="https://www.nestle.in/">Nestlé</a>
                <a href="https://www.pepsico.com/">PepsiCo</a>
                <a href="https://www.unilever.com/">Unilever</a>
            </div>
        </div>

        <div id="humanitiesLinks" class="links">
            <h3>Humanities Job Listings</h3>
            <div id="sociology">
                <h4>Sociology:</h4>
                <a href="https://www.un.org/en/">United Nations</a>
                <a href="https://www.redcross.org/">Red Cross</a>
                <a href="https://www.smithsonianmag.com/">Smithsonian Institution</a>
            </div>
            <div id="psychology">
                <h4>Psychology:</h4>
                <a href="https://www.apa.org/">American Psychological Association</a>
                <a href="https://www.nimh.nih.gov/">National Institute of Mental Health</a>
                <a href="https://www.psychologytoday.com/">Psychology Today</a>
            </div>
            <div id="journalism">
                <h4>Journalism:</h4>
                <a href="https://www.nytimes.com/">The New York Times</a>
                <a href="https://www.washingtonpost.com/">The Washington Post</a>
                <a href="https://www.bbc.com/">BBC News</a>
            </div>
        </div>
    </main>

    <footer class="footer_section">
        <div class="container1">
            <div class="row">
                <div class="col-md-4">
                    <div class="address_text">Address</div>
                    <div class="location_text">
                        <ul>
                            <li>M.O.P Vaishnav College for Women</li>
                            <li>Nungambakkam, Chennai-600034</li>
                            <li>Phone: 981095817  |  9382633966</></li>
                            <li><a href="#">Email: 2313711058046@mopvaishnav.ac.in  |  2313711058004@mopvaishnav.ac.in</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="footer_text">
                        <p>&copy; 2024 JobReadyX. All Rights Reserved.</p>
                        <div class="footer_social_icon">
                            <ul>
                                <li><a href="https://www.facebook.com/MOPVaishnavCollegeforWomen/"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                <li><a href="https://in.linkedin.com/school/m-o-p-vaishnav-college-for-women/"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                                <li><a href="https://www.instagram.com/mopvcfw/?igshid=r8dcc24adg9u"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <div class="copyright_section">
        <p class="copyright_text">&copy; 2024 JobReadyX.All Rights Reserved.</p>
    </div>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
    <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
    <script>
    function showLinks(sectionId, value) {
        // Hide all links sections
        document.querySelectorAll('.links').forEach(function (el) {
            el.style.display = 'none';
        });

        // Show the relevant section if a value is selected
        if (value) {
            // Display the links section corresponding to the selected value
            document.querySelectorAll(`#${sectionId} > div`).forEach(function (el) {
                el.style.display = 'none'; // Hide all items in the section
                if (el.id === value) {
                    el.style.display = 'block'; // Show the selected item
                }
            });

            // Ensure that the links section container itself is visible
            document.getElementById(sectionId).style.display = 'block';
        }
    }
</script>

</body>
</html>
