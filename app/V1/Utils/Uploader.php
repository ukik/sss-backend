<?php

use Image;

class Uploader 
{

	public function imageUpload($request)
	{
		$validation = \Validator::make($request->all(), [
			'image' => 'required|mimes:jpg,JPG,JPEG,jpeg,png|max:5120',
		])->validate();

		try {
			// $image = new galleryImage();
			$requestImage = $request->file('image');
			$fileType = $requestImage->getClientOriginalExtension();

			$originalImageName = date('YmdHis') . "_original_" . rand(1, 50) . '.' . 'webp';
			$ogImageName = date('YmdHis') . "_ogImage_" . rand(1, 50) . '.' . $fileType;
			$thumbnailImageName = date('YmdHis') . "_thumbnail_100x100_" . rand(1, 50) . '.' . 'webp';
			$bigImageName = date('YmdHis') . "_big_1080x1000_" . rand(1, 50) . '.' . 'webp';
			$bigImageNameTwo = date('YmdHis') . "_big_730x400_" . rand(1, 50) . '.' . 'webp';
			$mediumImageName = date('YmdHis') . "_medium_358x215_" . rand(1, 50) . '.' . 'webp';
			$mediumImageNameTwo = date('YmdHis') . "_medium_350x190_" . rand(1, 50) . '.' . 'webp';
			$mediumImageNameThree = date('YmdHis') . "_medium_255x175_" . rand(1, 50) . '.' . 'webp';
			$smallImageName = date('YmdHis') . "_small_123x83_" . rand(1, 50) . '.' . 'webp';


			if (strpos(php_sapi_name(), 'cli') !== false || settingHelper('default_storage') == 's3' || defined('LARAVEL_START_FROM_PUBLIC')) :
				$directory = 'images/';
			else:
				$directory = 'public/images/';
			endif;

			$originalImageUrl = $directory . $originalImageName;
			$ogImageUrl = $directory . $ogImageName;
			$thumbnailImageUrl = $directory . $thumbnailImageName;
			$bigImageUrl = $directory . $bigImageName;
			$bigImageUrlTwo = $directory . $bigImageNameTwo;
			$mediumImageUrl = $directory . $mediumImageName;
			$mediumImageUrlTwo = $directory . $mediumImageNameTwo;
			$mediumImageUrlThree = $directory . $mediumImageNameThree;
			$smallImageUrl = $directory . $smallImageName;


			if (settingHelper('default_storage') == 's3'):

				//ogImage
				$imgOg = \Image::make($requestImage)->fit(730, 400)->stream();

				//jpg. jpeg, JPEG, JPG compression
				if ($fileType == 'jpeg' or $fileType == 'jpg' or $fileType == 'JPEG' or $fileType == 'JPG'):
					$imgOriginal = \Image::make(imagecreatefromjpeg($requestImage))->encode('webp', 80);
					$imgThumbnail = \Image::make(imagecreatefromjpeg($requestImage))->fit(100, 100)->encode('webp', 80);
					$imgBig = \Image::make(imagecreatefromjpeg($requestImage))->fit(1080, 1000)->encode('webp', 80);
					$imgBigTwo = \Image::make(imagecreatefromjpeg($requestImage))->fit(730, 400)->encode('webp', 80);
					$imgMedium = \Image::make(imagecreatefromjpeg($requestImage))->fit(358, 215)->encode('webp', 80);
					$imgMediumTwo = \Image::make(imagecreatefromjpeg($requestImage))->fit(350, 190)->encode('webp', 80);
					$imgMediumThree = \Image::make(imagecreatefromjpeg($requestImage))->fit(255, 175)->encode('webp', 80);
					$imgSmall = \Image::make(imagecreatefromjpeg($requestImage))->fit(123, 83)->encode('webp', 80);

				//png compression
				elseif ($fileType == 'PNG' or $fileType == 'png'):

					$imgOriginal = \Image::make(imagecreatefrompng($requestImage))->encode('webp', 80);
					$imgThumbnail = \Image::make(imagecreatefrompng($requestImage))->fit(100, 100)->encode('webp', 80);
					$imgBig = \Image::make(imagecreatefrompng($requestImage))->fit(1080, 1000)->encode('webp', 80);
					$imgBigTwo = \Image::make(imagecreatefrompng($requestImage))->fit(730, 400)->encode('webp', 80);
					$imgMedium = \Image::make(imagecreatefrompng($requestImage))->fit(358, 215)->encode('webp', 80);
					$imgMediumTwo = \Image::make(imagecreatefrompng($requestImage))->fit(350, 190)->encode('webp', 80);
					$imgMediumThree = \Image::make(imagecreatefrompng($requestImage))->fit(255, 175)->encode('webp', 80);
					$imgSmall = \Image::make(imagecreatefrompng($requestImage))->fit(123, 83)->encode('webp', 80);

				endif;

				try {
					\Storage::disk('s3')->put($originalImageUrl, $imgOriginal);
					\Storage::disk('s3')->put($ogImageUrl, $imgOg);
					\Storage::disk('s3')->put($thumbnailImageUrl, $imgThumbnail);
					\Storage::disk('s3')->put($bigImageUrl, $imgBig);
					\Storage::disk('s3')->put($bigImageUrlTwo, $imgBigTwo);
					\Storage::disk('s3')->put($mediumImageUrl, $imgMedium);
					\Storage::disk('s3')->put($mediumImageUrlTwo, $imgMediumTwo);
					\Storage::disk('s3')->put($mediumImageUrlThree, $imgMediumThree);
					\Storage::disk('s3')->put($smallImageUrl, $imgSmall);

				} catch (S3 $e) {
					$data['status'] = 'error';
					$data['message'] = $e->getMessage();
					return response()->json($data);
				}

			elseif (settingHelper('default_storage') == 'local'):

				\Image::make($requestImage)->fit(730, 400)->save($ogImageUrl);


				if ($fileType == 'jpeg' or $fileType == 'jpg' or $fileType == 'JPEG' or $fileType == 'JPG'):

					\Image::make(imagecreatefromjpeg($requestImage))->save($originalImageUrl, 80);
					\Image::make(imagecreatefromjpeg($requestImage))->fit(100, 100)->save($thumbnailImageUrl, 80);
					\Image::make(imagecreatefromjpeg($requestImage))->fit(1080, 1000)->save($bigImageUrl, 80);
					\Image::make(imagecreatefromjpeg($requestImage))->fit(730, 400)->save($bigImageUrlTwo, 80);
					\Image::make(imagecreatefromjpeg($requestImage))->fit(358, 215)->save($mediumImageUrl, 80);
					\Image::make(imagecreatefromjpeg($requestImage))->fit(350, 190)->save($mediumImageUrlTwo, 80);
					\Image::make(imagecreatefromjpeg($requestImage))->fit(255, 175)->save($mediumImageUrlThree, 80);
					\Image::make(imagecreatefromjpeg($requestImage))->fit(123, 83)->save($smallImageUrl, 80);

				elseif ($fileType == 'PNG' or $fileType == 'png'):

					\Image::make(imagecreatefrompng($requestImage))->save($originalImageUrl, 80);
					\Image::make(imagecreatefrompng($requestImage))->fit(100, 100)->save($thumbnailImageUrl, 80);
					\Image::make(imagecreatefrompng($requestImage))->fit(1080, 1000)->save($bigImageUrl, 80);
					\Image::make(imagecreatefrompng($requestImage))->fit(730, 400)->save($bigImageUrlTwo, 80);
					\Image::make(imagecreatefrompng($requestImage))->fit(358, 215)->save($mediumImageUrl, 80);
					\Image::make(imagecreatefrompng($requestImage))->fit(350, 190)->save($mediumImageUrlTwo, 80);
					\Image::make(imagecreatefrompng($requestImage))->fit(255, 175)->save($mediumImageUrlThree, 80);
					\Image::make(imagecreatefrompng($requestImage))->fit(123, 83)->save($smallImageUrl, 80);
					
				endif;
			endif;

			$image->original_image = str_replace("public/", "", $originalImageUrl);
			$image->og_image = str_replace("public/", "", $ogImageUrl);
			$image->thumbnail = str_replace("public/", "", $thumbnailImageUrl);
			$image->big_image = str_replace("public/", "", $bigImageUrl);
			$image->big_image_two = str_replace("public/", "", $bigImageUrlTwo);
			$image->medium_image = str_replace("public/", "", $mediumImageUrl);
			$image->medium_image_two = str_replace("public/", "", $mediumImageUrlTwo);
			$image->medium_image_three = str_replace("public/", "", $mediumImageUrlThree);
			$image->small_image = str_replace("public/", "", $smallImageUrl);

			$image->disk = settingHelper('default_storage');
			$image->save();
			// $image = galleryImage::latest()->first();

			return $image->id;
		} catch (\Exception $e) {
			\Log::error($e->getMessage());
			return null;
		}
	}

}