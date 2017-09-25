<?php 

class Indonesian_calendar
{
	private $months = [
		'01'	=> 'Januari',
		'02'	=> 'Februari',
		'03'	=> 'Maret',
		'04'	=> 'April',
		'05'	=> 'Mei',
		'06'	=> 'Juni',
		'07'	=> 'Juli',
		'08'	=> 'Agustus',
		'09'	=> 'September',
		'10'	=> 'Oktober',
		'11'	=> 'November',
		'12'	=> 'Desember'
	];

	public function convert($time, $format = 'd m y')
	{
		$calendar = explode(' ', $time);
		$date = explode('-', $calendar[0]);
		$date[1] = $this->months[$date[1]];
		$temp_date = $date;
		$date = '';
		for ($i = 0; $i < strlen($format); $i++)
		{
			$char = substr($format, $i, 1);
			if ($char === 'd')
				$date .= $temp_date[2];
			else if ($char === 'm')
				$date .= $temp_date[1];
			else if ($char === 'y')
				$date .= $temp_date[0];
			else
				$date .= $char;
		}

		return $date . ' ' . $calendar[1];
	}
}

/* End of file Indonesian_calendar.php */
/* Location: ./application/libraries/Indonesian_calendar.php */