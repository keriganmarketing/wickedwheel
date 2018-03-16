<?php

namespace Includes\Modules\Menu;

use KeriganSolutions\CPT\CustomPostType;

/**
 * Menu Class
 */

 // Exit if accessed directly.
 if (! defined('ABSPATH')) {
     exit;
 }

class Menu
{
    public function setupAdmin()
    {
        $this->createPostType();
        $this->createAdminColumns();
    }

    /**
     * @return null
     */
    public function createPostType()
    {
        $item = new CustomPostType('Menu Item', array(
            'supports'           => array( 'title', 'revisions', 'page-attributes' ),
            'menu_icon'          => 'dashicons-images-alt2',
            'rewrite'            => array( 'with_front' => false ),
            'hierarchical'       => false,
            'has_archive'        => false,
            'menu_position'      => null,
            'public'             => false,
            'publicly_queryable' => false,
        ));

        $item->addTaxonomy('Item');

        $item->addMetaBox('Item Details', array(
            'Photo ile'      => 'image',
            'Price'           => 'text',
        ));

        $item->addMetaBox(
            'Optional Description',
            array(
                'HTML' => 'wysiwyg',
            )
        );
    }

    /**
     * @return null
     */
    public function createAdminColumns()
    {

        //TODO: make this work...
    }

    /**
     * @param item ( post type category )
     * @return array
     */
    public function getMenu($category = '')
    {
        $request = array(
            'posts_per_page' => - 1,
            'offset'         => 0,
            'order'          => 'ASC',
            'orderby'        => 'menu_order',
            'post_type'      => 'menu_item',
            'post_status'    => 'publish',
        );
       
        if ($category != '') {
            $categoryarray        = array(
                array(
                    'taxonomy'         => 'item',
                    'field'            => 'slug',
                    'terms'            => $category,
                    'include_children' => false,
                ),
            );
            $request['tax_query'] = $categoryarray;
        }

        $itemlist = get_posts($request);
     
        $itemArray = array();
        foreach ($itemlist as $item) {
            array_push($itemArray, array(
                'id'            => (isset($item->ID)                               ? $item->ID : null),
                'name'          => (isset($item->post_title)                       ? $item->post_title : null),
                'slug'          => (isset($item->post_name)                        ? $item->post_name : null),
                'photo'         => (isset($item->item_details_photo_file)          ? $item->item_details_photo_file : null),
                'price'         => (isset($item->item_details_price)               ? $item->item_details_price : null),
                'description'   => (isset($item->optional_description_html)        ? $item->optional_description_html : null),
                'link'          => get_permalink($item->ID),
            ));
        }

        return $itemArray;
    }

    /**
     * @param item ( post type category )
     * @return HTML
     */
    public function getItem($category = '')
    {
        return $item;
    }
}
