<?php
	########################################################################################
	#
	# Image Class (used for resizing images)
	#
	# 1. Use file location as argument when creating class instance 
	#    e.g. $myImage = new Img('path/to/file');
	#
	# 2. Use resize class method to scale image
	#    e.g. $myImage->resize(1.5); (Scaled 150%)
	#
	# 3. Use display_resized_image() to return resized image as <img> tag
	#    It takes an optional string parameter if you want to specify alt attribute
	#    e.g. echo $myImage->display_resized_image('My pet dog');
	#    
	# 4. You can also use display_original_image() to return image with original dimensions
	#
	# 5. You can also just return the width and height values:
	#    $myImage->original_height();
	#    $myImage->original_width();
	#    $myImage->height(); // resized height
	#    $myImage->width(); // resized width
	#
	########################################################################################

	Class Img
	{

		public $file;

		public function isImage($file)
		{
			$whitelist_type = array('image/jpeg', 'image/png','image/gif');
			if ( in_array( mime_content_type($file), $whitelist_type ) )
			{
				return true;
			}
			else
			{
				return false;
			}
		}
		
		function __construct($file)
		{
			if ( $this->isImage($file) )
			{
				// set file location
				$this->file = $file;

				// set image dimensions
				list($Originalwidth, $Originalheight) = getimagesize($this->file);
				$this->original_width = $Originalwidth;
				$this->original_height = $Originalheight;
				// aspect ratio
				$this->aspectRatio = number_format( ($this->original_width) / ($this->original_height), 2 );
			}
			else
			{
				echo 'File is not an Image!<br/>';
			}

		}
		
		function resize($scale)
		{
			$this->width = $this->original_width * $scale;
			$this->height = ceil($this->original_height * ( ($this->original_width * $scale)  / $this->original_width) );
		}

		function display_original_image($alt='image')
		{
			return '<img src="'.$this->file.'" width="'.$this->original_width.'" height="'.$this->original_height.'" alt="'.$alt.'" />';
		}

		function display_resized_image($alt='image')
		{
			return '<img src="'.$this->file.'" width="'.$this->width.'" height="'.$this->height.'" alt="'.$alt.'" />';
		}

	}

?>
