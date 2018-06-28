<?php
    include 'main_header.php';
    include 'make_menu_visible.php';
?>
   <style>
    .alt-features-item{
        margin: 20px 0px 0px 0px !important;
    }
   form{
       padding: 5px;
   }
    </style>
    <section class="module" id="services">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-sm-offset-3">
                    <h2 class="module-title font-alt">Contact Us</h2>
                    <div class="module-subtitle font-serif">
                        Call us or fill the following form, we'll be happy to get back to you. 
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-md-6 col-lg-6">
                    <fieldset>
                    <legend>Physical Locations</legend>
                    <div class="alt-features-item">
                        <div class="alt-features-icon"><span class="icon-globe"></span></div>
                        <h3 class="alt-features-title font-alt">Delhi-NCR</h3> 
                        <p style="text-align:justify;">Langjobs.com,
                        First Floor, E-4, 
                        Defence Colony, Ring Road,
                        New Delhi - 110024 
                        (Metro Station: Moolchand, 
                        Bus Stop: Andrews Ganj)
                        Phone: +91-99585-92758, 011-46013636</p>
                    </div>
                    <div class="alt-features-item">
                        <div class="alt-features-icon"><span class="icon-globe"></span></div>
                        <h3 class="alt-features-title font-alt">BANGALORE</h3>
                        <p style="text-align:justify;">langjobs.com, 1st Floor, #13, 29th A Main,
                            100 Ft Ring Road, BTM 1st Stage,
                            Opp. Main BTM Kuvempu Nagara Bus Stop
                            Bengaluru - 560068
                            Phone: +91-96867-33757</p>
                    </div>
                    <div class="alt-features-item" style="padding-bottom:20px;">
                        <div class="alt-features-icon"><span class="icon-global"></span></div>
                        <h3 class="alt-features-title font-alt">Emails</h3>
                        <ul>
                            <li>For enquiries related to Recruitment and Corporate Training Services, Translation, Localization & Interpretation Services, mail us at: <b><a href='mailto:info@langjobs.com'>info@langjobs.com</a></b></li>
                            <li>Candidates/Translators looking for opening/assignments with us can send CV to: <b><a href='mailto:cv@langjobs.com'>cv@langjobs.com</a></b></li>
                        </ul>
                    </div>                    
                    </fieldset>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-6">
                    <fieldset>
                    <legend>Feedback / Contact Form</legend>
                        <form class="form-group" name = "feedbackform" method="post" action="<?php echo $base_url; ?>Home/save_feedback">
                            <input type="text" maxlength="55" placeholder="Enter Name" name="contact_name" id="contact_name" class="form-control" required><br/>
                            <input type="number" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="15" placeholder="Enter Mobile Number" name="contact_phone" id="contact_phone" class="form-control" required><br/>
                            <input type="email" placeholder="Enter Email" name="contact_email" id="contact_email" class="form-control" required><br/>
                            <input type="text" placeholder="Enter Website" name="contact_url" id="contact_url" class="form-control"><br/>
                            <input type="text" placeholder="Enter Subject" name="contact_subject" id="contact_subject" class="form-control"><br/>
                            <textarea placeholder="Enter Message" id="contact_message" name="contact_message" rows="10" cols="45" class="form-control" required></textarea><br/>
                            <input type="submit" name="submit" id="submit" class="btn btn-primary btn-xs" value="Send" tabindex="6"/>
                        </form>
                    </fieldset>
                </div>
            </div>
            
            
        </div>
    </section>
<?php 
    include 'main_footer.php';
?>