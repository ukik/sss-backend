<?php

if (!function_exists('location')) {
    function location()
    {
      return [
        1 => "Right Sidebar",
        2 => "Footer",
        3 => "Header",
        4 => "Right Sidebar Bawah",
      ];
    }
}

if (!function_exists('location_slug')) {
    function location_slug()
    {
      return [
        1 => "right_sidebar",
        2 => "footer",
        3 => "header",
        4 => "right_sidebar_bawah",
      ];
    }
}

if (!function_exists('content_type_slug')) {
    function content_type_slug()
    {
      return [
        1 => "popular_post",
        2 => "tags",
        3 => "custom",
        4 => "news_letter",
        5 => "follow_us",
        6 => "recent_posts",
        7 => "recommended_posts",
        8 => "voting_poll",
        9 => "ads",
        11 => "categories",
        12 => 'editorPicks',
        13 => "featured_posts",
        14 => "archive",
        15 => "sub_categories",
      ];
    }
}

if (!function_exists('content_type')) {
    function content_type()
    {
      return [
        1 => "Popular Post",
        2 => "Tags",
        3 => "Custom",
        4 => "News Letter",
        5 => "Follow Us",
        6 => "Recent Posts",
        7 => "Recommended Posts",
        8 => "Voting Poll",
        9 => "Ads",
        11 => "Categories",
        12 => 'Editor Picks',
        13 => "Featured Posts",
        14 => "Archive",
        15 => "Sub Categories",
      ];
    }
}

if (!function_exists('custom_label')) {
    function custom_label()
    {
      // digunakan untuk membagi layout custom widget di vue components (unique), gunakan secara bijak
      return [
        1 => "Posisi 1",
        2 => "Posisi 2",
        3 => "Posisi 3",
      ];
    }
}

if (!function_exists('content_type_footer')) {
    function content_type_footer()
    {
      return [
        1 => "Popular Post",
        2 => "Tags",
        3 => "Custom",
        4 => "News Letter",
        5 => "Follow Us",
        6 => "Recent Posts",
        7 => "Recommended Posts",
        8 => "Voting Poll",
        9 => "Ads",
        11 => "Categories",
        12 => 'Editor Picks',
        13 => "Featured Posts",
        14 => "Archive",
        15 => "Sub Categories",
      ];
    }
}

if (!function_exists('content_type_footer_slug')) {
    function content_type_footer_slug()
    {
      return [
        1 => "popular_post",
        2 => "tags",
        3 => "custom",
        4 => "news_letter",
        5 => "follow_us",
        6 => "recent_posts",
        7 => "recommended_posts",
        8 => "voting_poll",
        9 => "ads",
        11 => "categories",
        12 => 'editorPicks',
        13 => "featured_posts",
        14 => "archive",
        15 => "sub_categories",
      ];
    }
}

if (!function_exists('content_type_header')) {
    function content_type_header()
    {
      return [
        1 => "Popular Post",
        2 => "Tags",
        3 => "Custom",
        4 => "News Letter",
        5 => "Follow Us",
        6 => "Recent Posts",
        7 => "Recommended Posts",
        8 => "Voting Poll",
        9 => "Ads",
        11 => "Categories",
        12 => 'Editor Picks',
        13 => "Featured Posts",
        14 => "Archive",
        15 => "Sub Categories",
      ];
    }
}

if (!function_exists('content_type_header_slug')) {
    function content_type_header_slug()
    {
      return [
        1 => "popular_post",
        2 => "tags",
        3 => "custom",
        4 => "news_letter",
        5 => "follow_us",
        6 => "recent_posts",
        7 => "recommended_posts",
        8 => "voting_poll",
        9 => "ads",
        11 => "categories",
        12 => 'editorPicks',
        13 => "featured_posts",
        14 => "archive",
        15 => "sub_categories",
      ];
    }
}