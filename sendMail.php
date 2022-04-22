if($providerId){
                // Load PHPMailer library
                $this->load->library('phpmailer_lib');
                // PHPMailer object
                $mail = $this->phpmailer_lib->load();
                $mail->setFrom("no-reply@test.com", "Test");
                // Add a recipient
                $mail->addAddress(trim($this->input->post('email')));
                 // Email subject
                $mail->Subject = 'Add New Staff Member';
                // Set email format to HTML
                $mail->isHTML(true);
                // Email body content
                $mailContent = "<p>Hi ".trim($this->input->post('fname'))." ".trim($this->input->post('lname')).",</p><p> Email: ".trim($this->input->post('email'))."</p><p> Password: ".trim($this->input->post('password'))."<br /><br />Thanks!<br /> Admin!</p>";
                $mail->Body = $mailContent;
                // Send email
                if(!$mail->send()){
                    $this->session->set_flashdata('error_msg', 'Some problem appear send email.');
                }
