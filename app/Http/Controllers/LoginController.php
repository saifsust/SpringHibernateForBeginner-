<?php

/**
 * @author :  SAIFUL ISLAM
 * @Coauthor : ASHIK SHAFAYTE
 * @Coauthor : NURUL HASAN
 * @batch  :SUST CSE 2013-14
 * @contact : saiful.sust.cse@gmail.com
 * @facebook : https://www.facebook.com/SaifulIslamLitonSust
 * @facebook : https://www.facebook.com/ashik.shafayet.5
 * @facebook : https://www.facebook.com/hasan.sust.cse
 * @package SUST SCHOOL WEB SITE
 * @version CVS: $Id: reader.php 19 2007-03-13 12:42:41Z shangxiao $
 * please ,contact with me .i will be pleasure if you contact with me for your important suggestions and opions for improving my coding or my coding skill
 **/
/**
 * @package using packege
 **/

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function login(Request $request) {
		if (isset($_SESSION["log"])) {
			unset($_SESSION["log"]);
		}
		//return $this->check($request->email, $request->password);
		//return $this->read();
		//$encryptedEmail = Crypt::encryptString($request->email);
		//$encryptedPassword = Crypt::encryptString($request->password);
		//return Crypt::decryptString($encrypted);
		//$this->insert($encryptedEmail, $encryptedPassword);
		elseif ($this->check($request->email, $request->password) == True) {

			$_SESSION["log"] = "Log out";
			return view('admin/index');
		} else {
			return back();
		}
		//	return back();

	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function insert($email, $password) {
		$query = "INSERT INTO admin(personalId,email,password) VALUES ('1','" . $email . "','" . $password . "')";
		DB::insert($query);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function read() {
		return DB::select("SELECT email,password FROM admin WHERE adminId=10");
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function check($email, $password) {
		$results = $this->read();
		foreach ($results as $result) {
			$decryptedEmail = Crypt::decryptString($result->{'email'});
			$decryptedPassword = Crypt::decryptString($result->{'password'});

			if ($decryptedEmail === $email && $decryptedPassword === $password) {
				return True;
			}

		}
		return False;
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id) {
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id) {
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id) {
		//
	}
}
