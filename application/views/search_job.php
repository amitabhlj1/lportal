<link href="<?php echo base_url(); ?>assets/css/addTags.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.16/b-1.5.1/datatables.min.css"/>
<div class="main">&nbsp;</div><br/><br/>
    <section class="module-small bg-dark">
      <div class="container">
        <div class="row">
          <div class="col-sm-6 col-md-8 col-lg-6 col-lg-offset-2">
            <div class="callout-text font-alt">
              <h3 class="callout-title">Search Your Favourite Jobs</h3>
              <p>We have a huge collection of jobs, Just search and apply. It's that easy!</p>
            </div>
          </div>
          <div class="col-sm-6 col-md-4 col-lg-2">
            
          </div>
        </div>
      </div>
    </section>
    <section class="module" style="padding:40px 0px;">
            <div class="container">
                <div class="row">
                    <div class="mb-sm-20 wow fadeInUp col-md-12 col-sm-12 col-xs-12">
                        <form action="" method="get" name="searchf">
                            <fieldset>
                               <legend>Advance Search options:</legend>
                               <div class="col-md-2 col-lg-2 col-xs-12 col-sm-6">
                                <select name="language" class="form-control">
                                    <option value="" selected>All Langs</option>

                                    <optgroup label="Western European">
                                        <option value="Dutch">Dutch</option>
                                        <option value="English">English</option>
                                        <option value="Flemish">Flemish</option>
                                        <option value="French">French</option>
                                        <option value="Gaelic">Gaelic</option>
                                        <option value="German">German</option>
                                        <option value="Greek">Greek</option>
                                        <option value="Italian">Italian</option>
                                        <option value="Luxembourgish">Luxembourgish</option>
                                        <option value="Portuguese">Portuguese</option>
                                        <option value="Spanish">Spanish</option>
                                        <option value="Welsh">Welsh</option>
                                    </optgroup>

                                    <optgroup label="Nordic Languages">
                                        <option value="Danish">Danish</option>
                                        <option value="Finnish">Finnish</option>
                                        <option value="Icelandic">Icelandic</option>
                                        <option value="Norwegian">Norwegian</option>
                                        <option value="Swedish">Swedish</option>
                                    </optgroup>

                                    <optgroup label="Eastern European">
                                        <option value="Belarusian">Belarusian</option>
                                        <option value="Bosnian">Bosnian</option>
                                        <option value="Bulgarian">Bulgarian</option>
                                        <option value="Croatian">Croatian</option>
                                        <option value="Czech">Czech</option>
                                        <option value="Estonian">Estonian</option>
                                        <option value="Hungarian">Hungarian</option>
                                        <option value="Latvian">Latvian</option>
                                        <option value="Lithuanian">Lithuanian</option>
                                        <option value="Macedonian">Macedonian</option>
                                        <option value="Polish">Polish</option>
                                        <option value="Romanian">Romanian</option>
                                        <option value="Russian">Russian</option>
                                        <option value="Serbian">Serbian</option>
                                        <option value="Slovak">Slovak</option>
                                        <option value="Slovenian">Slovenian</option>
                                        <option value="Ukrainian">Ukrainian</option>
                                    </optgroup>

                                    <optgroup label="Asian languages">
                                        <option value="Chinese">Chinese</option>
                                        <option value="Cantonese">Cantonese</option>
                                        <option value="Cebuano">Cebuano</option>
                                        <option value="Indonesian">Indonesian</option>
                                        <option value="Japanese">Japanese</option>
                                        <option value="Korean">Korean</option>
                                        <option value="Malay">Malay</option>
                                        <option value="Mandarin">Mandarin</option>
                                        <option value="Pilipino">Pilipino</option>
                                        <option value="Thai">Thai</option>
                                        <option value="Vietnamese">Vietnamese</option>
                                    </optgroup>

                                    <optgroup label="Indian languages">
                                        <option value="Bengoli">Bengoli</option>
                                        <option value="Gujarati">Gujarati</option>
                                        <option value="Hindi">Hindi</option>
                                        <option value="Punjabi">Punjabi</option>
                                        <option value="Tamil">Tamil</option>
                                        <option value="Urdu">Urdu</option>
                                        <option value="Sanskrit">Sanskrit</option>
                                        <option value="Kannada">Kannada</option>
                                        <option value="Telugu">Telugu</option>
                                        <option value="Malayalam">Malayalam</option>
                                        <option value="Oriya">Oriya</option>
                                        <option value="Pali">Pali</option>
                                    </optgroup>

                                    <optgroup label="Middle East">
                                        <option value="Arabic">Arabic</option>
                                        <option value="Farsi">Farsi</option>
                                        <option value="Hebrew">Hebrew</option>
                                        <option value="Iranian">Iranian</option>
                                        <option value="Maltese">Maltese</option>
                                        <option value="Persian">Persian</option>
                                        <option value="Pushto">Pushto</option>
                                        <option value="Sorani">Sorani</option>
                                        <option value="Turkish">Turkish</option>
                                    </optgroup>

                                    <optgroup label="African Languages">
                                        <option value="Afrikaans">Afrikaans</option>
                                        <option value="Somali">Somali</option>
                                        <option value="Swahili">Swahili</option>
                                        <option value="Yoruba">Yoruba</option>
                                    </optgroup>

                                    <optgroup label="Other Languages">
                                        <option value="Others">Others</option>
                                    </optgroup>
                                </select>
                                </div>
                                <div class="col-md-2 col-lg-2 col-xs-12 col-sm-6">
                                <select name="sector" class="form-control">
                                    <option value="" selected>All Sectors</option>

                                    <option value="Translation">Translation</option>
                                    <option value="Linguist/Interpreter">Linguist/Interpreter</option>
                                    <option value="CustomerService">Customer service</option>
                                    <option value="Tourism/Hospitality">Tourism/Hospitality</option>
                                    <option value="Localization">Localization</option>
                                    <option value="PR/Media">PR/Media</option>
                                    <option value="MarketResearch">MarketResearch</option>
                                    <option value="Advertising">Advertising</option>

                                    <option value="Education/Training">Education/Training</option>
                                    <option value="Engineering">Engineering</option>
                                    <option value="IT/Software">IT/Software</option>
                                    <option value="Editorial">Editorial</option>
                                    <option value="Finance/Banking">Finance/Banking</option>
                                    <option value="Accounting">Accounting</option>
                                    <option value="Marketing/Sales">Marketing/Sales</option>
                                    <option value="HR/Recruitment">HR/Recruitment</option>
                                    <option value="Logistics">Logistics</option>
                                    <option value="Import/Export">Import/Export</option>

                                    <option value="Government jobs">Government jobs</option>
                                    <option value="Legal">Legal</option>
                                    <option value="Non-profit">Non-profit</option>
                                    <option value="Secretaria">Secretarial</option>
                                    <option value="Administration">Administration</option>

                                </select>
                                </div>
                                <div class="col-md-2 col-lg-2 col-xs-12 col-sm-6">
                              <select name="locationCombo" class="form-control">
                                        <option value="" selected="selected">All Locations</option>

                                    <optgroup label="India-Metros">
                                        <option value="Delhi">Delhi</option>
                                        <option value="Mumbai">Mumbai</option>
                                        <option value="Chennai">Chennai</option>
                                        <option value="Kolkata">Kolkata</option>
                                        <option value="Bangalore">Bangalore</option>
                                        <option value="Hyderabad">Hyderabad</option>
                                        <option value="Chandigarh">Chandigarh</option>
                                        <option value="Pune">Pune</option>
                                    </optgroup>

                                    <optgroup label="Rest of India">
                                        <option value="Agra">Agra</option>
                                        <option value="Ahmedabad">Ahmedabad</option>
                                        <option value="Allahabad">Allahabad</option>
                                        <option value="Ambala">Ambala</option>
                                        <option value="Amritsar">Amritsar</option>
                                        <option value="Aurangabad">Aurangabad</option>
                                        <option value="Baroda/Vadodara">Baroda/Vadodara</option>
                                        <option value="Bhopal">Bhopal</option>
                                        <option value="Bhubaneshwar">Bhubaneshwar</option>
                                        <option value="Calicut">Calicut</option>
                                        <option value="Coimbatore">Coimbatore</option>
                                        <option value="Cuttack">Cuttack</option>
                                        <option value="Dehradun">Dehradun </option>
                                        <option value="Erode">Erode</option>
                                        <option value="Faridabad">Faridabad</option>
                                        <option value="Ghaziabad">Ghaziabad</option>
                                        <option value="Goa">Goa</option>
                                        <option value="Gurgaon">Gurgaon</option>
                                        <option value="Guwahati">Guwahati</option>
                                        <option value="Gwalior">Gwalior</option>
                                        <option value="Indore">Indore</option>
                                        <option value="Jabalpur">Jabalpur</option>
                                        <option value="Jaipur">Jaipur</option>
                                        <option value="Jalandhar">Jalandhar</option>
                                        <option value="Jammu&Kashmir">Jammu&Kashmir</option>
                                        <option value="Jamnagar">Jamnagar</option>
                                        <option value="Jamshedpur">Jamshedpur</option>
                                        <option value="Jodhpur">Jodhpur</option>
                                        <option value="Kanpur">Kanpur</option>
                                        <option value="Kochi">Kochi</option>
                                        <option value="Lucknow">Lucknow</option>
                                        <option value="Ludhiana">Ludhiana</option>
                                        <option value="Madurai">Madurai</option>
                                        <option value="Mangalore">Mangalore</option>
                                        <option value="Meerut">Meerut</option>
                                        <option value="Mysore">Mysore</option>
                                        <option value="Nagpur">Nagpur</option>
                                        <option value="Nashik">Nashik</option>
                                        <option value="Noida">Noida</option>
                                        <option value="Ooty">Ooty</option>
                                        <option value="Patiala">Patiala</option>
                                        <option value="Patna">Patna</option>
                                        <option value="Pondicherry">Pondicherry</option>
                                        <option value="Raipur">Raipur</option>
                                        <option value="Rajkot">Rajkot</option>
                                        <option value="Ranchi">Ranchi</option>
                                        <option value="Rourkela">Rourkela</option>
                                        <option value="Salem">Salem</option>
                                        <option value="Shimla">Shimla</option>
                                        <option value="Surat">Surat</option>
                                        <option value="Sikkim">Sikkim</option>
                                        <option value="Thiruvanthapuram">Thiruvanthapuram</option>
                                        <option value="Trichy">Trichy</option>
                                        <option value="Vijayawada">Vijayawada</option>
                                        <option value="India">Others</option>
                                    </optgroup>

                                    <optgroup label="Asia">
                                        <option value="China">China</option>
                                        <option value="Korea">Korea</option>
                                        <option value="Mangolia">Mangolia</option>
                                        <option value="Russia">Russia</option>
                                        <option value="Pakistan">Pakistan</option>
                                        <option value="Afganistan">Afganistan</option>
                                        <option value="Srilanka">Srilanka</option>
                                        <option value="Singapore">Singapore</option>
                                        <option value="Japan">Japan</option>
                                        <option value="Nepal">Nepal</option>
                                        <option value="Thailand">Thailand</option>
                                        <option value="Taiwan">Taiwan</option>
                                        <option value="Malaysia">Malaysia</option>
                                        <option value="Hong Kong">Hong Kong</option>
                                        <option value="Turkey">Turkey</option>
                                        <option value="MiddleEast">MiddleEast</option>
                                        <option value="Asia">Rest of Asia</option>
                                    </optgroup>

                                    <optgroup label="Europe">
                                        <option value="UK">UK</option>
                                        <option value="France">France</option>
                                        <option value="Ireland">Ireland</option>
                                        <option value="Germany">Germany</option>
                                        <option value="Poland">Poland</option>
                                        <option value="Romania">Romania</option>
                                        <option value="Italy">Italy</option>
                                        <option value="Spain">Spain</option>
                                        <option value="Netherland">Netherland</option>
                                        <option value="Bulgaria">Bulgaria</option>
                                        <option value="Portugal">Portugal</option>
                                        <option value="Norway">Norway</option>
                                        <option value="Switzerland">Switzerland</option>
                                        <option value="Sweden">Sweden</option>
                                        <option value="Belgium">Belgium</option>
                                        <option value="Hungry">Hungry</option>
                                        <option value="Greece">Greece</option>
                                        <option value="Denmark">Denmark </option>
                                        <option value="Finland">Finland</option>
                                        <option value="Europe">Rest of Europe</option>
                                    </optgroup>

                                    <optgroup label="America">
                                        <option value="USA">USA</option>
                                        <option value="Canada">Canada</option>
                                        <option value="Brazil">Brazil</option>
                                        <option value="Mexico">Mexico</option>
                                        <option value="Argentina">Argentina</option>
                                        <option value="Colombia">Colombia</option>
                                        <option value="America">Rest of America</option>
                                    </optgroup>

                                    <optgroup label="Other Locations">
                                        <option value="Australia">Australia</option>
                                        <option value="Newzeland">Newzeland</option>
                                        <option value="Africa">Africa</option>
                                        <option value="Others">Others</option>
                                    </optgroup>
                              </select>
                                </div>
                            <div class="col-md-2 col-lg-2 col-xs-12 col-sm-6">
                              <select name="experience" class="form-control">
                                <option value="50"  selected >Exp.</option>
                                <option value="0">Fresher</option>
                                <option value="2">1-2 yrs</option>
                                <option value="4">2-4 yrs</option>
                                <option value="7">4-7 yrs</option>
                                <option value="10">7-10 yrs</option>
                                <option value="45">10+ yrs</option>
                              </select>
                            </div>
                            <div class="col-md-3 col-lg-3 col-xs-12 col-sm-12"> 
                              <input id="tags_1" name="keywords" placeholder="Comma seperated keywords">
                            </div>
                            <div class="col-md-1 col-lg-1 col-xs-12 col-sm-12">
                              <input id="search_btn" type="submit" name="empsearchbutton" class="btn btn-block btn-round btn-d" value="" title="Click to Search">
                            </div>
                            </fieldset>
                          </form>
                    </div>
                </div>
            </div>
        </section>
        <section class="module" style="padding:20px 0px;">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-lg-12 col-xs-12 col-sm-12 table-responsive">
                    
                    </div>
                </div>
            </div>
        </section>