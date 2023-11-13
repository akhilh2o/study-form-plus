<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Takshak\Adash\Models\Permission;
use Takshak\Adash\Models\Role;

class PermissionSeeder extends Seeder
{
    public function run()
    {
        foreach ($this->data() as $item) {
            $permission = Permission::create([
                'name'    =>    $item['name'],
                'title'    =>    $item['title'],
            ]);

            if (count($item['children']) > 0) {
                foreach ($item['children'] as $child) {
                    Permission::create([
                        'name'        =>    $child['name'],
                        'permission_id'    =>    $permission->id,
                        'title'        =>    $child['title'],
                    ]);
                }
            }
        }

        $permissions = Permission::pluck('id')->toArray();

        $adminRole = Role::where('name', 'admin')->first();
        $adminRole->permissions()->sync($permissions);
    }

    public function data($value = '')
    {
        return  [
            [
                'name'        =>    'category_access',
                'title'        =>    'Category Management',
                'children'    =>    [
                    ['name'    => 'category_show', 'title' =>    'Category Create'],
                    ['name'    => 'category_create', 'title' =>    'Category Create'],
                    ['name'    => 'category_update', 'title' =>    'Category Update'],
                    ['name'    => 'category_delete', 'title' =>    'Category Delete'],
                ]
            ],
            
            [
                'name'        =>    'ebook_category_access',
                'title'        =>    'Ebook Category Management',
                'children'    =>    [
                    ['name'    => 'ebook_category_show',   'title' =>    'Ebook Category Create'],
                    ['name'    => 'ebook_category_create', 'title' =>    'Ebook Category Create'],
                    ['name'    => 'ebook_category_update', 'title' =>    'Ebook Category Update'],
                    ['name'    => 'ebook_category_delete', 'title' =>    'Ebook Category Delete'],
                ]
            ],
            [
                'name'        =>    'ebook_download_access',
                'title'        =>    'Ebook Download Management',
                'children'    =>    [
                    ['name'    => 'ebook_download_show',   'title' =>    'Ebook Download Create'],
                    ['name'    => 'ebook_download_create', 'title' =>    'Ebook Download Create'],
                    ['name'    => 'ebook_download_update', 'title' =>    'Ebook Download Update'],
                    ['name'    => 'ebook_download_delete', 'title' =>    'Ebook Download Delete'],
                ]
            ],
            [
                'name'        =>    'course_access',
                'title'        =>    'Course Management',
                'children'    =>    [
                    ['name'    => 'course_show', 'title' =>    'Course Create'],
                    ['name'    => 'course_create', 'title' =>    'Course Create'],
                    ['name'    => 'course_update', 'title' =>    'Course Update'],
                    ['name'    => 'course_delete', 'title' =>    'Course Delete'],
                ]
            ],
            [
                'name'        =>    'order_access',
                'title'        =>    'Order Management',
                'children'    =>    [
                    ['name'    => 'order_show', 'title' =>    'Order Create'],
                    ['name'    => 'order_create', 'title' =>    'Order Create'],
                    ['name'    => 'order_update', 'title' =>    'Order Update'],
                    ['name'    => 'order_delete', 'title' =>    'Order Delete'],
                ]
            ],
            [
                'name'        =>    'coupon_access',
                'title'        =>    'Coupon Management',
                'children'    =>    [
                    ['name'    => 'coupon_show', 'title' =>    'Coupon Create'],
                    ['name'    => 'coupon_create', 'title' =>    'Coupon Create'],
                    ['name'    => 'coupon_update', 'title' =>    'Coupon Update'],
                    ['name'    => 'coupon_delete', 'title' =>    'Coupon Delete'],
                ]
            ],
            [
                'name'        =>    'queries_access',
                'title'        =>    'Queries Management',
                'children'    =>    [
                    ['name'    => 'queries_show', 'title' =>    'Queries Create'],
                    ['name'    => 'queries_create', 'title' =>    'Queries Create'],
                    ['name'    => 'queries_update', 'title' =>    'Queries Update'],
                    ['name'    => 'queries_delete', 'title' =>    'Queries Delete'],
                ]
            ],

            [
                'name'        =>    'roles_access',
                'title'        =>    'Roles Management',
                'children'    =>    [
                    ['name'    => 'roles_create', 'title' =>    'Roles Create'],
                    ['name'    => 'roles_update', 'title' =>    'Roles Update'],
                    ['name'    => 'roles_delete', 'title' =>    'Roles Delete'],
                ]
            ],

            [
                'name'        =>    'permissions_access',
                'title'        =>    'Permissions Access',
                'children'    =>    [
                    ['name'    => 'permissions_create', 'title' =>    'Permissions Update'],
                    ['name'    => 'permissions_update', 'title' =>    'Permissions Update'],
                    ['name'    => 'permissions_delete', 'title' =>    'Permissions Update'],
                    ['name'    => 'permissions_roles_update', 'title' =>    'Permissions Roles Update'],
                ]
            ],

            [
                'name'        =>    'users_access',
                'title'        =>    'Users Management',
                'children'    =>    [
                    ['name'    => 'users_show', 'title' =>    'Users Show'],
                    ['name'    => 'users_create', 'title' =>    'Users Create'],
                    ['name'    => 'users_update', 'title' =>    'Users Update'],
                    ['name'    => 'users_delete', 'title' =>    'Users Delete'],
                    ['name'    => 'login_to_user', 'title' =>    'Users Login To'],
                ]
            ],

            [
                'name'        =>    'pages_access',
                'title'        =>    'Pages Management',
                'children'    =>    [
                    ['name'    => 'pages_create', 'title' =>    'Pages Create'],
                    ['name'    => 'pages_show', 'title' =>    'Pages Show'],
                    ['name'    => 'pages_update', 'title' =>    'Pages Update'],
                    ['name'    => 'pages_delete', 'title' =>    'Pages Delete'],
                ]
            ],

            [
                'name'        =>    'faqs_access',
                'title'        =>    'FAQs Management',
                'children'    =>    [
                    ['name'    => 'faqs_create', 'title' =>    'FAQs Create'],
                    ['name'    => 'faqs_show', 'title' =>    'FAQs Show'],
                    ['name'    => 'faqs_update', 'title' =>    'FAQs Update'],
                    ['name'    => 'faqs_delete', 'title' =>    'FAQs Delete'],
                ]
            ],

            [
                'name'        =>    'testimonials_access',
                'title'        =>    'Testimonials Management',
                'children'    =>    [
                    ['name'    => 'testimonials_create', 'title' =>    'Testimonials Create'],
                    ['name'    => 'testimonials_update', 'title' =>    'Testimonials Update'],
                    ['name'    => 'testimonials_delete', 'title' =>    'Testimonials Delete'],
                ]
            ],

            [
                'name'        =>    'faculties_access',
                'title'        =>    'faculties Management',
                'children'    =>    [
                    ['name'    => 'faculties_create', 'title' =>    'Faculty Create'],
                    ['name'    => 'faculties_show',   'title' =>    'Faculty Show'],
                    ['name'    => 'faculties_update', 'title' =>    'Faculty Update'],
                    ['name'    => 'faculties_delete', 'title' =>    'Faculty Delete'],
                ]
            ],

            [
                'name'        =>    'blog_categories_access',
                'title'        =>    'Blog Categories Management',
                'children'    =>    [
                    ['name'    => 'blog_categories_create', 'title' =>    'Blog Categories Create'],
                    ['name'    => 'blog_categories_update', 'title' =>    'Blog Categories Update'],
                    ['name'    => 'blog_categories_delete', 'title' =>    'Blog Categories Delete'],
                ]
            ],

            [
                'name'        =>    'blog_posts_access',
                'title'        =>    'Blog Posts Management',
                'children'    =>    [
                    ['name'    => 'blog_posts_create', 'title' =>    'Blog Posts Create'],
                    ['name'    => 'blog_posts_show', 'title' =>    'Blog Posts Show'],
                    ['name'    => 'blog_posts_update', 'title' =>    'Blog Posts Update'],
                    ['name'    => 'blog_posts_delete', 'title' =>    'Blog Posts Delete'],
                ]
            ],

            [
                'name'        =>    'blog_comments_access',
                'title'        =>    'Blog Comments Management',
                'children'    =>    [
                    ['name'    => 'blog_comments_update', 'title' =>    'Blog Comments Update'],
                    ['name'    => 'blog_comments_show', 'title' =>    'Blog Comments Show'],
                    ['name'    => 'blog_comments_delete', 'title' =>    'Blog Comments Delete'],
                ]
            ],


        ];
    }
}
