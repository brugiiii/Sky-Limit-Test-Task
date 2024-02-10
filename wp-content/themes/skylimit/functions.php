<?php

add_action('wp_enqueue_scripts', 'enqueue_scripts_and_styles');
add_action('after_setup_theme', 'theme_setup');

add_action('wp_ajax_send_mail', 'send_mail');
add_action('wp_ajax_nopriv_send_mail', 'send_mail');

function enqueue_scripts_and_styles(){
    wp_deregister_script('jquery');
    wp_register_script('jquery', '//code.jquery.com/jquery-1.11.0.min.js');
    wp_register_script('jquery-migrate', '//code.jquery.com/jquery-migrate-1.2.1.min.js');

    wp_enqueue_style('main-style', get_template_directory_uri() . '/dist/css/main.bundle.css');

    wp_enqueue_script('jquery');
    wp_enqueue_script('main-js', get_template_directory_uri() . '/dist/js/main.bundle.js', array('jquery'), null, true);

    if(is_page_template('pages/home.php')){
        wp_enqueue_style('home-style', get_template_directory_uri() . '/dist/css/home.bundle.css');
        wp_enqueue_script('home-js', get_template_directory_uri() . '/dist/js/home.bundle.js', array('jquery'), null, true);
    }

    if(is_page_template('pages/contacts.php')){
        wp_enqueue_style('intl-tel-input-style', 'https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.12/css/intlTelInput.min.css', array(), '17.0.12');

        wp_enqueue_style('contacts-style', get_template_directory_uri() . '/dist/css/contacts.bundle.css');

        wp_enqueue_script('jquery-mask', 'https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.js', array('jquery'), '1.14.11', true);
        wp_enqueue_script('intl-tel-input', 'https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.12/js/intlTelInput-jquery.min.js', array('jquery'), '17.0.12', true);
        wp_enqueue_script('intl-tel-input-utils', 'https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.12/js/utils.min.js', array('jquery'), '17.0.12', true);

        wp_enqueue_script('contacts-js', get_template_directory_uri() . '/dist/js/contacts.bundle.js', array('jquery'), null, true);

        wp_localize_script('contacts-js', 'settings', array('ajax_url' => admin_url('admin-ajax.php')));
    }
}

function theme_setup(){
    show_admin_bar(false);
    register_nav_menu('menu-header', 'Main menu');

    add_theme_support('custom-logo');
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
}

function get_image($name)
{
    echo get_template_directory_uri() . "/assets/images/" . $name;
}

function send_mail() {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = sanitize_text_field($_POST['name']);
        $phone = sanitize_text_field($_POST['phone']);

        send_email_message($name, $phone);
        send_telegram_message($name, $phone);
    }

    wp_die();
}

function send_telegram_message($name, $phone) {
    $telegram_bot_token = '6795917049:AAFP9yZD1luv8pMjzT_CpHJbbr7ND9ScM2c';
    $chat_id = '-4107987368';

    // Додавання контактних даних клієнта
    $telegram_message = '<b>' . 'Контактні дані клієнта: ' . '</b>' . PHP_EOL . PHP_EOL;
    $telegram_message .= '<b>' . 'Ім\'я: ' . '</b>' . $name . PHP_EOL;
    $telegram_message .= '<b>' . 'Номер телефону: ' . '</b>' . $phone . PHP_EOL;

    // Відправлення повідомлення у Телеграм за допомогою cURL
    $url = "https://api.telegram.org/bot$telegram_bot_token/sendMessage";
    $data = array('chat_id' => $chat_id, 'text' => $telegram_message, 'parse_mode' => 'HTML');

    $options = array(
        'http' => array(
            'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
            'method'  => 'POST',
            'content' => http_build_query($data),
        ),
    );

    $context  = stream_context_create($options);
    $result = file_get_contents($url, false, $context);
}

function send_email_message($name, $phone) {
    $to = get_option('admin_email');
    $subject = 'Form Submission';

    // Styling for email message
    $message = '<html><body>';
    $message .= '<p>Контактні дані клієнта:</p>';
    $message .= "<p><strong>Ім'я:</strong> $name</p>";
    $message .= "<p><strong>Номер телефону:</strong> $phone</p>";
    $message .= '</body></html>';

    $headers = array(
        'Content-Type: text/html; charset=UTF-8',
        'From: webmaster@example.com',
        'Reply-To: webmaster@example.com',
        'X-Mailer: PHP/' . phpversion()
    );

    // Sending HTML email
    wp_mail($to, $subject, $message, $headers);
}