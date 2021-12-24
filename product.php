<?php 
    function vegetable($location,$product_name,$price){
   echo $image="<div class=\"product\">
            <img style=\"box-shadow: 0px 0px 4px black;\" src=$location>
            <span><b>$product_name</b></span>
            <p style=\"color: #72787E; font-size: 10px;\">stock available</p>
            <br>
            <span class=\"currency\">৳</span>
            <span class=\"currency\">$price</span>
            <div class=\"buy\"><a href=\"order_page.php?location=$location & price=$price & product_name=$product_name\">
                 <button><svg stroke=\"currentColor\" fill=\"currentColor\" stroke-width=\"0\" viewBox=\"0 0 24 24\" class=\"mr-2 text-2xl\" height=\"1em\" width=\"1em\" xmlns=\"http://www.w3.org/2000/svg\"><path d=\"M7 18c-1.1 0-1.99.9-1.99 2S5.9 22 7 22s2-.9 2-2-.9-2-2-2zM1 2v2h2l3.6 7.59-1.35 2.45c-.16.28-.25.61-.25.96 0 1.1.9 2 2 2h12v-2H7.42c-.14 0-.25-.11-.25-.25l.03-.12.9-1.63h7.45c.75 0 1.41-.41 1.75-1.03l3.58-6.49c.08-.14.12-.31.12-.48 0-.55-.45-1-1-1H5.21l-.94-2H1zm16 16c-1.1 0-1.99.9-1.99 2s.89 2 1.99 2 2-.9 2-2-.9-2-2-2z\"></path></svg> <span>Buy Now</span></button></a>
            </div>
        </div>";
   }

?>