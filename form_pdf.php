<!DOCTYPE html>
<html lang="en">
   <style>
         @page {
            margin: 60px 25px;
        }

        header {
            position: fixed;
            top: 25rem;
            left: 0;
            right: 0;
            height: 60px;
            text-align: center;
            font-size: 150px;
            color: #503363;
            transform: rotate(314deg);
            font-weight:bold;
            opacity: 0.2;
            font-family: sans-serif !important;
        }

        .content {
            margin-top: 0px;
        }

        .text-center {
            text-align: center;
        }

        .justify-content-center {
            display: flex;
        }

        form#form-submit div {
            display: flex;
            flex-direction: column;
            padding: 0;
        }
        label.form-label {
            display: flex;
            align-items: center;
        }

        .pdf_p {
            padding: 0 17px !important;   
            margin: 0 !important;
            border-bottom: 1px solid black;
            color : black;
        }

        .pdf_p {
            text-align: left;
            width: 50%;
            overflow-wrap: break-word;
        }
    
        img.c_sign {
            width: 60%;
            height: 4rem;
        }

        img.c_pass {
            width: 90px;
            position: absolute;
            top: 20px;
            right: 0px;
            height: 110px;
        }
        /* img.other{
            width: 100%;
        } */
        .oth{
            margin-top:44rem !important;
        }
        .oth .img{
            min-height : 44rem;
        }
        .oth img{
            
            width: 100%;
        }
        @font-face {
                font-family: 'JameelNooriNastaleeq';
                src: url('urdu/JameelNooriNastaleeq.ttf') format('truetype');
            }
            .content {
                font-family: DejaVuSans;
            }
    </style> 

 <body>
    <?php if($action == 'view'){
        echo "<header>
            <div>PREVIEW</div>
        </header>";
    }
    
    ?>
       <div class="content">
    <?=$logo;?>
        <div class="row">
            <div class="col-md-12  text-center">
                <h1>APPLICATION FORM </h1>      
                <h3>For the South Asia MRCGP [INT.] Part 2 (OSCE) Examination</h3>
                <p><?=$form_title[0];?></p>
            </div>
        </div>
        <div class="row align-items-center justify-content-center">
            <div class="col-md-12 col-lg-12 col-xl-12">
                <div class="card">
                    <div class="card-body "> 
                    <form class="custom-validation row" id="form-submit" novalidate="">
                    <div class="text-center"><h3>PERSONAL AND CONTACT INFORMATION</h3><?=$pass;?></div>
                    <div class="mb-3 col-md-6">
                        <label class="form-label">Candidate ID:<span class="pdf_p"><?=$nic;?></span></label>
                    </div>
                    <div class="mb-3 col-md-12">
                        <label class="form-label">Full name as you would like it to appear on record<span class="pdf_p"><?=$fullname;?></span></label>
                    </div>
                    <hr>
                    <div class="mb-3 col-md-12">
                        <h4>Residential Address</h4>
                        <ul class="row" style="list-style-type: none;">
                            <li class="col-md-12 mt-3">
                                <label class="form-label">House no. and street or P.O.Box:<span class="pdf_p"><?=$pox;?></span></label>
                            </li>
                            <li class="col-md-12 mt-3">
                                <label class="form-label">District:<span class="pdf_p"><?=$district;?></span></label>
                            </li>
                            <li class="col-md-12 mt-3">
                                <label class="form-label">City / Town / Village:<span class="pdf_p"><?=$city;?></span></label>
                            </li>
                            <li class="col-md-12 mt-3">
                                <label class="form-label">Province / Region:<span class="pdf_p"><?=$region;?></span></label>
                            </li>
                            <li class="col-md-12 mt-3">
                                <label class="form-label">Country:<span class="pdf_p"><?=$country;?></span></label>
                            </li>
                        </ul>
                    </div>
                    <hr>
                    <div class="mb-3 col-md-12">
                        <h4>Other contact details:</h4>
                        <ul class="row" style="list-style-type: none;">
                            <li class="col-md-12 mt-3">
                                <label class="form-label">WhatsApp number:<small></small><span class="pdf_p"><?=$home_phone;?></span></label>
                            </li>
                            <li class="col-md-12 mt-3">
                                <label class="form-label">Emergency contact number: <span class="pdf_p"><?=$work_phone;?></span></label>
                            </li>
                            <li class="col-md-12 mt-3">
                                <label class="form-label">E-mail* :<span class="pdf_p"><?=$email;?></span></label>
                                
                                <!-- <h6 class="mt-3">(Please PRINT CLEARLY and LEGIBLY a valid personal email address that you regularly check, as most correspondence and important announcements are communicated to candidates by email.<br>
                                    <br> If you do not supply your email address, you may NOT receive registration confirmation and your result!)
                                </h6> -->
                            </li>
                        </ul>
                    </div>
                    <hr>
                    <br>
                    <br>
                    <div class="mb-3 col-md-6">
                        <label class="form-label">Date of passing Part 1 exam: <small>(month/date/year)</small><span class="pdf_p"><?=$passp1;?></span></label>
                        
                    </div>
                    <div class="mb-3 col-md-6">
                        <label class="form-label">Date of all passing Part 2 exam: <small>(month/date/year)</small><span class="pdf_p"><?=$passp2;?></span></label>
                        
                    </div>
                    <br>
                    <br>
                    <hr>
                    <div class="mb-3 col-md-12">
                        <div class="text-center"><h3>EXPERIENCE AND LICENSE DETAILS</h3></div>
                        <label class="form-label">Country of postgraduate clinical experience:<span class="pdf_p"><?=$count_pce;?></span></label>
                        
                    </div>
                    <div class="mb-3 col-md-12">
                        <label class="form-label">Country of ethnic origin<span class="pdf_p"><?=$count_oeo;?></span></label>
                    </div>
                    <div class="mb-3 col-md-12">
                        <label class="form-label">Registration authority<span class="pdf_p"><?=$regis_auth;?></span></label>
                    </div>
                    <div class="mb-3 col-md-12">
                        <label class="form-label">Registration number<span class="pdf_p"><?=$regis_num;?></span></label>
                    </div>
                    <div class="mb-3 col-md-12">
                        <label class="form-label">Date of full registration<span class="pdf_p"><?=$date_reg;?></span></label>
                    </div>
                    <hr>
                    <div class="mb-3 col-md-12">
                        <div class="text-center"><h3>OSCE SESSION</h3></div>
                        <label class="form-label">The OSCE exam will take place over <?=$form_title[2];?> days ( <?=$form_title[1];?> ).
                        <br>If you have a preference (e.g. for travel purposes) for a particular day, please indicate below your preferred choice:
                        <span class="pdf_p"><?=$osce;?></span></label>
                        
                    </div>
                    <div class="mb-3 col-md-12">
                        <ul class="row" style="list-style-type: none;">
                            <li class="col-md-12 mt-3">
                                <label class="form-label">Preference Date 1:<span class="pdf_p"><?=$pref_d1;?></span></label>
                                
                            
                            </li>
                            <li class="col-md-12 mt-3">
                                <label class="form-label">Preference Date 2:<span class="pdf_p"><?=$pref_d2;?></span></label>
                                
                            
                            </li>
                            <li class="col-md-12 mt-3">
                                <label class="form-label">Preference Date 3:<span class="pdf_p"><?=$pref_d3;?></span></label>
                                
                            
                            </li>
                        </ul>
                    </div>
                   
                    <br>
                    <br>
                    <br>
                    <div class="mb-3 col-md-12">
                        <div><h3 class="text-center">PLEASE NOTE:</h3>
                            <p>THE NUMBER OF PLACES IS LIMITED, AND SLOTS WILL BE ALLOCATED ON THE "FIRST COME FIRST SERVED” BASIS. Your application may be rejected because of a large number of applicants and you may be invited to apply again or offered a slot at a subsequent examination. Priority will be given to applicants from South Asia and those applications that reach us first, so we encourage you to apply as soon as possible.
                            WHILST WE WILL TRY TO ACCOMMODATE YOUR PREFERENCE, IT MAY NOT BE POSSIBLE DUE TO A LARGE NUMBER OF APPLICANTS.
                            Please email us well in advance if you require a letter of invitation for visa purposes and make sure you complete all travel formalities in good time (visa applications, travel permits, leaves, etc.) No Refunds will be granted in case any candidate fails to get the visa prior to the exam date.
                            Candidates with a disability are requested to read the rules and regulation document [Page 10] available on the website
                            The MRCGP [INT.] South Asia Secretariat will notify you by email of your allocated date and time at least two weeks before the exam starting date.
                            </p><h3 class="text-center">CANDIDATE'S STATEMENT</h3><br>
                            I hereby apply to sit the South Asia MRCGP [INT.] Part 2 (OSCE) Examination, success in which will allow me to apply for International Membership of the UK's Royal College of General Practitioners. Detailed information on the membership application process can be found on the RCGP website:
                            <a href="http://www.rcgp.org.uk/membership/types_of_membership/international_membership.aspx">Member Ship</a>
                            <br><br>
                            I have read and agree to abide by the conditions set out in the South Asia MRCGP [INT.] Examination Rules and Regulations as published on the MRCGP [INT.] South Asia website:
                            www.mrcgpintsouthasia.org
                            If accepted for International Membership, I undertake to continue approved postgraduate study while I remain in active general practice/family practice, and to uphold and promote the aims of the RCGP to the best of my ability.
                            <br><br>
                            I understand that, on being accepted for International Membership, an annual subscription fee is to be payable to the RCGP. I understand that only registered International Members who maintain their RCGP subscription are entitled to use the post-nominal designation "MRCGP [INT]". Success in the exam does not give me the right to refer to myself as MRCGP [INT.].
                            <br><br><p>I attach a banker's draft made payable to <b><u>“MRCGP [INT.] South Asia”</u></b>,</p>
                            I also understand and agree that my personal data will be handled by the MRCGP [INT.] South Asia Board and I also give permission for my personal data to be handled by the regional MRCGP [INT.] South Asia co-ordinators.
                            <p></p>
                        </div>
                    </div>
                   
                    <br>
                    <div class="mb-3 col-md-12">
                        <label class="form-label">Signature:<p class="pdf_p"><?=$sign;?></p></label>
                    </div><br>
                    <div class="mb-3 col-md-12">
                        <label class="form-label">Full name:<span class="pdf_p"><?=$b_fullname;?></span></label>
                    </div><br>
                    <div class="mb-3 col-md-12">
                        <label class="form-label">Date:<span class="pdf_p"><?=$b_date;?></span></label>
                    </div>
                    <br><br> <br><br><br><br><br><br>
                    <div class="row oth">
                        <label class="text-center"><h3>Valid Medical license</h3></label>
                        <hr>
                        <?=$other[0];?>
                        <br>
                        <br>
                        <label class="text-center"><h3>Part I passing email</h3></label>
                        <hr>
                        <?=$other[1];?>
                        <br>
                        <br>
                        <label class="text-center"><h3>Passport bio Page</h3></label>
                        <hr>
                        <?=$other[2];?>
                        <br>
                        <br>
                        <?php if(isset($other[3])){?> 
                        <label class="text-center"><h3>Proof of fee credit [if applicable]</h3></label>
                        <hr>
                        <?=$other[3];}?>
                    </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
 </body>
</html>