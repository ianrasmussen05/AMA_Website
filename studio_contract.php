<?php
global $studioFunctions;
$studio_id = $studioFunctions->get_studio_by_user_id(get_current_user_id());
if ($studio_id == ""){
    echo "<p><center>Studio does not exist. Please contact an Administrator.</center></p>";
    exit();
}
/*






*/


// $nameErr = "";
// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//     if (empty($_POST["instructor_signature"])) {
//       $nameErr = "Signature is required";
//     } 
// }
/* ******************* HEY FUTURE YOU!!! UPDATE THESE IN FUNCTIONS ALSO *************************/
$current_user = wp_get_current_user();
if( wcs_user_has_subscription( get_current_user_id(), '51881' ) ||
    wcs_user_has_subscription( get_current_user_id(), '54823' ) ||
    wcs_user_has_subscription( get_current_user_id(), '54822' ) ||
    wcs_user_has_subscription( get_current_user_id(), '51993' ) ||
    wcs_user_has_subscription( get_current_user_id(), '54818' )) 
{
    $priceTerm = "$1,500 per course";
    $term = "Three months";
} else if( wcs_user_has_subscription( get_current_user_id(), '52710' ) ||
           wcs_user_has_subscription( get_current_user_id(), '51881' ) ||
           wcs_user_has_subscription( get_current_user_id(), '51993' ) ||
           wcs_user_has_subscription( get_current_user_id(), '54820' )) 
{  
    $priceTerm = "$4,200 per year";
    $term = "One year";
} else if( wcs_user_has_subscription( get_current_user_id(), '54824' ))
{  
    $priceTerm = "$4,788 per year";
    $term = "Monthly";
} else if( wcs_user_has_subscription( get_current_user_id(), '54821' ))
{  
    $priceTerm = "$4,200 per year";
    $term = "One year";
} else if( wcs_user_has_subscription( get_current_user_id(), '54822' ))
{  
    $priceTerm = "$1,300 per year";
    $term = "One year";
} else if( wcs_user_has_subscription( get_current_user_id(), '54823' ))
{  
    $priceTerm = "$1,497 per year";
    $term = "Monthly";
}

?>

<div class="contract_container">
    <h1>Please review and accept the terms below to continue:</h1>

    <section class="contract_content">
              <style>
        .flex-container {
            display: flex;
            background-color: DodgerBlue;
        }
          .bottom {
               border-bottom:1px solid black;
          }
        .row {
          display: flex;
          flex-direction: row;
          flex-wrap: wrap;
          width: 100%; 
            min-height:30px;
            border-top:1px solid black;
            border-left:1px solid black;
             justify-content: space-around;
        }

        .column {
          display: flex;
          flex-direction: column;
          flex-basis: 100%;
          flex: 1;
            border-right:1px solid black;
            margin:0px;

             justify-content: space-around;
        }
        .double-column {
          display: flex;
          flex-direction: column;
          flex-basis: 100%;
          flex: 2;
            border-right:1px solid black;
            margin:0px;

             justify-content: space-around;
        }
          .triple-column {
          display: flex;
          flex-direction: column;
          flex-basis: 100%;
          flex: 3;
            border-right:1px solid black;
            margin:0px;

             justify-content: space-around;
        }
          .column p, .double-column p, .triple-column p, .six-column p{
              padding-left:10px;
          }
                  ul, li  {
                      margin-left:5px;
                  }
         .row .center {
              text-align:center;
          }
        .six-column {
            display: flex;
            flex-direction: column;
            flex-basis: 100%;
            flex: 6;
            border-right:1px solid black;
            margin:0px;

             justify-content: space-around;
        }
          input[type="text"], input[type="date"] {
              width:90%;
              background-color:lightgoldenrodyellow !important;
              padding:5px !important;
              margin-top:10px;
              margin-bottom:10px;
          }
      </style>
      <form class="contract_form">
        <div class="row">
            <div class="column center"><p><b>Adrenaline Program Agreement Cover Page (“Cover Page”)</b></p></div>
        </div>
       
        <div class="row">
            <div class="double-column"><p><b>“Adrenaline”</b></p></div>
      <div class="triple-column"><p><b>Adrenaline Worldwide, LLC</b></p></div>
            <div class="triple-column"><p>P.O. Box #94671 Las Vegas, Nevada 89193</p></div>
        </div>
        <div class="row">
            <div class="double-column"><p><b>“Studio”</b></p></div>
            <div class="triple-column"><p><input type="text" id="sname" name="sname" value="<?php echo get_post_meta(get_the_ID(), 'name', true); ?>"><br></p></div>
            <div class="triple-column"><p><input type="text" id="saddress" name="saddress" value="<?php echo get_post_meta(get_the_ID(), 'address_1', true).", ".get_post_meta(get_the_ID(), 'address_2', true).", ".get_post_meta(get_the_ID(), 'city', true).", ".get_post_meta(get_the_ID(), 'state', true).", ".get_post_meta(get_the_ID(), 'zip', true) ?>"></p></div>
        </div>
        <div class="row">
            <div class="double-column"><p><b>Contact</b></p></div>
            <div class="triple-column"><p>Jimmy Kane <br><br> jimmy@adrenalineworldwide.com</p></div>
            <div class="triple-column"><p><input type="text" id="poc" name="poc" value="Studio’s Point of Contact Name and Email Address"><br><input type="text" id="pinstructor" name="pinstructor" value="Primary Instructor Name and Email Address if different from Primary Contact above"></p></div>
        </div>
        <div class="row">
            <div class="double-column"><p><b>“Effective Date”</b></p></div>
            <div class="six-column"><p>Effective immediately upon fully executed Agreement between Studio & Adrenaline.</p></div>
        </div>
        <div class="row">
            <div class="double-column"><p><b>Term</b></p></div>
            <div class="six-column"><p><b><?php echo $term ?></b> beginning on the Effective Date (the <b>“Initial Term”</b>). Thereafter, the 
Agreement shall auto-renew for the same period (a <b>“Renewal Term”</b>) unless either 
party gives written notice of non-renewal at least thirty days’ prior to the end of the 
then current term. The Initial Term and each Renewal Term shall be collectively 
referred to as the <b>“Term.”</b></p></div>
        </div>
        <div class="row">
            <div class="double-column"><p><b>Program Fee</b></p></div>
            <div class="six-column"><p>$149 plus taxes and fees for the monthly payment option or $1199 plus taxes and fees for the annual payment option, subject to the terms of the Agreement (the “<b>Program Fee</b>”)</p></div>
        </div>
        <div class="row">
            <div class="double-column"><p><b>Studio Location</b></p></div>
            <div class="six-column"><p>Studio may offer the Training Program at the following location(s):<br>
<input type="text" id="saddress2" name="saddress" value="<?php echo get_post_meta(get_the_ID(), 'address_1', true).", ".get_post_meta(get_the_ID(), 'address_2', true).", ".get_post_meta(get_the_ID(), 'city', true).", ".get_post_meta(get_the_ID(), 'state', true).", ".get_post_meta(get_the_ID(), 'zip', true) ?>"></p></div>
        </div>
        <div class="row">
            <div class="double-column"><p><b>Eligibility Requirements</b></p></div>
            <div class="six-column">
                <p>To participate in the Training Program, Studio must meet the following minimum 
                    requirements:</p>
                <ul>
<li>Operate a martial arts dojo, gym, or studio in compliance with all local, state, 
and federal laws and regulations (including having an active business 
license in good standing, where applicable) </li>
<li>Meet the insurance requirements described in the Agreement</li>
<li>Primary Instructor must have a certified black belt in one or more martial arts 
(any style)</li>
<li>Primary Instructor must have a minimum of one year of martial arts teaching 
experience (any style)</li>
                    </ul>
            </div>
        </div>
        <div class="row">
            <div class="column center"><p><b>As of the Effective Date, Adrenaline and Studio accept and agree to be bound by the terms of the 
Agreement.</b></p></div>
        </div>
        <div class="row">
            <div class="triple-column"><p><b>AGREED TO AND ACCEPTED BY:</b> </p></div>
            <div class="triple-column"><p><b>AGREED TO AND ACCEPTED BY:</b></p></div>
        </div>
        <div class="row">
            <div class="triple-column"><p><b>Adrenaline Worldwide, LLC</b></p></div>
            <div class="triple-column"><p><b>Studio</b></p></div>
        </div>
        <div class="row">
            <div class="column"><p>Signature</p></div>
            <div class="double-column"><p></p></div>
            <div class="column"><p>Signature</p></div>
            <div class="double-column"><p><span class="error"><?php echo $nameErr;?></span>
        <label for="instructor_signature"> 
            <input name="instructor_signature" type="text" id="instructor_signature" required="true" autocomplete="off">
        </label></p></div>
        </div>
        <div class="row">
            <div class="column"><p>Print Name</p></div>
            <div class="double-column"><p></p></div>
            <div class="column"><p>Print Name</p></div>
            <div class="double-column"><p><input type="text" id="sprint" name="sprint" value="<?php echo $current_user->user_firstname." ".$current_user->user_lastname; ?>"></p></div>
        </div>
        <div class="row bottom">
            <div class="column"><p>Date</p></div>
            <div class="double-column"><p></p></div>
            <div class="column"><p>Date</p></div>
            <div class="double-column"><p><?php echo date("Y-m-d") ?><!--<input type="date" id="sdate" name="sdate" value="Studio Full Name">--></p></div>
        </div>
        <br>
        <br>
        <br>
        <p class="c10">
            <span class="c3 c5"><b>Adrenaline Program Agreement</b></span></p><p class="c2"><span>This Adrenaline Program Agreement, including its Cover Page (the &ldquo;</span><span class="c3">Agreement</span><span>&rdquo;), is made between Adrenaline and Studio as of the Effective Date and sets forth the terms under which Adrenaline shall make its Adrenaline Action Design program, a proprietary training program focused on martial arts fight choreography and stunt performance (the &ldquo;</span><span class="c3">Training</span><span>&nbsp;</span><span class="c3">Program</span><span>&rdquo;) available to Studio. Adrenaline and Studio are each individually referred to herein as a &ldquo;</span><span class="c3">party</span><span>,&rdquo; and together as the &ldquo;</span><span class="c3">parties.</span><span class="c1">&rdquo; Capitalized terms used and not defined in the Cover Page to this Agreement have the meanings set forth above or below.</span></p>
          <p class="c2"><span class="c5 c3"><b>1.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Definitions</b></span></p>
          <p class="c2 c4"><span>a.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&ldquo;</span><span class="c3">Adrenaline Content</span><span class="c1">&rdquo; means the fight choreography training videos, lesson plans, and all other content and materials related to Adrenaline, the Adrenaline brand, activities, products and services that Adrenaline makes generally available through the Platform.</span></p><p class="c2 c4"><span>b.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span class="c3">&ldquo;Adrenaline Marks&rdquo;</span><span>&nbsp;mean the trademarks, service marks, names, and logos of Adrenaline and its affiliated companies (&ldquo;</span><span class="c3">Affiliates</span><span class="c1">&rdquo;).</span></p><p class="c2 c4"><span>c. &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&ldquo;</span><span class="c3">Adrenaline Parties</span><span class="c1">&rdquo; mean and include Adrenaline and its present and future parent company, Affiliates, subsidiaries, managers, members, directors, officers, equity owners, employees, representatives, agents, advisors, insurers, and licensors.</span></p><p class="c2 c4"><span>d.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&ldquo;</span><span class="c3">Customer</span><span class="c1">&rdquo; means an individual or entity that signs-up or pays for Training Program-associated classes, instruction, or training from Studio.</span></p><p class="c2 c4"><span>e.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&ldquo;</span><span class="c3">Fees</span><span class="c1">&rdquo; means the Program Fee and all other applicable fees charged to Studio through its participation in the Training Program.</span></p><p class="c2 c4"><span>f. &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&ldquo;</span><span class="c3">Instructor</span><span class="c1">&rdquo; means any individual employed or designated by Studio to teach classes involving martial arts, including but not limited to the Primary Instructor.</span></p><p class="c2 c4"><span>g.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&ldquo;</span><span class="c3">Location</span><span class="c1">&rdquo; means the physical location where Studio will deliver the Training Program to its Students as identified on the Cover Page, or such other additional Location(s) as may be agreed to by Studio and Adrenaline via an addendum to this Agreement.</span></p><p class="c2 c4"><span>h.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span class="c3">&ldquo;Platform&rdquo; </span><span class="c1">means the Adrenaline training platform under which Adrenaline Content is made available to Studio and its Primary Instructor, as may be updated by Adrenaline from time to time.</span></p><p class="c2 c4"><span>i. &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&ldquo;</span><span class="c3">Primary Instructor</span><span class="c1">&rdquo; means the named Instructor that is primarily responsible for delivering the Training Program to Students.</span></p><p class="c2 c4"><span>j. &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span class="c3">&ldquo;Students&rdquo; </span><span class="c1">means those individuals that receive instruction or training from Studio at the Location.</span></p><p class="c2 c4"><span>k. &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span class="c3">&ldquo;Studio Marks&rdquo; </span><span class="c1">means the trademarks, service marks, names, and logos of Studio.</span></p><p class="c2 c4"><span>l. &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span class="c3">&ldquo;SVOD Service&rdquo; </span><span>means Adrenaline&rsquo;s online streaming video platform, currently located at</span><span><a class="c8" href="https://www.google.com/url?q=https://adrenalineworldwide.com/adrenaline-worldwide-tv/&amp;sa=D&amp;source=editors&amp;ust=1620799940892000&amp;usg=AOvVaw0ZVCMPNFWbCo1M4ylOaTgh">&nbsp;</a></span><span class="c0 c9"><a class="c8" href="https://www.google.com/url?q=https://adrenalineworldwide.com/adrenaline-worldwide-tv/&amp;sa=D&amp;source=editors&amp;ust=1620799940892000&amp;usg=AOvVaw0ZVCMPNFWbCo1M4ylOaTgh">https://adrenalineworldwide.com/adrenaline-worldwide-tv/</a></span><span class="c1">.</span></p>
          <p class="c2"><span class="c5 c3"><b>2.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Scope of Agreement</b></span></p>
          <p class="c2 c4"><span>a. &nbsp; &nbsp;</span><span class="c0">Scope</span><span class="c1">. The purpose of this Agreement is to set out the terms under which Adrenaline shall make its Training Program available to Studio so that Studio and its Instructor(s) may offer and deliver classes based on the Training Program to its Students.</span></p>
          <p class="c2"><span class="c5 c3"><b>3.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Studio Obligations</b></span></p>
          <p class="c2 c4"><span>a. &nbsp; &nbsp;</span><span class="c0">Introductory Interview</span><span>. To participate in the Training Program, Studio and its Primary Instructor must complete an introductory interview with Adrenaline (the &ldquo;</span><span class="c3">Interview</span><span class="c1">&rdquo;) and sign this Agreement. By signing this Agreement, Studio represents and warrants that: (i) all information it provides is truthful and accurate; and (ii) Studio and its Primary Instructor meet or exceed all Eligibility Requirements. Adrenaline reserves the right to request additional information or documentation from Studio to verify any of the information provided in the Interview as well as the Eligibility Requirements. Studio acknowledges that participating in an Interview does not guarantee acceptance into the Training Program. Adrenaline may accept or reject a Studio, for any or no reason, in its sole discretion. Throughout the Term, Studio must maintain and promptly update the information it provided at the time of acceptance, to keep it true, accurate, current and complete.</span></p><p class="c2 c4"><span>b. &nbsp; &nbsp;</span><span class="c0">Eligibility Requirements</span><span>. Studio acknowledges that participation in the Training Program, access and use of the Platform, Adrenaline Content, and Promotional Assets and its ability to offer the Training Program to its Students, is subject to Studio and its Primary Instructor meeting (and complying with throughout the Term) certain eligibility requirements, as set out in the Cover Page, the Adrenaline website, and as otherwise communicated to Studio, and as may be updated from time to time by Adrenaline (collectively, the &ldquo;</span><span class="c3">Eligibility Requirements</span><span class="c1">&rdquo;). Adrenaline reserves the right to substitute one or more Eligibility Requirements with alternative requirements, in its sole discretion. Adrenaline will make the final determination as to whether Studio and its Primary Instructor meets the Eligibility Requirements. If at any time, Adrenaline discovers or reasonably suspects that Studio or its Primary Instructor do not meet or have not met the Eligibility Requirements, Studio&rsquo;s participation in the Training Program may be immediately suspended or revoked, and/or this Agreement may be immediately terminated.</span></p><p class="c2 c4"><span>c. &nbsp; &nbsp; </span><span class="c0">Instructor Training and Certification</span><span>. Before Studio may offer the Training Program to its Students, the Primary Instructor must successfully complete Adrenaline&rsquo;s then current Instructor training and certification requirements (the &ldquo;</span><span class="c3">Certification Requirements</span><span class="c1">&rdquo;). As part of the Certification Requirements, the Primary Instructor must demonstrate that it has sufficient knowledge and understanding of the Training Program by completing the Adrenaline course that it plans to teach, including all training videos and lesson plans, and successfully passing a final assessment or quiz. The Primary Instructor may be required to complete additional training or additional assessments throughout the Term to maintain their certification status. Studio may change its Primary Instructor, provided it immediately notifies Adrenaline of such change, and the new Primary Instructor completes the Certification Requirements. For clarity, the Primary Instructor may permit other Instructors to assist with or lead a class related to the Training Program, provided that the Primary Instructor ensures that all such Instructors are sufficiently trained and competent to deliver the Training Program. Studio will be solely responsible for ensuring that all Instructors comply with all terms of this Agreement, including meeting the Certification Requirements, and will be liable for all acts, omissions, or non-compliance by its Instructors.</span></p><p class="c2 c4"><span>d. &nbsp; &nbsp;</span><span class="c0">Waivers.</span><span class="c1">&nbsp;Studio will require all Customers and Students (or their legal guardian in the case of any minor) to sign a medical waiver (or health condition waiver) and assumption of risk for the benefit of Adrenaline and the Adrenaline Parties before participating in the Training Program.</span></p><p class="c2 c4"><span>e. &nbsp; &nbsp;</span><span class="c0">In-Person Training</span><span class="c1">. Studio acknowledges and understands that the Training Program is intended for in-person instruction, and as such Studio represents and warrants that it will only offer the Training Program in-person to Students at the Location(s) designated on the Cover Page, or such other additional Location(s) as may be agreed to by Studio and Adrenaline via an addendum to this Agreement. In no event will Studio offer the Training Program to Students online, via videoconference, webinar, or otherwise.</span></p><p class="c2 c4"><span>f. &nbsp; &nbsp; &nbsp;</span><span class="c0">SVOD Service</span><span class="c1">. All Students that participate in the Training Program must have an active account on the Adrenaline SVOD Service. Studio will be solely responsible for ensuring that all such Students obtain and maintain an active account on the SVOD Service. Adrenaline reserves the right to charge Studio additional fees if it discovers that any of its Students do not have an active account on the SVOD Service. Studio acknowledges and understands that the SVOD Service is a separate Adrenaline service that is subject to its own terms and conditions and fees. The SVOD Service may be used as part of the Training Program for certification and testing purposes, as well as to promote the Training Program, as determined by Adrenaline, in its sole discretion.</span></p><p class="c2 c4"><span>g. &nbsp; &nbsp;</span><span class="c0">Studio Classes</span><span class="c1">. Studio shall be entitled to determine the fees it may charge to its Customers for the Training Program in its sole discretion. Additionally, for clarity, Studio may offer multiple classes of the Training Program at the Location, and may determine its own requirements, such as class size, age limits, experience level, or other such class pre-requisites, provided it complies with its obligations set out in Section 3.d, 3.e, and 3.f above.</span></p><p class="c2 c4"><span>h. &nbsp; &nbsp;</span><span class="c0">Studio Content</span><span class="c3">. </span><span>As part of the Training Program, Studio may be required to produce videos, photos, or other content for submission to Adrenaline. For any video, photo, or other content that Studio makes available to Adrenaline (collectively, &ldquo;</span><span class="c3">Studio Content</span><span class="c1">&rdquo;), Studio hereby grants to Adrenaline and the Adrenaline Parties, and Adrenaline&rsquo;s business partners, talent, licensors, sponsors and content partners, an irrevocable, assignable, transferable, sublicenseable, perpetual, worldwide, royalty-free, fully paid up, right and license to use, reproduce, publicly perform, publicly display and disseminate the Studio Content, by any and all means or methods now known or later devised, in connection with Adrenaline&rsquo;s marketing and promotion of all or any portion of the Training Program, the SVOD Service, and any Adrenaline Content, including, without limitation, promotion via any and all social media channels. Studio is solely responsible for obtaining all clearances and releases from Instructors, Customers, Students (or their legal guardian in the case of a minor) and others for the Studio Content for the benefit of Adrenaline and the Adrenaline Parties.</span></p><p class="c2 c4"><span>i. &nbsp; &nbsp; &nbsp;</span><span class="c0">Accreditation</span><span class="c3">. </span><span>Adrenaline may establish accreditation standards for the Training Program to allow Studio to demonstrate its proficiency and experience level with respect to the Training Program (the &ldquo;</span><span class="c3">Accreditation Standards</span><span class="c1">&rdquo;). Adrenaline reserves the right to update or modify the Accreditation Standards, from time to time, in its sole discretion.</span></p><p class="c2 c4"><span>j. &nbsp; &nbsp; &nbsp;</span><span class="c0">Insurance.</span><span class="c1">&nbsp;Studio will maintain appropriate insurance coverage in the amounts necessary to protect Studio, its owners, operators, employees, contractors, Instructors, Customers, and Students, and others from reasonable risks of injury or property damage, as well as risks arising out of the maintenance, use, or occupancy of the premises in which the Training Program will be offered, including statutorily required workers&rsquo; compensation insurance, commercial general liability insurance written on an occurrence basis for bodily injury, personal injury, &nbsp;and &nbsp;property &nbsp;damage &nbsp;with &nbsp;limits &nbsp;not &nbsp;less &nbsp;than &nbsp;two &nbsp;million &nbsp;dollars &nbsp;($2,000,000) &nbsp;annual aggregate and one million dollars ($1,000,000) per occurrence; and &nbsp;any &nbsp;additional &nbsp;insurance customarily carried by reasonably prudent martial arts or fitness studios. All insurance maintained by Studio shall be designated as primary to and non-contributory with any insurance maintained by or otherwise afforded to Adrenaline or the Adrenaline Parties. Additionally, upon execution of this Agreement, Studio will provide Adrenaline with a certificate of insurance and certificate of endorsement through its insurance company. The certificate of endorsement will provide Adrenaline with notice of cancellation. Adrenaline will be an &ldquo;additional named insured&rdquo; on all insurance policies.</span></p><p class="c2 c4"><span>k. &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span class="c0">Compliance with Law</span><span class="c1">. Studio is solely responsible for obtaining all appropriate licenses, consents, permissions, and waivers to operate its business and offer the Training Program to its Customers and Students at the Location. Studio will ensure that the operation of its business and performance of Studio&rsquo;s obligations under this Agreement comply at all times with all applicable foreign, federal, state and local laws, statutes, orders, industry standards, and regulations (including all health and safety regulations, guidelines, and standards related to COVID-19 or otherwise) as well as by all policies, standards, and guidelines as may be provided by Adrenaline during the Term.</span></p><p class="c2 c4"><span>l. &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span class="c0">Suspension or Revocation</span><span class="c1">. If at any time, Adrenaline discovers or reasonably suspects that Studio or its Instructors are in breach or are at risk of breaching any of the obligations in this Section 3, Studio&rsquo;s access and use of the Platform, Adrenaline Content, and Promotional Assets may be immediately suspended, its participation in the Training Program may be immediately suspended or revoked, and/or this Agreement may be immediately terminated.</span></p>
          <p class="c2"><span class="c5 c3"><b>4.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Access to the Platform</b></span></p>
    <p class="c2 c4"><span>a. &nbsp; &nbsp;</span><span class="c0">Access to the Platform</span><span class="c1">. &nbsp;Subject to the terms and conditions of this Agreement and Studio&rsquo;s payment of all Fees, during the Term, Studio shall have a limited, non-exclusive right to access and use the Platform and Adrenaline Content solely for purposes of offering the Training Program to its Students at the Location.</span></p><p class="c2 c4"><span>b. &nbsp; &nbsp;</span><span class="c0">Restrictions</span><span class="c1">. Studio acknowledges and understands that the Platform and Adrenaline Content are intended solely for the internal use of Studio and its Instructors to aid in its delivery of classes to its Students based on the Training Program. In no event, may Studio make the Platform or Adrenaline Content available to its Students or any other third party. Additionally, Studio represents and warrants that it will not (and will not allow its Instructors or any third party to): (i) use the Platform or Adrenaline Content in any manner or for any purpose other than as expressly permitted by this Agreement; (ii) sell, resell, sublicense, distribute, rent or lease the Platform or Adrenaline Content; (iii) interfere with or disrupt the integrity or performance of the Platform; (iv) interfere with other users&#39; use of the Platform; (v) use the Platform to access, acquire or otherwise obtain content to which Studio is not legally entitled; (vi) remove, obscure or alter any proprietary right notice on or in connection with the Platform or Adrenaline Content; (vii) alter, modify, or create derivative works of the Adrenaline Content (or any portion thereof); or (viii) disassemble, reverse engineer, or decompile the Platform or access it or the Adrenaline Content for purposes of building a competitive program, product, or service.</span></p><p class="c2 c4"><span>c. &nbsp; &nbsp; </span><span class="c0">Adrenaline Content Limitations</span><span class="c1">. Studio acknowledges and understands that certain Adrenaline Content may not be accessible until Studio or its Instructors have reached a certain accreditation status (per the Accreditation Standards), have completed prior training (e.g., completed the previous week&rsquo;s training module), or have otherwise successfully demonstrated proficiency through a quiz or other form of assessment, as determined by Adrenaline, in its sole discretion. Additionally, Studio acknowledges and understands that Adrenaline Content consisting of streaming or on-demand video or audio footage may only be accessed and consumed via the Platform. In no event may Studio or its Instructors download, copy, record, or take screenshots of any such Adrenaline Content, or allow any third party to do the same.</span></p><p class="c2 c4"><span>d. &nbsp; &nbsp;</span><span class="c0">Account, Password, Security</span><span class="c1">. Studio will receive a password and account designation upon completing the Platform registration process. Any username and password used for the Platform is for individual use only and may not be shared. Studio&rsquo;s account will be limited to a maximum of two devices. Studio is responsible for maintaining the confidentiality of the password and account and is solely responsible for all activities that occur under Studio&rsquo;s password and account (whether they were authorized or not). Studio agrees to immediately notify Adrenaline of any unauthorized use of Studio&rsquo;s password or account or any other breach of security.</span></p><p class="c2 c4"><span>e. &nbsp; &nbsp;</span><span class="c0">Updates</span><span class="c1">. Adrenaline reserves the right at any time to modify or discontinue, temporarily or permanently, all or any portion of the Platform (or any part thereof) with or without notice. In particular and without limitation, Adrenaline reserve the right at its sole and absolute discretion, to: (i) make any unscheduled deployments of changes, modifications, updates or enhancements to the Platform (or any part, feature or functionality thereof) at any time, with or without notice, (ii) modify, add, disable or remove features or functionality of the Platform, or (iii) modify, add, disable or remove any content, information or other material made available on or through the Platform, including, without limitation, Adrenaline Content. STUDIO AGREES THAT ADRENALINE WILL NOT BE LIABLE TO STUDIO, ITS INSTRUCTORS, CUSTOMERS, STUDENTS OR TO ANY THIRD PARTY FOR ANY MODIFICATION, SUSPENSION, INTERRUPTION OR DISCONTINUANCE OF ALL OR ANY PORTION OF THE PLATFORM, OR ANY FEATURES, CONTENT (INCLUDING ADRENALINE CONTENT) OR FUNCTIONALITY PROVIDED ON OR THROUGH THE PLATFORM.</span></p>
          <p class="c2"><span class="c5 c3"><b>5.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Joint Marketing and Promotion</b></span></p>
          <p class="c2 c4"><span>a.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span class="c0">Joint Marketing and Promotion</span><span class="c1">. Adrenaline may use Studio&rsquo;s name, logo, or other Studio Marks to identify Studio as a participant in the Training Program on Adrenaline&rsquo;s website, on social media, in the SVOD Service, and, in Adrenaline&rsquo;s sole discretion, in various marketing and sales materials. Studio may use the Adrenaline Marks and Promotional Assets provided by Adrenaline to identify itself as a participant in Adrenaline&rsquo;s Training Program, subject to Adrenaline&rsquo;s trademark and branding guidelines. Adrenaline reserves the right to withdraw such permission if it determines, in its sole discretion that Studio&rsquo;s use of the Adrenaline Marks or Promotional Assets does not comply with Adrenaline&rsquo;s trademark or branding guidelines. In no event may Studio use any Adrenaline Marks or Promotional Assets in connection with any site or business that promotes or is associated with pornography, gambling, illicit drug use, or other similar activities. Each party reserves the right to object to the other party&rsquo;s use of its Marks or the Promotional Assets and to require changes in such use. Each party agrees that it will immediately discontinue use of the other party&rsquo;s Marks and Promotional Assets upon such party&rsquo;s request. Each party will pay its own costs and expenses for its marketing activities.</span></p><p class="c2 c4"><span>b. &nbsp; &nbsp;</span><span class="c0">Promotional Assets</span><span>. From time to time, Adrenaline may provide Studio with copies of marketing collateral, content or other promotional assets generally used by Adrenaline to market and promote the Training Program (collectively, &ldquo;</span><span class="c3">Promotional Assets</span><span class="c1">&rdquo;). &nbsp;Studio may make a reasonable number of copies of the Promotional Assets as is needed for effective marketing and promotion of the Training Program pursuant to this Agreement. Adrenaline may provide Studio with updates to such Promotional Assets as they become available, in its discretion. Studio shall not modify, alter, translate or otherwise create derivative works of the Promotional Assets without Adrenaline&rsquo;s prior written consent.</span></p><p class="c2 c4"><span>c. &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span class="c0">Trademark License</span><span class="c1">. Subject to the terms and conditions of this Agreement, Adrenaline hereby grants to Studio, during the Term, a non-exclusive, non-transferable, non-sublicensable limited right to use the Adrenaline Marks in connection with the Promotional Assets made available to Studio. Subject to the terms and conditions of this Agreement, Studio hereby grants to Adrenaline, during the Term, a non-exclusive, non-transferable, non-sublicensable limited license to use the Studio Marks in connection with the joint marketing activities described in Section 5(a).</span></p><p class="c2 c4"><span>d. &nbsp; &nbsp;</span><span class="c0">Restrictions</span><span class="c1">. Each party acknowledges and agrees that (i) except for any limited license that may be expressly granted pursuant to the terms of this Agreement, neither party has any right, title or interest in or to the Marks of the other party, (ii) all use by either party of the other party&#39;s Marks shall inure to the benefit of the party owning such Marks, (iii) no implied licenses are granted, and (iv) subject only to the licenses expressly granted in Section 5(c) above, each party reserves all right, title and interest in and to its respective Marks. &nbsp;Neither party shall apply for intellectual property registration of the other party&#39;s Marks (or any mark confusingly similar thereto) anywhere in the world, and shall not engage, participate or otherwise become involved in any activity or course of action that diminishes and/or tarnishes the image and/or reputation of the other party&rsquo;s Marks.</span></p>
          <p class="c2"><span class="c5 c3"><b>6.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Fees, Payment, and Expenses</b></span></p>
          <p class="c2 c4"><span>a. &nbsp; &nbsp;</span><span class="c0">Fees and Payment</span><span>. Studio will pay Adrenaline the Program Fee as specified on the Cover Page. Adrenaline reserves the right to charge additional Fees for certifications, testing, add-on or bonus Adrenaline Content, or for other features or content that it may make available as part of the Training Program from time to time, as it may determine, in its sole discretion. All Fees and other charges incurred in connection with the Training Program will be billed to the credit card or other payment method designated at the time Studio registers for the Training Program as may be updated by Studio from time to time (the &ldquo;</span><span class="c3">Payment Method</span><span class="c1">&rdquo;). Additional charges may include taxes or possible transaction fees. Adrenaline may suspend Studio&rsquo;s access to the Platform, or terminate this Agreement if Adrenaline is unable to successfully charge a valid Payment Method. The Program Fee will be automatically billed upon execution of the Agreement, and at the start of each Renewal Term. All payments will be made in United States dollars. Adrenaline may charge Studio interest on any delinquent balance, computed on a daily basis for each day that the payment is delinquent at the lesser of eighteen percent (18%) per year or the maximum rate permitted by law. Studio will also pay all costs of collection, including reasonable attorney fees and costs. Adrenaline may adjust the Program Fee or any other Fees associated with the Training Program at any time as it may determine in its sole and absolute discretion. Any changes in the Program Fee will take effect at the start of the next Renewal Term, and any changes to other Fees will be effective immediately.</span></p><p class="c2 c4"><span>b. &nbsp; &nbsp;</span><span class="c0">No Refunds</span><span class="c1">. STUDIO ACKNOWLEDGES THAT ALL PAYMENTS ARE NONREFUNDABLE. However, Adrenaline may provide a refund, discount or other form of credit if it, in its sole and absolute discretion, deem it appropriate under the circumstances. If Adrenaline does elect to provide a refund, discount, or other form of credit, this does not entitle Studio or others to the same credit for future similar instances.</span></p><p class="c2 c4"><span>c. &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span class="c0">Expenses</span><span class="c1">. Studio is solely responsible for all expenses and costs associated with its participation in the Training Program, including any equipment or utility costs to access or use the Platform, and any costs related to the administration, instruction, and delivery of the Training Program to its Students.</span></p><p class="c2 c4"><span>d.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span class="c0">Taxes</span><span class="c1">. Studio understands that all Fees are exclusive of sales tax, use tax or any other taxes that may be required by applicable taxing authorities to be assessed. Except for taxes on Adrenaline&rsquo;s net income, Studio is responsible for, and shall pay or reimburse Adrenaline for, all taxes, including sales tax, use tax, or any similar assessments based on the Training Program provided by Adrenaline under this Agreement or arising from Studio&rsquo;s delivery of the Training Program under this Agreement. Accordingly, Studio authorizes Adrenaline to charge for any sales tax, use tax, or similar taxes, as applicable. Adrenaline is not responsible for paying or reimbursing Studio for any tax liability, including fines, penalties and interest, Studio may incur arising out of its failure to pay, report or pay in full any required taxes.</span></p>
          <p class="c2"><span class="c5 c3"><b>7.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Term and Termination</b></span></p>
          <p class="c2 c4"><span>a.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span class="c0">Term</span><span class="c1">. The Term of this Agreement is as stated on the Cover Page.</span></p><p class="c2 c4"><span>b.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span class="c0">Termination</span><span class="c1">. Either party may terminate this Agreement, in whole or in part, upon the other party&rsquo;s breach of this Agreement, if such breach is not cured within fifteen (15) days after the date of the non-breaching party&rsquo;s written notice of such breach. However, regardless of the above, Adrenaline may terminate this Agreement immediately for cause if Studio fails to meet any of the Eligibility Requirements or breaches or threatens to breach any of its obligations in Section 3. Additionally, Adrenaline may terminate this Agreement at any time and for any or no reason upon notice to Studio, provided that in such instance, Adrenaline shall provide a pro-rata refund of the Program Fee to Studio, for the unused remainder of the Term.</span></p><p class="c2 c4"><span>c. &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span class="c0">Effect of Termination</span><span class="c1">. Upon termination or expiration of this Agreement for any reason, (i) Studio shall immediately cease to represent itself to its Students or any third parties as a participant in the Training Program, return or destroy all Promotional Assets, cease its use of any of the Adrenaline Marks, and cease its delivery of the Training Program to its Students; and (ii) all licenses and other rights granted to Studio hereunder will immediately terminate and Studio will cease all use of the Platform and Adrenaline Content. Additionally, each party shall return or destroy all copies of the Confidential Information disclosed by the other party which remain in the receiving party&rsquo;s possession or under its control. All provisions of the Agreement which, by their nature, should survive will continue indefinitely in full force and effect after the termination of the Agreement, including but not limited to Sections 6 through 16.</span></p>
          <p class="c2"><span class="c5 c3"><b>8.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Ownership</b></span></p>
          <p class="c2 c4"><span>a.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span class="c0">Acknowledgement of Ownership</span><span>. Studio acknowledges that Adrenaline is the sole and exclusive owner of all right, title and interest in and to the Training Program, the Platform, all Adrenaline Content, Promotional Assets, Adrenaline Marks, the SVOD Service and all Feedback (collectively &ldquo;</span><span class="c3">Adrenaline IP</span><span class="c1">&rdquo;). No implied rights or licenses are granted by Adrenaline, its Affiliates or licensors, to Studio under this Agreement or in connection with the Training Program. Adrenaline reserves all rights, including all intellectual property rights throughout the universe, including the right to sue for infringements and royalties, in and with respect to the Adrenaline IP.</span></p><p class="c2 c4"><span>b.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span class="c0">Feedback</span><span>. All feedback, suggestions, or comments that Studio provides or shares with Adrenaline or that relate to all or any portion of the Training Program, Adrenaline Platform, or Adrenaline Content (&ldquo;</span><span class="c3">Feedback</span><span class="c1">&rdquo;), will be owned exclusively by Adrenaline. Studio acknowledges that Adrenaline will own all right, title, and interest in and to all Feedback, including all intellectual property rights in the Feedback, and that Adrenaline, its Affiliates, and licensees may freely use the Feedback in any Adrenaline products, services, Training Programs, or in any other manner. Studio understands and acknowledges that Studio will not receive, and Adrenaline has no obligation to provide, any compensation, royalty, credit, or other remuneration of any kind in connection with Studio&rsquo;s provision of or Adrenaline&rsquo;s use of any Feedback.</span></p>
          <p class="c2"><span class="c5 c3"><b>9.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Representations and Warranties</b></span></p>
          <p class="c2 c4"><span>a.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span class="c0">General Warranties</span><span class="c1">. Studio represents, warrants, covenants, and agrees that: (i) Studio is fully authorized to operate a business in the United States, (ii) Studio is fully authorized to enter into this Agreement, and to grant the rights and licenses herein granted to Adrenaline, (iii) Studio is not currently bound by, has not entered, and will not enter into any contract or agreement that prohibits, impairs, impacts or may prohibit, impair, or impact Studio&rsquo;s ability and duty to comply with Studio&rsquo;s obligations under this Agreement, (iv) Studio will not, directly or indirectly, separately or in association with others, make any unauthorized use of, infringe, or misappropriate the Platform, any Adrenaline Content, Promotional Assets, Adrenaline Marks, Feedback, or Adrenaline-branded products or services, and (v) Studio has reviewed or had the opportunity to review all terms of this Agreement with Studio&rsquo;s own legal counsel or has voluntarily elected not to do so, understanding all risks and obligations described in this Agreement.</span></p>
          <p class="c2"><span class="c5 c3"><b>10. &nbsp;Disclaimer</b></span></p>
          <p class="c7 c4"><span class="c1">a. &nbsp; &nbsp;STUDIO&rsquo;S PARTICIPATION IN THE TRAINING PROGRAM AND USE OF THE ADRENALINE CONTENT AND PLATFORM IS AT STUDIO&rsquo;S SOLE RISK. THE ADRENALINE PLATFORM IS PROVIDED ON AN &quot;AS IS&quot; AND &quot;AS AVAILABLE&quot; BASIS. ADRENALINE EXPRESSLY DISCLAIMS ALL WARRANTIES OF ANY KIND, WHETHER EXPRESS, IMPLIED, OR STATUTORY, INCLUDING, BUT NOT LIMITED TO THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE, AND ANY OTHER WARRANTIES AS TO QUALITY, AVAILABILITY, TITLE AND NON-INFRINGEMENT.</span></p><p class="c7 c4"><span class="c1">b. &nbsp; &nbsp;IN ADDITION, ADRENALINE MAKES NO REPRESENTATION OR WARRANTY THAT THE TRAINING PROGRAM, PLATFORM, ADRENALINE CONTENT, PROMOTIONAL ASSETS OR ANY OTHER CONTENT OR INFORMATION MADE AVAILABLE THROUGH THE TRAINING PROGRAM (I) WILL MEET STUDIO&rsquo;S REQUIREMENTS, (II) WILL BE ACCESSIBLE, UNINTERRUPTED, TIMELY, SECURE, ACCURATE, RELIABLE OR ERROR-FREE, OR THAT ANY ERRORS WILL BE CORRECTED; (III) WILL PRODUCE ANY SPECIFIC RESULTS, OR MEET STUDIO, ITS INSTRUCTORS, CUSTOMERS, OR STUDENTS EXPECTATIONS.</span></p><p class="c4 c7"><span class="c1">c. &nbsp; &nbsp; ANY ADRENALINE CONTENT DOWNLOADED OR OTHERWISE OBTAINED THROUGH THE USE OF THE PLATFORM IS DONE AT STUDIO&rsquo;S OWN DISCRETION AND SOLE RISK AND STUDIO WILL BE SOLELY RESPONSIBLE FOR ANY DAMAGE TO STUDIO&rsquo;S COMPUTER SYSTEM OR LOSS OF DATA THAT RESULTS FROM THE DOWNLOAD OF ANY SUCH MATERIAL.</span></p><p class="c7 c4"><span class="c1">d. &nbsp; &nbsp;NO ADVICE OR INFORMATION, WHETHER ORAL OR WRITTEN, OBTAINED BY STUDIO FROM ADRENALINE OR THROUGH OR FROM THE TRAINING PROGRAM SHALL CREATE ANY WARRANTY NOT EXPRESSLY STATED IN THIS AGREEMENT.</span></p><p class="c7 c4"><span class="c1">e. &nbsp; &nbsp;ADRENALINE MAKES NO REPRESENTATIONS OR WARRANTIES AS TO THE QUALITY OF THE FIGHT CHOREOGRAPHY, STUNTS AND EXTREME MARTIAL ARTS THAT MAY BE PERFORMED OR DESCRIBED ON OR THROUGH THE TRAINING PROGRAM (INCLUDING IN ANY ADRENALINE CONTENT) OR THAT THE TECHNIQUES, MOVEMENTS OR ROUTINES USED OR PERFORMED BY INDIVIDUALS IN THE ADRENALINE CONTENT ARE PROPER OR SAFE. ADRENALINE HEREBY DISCLAIMS ANY AND ALL LIABILTY FOR ANY PERSONAL INJURY, PROPERTY DAMAGE OR DEATH ARISING FROM ANY ACTION OR INACTION, NEGLIGENCE, OR MISCONDUCT ARISING OUT OF OR RELATED TO STUDIO, ITS INSTRUCTORS, CUSTOMERS, OR ITS STUDENTS PEFORMANCE OF, PARTICIPATION IN, OR SIMULATION OR EMULATION OF ANY FIGHT CHOREOGRAPHY, STUNTS, OR EXTREME MARTIAL ARTS.</span></p>
          <p class="c2"><span class="c5 c3"><b>11. &nbsp;Release of Claims</b></span></p>
          <p class="c2 c4"><span>a.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Studio hereby, for himself/herself/itself and on behalf of Studio&rsquo;s heirs, executors, administrators, employers, agents, representatives, insurers, and attorneys, irrevocably releases and discharges Adrenaline and the Adrenaline Parties of and from any and all claims, arising under any theory of liability, which may arise from any cause whatsoever, including any negligent act or omission by Adrenaline or others, and from liability for any accident, illness, personal injury, bodily injury, loss or damage to personal property, property damage, or death, to Studio, its owners, operators, employees, contractors, Instructors, Students, Customers (collectively, the &ldquo;</span><span class="c3">Studio Parties</span><span class="c1">&rdquo;), or any other persons, and any other consequences arising or resulting directly or indirectly from Studio&rsquo;s participation in the Training Program.</span></p><p class="c2 c4"><span class="c1">b.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Studio acknowledges and agrees that Adrenaline assumes no responsibility for any liability, damage, or injury that may be caused by Studio, the Studio Parties, or any other persons, negligent or intentional acts or omissions committed prior to, during, or after participation in the Training Program, or for any liability, damage, or injury caused by the intentional or negligent acts or omissions of others.</span></p>
          <p class="c2"><span class="c5 c3"><b>12. &nbsp;Indemnification and Hold Harmless</b></span></p>
          <p class="c2 c4"><span class="c1">a.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;To the maximum extent permitted by law, Studio agrees to indemnify, defend, and hold Adrenaline and the Adrenaline Parties harmless from and against any and all lawsuits, claims, demands, losses, settlements, damages, fines, and penalties, including reasonable attorneys&#39; fees and costs, made by the Studio Parties, or any third party arising out of or related to: (i) any act, omission, negligence, or misconduct by Studio or the Studio Parties in connection with the Training Program; (ii) Studio or the Studio Parties breach of this Agreement; (iii) Studio&rsquo;s breach of any representations and warranties; (iv) Studio&rsquo;s violation, infringement, or misappropriation of the rights of Adrenaline or any third party; or (v) any personal injury, bodily injury, property damage, or death, to Studio, the Studio Parties or any other person(s) arising out of or related to Studio or the Studio Parties participation in the Training Program or their performance of, simulation, or emulation of any fight choreography, stunts, or extreme martial arts.</span></p>
          <p class="c2"><span class="c5 c3"><b>13. &nbsp;Limitation of Liability</b></span></p>
          <p class="c2 c4"><span>a.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span class="c0">Liability for Certain Damages</span><span class="c1">. &nbsp;TO THE MAXIMUM EXTENT PERMITTED BY APPLICABLE LAW, IN NO EVENT WILL ADRENALINE OR ANY ADRENALINE PARTIES BE LIABLE TO STUDIO, OR TO ANY OTHER PERSON OR ENTITY CLAIMING THROUGH STUDIO, UNDER ANY THEORY OF LIABILITY, WHETHER CONTRACT, STATUTORY, STRICT LIABILITY, OR AT LAW OR EQUITY, AND REGARDLESS OF THE FORM OF ACTION, FOR ANY CONSEQUENTIAL, INCIDENTAL, INDIRECT, PUNITIVE, SPECIAL, OR EXEMPLARY DAMAGES (INCLUDING LOST PROFITS, LOSS OF BUSINESS OPPORTUNITY, OR LOSS OF GOODWILL) ARISING OUT OF OR RELATING TO THIS AGREEMENT, THE TRAINING PROGRAM, THE PLATFORM, THE ADRENALINE CONTENT, AND THE PROMOTIONAL ASSETS, EVEN IF ADRENALINE HAS BEEN ADVISED OF THE POSSIBILITY OF SUCH DAMAGES.</span></p><p class="c2 c4"><span>b.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span class="c0">Amount of Damages</span><span class="c1">. &nbsp;TO THE MAXIMUM EXTENT PERMITTED BY APPLICABLE LAW, ADRENALINE&rsquo;S MAXIMUM AGGREGATE LIABILITY TO STUDIO FOR ANY AND ALL CLAIMS, LAWSUITS, LIABILITIES, AND DAMAGES BROUGHT OR ASSERTED BY STUDIO, OR ANY PARTY CLAIMING THROUGH STUDIO, UNDER ANY THEORY OF LIABILITY, WHETHER CONTRACT, STATUTORY, STRICT LIABILITY, OR AT LAW OR EQUITY, AND REGARDLESS OF THE FORM OF ACTION, ARISING OUT OF OR RELATING TO THIS AGREEMENT, THE TRAINING PROGRAM, THE PLATFORM, THE ADRENALINE CONTENT, AND THE PROMOTIONAL ASSETS WILL NOT EXCEED THE TOTAL FEES PAID BY STUDIO TO ADRENALINE IN THE TWELVE MONTHS IMMEDIATELY PRECEDING THE CLAIM GIVING RISE TO THE LIABILITY.</span></p><p class="c2 c4"><span class="c1">c. &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Adrenaline and Studio mutually agree that the provisions regarding warranties, indemnification, and the above limitation of liability represent a fair and equitable allocation of risk between the parties, without which, the parties would not have entered into this Agreement.</span></p>
          <p class="c2"><span class="c5 c3"><b>14. &nbsp;Confidentiality</b></span></p>
          <p class="c2 c4"><span>a.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&ldquo;</span><span class="c3">Confidential Information&rdquo; </span><span>means any information provided by a party (&ldquo;</span><span class="c3">Disclosing Party</span><span>&rdquo;) to the other party (&ldquo;</span><span class="c3">Receiving Party</span><span class="c1">&rdquo;) that is either: (i) designated in writing as confidential by the Disclosing Party at the time of disclosure; or (ii) should reasonably be considered, given the nature of the information or the circumstances surrounding its disclosure, to be confidential. Notwithstanding the above, the terms of this Agreement, the Training Program, the Platform, any Adrenaline Content, Promotional Assets, and all Feedback and any information related to the foregoing constitutes the Confidential Information and property of Studio.</span></p><p class="c2 c4"><span>b. &nbsp; &nbsp;</span><span class="c0">Duty of Confidentiality</span><span class="c1">. Each party, as a Receiving Party will not: (i) use any Confidential Information except for the sole benefit of the Disclosing Party and only to the extent necessary to perform its obligations under this Agreement; or (ii) disclose any Confidential Information of the Disclosing Party to any person or entity, except to the Receiving Party&rsquo;s own employees, consultants, and agents who are involved in performing this Agreement, have a need to know, and have signed a non-disclosure agreement with terms no less restrictive than those herein.</span></p><p class="c2 c4"><span>c. &nbsp; &nbsp; </span><span class="c0">Exclusions</span><span class="c1">. The duty of confidentiality described in Section 14(a) above will not apply to any information that: (i) is rightfully known by the non-disclosing party prior to disclosure by the Disclosing Party, (ii) is rightfully obtained by the Receiving Party from a third party without restrictions on disclosure, or (iii) is disclosed by the Receiving Party with the prior written approval of the Disclosing Party. </span></p>
          <p class="c2"><span class="c5 c3"><b>15. &nbsp;Audit</b></span></p>
          <p class="c2 c4"><span>a. &nbsp; &nbsp;</span><span class="c0">Records</span><span class="c1">. Upon reasonable prior notice, Adrenaline may inspect Studio&rsquo;s records to verify Studio&rsquo;s compliance with this Agreement. If Studio is notified that any audit indicates that Studio is not in compliance with any terms of this Agreement, then Studio will promptly correct such issue at Studio&rsquo;s sole expense.</span></p>
          <p class="c2"><span class="c5 c3"><b>16. &nbsp;General</b></span></p>
          <p class="c2 c4"><span>a.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span class="c0">Entire Agreement</span><span class="c1">. This Agreement, including its Cover Page, sets forth the entire agreement between the parties regarding the subject matter and supersedes all prior oral or written understandings, representations, and agreements regarding the subject matter.</span></p><p class="c2 c4"><span>b.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span class="c0">Law and Venue</span><span class="c1">. The Agreement and the relationship between Studio and Adrenaline will be governed by the laws of the State of California, without regard to its conflict of law provisions. Studio and Adrenaline agree to submit to the personal and exclusive jurisdiction of the courts located within San Mateo County, California.</span></p><p class="c2 c4"><span>c. &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span class="c0">Construction</span><span class="c1">. The essential terms and conditions contained in this Agreement have been mutually negotiated between Studio and Adrenaline. No ambiguity in this instrument will be construed or interpreted as against the preparer of this Agreement.</span></p><p class="c2 c4"><span>d.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span class="c0">Waiver; Severability</span><span class="c1">. The failure of Adrenaline to exercise or enforce any right or provision of this Agreement will not constitute a waiver of such right or provision. If any provision of the Agreement is found by a court of competent jurisdiction to be invalid, the parties nevertheless agree that the court should endeavor to give effect to the parties&#39; intentions as reflected in the applicable provision, with all other portions of that provision and all other provisions of the Agreement remaining in full force and effect.</span></p><p class="c2 c4"><span>e.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span class="c0">Modification</span><span class="c1">. Except as specifically stated otherwise in the Agreement, the Agreement may only be modified in a writing signed by the parties.</span></p><p class="c2 c4"><span>f. &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span class="c0">Assignment</span><span class="c1">. In no event is Studio permitted to assign, transfer, or delegate this Agreement, or any of Studio&rsquo;s rights or duties under this Agreement. Any such assignment will be void and of no force and effect. Adrenaline, however, may transfer, assign, or delegate all or any portion of this Agreement or its rights or duties under this Agreement to any third party with or without notice.</span></p><p class="c2 c4"><span>g.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span class="c0">Non-Circumvention or Disparagement</span><span class="c1">. &nbsp;In no event will Studio circumvent or attempt to circumvent the terms of this Agreement. Additionally, Studio will not disparage Adrenaline or the Adrenaline Parties or otherwise take any action which could reasonably be expected to adversely affect Adrenaline or the Adrenaline Parties personal or professional reputation. &nbsp;</span></p><p class="c2 c4"><span>h.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span class="c0">Third Party Beneficiaries</span><span class="c1">. Studio agrees that there are no third party beneficiaries related to Studio to this Agreement, provided, however, that Adrenaline Parties are third party beneficiaries to this Agreement as related to Adrenaline.</span></p><p class="c2 c4"><span>i. &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span class="c0">Force Majeure</span><span class="c1">. Adrenaline will not be liable for any delays or non-performance resulting from circumstances or causes beyond Adrenaline&rsquo;s reasonable control, including, without limitation, acts or omissions or the failure to cooperate by Studio, destruction of data, fire or other casualty, act of God, strike or labor dispute, war or other violence, pandemic, or flood.</span></p><p class="c2 c4"><span>j. &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span class="c0">Relationship</span><span class="c1">. The parties to this Agreement are independent contractors. There is no partnership, joint venture, employment, franchise, or agency relationship created by this Agreement between the parties. Studio has no power or authority to bind Adrenaline or to incur obligations on Adrenaline&rsquo;s behalf without Adrenaline&rsquo;s prior and specific written consent.</span></p><p class="c2 c4"><span>k. &nbsp; &nbsp; </span><span class="c0">Statute of Limitations</span><span class="c1">. To the maximum extent permitted by law, Studio agrees that regardless of any statute or law to the contrary, any claim or cause of action asserted by Studio that is arising out of or related to this Agreement must be filed within one (1) year from the date on which such claim or cause of action first arose or such claim or cause of action will be forever barred, and Studio waives any claims or causes of action after such date if not so filed.</span></p><p class="c2 c4"><span>l. &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span class="c0">Headings</span><span class="c1">. Section headings are for convenience only and have no legal effect.</span></p><p class="c2 c4"><span>m. &nbsp; </span><span class="c0">Notices</span><span class="c1">. Legal notices must be provided to the parties at their respective addresses stated on the Cover Page to this Agreement. Updated address information must be provided by a party to the other party in writing. Legal and business notices by Adrenaline may be provided via email to Studio&rsquo;s email address stated on the Cover Page.</span></p><p class="c2 c4"><span>n.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span class="c0">Counterparts</span><span class="c1">. This Agreement may be executed in counterparts which together will be considered one instrument. This Agreement may be executed electronically and doing so will not be considered a defense to enforcement by either party. This Agreement has been duly executed by the parties or their authorized legal representatives.</span>
        </p>
<?php
   if( GetActiveSubscription("upgrade") )
   {       
?>
        
        <p class="c2"><span class="c5 c3"><b>ADDENDUM #1 TO ADRENALINE PROGRAM AGREEMENT</b></span></p>
        <p>This Addendum #1 (“Addendum”) effective as of Month Day, 2021 (the “Addendum Effective Date”) amends the Adrenaline Program Agreement dated as of Date of Original Agreement (the “Agreement”), by and between Adrenaline Worldwide, LLC (“Adrenaline”) and Studio’s Full Name (“Studio”). Capitalized terms herein shall have the meanings set forth in the Agreement unless otherwise defined herein.</p>

        <p class="c2"><span class="c5 c3"><b>RECITALS</b></span></p>
        <p><b>WHEREAS</b>, pursuant to the Agreement, Adrenaline agreed to make its Adrenaline Action Design program, a proprietary training program focused on martial arts fight choreography and stunt performance (the “Training Program”) available to Studio for the Program Fee; and
                  <p><b>WHEREAS</b>, the Agreement envisioned commencement of the Training Program on the Effective Date; and</p>
        <p><b>WHEREAS</b>, Adrenaline and Studio desire to defer, or put on hold, commencement of the Training Program to a later date;</p>
                  <p><b>NOW, THEREFORE</b>, in consideration of the mutual covenants and agreements hereinafter set forth and for other good and valuable consideration, the receipt and sufficiency of which are hereby acknowledged, the parties agree as follows:</p>
        <p>1.	Deferral Period. Adrenaline agrees that Studio may defer the commencement of the Training Program for up to two months from the Addendum Effective Date (the “Deferral Period”).</p>
        <p>2.	Hold Fee. In consideration of the Deferral Period, Studio will pay a non-refundable hold fee to Adrenaline in the amount of $99.00 (the “Hold Fee”) upon execution of this Addendum.</p>
        <p>3.	Fees and Payment. Studio will pay the Program Fee balance in full within sixty (60) days of the Addendum Effective Date. If Studio fails to pay the Program Fee as required by this section, Adrenaline may terminate the Agreement.</p>
        <p>4.	Startup Pack. Studio shall receive a Startup Pack from Adrenaline, shipped to Studio. Startup Packs shall mean and include:</p>
        <p>a.	[Posters, flyers, accreditation decal, certificate, digital videos and flyers viewable on the studio’s portal]</p>
        <p>5.	Access to Materials. Studio will continue to receive access to the Platform during the Deferral Period but shall not have access to any Adrenaline course materials outside of the Startup Pack until Studio’s Program Fee balance is paid in full.</p>
        <p>6.	Program Activation. During the Deferral Period and subject to Studio paying the Program Fee, Adrenaline and Studio will mutually agree upon a new commencement date for the Training Program (the “Activation Date”) and the Term of the Agreement will be extended by the number of days between the Effective Date and the Activation Date to account for the Deferral Period.</p>
        <p>7.	Except as specifically set forth in this Addendum, the parties agree that all definitions, terms and conditions set forth in the Agreement remain in full force and effect. </p>
        <input name="studio_adendum" type="hidden" id="studio_adendum" value="AdendumAgreed" />
<?php
   }
?>
          <br>
            <input name="studio_id" type="hidden" id="studio_id" value="<?php echo $studio_id ?>"  />
            <input type="checkbox" id="accept_checkbox" name="accept_checkbox" value="accept" required="true">
            <label for="accept_checkbox"> By checking this box, I confirm that I agree to the terms and conditions stated above.</label>
            <br>
            <br>
            <input type="" name="Submit " id="send" value="Accept" class="buttons yellow-button accept-conditions">
    </form>

    </section>

<script>
    (function($) {
        var hold;
        $(document).ready(function() {
             jQuery("input").on("focusout", function() {
                 if(jQuery(this).val() == ""){
                    jQuery(this).val(hold);
                 }
             })
            jQuery("input").on("click", function() {
                hold = jQuery(this).val();
                if(jQuery(this).val() == this.getAttribute("value")){
                    jQuery(this).val("");
                }
            });

            jQuery(".contract_form").on("click", ".accept-conditions", function(e) {
               
                e.preventDefault();
                var studio_id = $( "input#studio_id").val();
                var adendum = $( "input#studio_adendum").val();
                if(adendum == undefined){ adendum = "standard"};
                var checkbox_value = $( "input#accept_checkbox").val();
                //var signature = $( "input#instructor_signature").val();
                var signature = $( "input#instructor_signature").val()+"|"+$( "input#sprint").val()+"|"+$( "input#sprint").val()+"<?php echo date('Y-m-d')?>"+"|"+$( "input#sprint").val()+"|"+$( "input#saddress").val()+"|"+$( "input#saddress2").val()+"|"+$( "input#sname").val()+"|"+adendum;
                if($( "input#sname").val() == "" ||
                   $( "input#saddress").val() =="" ||
                   $( "input#saddress2").val() =="" ||
                    $( "input#poc").val() =="" ||
                    $( "input#pinstructor").val() =="" ||
                   $( "input#instructor_signature").val() == "" ||
                   $( "input#accept_checkbox").is(':checked') != true
                  ){
                   alert("Please fill out all fields.:"+$( "input#accept_checkbox").is(':checked'));
                   }
                else{

                    $("#send").prop("value", "Sending...");
                    jQuery.post("<?php echo esc_url(admin_url('admin-post.php')); ?>",
                    {
                        action: "submit_studio_contract",
                        studio_id: studio_id,
                        checkbox_value: checkbox_value,
                        signature: signature                    
                    },
                    function(data, status){
                        //alert(data+":"+status+":"+studio_id);
                        // show status for testing
                        // THIS ISNT GREAT BUT NOTHING IS RETURNING RIGHT NOW SO WE REFRESH.
                        location.reload();
                    });
                }
                // }
            });
        });
    })(window.jQuery);
</script>