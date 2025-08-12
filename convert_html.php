// lib/convert_html.php line:525
		while (preg_match('/^(?:(LEFT|CENTER|RIGHT)|(BG)?COLOR\((#?\w{1,20})\)|SIZE\((\d{1,2})\)|(BOLD)|(BREAK|NOBREAK)):(.*)$/',
		    $text, $matches)) {
			if ($matches[1]) {
				$this->style['align'] = 'text-align:' . strtolower($matches[1]) . ';';
				$text = $matches[7];
			} else if ($matches[3]) {
				$name = $matches[2] ? 'background-color' : 'color';
				$this->style[$name] = $name . ':' . htmlsc($matches[3]) . ';';
				$text = $matches[7];
			} else if (is_numeric($matches[4])) {
				$this->style['size'] = 'font-size:' . htmlsc($matches[4]) . 'px;';
				$text = $matches[7];
			} else if ($matches[5]) {
				$this->style['bold'] = 'font-weight:bold;';
				$text = $matches[7];
			} else if ($matches[6]) {
				if($matches[6] === 'BREAK') {
					$this->style['break'] = 'white-space: normal; word-break: break-all; overflow-wrap: anywhere;';
				} else if($matches[6] === 'NOBREAK') {
					$this->style['nobreak'] = 'white-space: nowrap; word-break: keep-all';
				}
				$text = $matches[7];
			}
		}
