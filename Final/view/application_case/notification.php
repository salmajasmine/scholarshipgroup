<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Scholarship Application</title>
    <link rel="stylesheet" href="/Final/Final/view/application_case/styles3.css">
    
    <script>
        // Blokir aksi back button browser sepenuhnya
        history.pushState(null, null, document.URL);
        window.addEventListener('popstate', function(event) {
            history.pushState(null, null, document.URL);
           
        });
        
        // Fungsi untuk redirect ke dashboard dengan membersihkan history
        function redirectToDashboard() {
            window.location.replace("index.php?c=Dashboard&m=index");
        }
    </script>
</head>
<body>

            <div class="container">
                <h1>Scholarship Application Received</h1>
                
                <div class="confirmation-message">
                    <h2>The document is received!</h2>
                    <p>We will notify you once the announcement is made!</p>
                </div>
                
                <div class="application-details">
                    <h3>Your Application Details</h3>
                    <div class="details-grid">
                        <div class="detail-item">
                            <span class="detail-label" style="color: white">Full Name:</span>
                            <span class="detail-value" style="color: white"><?php echo htmlspecialchars($_POST['full_name'] ?? 'N/A'); ?></span>
                        </div>
                        <div class="detail-item">
                            <span class="detail-label" style="color: white">Email:</span>
                            <span class="detail-value" style="color: white"><?php echo htmlspecialchars($_POST['email'] ?? 'N/A'); ?></span>
                        </div>
                        <div class="detail-item">
                            <span class="detail-label" style="color: white">Phone:</span>
                            <span class="detail-value" style="color: white"><?php echo htmlspecialchars($_POST['phone'] ?? 'N/A'); ?></span>
                        </div>
                        <div class="detail-item">
                            <span class="detail-label" style="color: white">Education Level:</span>
                            <span class="detail-value" style="color: white"><?php echo htmlspecialchars($_POST['education_level'] ?? 'N/A'); ?></span>
                        </div>
                        <div class="detail-item">
                            <span class="detail-label" style="color: white">Institution:</span>
                            <span class="detail-value" style="color: white"><?php echo htmlspecialchars($_POST['institution'] ?? 'N/A'); ?></span>
                        </div>
                        <div class="detail-item">
                            <span class="detail-label" style="color: white">GPA:</span>
                            <span class="detail-value" style="color: white"><?php echo htmlspecialchars($_POST['gpa'] ?? 'N/A'); ?></span>
                        </div>
                        <div class="detail-item">
                            <span class="detail-label" style="color: white">Uploaded File:</span>
                            <span class="detail-value" style="color: white">
                                <?php 
                                if (isset($_FILES['document']) && $_FILES['document']['error'] === UPLOAD_ERR_OK) {
                                    echo htmlspecialchars($_FILES['document']['name']) . ' (' . 
                                         round($_FILES['document']['size'] / 1024, 2) . ' KB)';
                                } else {
                                    echo 'N/A';
                                }
                                ?>
                            </span>
                        </div>
                    </div>
                </div>
                
        <div class="button-group">
            <a href="index.php?c=Scholarship&m=index" class="btn btn-apply">Apply Again</a>
            <a href="#" class="btn btn-leave" onclick="redirectToDashboard(); return false;">Return to Dashboard</a>
        </div>
                
                <div class="status-timeline">
                    <h3>Application Status</h3>
                    
                    <div class="timeline-item completed">
                        <div class="timeline-date"><?php echo date('F j, Y'); ?></div>
                        <div class="timeline-content">
                            <h4>Application Submitted</h4>
                            <p>Your scholarship application has been successfully submitted.</p>
                        </div>
                    </div>
                    
                    <div class="timeline-item active">
                        <div class="timeline-date">In progress</div>
                        <div class="timeline-content">
                            <h4>Verification by Admission</h4>
                            <p>Your application is currently being reviewed by the admission committee.</p>
                        </div>
                    </div>
                    
                    <div class="timeline-item">
                        <div class="timeline-date">Pending</div>
                        <div class="timeline-content">
                            <h4>Committee Review</h4>
                            <p>Your application will be evaluated by the scholarship committee.</p>
                        </div>
                    </div>
                    
                    <div class="timeline-item">
                        <div class="timeline-date">Pending</div>
                        <div class="timeline-content">
                            <h4>Final Decision</h4>
                            <p>The scholarship recipients will be announced.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>



        