<?php

namespace Database\Seeders;

use App\Models\Permissions;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permissions::query()->insert([
            /*
             * Categories permissions
             */
            [
                'title'=>'read_category',
                'label'=>'خواندن دسته بندی ها'
            ],
            [
                'title'=>'create_category',
                'label'=>'ایجاد دسته بندی ها'
            ],
            [
                'title'=>'update_category',
                'label'=>'ویرایش دسته بندی ها'
            ],
            [
                'title'=>'delete_category',
                'label'=>'حذف دسته بندی ها'
            ]


        ]);

        Permissions::query()->insert([
            /*
             * brand permissions
             */
            [
                'title'=>'read_brand',
                'label'=>'خواندن برند ها'
            ],
            [
                'title'=>'create_brand',
                'label'=>'ایجاد برند ها'
            ],
            [
                'title'=>'update_brand',
                'label'=>'ویرایش برند ها'
            ],
            [
                'title'=>'delete_brand',
                'label'=>'حذف برند ها'
            ]


        ]);

        Permissions::query()->insert([
            /*
             * product permissions
             */
            [
                'title'=>'read_product',
                'label'=>'خواندن محصول ها'
            ],
            [
                'title'=>'create_product',
                'label'=>'ایجاد محصول ها'
            ],
            [
                'title'=>'update_product',
                'label'=>'ویرایش محصول ها'
            ],
            [
                'title'=>'delete_product',
                'label'=>'حذف محصول ها'
            ]


        ]);

        Permissions::query()->insert([
            /*
             * role permissions
             */
            [
                'title'=>'read_role',
                'label'=>'خواندن نقش ها'
            ],
            [
                'title'=>'create_role',
                'label'=>'ایجاد نقش ها'
            ],
            [
                'title'=>'update_role',
                'label'=>'ویرایش نقش ها'
            ],
            [
                'title'=>'delete_role',
                'label'=>'حذف نقش ها'
            ]


        ]);

        Permissions::query()->insert([
            /*
             * discount permissions
             */
            [
                'title'=>'read_discount',
                'label'=>'خواندن تخفیف ها'
            ],
            [
                'title'=>'create_discount',
                'label'=>'ایجاد تخفیف ها'
            ],
            [
                'title'=>'update_discount',
                'label'=>'ویرایش تخفیف ها'
            ],
            [
                'title'=>'delete_discount',
                'label'=>'حذف تخفیف ها'
            ]


        ]);

        Permissions::query()->insert([
            /*
             * picture permissions
             */
            [
                'title'=>'read_picture',
                'label'=>'خواندن تصویر ها'
            ],
            [
                'title'=>'create_picture',
                'label'=>'ایجاد تصویر ها'
            ],
            [
                'title'=>'update_picture',
                'label'=>'ویرایش تصویر ها'
            ],
            [
                'title'=>'delete_picture',
                'label'=>'حذف تصویر ها'
            ]


        ]);
        Permissions::query()->insert([
            /*
             * offer permissions
             */
            [
                'title'=>'read_offer',
                'label'=>'خواندن کدتخفیف ها'
            ],
            [
                'title'=>'create_offer',
                'label'=>'ایجاد کدتخفیف ها'
            ],
            [
                'title'=>'update_offer',
                'label'=>'ویرایش کدتخفیف ها'
            ],
            [
                'title'=>'delete_offer',
                'label'=>'حذف کدتخفیف ها'
            ]


        ]);

        Permissions::query()->insert([
            /*
             * dashboard permissions
             */

                'title'=>'view_dashboard',
                'label'=>'مشاهده داشبورد'
           ]);
    }
}
