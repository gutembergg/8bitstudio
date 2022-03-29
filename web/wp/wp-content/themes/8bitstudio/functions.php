<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @see https://developer.wordpress.org/themes/basics/template-hierarchy/
 * @since 8bitstudio 1.0.0
 */
if (!defined('ABSPATH')) {
    exit;
}

    add_shortcode('external_data', 'fetch_api_8b');

    function fetch_api_8b($amount)
    {
        $url = 'https://jsonplaceholder.typicode.com/posts';

        $arguments = [
            'method' => 'GET',
        ];
        $response = wp_remote_get($url, $arguments);

        if (is_wp_error($response)) {
            $error_message = $response->get_error_message;

            return 'Error: '.$error_message;
        }

        $int_value = intval($amount);

        //En construction
        $skip = 10 + $int_value;
        $formated_response = json_decode(wp_remote_retrieve_body($response));
        $results = array_slice($formated_response, 0, $skip);
        $list_size = count($results);
        /////////////////////////////////

        return build_html_8b($results);
    }

    function build_html_8b($list_articles)
    {
        $html = '';
        $html .= '<table>';

        $html .= '<tr>';
        $html .= '<td>ID</td>';
        $html .= '<td>Title</td>';
        $html .= '<td>Description</td>';
        $html .= '</tr>';

        foreach ($list_articles as $result) {
            $html .= '<tr>';
            $html .= '<td>'.$result->id.'</td>';
            $html .= '<td>'.$result->title.'</td>';
            $html .= '<td>'.$result->body.'</td>';
            $html .= '</tr>';
        }

        $html .= '</table>';

        return $html;
    }
