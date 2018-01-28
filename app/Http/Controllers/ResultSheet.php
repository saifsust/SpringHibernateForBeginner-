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
/*
all necessary classes are imported here
 */
use App\Http\Services\ResultShow;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

/*
all necessary constant are declared here for efficient use
 */

/*
all necessary codes are implemented here
 */
class ResultSheet extends Controller {

	private $resultSheet;
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index($passValue) {

		//return redirect('/result-view')->with('resultSheet', $this->resultSheet);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request) {
		//
	}

	/**
	 * Display selected exam ,result sheet from specific table.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function showSelectedResultSheet($resultShowcaseId) {

		try {
			$resultShow = new ResultShow();
			/* fetching data using selected raw from result_showcase table and exam_name table */
			if ($resultShowcaseId != null && is_numeric($resultShowcaseId)) {

				/* get result sheet table from result showcase table */

				$selectedRaw = $resultShow->getResultShowcase($resultShowcaseId);
				$resultSheetTableName = null;
				foreach ($selectedRaw as $value) {
					$resultSheetTableName = $value->{'resultTableName'};
				}

				if ($resultSheetTableName == null) {
					return "result table doesn't exist into database";
				} else {

					$this->resultSheet = $resultShow->getResultSheet($resultSheetTableName);

					return view('admin/result-view')->with('resultSheet', $this->resultSheet)->with('resultShowcaseId', $resultShowcaseId);
				}

			} else {
				$view = '/' . $resultShowcaseId;
				return redirect($view);
			}

		} catch (\Exception $ex) {
			return $ex->getMessage();
		} catch (Exception $ex) {
			return $ex->getMessage();
		}

	}

	/**
	 * Show the result  after editing and deleting itesm from result sheet .
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function editingAndDeletineResultSheet($action, $resultShowcaseId, $Roll) {

		try {

			$resultShow = new ResultShow();
			/* editing result sheet for sepecific student implementing code here */
			if ($action == "Edit") {

				$resultSheetTableName = $resultShow->getResultSheetTableName($resultShowcaseId);

				/*finding student  result information for updating student data  */

				$findingSepecficStudentRawQuery = "SELECT * FROM " . $resultSheetTableName . " WHERE Roll =" . $Roll;

				$studentPreviuosData = DB::select($findingSepecficStudentRawQuery);

				return $studentPreviuosData;
			} elseif ($action == "Delete") {
				/* deleting specefic student's information from result sheet using Roll */
				$resultSheetTableName = $resultShow->getResultSheetTableName($resultShowcaseId);
				$queryForDeletingStudentFromResultSheet = "DELETE FROM " . $resultSheetTableName . " WHERE Roll=" . $Roll;

				DB::delete($queryForDeletingStudentFromResultSheet);
				$this->resultSheet = $resultShow->getResultSheet($resultSheetTableName);
				$pageLoad = "/result-view/" . $resultShowcaseId;
				return redirect($pageLoad)->with('resultSheet', $this->resultSheet)->with('resultShowcaseId', $resultShowcaseId);

			} else {

				/** redirection page codes are implemented here */
				return $ResultShow->getResultSheetTableName($resultShowcaseId);

			}

		} catch (\Exception $ex) {
			return $ex->getMessage();
		} catch (Exception $ex) {
			return $ex->getMessage();
		}

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
