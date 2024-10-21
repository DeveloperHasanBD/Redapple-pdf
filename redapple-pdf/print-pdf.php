<?php

// Include the Dompdf library
use Dompdf\Dompdf;
use Dompdf\Options;

add_action('admin_post_nopriv_generate_redapple_pdf', 'generate_redapple_pdf');
add_action('admin_post_generate_redapple_pdf', 'generate_redapple_pdf');

function generate_redapple_pdf()
{


    // Initialize Dompdf
    $options = new Options();
    $options->set('defaultFont', 'Courier');
    $options->set('isRemoteEnabled', true); // Enable remote file access
    $dompdf = new Dompdf($options);
    
    $css = file_get_contents(get_template_directory_uri() . '/redapple-pdf/assets/css/style.css'); 
    
  


    // Create the main HTML content for the PDF

    $html = '
<!DOCTYPE html>
<html>
<head>

    <style>
' . $css . '
    </style>
</head>
<body>
    <header>
        Your Header Content Here
    </header>

    <footer>
        Page {PAGE_NUM} of {PAGE_COUNT}
    </footer>

    <div class="content">
       

<p>quisquam ullam ad dolor laborum velit enim eaque, assumenda eum molestias earum molestiae atque hic. Reiciendis dignissimos distinctio eligendi maiores! Dicta explicabo excepturi libero, quas alias beatae porro exercitationem debitis voluptates facilis non possimus deserunt eius autem nihil enim placeat quos consequuntur, magnam corrupti tenetur fuga architecto! Ullam, quaerat sunt, facere earum exercitationem ipsam fuga minus commodi aliquid praesentium nesciunt similique repellendus repellat cupiditate laboriosam quidem voluptas molestias ex. Ipsam libero sed rerum delectus, optio esse nulla iure, error sit, asperiores natus eaque debitis! Est nulla deleniti aliquam necessitatibus ipsam porro. Accusamus nobis eum fugit iste odio veniam necessitatibus totam! Aspernatur quo praesentium est nemo quasi, voluptatibus, natus possimus facilis doloribus quia nihil.</p>

    </div>

</body>
</html>
';

    // Load HTML content
    $dompdf->loadHtml($html);

    // (Optional) Set paper size and orientation
    $dompdf->setPaper('A4', 'portrait');

    // Render the HTML as PDF
    $dompdf->render();

    // Output the generated PDF to Browser
    $dompdf->stream('sample.pdf', ['Attachment' => false]); // Set 'Attachment' to true for download
}

// Create a shortcode to generate the PDF
add_shortcode('generate_pdf', 'generate_redapple_pdf');
