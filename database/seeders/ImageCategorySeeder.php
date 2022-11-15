<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ImageCategory;

class ImageCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $img_Cats = [
            array('name' => 'Action', 'image' => 'nature_photo.jpg'),
            array('name' => 'Advertising', 'image' => 'nature_photo.jpg'),
            array('name' => 'Advertising/Editorial', 'image' => 'nature_photo.jpg'),
            array('name' => 'Animals', 'image' => 'nature_photo.jpg'),
            array('name' => 'Architectural', 'image' => 'nature_photo.jpg'),
            array('name' => 'Architecture', 'image' => 'nature_photo.jpg'),
            array('name' => 'Artistic', 'image' => 'nature_photo.jpg'),
            array('name' => 'Artistic Nude', 'image' => 'nature_photo.jpg'),
            array('name' => 'Beauty', 'image' => 'nature_photo.jpg'),
            array('name' => 'Behind the Scenes ', 'image' => 'nature_photo.jpg'),
            array('name' => 'Black and White', 'image' => 'nature_photo.jpg'),
            array('name' => 'Body Paint', 'image' => 'nature_photo.jpg'),
            array('name' => 'Body Painting', 'image' => 'nature_photo.jpg'),
            array('name' => 'Cars/Bikes/Automotive', 'image' => 'nature_photo.jpg'),
            array('name' => 'Casual', 'image' => 'nature_photo.jpg'),
            array('name' => 'Children - Juniors', 'image' => 'nature_photo.jpg'),
            array('name' => 'Commercial', 'image' => 'nature_photo.jpg'),
            array('name' => 'Digitals (un-retouched)', 'image' => 'nature_photo.jpg'),
            array('name' => 'Editorial', 'image' => 'nature_photo.jpg'),
            array('name' => 'Events', 'image' => 'nature_photo.jpg'),
            array('name' => 'Fashion', 'image' => 'nature_photo.jpg'),
            array('name' => 'Fine Art', 'image' => 'nature_photo.jpg'),
            array('name' => 'Fine Art Nude', 'image' => 'nature_photo.jpg'),
            array('name' => 'Friends and Family', 'image' => 'nature_photo.jpg'),
            array('name' => 'Gaming', 'image' => 'nature_photo.jpg'),
            array('name' => 'Glamour', 'image' => 'nature_photo.jpg'),
            array('name' => 'Glamour Nude', 'image' => 'nature_photo.jpg'),
            array('name' => 'Hair', 'image' => 'nature_photo.jpg'),
            array('name' => 'Industrial', 'image' => 'nature_photo.jpg'),
            array('name' => 'Infrared / Time Exposure', 'image' => 'nature_photo.jpg'),
            array('name' => 'Kids/Babies', 'image' => 'nature_photo.jpg'),
            array('name' => 'Landscape', 'image' => 'nature_photo.jpg'),
            array('name' => 'Lifestyle', 'image' => 'nature_photo.jpg'),
            array('name' => 'Lingerie', 'image' => 'nature_photo.jpg'),
            array('name' => 'Macro', 'image' => 'nature_photo.jpg'),
            array('name' => 'Makeup', 'image' => 'nature_photo.jpg'),
            array('name' => 'Male Model', 'image' => 'nature_photo.jpg'),
            array('name' => 'Metaphysical', 'image' => 'nature_photo.jpg'),
            array('name' => 'Music', 'image' => 'nature_photo.jpg'),
            array('name' => 'Nature', 'image' => 'nature_photo.jpg'),
            array('name' => 'OMP Events', 'image' => 'nature_photo.jpg'),
            array('name' => 'OMP ZED/Comp Card', 'image' => 'nature_photo.jpg'),
            array('name' => 'Others', 'image' => 'nature_photo.jpg'),
            array('name' => 'Pageants', 'image' => 'nature_photo.jpg'),
            array('name' => 'Pets', 'image' => 'nature_photo.jpg'),
            array('name' => 'Photo Editing', 'image' => 'nature_photo.jpg'),
            array('name' => 'Photo Journalism', 'image' => 'nature_photo.jpg'),
            array('name' => 'Photoshop Art', 'image' => 'nature_photo.jpg'),
            array('name' => 'Pinup', 'image' => 'nature_photo.jpg'),
            array('name' => 'Portrait', 'image' => 'nature_photo.jpg'),
            array('name' => 'Portrait - Headshots', 'image' => 'nature_photo.jpg'),
            array('name' => 'Product', 'image' => 'nature_photo.jpg'),
            array('name' => 'Published', 'image' => 'nature_photo.jpg'),
            array('name' => 'Punk/Goth', 'image' => 'nature_photo.jpg'),
            array('name' => 'Realistic', 'image' => 'nature_photo.jpg'),
            array('name' => 'Retro / Vintage', 'image' => 'nature_photo.jpg'),
            array('name' => 'Runway', 'image' => 'nature_photo.jpg'),
            array('name' => 'sample', 'image' => 'nature_photo.jpg'),
            array('name' => 'Shut Up and Model', 'image' => 'nature_photo.jpg'),
            array('name' => 'Sport - Action', 'image' => 'nature_photo.jpg'),
            array('name' => 'Sport - Fitness', 'image' => 'nature_photo.jpg'),
            array('name' => 'Sports Action', 'image' => 'nature_photo.jpg'),
            array('name' => 'Still Life', 'image' => 'nature_photo.jpg'),
            array('name' => 'Street Photography', 'image' => 'nature_photo.jpg'),
            array('name' => 'Swimsuit', 'image' => 'nature_photo.jpg'),
            array('name' => 'Tear Sheet', 'image' => 'nature_photo.jpg'),
            array('name' => 'Teens', 'image' => 'nature_photo.jpg'),
            array('name' => 'Time Exposure', 'image' => 'nature_photo.jpg'),
            array('name' => 'Wedding', 'image' => 'nature_photo.jpg'),
            array('name' => 'Wedding - Event', 'image' => 'nature_photo.jpg'),
        ];
        foreach ($img_Cats as $cat) {
            ImageCategory::create($cat);
        }
    }
}
