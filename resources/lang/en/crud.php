<?php

return [
    'common' => [
        'actions' => 'Actions',
        'create' => 'Create',
        'edit' => 'Edit',
        'update' => 'Update',
        'new' => 'New',
        'cancel' => 'Cancel',
        'save' => 'Save',
        'delete' => 'Delete',
        'delete_selected' => 'Delete selected',
        'search' => 'Search...',
        'back' => 'Back to Index',
        'are_you_sure' => 'Are you sure?',
        'no_items_found' => 'No items found',
        'created' => 'Successfully created',
        'saved' => 'Saved successfully',
        'removed' => 'Successfully removed',
    ],

    'users' => [
        'name' => 'Users',
        'index_title' => 'Users List',
        'new_title' => 'New User',
        'create_title' => 'Create User',
        'edit_title' => 'Edit User',
        'show_title' => 'Show User',
        'inputs' => [
            'name' => 'Name',
            'email' => 'Email',
            'password' => 'Password',
        ],
    ],

    'categories' => [
        'name' => 'Categories',
        'index_title' => 'Categories List',
        'new_title' => 'New Category',
        'create_title' => 'Create Category',
        'edit_title' => 'Edit Category',
        'show_title' => 'Show Category',
        'inputs' => [
            'name' => 'Name',
        ],
    ],

    'stocks' => [
        'name' => 'Stocks',
        'index_title' => 'Stocks List',
        'new_title' => 'New Stock',
        'create_title' => 'Create Stock',
        'edit_title' => 'Edit Stock',
        'show_title' => 'Show Stock',
        'inputs' => [
            'quantity' => 'Quantity',
            'date' => 'Date',
            'total_stock' => 'Total Stock',
            'sub_category_id' => 'Sub Category',
        ],
    ],

    'stores' => [
        'name' => 'Stores',
        'index_title' => 'Stores List',
        'new_title' => 'New Store',
        'create_title' => 'Create Store',
        'edit_title' => 'Edit Store',
        'show_title' => 'Show Store',
        'inputs' => [
            'name' => 'Name',
        ],
    ],

    'sub_categories' => [
        'name' => 'Sub Categories',
        'index_title' => 'SubCategories List',
        'new_title' => 'New Sub category',
        'create_title' => 'Create SubCategory',
        'edit_title' => 'Edit SubCategory',
        'show_title' => 'Show SubCategory',
        'inputs' => [
            'name' => 'Name',
            'category_id' => 'Category',
        ],
    ],

    'products' => [
        'name' => 'Products',
        'index_title' => 'Products List',
        'new_title' => 'New Product',
        'create_title' => 'Create Product',
        'edit_title' => 'Edit Product',
        'show_title' => 'Show Product',
        'inputs' => [
            'name' => 'Name',
            'date' => 'Date',
            'color' => 'Color',
            'size' => 'Size',
            'quantity' => 'Quantity',
            'unit_price' => 'Unit Price',
            'discount' => 'Discount',
            'vat' => 'Vat',
            'total' => 'Total',
            'image' => 'Image',
            'status' => 'Status',
            'sub_category_id' => 'Sub Category',
            'store_id' => 'Store',
        ],
    ],

    'roles' => [
        'name' => 'Roles',
        'index_title' => 'Roles List',
        'create_title' => 'Create Role',
        'edit_title' => 'Edit Role',
        'show_title' => 'Show Role',
        'inputs' => [
            'name' => 'Name',
        ],
    ],

    'permissions' => [
        'name' => 'Permissions',
        'index_title' => 'Permissions List',
        'create_title' => 'Create Permission',
        'edit_title' => 'Edit Permission',
        'show_title' => 'Show Permission',
        'inputs' => [
            'name' => 'Name',
        ],
    ],
];
