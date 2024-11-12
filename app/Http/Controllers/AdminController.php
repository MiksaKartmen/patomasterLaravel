<?php

namespace App\Http\Controllers;

use App\Models\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Psy\Util\Json;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $logs = Log::with('log_type')->get();


        return view("pages.admin.admin", ["logs" => $logs]);
    }

    public function filter($dateFrom, $dateTo)
    {
        $dateFrom = $dateFrom." 00:00:00";
        $dateTo = $dateTo." 00:00:00";

        $logs = Log::with('log_type')->whereBetween("date", [$dateFrom, $dateTo]);


        $logs = $logs->get();

        return Json::encode($logs);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {


    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $name)
    {
        $table = DB::select("SHOW COLUMNS FROM $name");
        $query = DB::table($name);
        $tableAliases = [];
        $alias = "";
        $tableName = "";
        foreach ($table as $index => $column) {
            $columnName = $column->Field;
            $columnNameSubStr = substr($columnName, -3);
            if ($columnNameSubStr === "_id") {
                if(substr($columnName, -4) === "y_id"){
                    $tableName = substr($columnName, 0, -4) . "ies";
                }
                else{
                    $tableName = substr($columnName, 0, -3) . "s";

                }
                $tableAlias = "t" . $index; // Generate a unique table alias
                $tableAliases[$tableName] = $tableAlias; // Store the table alias
                $query = $query->join("$tableName as $tableAlias", $columnName, '=', "$tableAlias.id");
            }
        }

// Select all columns from the main table and aliases for related tables
        $selectColumns = collect($table)->map(function ($column) use ($tableAliases, $name, $alias) {
            if( $column->Field !== "created_at" && $column->Field != "updated_at"){
                $columnName = $column->Field;

                return "$name.$columnName as $name"."_"."$columnName"; // Rename the column to match the related table

            }

        })->filter()->toArray();
        if($tableName != ""){
            $columns = Schema::getColumnListing($tableName);
            $secondColumn = $columns[1]; // Index 1 corresponds to the second column
        }



        if (!empty($tableAliases)) {
            $alias = implode('.', $tableAliases).".$secondColumn"; // Concatenate all table aliases

        }

        if (!empty($alias)) {
            $selectColumns[] = $alias; // Append the concatenated alias to $selectColumns
        }

        $items = $query->select($selectColumns)->get();

        $humanReadableName = str_replace('_', ' ', $name);
        $humanReadableName = str_replace(' ', '', ucwords($humanReadableName));
        if (substr($humanReadableName, -3) == "ies"){
            $humanReadableName = substr($humanReadableName, 0, -3)."y";
        }
        else{
            $humanReadableName = substr($humanReadableName, 0, -1);

        }

        return view("pages.admin.table", ["table"=>$table, "tableName"=>$name, "items" => $items, "humanReadableName"=>$humanReadableName]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $string)
    {

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $string)
    {


            $parts = explode(" ", $string);
            $id = $parts[0];
            $table = $parts[1];

            $item = DB::table($table)->where($table.".id",$id);
            $item -> delete();

            return redirect()->route("admin.show", $table);




    }
}
