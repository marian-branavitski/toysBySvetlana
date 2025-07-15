<?php 
if (!function_exists('show_active_menu')) {
	function show_active_menu($slug) {
		$ci=& get_instance();

		$result = "";

		//home page
		if ($ci->uri->segment(1, 0) === $slug) {
			$result = "class='active'";
		}

		if ($slug === 'news' && $ci->uri->segment(1, 0)==='news' && $ci->uri->segment(2, 0)==='view') {
			$result = "class='active'";
		}

		if ($slug === 'toys' && $ci->uri->segment(1, 0)==='toys' && $ci->uri->segment(2, 0)==='view') {
			$result = "class='active'";
		}

		if ($slug === 'about' && $ci->uri->segment(1, 0)==='about' && $ci->uri->segment(2, 0)==='page') {
			$result = "class='active'";
		}

		if ($slug === 'contacts' && $ci->uri->segment(1, 0)==='contacts') {
			$result = "class='active'";
		}

		return $result;
	}
}


