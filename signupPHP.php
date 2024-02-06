<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign-up Success</title>
    <!-- Load theme from localstorage -->
    <script src="js/themescript.js"></script>
    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="styles.css"/>
    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<nav class="navbar navbar-expand-lg sticky-top py-1 ">
    <div class="container-fluid">
        <img src="images/GRC_Logo-Rich-Black.png" alt="GreenRiver College logo" id="grc-logo">
        <button type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu" class="navbar-toggler"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse mx-1" id="navbar-menu">
            <ul class="navbar-nav nav-underline">
                <li><a href="index.html" class="nav-link">User Dashboard</a></li>
                <li><a href="signup.html" class="nav-link">Sign-up</a></li>
                <li><a href="applicationform.html" class="nav-link">New Application</a></li>
                <li><a href="contactForm.html" class="nav-link">Contact</a></li>
                <li>
                    <ul class="navbar-nav nav-underline">
                        <li><a href="admin_dashboard.html" class="nav-link">Admin Dashboard</a></li>
                        <li><a href="admin_announcement.html" class="nav-link">Admin Announcement</a></li>
                    </ul>
                </li>
                <li class="d-flex justify-content-end" id=  "dark-mode-list-item">
                    <div class="form-check form-switch">
                        <label class="form-check-label" for="dark-mode-switch">Dark Mode</label>
                        <input class="form-check-input" type="checkbox" role="switch" id="dark-mode-switch">
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>

<?php
if(! empty($_POST)) {
    // removing
    foreach ($_POST as $value) {
        $value = trim($value);

        if (empty($value)) {
            echo "
                <div class='content'>
                    <h2>Message failed to send. Please try again.</h2>
                    <a class='link' href='index.html'>Return home</a>
                </div>
            ";
            return;
        }
    }

    $fname = $_POST['firstName'];
    $lname = $_POST['lastName'];
    $email = $_POST['email'];
    $cohortNum = $_POST['cohort-num'];
    $status = $_POST['status'];
    $roles = $_POST['roles'];

    // sanitization
    $fname = strip_tags(filter_var($fname, FILTER_SANITIZE_ADD_SLASHES));
    $lname = strip_tags(filter_var($lname, FILTER_SANITIZE_ADD_SLASHES));
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);
    $cohortNum = filter_var($cohortNum, FILTER_SANITIZE_NUMBER_INT);
    $roles = strip_tags(filter_var($roles, FILTER_SANITIZE_ADD_SLASHES));

    $name = ucfirst($fname) . " " . ucfirst($lname);

    // TODO
    // make sure php checks radio button values

    echo "
        <main>
            <div class='container p-3'>
            <h3 class='receipt-message p-3 mb-0'>Success! Your account has been created.</h3>
            <div class='form-receipt-container p-3'>
                <ul class='receipt-content list-group list-group-flush'>
                    <li class='list-group-item'>
                        Name: $name
                    </li>
                    <li class='list-group-item'>
                        Email: $email
                    </li>
                    <li class='list-group-item'>
                        Cohort Number: $cohortNum
                    </li>
                    <li class='list-group-item'>
                        Status: $status
                    </li>
                    <li class='list-group-item message-box'>
                        " . stripslashes($roles) . "
                    </li>
                    <li class='align-self-center'>
                        <a class='link' href='index.html'>Return home</a>
                    </li>
                </ul>
        
            </div>
            </div>
        </main>
    ";
} else {
    echo "<div class='content'>
              <h2>Please fill out the form.</h2>
              <a class='link' href='index.html'>Return home</a>
          </div>
          ";
}
?>
<footer>
    <div class="container footer-div p-3 ">
        <div class="row justify-content-start">
            <div class="footer-btn-div col-2 text-end px-4">
                <p id="footer-jobs-btn" class="showing">FIND JOBS:</p>
                <p id="footer-resources-btn">RESOURCES:</p>
            </div>
            <div class="col-1 footer-vert-line"></div>
            <div class="col footer-jobs-div m-auto">
                <div class="row footer-show" id="footer-jobs">
                    <div class="col">
                        <ul class="resources-list list-group list-group-horizontal-sm">
                            <li class="list-group-item p-0 m-0">
                                <a href="https://www.linkedin.com/" target="_blank" class="btn
                 text-dark btn-sm">
                                    <img src="images/In-Blue-Logo.png" alt="5" style="max-height: 25px; padding-right: 4px;">LinkedIn
                                </a>
                            </li>
                            <li class="list-group-item p-0 m-0">
                                <a href="https://www.indeed.com/" target="_blank" class="btn
                 text-dark btn-sm">
                                    <img src="images/Indeed_Logo_RGB.png" alt="5" style="max-height: 25px">
                                </a>
                            </li>
                            <li class="list-group-item p-0 m-0">
                                <a href="https://www.glassdoor.com/index.htm" target="_blank" class="btn
                 text-dark btn-sm">
                                    <img src="images/glassdoor-icon.png" alt="5" style="max-height: 25px; padding-right: 4px;"> Glassdoor
                                </a>
                            </li>
                            <li class="list-group-item p-0 m-0">
                                <a href="https://www.levels.fyi/?compare=Amazon,Microsoft,Facebook&track=Software%20Engineer" target="_blank" class="btn
                 text-dark btn-sm">
                                    <img src="images/levelsfyi.png" alt="5" style="max-height: 25px; padding-right: 4px;">Levels FYI
                                </a>
                            </li>
                            <li class="list-group-item p-0 m-0">
                                <a href="https://www.google.com/search?q=software+development+jobs" target="_blank" class="btn text-dark btn-sm">
                                    More
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="container footer-hide" id="footer-resources" >
                    <div class="row" >
                        <div class="col-6">
                            <div class="row footer-title">
                                CAREER RESOURCES
                            </div>
                            <div class="row" style="height:100px;">
                                <ul>
                                    <li><a href="https://www.devs.greenrivertech.net/studentResources" target="_blank">GRC Student Resources</a></li>
                                    <li><a href="https://www.levels.fyi/?compare=Amazon,Microsoft,Facebook&track=Software%20Engineer" target="_blank">Compare Job Salaries</a></li>
                                </ul>
                            </div>

                        </div>
                        <div class="col-6">
                            <div class="row footer-title">
                                RESUME
                            </div>
                            <div class="row" style="height:100px;">
                                <ul>
                                    <li><a href="https://www.devs.greenrivertech.net/resources/Resume-FirstnameLastname.docx" target="_blank">Getting Started Resume Template</a></li>
                                    <li><a href="https://www.devs.greenrivertech.net/resources/resume2.docx" target="_blank">Sample Technical Resume By April Curley</a></li>
                                    <li><a href="https://www.glassdoor.com/blog/winning-resume/" target="_blank">How to Craft a Winning Software Resume</a></li>
                                    <li><a href="https://www.jobscan.co/blog/resume-tips/" target="_blank">52 Resume Tips to Transform Your Job Search</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="row footer-title">
                                INTERVIEWING
                            </div>
                            <div class="row" style="height:100px;">
                                <ul>
                                    <li><a href="https://interviewing.io/" target="_blank">Interviewing.io</a></li>
                                    <li><a href="https://www.interviewcake.com/" target="_blank">Interview Cake</a></li>
                                    <li><a href="https://www.dailycodingproblem.com/" target="_blank">Daily Coding Problem Dot Com</a></li>
                                    <li><a href="https://medium.com/code-like-a-girl/acing-the-technical-interview-ea0c888feb9e#.vaums4td3" target="_blank">Acing the Technical Interview</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="row footer-title">
                                COVER LETTER
                            </div>
                            <div class="row">
                                <ul>
                                    <li><a href="https://www.linkedin.com/pulse/use-cover-letters-ceos-read-brian-de-haaff?trk=hp-feed-article-title" target="_blank">Tips for Writing a Cover Email and Letter</a></li>
                                    <li><a href="http://www.fastcompany.com/3036904/hit-the-ground-running/10-words-and-phrases-that-are-killing-your-cover-letter" target="_blank">10 Words and Phrases That Are Killing Your Cover Letter</a></li>
                                    <li><a href="https://www.themuse.com/advice/the-cover-letter-formula-that-skyrocketed-my-interviews-from-0-to-55" target="_blank">The Cover Letter Formula That Skyrocketed My Interviews</a></li>
                                    <li><a href="http://www.greenriver.edu/student-affairs/tutoring-and-resources/writing-center.htm" target="_blank">Visit the Writing Center at Green River</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<script src="js/main.js"></script>
</body>
</html>
