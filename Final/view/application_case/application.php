<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Scholarship Application Form</title>
    <link rel="stylesheet" href="/Final/Final/view/application_case/styles2.css">
    
</head>
<body>
    <div class="container">
        <h1>Scholarship Application Form</h1>
        
        <?php if ($success_message): ?>
            <div class="message success"><?php echo $success_message; ?></div>
        <?php endif; ?>
        
        <?php if ($error_message): ?>
            <div class="message error"><?php echo $error_message; ?></div>
        <?php endif; ?>
        
        <form action="?c=Scholarship&m=submit" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="full_name">Full Name <span class="required">*</span></label>
                <input type="text" id="full_name" name="full_name" value="<?php echo htmlspecialchars($form_data['full_name']); ?>" required>
            </div>
            
            <div class="form-group">
                <label for="email">Email Address <span class="required">*</span></label>
                <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($form_data['email']); ?>" required>
            </div>
            
            <div class="form-group">
                <label for="phone">Phone Number</label>
                <input type="tel" id="phone" name="phone" value="<?php echo htmlspecialchars($form_data['phone']); ?>">
            </div>
            
            <div class="form-group">
                <label for="address">Address</label>
                <textarea id="address" name="address"><?php echo htmlspecialchars($form_data['address']); ?></textarea>
            </div>
            
            <div class="form-group">
                <label for="dob">Date of Birth</label>
                <input type="date" id="dob" name="dob" value="<?php echo htmlspecialchars($form_data['dob']); ?>">
            </div>
            
            <div class="form-group">
                <label for="gender">Gender</label>
                <select id="gender" name="gender">
                    <option value="">Select Gender</option>
                    <option value="Male" <?php echo $form_data['gender'] === 'Male' ? 'selected' : ''; ?>>Male</option>
                    <option value="Female" <?php echo $form_data['gender'] === 'Female' ? 'selected' : ''; ?>>Female</option>
                    <option value="Other" <?php echo $form_data['gender'] === 'Other' ? 'selected' : ''; ?>>Other</option>
                    <option value="Prefer not to say" <?php echo $form_data['gender'] === 'Prefer not to say' ? 'selected' : ''; ?>>Prefer not to say</option>
                </select>
            </div>
            
            <div class="form-group">
                <label for="education_level">Current Education Level <span class="required">*</span></label>
                <select id="education_level" name="education_level" required>
                    <option value="">Select Education Level</option>
                    <option value="High School" <?php echo $form_data['education_level'] === 'High School' ? 'selected' : ''; ?>>High School</option>
                    <option value="Undergraduate" <?php echo $form_data['education_level'] === 'Undergraduate' ? 'selected' : ''; ?>>Undergraduate</option>
                    <option value="Graduate" <?php echo $form_data['education_level'] === 'Graduate' ? 'selected' : ''; ?>>Graduate</option>
                    <option value="Vocational" <?php echo $form_data['education_level'] === 'Vocational' ? 'selected' : ''; ?>>Vocational</option>
                </select>
            </div>
            
            <div class="form-group">
                <label for="institution">Current Institution</label>
                <input type="text" id="institution" name="institution" value="<?php echo htmlspecialchars($form_data['institution']); ?>">
            </div>
            
            <div class="form-group">
                <label for="gpa">GPA (on 4.0 scale) <span class="required">*</span></label>
                <input type="number" id="gpa" name="gpa" step="0.01" min="0" max="4.0" value="<?php echo htmlspecialchars($form_data['gpa']); ?>" required>
            </div>
            
            <div class="form-group">
                <label for="essay">Personal Essay (Why you deserve this scholarship) <span class="required">*</span></label>
                <textarea id="essay" name="essay" required><?php echo htmlspecialchars($form_data['essay']); ?></textarea>
            </div>
            
            <div class="form-group">
                <label for="reference_name">Reference Name</label>
                <input type="text" id="reference_name" name="reference_name" value="<?php echo htmlspecialchars($form_data['reference_name']); ?>">
            </div>
            
            <div class="form-group">
                <label for="reference_contact">Reference Contact Information</label>
                <input type="text" id="reference_contact" name="reference_contact" value="<?php echo htmlspecialchars($form_data['reference_contact']); ?>">
            </div>
            
            <div class="form-group">
                <label for="document">Supporting Document (PDF or DOC/DOCX, max 2MB) <span class="required">*</span></label>
                <input type="file" id="document" name="document" accept=".pdf,.doc,.docx" required>
            </div>
            
            <div class="form-group">
                <button type="submit" class="submit-btn">Submit Application</button>
            </div>
        </form>
    </div>
</body>
</html>




