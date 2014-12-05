<?php

return array(

	/*
	|--------------------------------------------------------------------------
	| Validation Language Lines
	|--------------------------------------------------------------------------
	|
	| The following language lines contain the default error messages used by
	| the validator class. Some of these rules have multiple versions such
	| as the size rules. Feel free to tweak each of these messages here.
	|
	*/

	"accepted"             => ":attribute harus diterima.",
	"active_url"           => ":attribute bukan url yang valid.",
	"after"                => ":attribute harus setelah tanggal :date.",
	"alpha"                => ":attribute hanya mengandung huruf saja.",
	"alpha_dash"           => ":attribute hanya mengandung huruf, angka, dan tanda hubung.",
	"alpha_num"            => ":attribute hanya mengandung huruf dan angka.",
	"array"                => ":attribute harus berupa array.",
	"before"               => ":attribute harus sebelum tanggal :date.",
	"between"              => array(
		"numeric" => ":attribute harus diantara :min dan :max.",
		"file"    => ":attribute harus diantara :min dan :max kilobytes.",
		"string"  => ":attribute harus diantara :min dan :max characters.",
		"array"   => ":attribute harus diantara :min dan :max items.",
	),
	"confirmed"            => ":attribute konfirmasi tidak sama.",
	"date"                 => ":attribute bukan tanggal yang valid.",
	"date_format"          => ":attribute tidak sesuai format dengan :format.",
	"different"            => ":attribute dan :other harus berbeda.",
	"digits"               => ":attribute harus berupa :digits angka.",
	"digits_between"       => ":attribute harus diantara :min dan :max angka.",
	"email"                => ":attribute harus alamat yang valid.",
	"exists"               => ":attribute yang dipilih tidak valid.",
	"image"                => ":attribute harus berupa gambar.",
	"in"                   => ":attribute yang dipilih tidak valid.",
	"integer"              => ":attribute harus berupa bilangan bulat.",
	"ip"                   => ":attribute harus berupa alamat IP yang valid.",
	"max"                  => array(
		"numeric" => ":attribute tidak boleh lebih besar dari :max.",
		"file"    => ":attribute tidak boleh lebih besar dari :max kilobytes.",
		"string"  => ":attribute tidak boleh lebih besar dari :max karakter.",
		"array"   => ":attribute tidak boleh lebih besar dari :max items.",
	),
	"mimes"                => ":attribute harus berupa jenis file: :values.",
	"min"                  => array(
		"numeric" => ":attribute minimal harus :min angka.",
		"file"    => ":attribute minimal harus :min kilobytes.",
		"string"  => ":attribute minimal harus :min karakter.",
		"array"   => ":attribute minimal harus :min items.",
	),
	"not_in"               => ":attribute yang dipilih tidak valid.",
	"numeric"              => ":attribute harus berupa angka.",
	"regex"                => ":attribute format tidak valid.",
	"required"             => ":attribute diperlukan.",
	"required_if"          => ":attribute diperlukan ketika :other adalah :value.",
	"required_with"        => ":attribute diperlukan ketika :values adalah present.",
	"required_with_all"    => ":attribute diperlukan ketika :values adalah present.",
	"required_without"     => ":attribute diperlukan ketika :values adalah not present.",
	"required_without_all" => ":attribute field diperlukan bila :values ada.",
	"same"                 => ":attribute dan :other harus sama.",
	"size"                 => array(
		"numeric" => ":attribute harus berupa :size.",
		"file"    => ":attribute harus berupa :size kilobytes.",
		"string"  => ":attribute harus berupa :size karakter.",
		"array"   => ":attribute harus mengandung :size items.",
	),
	"unique"               => ":attribute telah terpakai.",
	"url"                  => ":attribute format tidak valid.",

	/*
	|--------------------------------------------------------------------------
	| Custom Validation Language Lines
	|--------------------------------------------------------------------------
	|
	| Here you may specify custom validation messages for attributes using the
	| convention "attribute.rule" to name the lines. This makes it quick to
	| specify a specific custom language line for a given attribute rule.
	|
	*/

	'custom' => array(
		'attribute-name' => array(
			'rule-name' => 'custom-message',
		),
	),

	/*
	|--------------------------------------------------------------------------
	| Custom Validation Attributes
	|--------------------------------------------------------------------------
	|
	| The following language lines are used to swap attribute place-holders
	| with something more reader friendly such as E-Mail Address instead
	| of "email". This simply helps us make messages a little cleaner.
	|
	*/

	'attributes' => array(
		'name' => 'nama',
		'password' => 'kata sandi',
		'message' => 'pesan',
		'phone' => 'telepon',
		'address' => 'alamat',
		'phone_mobile' => 'handphone',
		'phone_extension' => 'nomor ekstensi',
	),

);
