<?php

namespace App\Http\Controllers;
use App\Http\Requests\UserinfoRequest;
use Wilgucki\Csv\Facades\Reader;
use Wilgucki\Csv\Facades\Writer;
class userinfo_controller extends Controller
{
    protected $csv_file_path;

    function __construct()
    {
        $this->csv_file_path = base_path() . DIRECTORY_SEPARATOR . 'public' . DIRECTORY_SEPARATOR . 'userinfo.csv';

    }
    #user info form shown here...
    function create($id = null)
    {
        $edit_data = [];
        if ($id) {
            $csv_reader = Reader::open($this->csv_file_path);
            $datas = $csv_reader->readAll();

            foreach ($datas as $data) {
                if ($data[0] == $id) {
                    $edit_data = [
                        $data[0],
                        $data[1],
                        $data[2],
                        $data[3],
                        $data[4],
                        $data[5],
                        $data[6],
                        $data[7],
                        $data[8],
                        $data[9]
                    ];
                }

            }
            if (!$edit_data) {
                return '<h3 style="text-align: center" class="mt-6">OOPS given id is not valid.</h3>';
            }
        }
        return view('userinfo_form', compact('edit_data'));
    }

    #store user info records
    function store(UserinfoRequest $req)
    {
        #csv file reading goes here
        $csv_reader = Reader::open($this->csv_file_path);
        $data = $csv_reader->readAll();
        $count = count($data);
        $csv_reader->close();

        #csv file writing goes here
        $csv_writer = Writer::create($this->csv_file_path);
        $csv_writer->writeLine([
            $count + 1,
            $req->input('name'),
            $req->input('address'),
            $req->input('gender'),
            $req->input('phone'),
            $req->input('email'),
            $req->input('nationality'),
            $req->input('dob'),
            $req->input('education_background'),
            $req->input('mode_of_contact')]);
        $csv_writer->writeAll($data);
        $csv_writer->flush();
        $csv_writer->close();
        return redirect()->route('show_user_info');


    }

    #show user record
    function show()
    {
        $csv_reader = Reader::open($this->csv_file_path);
        $datas = $csv_reader->readAll();
        return view('userinfo_view', compact('datas'));
    }

    function delete($id)
    {
        $this->read_write($id);
        return redirect()->route('show_user_info');

    }

    protected function read_write($id)
    {
        $csv_reader = Reader::open($this->csv_file_path);
        $datas = $csv_reader->readAll();
        $csv_reader->close();

        #csv file writing goes here
        $csv_writer = Writer::create($this->csv_file_path);
        foreach ($datas as $data) {
            if ($data[0] != $id) {
                $csv_writer->writeLine([
                    $data[0],
                    $data[1],
                    $data[2],
                    $data[3],
                    $data[4],
                    $data[5],
                    $data[6],
                    $data[7],
                    $data[8],
                    $data[9]
                ]);
            }
        }
        $csv_writer->flush();
        $csv_writer->close();
    }

    function update($id, UserinfoRequest $req)
    {
        $this->read_write($id);
        $csv_reader = Reader::open($this->csv_file_path);
        $data = $csv_reader->readAll();
        $csv_writer = Writer::create($this->csv_file_path);
        $csv_writer->writeLine([
            $id,
            $req->input('name'),
            $req->input('address'),
            $req->input('gender'),
            $req->input('phone'),
            $req->input('email'),
            $req->input('nationality'),
            $req->input('dob'),
            $req->input('education_background'),
            $req->input('mode_of_contact')]);
        $csv_writer->writeAll($data);
        $csv_writer->flush();
        $csv_writer->close();
        return redirect()->route('show_user_info');
    }

}
