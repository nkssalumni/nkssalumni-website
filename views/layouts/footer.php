<?php
session_start();
$returnurl = 'https://chats.beyond-grades.com/?user='.urlencode(base64_encode($_SESSION['name'])).'&email='.urlencode(base64_encode("you won't guess the amount of this course hash value and if you do my backend will still catch you ".$_SESSION['email']));

echo '<div class="bg-custom-dark">
<footer class="footer ">
    <div class="container">
      <div class="row">
        <div class="col-sm-12 col-md-3 col-lg-3 text-white mt-2">
          <p class="footer-heading text-left">CATEGORIES</p>
          <ul style="list-style-type:none; padding-left: 3px !important;" class="mt-2">
            <li class="mt-2"><a class="text-white footer-link" href="/">Home</a></li>
            <li class="mt-2"><a class="text-white footer-link" href="/all-courses">All Courses</a></li>
            <li class="mt-2"><a class="text-white footer-link" href="/advanced-courses">Advanced Course</a></li>
            <li class="mt-2"><a class="text-white footer-link" href="/pro">Pro Membership</a></li>
            <li class="mt-2"><a class="text-white footer-link" href="'.$returnurl.'">Chat</a></li>
          </ul>
          
        </div>
        <div class="col-sm-12 col-md-3 col-lg-3  text-white mt-2">
          <p class="footer-heading text-left">CONTACT US</p>
          <ul style="list-style-type:none; padding-left: 3px !important;" class="mt-2">
            <li class="mt-2"><a class="text-white footer-link" href="/contact-us">Email</a></li>
            <li class="mt-2"><a class="text-white footer-link" href="/FAQs">FAQ Center</a></li>
            <li class="mt-2"><a class="text-white footer-link" href="'.$returnurl.'">Chat</a></li>
          </ul>
        </div>
        <div class="col-sm-12 col-md-3 col-lg-3  text-white mt-2">
          <p class="footer-heading text-left">SUPPORT</p>
          <ul style="list-style-type:none; padding-left: 3px !important;" class="mt-2">
            <li class="mt-2"><a class="text-white footer-link" href="/FAQs">FAQ</a></li>
            <li class="mt-2"><a class="text-white footer-link" href="'.$returnurl.'">Chat</a></li>
            <li class="mt-2"><a class="text-white footer-link" href="/newsletter">Subscribe to Newsletter</a></li>
          </ul>
        </div>
        <div class="col-sm-12 col-md-3 col-lg-3  text-white mt-2">
          <p class="footer-heading text-left">FOLLOW US</p>
          <ul style="list-style-type:none; padding-left: 3px !important;" class="mt-2">
            <li class="mt-2"><span class="text-info-footer"><i class="fab fa-twitter-square"></i></span><a class="text-white footer-link" target="_blank" href="https://twitter.com/_beyondgrades"> Twitter</a></li>
            <li class="mt-2"><span class="text-info-footer"><i class="fab fa-linkedin"></i></span><a class="text-white footer-link" target="_blank" href="https://www.linkedin.com/company/beyond-grades-academy"> LinkedIn</a></li>
            <li class="mt-2"><span class="text-info-footer"><i class="fab fa-facebook-square"></i></span><a class="text-white footer-link" target="_blank" href="https://web.facebook.com/profile.php?id=100070401545848"> Facebook</a></li>
            <li class="mt-2"><span class="text-info-footer"><i class="fab fa-instagram"></i></span><a class="text-white footer-link" target="_blank" href="https://www.instagram.com/_beyondgrades/"> Instagram</a></li>
            <li class="mt-2"><span class="text-info-footer"><i class="fab fa-youtube"></i></span><a class="text-white footer-link" target="_blank" href="https://www.youtube.com/channel/UCvvziPuo8Jx67q9sNVX9dhA"> YouTube</a></li>
          </ul>
        </div>
      </div>
      <div class="copyright pb-0 pt-3">
        <div class="row">
          <div class="col-sm-12 col-md-3 col-lg-3 mb-3 d-flex justify-content-center tab-col-footer">
            © 2021 Beyond Grades 
            </span>
          </div>
          <div class="col-sm-12 col-md-3 col-lg-3 mb-3 d-flex justify-content-center tab-col-footer">   
            Secure Payments 
          </div>
          <div class="col-sm-12 col-md-6 col-lg-6 mb-3  d-flex justify-content-center">
            <a  href="/terms-&-conditions" class="text-info-footer">Terms & Condition</a><span class="conditions-border"></span><a  href="/privacy-policy" class="text-info-footer">Privacy Policy</a><span class="conditions-border"></span><a  href="cookie-policy" class="text-info-footer">Cookie Policy</a></span>
          </div>
        </div>
      </div>
    </div>
</footer>
</div>'
?>
